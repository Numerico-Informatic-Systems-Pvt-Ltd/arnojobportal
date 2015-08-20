<?php

namespace JobPortal\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use JobPortal\FrontBundle\Entity\Categories;
use JobPortal\FrontBundle\Entity\Questions;
use JobPortal\FrontBundle\Entity\Answers;
use JobPortal\FrontBundle\Entity\Users;
use JobPortal\AdminBundle\Entity\ProfileType;
use JobPortal\AdminBundle\Entity\ProfileDetails;
use JobPortal\FrontBundle\Entity\CategoryUserMappings;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Cookie;

class UsersController extends Controller {

    public function userRegisterAction(Request $request) {
        $categories = $this->getDoctrine()->getRepository('JobPortalAdminBundle:Categories')->findBy(array('isDeleted' => '1', 'status' => '1'));
        if ($request->getMethod() == 'POST') {
            if ($_POST['g-recaptcha-response'] != '') {
                $user = new Users();
                $password = chr(rand(65, 90)) . chr(rand(65, 90)) . chr(rand(65, 90)) . chr(rand(65, 90)) . chr(rand(65, 90));
                $user->setName($_POST['name']);
                $user->setEmail($_POST['email']);
                $user->setPhone($_POST['phone']);
                $user->setPassword(md5($password));
                $user->setStatus(1);
                $user->setIsDeleted(1);
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();
                /* User mail password */
                $to = $_POST['email'];
                $subject = 'Inscription Courrier';
                $message = 'Merci pour linscription dans notre site Web. Votre mot de passe une fois de connexion est ' . $password;
                $headers = 'From: info@jobportal.com' . "\r\n" .
                        'Reply-To: info@jobportal.com' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();

                mail($to, $subject, $message, $headers);
                /* User mail password end */
                foreach ($_POST['category'] as $catg) {
                    $CategoryUserMappings = new CategoryUserMappings();
                    $CategoryUserMappings->setUserId($user->getId());
                    $CategoryUserMappings->setCategoryId($catg);
                    $em->persist($CategoryUserMappings);
                }
                $em->flush();
                /* candidate Session Data Set */
                $candidate_session_array = array(
                    'login_candidate_id' => $user->getId(),
                    'login_candidate_name' => $_POST['name']
                );
                $this->get('session')->set('candidatedata', $candidate_session_array);
                /* candidate Session Data Set End */
                return new RedirectResponse($this->generateUrl('chage_password'));
            } else {
                return $this->render('JobPortalFrontBundle:Users:userRegister.html.php', array('categories' => $categories, 'captach_code' => 'Captcha Invalide'));
            }
        } else {
            /* Get Cookies Value */
            $user_remember_data = unserialize($this->getRequest()->cookies->get('user_remember_cookies'));
            /* Get Cookies Value End */

            return $this->render('JobPortalFrontBundle:Users:userRegister.html.php', array('categories' => $categories, 'user_cookies_remember' => $user_remember_data));
        }
    }

    public function changePasswordAction(Request $request) {
        $conn = $this->get('database_connection');
        if ($request->getMethod() == 'POST') {
            $candateDetails = $this->get('session')->get('candidatedata');
            if (!empty($candateDetails)) {
                $pass = array(
                    'password' => md5($_POST['password'])
                );
                $conn->update('users', $pass, array('id' => $candateDetails['login_candidate_id']));
            }

            return $this->render('JobPortalFrontBundle:Users:changePassword.html.php', array('change_password_succ' => 'Votre changement de mot de passe avec succès'));
        } else {
            $candateDetails = $this->get('session')->get('candidatedata');
            return $this->render('JobPortalFrontBundle:Users:changePassword.html.php', array('candidateData' => $candateDetails));
        }
    }

    public function userLoginAction(Request $request) {
        $conn = $this->get('database_connection');
        $categories = $this->getDoctrine()->getRepository('JobPortalAdminBundle:Categories')->findBy(array('isDeleted' => '1', 'status' => '1'));
        if ($request->getMethod() == 'POST') {


            $candidate_email = $_POST['candidate_email'];
            $password = $_POST['password'];
            $candiate = $conn->fetchAll('SELECT * FROM users where email = "' . $candidate_email . '" AND password = "' . md5($password) . '" AND status = "1" AND is_deleted = "1" ');

            if (!empty($candiate)) {
                /* candidate Session Data Set */
                $candidate_session_array = array(
                    'login_candidate_id' => $candiate[0]['id'],
                    'login_candidate_name' => $candiate[0]['name']
                );
                $this->get('session')->set('candidatedata', $candidate_session_array);
                /* candidate Session Data Set End */

                /* cookies implements */

                if (isset($_POST['remember_me'])) {
                    $response = new Response();
                    $value = array(
                        'useremail' => $_POST['candidate_email'],
                        'password' => $_POST['password']
                    );
                    $cookie = new Cookie('user_remember_cookies', serialize($value), (time() + 3600 * 24 * 7));
                    $response->headers->setCookie($cookie);
                    $response->send();
                }
                /* Cookies end */
                return new RedirectResponse($this->generateUrl('user_profile'));
            } else {
                return $this->render('JobPortalFrontBundle:Users:userRegister.html.php', array('categories' => $categories, 'candiLogin' => 'Invalide Connexion Crediential .'));
            }
        } else {

            return $this->render('JobPortalFrontBundle:Users:userRegister.html.php', array('categories' => $categories));
        }
    }

    public function forgetPasswordAction(Request $request) {

        if ($_POST) {
            //print_r($_POST); die;
            $conn = $this->get('database_connection');
            $users = $conn->fetchAll('SELECT * FROM users where email = "' . $_POST['username'] . '" AND status = "1" AND is_deleted = "1" ');

            if (!empty($users)) {

                $time = time();
                $database_number = ($time * $users[0]['id']);
                $number = ($time * $users[0]['id']) - 37856;
                //print_r($number); die;
                $create = array(
                    'forget_password_otp' => $database_number
                );
                $conn->update('users', $create, array('id' => $users[0]['id']));
                $siteurl = $this->get('request')->getSchemeAndHttpHost() . $this->generateUrl('_forget_password', array('slug' => $number));
                //print_r($siteurl);die;
                $to = $users[0]['email'];
                $subject = 'the subject';
                $message = 'Hello Sir<br><br>Your Change Password link is: <a href = "' . $siteurl . '">Here</a>';
                $headers = 'From: info@jobportal.com' . "\r\n" .
                        'Reply-To: info@jobportal.com' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();

                mail($to, $subject, $message, $headers);
                return new RedirectResponse($this->generateUrl('user_register', array('msg_success' => 'Vérifiez votre mail.We envoyer votre changement lien Mot de passe.')));
            } else {
                return new RedirectResponse($this->generateUrl('_forget_password', array('msg_error' => 'Votre offrir email est pas de notre base de données ')));
            }
        } else {
            $current_url = $this->getRequest()->getBaseUrl();
            return $this->render('JobPortalFrontBundle:Users:forgetPassword.html.php', array('actionUrl' => $current_url));
        }
    }

    public function userLoginFacebookAction() {
        define("APPID", "138232979848762");
        define("SECRET", "295758456af501ff08c801ea71bab008");
        require_once(FCPATH . '/application/libraries/facebook/facebook.php');
        $facebook = new Facebook(array(
            'appId' => APPID,
            'secret' => SECRET,
        ));

        $users = $facebook->getUser();
        return $this->render('JobPortalFrontBundle:Users:userLoginFacebook.html.php', array());
    }

    public function userProfileAction(Request $request) {
        $conn = $this->get('database_connection');
        if ($request->getMethod() == 'POST') {
            
        } else {
            $candateDetails = $this->get('session')->get('candidatedata');
            /* Get Cookies Value */
            $user_remember_data = unserialize($this->getRequest()->cookies->get('user_remember_cookies'));
            /* Get Cookies Value End */
            $user_id = $candateDetails['login_candidate_id'];
            $user_data = $conn->fetchAll('SELECT * FROM users WHERE  id = "' . $user_id . '"');
            return $this->render('JobPortalFrontBundle:Users:userProfile.html.php', array('candidateData' => $candateDetails, 'userData' => $user_data, 'user_cookies_remember' => $user_remember_data));
        }
    }

    public function userUpdateAction(Request $request) {
        $conn = $this->get('database_connection');
        $candateDetails = $this->get('session')->get('candidatedata');
        $user_id = $candateDetails['login_candidate_id'];
        if ($request->getMethod() == 'POST') {

            $candidate_array = array(
                'name' => $_POST['name'],
                'address' => $_POST['address'],
                'pin_code' => $_POST['pin_code'],
                'city' => $_POST['city'],
                'phone' => $_POST['phone'],
                'dob' => date('Y-m-d', strtotime($_POST['dob']))
            );
            //print_r($candidate_array);die;
            $conn->update('users', $candidate_array, array('id' => $user_id));
            return new RedirectResponse($this->generateUrl('user_profile'));
        } else {

            $user_data = $conn->fetchAll('SELECT * FROM users WHERE  id = "' . $user_id . '"');
            return $this->render('JobPortalFrontBundle:Users:userUpdate.html.php', array('candidateData' => $user_data));
        }
    }

    public function imageUploadAction(Request $request) {
        $conn = $this->get('database_connection');

        if ($request->getMethod() == "POST") {
            $conn = $this->get('database_connection');
            $image = $request->files->get('image');
             //print_r($image);die;

            if (($image instanceof UploadedFile) && ($image->getError() == '0')) {
                if (($image->getSize() < 2000000)) {
                    $originalName = $image->getClientOriginalName();

                    $name_array = explode(".", $originalName);
                    $file_type = $name_array[sizeof($name_array) - 1];
                    $valid_filetypes = array('jpg', 'jpeg', 'bmp', 'png');
                    if (in_array(strtolower($file_type), $valid_filetypes)) {
                        foreach ($request->files as $uploadedFile) {
                            $directory = $_SERVER['DOCUMENT_ROOT'] . '/arnojobportal/web/uploads/users/';
                            $name_image = time() . '_' . $uploadedFile->getClientOriginalName();
                            //print_r($name_image);die;
                            $file = $uploadedFile->move($directory, $name_image);
                        }
                    } else {
                        print_r("error Size");
                        die;
                    }
                } else {
                    print_r("error Size");
                    die;
                }
            } else {
                print_r("error ");
                die;
            }
            $create = array(
                'image' => $name_image
            );
            $conn->update('users', $create, array('id' => $_POST['user_id']));
            return new RedirectResponse($this->generateUrl('user_profile'));
        }
    }

    public function ajaxregisterCheckAction(Request $request) {
        $conn = $this->get('database_connection');
        if ($request->getMethod() == "POST") {
            $email = $_POST['email_id'];
            $user_data = $conn->fetchAll('SELECT id FROM users WHERE  email = "' . $email . '"');
            $html = '';
            if (!empty($user_data)) {
                $html.= 'error';
            } else {
                $html.= 'success';
            }
            echo $html;
            exit();
        }
    }

    public function userCvAction(Request $request) {

        $candateDetails = $this->get('session')->get('candidatedata');
        $getProfileType = $this->getDoctrine()->getRepository('JobPortalAdminBundle:ProfileType')->findBy(array('isDeleted' => '1', 'status' => '1'));
        if ($request->getMethod() == "POST") {
            $data = $request->request->all(); // receive All data from form           
            $cv_pdf = $request->files->get('cv_in_pdf');
            //print_r($cv_pdf);die;

            if (($cv_pdf instanceof UploadedFile) && ($cv_pdf->getError() == '0')) {
                if (($cv_pdf->getSize() < 20000000)) {
                    $originalName = $cv_pdf->getClientOriginalName();

                    $name_array = explode(".", $originalName);
                    $file_type = $name_array[sizeof($name_array) - 1];
                    $valid_filetypes = array('jpg', 'jpeg', 'bmp', 'png', 'pdf');
                    if (in_array(strtolower($file_type), $valid_filetypes)) {
                        foreach ($request->files as $uploadedFile) {
                            $directory = $_SERVER['DOCUMENT_ROOT'] . '/arnojobportal/web/uploads/userscv/';
                            $name_cv = time() . '_' . $uploadedFile->getClientOriginalName();
                            $file = $uploadedFile->move($directory, $name_cv);
                        }
                    } else {
                        print_r("error Size");
                        die;
                    }
                } else {
                    print_r("error Size");
                    die;
                }
            } else {
                print_r("error ");
                die;
            }
            $created_date = date("Y-m-d H:i:s");
            $looking_for = implode(",", $data['looking_for']);
            $ProfileDetails = new ProfileDetails();
            $ProfileDetails->setUserId($data['user_id']);
            $ProfileDetails->setYourStateOfMind($data['your_state_of_mind']);
            $ProfileDetails->setCvInPdf($name_cv);
            $ProfileDetails->setLookingFor($looking_for);
            $ProfileDetails->setCreatedDate($created_date);
            $ProfileDetails->setStatus(1);
            $ProfileDetails->setIsDeleted(1);
            $em = $this->getDoctrine()->getManager();
            $em->persist($ProfileDetails);
            $em->flush();
            return new RedirectResponse($this->generateUrl('my_cv_details'));
        } else {
            return $this->render('JobPortalFrontBundle:Users:userCv.html.php', array('userSession' => $candateDetails, 'ProfileTypes' => $getProfileType));
        }
    }

    public function mySkillsAction() {
        $candateDetails = $this->get('session')->get('candidatedata');
        $login_user_id = $candateDetails['login_candidate_id'];
        $conn = $this->get('database_connection');
        $score_status = $conn->fetchAll('SELECT c.category, c.id, sum(s.score) as score FROM categories c LEFT JOIN category_user_mappings m ON m.category_id = c.id LEFT JOIN scores s ON s.category_type = m.category_id WHERE m.user_id = '.$login_user_id.' group by  c.id');
        //print_r($score_status); die;
        return $this->render('JobPortalFrontBundle:Users:mySkills.html.php', array( 'scores' => $score_status ));
    }

    public function myCvDetailsAction(Request $request) {
        $candateDetails = $this->get('session')->get('candidatedata');
        $getProfileDetails = $this->getDoctrine()->getRepository('JobPortalAdminBundle:ProfileDetails')->findBy(array('userId' => $candateDetails['login_candidate_id']));
        //print_r($getProfileDetails);die;
        if ($request->getMethod() == "POST") {
            
        } else {
            return $this->render('JobPortalFrontBundle:Users:myCvDetails.html.php', array('profileDetails'=>$getProfileDetails));
        }
    }

}

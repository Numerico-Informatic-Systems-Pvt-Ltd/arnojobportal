<?php

namespace JobPortal\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use JobPortal\FrontBundle\Entity\Employers;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\JsonResponse;

class EmployersController extends Controller {

    public function employerRegisterAction(Request $request) {
        if ($request->getMethod() == 'POST') {
            if ($_POST['g-recaptcha-response'] != '') {
                $data = $request->request->all(); // receive All data from form
                $employer = new Employers();
                $password = chr(rand(65, 90)) . chr(rand(65, 90)) . chr(rand(65, 90)) . chr(rand(65, 90)) . chr(rand(65, 90));
                $employer->setCompanyName($data['company_name']);
                $employer->setAddress($data['address']);
                $employer->setPinCode($data['pin_code']);
                $employer->setCity($data['city']);
                $employer->setCountry($data['country']);
                $employer->setName($data['name'] . ' ' . $data['surname']);
                $employer->setEmail($data['email']);
                $employer->setPassword(md5($password));
                $employer->setPhone($data['phone']);
                $employer->setStatus(1);
                $employer->setIsDeleted(1);
                $em = $this->getDoctrine()->getManager();
                $em->persist($employer);
                $em->flush();

                /* employer mail password */
                $to = $data['email'];
                $subject = 'Inscription Courrier';
                $message = 'Merci pour linscription dans notre site Web. Votre mot de passe une fois de connexion est ' . $password;
                $headers = 'From: info@jobportal.com' . "\r\n" .
                        'Reply-To: info@jobportal.com' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();

                mail($to, $subject, $message, $headers);
                /* employer mail password end */

                /* employer Session Data Set */
                $employer_session_array = array(
                    'login_employer_id' => $employer->getId(),
                    'login_employer_name' => $data['name'] . ' ' . $data['surname']
                );
                $this->get('session')->set('employerdata', $employer_session_array);
                /* employer Session Data Set End */
                return new RedirectResponse($this->generateUrl('employer_change_password'));
            } else {
                return $this->render('JobPortalFrontBundle:Employers:employerRegister.html.php', array('captach_code' => 'Captcha Invalide'));
            }
        } else {
             /* Get Cookies Value */
            $employer_remember_data = unserialize($this->getRequest()->cookies->get('employer_remember_cookies'));
            /* Get Cookies Value End */
            return $this->render('JobPortalFrontBundle:Employers:employerRegister.html.php', array('employer_remember_cookies'=>$employer_remember_data));
        }
    }

    public function employerLoginAction(Request $request) {
        $conn = $this->get('database_connection');
        if ($request->getMethod() == 'POST') {
            $data = $request->request->all(); // receive All data from form
            $email = $data['email'];
            $password = $data['password'];
            $employer = $conn->fetchAll('SELECT * FROM employers WHERE email = "'.$email.'" AND password = "'.md5($password).'"');
            //print_r($employer);die;
            if(!empty($employer)){
                /* employer Session Data Set */
                $employer_session_array = array(
                    'login_employer_id' => $employer[0]['id'],
                    'login_employer_name' => $employer[0]['name']
                );
                $this->get('session')->set('employerdata', $employer_session_array);
                /* employer Session Data Set End */

                /* cookies implements */

                if (isset($_POST['remember_me'])) {
                    $response = new Response();
                    $value = array(
                        'useremail' => $email,
                        'password' => $password
                    );
                    $cookie = new Cookie('employer_remember_cookies', serialize($value), (time() + 3600 * 24 * 7));
                    $response->headers->setCookie($cookie);
                    $response->send();
                }
                /* Cookies end */
                return new RedirectResponse($this->generateUrl('employer_profile'));
            }else{
               return $this->render('JobPortalFrontBundle:Employers:employerRegister.html.php', array('employer_login'=>'Invalide Connexion Crediential .')); 
            }
        } else {
            return $this->render('JobPortalFrontBundle:Employers:employerRegister.html.php', array());
        }
    }

    public function employerChangePasswordAction(Request $request) {
        $employerDetails = $this->get('session')->get('employerdata');
        $conn = $this->get('database_connection');
        $data = $request->request->all();
        if ($request->getMethod() == 'POST') {
            if (!empty($employerDetails)) {
                $pass = array(
                    'password' => md5($data['password'])
                );
                $conn->update('employers', $pass, array('id' => $employerDetails['login_employer_id']));
            }

            return $this->render('JobPortalFrontBundle:Employers:employerChangePassword.html.php', array('change_password_succ' => 'Votre changement de mot de passe avec succès'));
        } else {
            $employerDetails = $this->get('session')->get('employerdata');
            return $this->render('JobPortalFrontBundle:Employers:employerChangePassword.html.php', array('employerData' => $employerDetails));
        }
    }

    public function employerForgetPasswordAction() {
        
        if ($_POST) {
            
            $conn = $this->get('database_connection');
            $employers = $conn->fetchAll('SELECT * FROM employers where email = "' . $_POST['username'] . '" AND status = "1" AND is_deleted = "1" ');

            if (!empty($employers)) {

                $time = time();
                $database_number = ($time * $employers[0]['id']);
                $number = ($time * $employers[0]['id']) - 37856;
                //print_r($number); die;
                $create = array(
                    'forget_password_otp' => $database_number
                );
                $conn->update('employers', $create, array('id' => $employers[0]['id']));
                $siteurl = $this->get('request')->getSchemeAndHttpHost() . $this->generateUrl('employer_forget_password', array('slug' => $number));
                //print_r($siteurl);die;
                $to = $employers[0]['email'];
                $subject = 'the subject';
                $message = 'Hello Sir<br><br>Your Change Password link is: <a href = "' . $siteurl . '">Here</a>';
                $headers = 'From: info@jobportal.com' . "\r\n" .
                        'Reply-To: info@jobportal.com' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();

                mail($to, $subject, $message, $headers);
                //print_r('hiii');die;
                return new RedirectResponse($this->generateUrl('employer_register', array('msg_success' => 'Vérifiez votre mail.We envoyer votre changement lien Mot de passe.')));
            } else {
                return new RedirectResponse($this->generateUrl('employer_forget_password', array('msg_error' => 'Votre offrir email est pas de notre base de données ')));
            }
        } else {
            $current_url = $this->getRequest()->getBaseUrl();
            return $this->render('JobPortalFrontBundle:Employers:employerForgetPassword.html.php', array('actionUrl' => $current_url));
        }
        
    }

    public function employerProfileAction(Request $request) {
         $conn = $this->get('database_connection');
        if ($request->getMethod() == 'POST') {
            
        } else {
            $employerDetails = $this->get('session')->get('employerdata');
            /* Get Cookies Value */
            $employer_remember_data = unserialize($this->getRequest()->cookies->get('employer_remember_cookies'));
            /* Get Cookies Value End */
            $employer_id = $employerDetails['login_employer_id'];
            $employer_data = $conn->fetchAll('SELECT * FROM employers WHERE  id = "' . $employer_id . '"');
            return $this->render('JobPortalFrontBundle:Employers:employerProfile.html.php', array('employerData' => $employerDetails, 'employerData' => $employer_data, 'employer_cookies_remember' => $employer_remember_data));
        }
        
    }

    public function employerUpdateAction(Request $request) {
        $conn = $this->get('database_connection');
        $employerDetails = $this->get('session')->get('employerdata');
        //print_r($employerDetails);die;
        $employer_id = $employerDetails['login_employer_id'];
         if ($request->getMethod() == 'POST') {
              $data = $request->request->all(); // receive All data from form
              $employer_array = array(
                'company_name'=>$data['company_name'],
                'name' => $data['name'],
                'address' => $data['address'],
                'pin_code' => $data['pin_code'],
                'city' => $data['city'],
                'phone' => $data['phone'],
                'country' => $data['country'],
                'dob' => date('Y-m-d', strtotime($data['dob']))
            );
            //print_r($candidate_array);die;
            $conn->update('employers', $employer_array, array('id' => $employer_id));
            return new RedirectResponse($this->generateUrl('employer_profile'));
         }else{
             $employer_data = $conn->fetchAll('SELECT * FROM employers WHERE  id = "' . $employer_id . '"');
             return $this->render('JobPortalFrontBundle:Employers:employerUpdate.html.php', array('employerData'=>$employer_data));
         }
        
    }

    public function ajaxEmployerregisterCheckAction(Request $request) {
        $conn = $this->get('database_connection');
        if ($request->getMethod() == "POST") {
            $email = $_POST['email_id'];
            $employer_data = $conn->fetchAll('SELECT id FROM employers WHERE  email = "' . $email . '"');
            $html = '';
            if (!empty($employer_data)) {
                $html.= 'error';
            } else {
                $html.= 'success';
            }
            echo $html;
            exit();
//            $response = new Response();
//            $response->setContent(json_encode(array('result' => $html,)));
//            $response->headers->set('Content-Type', 'application/json');
//            return $response;
        }
    }

}

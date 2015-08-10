<?php

namespace JobPortal\AdminBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Acme\DemoBundle\Form\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;

class LoginController extends Controller {

    public function indexAction() {
        if($_POST){
            //print_r($_POST); die;
            $conn = $this->get('database_connection');
            $users = $conn->fetchAll('SELECT * FROM admins where email = "'.$_POST['username'].'" AND password = "'.md5($_POST['password']).'" AND status = "1" AND is_deleted = "1" ');
            $count_user = count($users);
            if($count_user>0){
                
                $user_session_array = array(
                                            'login_user_id' => $users[0]['id'],
                                            'login_user_name' => $users[0]['name']
                                        );
                $this->get('session')->set('userdata', $user_session_array);
                
                return new RedirectResponse($this->generateUrl('_dahboard_index'));
            }else{
                return new RedirectResponse($this->generateUrl('_login_index',array('msg_success' => 'Connectez-vous pas réussie')));
            }
        }else{
            $current_url  = $this->getRequest()->getBaseUrl();        
            return $this->render('JobPortalAdminBundle:Login:index.html.php', array('actionUrl' => $current_url));
        }
       
    }
    
    public function forgetPasswordAction(Request $request) {

        if($_POST){
            //print_r($_POST); die;
            $conn = $this->get('database_connection');
            $users = $conn->fetchAll('SELECT * FROM admins where email = "'.$_POST['username'].'" AND status = "1" AND is_deleted = "1" ');
            
            if(!empty($users)){
                
                $time = time();
                $database_number = ($time * $users[0]['id']);
                $number = ($time * $users[0]['id']) - 37856;
                //print_r($number); die;
                $create = array(
                    'forget_password_otp' => $database_number
                );
                $conn->update('admins', $create, array('id' => $users[0]['id']));
                $siteurl = $this->get('request')->getSchemeAndHttpHost().$this->generateUrl('_forget_password', array('slug' => $number));
                
                $to      = $users[0]['email'];
                $subject = 'the subject';
                $message = 'Hello Sir<br><br>Your Change Password link is: <a href = "'.$siteurl.'">Here</a>';
                $headers = 'From: info@jobportal.com' . "\r\n" .
                    'Reply-To: info@jobportal.com' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();

                mail($to, $subject, $message, $headers);
                return new RedirectResponse($this->generateUrl('_login_index',array('msg_success' => 'Vérifiez votre mail.We envoyer votre changement lien Mot de passe.')));
            }else{
                //print_r("redirect ok"); die;
                return new RedirectResponse($this->generateUrl('_forget_password',array('msg_error' => 'Votre offrir email est pas de notre base de données ')));
            }
        }else{
            $current_url  = $this->getRequest()->getBaseUrl();
            return $this->render('JobPortalAdminBundle:Login:forget.html.php', array('actionUrl' => $current_url));
        }
        
        
    }
    
    public function changeForgetPasswordAction() {
        if($_POST){
            $number = $_POST['hid_id'] + 37856;
            //print_r($number); die;
            $conn = $this->get('database_connection');
            $users = $conn->fetchAll('SELECT * FROM admins where forget_password_otp = "'.$number.'" ');
            if(!empty($users)){
                $create = array(
                    'password' => md5($_POST['password'])
                );
                $conn->update('admins', $create, array('id' => $users[0]['id']));
                return new RedirectResponse($this->generateUrl('_login_index',array('msg_success' => 'Votre changement de mot de passe avec succès')));
            }else{
                return new RedirectResponse($this->generateUrl('_login_index',array('msg_success' => 'Vous accédez pas de changer le mot de passe')));
            }
        }else{
            $current_url  = $this->getRequest()->getBaseUrl();        
            return $this->render('JobPortalAdminBundle:Login:change_forget.html.php', array('actionUrl' => $current_url));
        }
       
    }

}

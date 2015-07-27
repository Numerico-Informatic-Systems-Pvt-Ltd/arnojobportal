<?php

namespace JobPortal\AdminBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Acme\DemoBundle\Form\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Session\Session;

class LoginController extends Controller {

    public function indexAction() {
        if($_POST){
            //print_r($_POST); die;
            $conn = $this->get('database_connection');
            $users = $conn->fetchAll('SELECT * FROM admins where email = "'.$_POST['username'].'" AND password = "'.md5($_POST['password']).'" AND status = "1" AND is_deleted = "1" ');
            if(!empty($users[0]['id'])){
                
                $user_session_array = array(
                                            'login_user_id' => $users[0]['id'],
                                            'login_user_name' => $users[0]['name']
                                        );
                $this->get('session')->set('userdata', $user_session_array);
                
                return new RedirectResponse($this->generateUrl('_dahboard_index'));
            }else{
                return new RedirectResponse($this->generateUrl('_login_index'));
            }
        }else{
            $current_url  = $this->getRequest()->getBaseUrl();        
            return $this->render('JobPortalAdminBundle:Login:index.html.php', array('actionUrl' => $current_url));
        }
       
    }

}

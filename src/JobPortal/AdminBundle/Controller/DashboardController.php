<?php

namespace JobPortal\AdminBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

class DashboardController extends Controller
{  
    public function indexAction(){
        $conn = $this->get('database_connection');
        $myService = new DashboardController($this->get('session'));
        $name = $this->get('session')->get('userdata');
        //print_r($name); die;
        if(!empty($name)){
            $admin_data = $name;
            $admin_id = $name['login_user_id'];
            $users = $conn->fetchAll('SELECT * FROM admins where id = "'.$admin_id.'" ');
            return $this->render('JobPortalAdminBundle:Dashboard:index.html.php', array('name' => $name, 'admin_data' => $users ));
        }else{
            return new RedirectResponse($this->generateUrl('_login_index'));
        }
        
    }
    
    public function adminUpdateAction(){
        $conn = $this->get('database_connection');
        $myService = new DashboardController($this->get('session'));
        $name = $this->get('session')->get('userdata');
        
        if(!empty($name)){
            if($_POST){
                $conn = $this->get('database_connection');
                if($_FILES){
                    
                }
                $create = array(
                    'name' =>$_POST['name']
                );
                $conn->update('admins',$create,array('id'=> $_POST['hid_id']));
                return new RedirectResponse($this->generateUrl('_dahboard_index'));
            }else{
                $admin_data = $name;
                $admin_id = $name['login_user_id'];
                $users = $conn->fetchAll('SELECT * FROM admins where id = "'.$admin_id.'" ');
                return $this->render('JobPortalAdminBundle:Dashboard:update.html.php', array('name' => $name, 'admin_data' => $users ));
            }
        }else{
            return new RedirectResponse($this->generateUrl('_login_index'));
        }
        
    }
    
    public function adminChangePasswordAction(){
        
        $conn = $this->get('database_connection');
        $myService = new DashboardController($this->get('session'));
        $name = $this->get('session')->get('userdata');
        $admin_data = $name;
        $admin_id = $name['login_user_id'];
        $users = $conn->fetchAll('SELECT * FROM admins where id = "'.$admin_id.'" ');
        if($_POST){
            if(md5($_POST['old_pass']) == $users[0]['password']){
                $create = array(
                    'password' => md5($_POST['pass'])
                );
                $conn->update('admins',$create,array('id'=> $_POST['hid_id']));
                return new RedirectResponse($this->generateUrl('_dahboard_index'));
            }
        }else{
            return $this->render('JobPortalAdminBundle:Dashboard:changePassword.html.php', array('name' => $name, 'admin_data' => $users ));
        }
    }

}

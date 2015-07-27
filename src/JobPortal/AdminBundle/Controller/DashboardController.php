<?php

namespace JobPortal\AdminBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

class DashboardController extends Controller
{  
    public function indexAction()
    {
        $myService = new DashboardController($this->get('session'));
        $name = $this->get('session')->get('userdata');
        //print_r($name); die;
        if(!empty($name)){
            return $this->render('JobPortalAdminBundle:Dashboard:index.html.php', array('name' => $name ));
        }else{
            return new RedirectResponse($this->generateUrl('_login_index'));
        }
        
    }

}

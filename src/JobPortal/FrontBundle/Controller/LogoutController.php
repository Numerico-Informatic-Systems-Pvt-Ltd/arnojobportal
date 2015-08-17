<?php

namespace JobPortal\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;
class LogoutController extends Controller {

    public function userLogoutAction() {
        $session = $this->get('session');
        $ses_vars = $session->all();
        foreach ($ses_vars as $key => $value) {
            $session->remove($key);
        }
        return new RedirectResponse($this->generateUrl('user_register'));
        
    }

}

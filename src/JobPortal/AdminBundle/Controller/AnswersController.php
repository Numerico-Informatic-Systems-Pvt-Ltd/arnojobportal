<?php

namespace JobPortal\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AnswersController extends Controller
{
    public function indexAction()
    {
        return $this->render('JobPortalAdminBundle:Answers:index.html.php', array(
                // ...
            ));    }

}

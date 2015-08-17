<?php

namespace JobPortal\AdminBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JobPortal\AdminBundle\Entity\Categories;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

class CategoriesController extends Controller {

    public function indexAction() {
        $categories = $this->getDoctrine()->getRepository('JobPortalAdminBundle:Categories')->findBy(array('isDeleted' => '1'));
        return $this->render('JobPortalAdminBundle:Categories:index.html.php', array('categories' => $categories));
    }

    public function addAction() {

        if ($_POST) {
            $category = new Categories();
            $category->setCategory($_POST['category']);
            $category->setDescription($_POST['details']);
            $category->setStatus($_POST['status']);
            $category->setIsDeleted('1');
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();
        }

        return $this->render('JobPortalAdminBundle:Categories:add.html.php', array());
    }

    public function editAction($id) {
        $category = $this->getDoctrine()->getRepository('JobPortalAdminBundle:Categories')->find($id);
        if ($_POST) {
            $category->setCategory($_POST['category']);
            $category->setDescription($_POST['details']);
            $category->setStatus($_POST['status']);
            $category->setIsDeleted('1');
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();
            return new RedirectResponse($this->generateUrl('_category_index'));
        } else {

            if (!$category) {
                throw $this->createNotFoundException('No data found for id ' . $id);
            }
            return $this->render('JobPortalAdminBundle:Categories:edit.html.php', array('category' => $category));
        }
    }

}

<?php

namespace JobPortal\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use JobPortal\AdminBundle\Entity\Categories;
use JobPortal\AdminBundle\Entity\Questions;
use JobPortal\AdminBundle\Entity\Answers;

class QuestionsController extends Controller {

    public function indexAction() {
        $categories = $this->getDoctrine()->getRepository('JobPortalAdminBundle:Categories')->findBy(array('isDeleted' => '1', 'status' => '1'));
        return $this->render('JobPortalAdminBundle:Questions:index.html.php', array('category' => $categories));
    }

    public function addAction(Request $request) {

        $categories = $this->getDoctrine()->getRepository('JobPortalAdminBundle:Categories')->findBy(array('isDeleted' => '1', 'status' => '1'));
        if ($request->getMethod() == 'POST') {

            $question = new Questions();
            $category = new Categories();
            $question->setQuestion($_POST['question']);
            $question->setStandardType($_POST['standard_type']);
            $question->setMarksPositive($_POST['marks_positive']);
            $question->setMarksNegative($_POST['marks_negative']);
            $question->setStatus($_POST['status']);
            $question->setIsDeleted('1');
            $em = $this->getDoctrine()->getManager();
            $category = $em->getRepository('JobPortalAdminBundle:Categories')->find($_POST['category_id']);
            $question->setCategory($category);
            $em->persist($question);
            foreach ($_POST['answer'] as $key => $ans) {
                $answer = new Answers();
                $answer->setQuestion($question);
                $answer->setAnswer($ans);
                if (!empty($_POST['answer_status'][$key])) {
                    $answer->setAnswerStatus($_POST['answer_status'][$key]);
                } else {
                    $answer->setAnswerStatus(0);
                }
                $answer->setStatus('1');
                $answer->setIsDeleted('1');
                $em->persist($answer);
            }

            $em->flush();
            return new RedirectResponse($this->generateUrl('_question_index'));
        } else {
            return $this->render('JobPortalAdminBundle:Questions:add.html.php', array('categories' => $categories));
        }
    }

    public function ajaxQuestionViewAction(Request $request) {
        $categories = $this->getDoctrine()->getRepository('JobPortalAdminBundle:Categories')->findBy(array('isDeleted' => '1', 'status' => '1'));
        $category_id = $_GET['category_id'];
        $conn = $this->get('database_connection');
        $question = $conn->fetchAll('SELECT q.* FROM questions q  where q.category_id = "' . $category_id . '" AND q.is_deleted = 1');
        return $this->render('JobPortalAdminBundle:Questions:view.html.php', array('questions' => $question, 'category' => $categories, 'catg_id' => $category_id));
    }

    public function detailsQuestionViewAction() {

        $question_id = $_GET['id'];
        $conn = $this->get('database_connection');
        $answers = $conn->fetchAll('SELECT q.*,a.* FROM questions q LEFT JOIN answers a ON q.id = a.question_id where a.question_id = "' . $question_id . '"');
        return $this->render('JobPortalAdminBundle:Questions:questionDetails.html.php', array('answers' => $answers));
    }

    public function updateQuestionAction() {
        $conn = $this->get('database_connection');
        if ($_POST) {

            $sql = "DELETE FROM answers WHERE answers.question_id = :fieldoneid";
            $params = array('fieldoneid' => $_POST['question_id']);
            $em = $this->getDoctrine()->getManager();
            $stmt = $em->getConnection()->prepare($sql);
            $stmt->execute($params);
            $question_array = array(
                'question' => $_POST['question'],
                'standard_type' => $_POST['standard_type'],
                'marks_positive' => $_POST['marks_positive'],
                'marks_negative' => $_POST['marks_negative'],
                'status' => $_POST['status']
            );
            $conn->update('questions', $question_array, array('id' => $_POST['question_id']));
            //print_r($_POST['answer']);die;
            foreach ($_POST['answer'] as $key => $ans) {
                $ans_array = array(
                    'question_id' => $_POST['question_id'],
                    'answer' => $ans,
                );
                if (!empty($_POST['answer_status'][$key])) {
                    $ans_array['answer_status'] = $_POST['answer_status'][$key];
                } else {

                    $ans_array['answer_status'] = '0';
                }

                $conn->insert('answers', $ans_array);
                
            }
            return new RedirectResponse($this->generateUrl('_question_index'));
        } else {
            $question_id = $_GET['id'];
            $question = $conn->fetchAll('SELECT q.*,a.* FROM questions q LEFT JOIN answers a ON q.id = a.question_id where a.question_id = "' . $question_id . '"');
            return $this->render('JobPortalAdminBundle:Questions:update.html.php', array('question' => $question, 'question_id' => $question_id));
        }
    }

}

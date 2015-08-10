<?php

namespace JobPortal\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class OnlineTestController extends Controller
{
    public function fetchCategoryAction(){
        $conn = $this->get('database_connection');
        $categories = $conn->fetchAll('SELECT c.*, p.category as parent_category FROM categories c LEFT JOIN categories p ON p.id = c.parent_id order by parent_id ');
        //print_r($category); die;
        foreach($categories as $category){
            $category_array[$category['parent_id']][$category['id']] = $category;
        }
        return $this->render('JobPortalFrontBundle:OnlineTest:fetchCategory.html.php', array( 'categories' => $category_array ));
        
    }

    public function beginTestAction()
    {
        return $this->render('JobPortalFrontBundle:OnlineTest:beginTest.html.php', array(  ));    }

    public function testExamsAction()
    {
        $conn = $this->get('database_connection');
        $questions = $conn->fetchAll('SELECT * FROM questions');
        $questions_json = json_encode($questions);
        return $this->render('JobPortalFrontBundle:OnlineTest:testExams.html.php', array( 'questions' => $questions_json ));    
        
    }
    
    public function answerOfQuestionAction(Request $request)
    {
        if($request->getMethod() == "GET"){
            $qid = $request->query->get('question_id');
            //  print_r($request->query->get('question_id')); 
            //  die;
            $conn = $this->get('database_connection');
            $answers = $conn->fetchAll('SELECT * FROM answers where question_id = '.$qid);
            
        }
        
        $response = new Response();
        $response->setContent(json_encode(array(
            'data' => $answers,
        )));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
        
    }

    public function testScoreAction()
    {
        return $this->render('JobPortalFrontBundle:OnlineTest:testScore.html.php', array(  ));    }

}

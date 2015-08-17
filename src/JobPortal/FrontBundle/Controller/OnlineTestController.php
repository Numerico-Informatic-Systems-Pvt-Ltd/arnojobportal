<?php

namespace JobPortal\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use JobPortal\FrontBundle\Entity\Scores;

class OnlineTestController extends Controller {

    public function fetchCategoryAction() {
        $conn = $this->get('database_connection');
        
        $categories = $conn->fetchAll('SELECT c.*, p.category as parent_category FROM categories c LEFT JOIN categories p ON p.id = c.parent_id order by parent_id ');
        //print_r($category); die;
        foreach ($categories as $category) {
            $category_array[$category['parent_id']][$category['id']] = $category;
        }
        return $this->render('JobPortalFrontBundle:OnlineTest:fetchCategory.html.php', array('categories' => $category_array));
    }

    public function beginTestAction($id) {
        //print_r($id); die;
        $conn = $this->get('database_connection');
        $category = $conn->fetchAll('SELECT * FROM categories WHERE id = ' . $id );
        $data_output = array(
            'exam_category' => $category[0]['category'],
            'exam_category_id' => $category[0]['id'],
        );
        return $this->render('JobPortalFrontBundle:OnlineTest:beginTest.html.php', $data_output );
    }

    public function testExamsAction($id) {
        $conn = $this->get('database_connection');
        $already_questions = $conn->fetchAll('SELECT * FROM scores WHERE category_type = "' . $id . '" AND user_id = "5" ');
        $array_marge_question = array();
        foreach($already_questions as $already_question){
            $already_question_array = explode(",", $already_question['question']);
            $array_marge_question = array_merge($array_marge_question, $already_question_array);
        }
        
        //print_r($array_marge_question); die;
        $string_marge_question = implode("," , $array_marge_question);
        //id not in(' . $avoid . ')
        if(!empty($string_marge_question)){
            $questions = $conn->fetchAll('SELECT * FROM questions where category_id = ' . $id . ' AND id not in(' . $string_marge_question . ') ORDER BY RAND() limit 0,6 ' );
        }else{
            $questions = $conn->fetchAll('SELECT * FROM questions where category_id = ' . $id . '  ORDER BY RAND() limit 0,6 ' );
        }
        foreach($questions as $key => $question){
            $array_question_answer[$key] = $question;
            $array_question_answer[$key]['answer'] = $conn->fetchAll('SELECT * FROM answers where question_id = ' . $question['id']);
        
            //$answers[$question['id']] = json_encode($ans_array);
        }
//        $data_array[] = $questions;
//        $data_array[] = $answers;
        //$data_array['answer'] = $answers;
        //print_r($array_question_answer); // die;
        $questions_json = json_encode($array_question_answer);
        //$answers_json = json_encode($answers);
        return $this->render('JobPortalFrontBundle:OnlineTest:testExams.html.php', array('questions' => $questions_json ));
    }

    public function answerOfQuestionAction(Request $request) {
//        if ($request->getMethod() == "GET") {
//            $qid = $request->query->get('question_id');
//            //  print_r($request->query->get('question_id')); 
//            //  die;
//            $conn = $this->get('database_connection');
//            $answers = $conn->fetchAll('SELECT * FROM answers where question_id = ' . $qid);
//        }
//
//        $response = new Response();
//        $response->setContent(json_encode(array(
//            'data' => $answers,
//        )));
//        $response->headers->set('Content-Type', 'application/json');
//        return $response;
//        if ($request->getMethod() == "POST") {
//            $qid = $request->query->post('msg');
//        }
        //$name_array = $_POST['msg'];
        //print_r($qid); die;
    }

    public function testScoreAction(Request $request) {
        $conn = $this->get('database_connection');
        if ($request->getMethod() == "POST") {
            $answer_arr = $request->request->all();
            //print_r($answer_arr); die;
            $score = 0;
            $total_marks = 0;
            $total_questions = 0;
            $correct_answer = 0;
            foreach($answer_arr['question_answer'] as $question => $answer){
                $answer_status = $conn->fetchAll('SELECT q.*, a.* FROM questions q LEFT JOIN answers a ON a.question_id = q.id where q.id = "'.$question.'" AND a.id = "'.$answer.'" ');
                $total_marks = $total_marks + $answer_status[0]['marks_positive'];
                $total_questions = $total_questions + 1;
                if($answer_status[0]['answer_status']){
                    $score = $score + $answer_status[0]['marks_positive'];
                    $correct_answer = $correct_answer + 1;
                }else{
                    $score = $score - $answer_status[0]['marks_negative'];
                }
                $array_question[] = $question;
            }
            $exam_name = $conn->fetchAll('SELECT id,category FROM categories WHERE id = ' . $answer_status[0]['category_id']);
            
            $question_string = implode(",", $array_question);
            $date = date("Y-m-d H:i:s");
            //print_r($date); die;
            $scores = new Scores();
            $scores->setCategoryType($answer_status[0]['category_id']);
            $scores->setUserId('5');
            $scores->setDate($date);
            $scores->setScore($score);
            $scores->setTotalMarks($total_marks);
            $scores->setQuestion($question_string);
            $em = $this->getDoctrine()->getManager();
            $em->persist($scores);
            $em->flush();
        }
        $data_output = array( 
            'correct_answer' => $correct_answer,
            'total_questions' => $total_questions,
            'score' => $score,
            'total_marks' => $total_marks,
            'exam_name' => $exam_name[0]['category'],
            'exam_id' => $exam_name[0]['id']
        );
        return $this->render('JobPortalFrontBundle:OnlineTest:testScore.html.php', $data_output );
    }

}

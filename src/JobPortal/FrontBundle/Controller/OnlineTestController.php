<?php

namespace JobPortal\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use JobPortal\FrontBundle\Entity\Scores;
use JobPortal\FrontBundle\Entity\CategoryUserMappings;

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
        $candateDetails = $this->get('session')->get('candidatedata');
        $login_user_id = $candateDetails['login_candidate_id'];
        $conn = $this->get('database_connection');
        $already_questions = $conn->fetchAll('SELECT * FROM scores WHERE category_type = "' . $id . '" AND user_id = "'.$login_user_id.'" ');
        $array_marge_question = array();
        foreach($already_questions as $already_question){
            $already_question_array = explode(",", $already_question['question']);
            $array_marge_question = array_merge($array_marge_question, $already_question_array);
        }
        $string_marge_question = implode("," , $array_marge_question);
        if(!empty($string_marge_question)){
            $questions = $conn->fetchAll('SELECT * FROM questions where category_id = ' . $id . ' AND id not in(' . $string_marge_question . ') ORDER BY RAND() limit 0,6 ' );
        }else{
            $questions = $conn->fetchAll('SELECT * FROM questions where category_id = ' . $id . '  ORDER BY RAND() limit 0,5 ' );
        }
        foreach($questions as $key => $question){
            $array_question_answer[$key] = $question;
            $array_question_answer[$key]['answer'] = $conn->fetchAll('SELECT * FROM answers where question_id = ' . $question['id']);
            $total_questions_id[] = $question['id'];
        }
        $questions_json = json_encode($array_question_answer);
        $total_questions_id_json = json_encode($total_questions_id);
        return $this->render('JobPortalFrontBundle:OnlineTest:testExams.html.php', array('questions' => $questions_json, 'total_questions_id' => $total_questions_id_json ));
    }

    public function testScoreAction(Request $request) {
        
        $candateDetails = $this->get('session')->get('candidatedata');
        $login_user_id = $candateDetails['login_candidate_id'];
        $conn = $this->get('database_connection');
        if ($request->getMethod() == "POST") {
            $answer_arr = $request->request->all();
            $score = 0;
            $total_marks = 0;
            $total_questions = 0;
            $correct_answer = 0;
            if(!empty($answer_arr['given_question_answer'])){
                foreach($answer_arr['given_question_answer'] as $key => $data){
                    $answer_status = $conn->fetchAll('SELECT q.*, a.* FROM questions q LEFT JOIN answers a ON a.question_id = q.id where q.id = "'.$data['question'].'" AND a.id = "'.$data['answer'].'" ');
                    $total_marks = $total_marks + $answer_status[0]['marks_positive'];
                    if($answer_status[0]['answer_status']){
                        $score = $score + $answer_status[0]['marks_positive'];
                        $correct_answer = $correct_answer + 1;
                    }else{
                        $score = $score - $answer_status[0]['marks_negative'];
                    }
                    $array_question[] = $data['question'];
                }
            }
            if(!empty($answer_arr['total_question_id'])){
                foreach($answer_arr['total_question_id'] as $question_key){
                    $total_questions = $total_questions + 1;
                    if (in_array( $question_key, $array_question)) {
                        
                    }else{
                        $not_attend_answer = $conn->fetchAll('SELECT q.* FROM questions q where q.id = "'.$question_key.'" ');
                        $total_marks = $total_marks + $not_attend_answer[0]['marks_positive'];
                        
                        $score = $score - $not_attend_answer[0]['marks_negative'];
                    }
                }
            }
            $em = $this->getDoctrine()->getManager();
            $exam_name = $conn->fetchAll('SELECT id,category FROM categories WHERE id = ' . $answer_status[0]['category_id']);
            $question_string = implode(",", $array_question);
            $date = date("Y-m-d H:i:s");
            $exam_category = $conn->fetchAll('SELECT * FROM category_user_mappings WHERE user_id = ' . $login_user_id . ' AND category_id = ' . $answer_status[0]['category_id'] );
            if(empty($exam_category)){
                $CategoryUserMappings = new CategoryUserMappings();
                $CategoryUserMappings->setUserId($login_user_id);
                $CategoryUserMappings->setCategoryId($answer_status[0]['category_id']);
                $em->persist($CategoryUserMappings);
                $em->flush();
            }
            $scores = new Scores();
            $scores->setCategoryType($answer_status[0]['category_id']);
            $scores->setUserId($login_user_id);
            $scores->setDate($date);
            $scores->setScore($score);
            $scores->setTotalMarks($total_marks);
            $scores->setQuestion($question_string);
            
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
        $this->get('session')->set('exam_data', $data_output);
        return new Response();
    }
    
    public function resultScoreAction(Request $request) {
        $data_output = $this->get('session')->get('exam_data');
        
        return $this->render('JobPortalFrontBundle:OnlineTest:testScore.html.php', $data_output );
    }
    
    public function searchExamAction(Request $request) {
        $conn = $this->get('database_connection');
        if ($request->getMethod() == "GET") {
            $search_key = $_GET['search'];
            $categories = $conn->fetchAll('SELECT c.*, p.category as parent_category FROM categories c LEFT JOIN categories p ON p.id = c.parent_id WHERE c.category LIKE "%'.$search_key.'%" OR p.category LIKE "%'.$search_key.'%" ');
        
        }
        return $this->render('JobPortalFrontBundle:OnlineTest:searchCategory.html.php', array( 'categories' => $categories ));
    }

}

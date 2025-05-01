<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Quiz_model');
        $this->load->library('session');
        $this->load->helper('url');

        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('error', 'Please login to access the quiz');
            redirect('login');
        }
    }


    public function index() {
        $data['questions'] = $this->Quiz_model->get_questions();
        $data['stuname'] = $this->session->userdata('name');
        $data['stuid'] = $this->session->userdata('user_id');
        // $this->session->userdata('quiz_id');
        // $data['quiz'] =  //7
        $this->session->set_userdata('quiz_id', 7);
        $data['quizname'] = $this->Quiz_model->get_quiz_name();
        $data['quiz'] = $this->session->userdata('quiz_id');
    //     print_r($data); 
    //    die("Asdfa");
        $this->load->view('website/quiz', $data);
    }

    public function indexa($quizid=null) {
       // print_r($this->session->userdata()); 

        $data['questions'] = $this->Quiz_model->get_questions();
        $data['stuname'] = $this->session->userdata('name');
        $data['stuid'] = $this->session->userdata('user_id');
        // $this->session->userdata('quiz_id');
        // $data['quiz'] =  //7
        // $this->session->set_userdata('quiz_id', 7);
        //print_r($quizid); die("Asda");

        $this->session->set_userdata('quiz_id', $quizid);
        $data['quizname'] = $this->Quiz_model->get_quiz_name();
        $data['quiz'] = $this->session->userdata('quiz_id');
        // $data['quiz'] = $quizid;

    //    print_r($data); 
    //    die("Asdfa");
        $this->load->view('website/quiz', $data);
    }

    public function submit_answer() {
        $question_id = $this->input->post('question_id');
        $selected_option = $this->input->post('selected_option');
        $this->session->set_userdata('answer_' . $question_id, $selected_option);
        echo 'saved';
    }

    public function result() {
        $questions = $this->Quiz_model->get_questions();
        $correct = 0;
        foreach ($questions as $q) {
            $user_answer = $this->session->userdata('answer_' . $q->id);
            if ($user_answer == $q->correct_option) {
                $correct++;
            }
        }
        $data['correct'] = $correct;
        $data['total'] = count($questions);
        $this->load->view('quiz/result', $data);
    }
}

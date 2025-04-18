<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QuizController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Quiz_model');
        $this->load->library('session');
    }

    public function save() {
        $data = [
            'title' => $this->input->post('title'),
            'subtitle' => $this->input->post('subtitle'),
            'duration_minutes' => $this->input->post('duration_minutes'),
        ];

        $quiz_id = $this->Quiz_model->insert_quiz($data);

        if ($quiz_id) {
            // store in session
            $this->session->set_userdata('quiz_id', $quiz_id);
            redirect('QuestionController/add'); // page to add questions
        } else {
            echo "Error saving quiz.";
        }
    }
}

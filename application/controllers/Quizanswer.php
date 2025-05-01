<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quizanswer extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// if($this->session->userdata('uk_adminLoggedinId') == '')
		// {
		// 	redirect('Login/index');
		// }
		$this->load->model('Quiz_model'); // <-- Ye line zaroori hai
		$this->load->model('Quizans_model'); // <-- Ye line zaroori hai

	}

	public function save_answer11() {
		// Get POST data
		$quiz_id = $_POST['quiz_id'];
		$question_number = $_POST['question_number'];
		$selected_answer = $_POST['selected_answer'];
	
		// User ID - session se ya pass karo
		$user_id = $_SESSION['user_id'] ?? 1; // fallback 1 for demo
	
		// created_at
		$created_at = date('Y-m-d H:i:s');
	
		// Insert query
		$data = array(
			'user_id'         => $user_id,
			'quiz_id'         => $quiz_id,
			'question_id'     => $question_number,
			'selected_answer' => $selected_answer,
			'created_at'      => $created_at
		);
	
		// Insert into DB (assuming CodeIgniter model is loaded)
		$this->db->insert('answers', $data);
		echo "Answer Saved Successfully";
	}


	public function save_answer111() {
		// Get POST data
		$quiz_id         = $_POST['quiz_id'];
		$question_id     = $_POST['question_number']; // actually this is question_id
		$selected_answer = $_POST['selected_answer'];
	
		// User ID - session se ya pass karo
		$user_id = $_SESSION['user_id'] ?? 1; // fallback for demo
	
		// Time
		$now = date('Y-m-d H:i:s');
	
		// Prepare data
		$data = array(
			'user_id'         => $user_id,
			'quiz_id'         => $quiz_id,
			'question_id'     => $question_id,
			'selected_answer' => $selected_answer,
			'updated_at'      => $now
		);
	
		// Check if entry exists
		$this->db->where('user_id', $user_id);
		$this->db->where('quiz_id', $quiz_id);
		$this->db->where('question_id', $question_id);
		$query = $this->db->get('answers');
	
		if ($query->num_rows() > 0) {
			// Exists → Update
			$this->db->where('user_id', $user_id);
			$this->db->where('quiz_id', $quiz_id);
			$this->db->where('question_id', $question_id);
			$this->db->update('answers', $data);
			echo "Answer Updated Successfully";
		} else {
			// Doesn't exist → Insert
			$data['created_at'] = $now;
			$this->db->insert('answers', $data);
			echo "Answer Saved Successfully";
		}
	}


	public function save_answer() {
		// Get POST data
		header('Content-Type: application/json'); 
		$quiz_id         = $_POST['quiz_id'];
		$question_id     = $_POST['question_number'];
		$selected_answer = $_POST['selected_answer'];
	
		// User ID - session se ya pass karo
		$user_id = $_SESSION['user_id'] ?? 1;
	
		// Time
		$now = date('Y-m-d H:i:s');
	
		// Prepare data
		$data = array(
			'user_id'         => $user_id,
			'quiz_id'         => $quiz_id,
			'question_id'     => $question_id,
			'selected_answer' => $selected_answer,
			'updated_at'      => $now
		);
	
		// Check if already answered
		$this->db->where('user_id', $user_id);
		$this->db->where('quiz_id', $quiz_id);
		$this->db->where('question_id', $question_id);
		$query = $this->db->get('answers');
	
		if ($query->num_rows() > 0) {
			// Already exists → Update
			$this->db->where('user_id', $user_id);
			$this->db->where('quiz_id', $quiz_id);
			$this->db->where('question_id', $question_id);
			$this->db->update('answers', $data);
			$message = "Answer Updated Successfully";
		} else {
			// Not exists → Insert
			$data['created_at'] = $now;
			$this->db->insert('answers', $data);
			$message = "Answer Saved Successfully";
		}
	
		// Get total quiz questions
		$this->db->where('quiz_id', $quiz_id);
		$total_questions = $this->db->count_all_results('questions');
	
		// Get total attempted by this user for this quiz
		$this->db->where('quiz_id', $quiz_id);
		$this->db->where('user_id', $user_id);
		$total_attempted = $this->db->count_all_results('answers');
	
		// Calculate not attempted
		$not_attempted = $total_questions - $total_attempted;
	
		// Return JSON
		echo json_encode(array(
			'status'          => true,
			'message'         => $message,
			'total_questions' => $total_questions,
			'attempted'       => $total_attempted,
			'not_attempted'   => $not_attempted
		));
	}
	
	



	public function get_quiz_meta($quiz_id=1) {
		
		$quiz_id = $this->session->userdata('quiz_id');
		$quiz = $this->Quizans_model->get_quiz_by_id($quiz_id);
		$total_questions = $this->Quizans_model->count_questions($quiz_id);
		$quesIds = $this->Quizans_model->getQuesIds($quiz_id);
		$qanswer = (object)$this->Quizans_model->qanswer($user_id=1,$quiz_id=1);
		echo json_encode([
			'duration' => $quiz->duration_minutes,
			'total_questions' => $total_questions,
			'total_marks' => $total_questions,
			'quesIds' => $quesIds,
			'qanswer' => $qanswer->count,
			'qanswerAtt' => $qanswer->ids		 
		]);
	}


	public function count_questions($quiz_id) {
		$this->load->model('Quiz_model');
		$count = $this->Quiz_model->get_question_count($quiz_id);
		echo json_encode(['total_questions' => $count]);
	}
	

	public function get_question() {
		$quiz_id = $this->input->post('quiz_id');
		$question_number = $this->input->post('question_number');
		$user_id = $this->input->post('user_id');

		$question = $this->Quizans_model->get_question_by_number($quiz_id, $question_number);
		$answer = $this->Quizans_model->get_user_answer($user_id,$quiz_id, $question_number); // optional
		 
		
		echo json_encode([
			'question' => $question,
			'selected_answer' => $answer??''
		]);
	}


	public function save_or_update_answer($user_id, $quiz_id, $question_id, $selected_answer) {
		// Prepare data
		$data = [
			'user_id'        => $user_id,
			'quiz_id'        => $quiz_id,
			'question_id'    => $question_id,
			'selected_answer'=> $selected_answer,
			'updated_at'     => date('Y-m-d H:i:s')
		];
	
		// Check if already exists
		$this->db->where('user_id', $user_id);
		$this->db->where('quiz_id', $quiz_id);
		$this->db->where('question_id', $question_id);
		$query = $this->db->get('answers');
	
		if ($query->num_rows() > 0) {
			// Exists → update
			$this->db->where('user_id', $user_id);
			$this->db->where('quiz_id', $quiz_id);
			$this->db->where('question_id', $question_id);
			return $this->db->update('answers', $data);
		} else {
			// Doesn't exist → insert
			$data['created_at'] = date('Y-m-d H:i:s'); // optional
			return $this->db->insert('answers', $data);
		}
	}
	
}
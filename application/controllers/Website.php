<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends CI_Controller {



	public function __construct() {
		parent::__construct();
		$this->load->model('Quizans_model');
		$this->load->model('Quiz_model');
	}
	
	public function index()
	{
		$where  			= array('status'=>'active');
		
		$id 				= 'position';
		$data['sliders']   = $this->login_model->getWhereAndOrderBy('slider',$where,$id);
		$data['courses']   = $this->login_model->getWhereAndOrderBy('courses',$where,$id);
		$this->load->view('website/index',$data);
	}
	
	
	public function Not_found()
	{
		$this->load->view('website/not_found');
	}
	
	public function about_us()
	{
		$this->load->view('website/about_us');
	}
	
	public function contact()
	{
		$this->load->view('website/contact');
	}

	public function quiz()
	{
		$this->load->view('website/quiz');
	}
	
	public function registration()
	{
		$this->load->view('website/registration');
	}
	
	public function userlogin()
	{
		$this->load->view('website/userlogin');
	}
	
	public function quizresult()
	{
		echo $quiz_id = 7;//$this->session->userdata('quiz_id');
		echo $user_id = 7;//$this->session->userdata('user_id');
		$this->session->set_userdata('quiz_id', 7);

		// Null check
		if (!$quiz_id || !$user_id) {
			show_error('Quiz or User ID missing!');
			return;
		}

		$data['quiz_id'] = $quiz_id;
		$data['user_id'] = $user_id;
		$data['result'] = $this->Quizans_model->get_user_quiz_result($user_id, $quiz_id);
		$data['stuname'] = $this->session->userdata('name');
		$data['quizname'] = $this->Quiz_model->get_quiz_name();

		//print_r($data);
		//die("ASdf");


		$this->load->view('website/quizresult', $data); // Pass $data here
	}
	
	
	
	
	
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends CI_Controller {



	public function __construct() {
		parent::__construct();
		$this->load->model('Quizans_model');
		$this->load->model('Quiz_model');
		$this->load->library('session');
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
		$data['courses'] = $this->db->get_where('courses', ['status' => 1])->result();
		$this->load->view('website/about_us',$data);
	}
	
	public function contact()
	{
		$this->load->view('website/contact');
	}

	public function quiz()
	{
	 
		$this->load->view('website/quiz');
	}

	public function quiza($id=null)
	{
		// $data[]
		$user_id=$this->session->userdata('user_id');
		if($user_id){
			$this->load->view('website/quiz',$data);
		}else{
			$this->load->view('website/userlogin');
		}
	}
	
	
	public function registration()
	{
		$this->load->view('website/registration');
	}

	public function compiler()
	{
		$this->load->view('website/compiler');
	}
	
	public function userlogin()
	{
		// $this->session->set_userdata('redirect_after_login', current_url());
		$user_id = $this->session->userdata('user_id');
		
		if ($user_id) {
			// Redirect to homepage (index method of Website controller)
			redirect(base_url('website'));
		} else {
			// Load login view
			$this->load->view('website/userlogin');
		}
	}
	
	public function quizresult()
	{
		//echo $quiz_id = 7;//$this->session->userdata('quiz_id');
		//echo $user_id = 7;//$this->session->userdata('user_id');
		$quizlist =$this->session->userdata('quizlist');
		$quiz_id =$this->session->userdata('quiz_id');
		$user_id =$this->session->userdata('user_id');
		$this->session->set_userdata('quiz_id', $quiz_id);

		// Null check
		if (!$quiz_id || !$user_id) {
			show_error('Quiz or User ID missing!');
			return;
		}

		$data['quizlist'] = $quizlist;
		$data['quiz_id'] = $quiz_id;
		$data['user_id'] = $user_id;
		$data['result'] = $this->Quizans_model->get_user_quiz_result($user_id, $quiz_id);
		$data['stuname'] = $this->session->userdata('name');
		$data['quizname'] = $this->Quiz_model->get_quiz_name();

		$this->db->query("DELETE FROM answers WHERE user_id = '$user_id' AND quiz_id = '$quiz_id'");
		$this->db->query("UPDATE quizzes SET attempted = attempted + 1 WHERE quiz_id = '$quiz_id'");
		//print_r($data);
		//die("ASdf");
        $this->session->set_userdata('redirect_after_login', current_url());
        $this->session->set_userdata('quiz_reset', 1);
		$this->load->view('website/quizresult', $data); // Pass $data here
	}
	
	public function coursedetails22($course_id = null,$chapter_id=null)
	{

		$query = $this->db->get_where('chapters', ['course_id' => $course_id]);
		$chapters = $query->result(); 
		$course = $this->db->get_where('courses', ['id' => $course_id])->row();
		$data['course'] = $course;
		$data['chapters'] = $chapters;
		$data['chapter_id'] = $chapter_id;
		$this->load->view('website/course-details', $data);
	}

	public function coursedetails($course_id = null, $chapter_id = null)
	{
		// Static SQL queries
		$chapter_query = $this->db->query("SELECT * FROM chapters WHERE course_id = '$course_id'");
		$chapters = $chapter_query->result(); 

		$course_query = $this->db->query("SELECT * FROM courses WHERE id = '$course_id'");
		$course = $course_query->row();

		$subject_id_query = $this->db->query("SELECT subject_id FROM chapters WHERE course_id = '$course_id'");
		$subject_id = $subject_id_query->result(); 


		$mysub_query = $this->db->query("SELECT * FROM subjects WHERE course_id = '$course_id'");
	    $mysub = $mysub_query->result(); 

		$data['course'] = $course;
		$data['chapters'] = $chapters;
		$data['chapter_id'] = $chapter_id;

		$data['subject_id'] = $subject_id;
		$data['mysub'] = $mysub;



		$this->load->view('website/course-details', $data);
	}
	
	public function quizlist($course_id = null)
	{
	    $this->session->set_userdata('quiz_reset', 0);
 		$this->session->set_userdata('quizlist',$course_id);
		$course = $this->db->get_where('courses', ['id' => $course_id])->row();

		$quizzes = $this->db->get_where('quizzes', ['course_id' => $course_id])->result();
		

		// select answers where quiz_id 
		// select questions  where  quiz_id 

		$data['course'] = $course;
		$data['quizzes'] = $quizzes;
		$this->load->view('website/quizlist', $data);
		
	}

	public function logout()
	{
		// Destroy the session
		$this->session->unset_userdata('name'); // remove specific user data
		$this->session->sess_destroy(); // destroy entire session

		// Optionally set a flash message
		$this->session->set_flashdata('success', 'You have been logged out successfully.');

		// Redirect to login page or homepage
		redirect('userlogin');
	}


	public function privacypolicy(){
		$data['quizzes'] = '';
		$this->load->view('website/privacypolicy', $data);
	}

	
	public function termsconditions(){
		$data['quizzes'] = '';
		$this->load->view('website/termsconditions', $data);
	}


	
	
	
}

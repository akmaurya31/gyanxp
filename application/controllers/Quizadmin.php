<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quizadmin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('uk_adminLoggedinId') == '')
		{
			redirect('Login/index');
		}
		$this->load->model('Quiz_model'); // <-- Ye line zaroori hai
		$this->load->model('Course_model'); // <-- Ye line zaroori hai

	}

	public function dashboard()
	{
		//$data['branchList'] = $this->master_model->getData('branches');
		$this->load->view('administrator/dashboard');
	}


    #========================== User Profile Section Start ===============================#
    public function profile()
	{
	    $where  = array('id'=>$this->session->userdata('uk_adminLoggedinId'));
	    $data['profileDetails']  = $this->login_model->getWhere('users',$where);

		$this->load->view('administrator/profile',$data);
	}
	public function UpdateProfile(){
	    $id    = $this->session->userdata('uk_adminLoggedinId');
	    $name  = $this->input->post('name');
	    $this->form_validation->set_rules('name','Name','required');
	    if($this->form_validation->run()==true){
	        $updateArray = array('name'=>$name);
	        if(!empty($_FILES['thumbnail']['name'])){
	            if($this->input->post("added_image"))
	            {
	              unlink($this->input->post("added_image"));
	            }
	            
	            $config['upload_path'] = './profiles/';
	            $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';

	            $this->upload->initialize($config);
	            if ($this->upload->do_upload('thumbnail')) {
	                $image_data = $this->upload->data();
	                $data['thumbnail'] = 'profiles/'.$image_data['file_name'];
	                $updateArray = array('thumbnail'=>$data['thumbnail']);
	            }
	            
	        }
	        $this->login_model->updateData('users',$updateArray,$id);
	        $this->session->set_flashdata('success','Profile Updated');
	        redirect('Master/profile');
	    }
	    else{
	        $this->session->set_flashdata('error','something went wrong!');
	        redirect('Master/profile');
	    }
	}

	public function UpdateProfilePassword(){

	    $this->form_validation->set_rules('password','New Password','required');
		$this->form_validation->set_rules('cpassword','Confirm New Password','required|matches[password]');
		if($this->form_validation->run()==TRUE){
	        $newPassword = $this->input->post('password');
	        $updateArray  = array('password'=>md5($newPassword));
	        $id  = $this->session->userdata('uk_adminLoggedinId');
	        $this->login_model->updateData('users',$updateArray,$id);
		    // $this->session->unset_userdata('uk_adminLoggedinId');
            // $this->session->unset_userdata('uk_adminLoggedinAdmin');
		    $this->session->set_flashdata('success','Successfully changed Password');
            $this->session->set_flashdata('seconds_redirect', 5);
            $this->session->set_flashdata('url_redirect', base_url('Login'));
		    //$this->session->sess_destroy();

		    redirect('Master/profile','refresh');

		}
		else{
		    $this->session->set_flashdata('error','Something went wrong!');
		    $this->profile();
		}
	}

	public function updateQues22($id, $data) {
        return $this->db->where('id', $id)->update('questions', $data);
    }


	
	public function editQuiz($id) {
		// Get quiz details by ID
		$quiz = $this->Quiz_model->getQuizById($id);
		$course = $this->Course_model->get($quiz->course_id);
		//print_r($course); die("Asdf");
	
		if (!$quiz) {
			$this->session->set_flashdata('error', 'Quiz not found.');
			redirect('Quizadmin/listQuiz');
		}
	
		$data['quiz'] = $quiz;
		$data['quiz_id'] = $quiz->id; // 'id' ho to use karo, ya quiz_id as per DB
		$data['mode'] = 'edit';
		$data['ccourse'] = $course;
		$data['courses']=$this->Course_model->get_all(); 

		// Assuming the correct view for quiz editing
		$this->load->view('administrator/create_quiz', $data);
	}


	public function updateQues($id) {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$data = [
				'question_en'    => $this->input->post('question_en'),
				'question_hi'    => $this->input->post('question_hi'),
				'option_a_en'    => $this->input->post('option_a_en'),
				'option_a_hi'    => $this->input->post('option_a_hi'),
				'option_b_en'    => $this->input->post('option_b_en'),
				'option_b_hi'    => $this->input->post('option_b_hi'),
				'option_c_en'    => $this->input->post('option_c_en'),
				'option_c_hi'    => $this->input->post('option_c_hi'),
				'option_d_en'    => $this->input->post('option_d_en'),
				'option_d_hi'    => $this->input->post('option_d_hi'),
				'correct_option' => $this->input->post('correct_option'),
			];
	
			$this->load->model('Quiz_model');
			$this->Quiz_model->updateQues($id, $data);
	
			$this->session->set_flashdata('success', 'Question updated successfully!');
			redirect('Quizadmin/listQues');
		} else {
			$data['question'] = $this->Quiz_model->getQuestionById($id);
			$this->load->view('administrator/edit_ques', $data);
		}
	}

    #====================================== User Profile Segment Ends ====================================#
 
    /* ================  Latest Blog ========================= */
		public function manageBlogs()
	    {
	    	$data['Blogs']  = $this->Admin_model->getData('blogs');
			$this->load->view('administrator/quizAdmin',$data);
	    }

	    public function add()
		{
			$this->load->view('administrator/addQuiz');
		}
		
		public function addQuiz()
		{
			$data['courses']=$this->Course_model->get_all(); // get_all() returns list of course objects
			// $data['quiz'] = $this->Quiz_model->get($id); // if editing
			// $this->load->view('quiz_form', $data);
			$this->load->view('administrator/create_quiz',$data);
		}

		public function addQues()
		{
			$quiz_id = $this->session->userdata('quiz_id'); 
			$data['mode'] = 'add';
			$this->load->view('administrator/create_ques',$data);
		}


		public function listQuiz()
		{
			// $data['quizzes'] = $this->Quiz_model->getAllQuizzes();  
			$data['quizzes'] = $this->Quiz_model->getQuizCourse();
			$this->load->view('administrator/quizlist', $data);  
		}

		public function listQues($quiz_id = 1)
		{
			$data['questions'] = $this->Quiz_model->getQuestionQuizzes($quiz_id); 
			$data['quiz_id'] = $quiz_id; // optional: agar view me chahiye

			$this->session->set_userdata('quiz_id', $quiz_id);

			$this->load->view('administrator/queslist', $data);
		}





		public function addQues1() {
			$quiz_id = $this->session->userdata('quiz_id');
			if (!$quiz_id) {
				redirect('QuizController/create'); // force to create quiz first
			}
		
			// Load view to add questions
			$this->load->view('add_question');
		}



		public function quiz_save() {
			$data = [
				'title' => $this->input->post('title'),
				'subtitle' => $this->input->post('subtitle'),
				'duration_minutes' => $this->input->post('duration_minutes'),
				'course_id' => $this->input->post('course_id'),
			];
		
			$quiz_id = $this->input->post('id'); // edit mode me hidden id milega
		
			if ($quiz_id) {
				// Edit mode
				$updated = $this->Quiz_model->updateQuiz($quiz_id, $data);
		
				if ($updated) {
					$this->session->set_flashdata('success', 'Quiz updated successfully.');
				} else {
					$this->session->set_flashdata('error', 'Error updating quiz.');
				}
		
			} else {
				// Create mode
				$quiz_id = $this->Quiz_model->insert_quiz($data);
		
				if ($quiz_id) {
					// Store in session if needed
					$this->session->set_userdata('quiz_id', $quiz_id);
					$this->session->set_flashdata('success', 'Quiz created successfully.');
				} else {
					$this->session->set_flashdata('error', 'Error saving quiz.');
				}
			}
		
			redirect('Quizadmin/listQuiz');
		}
		


		public function save()
		{
			date_default_timezone_set('Asia/Kolkata');
		    $currentDate  = date('d-m-Y h:i:s A');

			$this->load->model('Question_model');
	
			// File Upload Handling
			$config['upload_path'] = './questions/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$this->load->library('upload', $config);
	
			$image_name = '';
			if ($this->upload->do_upload('image')) {
				$upload_data = $this->upload->data();
				$image_name = $upload_data['file_name'];
			}
	
			$quiz_id = $this->session->userdata('quiz_id');
			if (!$quiz_id) {
				// Agar session se quiz_id nahi mila, redirect ya error
				show_error('Quiz ID not found. Please create quiz first.');
			}

			$data = [
				'quiz_id'        => $quiz_id, // quiz_id hardcoded or get from hidden field
				'question_en'    => $this->input->post('question_en'),
				'question_hi'    => $this->input->post('question_hi'),
				'option_a_en'    => $this->input->post('option_a_en'),
				'option_a_hi'    => $this->input->post('option_a_hi'),
				'option_b_en'    => $this->input->post('option_b_en'),
				'option_b_hi'    => $this->input->post('option_b_hi'),
				'option_c_en'    => $this->input->post('option_c_en'),
				'option_c_hi'    => $this->input->post('option_c_hi'),
				'option_d_en'    => $this->input->post('option_d_en'),
				'option_d_hi'    => $this->input->post('option_d_hi'),
				'correct_option' => $this->input->post('correct_option'),
				'image'          => $image_name,
			];
	
			$this->Question_model->insert($data);
			$this->session->set_flashdata('success', 'Question Saved!');

			redirect('Quizadmin/listQues/' . $quiz_id);
		}


		public function editQues($question_id)
		{
			$question = $this->Quiz_model->getQuestionById($question_id);

			if (!$question) {
				$this->session->set_flashdata('error', 'Question not found.');
				redirect('Quizadmin/listQues');
			}

			$data['question'] = $question;
			$data['quiz_id'] = $question->quiz_id;
			$data['mode'] = 'edit';

			$this->load->view('administrator/create_ques', $data);
		}



		public function SaveBlog11()
		{
		    date_default_timezone_set('Asia/Kolkata');
		    $currentDate  = date('d-m-Y h:i:s A');
		    $tbl = "blogs";

		    // Generate slug
		    $text = !empty($this->input->post('slug')) ? $this->input->post('slug') : $this->input->post('heading') . time();
		    $slug = $this->slugify($text);

		    // Upload config
		    $upload_path = './blog_image/';
		    if (!is_dir($upload_path)) {
		        mkdir($upload_path, 0777, true); // Create folder if it doesn't exist
		    }

		    $config['upload_path'] = $upload_path;
		    $config['allowed_types'] = 'jpg|png|gif|jpeg';
		    $config['max_size'] = 2048; // Max size in KB (2MB)
		    $config['file_name'] = time() . '_' . $_FILES['image']['name'];
		    
		    $this->load->library('upload', $config);

		    if (!$this->upload->do_upload('image')) {
		        // Upload failed
		        $this->session->set_flashdata('error', $this->upload->display_errors());
		        redirect('Master/addBlog');
		    } else {
		        // Upload success
		        $uploadData = $this->upload->data();
		        $image_path = 'blog_image/' . $uploadData['file_name'];

		        // Optional image resize (you can remove this if not needed)
		        $resize_config['image_library'] = 'gd2';
		        $resize_config['source_image'] = $uploadData['full_path'];
		        $resize_config['maintain_ratio'] = TRUE;
		        $resize_config['width'] = 800;
		        $resize_config['height'] = 600;

		        $this->load->library('image_lib', $resize_config);
		        $this->image_lib->resize();

		        // Insert blog to DB
		        $inArray = array(
		            'heading'            => $this->input->post('heading'),
		            'short_description'  => $this->input->post('short_description'),
		            'description'        => $this->input->post('description'),
		            'image'              => $image_path,
		            'position'           => $this->input->post('position'),
		            'status'             => $this->input->post('status'),
		            'inserted_on'        => $currentDate,
		            'slug'               => $slug
		        );

		        $blog_id = $this->Admin_model->insertData($tbl, $inArray);
		        if ($blog_id) {
		            $this->session->set_flashdata('success', 'Blog added successfully.');
		        } else {
		            $this->session->set_flashdata('error', 'Failed to add blog.');
		        }
		        redirect('Master/addBlog');
		    }
		}


	    public function editBlog($id)
		{
			$where  = array('id'=>$id);
			$data['blogs']  = $this->Admin_model->getWhere('blogs',$where); 
			$this->load->view('administrator/editBlog',$data);
		}

		public function UpdateBlog()
		{
		    date_default_timezone_set('Asia/Kolkata');
		    $currentDate  = date('d-m-Y H:i');

		    $id = $this->input->post('id');

		    // Generate slug
		    $text = !empty($this->input->post('slug')) ? $this->input->post('slug') : $this->input->post('heading') . time();
		    $slug = $this->slugify($text);

		    $updateArray = array(
		        'heading'            => $this->input->post('heading'),
		        'short_description'  => $this->input->post('short_description'),
		        'description'        => $this->input->post('description'),
		        'position'           => $this->input->post('position'),
		        'status'             => $this->input->post('status'),
		        'last_updated_on'    => $currentDate,
		        'slug'               => $slug
		    );

		    // Handle image upload
		    if (!empty($_FILES['image']['name'])) {
		        $upload_path = './blog_image/';
		        

		        // Delete previous image
		        if ($this->input->post("added_image") && file_exists($this->input->post("added_image"))) {
		            unlink($this->input->post("added_image"));
		        }

		        $config['upload_path'] = $upload_path;
		        $config['allowed_types'] = 'jpg|jpeg|png|gif';
		        $config['file_name'] = time() . '_' . $_FILES['image']['name'];
		        $config['max_size'] = 2048;

		        $this->load->library('upload', $config);

		        if (!$this->upload->do_upload('image')) {
		            $this->session->set_flashdata('error', $this->upload->display_errors());
		            redirect('Master/editBlog/' . $id);
		        } else {
		            $uploadData = $this->upload->data();
		            $image_path = 'blog_image/' . $uploadData['file_name'];

		            // Optional image resize
		            $resize_config['image_library'] = 'gd2';
		            $resize_config['source_image'] = $uploadData['full_path'];
		            $resize_config['maintain_ratio'] = TRUE;
		            $resize_config['width'] = 800;
		            $resize_config['height'] = 600;

		            $this->load->library('image_lib', $resize_config);
		            $this->image_lib->resize();

		            $updateArray['image'] = $image_path;
		        }
		    }

		    // Update in database
		    $this->Admin_model->updateData('blogs', $updateArray, $id);

		    $this->session->set_flashdata('success', 'Blog information updated!');
		    redirect('Master/editBlog/' . $id);
		}

	    public function deleteBlog($id)
	    {
	        $this->session->set_flashdata('error','Blog deleted');
	        $query  = $this->db->query("select * from blogs where id = '{$id}'");
	        foreach($query->result() as $row){
	          unlink($row->image);
	        }
	        $this->db->where('id',$id);
	        $this->db->delete('blogs');
	        redirect('Master/manageBlogs'); 
	    }

	    public function DeactiveBlog($id)
		{
			$tbl = 'blogs';
	        $return = $this->Admin_model->inactiveStatusById($tbl,$id);
	        if($return==1)
	        {
	          $this->session->set_flashdata("error","Blog Deactivate Successfully");
	          redirect('Master/manageBlogs'); 
	        }
	        else
	        {
	          $this->session->set_flashdata("error","Update Failed");
	          redirect('Master/manageBlogs'); 
	        }
		}

		public function ActiveBlog($id)
		{
			$tbl = 'blogs';
	        $return = $this->Admin_model->activeStatusById($tbl,$id);
	        if($return==1)
	        {
	          $this->session->set_flashdata("success","Blog activate Successfully");
	          redirect('Master/manageBlogs'); 
	        }
	        else
	        {
	          $this->session->set_flashdata("error","Update Failed");
	          redirect('Master/manageBlogs'); 
	        }
		}

		function slugify($text)
		{
		// replace non letter or digits by -
		    $text = preg_replace('~[^\pL\d]+~u', '-', $text);

		    $text = mb_convert_encoding((string)$text, 'UTF-8', mb_list_encodings());
		    // transliterate
		    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

		    // remove unwanted characters
		    $text = preg_replace('~[^-\w]+~', '', $text);

		    // trim
		    $text = trim($text, '-');

		    // remove duplicated - symbols
		    $text = preg_replace('~-+~', '-', $text);

		    // lowercase
		    $text = strtolower($text);

		    if (empty($text)) {
		      return 'n-a';
		    }

		    return $text;
		}


		public function save_answer() {
			$quiz_id = $this->input->post('quiz_id');
			$question_number = $this->input->post('question_number');
			$selected_answer = $this->input->post('selected_answer');
		  
			$question = $this->Quiz_model->get_question_by_number($quiz_id, $question_number);
			$user_id = $this->session->userdata('user_id');
		    if($question->id){
			$this->Quiz_model->save_user_answer($user_id, $quiz_id, $question->id, $selected_answer);
			}
		  }
		  




}
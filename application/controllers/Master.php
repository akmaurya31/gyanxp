<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('uk_adminLoggedinId') == '')
		{
			redirect('Login/index');
		}

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

    #====================================== User Profile Segment Ends ====================================#



    /* ================  Latest Blog ========================= */
		public function manageBlogs()
	    {
	    	$data['Blogs']  = $this->Admin_model->getData('blogs');
			$this->load->view('administrator/manageBlogs',$data);
	    }

	    public function addBlog()
		{
			$this->load->view('administrator/addBlog');
		}

		public function SaveBlog()
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




}
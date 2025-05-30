<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subjects extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('uk_adminLoggedinId') == '')
		{
			redirect('Login/index');
		}
		$this->load->model('Course_model');

	}

	public function index()
	{
		// $data['courses'] = $this->Course_model->get_all();
     //   $subject_query  = $this->db->query("SELECT * FROM subjects");
        $subject_query = $this->db->query("
            SELECT 
                subjects.*, 
                courses.course_name
            FROM subjects 
            LEFT JOIN courses ON courses.id = subjects.course_id
        "); 
        $subjects = $subject_query->result();
        $data['subjects']=$subjects;
		$this->load->view('administrator/ManageSubjects',$data);
	}

	public function addNewSubject()
    {
        // Fetch all courses from 'courses' table
        $course_query = $this->db->query("SELECT * FROM courses");
        $courses = $course_query->result();
        $data['courses'] = $courses;

        // Load the view
        $this->load->view('administrator/addNewSubject', $data);
    }

	public function EditNewSubject($id)
	{
		// $data['course'] = $this->Course_model->get($id);
         $course_query = $this->db->query("SELECT * FROM subjects where id='$id'");
         $rs = $course_query->row();
         $data['rs'] = $rs;

            $course_query = $this->db->query("SELECT * FROM courses");
            $courses = $course_query->result();
            $data['courses'] = $courses;

		$this->load->view('administrator/EditNewSubject',$data);
	}

    public function create() {
            $course_id =  $this->input->post('course_id');
            $subject_name =  $this->input->post('subject_name');
            $insert_data = array(
                'course_id' => $course_id,  
                'title'     => $subject_name,       
            );
            $this->db->insert('subjects', $insert_data);
            $this->session->set_flashdata('success', 'Course Added!');
            redirect('Subjects/index');
    }

    public function Update() {
        $subject_name = $this->input->post('subject_name');
        $course_id = $this->input->post('course_id');
        $id = $this->input->post('subid');
        // Step 2: Raw SQL UPDATE query
        $this->db->query("UPDATE subjects SET title = ?, course_id = ? WHERE id = ?", [
            $subject_name,
            $course_id,
            $id
        ]);
        // Step 3: Optionally fetch updated row
        $query = $this->db->query("SELECT * FROM subjects WHERE id = ?", [$id]);
        $rs = $query->row();
        redirect('Subjects/index');
    }


    public function edit($id) {
        $data['course'] = $this->Course_model->get($id);
        $this->_set_validation();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('administrator/edit/'.$id, $data);
        } else {
            $update = $this->_get_post_data();
            if ($_FILES['image']['name']) {
                $update['image'] = $this->_upload_image();
            }
            $this->Course_model->update($id, $update);
            $this->session->set_flashdata('success','course updated!');
            redirect('Courses/index');
        }
    }

    public function DeleteNewSubject($id) {
        // Step 1: Raw SQL DELETE query
        $this->db->query("DELETE FROM subjects WHERE id = '$id'");
        // Step 2: Flash message
        $this->session->set_flashdata('success', 'Row deleted!');
        // Step 3: Redirect to courses page
        redirect('Subjects/index');
    }

    private function _set_validation() {
        $this->form_validation->set_rules('name', 'Course Name', 'required');
        $this->form_validation->set_rules('duration', 'Duration', 'required');
        $this->form_validation->set_rules('fee', 'Fees', 'required');
        $this->form_validation->set_rules('syllabus', 'Syllabus', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('position', 'Position', 'integer');
    }

    private function _get_post_data() {
        return [
            'course_name' => $this->input->post('name'),
            'course_duration' => $this->input->post('duration'),
            'course_fees' => $this->input->post('fee'),
            'course_syllabus' => $this->input->post('syllabus'),
            'status' => $this->input->post('status'),
            'position' => $this->input->post('position')
        ];
    }

    private function _upload_image() {
        $config['upload_path'] = './uploads/courses/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048;
        $config['encrypt_name'] = TRUE;

        $this->upload->initialize($config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data('file_name');
        } else {
            return '';
        }
    }

    // public function listChapter() {
    //     die("Asda");
    
    // }

    public function listChapter($course_id = 1)
    {
        // echo $course_id;
        // die("ASdfas");
        // Load chapters based on course_id
        $data['chapters'] = $this->Course_model->getChaptersWithTopics($course_id); 
        // Optional: if you want to use course_id in view
       // print_r($data); die("Asdf");


        $data['course_id'] = $course_id;
        $data['pagination'] = $course_id;
        // Load the view

       // 

        $this->load->view('administrator/listchapter', $data);
    }


    public function listtopic($chapter_id = 1)
    {
        $data['chapter'] = $this->Course_model->getTopic($chapter_id); 
        $data['topics'] = $this->Course_model->mgetTopic($chapter_id); 
        $this->load->view('administrator/listtopic', $data);
    }
    // getTopic

    public function addNewChapter($course_id = 1)
    {
        $data['course_id'] = $course_id;  
        $data['fff'] = 1;  

        $this->load->view('administrator/addNewChapter', $data);
    }

    public function ChapterCreate()
    {
        $this->form_validation->set_rules('course_id', 'Course ID', 'required|numeric');
        $this->form_validation->set_rules('chapter_title', 'Chapter Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('order', 'Order', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('administrator/addNewChapter'); // View file ka naam
        } else {
            $data = [
                'course_id' => $this->input->post('course_id'),
                'chapter_title' => $this->input->post('chapter_title'),
                'description' => $this->input->post('description'),
                'order' => $this->input->post('order'),
            ];
            $ccourse_id=$this->input->post('course_id');
            $this->db->insert('chapters', $data);
            $this->session->set_flashdata('success', 'Chapter added successfully');
            // redirect('Courses/addNewChapter/'.$ccourse_id);
            redirect('Courses/listChapter/'.$ccourse_id);
        }
    }
    
    


}
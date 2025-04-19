<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends CI_Controller {
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
		$data['courses'] = $this->Course_model->get_all();
		$this->load->view('administrator/ManageCoures',$data);
	}

	public function addNewCourse()
	{
		$this->load->view('administrator/addNewCourse');
	}
	public function EditNewCourse($id)
	{
		$data['course'] = $this->Course_model->get($id);
		$this->load->view('administrator/EditNewCourse',$data);
	}

	public function create() {
        $this->_set_validation();

        if ($this->form_validation->run() == FALSE) {
            $this->addNewCourse();
        } else {
            $data = $this->_get_post_data();
            if ($_FILES['image']['name']) {
                $data['image'] = $this->_upload_image();
            }
            $this->Course_model->insert($data);
            $this->session->set_flashdata('success','Course Added!');
            redirect('Courses/index');
        }
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

    public function delete($id) {
        $this->Course_model->delete($id);
        $this->session->set_flashdata('error','Row deleted!');
        redirect('Courses/index');
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

    public function addNewChapter()
    {
        $this->load->view('administrator/addNewChapter');
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
            $this->db->insert('chapters', $data);
            $this->session->set_flashdata('success', 'Chapter added successfully');
            redirect('Courses/addNewChapter');
        }
    }
    
    


}
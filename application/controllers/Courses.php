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




}
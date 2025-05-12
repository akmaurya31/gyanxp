<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coursesadmin extends CI_Controller {
	public function __construct()
	{
		
		parent::__construct();
		if($this->session->userdata('uk_adminLoggedinId') == '')
		{
			redirect('Login/index');
		}
		$this->load->model('Course_model');

	}

	public function chapteredit($course_id = null)
	{
		// die("Asdfa");
		if (!$course_id) {
			show_404(); // agar ID nahi mili to 404 dikha do
		}

		$this->load->model('Course_model');

		// Model se course/chapter details le lo
		$data['rs'] = $this->Course_model->getCourseById($course_id);

		// Agar data nahi mila to bhi error dikha do
		if (empty($data['rs'])) {
			show_error('Course not found!');
		}

		$rscourse_id=$data['rs']->course_id;
		$subject_query = $this->db->query("SELECT * FROM subjects where course_id=$rscourse_id");
		$subjects = $subject_query->result(); 
        $data['fff'] = 1;  
        $data['subjects'] = $subjects;  

		// print_r($data); die("Asdf");

		$this->load->view('administrator/chapteredit', $data);
	}

	public function UpdateChapter()
{

    // Step 1: Check POST data
    if ($this->input->post()) {
        $chapter_id   = $this->input->post('chapter_id');
        $chapter_title = $this->input->post('chapter_title');
        $course_id    = $this->input->post('course_id');
        $description  = $this->input->post('description');
        $subject_id  = $this->input->post('subject_id');

        // Step 2: Validate basic fields
        if (!$chapter_id || !$chapter_title) {
            $this->session->set_flashdata('error', 'Chapter ID and Name are required.');
            // redirect('Coursesadmin/chapteredit/' . $course_id);
            redirect('Courses/listChapter/' . $course_id);
        }

        // Step 3: Run update query (without model)
        $data = [
            'chapter_title' => $chapter_title,
            'description'  => $description,
            'subject_id'  => $subject_id,
        ];

        $this->db->where('id', $chapter_id);
        $update = $this->db->update('chapters', $data);

        // Step 4: Feedback and redirect
        if ($update) {
            $this->session->set_flashdata('success', 'Chapter updated successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to update chapter.');
        }

        // redirect('Coursesadmin/chapteredit/' . $course_id);
        redirect('Courses/listChapter/' . $course_id);
    } else {
        show_404(); // If not a POST request
    }
}

	public function chapterdelete($chapter_id = null)
	{
		// Chapter ID GET/POST se le lo
		if ($chapter_id) {
			// Delete query run karo
			$this->db->where('id', $chapter_id);
			$deleted = $this->db->delete('chapters');

			if ($deleted) {
				$this->session->set_flashdata('success', 'Chapter deleted successfully.');
			} else {
				$this->session->set_flashdata('error', 'Chapter deletion failed.');
			}
		} else {
			$this->session->set_flashdata('error', 'Invalid chapter ID.');
		}

		redirect('Courses/listchapter'); // Yahan apni list wali page ka URL daal
	}

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enquiries extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('uk_adminLoggedinId') == '')
		{
			redirect('Login/index');
		}

	}

	public function index()
	{
        $get          = $this->db->select('*')->from('appointment')->order_by('id','DESC')->get();
        $data['list'] = $get->result();
		$this->load->view('administrator/enquiries',$data);
	}
	
	public function deleteEnquiry($id)
	{
        $del = $this->db->query("DELETE FROM appointment WHERE id = $id");
	    if($del){
	        $this->session->set_flashdata('success',$name.' Deleted successfuly.');
	    }else{
            $this->session->set_flashdata('error',"Can't Delete ".$name." this time. Please try later.");
        }
        redirect('Enquiries/index');
	}

	public function manageContactQuery()
	{
		$get = $this->db->select('*')->from('enquiries')->order_by('id','DESC')->get();
        $data['list'] = $get->result();
		$this->load->view('administrator/manageContactQuery',$data);
	}

	public function deleteContacts($id)
	{
        $del = $this->db->query("DELETE FROM contacts WHERE id = $id");
	    if($del){
	        $this->session->set_flashdata('success',$name.' Deleted successfuly.');
	    }else{
            $this->session->set_flashdata('error',"Can't Delete ".$name." this time. Please try later.");
        }
        redirect('Enquiries/manageContactQuery');
	}

	



}
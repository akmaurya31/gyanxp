<?php
class Admin_model extends CI_Model
{
	public function __construct(){
      parent::__construct();
    }
    public function getData($tbl)
    {
        $query = $this->db->get($tbl);
        return $query->result();
    }
	
	public function getWhere($tbl,$where)
	{
	  $query = $this->db->get_where($tbl,$where);
	  return $query->result();
	}
	public function getByStatus($tbl,$status)
	{
	  $query = $this->db->get_where($tbl,$status);
	  return $query->result();
	}
	

	public function updateData($tbl,$updateArray,$id)
	{
		$this->db->where('id', $id);
        $this->db->update($tbl, $updateArray);
	}

	public function insertData($tbl,$inArray)
	{
        $this->db->insert($tbl, $inArray);
		$lid=$this->db->insert_id();
		return $lid;
	}
	public function inactiveStatusById($tbl,$id){
    $data = array('status' =>'inactive');
    $this->db->where('id', $id);
    if($this->db->update($tbl,$data));
	    {
	      return 1;
	    }
  	}
  	public function activeStatusById($tbl,$id){
    $data = array('status' =>'active');
    $this->db->where('id', $id);
    if($this->db->update($tbl,$data));
	    {
	      return 1;
	    }
  	}

  	public function deleteData($tbl,$where)
	{
		$this->db->delete($tbl,$where); 
	}
	
	public function check_last_application_number(){
          $a = $this->db->select('registration_n')
                        ->from('admission_form')
                        ->order_by('id',"DESC")
                        ->limit(1)
                        ->get();
        return $a->result_array();
      }

public function GetStudentInformationByPositions($value='')
{
	$a = $this->db->select('*')
                        ->from('toppers_student')
                        ->order_by('position',"ASC")
                        ->get();
        return $a->result();
}

public function getEnquiryByDesc($tbl){
    $a = $this->db->select('*')
                        ->from($tbl)
                        ->order_by('id',"DESC")
                        ->get();
        return $a->result();
}
	

	
}
<?php
    class Login_model extends CI_Model{
    public function __construct(){
      parent::__construct();
      $this->load->database();
    }
    /*  ================================   insert enquiry   =============================================== */
    public function getWhere($tbl,$where)
    {
      $query = $this->db->get_where($tbl,$where);
      return $query->result();
    }

    public function getWhereAndOrderBy($tbl,$where,$orderBy)
    {
    	$this->db->select('*');            
			$this->db->from($tbl);             
			$this->db->where($where);
			$this->db->order_by($orderBy, 'ASC');   
			$query = $this->db->get();           
			return $query->result(); 
    }

    public function getWhereAndStatus($tbl,$slug)
    {
    	$this->db->select('*,members.name as mname,expertises.name as ename');            
			$this->db->from('members');             
			$this->db->where('members.status','active');
			$this->db->where('members.slug',$slug);
			$this->db->join('expertises','members.areas_of_expertise=expertises.id'); 
			$query = $this->db->get();           
			return $query->result(); 

    }

    public function insertData($tbl,$data)
    {
          $this->db->insert($tbl, $data);
      $lid=$this->db->insert_id();
      return $lid;
    }
    
    public function updateData($tbl,$updateArray,$id)
	{
		$this->db->where('id', $id);
        $this->db->update($tbl, $updateArray);
	}
    
    
    
    // Password update
    function checkUser($email,$password)
	{
		$query = $this->db->query("SELECT * from users where email='$email' AND password='$password'");
		if($query->num_rows()==1)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}

	function checkCurrentPassword($currentPassword)
	{
		$userid = $this->session->userdata('LoginSession')['id'];
		$query = $this->db->query("SELECT * from users WHERE id='$userid' AND password='$currentPassword' ");
		if($query->num_rows()==1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function updatePassword($password)
	{
		$userid = $this->session->userdata('LoginSession')['id'];
		$query = $this->db->query("update  users set password='$password' WHERE id='$userid' ");
		
	}

	function validateEmail($email)
	{
		$query = $this->db->query("SELECT * FROM users WHERE email='$email'");
		if($query->num_rows() == 1)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}

	function updatePasswordhash($data,$email)
	{
		$this->db->where('email',$email);
		$this->db->update('users',$data);
	}
	
	function getHahsDetails($hash)
	{
		$query =$this->db->query("select * from users WHERE hash_key='$hash'");
		if($query->num_rows()==1)
		{
			return $query->row();
		}
		else
		{
			return false;
		}

	}

	function validateCurrentPassword($hash)
	{
		$query = $this->db->query("SELECT * FROM users WHERE hash_key='$hash'");
		if($query->num_rows()==1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function updateNewPassword($data,$hash)
	{
		$this->db->where('hash_key',$hash);
		$this->db->update('users',$data);
	}

	public function getMemberByGroup()
	{
		$this->db->select('*');            
		$this->db->from('members');             
		$this->db->where('status','active');
		$this->db->order_by('position', 'ASC');   
		$this->db->limit(2);
		$query = $this->db->get();           
		return $query->result(); 
	}

	public function ExludeGroupmembers()
	{
		$this->db->select('*');
		$this->db->from('members');
		$this->db->where_not_in('id', [7, 11]);  // Exclude these ids
		$query = $this->db->get();
		return $query->result();
	}

	
  public function insert($data) {
      return $this->db->insert('memberships', $data);
  }

  public function get_all() {
	  return $this->db->order_by('id', 'DESC')->get('memberships')->result();
	}

	public function getLatestBlogListByDescOrder($limit = null) {
      $this->db->select('*');
      $this->db->from('blogs');
      $this->db->order_by('position', 'ASC');
      
      if ($limit) {
          $this->db->limit($limit);
      }
      
      $query = $this->db->get();
      return $query->result();
  }



    
  }
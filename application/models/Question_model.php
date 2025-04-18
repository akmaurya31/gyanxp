<?php 
class Question_model extends CI_Model
{
    public function insert($data)
    {
        $data['created_at'] = date('Y-m-d H:i:s');
        return $this->db->insert('questions', $data);
    }
}

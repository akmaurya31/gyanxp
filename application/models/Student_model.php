<?php 
class Student_model extends CI_Model {

public function save($data) {
    return $this->db->insert('student_registration', $data);
}

public function getUserByEmail($email) {
    $query = $this->db->get_where('student_registration', array('email' => $email));
    return $query->row(); // return single row as object
}

}

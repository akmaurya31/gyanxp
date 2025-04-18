<?php
class Course_model extends CI_Model {

    public function get_all() {
        return $this->db->order_by('position')->get('courses')->result();
    }

    public function get($id) {
        return $this->db->get_where('courses', ['id' => $id])->row();
    }

    public function insert($data) {
        return $this->db->insert('courses', $data);
    }

    public function update($id, $data) {
        return $this->db->where('id', $id)->update('courses', $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('courses');
    }
}

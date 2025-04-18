<?php
    class Slider_model extends CI_Model{
    public function __construct(){
      parent::__construct();
      $this->load->database();
    }
    public function insert_slider($data) {
        $data['inserted_date'] = date('Y-m-d H:i:s');
        $data['last_updated'] = date('Y-m-d H:i:s');
        return $this->db->insert('slider', $data);
    }

    public function update_slider($id, $data) {
        $data['last_updated'] = date('Y-m-d H:i:s');
        return $this->db->where('id', $id)->update('slider', $data);
    }

    public function get_all_sliders()
    {
        $this->db->order_by('position', 'ASC');
        $this->db->where('status', 'active');
        $query = $this->db->get('slider');
        return $query->result();
    }


}

?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {
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
        $data['list']   = $this->slider_model->get_all_sliders();
        $this->load->view('administrator/ManageSlider',$data);
    }



    public function store() {
        $config['upload_path'] = './slider/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('image')) {
            echo $this->upload->display_errors();
        } else {
            $image_data = $this->upload->data();
            $data = [
                'title'        => $this->input->post('title'),
                'description'  => $this->input->post('description'),
                'button'       => $this->input->post('button'),
                'button_url'   => $this->input->post('button_url'),
                'position'     => $this->input->post('position'),
                'status'       => $this->input->post('status'),
                'image'        => $image_data['file_name']
            ];
            $this->slider_model->insert_slider($data);
            redirect('slider/index');
        }
    }

    public function update($id) {
        $data = [
            'title'        => $this->input->post('title'),
            'description'  => $this->input->post('description'),
            'button'       => $this->input->post('button'),
            'button_url'   => $this->input->post('button_url'),
            'position'     => $this->input->post('position'),
            'status'       => $this->input->post('status'),
        ];

        if (!empty($_FILES['image']['name'])) {
            $config['upload_path'] = './slider/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';

            $this->upload->initialize($config);
            if ($this->upload->do_upload('image')) {
                $image_data = $this->upload->data();
                $data['image'] = $image_data['file_name'];
            }
        }

        $this->slider_model->update_slider($id, $data);
        redirect('Slider/index');
    }


    public function delete($id)
    {
        // Get slider details
        $slider = $this->db->get_where('slider', ['id' => $id])->row();

        if ($slider) {
            // Delete image from folder
            $image_path = './slider/' . $slider->image;
            if (file_exists($image_path)) {
                unlink($image_path);
            }

            // Delete from database
            $this->db->delete('slider', ['id' => $id]);

            $this->session->set_flashdata('success', 'Slider deleted successfully.');
        } else {
            $this->session->set_flashdata('error', 'Slider not found.');
        }

        redirect('Slider/index');
    }






}

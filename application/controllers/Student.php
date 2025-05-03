<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Student extends CI_Controller {

public function __construct() {
    parent::__construct();
    $this->load->model('Student_model');
    // $this->load->library('mail');
}

public function register_user()
{
    $email = $this->input->post('email');

    // Check if email already exists
    $exists = $this->db->where('email', $email)->get('student_registration')->num_rows();

    if ($exists > 0) {
        $response = array(
            'status'  => false,
            'message' => 'Email already registered. Please use a different email.'
        );
    } else {
        $data = array(
            'name'       => $this->input->post('name'),
            'email'      => $email,
            'mobile'     => $this->input->post('phone'),
            'password'   => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'created_at' => date('Y-m-d H:i:s')
        );

        $insert = $this->Student_model->save($data);

        if ($insert) {
            $response = array(
                'status'  => true,
                'message' => 'Registration successful!'
            );
        } else {
            $response = array(
                'status'  => false,
                'message' => 'Something went wrong. Please try again.'
            );
        }
    }

    // Return JSON
    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($response));
}


public function register222() {
    $data = array(
        'name'       => $this->input->post('name'),
        'email'      => $this->input->post('email'),
        'mobile'     => $this->input->post('phone'),
        'password'   => $this->input->post('password'), //password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        'created_at' => date('Y-m-d H:i:s')
    );

    $insert = $this->Student_model->save($data);
    if ($insert) {
        // echo "Registration successful, confirmation email sent.";
        echo "Registration successful";
    }

    // if ($insert) {
    //     $this->mail->from('your@email.com', 'Your App Name');
    //     $this->mail->to($data['email']);
    //     $this->mail->subject('Registration Successful');
    //     $this->mail->message("Hi {$data['name']},\n\nThanks for registering with us!");

    //     if ($this->mail->send()) {
    //         echo "Registration successful, confirmation email sent.";
    //     } else {
    //         echo "Registered, but email failed: " . $this->email->print_debugger();
    //     }
    // } else {
    //     echo "Registration failed.";
    // }
    }

    public function loginUser()
{
    // Form se email aur password le rahe hain
    $email    = $this->input->post('email');
    $password = $this->input->post('password');

    // Model load karke user fetch kar rahe hain
    $user = $this->Student_model->getUserByEmail($email);

    if ($user) {
        // Password match (for plain text; use password_verify() if hashed)
        if ($user->password === $password) {
            // Session me user data store
            $this->session->set_userdata(array(
                'user_id'   => $user->id,
                'name'      => $user->name,
                'email'     => $user->email,
                'logged_in' => true
            ));

            // JSON response for AJAX success
            echo json_encode(array(
                'status'  => true,
                'message' => 'Login successful'
            ));
        } else {
            echo json_encode(array(
                'status'  => false,
                'message' => 'Invalid password'
            ));
        }
    } else {
        echo json_encode(array(
            'status'  => false,
            'message' => 'User not found'
        ));
    }
}


public function EnquirySave() {
    $data = array(
        'name'    => $this->input->post('name'),
        'email'   => $this->input->post('email'),
        'subject' => $this->input->post('subject'),
        'phone'   => $this->input->post('phone'),
        'message' => $this->input->post('message')
    );

    $this->load->model('Enquiry_model');
    $this->Enquiry_model->insert_enquiry($data);

    echo json_encode(['status' => 'success']);
}




}

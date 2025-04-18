<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Student extends CI_Controller {

public function __construct() {
    parent::__construct();
    $this->load->model('Student_model');
    // $this->load->library('mail');
}

public function register() {
    $data = array(
        'name'       => $this->input->post('name'),
        'email'      => $this->input->post('email'),
        'mobile'     => $this->input->post('phone'),
        'password'   => $this->input->post('password'), //password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        'created_at' => date('Y-m-d H:i:s')
    );

    $insert = $this->Student_model->save($data);
    if ($insert) {
        echo "Registration successful, confirmation email sent.";
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

    public function loginUser() {
        // Form se email aur password le rahe hain
        $email    = $this->input->post('email');
        $password = $this->input->post('password');
    
        // Model me user data check karne ke liye
        // $this->load->model('User_model');
        $user = $this->Student_model->getUserByEmail($email);
    
        if ($user) {
            // Password match kar rahe hain (plain text ke liye, hash ho to password_verify use karo)
            if ($user->password === $password) {
                // Session me user data store
                $this->session->set_userdata(array(
                    'user_id' => $user->id,
                    'name' => $user->name,
                    'email'   => $user->email,
                    'logged_in' => true
                ));
    
                // Redirect ya response
                echo "Login successful";
            } else {
                echo "Invalid Password";
            }
        } else {
            echo "User not found";
        }
    }



}

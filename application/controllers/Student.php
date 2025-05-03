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
            'password'   => $this->input->post('password'), //password_hash($this->input->post('password'), PASSWORD_DEFAULT),
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

    $insert = $this->Student_model->insert_enquiry($data);

    
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

    $this->output
    ->set_content_type('application/json')
    ->set_output(json_encode($response));

    // echo json_encode(['status' => true,'message'=>'Successfully Submit']);
}

public function updateProfile333() {
    // $data['courses'] = $this->Course_model->get_all();
    $data='';
    $this->load->view('website/update-upload',$data);
}

public function updateProfile() {
    // Load session and model
    $this->load->library('session');
    // Get user ID from session
    $user_id = $this->session->userdata('user_id');

    // Get user data from the model
    $data['user'] = $this->Student_model->getUserById($user_id);

    // Load the view and pass user data
    $this->load->view('website/update-upload', $data);
}


public function updateProfileProcess() {
    $id     = $this->input->post('id');
    $name   = $this->input->post('name');
    $email  = $this->input->post('email');
    $mobile = $this->input->post('mobile');

    $data = [
        'name'   => $name,
        'email'  => $email,
        'mobile' => $mobile
    ];

    $this->db->where('id', $id);
    $updte = $this->db->update('student_registration', $data);

    if ($updte) {
        $response = ['status' => true, 'message' => 'Profile updated successfully!'];
    } else {
        $response = ['status' => false, 'message' => 'Something went wrong. Please try again.'];
    }

    $this->output->set_content_type('application/json')->set_output(json_encode($response));
}


public function updatePhotoProcess() {
    $id = $this->input->post('id');
    if (!empty($_FILES['photo']['name'])) {
        $config['upload_path']   = FCPATH .'uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['file_name']     = time() . '_' . $_FILES['photo']['name'];
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('photo')) {
            $uploadData = $this->upload->data();
            $fileName = $uploadData['file_name'];

            $this->db->where('id', $id);
            $updte = $this->db->update('student_registration', ['photo_path' => $fileName]);

            if ($updte) {
                $response = ['status' => true, 'message' => 'Photo uploaded successfully!'];
            } else {
                $response = ['status' => false, 'message' => 'Failed to update photo path in DB.'];
            }
        } else {
            $response = ['status' => false, 'message' => $this->upload->display_errors()];
        }
    } else {
        $response = ['status' => false, 'message' => 'No file uploaded.'];
    }

    $this->output->set_content_type('application/json')->set_output(json_encode($response));
}


public function updatePasswordProcess() {
    $id              = $this->input->post('id');
    $old_password    = $this->input->post('old_password');
    $new_password    = $this->input->post('new_password');
    $confirm_password = $this->input->post('confirm_password');

    // Fetch old password hash
    $user = $this->db->get_where('student_registration', ['id' => $id])->row_array();

    if (!$user) {
        $response = ['status' => false, 'message' => 'User not found.'];
    // } elseif (!password_verify($old_password, $user['password'])) {
    } elseif ($old_password!=$user['password']) {
        $response = ['status' => false, 'message' => 'Old password is incorrect.'];
    } elseif ($new_password !== $confirm_password) {
        $response = ['status' => false, 'message' => 'New password and confirm password do not match.'];
    } else {
        $hashed = $new_password;//password_hash($new_password, PASSWORD_BCRYPT);
        $this->db->where('id', $id);
        $updte = $this->db->update('student_registration', ['password' => $hashed]);

        if ($updte) {
            $response = ['status' => true, 'message' => 'Password changed successfully!'];
        } else {
            $response = ['status' => false, 'message' => 'Failed to update password.'];
        }
    }

    $this->output->set_content_type('application/json')->set_output(json_encode($response));
}





}

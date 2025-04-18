<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


	public function index()
	{
		$this->load->view('administrator/login');
	}

	public function resetPasswordLink()
	{
		$this->load->view('administrator/reset-password');
	}

	public function login_user(){

        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Username', 'required');
        if ($this->form_validation->run()){

            $username= $this->input->post('email');
            $pass= $this->input->post('password');

            $where=array('email' => $username,'password' =>md5($pass), 'status'=>'active');

            $admin_details = $this->login_model->getWhere('users',$where);


            if(count($admin_details)>0){


                $this->session->set_userdata('uk_adminLoggedinRole',$admin_details[0]->role);

                $this->session->set_flashdata('success','Login Successfully !!');
                if($this->session->userdata('uk_adminLoggedinRole')=='admin'){
                    $this->session->set_userdata('uk_adminLoggedinId',$admin_details[0]->id);
                    $this->session->set_userdata('uk_adminLoggedinAdmin',$admin_details[0]->email);
                    redirect('Master/dashboard');
                }

                else{
                    redirect('Login/index');
                }
            }
            else{
            $this->session->set_flashdata('error','Either Email or Password is incorrect');
                redirect('Login/index');
            }
        }
        else{
        $this->session->set_flashdata('error','Please Enter Required Fields');
            redirect('Login/index');
        }
    }

	public function forgotPassword(){
		if($_SERVER['REQUEST_METHOD']=='POST'){
			$this->form_validation->set_rules('email','Email','required');
			if($this->form_validation->run()==true){

				$email  = $this->input->post('email');
				$validateEmail  = $this->login_model->validateEmail($email);

				if($validateEmail!=false){
					$row  = $validateEmail;
					$user_id  = $row->id;

					$string = time().$user_id.$email;
					$hash_string = hash('sha256',$string);
					$currentDate = date('Y-m-d H:i');
					$hash_expiry = date('Y-m-d H:i',strtotime($currentDate. ' + 1 days'));
					$data = array(
						'hash_key'=>$hash_string,
						'hash_expiry'=>$hash_expiry,
					);


					$resetLink = base_url().'Login/password?hash='.$hash_string;
					$message = '<p>Your reset password Link is here:</p>'.$resetLink;
					$subject = "Password Reset link";
					$sentStatus = $this->sendEmail($email,$subject,$message);
					if($sentStatus==true){
						$this->login_model->updatePasswordhash($data,$email);
						$this->session->set_flashdata('success','Reset password link successfully sent, Please check your email');
						redirect(base_url('Login/resetPasswordLink'));
					}
					else{

						$this->session->set_flashdata('error','Email not sent');
						redirect(base_url('Login/resetPasswordLink'));
					}
				}
				else{
					$this->session->set_flashdata('error','Enter Correct Email');
						redirect(base_url('Login/resetPasswordLink'));
				}
			}
			else{
				$this->resetPasswordLink();
			}
		}
	}


	function password()
	{
		if($this->input->get('hash'))
		{
			$hash = $this->input->get('hash');
			$this->data['hash']=$hash;
			$getHashDetails = $this->login_model->getHahsDetails($hash);
			if($getHashDetails!=false)
			{
				$hash_expiry = $getHashDetails->hash_expiry;
				$currentDate = date('Y-m-d H:i');
				if($currentDate < $hash_expiry)
				{
					if($_SERVER['REQUEST_METHOD']=='POST')
					{
						$this->form_validation->set_rules('password','New Password','required');
						$this->form_validation->set_rules('cpassword','Confirm New Password','required|matches[password]');
						if($this->form_validation->run()==TRUE)
						{
							$newPassword = $this->input->post('password');

							$validateCurrentPassword = $this->login_model->validateCurrentPassword($hash);
							if($validateCurrentPassword!=false)
							{
								 $newPassword =md5($newPassword);
								 $data = array(
								 	'password'=>$newPassword,
								 	'hash_key'=>null,
								 	'hash_expiry'=>null
								);
								 $this->login_model->updateNewPassword($data,$hash);
								 $this->session->set_flashdata('success','Successfully changed Password');
								 redirect(base_url('Login'));
							}
							else
							{
								$this->session->set_flashdata('error','Current Password is wrong');
								$this->load->view('administrator/changePassword',$this->data);
							}

						}
						else
						{
							$this->load->view('administrator/changePassword',$this->data);
						}
					}
					else
					{
						$this->load->view('administrator/changePassword',$this->data);
					}
				}
				else
				{
					$this->session->set_flashdata('error','link is expired');
					redirect(base_url('Login/forgotPassword'));
				}
			}
			else
			{
				echo 'invalid link';
				exit;
			}
		}
		else
		{
			$this->resetPasswordLink();
		}
	}


	public function sendEmail($email,$subject,$message)
    {

    	/* use this on server */

        $config = Array(
		      'mailtype' => 'html',
		      'charset' => 'iso-8859-1',
		      'wordwrap' => TRUE
	    	);

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('noreply');
        $this->email->to($email);
        $this->email->subject($subject);
        $this->email->message($message);

        if($this->email->send())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('uk_adminLoggedinId');
        $this->session->unset_userdata('uk_adminLoggedinAdmin');
        $this->session->sess_destroy();
        redirect('Login/index');
    }
}

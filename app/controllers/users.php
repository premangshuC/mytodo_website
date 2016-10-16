<?php
class Users extends CI_Controller{

	public function register(){
		/* Creating Captchas	*/

		$vals = array(
			'img_path'=> './assets/captcha/',
			'img_url'=>base_url().'assets/captcha/',
			'img_width'=>150,
			'img_height'=>30
		);
		$cap = create_captcha($vals);
		$this->session->set_userdata('captcha',$cap['word']);
		$data['captcha']=$cap['image'];

		

			
		/* Form Validation 	*/

		$this->form_validation->set_rules('first_name','First Name','trim|required|max_length[50]|min_length[2]');
		$this->form_validation->set_rules('last_name','Last Name','trim|required|max_length[50]|min_length[2]');
		$this->form_validation->set_rules('email','Email ID','trim|required|max_length[50]|min_length[6]|valid_email');
		$this->form_validation->set_rules('username','Username','trim|required|max_length[20]|min_length[5]');
		$this->form_validation->set_rules('password','Password','trim|required|max_length[20]|min_length[6]');
		$this->form_validation->set_rules('password2','Confirm Password','trim|required|max_length[20]|min_length[6]|matches[password]');
		//$this->form_validation->set_rules('captcha','Captcha','trim|required|matches[$this->session->userdata(captcha)]');

		if($this->form_validation->run()==FALSE){
			$data['main_content'] = 'users/register';
			$this->load->view('layouts/main',$data);
		} else {

					if(strtolower($this->session->userdata('captcha')) != strtolower($_POST['captcha'])){
						$this->session->set_flashdata('captcha_incorrect','Captcha Incorrect');
						redirect('users/register');
					} else {


				if($this->User_model->create_member()) {
					$this->session->set_flashdata('registered','You are now registered. Please Log In');
					redirect('home/index');
				}
			}
		}
	}

	public function logIn(){
		$this->form_validation->set_rules('username','Username','trim|required|max_length[20]|min_length[5]');
		$this->form_validation->set_rules('password','Password','trim|required|max_length[20]|min_length[6]');

		if($this->form_validation->run()==FALSE) {
			$this->session->set_flashdata('login_failed','Incorrect Username/Passowrd combination');
			redirect('home/index');

		} else {
			$username =  $this->input->post('username');
			$password = $this->input->post('password');

			$user_id = $this->User_model->login_user($username, $password);

			// Validate user
			if($user_id) {
				// Create an array of user data
				$logged_in = true;
				$user_data = array(
							'user_id' 	=> $user_id,
							'username' 	=> $username,
							'logged_in' => true
							);
				// Set session user data
				$this->session->set_userdata($user_data);
				$this->session->set_flashdata('login_success','Log In success!!');
				redirect('home/index');
			} else {
				// Set Error message
				$this->session->set_flashdata('login_failed','Incorrect Username/Passowrd combination');
				redirect('home/index');
			}
		}

	}

	public function logout() {
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');
		$this->session->sess_destroy();
		redirect('home/index');
	}
}
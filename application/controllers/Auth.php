<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->library('form_validation');
        
        
    }
	public function index()
	{
		$this->form_validation->set_rules('email', 'Email','required');
        $this->form_validation->set_rules('password', 'Password', 'required', ['required'=> 'Email or Password is wrong!']);


        if ( $this->form_validation->run() == false){
        	
        	$data['title'] = "Login Page";
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		}else{
			$this->_login();
		}
	 
	}

	private function _login()
	{
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$user = $this->db->get_where('user', ['email' => $email])->row_array();

			if ($user){
				if( $user['is_active'] == 1 ){
					if ( password_verify($password, $user['password'])){
						$data = [
							'email' => $user['email'],
							'role_id' => $user['role_id']
						];
						$this->session->set_userdata($data);
						if($user['role_id'] == 1) {
							redirect('admin');
							}else{
								redirect('user');
						    }
						
					}else{
						$this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">
					  	Password is wrong.
			 			</div>');
			 			redirect('auth');
					}
				}else{
					$this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">
					  	This email is not activated.
			 			</div>');
			 			redirect('auth');
				}

			}else{
				$this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">
		  		Email is not registered!
				 </div>');
				redirect('auth');
			}


	}

	public function registration()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',[
			'is_unique' =>'This email has alredy registered!'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]',[
			'matches' => 'password not match!',
			'min_length' => 'password too short!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ( $this->form_validation->run() == false) {
		$data['title'] = "Registration Page";
		$this->load->view('templates/auth_header', $data);
		$this->load->view('auth/registration');
		$this->load->view('templates/auth_footer');
		
	}else{
		$data = [
			'name' => htmlspecialchars($this->input->post('name')),
			'email' => htmlspecialchars($this->input->post('email')),
			'image' => 'default.jpg',
			'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
			'role_id' => 2,
			'is_active' => 0,
			'date_created' => time()
		];
		//$this->db->insert('user', $data);

		$this->_sendEmail();

		$this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">
  		Congratulation!, Your account has been created.
		 </div>');
		redirect('auth');
		}
	}

	private function _sendEmail()
	{

		$config = [

			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'muhrifai.php@gmail.com',
			'smtp_pass' => '4a5b6c6858jm',
			'smtp_port' => 465,
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'newline'   => "\r\n"
	];

		
		$this->load->library('email',$config);
		$this->email->initialize($config);

		$this->email->from('muhrifai.php@gmail.com','Muh Rifai');
		$this->email->to('muhrifai2111@gmail.com');
		$this->email->subject('Testing');
		$this->email->message('Hello world');

		if ($this->email->send()) {
			return true;
		}else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">
  		You have been logged out.
		 </div>');
		redirect('auth');
		
	}
	public function blocked()
	{
		$this->load->view('auth/blocked');
	}
	
}
















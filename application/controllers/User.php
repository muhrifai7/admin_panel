<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct(){
		parent::__construct();
		is_login();
	}
	public function index()
	{
			$data['title'] = "My Profile";
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topbar',$data);
			$this->load->view('user/edit',$data);
			$this->load->view('templates/footer');
			
	}
	public function edit()
	{
			$data['title'] = "Edit Profile";
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

			$this->form_validation->set_rules('name', 'Name', 'required|trim');

			if ( $this->form_validation->run() == false ){
				$this->load->view('templates/header',$data);
				$this->load->view('templates/sidebar',$data);
				$this->load->view('templates/topbar',$data);
				$this->load->view('user/edit',$data);
				$this->load->view('templates/footer');
			} else {
				$email = $this->input->post('email');
				$name = $this->input->post('name');

				$upload_image = $_FILES['image']['name'];

				if ( $upload_image){

					 $config['allowed_types']        = 'gif|jpg|png';
	                
	                $config['max_size']             = '2000';
	                $config['upload_path']          = './assets/img/profile';
	               
	                // $config['max_width']            = 1024;
	                // $config['max_height']           = 768;

					$this->load->library('upload', $config);
	                //klo lolos upload
	                if ( $this->upload->do_upload('image')){
	                	$old_image = $data['user']['image'];
	                	if ( $old_image != 'default.jpg'){
	                		unlink(FCPATH . 'assets/img/profile/' . $old_image);
	                	}
	                	$new_image = $this->upload->data('file_name');
	                	$this->db->set('image', $new_image);
	                	
	                } else {
	                	echo $this->upload->display_errors();
	                }
				}

				

				$this->db->set('name', $name);
				$this->db->where('email', $email);
				$this->db->update('user');

				$this->session->set_flashdata('messege', '<div class="alert
	     		alert-success" role="alert">Your profile has been updated.</div>');
				 redirect('user');

			}
	}
	public function changePassword()
	{
			$data['title'] = "Change Password";
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

			$this->form_validation->set_rules('current_password', 'Password', 'required|trim');
			$this->form_validation->set_rules('new_password1', 'Password', 'required|trim|min_length[3]|matches[new_password2]');
			$this->form_validation->set_rules('new_password2', 'Password', 'required|trim|matches[new_password1]');

			if ( $this->form_validation->run() == false ){
				$this->load->view('templates/header',$data);
				$this->load->view('templates/sidebar',$data);
				$this->load->view('templates/topbar',$data);
				$this->load->view('user/changepassword',$data);
				$this->load->view('templates/footer');
			} else {
				$current_password = $this->input->post('current_password');
				$new_password1 = $this->input->post('new_password1');

					if ( !password_verify($current_password, $data['user']['password'])){
						$this->session->set_flashdata('messege', '<div class="alert
			     		alert-danger" role="alert">Current password is wrong.</div>');
						 redirect('user/changepassword');

					} else {
						if ( $current_password == $new_password1){
							$this->session->set_flashdata('messege', '<div class="alert
				     		alert-danger" role="alert">New password cannot be the same as current password.</div>');
							 redirect('user/changepassword');

						}else{
							$password_hash = password_hash($new_password1, PASSWORD_DEFAULT);

							$this->db->set('password', $password_hash);
							$this->db->where('email', $data['user']['email']);
							$this->db->update('user');
							$this->session->set_flashdata('messege', '<div class="alert
				     		alert-success" role="alert">Your password has been changed.</div>');
							 redirect('user/changepassword');
						}
					}


			}
	}


		
}












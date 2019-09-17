<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('subMenu_model');
		is_login();
	}

	public function index ()
	{
			$data['title'] = "Menu Management";
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

			$data['menu'] = $this->db->get('user_menu')->result_array();

			$this->form_validation->set_rules('menu','Menu', 'required');

			if ($this->form_validation->run() == false ){
				$this->load->view('templates/header',$data);
				$this->load->view('templates/sidebar',$data);
				$this->load->view('templates/topbar',$data);
				$this->load->view('menu/index', $data);
				$this->load->view('templates/footer');
			
			}else{
				$this->db->insert('user_menu',['menu' => $this->input->post('menu')]);
				$this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">
					  	New menu added!
			 			</div>');
				redirect('menu');
			}
			
			
	}

	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('user_menu',['$id => id']);
		$this->session->set_flashdata('messege','<div class="alert alert-success" role="alert">Deleted sucecss!</div>');
		redirect('menu');
	}

	public function subMenu(){

			$data['title'] = "Submenu Management";
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$data['menu'] = $this->db->get('user_menu')->result_array();
				
			$this->form_validation->set_rules('title', 'Menu', 'required');
			$this->form_validation->set_rules('menu_id', 'Title', 'required');
			$this->form_validation->set_rules('url', 'Url', 'required');
			$this->form_validation->set_rules('icon', 'Icon', 'required');

			if ( $this->form_validation->run() == false ){

				$data['subMenu'] = $this->subMenu_model->getSubMenu();

				$this->load->view('templates/header',$data);
				$this->load->view('templates/sidebar',$data);
				$this->load->view('templates/topbar',$data);
				$this->load->view('menu/submenu', $data);
				$this->load->view('templates/footer');
	
			}else{
				$data['menu'] = $this->db->get('user_menu')->result_array();
				$data['sMenu'] = $this->subMenu_model->addSubMenu();
				
				$this->session->set_flashdata('messege','<div class="alert alert-success" role="alert">New sub menu added!</div>');
					redirect('menu/submenu');

			}

	}
	public function deleteSubmenu($id)
	{
		$this->db->delete('user_sub_menu',['id' => $id]);
		$this->session->set_flashdata('messege','<div class="alert alert-success" role="alert">Deleted sucecss!</div>');
		redirect('menu/submenu');
	}

	public function editSubMenu($id)
	{

		echo json_encode($this->model('subMenu_model')->getSubMenuId($_POST['id']));
		
	}

}











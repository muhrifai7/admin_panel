<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shcool extends CI_Controller { 

	public function __construct(){

		parent::__construct();
		$this->load->model('Shcool_model');

	}

	public function index()
	{
		$data['title'] = 'School web';
		
		$this->load->view('templates/shcool_header', $data);
		$this->load->view('shcool/index');
		
		$this->load->view('templates/shcool_footer', $data);
	}
	public function index_ajax($offset=null)
	{
		$this->load->library('pagination');

		$limit = 4;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$config['base_url'] = 'http://localhost/web-login/shcool/index_ajax/';
		$config['total_rows'] = $this->Shcool_model->get_product($limit, $offset, $count = true);
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a href="" class="current_page">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Previous';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['firs_link'] = 'first';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';


		$this->pagination->initialize($config);
		$data['mahasisiwa'] = $this->Shcool_model->get_product($limit, $offset, $count = false);

		$data['pagelinks'] = $this->pagination->create_links();
		$this->load->view('school/index_ajax', $data);
	}

	public function getData()
	{
		
		$data['mahasiswa'] = $this->Shcool_model->getDataMahasiswa();
		echo json_encode($data['mahasiswa']);
		
	}
	public function addData()
	{

		// $nrp = $this->input->post('nrp');
		// $name = $this->input->post('name');
		// $email = $this->input->post('email');
		// $jurusan = $this->input->post('jurusan');$nrp,$name,$email,$jurusan
 
		$data['mahasiswa'] = $this->Shcool_model->addDataMahasiswa();
		echo json_encode($data['mahasiswa']);
	}

	public function edit()
	{
		
		$data['mahasiswa'] = $this->Shcool_model->edit();
		echo json_encode($data['mahasiswa']);
	}
	public function update()
	{
		$data['mahasiswa'] = $this->Shcool_model->updateMahasiswa();
		$msg['success'] = false;
		if($data['mahasiswa']){
			$msg['success'] = true; 
		}
		echo json_encode($data['mahasiswa']);
	}
	public function delete()
	{
		$data['mahasiswa'] = $this->Shcool_model->delete();
		echo json_encode($data['mahasiswa']);
	}
	public function search()
	{
		$data['mahasiswa'] = $this->Shcool_model->search();
		echo json_encode($data['mahasiswa']);
	}

}
	





























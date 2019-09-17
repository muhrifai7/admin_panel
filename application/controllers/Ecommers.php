<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Ecommers extends Ci_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('product_filter_model');	
	}

	public function index()
	{
		$data['title'] = 'E-Commers Web';
		$data['brand_data'] = $this->product_filter_model->fetch_filter_type('brand');
		$data['price'] = $this->product_filter_model->fetch_filter_type('price');
		$data['ram_data'] = $this->product_filter_model->fetch_filter_type('ram');
 		$data['product_storage'] = $this->product_filter_model->fetch_filter_type('storage');
  
		$this->load->view('templates/ecommers_header', $data);
		$this->load->view('ecommers/index', $data);
		$this->load->view('templates/ecommers_footer',$data);
		
	}
	public function getProduct()
	 {
	  sleep(0);
	  $minimum_price = $this->input->post('minimum_price');
	  $maximum_price = $this->input->post('maximum_price');
	  $brand = $this->input->post('brand');
	  $ram = $this->input->post('ram');
	  $storage = $this->input->post('storage');
	  $this->load->library('pagination');
	  $config = [];
	  $config['base_url'] = '#';
	  $config['total_rows'] = $this->product_filter_model->count_all($minimum_price, $maximum_price, $brand, $ram, $storage);
	  $config['per_page'] = 8;
	  $config['uri_segment'] = 3;
	  $config['use_page_numbers'] = TRUE;
	  $config['full_tag_open'] = '<ul class="pagination">';
	  $config['full_tag_close'] = '</ul>';
	  $config['first_tag_open'] = '<li>';
	  $config['first_tag_close'] = '</li>';
	  $config['last_tag_open'] = '<li>';
	  $config['last_tag_close'] = '</li>';
	  $config['next_link'] = '&gt;';
	  $config['next_tag_open'] = '<li>';
	  $config['next_tag_close'] = '</li>';
	  $config['prev_link'] = '&lt;';
	  $config['prev_tag_open'] = '<li>';
	  $config['prev_tag_close'] = '</li>';
	  $config['cur_tag_open'] = "<li class='active'><a href='#'>";
	  $config['cur_tag_close'] = '</a></li>';
	  $config['num_tag_open'] = '<li>';
	  $config['num_tag_close'] = '</li>';
	  $config['num_links'] = 3;
	  $this->pagination->initialize($config);
	  $page = $this->uri->segment(3);
	  $start = ($page - 1) * $config['per_page'];
	  $output = array(
	   'pagination_link'  => $this->pagination->create_links(),
	   'product_list'   => $this->product_filter_model->fetch_data($config["per_page"], $start, $minimum_price, $maximum_price, $brand, $ram, $storage)
	  );
	  echo json_encode($output);
	 }

	 public function detail($id) 
	 {
	 	$data['title'] = 'Product Detail';
	 	$data['brand_data'] = $this->product_filter_model->fetch_filter_type('brand');
		
	 	$data['product'] = $this->product_filter_model->getDataById($id);

	 	$this->load->view('templates/ecommers_header', $data);
	 	$this->load->view('ecommers/detail', $data);
	 	$this->load->view('templates/ecommers_footer');

	 }
	  
}


?>















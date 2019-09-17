<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Shcool_model extends CI_model
{
	public function getDataMahasiswa() {
		$this->db->order_by('id', 'desc');
		$result = $this->db->get('mahasiswa')->result_array();
		return $result;
	}

	public function addDataMahasiswa()
	{
		$data = [
			'nrp' => $this->input->post('nrp'),
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'jurusan' => $this->input->post('jurusan')
		];
		
 	  $this->db->insert('mahasiswa', $data);
		 
		 if ($this->db->affected_rows() > 0 ){
		 	return true;
		 }else {
		 	return false;
		 }
		 	 
	}

	public function edit()
	{
		$id = $this->input->get('id');
		$this->db->where('id', $id);
		$result = $this->db->get('mahasiswa');
		if ($result->num_rows() > 0){
			return $result->row();
		} else {
			return false;
		}
	}
	function updateMahasiswa()
	{
		$id = $this->input->post('id');
		$data = [
			'nrp' => $this->input->post('nrp'),
			'name' => $this->input->post('name'),	
			'email' => $this->input->post('email'),	
			'jurusan' => $this->input->post('jurusan')	
		];
		//
		$this->db->where('id', $id);
		$this->db->update('mahasiswa', $data);
		if ($this->db->affected_rows() > 0){
			return true;
		} else {
			
			return false;
		}
	}
	function delete()
	{
		$id = $this->input->get('id');
		$this->db->where('id', $id);
		$this->db->delete('mahasiswa');
		if( $this->db->affected_rows() > 0 ){
			return true;
		}else {
			return false;
		}
	}

	function search()
	{
		$search = $_GET["search"];	
		$this->db->get('mahasiswa');
		if($search != ''){

		$this->db->like('name', $search);
		$this->db->or_like('email', $search);
		$this->db->or_like('jurusan', $search);
		$this->db->or_like('nrp', $search);
		return $this->db->get('mahasiswa')->result_array();
		}

		//$this->db->get('mahasiswa');
		$this->db->order_by('id', 'desc');
		return $this->db->get('mahasiswa')->result_array();
		
		
	}
	// public function get_product($limit, $offset, $count = true)
	// {
	// 	$this->db->select('*');
	// 	$result = $this->db->from('mahasiswa');
	// 	if ($count){
	// 		//return $this->db->array();
	// 		return $result;
	// 	}
	// 	else {
	// 		$this->db->limit($limit, $offset);
	// 		$query = $this->db->get();
	// 		if($query->num_rows > 0 ) {
	// 			return $query->result(); 
	// 		}
	// 	}
	// 	return array();
	// }

}



















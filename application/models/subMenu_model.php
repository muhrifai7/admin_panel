<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class subMenu_model extends CI_model
{
	public function getSubMenu(){

		$query = "SELECT `user_sub_menu`.*,`user_menu`.`menu`
		          FROM `user_sub_menu` JOIN `user_menu`
		          ON `user_sub_menu`.`menu_id` = `user_menu`.`id` 
		          ";

		return $this->db->query($query)->result_array();

	}
	public function addSubMenu(){

		$data =[
			    'title' => $this->input->post('title'),
			    'menu_id' => $this->input->post('menu_id'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),
				'is_active' => 1 //$this->input->post('is_active')
		];
		$this->db->insert('user_sub_menu', $data);
	}
	public function getSubMenuId($id){

		$query = "SELECT *
		          FROM user_sub_menu
		          WHERE id = $id";

		return $this->db->query($query)->row_array();

	}


}














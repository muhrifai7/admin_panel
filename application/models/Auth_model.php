<?php 

class Auth_model extends CI_model
{
	public function validate($post)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('email', $post['email']);

		$query = $this->db->get();
		return $query;
	}
}

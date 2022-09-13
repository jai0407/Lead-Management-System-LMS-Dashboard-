<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Dashboard_model extends CI_Model
{

	function check_email_existence($email="")
	{
		$this->db->select('*');
		$this->db->from('admin_users');
		$this->db->where('email',$email);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) 
		{
			return $query->row();
		}
		else {
			return false;
		}
	}
	function update_password($email="",$data="")
    {
        $this->db->where('email',$email);
        $this->db->update('admin_users', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}

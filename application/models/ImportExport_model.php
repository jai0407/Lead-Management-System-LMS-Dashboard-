<?php
//File Info: This is the master model for admin api
defined('BASEPATH') or exit('No direct script access allowed');

class ImportExport_model extends CI_Model
{
	function insert_bulk_data($tbl="",$data="")
	{
		$this->db->insert_batch($tbl,$data);
      	if ($this->db->affected_rows() > 0) 
        {
          return true;
        }
        else
        {
          return false;
        }
	}
  function get_leads()
  {
      $this->db->select('l.*,s.name as lead_status');
      $this->db->from('lead l');
      $this->db->join('lead_status s','s.id=l.lead_status','Left');
      $this->db->order_by('l.id','Desc');
      $query = $this->db->get();
      if ($query->num_rows() > 0) 
      {
        return $query->result();
      }
      else {
        return false;
      }
  }
}
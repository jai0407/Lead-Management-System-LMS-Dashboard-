<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{



  public function login($user_name, $password)
  {


    $this->db->select('*');
    $this->db->where('user_name', $user_name);
    $this->db->where('password', sha1($password));
    $this->db->where('is_active', 1);
    $query = $this->db->get('admin_users');
    if ($query->num_rows() == 1) {
      return $query->row();
    } else {
      return false;
    }
  }

  public function insertLead($user_data)
  {
    if ($this->session->userdata('user_role') == $this->session->userdata('user_role')) {
      $this->db->where('user_id', $this->session->userdata('user_id'));
    }
    $query = $this->db->insert('lead_status', $user_data);
    if ($query) {
      if ($query) {
        return true;
      } else {
        return false;
      }
    }
  }

  public function getAllLead()
  {

    //if ($this->session->userdata('user_role') == $this->session->userdata('user_role')) {
    //$this->db->where('user_id', $this->session->userdata('user_id'));
    $query = $this->db->get('lead_status'); {
      if ($query->num_rows() > 0) {
        return $query->result();
      } else {
        return false;
      }
    }
  }

  //<------ LAst Remark------>
  public function getRemarkLead()
  {
    if ($this->session->userdata('user_role') == $this->session->userdata('user_role')) {
      $this->db->where('user_id', $this->session->userdata('user_id'));
    }
    $this->db->select("lead.id,lead.user_id,lead.company,lead.lead_source,lead.date_of_inquiry,lead.name,lead.phone,lead.email,lead.address,lead.city,lead.website,lead.description,lead.official_email_id,lead.lead_status,lead.remark,lead.created_at,lead.updated_at,
    lead_remarks.id as r_id,lead_remarks.lead_id,lead_remarks.follow_up,lead_remarks.follow_up_date,lead_remarks.follow_up_time,lead_remarks.remark,lead_remarks.created_at ,lead_status.id as l_id,lead_status.name as status_name,lead_status.is_active");
    $this->db->from('lead');
    $this->db->JOIN('lead_remarks', 'lead.id = lead_remarks.id', 'LEFT');
    $this->db->JOIN('lead_status', 'lead.lead_status = lead_status.id', 'LEFT');
    $query = $this->db->get();

    if ($query->num_rows() != 0) {
      return $query->result();
    } else {
      return false;
    }
  }



  public function getTodayLead()
  {
    if ($this->session->userdata('user_role') == $this->session->userdata('user_role')) {
      $this->db->where('user_id', $this->session->userdata('user_id'));
    }
    $this->db->select("lead.id,lead.user_id,lead.company,lead.lead_source,lead.date_of_inquiry,lead.name,lead.phone,lead.email,lead.address,lead.city,lead.website,lead.description,lead.official_email_id,lead.lead_status,lead.remark,lead.created_at,lead.updated_at,
    lead_remarks.id as r_id,lead_remarks.lead_id,lead_remarks.follow_up,lead_remarks.follow_up_date,lead_remarks.follow_up_time,lead_remarks.remark,lead_remarks.created_at ,lead_status.id as l_id,lead_status.name as status_name,lead_status.is_active");
    $this->db->from('lead');
    $this->db->JOIN('lead_remarks', 'lead_remarks.id=(select max(id) from lead_remarks as lr where lr.lead_id = lead.id)', 'LEFT');
    $this->db->JOIN('lead_status', 'lead.lead_status = lead_status.id', 'LEFT');

    $this->db->where('DATE(lead.created_at)', date('Y-m-d'));
    $this->db->group_by('lead.id');
    $this->db->order_by('lead.id', 'DESC');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }

  public function getOpportunityLead()
  {
    if ($this->session->userdata('user_role') == $this->session->userdata('user_role')) {
      $this->db->where('user_id', $this->session->userdata('user_id'));
    }
    $this->db->select("lead.id,lead.user_id,lead.company,lead.lead_source,lead.date_of_inquiry,lead.name,lead.phone,lead.email,lead.address,lead.city,lead.website,lead.description,lead.official_email_id,lead.lead_status,lead.remark,lead.created_at,lead.updated_at,
    lead_remarks.id as r_id,lead_remarks.lead_id,lead_remarks.follow_up,lead_remarks.follow_up_date,lead_remarks.follow_up_time,lead_remarks.remark,lead_remarks.created_at ,lead_status.id as l_id,lead_status.name as status_name,lead_status.is_active");
    $this->db->from('lead');
    $this->db->JOIN('lead_remarks', 'lead_remarks.id=(select max(id) from lead_remarks as lr where lr.lead_id = lead.id)', 'LEFT');
    $this->db->JOIN('lead_status', 'lead.lead_status = lead_status.id', 'LEFT');
    $this->db->where('lead.lead_status', 1);
    $this->db->group_by('lead.id');
    $this->db->order_by('lead.id', 'DESC');
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }

  public function getConvertedLead()
  {
    if ($this->session->userdata('user_role') == $this->session->userdata('user_role')) {
      $this->db->where('user_id', $this->session->userdata('user_id'));
    }
    $this->db->select("lead.id,lead.user_id,lead.company,lead.lead_source,lead.date_of_inquiry,lead.name,lead.phone,lead.email,lead.address,lead.city,lead.website,lead.description,lead.official_email_id,lead.lead_status,lead.remark,lead.created_at,lead.updated_at,
    lead_remarks.id as r_id,lead_remarks.lead_id,lead_remarks.follow_up,lead_remarks.follow_up_date,lead_remarks.follow_up_time,lead_remarks.remark,lead_remarks.created_at ,lead_status.id as l_id,lead_status.name as status_name,lead_status.is_active");
    $this->db->from('lead');
    $this->db->JOIN('lead_remarks', 'lead_remarks.id=(select max(id) from lead_remarks as lr where lr.lead_id = lead.id)', 'LEFT');
    $this->db->JOIN('lead_status', 'lead.lead_status = lead_status.id', 'LEFT');
    $this->db->where('lead.lead_status', 2);
    $this->db->group_by('lead.id');
    $this->db->order_by('lead.id', 'DESC');
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }


  public function getRecentlyLead()
  {
    if ($this->session->userdata('user_role') == $this->session->userdata('user_role')) {
      $this->db->where('user_id', $this->session->userdata('user_id'));
    }

    $this->db->select("lead.id,lead.user_id,lead.company,lead.lead_source,lead.date_of_inquiry,lead.name,lead.phone,lead.email,lead.address,lead.city,lead.website,lead.description,lead.official_email_id,lead.lead_status,lead.remark,lead.created_at,lead.updated_at,
    lead_remarks.id as r_id,lead_remarks.lead_id,lead_remarks.follow_up,lead_remarks.follow_up_date,lead_remarks.follow_up_time,lead_remarks.remark,lead_remarks.created_at ,lead_status.id as l_id,lead_status.name as status_name,lead_status.is_active");
    $this->db->from('lead');
    $this->db->JOIN('lead_remarks', 'lead_remarks.id=(select max(id) from lead_remarks as lr where lr.lead_id = lead.id)', 'LEFT');
    $this->db->JOIN('lead_status', 'lead.lead_status = lead_status.id', 'LEFT');
    $this->db->where('DATE(lead.updated_at)', date('Y-m-d'));
    $this->db->group_by('lead.id');
    $this->db->order_by('lead.id', 'DESC');
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }

  public function getRemarkDate()
  {
    if ($this->session->userdata('user_role') == $this->session->userdata('user_role')) {
      $this->db->where('user_id', $this->session->userdata('user_id'));
    }

    $this->db->select("lead_remarks.*,lead_status.name as lead_status_name");
    $this->db->from('lead_remarks');
    $this->db->JOIN('lead', 'lead.id=lead_remarks.lead_id ', 'LEFT');
    $this->db->JOIN('lead_status', 'lead.lead_status = lead_status.id', 'LEFT');

    $this->db->where('DATE(lead_remarks.follow_up_date)', date('Y-m-d'));
    //$this->db->group_by('lead_remarks.id');
    $this->db->order_by('lead_remarks.id', 'DESC');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }




  public function getSingleLead_status($id)
  {
    if ($this->session->userdata('user_role') == $this->session->userdata('user_role')) {
      $this->db->where('user_id', $this->session->userdata('user_id'));
    }
    $this->db->where('id', $id);
    $query = $this->db->get('lead_status');
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }


  public function updateLead($id, $user_data)
  {

    $this->db->where('id', $id);
    $query = $this->db->update('lead_status', $user_data);
    if ($query) {
      return true;
    } else {

      return false;
    }
  }


  public function insertNewLead($lead_data)
  {
    if ($this->session->userdata('user_role') == $this->session->userdata('user_role')) {
      $this->db->where('user_id', $this->session->userdata('user_id'));
    }

    $query = $this->db->insert('lead', $lead_data);
    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }


  public function getMyAllLead()
  {

    //$this->db->where('DATE(lead.updated_at)', date('Y-m-d'));
    if ($this->session->userdata('user_role') == 'USER') {
      $this->db->where('user_id', $this->session->userdata('user_id'));
    }
    //$this->db->where('l.id', $id);
    $this->db->select("l.id,l.user_id,l.company,l.lead_source,l.date_of_inquiry,l.name,l.phone, l.mobile,l.email,l.address,l.city,l.website,l.description,l.official_email_id,l.lead_status,l.remark,l.created_at,l.updated_at,
    s.id as l_id,s.name as s_name,s.is_active");
    $this->db->from('lead l');
    $this->db->JOIN('lead_status s', 's.id = l.lead_status', 'LEFT');
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }

  public function getSingleLead($id)
  {
    if ($this->session->userdata('user_role') == $this->session->userdata('user_role')) {
      $this->db->where('user_id', $this->session->userdata('user_id'));
    }
    $this->db->where('id', $id);
    $query = $this->db->get('lead');
    if ($query) {
      return $query->row();
    }
  }


  public function getMyAllLeads($id)
  {

    $this->db->where('l.id', $id);
    $this->db->select("l.id,l.user_id,l.company,l.lead_source,l.date_of_inquiry,l.name,l.phone,l.email,l.address,l.city,l.website,l.description,l.official_email_id,l.lead_status,l.remark,l.created_at,l.updated_at,
    s.id as l_id,s.name as s_name,s.is_active");
    $this->db->from('lead l');
    $this->db->JOIN('lead_status s', 's.id = l.lead_status', 'LEFT');
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return false;
    }
  }


  //-----Edit Leads------//

  public function getSingleLeads($id)
  {

    $this->db->where('id', $id);
    $query = $this->db->get('lead');
    if ($query) {
      return $query->row();
    }
  }


  public function updateAllLeads($id, $data)
  {
    if ($this->session->userdata('user_role') == $this->session->userdata('user_role')) {
      $this->db->where('user_id', $this->session->userdata('user_id'));
    }

    $this->db->where('id', $id);
    $query = $this->db->update('lead', $data);
    if ($query) {
      return true;
    } else {
    }
    return false;
  }


  public function insertLeadRemark($data)
  {
    if ($this->session->userdata('user_role') == $this->session->userdata('user_role')) {
      $this->db->where('user_id', $this->session->userdata('user_id'));
    }
    $query = $this->db->insert('lead_remarks', $data);

    if ($query) {
      return true;
    } else {
      return false;
    }
  }

  public function insertLeadTask($data)
  {
    if ($this->session->userdata('user_role') == $this->session->userdata('user_role')) {
      $this->db->where('user_id', $this->session->userdata('user_id'));
    }
    $query = $this->db->insert('lead_task', $data);
    if ($query) {
      return true;
    } else {
      return false;
    }
  }



  public function insertTaskComment($data)
  {
    if ($this->session->userdata('user_role') == $this->session->userdata('user_role')) {
      $this->db->where('user_id', $this->session->userdata('user_id'));
    }
    $query = $this->db->insert('lead_comment', $data);
    if ($query) {
      return true;
    } else {
      return false;
    }
  }

  public function insertTaskStatus($data)
  {
    if ($this->session->userdata('user_role') == $this->session->userdata('user_role')) {
      $this->db->where('user_id', $this->session->userdata('user_id'));
    }
    $query = $this->db->insert('lead_task', $data);
    if ($query) {
      return true;
    } else {
      return false;
    }
  }




  public function getAllRemark($lead_id)
  {

    $this->db->where('lead_id', $lead_id);
    $this->db->order_by('lead_remarks.id', 'DESC');

    $query = $this->db->get('lead_remarks');

    if ($query) {
      return $query->result();
    } else {
      return false;
    }
  }



  public function getAllTask($lead_id)
  {

    $this->db->where('lead_id', $lead_id);
    $this->db->order_by('task_id', 'DESC');
    $query = $this->db->get('lead_task');



    if ($query) {
      return $query->result();
    } else {
      return false;
    }
  }

  public function getAllComment($task_id, $lead_id)
  {

    $this->db->where('task_id', $task_id);
    $this->db->order_by('cmnt_id', 'DESC');
    $this->db->where('lead_id', $lead_id);


    // $this->db->where('comment');
    $query = $this->db->get('lead_comment');

    // echo $this->db->last_query();
    // die('welome');

    if ($query) {

      return $query->result();
    } else {
      return false;
    }
  }


  public function updateLeadTask($id, $data)
  {
    if ($this->session->userdata('user_role') == $this->session->userdata('user_role')) {
      $this->db->where('user_id', $this->session->userdata('user_id'));
    }

    $this->db->where('task_id', $id);
    $query = $this->db->update('lead_task', $data);
    if ($query) {
      return true;
    } else {
    }
    return false;
  }

  public function updateLeadRemark($id, $data2)
  {
    if ($this->session->userdata('user_role') == $this->session->userdata('user_role')) {
      $this->db->where('user_id', $this->session->userdata('user_id'));
    }

    $this->db->where('id', $id);
    $query = $this->db->update('lead', $data2);
    if ($query) {
      return true;
    } else {
    }
    return false;
  }


  public function deleteItem($id)
  {
    if ($this->session->userdata('user_role') == $this->session->userdata('user_role')) {
      $this->db->where('user_id', $this->session->userdata('user_id'));
    }

    $this->db->where('id', $id);
    $query = $this->db->delete('lead_remarks');

    if ($query) {
      return true;
    } else {
      return false;
    }
  }

  public function getCurrPassword($user_id)
  {

    $query = $this->db->where(['id' => $user_id])
      ->get('admin_users');

    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return false;
    }
  }

  public function updatePassword($new_password, $user_id)
  {
    $data = array(
      'password' => sha1($new_password)
    );
    return $this->db->where('id', $user_id)
      ->update('admin_users', $data);
  }
}

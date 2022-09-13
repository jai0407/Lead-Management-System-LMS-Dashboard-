<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function  __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('login_model');
        $this->load->model('dashboard_model');
        date_default_timezone_set( 'Asia/Kolkata' );
    }

    public function index()
    {
        $this->load->view('layouts/login');
    }

    public function dashboard()
    {

        if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('home/index');
        }
        $this->load->helper('date');
        $data['lead_status'] = $this->login_model->getAllLead();
        $data['remark_date'] = $this->login_model->getRemarkDate();
        $data['lead_today'] = $this->login_model->getTodayLead();
        $data['lead_Opportunity'] = $this->login_model->getOpportunityLead();
        $data['lead_Convert'] = $this->login_model->getConvertedLead();
        $data['lead_recently'] = $this->login_model->getRecentlyLead();
        $this->load->view("layouts/main_view", $data);
    }

    public function forgot_password()
    {
        if (isset($_POST) && !empty($_POST)) {
            $email = trim($this->input->post('email'));
            $exist = $this->dashboard_model->check_email_existence($email);
            if ($exist == true) {
                $this->load->helper('string');
                $password = random_string('numeric', 6);
                $this->load->helper('custom_email');
                $subject = 'New Password (LMS)';
                $msg = forgot_password_msg($password);
                $res = send_mail($email, $email, $msg, $subject);
                if ($res == true) {
                    $data = array(
                        'password' => sha1($password),
                    );
                    $this->dashboard_model->update_password($email, $data);
                    $this->session->set_flashdata('success', 'New password email to you!');
                    redirect('home/index');
                } else {
                    $this->session->set_flashdata('error', 'Process failed, try after sometime!');
                }
            } else {
                $this->session->set_flashdata('error', 'Wrong email!');
            }
        }
        $this->load->view("layouts/forgotPass");
    }

    public function setting()
    {
        if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('home/index');
        }
        $user_data['lead_status'] = $this->login_model->getAllLead();
        $this->load->view("layouts/setting", $user_data);
    }

    public function create_lead()
    {
        if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('home/index');
        }

        $data['lead'] = $this->login_model->getMyAllLead();
        $this->load->view("layouts/add_lead", $data);
    }

    public function popMessage()
    {
        $this->load->view('layouts/popups');
    }

    public function lead_list()
    {
        if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('home/index');
        }

        $lead_data['lead'] = $this->login_model->getMyAllLead();
        $this->load->view('layouts/leads', $lead_data);
        // echo '<pre>';
        // print_r(  $lead_data);
        // die('welcome');
    }

    public function notification()
    {

        if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('home/index');
        }
        $data['remark_date'] = $this->login_model->getRemarkDate();
        // echo '<pre>';
        // print_r($data);
        // die('data');
        $this->load->view('layouts/notification_list', $data);
    }


    public function Lead($id = true)
    {
        if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('home/index');
        }

      
        $lead_data['lead_remarks'] = $this->login_model->getAllRemark($id);

        $lead_data['lead_tasks'] = $this->login_model->getAllTask($id);

        if(!empty($lead_data['lead_tasks']))
        {
            foreach ($lead_data['lead_tasks'] as $value)
            {
                $value->lead_comments = $this->login_model->getAllComment($value->task_id,$id);
            }
        }
        
        // echo "<pre>";
        // print_r($lead_data['lead_tasks']);

        // die('-sss');
       

        $lead_data['lead'] = $this->login_model->getMyAllLeads($id);
        if ($lead_data['lead'] == false) {
            redirect('home/lead_list');
        }

        if ($this->session->userdata('user_id') != 1) {
            if ($lead_data['lead']->user_id !=  $this->session->userdata('user_id')) {
                redirect('home/lead_list');
            }
        }

        $lead_data['lead_status'] = $this->login_model->getAllLead();
        $this->load->view('layouts/lead_details', $lead_data);
    }

    public function login()
    {
        $user_name = $_POST["user_name"];
        $password = $_POST['password'];

        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_name', 'Username', 'trim|required|min_length[4]');
        // $this->form_validation->set_rules('email', 'email', 'trim|required');     
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[50]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('login_failed', 'Sorry, this username or password is empty.');
            redirect('home/index');
        } else {
            $user_data = $this->login_model->login($user_name, $password);

            if ($user_data) {

                $user_data = array(
                    'user_id'   => $user_data->id,
                    'user_role'   => $user_data->role,
                    'user_email' => $user_data->email,
                    'user_name'  => $user_data->name,
                    'logged_in' => true
                );

                $this->session->set_userdata($user_data);
                redirect('home/dashboard');
            } else {
                $this->session->set_flashdata('login_failed', 'Sorry, this username and password doesnt exist.');
                redirect('home/index');
            }
        }
    }

    public function addLeadToDB()
    {
        if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('home/index');
        }

        $name = $_POST["name"];
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Lead Name', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('success', "Data Inserted Successfully");

            redirect('home/setting');
        } else {
            $result = $this->login_model->insertLead([
                'name' => $this->input->post('name'),
                'is_active' => '1',
                'created_at' => date('Y-m-d'),
            ]);
            $this->session->set_flashdata('success', 'Your data has successfully inserted');
            $this->session->set_flashdata('error', '');
        }
        redirect('home/setting');
    }

    public function update($id)
    {
        if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('home/index');
        }
        $name = $_POST["name"];
        $status = $_POST["status"];

        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Status Title', 'trim|required');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data_error = [
                'error' => validation_errors()
            ];
            $this->session->set_flashdata($data_error);
        } else {

            if ($status == "Active") {
                $status = true;
            } else {
                $status = false;
            }
            $user_data = array(

                'name' => $this->input->post('name'),
                'is_active' => $status
            );
            $result = $this->login_model->updateLead($id, $user_data);
            if ($result) {
                $this->session->set_flashdata('success', 'Your data has successfully updated');
                $this->session->set_flashdata('error', '');
            }
        }
        redirect('home/Setting');
    }

    public function add_new_lead()
    {
        if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('home/index');
        }
        $company = $_POST["company"];
        $date_of_inquiry = $_POST["date_of_inquiry"];
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $city = $_POST["city"];


        $this->load->library('form_validation');
        // $this->form_validation->set_rules('date_of_inquiry','date_of_inquiry','callback_checkDateFormat'); 
        $this->form_validation->set_rules('name', 'name', 'trim|required');
        $this->form_validation->set_rules('phone', 'phone', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('address', 'address', 'trim|required');
        $this->form_validation->set_rules('city', 'city', 'trim|required');


        if ($this->form_validation->run() == false) {
            $data_error = [
                'error' => validation_errors()
            ];

            $this->session->set_flashdata($data_error);
            $this->session->set_flashdata('data_error', 'Please fill all the input fields');
            redirect('home/create_lead');
        } else {
            $result = $this->login_model->insertNewLead([
                'user_id' => $this->session->userdata('user_id'),
                'company' => $this->input->post('company'),
                'lead_source' => $this->input->post('lead_source'),
                'date_of_inquiry' => $this->input->post('date_of_inquiry'),
                'name' => $this->input->post('name'),
                'phone' => $this->input->post('phone'),
                'mobile' => $this->input->post('mobile'),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'city' => $this->input->post('city'),
                'website' => $this->input->post('website'),
                'description' => $this->input->post('description'),
                'official_email_id' => $this->input->post('official_email_id'),
                'lead_status' => '1',
                // 'remark' => $this->input->post('remark'),
                'created_at' => date('Y-m-d'),
            ]);

            if ($result) {
                $this->session->set_flashdata('success', 'Your data has successfully inserted');
            }

            redirect('home/lead_list');
        }
    }

    public function editLeads($id)
    {

        if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('home/index');
        }
        $data['singleLeads'] = $this->login_model->getSingleLeads($id);
        $this->load->view('layouts/edit_lead', $data);
    }

    public function updateLeads($id)
    {
        if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('home/index');
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'name', 'trim|required');
        $this->form_validation->set_rules('phone', 'phone', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('address', 'address', 'trim|required');
        $this->form_validation->set_rules('city', 'city', 'trim|required');
        $this->form_validation->set_rules('website', 'website', 'trim|required');
        $this->form_validation->set_rules('description', 'description', 'trim|required');
        $this->form_validation->set_rules('official_email_id', 'official_email_id', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data_error = [
                'error' => validation_errors()
            ];
            $this->session->set_flashdata($data_error);
            $this->session->set_flashdata('data_error', 'Please fill all the input fields');
        } else {
            $data = array(
                'user_id' => $this->input->post('user_id'),
                'company' => $this->input->post('company'),
                'lead_source' => $this->input->post('lead_source'),
                'date_of_inquiry' => $this->input->post('date_of_inquiry'),
                'name' => $this->input->post('name'),
                'phone' => $this->input->post('phone'),
                'mobile' => $this->input->post('mobile'),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'city' => $this->input->post('city'),
                'website' => $this->input->post('website'),
                'description' => $this->input->post('description'),
                'official_email_id' => $this->input->post('official_email_id'),
                // 'lead_status' => $this->input->post('lead_status'),
                // 'remark' => $this->input->post('remark'),
                'updated_at' => date('Y-m-d'),
            );

           
            $result = $this->login_model->updateAllLeads($id, $data);
            if ($result) {
                $this->session->set_flashdata('success', 'Your data has successfully updated');
                $this->session->set_flashdata('error', '');
            }
        }
        redirect('home/lead_list/'.$id);
    }

    public function add_remark($id)
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('follow_up', 'Follow up', 'required');
        $this->form_validation->set_rules('follow_up_date', 'Follow up date', 'trim|required');
        $this->form_validation->set_rules('follow_up_time', 'Follow up time', 'trim|required');
        $this->form_validation->set_rules('lead_status', 'Lead Status', 'trim|required');
        $this->form_validation->set_rules('remark', 'Remark', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data_error = [
                'error' => validation_errors()
            ];
            $this->session->set_flashdata($data_error);


            $follow_up = $this->input->post('follow_up');
            if (!empty($follow_up)) {
                $follow_up = implode(',', $follow_up);
            } else {
                $follow_up = '';
            }

            $data = array(
                'lead_id' => $this->input->post('lead_id'),
                'follow_up' => $follow_up,
                'follow_up_date' => $this->input->post('follow_up_date'),
                'follow_up_time' => $this->input->post('follow_up_time'),
                'remark' => $this->input->post('remark'),
                'created_at' => $this->input->post('created_at')
            );


            $data2 = array(
                'lead_status' => $this->input->post('lead_status'),
            );
            $result = $this->login_model->insertLeadRemark($data);
            $result = $this->login_model->updateLeadRemark($this->input->post('lead_id'), $data2);
            if ($result) {
                $this->session->set_flashdata('success', 'Your data has successfully inserted');
            }
        }
        redirect('home/lead/' . $id);
    }

    public function add_task($id)
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('start_date', 'Start date', 'trim|required');
        $this->form_validation->set_rules('end_date', 'End date', 'trim|required');
        $this->form_validation->set_rules('task_name', 'Task_name', 'required');
        $this->form_validation->set_rules('notes', 'Notes', 'required');


        if ($this->form_validation->run()) {

            $data_error = [
                'error' => validation_errors()
            ];
            $this->session->set_flashdata($data_error);

            $data = array(
                // 'task_id' => $this->input->post('task_id'),
                'lead_id' => $this->input->post('lead_id'),
                'user_id' => $this->session->userdata('user_id'),
                'start_date' => $this->input->post('start_date'),
                'end_date' => $this->input->post('end_date'),
                'task_name' => $this->input->post('task_name'),
                'notes' => $this->input->post('notes'),
                'task_status' => 'pending',
            );

            // echo '<pre>';
            // print_r($data);
            // die('Testing');


            $result = $this->login_model->insertLeadTask($data);
            if ($result) {
                $this->session->set_flashdata('success', 'Your data has successfully inserted');
            }
        }
        redirect('home/lead/' . $id);
    }


    public function add_comment($id, $lead_id)
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('comment', 'comment', 'trim|required');

        if ($this->form_validation->run()) {

            $data_error = [
                'error' => validation_errors()
            ];
            $this->session->set_flashdata($data_error);

            $data = array(
                'task_id' => $this->input->post('task_id'),
                'lead_id' => $this->input->post('lead_id'),
                'user_id' => $this->session->userdata('user_id'),
                'comment' => $this->input->post('comment'),
                'created_at' => $this->input->post('created_at'),
            );

            // echo '<pre>';
            // print_r($data);
            // die('Testing');

            $result = $this->login_model->insertTaskComment($data);
            if ($result) {
                $this->session->set_flashdata('success', 'Your data has successfully inserted');
            }
        }
        redirect('home/lead/'.$lead_id);
    }



    public function add_task_status($task_id)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('task_status', 'task_status', 'trim|required');

        
        if ($this->form_validation->run()) {

            $data_error = [
                'error' => validation_errors()
            ];
            $this->session->set_flashdata($data_error);

            $data = array(
                'task_id' => $this->input->post('task_id'),               
                'task_status' => $this->input->post('task_status'),
            );

            // echo '<pre>';
            // print_r($data);
            // die('Testing');

            $result = $this->login_model->insertTaskStatus($data);
            if ($result) {
                $this->session->set_flashdata('success', 'Your data has successfully inserted');
            }
        }
        redirect('home/lead/'.$task_id);
    }

  

    public function update_task($id)
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('start_date', 'Start date', 'trim|required');
        $this->form_validation->set_rules('end_date', 'End date', 'trim|required');
        $this->form_validation->set_rules('task_name', 'Task_name', 'required');
        $this->form_validation->set_rules('notes', 'Notes', 'required');


        if ($this->form_validation->run()) {

            $data_error = [
                'error' => validation_errors()
            ];
            $this->session->set_flashdata($data_error);



            $data = array(
                'start_date' => $this->input->post('start_date'),
                'end_date' => $this->input->post('end_date'),
                'task_id' => $this->input->post('task_id'),
                'task_name' => $this->input->post('task_name'),
                'notes' => $this->input->post('notes'),
                'task_status' => $this->input->post('task_status'),
            );


            // echo '<pre>';
            // print_r($data);
            // die('Testing');


            $result = $this->login_model->updateLeadTask($id, $data);
            if ($result) {
                $this->session->set_flashdata('success', 'Your data has successfully updated');
            }
        }
        redirect('home/lead/' . $id);
    }


    public function deleteRemark($id, $lead_id)
    {
        $result = $this->login_model->deleteItem($id);
        if ($result == true) {
            $this->session->set_flashdata('deleted', ' Remark has been deleted!');
        }
        redirect('home/lead/' . $lead_id);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('home/index');
    }

    function daily_notify()
    {

        echo $this->session->set_userdata('daily_notify', TRUE);
    }

    public function change_password()
    {
        $this->load->view("layouts/changePass");
    }


    public function update_password()
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('old_pass', 'Old Password', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('new_pass', 'New Password', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('rep_new_pass', 'Repeat Password', 'trim|required|max_length[50]|matches[new_pass]');

        if ($this->form_validation->run()) {
            $curr_password = $this->input->post('old_pass');
            $new_password = $this->input->post('new_pass');
            $conf_password = $this->input->post('rep_new_pass');


            // $this->login_model->getCurrPassword();       
            $user_id = '1';
            $password = $this->login_model->getCurrPassword($user_id);


            if ($password->password == sha1($curr_password)) {


                if ($new_password ==  $conf_password) {

                    if ($this->login_model->updatePassword($new_password, $user_id)) {

                        $this->session->set_flashdata('success', "Password updated Successfully");
                    } else {

                        $this->session->set_flashdata('error', "Failed to Update password");
                    }
                } else {

                    $this->session->set_flashdata('error', "New password and Confirm password is not matching");
                }
            } else {


                $this->session->set_flashdata('error', "Sorry ! Current password is not matching");
            }
        } else {

            $data_error = [
                'data_error' => validation_errors()
            ];
            $this->session->set_flashdata($data_error);
            // $this->session->set_flashdata('data_error', 'Please fill all the input fields');
            //$this->load->view('layouts/Change_password');

        }
        redirect('home/change_password');
    }
}

<?php
//File Info: This is the Master Admin controller API

defined('BASEPATH') or exit('No direct script access allowed');

class ImportExport extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ImportExport_model');
        $this->load->library('csvimport');
        $this->load->helper('common');
        // if (!$this->session->userdata('user_sassion')) {
        //      redirect('dashboard/admin/admin_login');
        // }
    }

    function index()
    {
        $this->load->view('layouts/import_lead');
    }

    function export_leads()
    {	
    	$data=$this->ImportExport_model->get_leads();
        if(!empty($data))
        {   
            
            $export_arr = array();
            $title = array('Company Name','Name','Mobile No','Email ID','Official email Id','Date of Enquiry','Lead Source','City','Address','Website','lead_status','Description');
            array_push($export_arr, $title);

            foreach ($data as $key=>$array) {
                    $array=(array)$array;
                     $row = array_map(function($value) {
                       return $value === "" ? " " : $value;
                    }, $array); 
               array_push($export_arr, array($row['company'],$row['name'],$row['phone'],$row['email'],$row['official_email_id'],$row['date_of_inquiry'],$row['lead_source'],$row['city'],$row['address'],$row['website'],$row['lead_status'],$row['description']));
            }

            convert_to_csv($export_arr, 'leads-' .time(). '.csv', ',');
        }
        die();
    }
    function import_leads()
    {
    	if(isset($_FILES["csv_file"]) && !empty($_FILES["csv_file"]))
    	{
    		$file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
	        $data=array();
	        $result=false;
	        if(!empty($file_data))
	        {
	            foreach($file_data as $row)
	            {
	                $data[] = array(
	                            'company'=>$row["Company Name"],
	                            'lead_source'=>$row["Lead Source"],
	                            'date_of_inquiry'=>($row["Date of Enquiry"])? date("Y-m-d", strtotime($row["Date of Enquiry"])) : '',
	                            'name'=>$row["Name"],
	                            'phone'=>$row["Mobile No"],
	                            'email'=>$row["Email ID"],
	                            'address'=>$row["Address"],
	                            'city'=>$row["City"],
	                            'website'=>$row["Website"],
	                            'official_email_id'=>$row["Official email Id"],
	                            'description'=>$row["Description"],
	                            'lead_status'=>'1'
	                        );
	            }
	        }
	        
	        if(!empty($data))
	        {   
	            $result=$this->ImportExport_model->insert_bulk_data('lead',$data);
	        }

	        if($result==true)
	        {   
	            $this->session->set_flashdata('success', 'Data import successfully!');
	        }
	        else
	        {   
	            $this->session->set_flashdata('error', 'Data not imported!');
	        }
    	}
        redirect('home/lead_list');
    }
    function sample_download()
    {	
    	$this->load->helper('download');
    	force_download(FCPATH.'/assets/sample_LMS.csv', null);
    }
}

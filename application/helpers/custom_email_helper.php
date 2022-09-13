<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('send_mail'))
{
	function send_mail($sender="",$receiver="",$message="",$subject="",$attachment="")
	{	
			
		 	$CI =& get_instance();
			$CI->load->library('email');

            $config['protocol'] = 'sendmail';
            $config['mailpath'] = '/usr/sbin/sendmail';
            $config['charset'] = 'iso-8859-1';
            $config['mailtype'] = 'html';
            $config['newline'] = "\r\n";
            $config['wordwrap'] = TRUE;


           	$CI->email->initialize($config);
           	$CI->email->clear();
            $CI->email->from($sender,'LMS');
            $CI->email->to($receiver);
            $CI->email->reply_to($sender,'LMS');
            $CI->email->subject($subject);
            $CI->email->message($message);

            if($attachment)
            {
                $CI->email->attach($attachment);
            }
            
		  	
		  	if($CI->email->send())
            {
                return true;
            }
            else
            {
                return false;
            }


	}
}

if (!function_exists('forgot_password_msg'))
{
    function forgot_password_msg($password="")
    {   
        $msg = "<html><body>";
        $msg.="<div style='background-color: #2879c1;text-align: center; font-size:30px;color:#fff; text-shadow: 2px 2px 5px #111; padding: 10px 0px;'>LMS</div>"; 
        $msg.="<div style='background-color: #eee;padding: 25px;color: #555;font-size: 17px;'>";
        $msg.= "<p style='text-align: center;font-size: 20px;'>Your New Password: <b>".$password."</b></p>";
        $msg.="</div>";
        $msg.="<div style='background-color: #eee;padding:10px 25px;border-top: 1px solid #ccc;text-align:center;'>";
        $msg.="<p style='font-size:15px;color: #999;'>Copyright ".date('Y')." <a href='javascript:void(0)'>LMS</a>.</p>";
        $msg.="</div>";
        $msg.="</body></html>";

        return $msg;
    }
}
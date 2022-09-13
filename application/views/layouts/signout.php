<?php   
$this->session->set_flashdata(); //to ensure you are using same session
$this->session->sess_destroy(); //destroy the session
redirect('home/index');
//to redirect back to "index.php" after logging out
exit();
?>
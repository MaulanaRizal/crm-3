<?php 

function check_already_login(){
	$ci =& get_instance();
	$user_session = $ci->session->userdata('ID_USER');
	if ($user_session) {
		redirect('user/dashboard');
	}
}

function check_not_login(){
	$ci =& get_instance();
	$user_session = $ci->session->userdata('ID_USER');
	if (!$user_session) {
		redirect('login');
	}
}

function check_admin(){
	$ci =& get_instance();
	$ci->load->library('fungsi');
	if($ci->fungsi->user_login()->ID_ROLE != 1){
		redirect('user/dashboard');
	}
}

?>
<?php 
	$config['protocol']  = 'smtp';
	$config['smtp_host'] = 'smtp.example.com';
	$config['smtp_port'] = 587;
	$config['smtp_user'] = 'your_email@example.com';
	$config['smtp_pass'] = 'your_password';
	$config['mailtype']  = 'html';
	$config['charset']   = 'utf-8';
	$config['newline']   = "\r\n";

	$this->email->initialize($config);


?>
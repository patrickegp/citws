<?php
	// PHP_EOL
	
	printf("*****core_user_get_users_by_field*****");
	echo '<br>';
	$args = array('field' => 'username', 'values' => 
		array('0' => 'jamarquez'));
	
	var_dump($args);
	echo '<br>';
	print_r($args);
	$url = http_build_query($args);
	echo '<br>';
	var_dump($url);
	echo '<br>';
	
	printf("*****core_user_create_users*****");
	echo '<br>';
	unset($args);
	
	$args['users'] = [];
	
	$user1 = array('username'=>'estudiante1', 'password'=>'Uao.2018', 'firstname'=>'estudiante1', 'lastname'=>'estudiante1', 'email'=>'estudiante1@uao.edu.co');
	$user2 = array('username'=>'estudiante2', 'password'=>'Uao.2018', 'firstname'=>'estudiante2', 'lastname'=>'estudiante2', 'email'=>'estudiante2@uao.edu.co');
	$args[] = $user1;
	$args[] = $user2;
	print_r($args);
	
	echo '<br>';
	printf("*****core_enrol_get_enrolled_users*****");
	echo '<br>';
	unset($args);
	
	$args['couserid'] = 100;
	print_r($args);
	$url = http_build_query($args);
	echo '<br>';
	var_dump($url);
	echo '<br>';
?>


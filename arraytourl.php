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
?>


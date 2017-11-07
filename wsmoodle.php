<?php
	include 'make_test.php';
	
	$domain='http://test2.uao.edu.co/siga';
	$token='b90fbf8066a4752a17619e8b9d79c9ca';
	$function_name='core_user_create_users';
	$restformat = '&moodlewsrestformat=xml';
	
	$serverurl = $domain . '/webservice/rest/server.php'. '?wstoken=' . $token . '&wsfunction='.$function_name;
	
	$user_fields = array();
	$n='1';
	$user_fields[0]['username'] = 'testusername'.$n;
	$user_fields[0]['password'] = 'testpassword'.$n;
	$user_fields[0]['firstname'] = 'testfirstname'.$n;
	$user_fields[0]['lastname'] = 'testlastname'.$n;
	$user_fields[0]['email'] = 'testemail'.$n.'@moodle.com';
	$n='2';
	$user_fields[1]['username'] = 'testusername'.$n;
	$user_fields[1]['password'] = 'testpassword'.$n;
	$user_fields[1]['firstname'] = 'testfirstname'.$n;
	$user_fields[1]['lastname'] = 'testlastname'.$n;
	$user_fields[1]['email'] = 'testemail'.$n.'@moodle.com';

	$curl_post_data = array('users'=>$user_fields);
	$str = http_build_query($curl_post_data);

	echo 'Array!';
	echo '<br>';
	var_dump($curl_post_data);
	echo '<br>';
	echo '<br>';
	echo 'Codificación URL!';
	echo '<br>';
	echo $str;

	echo '<br>';
	echo '<br>';
	echo '<br>';
	echo '***********************';
	echo '<br>';
	echo 'Enviando al servidor!';
	echo '<br>';
	echo '***********************';
	echo '<br>';	

	$curl=curl_init($serverurl . $restformat);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $str);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type: application/x-www-form-urlencoded'));
	$curl_response = curl_exec($curl);
	if ($curl_response === false) {
		$info = curl_getinfo($curl);
		curl_close($curl);
		die('error occured during curl exec. Additioanl info: ' . var_export($info));
	}
	curl_close($curl);
	print_r($curl_response);

?>
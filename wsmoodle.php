<?php
	include 'make_test.php';
	
	$domain='http://test2.uao.edu.co/siga';
	$token='b90fbf8066a4752a17619e8b9d79c9ca';
	$function_name='core_user_create_users';
	$restformat = '&moodlewsrestformat=xml';
	
	$serverurl = $domain . '/webservice/rest/server.php'. '?wstoken=' . $token . '&wsfunction='.$function_name;
	
	$user1 = array(
	'username' => 'usernametest3',
	'password' => 'Moodle2011',
	'firstname' => 'firstname3',
	'lastname' => 'lastname3',
	'email' => 'email3@email.com'
	);
	
	$user2 = array(
	'username' => 'usernametest4',
	'password' => 'Moodle2012',
	'firstname' => 'firstname4',
	'lastname' => 'lastname4',
	'email' => 'email4@email.com'	
	);
	
	$lista = array($user1, $user2);
	$curl_post_data = array('users'=>$lista);
	
	$str = http_build_query($curl_post_data);

	//$str = urlencode($curl_post_data);
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

	//$curl=curl_init('http://test2.uao.edu.co/wstest/ws_show.php?token='.$token);
	$curl=curl_init($serverurl . $restformat);
	// $curl=curl_init($serverurl . $restformat . '&' . $str);
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $str);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type: application/x-www-form-urlencoded'));
	//curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
	$curl_response = curl_exec($curl);
	if ($curl_response === false) {
		$info = curl_getinfo($curl);
		curl_close($curl);
		die('error occured during curl exec. Additioanl info: ' . var_export($info));
	}
	curl_close($curl);
	print_r($curl_response);

?>
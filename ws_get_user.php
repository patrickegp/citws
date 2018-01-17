<?php
	//$domain='https://test2.uao.edu.co/siga';
	$domain='http://localhost/moodle33';
	$token='6137e2a98e69ecb014c582b8cf099d94';
	$function_name='core_user_get_users_by_field';
	$restformat = '&moodlewsrestformat=xml';
	
	$serverurl = $domain . '/webservice/rest/server.php'. '?wstoken=' . $token . '&wsfunction='.$function_name;
	$curl_post_data = array('field'=>'username', 'values'=> array('0'=>'citws'));
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
	var_dump($curl_response);
?>
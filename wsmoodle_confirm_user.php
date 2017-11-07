<?php
	include 'make_test.php';
	
	$domain='http://test2.uao.edu.co/siga';
	$token='043b509dd1f5383e737dec7eac1843fe';
	$function_name='core_auth_confirm_user';
	$restformat = '&moodlewsrestformat=xml';
	
	$serverurl = $domain . '/webservice/rest/server.php'. '?wstoken=' . $token . '&wsfunction='.$function_name;
	
	
	$username = 'jamarquez';
	$curl_post_data = array('username'=>$username);

	var_dump($curl_post_data);

	$curl=curl_init($serverurl . $restformat);
	echo '<br>';
	echo 'http_build_query';
	echo '<br>';
	
	$str = http_build_query($curl_post_data);
	var_dump($str);
	/*
	$data_xml = xmlrpc_encode($params);
	echo ($data_xml);*/
	
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, "username=jamarquez");
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type: application/x-www-form-urlencoded'));
	//curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
	$curl_response = curl_exec($curl);
	if ($curl_response === false) {
		$info = curl_getinfo($curl);
		curl_close($curl);
		die('error occured during curl exec. Additioanl info: ' . var_export($info));
	}
	curl_close($curl);
	print_r($curl_response);

?>
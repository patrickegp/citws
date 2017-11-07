<?php
	include 'make_test.php';
	
	$domain='http://test2.uao.edu.co/siga';
	$token='b90fbf8066a4752a17619e8b9d79c9ca';
	$function_name='core_user_create_users';
	$restformat = '&moodlewsrestformat=xml';
	
	$serverurl = $domain . '/webservice/rest/server.php'. '?wstoken=' . $token . '&wsfunction='.$function_name;
	
	$user_fields = array();

$string='<?xml version="1.0"?>
<users><item0><username>testusername1</username><password>testpassword1</password><firstname>testfirstname1</firstname><lastname>testlastname1</lastname><email>testemail1@moodle.com</email><city>testcity1</city><country>co</country></item0><item1><username>testusername2</username><password>testpassword2</password><firstname>testfirstname2</firstname><lastname>testlastname2</lastname><email>testemail2@moodle.com</email><city>testcity2</city><country>co</country></item1></users>';


	$curl=curl_init($serverurl . $restformat);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $string);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	//curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type: application/xml'));
	//curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type: application/x-www-form-urlencoded'));
	$curl_response = curl_exec($curl);
	if ($curl_response === false) {
		$info = curl_getinfo($curl);
		curl_close($curl);
		die('error occured during curl exec. Additioanl info: ' . var_export($info));
	}
	curl_close($curl);
	print_r($curl_response);

?>
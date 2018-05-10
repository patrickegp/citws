<?php
/* *******************************************************************
	Webservice cliente para obtener usuarios de moodle
   *******************************************************************
*/
$service_url = 'https://test2.uao.edu.co/siga/webservice/rest/server.php';
$domain='https://test2.uao.edu.co/siga';

// $service_url = 'https://virtual.uao.edu.co/webservice/rest/server.php';
// $domain='https://virtual.uao.edu.co';

// get token
$file_token = "token_siga.tkn";
$fp = fopen($file_token, "r");
$token = fread($fp, filesize($file_token));

$function_name='core_user_get_users_by_field';

$service_url=$domain. '/webservice/rest/server.php' . '?wstoken=' . $token . '&wsfunction=' . $function_name;
$restformat = '&moodlewsrestformat=xml';

$args = array('field' => 'username', 'values' => 
	array('0' => 'jamarquez'));

$url_str=http_build_query($args);
print_r($args);
print_r($url_str);
$curl=curl_init($service_url . $restformat);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $url_str);
curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/x-www-form-urlencoded"));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

$curl_response = curl_exec($curl);
if ($curl_response === false) {
    $info = curl_getinfo($curl);
    curl_close($curl);
    die('error occured during curl exec. Additioanl info: ' . var_export($info));
}
curl_close($curl);
print "<br>";
//var_dump($fields_string);
print_r($curl_response);
?>
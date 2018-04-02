<?php
/* *******************************************************************
	Webservice cliente para obtener los usuarios matriculados en un curso
    de moodle
   *******************************************************************
*/
$domain='https://test2.uao.edu.co/siga';

$token='98053706d7ba2a06464113449c068fdd';
$function_name='core_enrol_get_enrolled_users';

$service_url=$domain. '/webservice/rest/server.php' . '?wstoken=' . $token . '&wsfunction=' . $function_name;
$restformat = '&moodlewsrestformat=json';

$args = array('courseid' => 100);

$url_str=http_build_query($args);
print_r($args);
print_r($url_str);
$curl=curl_init($service_url . $restformat);
curl_setopt($curl, CURLOPT_POST, true);
//var_dump($args);
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
print_r($curl_response);
?>
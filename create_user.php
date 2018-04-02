<?php
/* *******************************************************************
	Webservice cliente para crear usuarios de moodle
   *******************************************************************
*/
$service_url = 'http://test2.uao.edu.co/siga/webservice/rest/server.php';
$domain='http://test2.uao.edu.co/siga';

$token='b90fbf8066a4752a17619e8b9d79c9ca';
$function_name='core_user_create_users';
$moodlewsrestformat='json';

$service_url=$domain. '/webservice/rest/server.php' . '?wstoken=' . $token . '&wsfunction=' . $function_name;
$restformat = '&moodlewsrestformat=xml';

$args['users'] = [];
$user1 = array('username'=>'estudiante1', 'password'=>'Uao.2018', 'firstname'=>'estudiante1', 'lastname'=>'estudiante1', 'email'=>'estudiante1@uao.edu.co');
$args[] = $user1;
	
$url_str=http_build_query($args);
//$post_fields = json_encode($params)
$curl=curl_init($service_url . $restformat);
curl_setopt($curl, CURLOPT_POST, true);
var_dump($params);
curl_setopt($curl, CURLOPT_POSTFIELDS, $args);
//curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: multipart/form-data"));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$curl_response = curl_exec($curl);
if ($curl_response === false) {
    $info = curl_getinfo($curl);
    curl_close($curl);
    die('error occured during curl exec. Additioanl info: ' . var_export($info));
}
curl_close($curl);
print "<br>";
var_dump($fields_string);
print_r($curl_response);
?>
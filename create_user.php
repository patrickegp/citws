<?php
/* *******************************************************************
	Webservice cliente para crear usuarios de moodle
   *******************************************************************
*/
$domain='https://test2.uao.edu.co/siga';
$function_name='core_user_create_users';
$token='98053706d7ba2a06464113449c068fdd';

$service_url=$domain. '/webservice/rest/server.php' . '?wstoken=' . $token . '&wsfunction=' . $function_name;
$restformat = '&moodlewsrestformat=json';

$user1 = array('username'=>'estudiante3', 'password'=>'Uao.2018', 'firstname'=>'estudiante3', 'lastname'=>'estudiante3', 'email'=>'estudiante3@uao.edu.co');
$user2 = array('username'=>'estudiante4', 'password'=>'Uao.2018', 'firstname'=>'estudiante4', 'lastname'=>'estudiante4', 'email'=>'estudiante4@uao.edu.co');
$list_users = array($user1, $user2);

$args = array('users' => $list_users);
$url_str=http_build_query($args);

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

printf("------------------------------- \n");
printf("core_user_create_users\n");
printf("------------------------------- \n");
printf("ARGUMENTOS \n");
printf("---------- \n");
print_r($args);
printf("---------- \n");
printf("URL ENCODED \n");
printf("---------- \n");
print_r($url_str);
printf("\n");
printf("---------- \n");
printf("RESPONSE \n");
printf("---------- \n");
print_r($curl_response);
printf("\n");
printf("Success!\n");   
?>
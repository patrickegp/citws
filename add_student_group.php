<?php
/* *******************************************************************
	Webservice cliente para agregar usuario a grupo moodle
   *******************************************************************
*/
$service_url = 'https://test2.uao.edu.co/siga/webservice/rest/server.php';
$domain='https://test2.uao.edu.co/siga';

$token = '98053706d7ba2a06464113449c068fdd';
$function_name='core_group_add_group_members';
$service_url=$domain. '/webservice/rest/server.php' . '?wstoken=' . $token . '&wsfunction=' . $function_name;
$restformat = '&moodlewsrestformat=json';

$list_members = array();
$group = array('groupid' => 1583,  'userid' => 11475);
$list_members[] = $group;

$args = array('members' => $list_members);

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
printf("core_group_add_group_members\n");
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

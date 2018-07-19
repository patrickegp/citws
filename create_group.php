<?php
/* *******************************************************************
	Webservice cliente para crear group moodle
   *******************************************************************
*/
$service_url = 'https://test2.uao.edu.co/siga/webservice/rest/server.php';
$domain='https://test2.uao.edu.co/siga';

$token = '2f550433ec43fc9c55fb45cfe79e95f0';
$function_name='core_group_create_groups';
$service_url=$domain. '/webservice/rest/server.php' . '?wstoken=' . $token . '&wsfunction=' . $function_name;
$restformat = '&moodlewsrestformat=json';

$list_groups = array();
$group = array('courseid' => 1082,  'name' => 'grupo Z', 'description' => 'grupo Z defini');
$list_groups[] = $group;

$args = array('groups' => $list_groups);

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
printf("core_group_create_groups\n");
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

<?php
/* ***********************************************************************
	Webservice cliente para obtener datos del curso por medio del username
   ***********************************************************************
*/
//$domain='https://virtual.uao.edu.co';
$domain='https://test2.uao.edu.co/siga';
// $token='9eb8b1740608c41ffcf345a6210fc2b3';
// $token='e9f71033769b939f330fb85dd60c2172';
$token='98053706d7ba2a06464113449c068fdd';
$function_name='core_course_get_courses_by_field';

$service_url=$domain. '/webservice/rest/server.php' . '?wstoken=' . $token . '&wsfunction=' . $function_name;
$restformat = '&moodlewsrestformat=json';

$args['field'] = 'shortname';
$args['value'] = 'curso-sw-cit';

$url_str=http_build_query($args);
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

printf("------------------------------- \n");
printf("core_course_get_courses_by_field\n");
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

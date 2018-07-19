<?php
include "conf.php";
/* ***********************************************************************
	Webservice cliente para obtener datos del curso por medio del username
   ***********************************************************************
*/
// $domain='https://siga.uao.edu.co/moodle';
$token='2f550433ec43fc9c55fb45cfe79e95f0';
$function_name='core_course_get_courses_by_field';

$service_url = DOMAIN. '/webservice/rest/server.php' . '?wstoken=' . $token . '&wsfunction=' . $function_name;
$restformat = '&moodlewsrestformat=json';

$args['field'] = 'idnumber';
$args['value'] = '1010-jamarquez';

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

$response_object = json_decode($curl_response);

if (count($response_object->courses) == 0) {
    printf("Course ".$args['value']." not found!\n");
} else {    
    printf("------------------------------- \n");
    printf("core_course_get_courses_by_idnumber\n");
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
    printf("---------- \n");
    printf("RESPONSE PHP \n");
    printf("---------- \n");
    print_r($response_object);
    printf("---------------\n");
    printf("ACCESS ELEMENTS \n");
    printf("---------------\n");
    printf("id:%s fullname:%s", $response_object->courses[0]->id, $response_object->courses[0]->fullname);
    printf("\n");
    printf("Success!\n");
}
?>

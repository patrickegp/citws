<?php
/* ***********************************************************************
	Webservice cliente para obtener datos del curso por medio del username
   ***********************************************************************
*/
$domain='https://test2.uao.edu.co/siga';

$token='98053706d7ba2a06464113449c068fdd';
$function_name='core_enrol_get_users_courses';

$service_url=$domain. '/webservice/rest/server.php' . '?wstoken=' . $token . '&wsfunction=' . $function_name;
$restformat = '&moodlewsrestformat=json';

$args['userid'] = '11478';

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

$response_object = json_decode($curl_response);
if (isset($response_object->exception)) {
    printf("Error!\n");
    printf("Exception:%s\nErrorcode:%s\nMessage:%s", $response_object->exception, $response_object->errorcode, $response_object->message);
    printf("\n");
} else {
    printf("*****ARGS*****\n");
    print_r($args);
    printf("*****URL*****\n");
    print_r($url_str);
    printf("\n*****JSON RESPONSE *****\n");
    print_r($curl_response);
    printf("\n*****ARRAY RESPONSE *****\n");
    $response_json = json_decode($curl_response);
    var_dump($response_json);
    printf("\n*****CURSOS MATRICULADOS*****\n");
    foreach($response_json as $valor) {
        var_dump($valor->shortname);	
    }
    printf("\n*****READY! *****\n");
}
?>

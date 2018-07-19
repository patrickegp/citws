<?php
/* **********************************************
   Webservice cliente para duplicar curso semilla
   **********************************************
*/

$domain = 'https://test2.uao.edu.co/siga';
$token = '2f550433ec43fc9c55fb45cfe79e95f0';
$function_name = 'core_course_duplicate_course';

$service_url = $domain.'/webservice/rest/server.php'.'?wstoken='.$token.'&wsfunction='.$function_name;
$restformat = '&moodlewsrestformat=json';

$course_id = 837;
$modalidad = 'E';
$docente = 'jjcardonaq';
$codigo_asignatura = '711846';
$fullname = 'English Level IV A (Semilla)';
$shortname = '711846-B*';
$category_id = 35;

$args = array('courseid' => $course_id,
                'fullname' => $fullname.' - '.$docente,
                'shortname' => $codigo_asignatura.'-'.$modalidad.'-'.$docente,
                'categoryid' => $category_id);

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

if (isset($response_object->exception)) {
    printf($response_object->message."\n");
 } else {    
    printf("------------------------------- \n");
    printf("core_course_duplicate_course\n");
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
    // printf("id:%s fullname:%s", $response_object->courses[0]->id, $response_object->courses[0]->fullname);
    printf("\n");
    printf("Success!\n");

    exit(0);
}
?>
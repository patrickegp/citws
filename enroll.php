<?php
/* *******************************************************************
	Webservice cliente para matricular usuario moodle
   *******************************************************************
*/
$service_url = 'https://test2.uao.edu.co/siga/webservice/rest/server.php';
$domain='https://test2.uao.edu.co/siga';

$token = '98053706d7ba2a06464113449c068fdd';
$function_name='enrol_manual_enrol_users';
$service_url=$domain. '/webservice/rest/server.php' . '?wstoken=' . $token . '&wsfunction=' . $function_name;
$restformat = '&moodlewsrestformat=json';

$inicio = "21-05-2018";
$fin = "24-05-2018";

$list_students = array();
$student = array('roleid' => 5,
                'userid' => 11476, 'courseid' => 986,
                'timestart' => strtotime($inicio),
                'timeend' => strtotime($fin));
                
$list_students[] = $student;

$args = array('enrolments' => $list_students);

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
    printf("Exception!\n");
    print_r($response_object);
} else {
    printf("------------------------------- \n");
    printf("enrol_manual_enrol_users\n");
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
}

return;
?>

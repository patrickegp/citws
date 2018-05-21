<?php
/* *******************************************************************
	Webservice cliente para obtener usuarios de moodle
   *******************************************************************
*/
$service_url = 'https://test2.uao.edu.co/siga/webservice/rest/server.php';
$domain='https://test2.uao.edu.co/siga';

$token = '98053706d7ba2a06464113449c068fdd';
$function_name='core_user_get_users_by_field';
$service_url=$domain. '/webservice/rest/server.php' . '?wstoken=' . $token . '&wsfunction=' . $function_name;
$restformat = '&moodlewsrestformat=json';

$args = array('field' => 'username', 'values' => 
	array('0' => 'estudiante6'));

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

$response_php = json_decode($curl_response);
if (empty($response_php)) {
    printf("User not found!");
    printf("\n");
} else {
    printf("------------------------------- \n");
    printf("core_user_get_users_by_field\n");
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
    printf("RESPONSE CURL \n");
    printf("---------- \n");
    print_r($curl_response);
    printf("\n");
    printf("---------- \n");
    printf("RESPONSE PHP \n");
    printf("---------- \n");
    print_r($response_php);
    printf("---------- \n");
    printf("ACCESS ELEMENTS \n");
    printf("---------- \n");
    printf("username:%s firstname:%s", $response_php[0]->username, $response_php[0]->firstname);
    printf("\n");
    printf("Success!\n");
}
?>
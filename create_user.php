<?php
/* *******************************************************************
	Webservice cliente para crear usuarios de moodle
   *******************************************************************
*/

function createUser($domain, $token, $args) {

    $function_name='core_user_create_users';
    $service_url=$domain. '/webservice/rest/server.php' . '?wstoken=' . $token . '&wsfunction=' . $function_name;
    $restformat = '&moodlewsrestformat=json';

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
        printf("---------- \n");
        printf("RESPONSE PHP \n");
        printf("---------- \n");
        print_r($response_object);
        printf("---------- \n");
        printf("ACCESS ELEMENTS \n");
        printf("---------- \n");
        printf("id:%s username:%s", $response_object[0]->id, $response_object[0]->username);
        printf("\n");

        printf("Success!\n");   
    }
    
    return;
}

?>
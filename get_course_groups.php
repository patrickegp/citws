<?php
/* ***********************************************************************
	Webservice cliente para obtener datos del curso por medio del username
   ***********************************************************************
*/
    $domain = 'https://test2.uao.edu.co/siga';
    $function_name = 'core_group_get_course_groups';
    $token = '2f550433ec43fc9c55fb45cfe79e95f0';

    $service_url = $domain.'/webservice/rest/server.php'.'?wstoken='.$token.'&wsfunction='.$function_name;
    $restformat = '&moodlewsrestformat=json';
    
    $args['courseid'] = 1085;
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
    
    printf("------------------------------- \n");
    printf("core_course_get_course_groups\n");
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
    
    if (isset($response_object->exception)) {    
        printf("---------- \n");
        printf("EXCEPTION \n");
        printf("---------- \n");

        $data = array("status" => "failed", "service" => "addmembertogroup", "message" => $response_object->message);
    } else {
        var_dump($response_object);
        
        if (count($response_object) == 0) {
            printf("no hay grupos! \n");
        }
    }
    
    printf("Success!\n");    
?>
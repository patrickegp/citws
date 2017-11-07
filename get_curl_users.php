<?php

$service_url = 'https://test2.uao.edu.co/siga/webservice/rest/server.php';

$curl=curl_init($service_url);
$curl_post_data = array('wstoken'=>'64ddc5eec3084ca865a752b8b647cab3','wsfunction'=>'core_enrol_get_enrolled_users', 'moodlewsrestformat'=>'json');
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, array('wstoken'=>'64ddc5eec3084ca865a752b8b647cab3','wsfunction'=>'core_enrol_get_enrolled_users', 'moodlewsrestformat'=>'json'));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$curl_response = curl_exec($curl);
if ($curl_response === false) {
    $info = curl_getinfo($curl);
    curl_close($curl);
    die('error occured during curl exec. Additioanl info: ' . var_export($info));
}
curl_close($curl);
print_r($curl_response);
?>
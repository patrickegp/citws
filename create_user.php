<?php
$service_url = 'http://test2.uao.edu.co/siga/webservice/rest/server.php';
$domain='http://test2.uao.edu.co/siga';

$token='b90fbf8066a4752a17619e8b9d79c9ca';
$function_name='core_user_create_users';
$moodlewsrestformat='xml';

$service_url=$domain. '/webservice/rest/server.php' . '?wstoken=' . $token . '&wsfunction=' . $function_name;
$restformat = '&moodlewsrestformat=xml';

$user1 = array('username'=>'testusername1', 'password'=>'testpassword1', 'firstname'=>'testfirstname1', 'lastname'=>'lastname1', 'email'=>'testemail1@moodle.com', 'city'=>'testcity1', 'country'=>'co');
$params = array('users' => $user1);
$fields_string=http_build_query($params);
//$post_fields = json_encode($params)
$curl=curl_init($service_url . $restformat);
curl_setopt($curl, CURLOPT_POST, true);
var_dump($params);
curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
//curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: multipart/form-data"));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$curl_response = curl_exec($curl);
if ($curl_response === false) {
    $info = curl_getinfo($curl);
    curl_close($curl);
    die('error occured during curl exec. Additioanl info: ' . var_export($info));
}
curl_close($curl);
print "<br>";
var_dump($fields_string);
print_r($curl_response);
?>
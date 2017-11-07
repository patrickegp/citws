<?php
$service_url = 'http://test2.uao.edu.co/wstest/apiarray.php';
$token='98765';

$user1 = array(
	'username' => 'usernametest1',
	'password' => 'Moodle2011!',
	'email' => 'usertest1@example.com',
	);
	
$user2 = array(
	'username' => 'usernametest2',
	'password' => 'Moodle2012!',
	'email' => 'usertest1@example.com',
	);
	
$lista = array($user1, $user2);
$curl_post_data = array('users'=>$lista);

//enviar JSON
//convertir data php a json
$curl_post_data_json = json_encode($curl_post_data);
$str = $curl_post_data_json;
echo 'Codificación JSON!';
echo '<br>';

echo '<br>';
echo $str;

echo '<br>';
echo '<br>';
echo '<br>';
echo '***********************';
echo '<br>';
echo 'Enviando al servidor!';
echo '<br>';
echo '***********************';
echo '<br>';
$curl=curl_init($service_url.'?token='.$token);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
curl_setopt($curl, CURLOPT_POSTFIELDS, $str);
curl_setopt($ch, CURLOPT_POST, 1);

$curl_response = curl_exec($curl);
if ($curl_response === false) {
    $info = curl_getinfo($curl);
    curl_close($curl);
    die('error occured during curl exec. Additioanl info: ' . var_export($info));
}
curl_close($curl);
echo 'Usted envio esto!';
echo '<br>';
print_r($curl_response);

?>
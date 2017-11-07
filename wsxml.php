<?php
//$service_url = 'http://test.uao.edu.co/restapi/apiarray.php';
$service_url = 'http://test2.uao.edu.co/wstest/apiarray.php';
$token='98765';

$curl=curl_init($service_url.'?token='.$token);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type: text/xml'));
curl_setopt($curl, CURLOPT_POSTFIELDS, '<xml>here</xml>');
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
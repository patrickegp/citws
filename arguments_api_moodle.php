<?php
echo '**************************<br>';
echo 'ARGUMENTOS API MOODLE<br>';
echo 'ARRAYS - URL CODIFICADA<br>';
echo '**************************<br>';

echo '**************************<br>';
echo 'get_user<br>';
echo '**************************<br>';
$data = array('field'=>'username', 'values'=> array('0'=>'citws'));
var_dump($data);
echo '<br>url encoded:<br>';
$query = http_build_query($data);
echo $query;
echo '<br>***********************<br>';
echo '<br>';
echo '*********************************<br>';
echo 'core_course_get_courses_by_field<br>';
echo '*********************************<br>';
$parameters = array('field'=>'shortname', 'value'=>'312273-B-IP-20173');
var_dump($parameters);
$query = http_build_query($parameters);
echo $query;
echo '<br>';
echo '<br>***********************<br>';
echo 'core_user_create_users<br>';
echo '***************************<br>';

$user1 = array('username' => 'estudiante1',
				'password' => 'Cit.2018',
				'firstname'=>'nombre1',
				'lastname' => 'apellido1',
				'email' => 'nombre1@uao.edu.co');

$user2 = array('username' => 'estudiante2',
				'password' => 'Cit.2018',
				'firstname'=>'nombre2',
				'lastname' => 'apellido2',
				'email' => 'nombre2@uao.edu.co');
				
$list_users = array(1 => $user1, 2 => $user2);
$parameters = array('users'=>$list_users);
$query = http_build_query($parameters);
var_dump($parameters);
echo '<br>';
echo '<br>url encoded:<br>';
echo $query;
echo '<br>';
echo '<br>';
echo '***************************<br>';
echo 'core_course_create_courses<br>';
echo '***************************<br>';

$course1 = array ('fullname'=>'Course 1',
					'shortname'=>'course1',
					'categoryid'=>'100',
					'idnumber'=>'100');

$course2 = array ('fullname'=>'Course 2',
					'shortname'=>'course2',
					'categoryid'=>'100',
					'idnumber'=>'200');

$list_courses = array('courses' => []);
$list_courses['courses'][] = $course1;
$list_courses['courses'][] = $course2;
var_dump($list_courses);

echo '<br>url encoded:<br>';
$query = http_build_query($list_courses);
echo $query;
?>
<?php
    include "create_user.php";

    $domain='https://test2.uao.edu.co/siga';
    $token='98053706d7ba2a06464113449c068fdd';
    
    $user1 = array('username'=>'estudiante13', 
                    'password'=>'Uao.2018', 
                    'firstname'=>'estudiante13', 
                    'lastname'=>'estudiante13', 
                    'email'=>'estudiante13@uao.edu.co', 
                    'auth' => 'manual',
                    'preferences' => array('0' => array('type' => 'auth_forcepasswordchange', 'value' => 1)));
                                           
    //$user2 = array('username'=>'estudiante4', 'password'=>'Uao.2018', 'firstname'=>'estudiante4', 'lastname'=>'estudiante4', 'email'=>'estudiante4@uao.edu.co');
    
    // $list_users = array($user1, $user2);
    
    $list_users = array($user1);
    $args = array('users' => $list_users);
  
    createUser($domain, $token, $args);

?>
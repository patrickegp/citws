<?php
	/* Returns a structure defining
	   a test user whose name, password, etc. end
	   in $n.
	*/
	function make_test_user( $n ) 
	{
	  
	  /*
	  $user = array("username" => "testusername",
	  "password" => "Testusername.1",
	  "firstname" => "Testfirstname",
	  "lastname" => "testlastname",
	  "email" => "testemail" . $n . "@moodle.com",
	  "auth" => "auth",
	  "idnumber" => "testidnumber2",
	  "firstname" => 'testfirstname',
	  "firstname" => 'testfirstname');*/
	  
        /*
		$user1 = new stdClass();
		$user1->username = 'testusername1';
		$user1->password = 'testpassword1';
		$user1->firstname = 'testfirstname1';
		$user1->lastname = 'testlastname1';
		$user1->email = 'testemail1@moodle.com';
		$user1->auth = 'manual';
		$user1->idnumber = 'testidnumber1';
		$user1->lang = 'en';
		$user1->theme = 'standard';
		$user1->timezone = '-12.5';
		$user1->mailformat = 0;
		$user1->description = 'Hello World!';
		$user1->city = 'testcity1';
		$user1->country = 'au';*/
		/*
		$userFields = array();
		$userFields['username'] = 'testusername'.$n;
		$userFields['password'] = 'testpassword'.$n;
		$userFields['firstname'] = 'testfirstname'.$n;
		$userFields['lastname'] = 'testlastname'.$n;
		$userFields['email'] = 'testemail'.$n.'@moodle.com';
		$userFields['city'] = 'testcity'.$n;
		$userFields['country'] = 'co';
		*/
		
		$user = array(
            'username' => 'usernametest1',
            'password' => 'Moodle2012!',
            'idnumber' => 'idnumbertest1',
            'firstname' => 'First Name User Test 1',
            'lastname' => 'Last Name User Test 1',
            'middlename' => 'Middle Name User Test 1',
            'email' => 'usertest1@example.com',
            'description' => 'This is a description for user 1',
            'city' => 'Perth',
            'country' => 'AU'
            );
		
	  return $user;
	}
	
	/* Returns a structure defining
   a test course whose name etc. end
   in $n.

   I have set the category ID to 1.
   This works, but is almost certainly wrong.
   I need to find out what it should be.
	*/
	function make_test_course( $n ) 
	{
	  $course = new stdClass();
	  $course->fullname = 'testcourse' . $n;
	  $course->shortname = 'testcourse' . $n;
	  $course->categoryid = 1;
	  return $course;
	}
?>
<?php
	include 'make_test.php';
	include 'lib.php';
	
	function demo()
	{
	  try {

		print "Test CIT Web services\n";
		print "<br>";
		print "===========================\n";
		print "<br>";
		$token = 'b90fbf8066a4752a17619e8b9d79c9ca';
		print "\nUses this token which I created manually: " . $token . "\n"; 
		print "<br>";
		print "\nWill now create a user from this data:\n";
		print "<br>";
		print "<br>";
		$user_suffix = 100;
		$user_data = make_test_user( $user_suffix );
		print_r($user_data); 
		print "\n";
		print "<br>";
		print "<br>";
		
		$user_id = create_user( $user_data, $token );
		print "\nUser's ID = " . $user_id . "\n";

		/*
		print "\nWill now get the user details using that ID:\n";
		$xml_user_data = get_user( $user_id, $token );
		print "\nUser details:\n";
		print $xml_user_data;
		
		print "<br>";
		print "\nWill now create a course from this data:\n";
		print "<br>";
		$course_suffix = 100;
		//$course_data = make_test_course( $course_suffix );
		print_r( $course_data ); 
		print "\n";

		/*
		$course_id = create_course( $course_data, $token );
		print "\nCourse ID = " . $course_id . "\n";

		print "\nWill now enrol the user:\n";
		$role_id = 1;
				   // I don't know how to get the IDs for the roles we actually have.
		enrol( $user_id, $course_id, $role_id, $token );

		print "\nWill now delete the user:\n";
		delete_user( $user_id, $token );
		*/

	  } 
	  catch ( Exception $e ) {
		print "\nCaught exception:\n" . $e->getMessage() . "\n";
	  }
	}
	
	demo();
?>

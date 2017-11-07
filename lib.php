<?php
	include 'util.php';
	include 'conexion.php';
	/* Creates a user from a
	   structure defining a user. If the
	   creation succeeds, returns the 
	   ID for this user. If not, throws
	   an exception whose text is the XML
	   returned by Moodle.
	*/
	function create_user( $user, $token )
	{
	  $users = array( $user );
	  $params = array( 'users' => $users );
	  
	  //$params = array($user);

		var_dump($params); 
		print "\n";
		print "<br>";
		print "<br>";
	  
	  
	  $response = call_moodle( 'core_user_create_users', $params, $token );

	  print "Response from moodle_user_create_users: \n";
	  print_r( $response );

	  if ( xml_is_exception( $response ) )
		throw new Exception( $response );
	  else {
		$user_id = success_xml_to_id( $response );
		return $user_id;
	  }
	}
	
	/* Returns the XML string containing Moodle's
   data for user ID $id. Does not
   check for an error response, because if there
   is no such user, Moodle seems just to
   return a piece of XML containing no user
   data.
	*/
	function get_user( $user_id, $token )
	{
	  $userids = array( $user_id );
	  $params = array( 'userids' => $userids );

	  $response = call_moodle( 'moodle_user_get_users_by_id', $params, $token );

	  print "Response from moodle_user_get_users_by_id: \n";
	  print_r( $response );

	  return $response;
	}
	
	/* Deletes the user with ID $user_id. 
   If the delete fails, throws
   an exception whose text is the XML
   returned by Moodle.
	*/
	function delete_user( $user_id, $token )
	{
	  $userids = array( $user_id );
	  $params = array( 'userids' => $userids );

	  $response = call_moodle( 'moodle_user_delete_users', $params, $token );

	  print "Response from moodle_user_delete_users: \n";
	  print_r( $response );

	  if ( xml_is_exception( $response ) )
		throw new Exception( $response );
	}
	
	/* Assigns the role with $role_id to the user with $user_id.

   I haven't tested this, because I can't find a function
   for converting the roles we have to role IDs.
	*/
	function assign_role( $role_id, $user_id, $context_id, $token )
	{
	  $assignment = array( 'roleid' => $role_id, 'userid' => $user_id, 'contextid' => $context_id );
	  $assignments = array( $assignment );
	  $params = array( 'assignments' => $assignments );

	  $response = call_moodle( 'moodle_role_assign', $params, $token );

	  print "Response from moodle_role_assign: \n";
	  print_r( $response );
	}
	
	/* Creates a course from a
   structure defining a course. If the
   creation succeeds, returns the 
   ID for this course. If not, throws
   an exception whose text is the XML
   returned by Moodle.
	*/
	function create_course( $course, $token ) 
	{
	  $courses = array( $course );
	  $params = array( 'courses' => $courses );

	  $response = call_moodle( 'moodle_course_create_courses', $params, $token );

	  print "Response from moodle_course_create_courses: \n";
	  print_r( $response );

	  if ( xml_is_exception( $response ) )
		throw new Exception( $response );
	  else {
		$course_id = success_xml_to_id( $response );
		return $course_id;
	  }
	}

	/* Enrols the user into the course with the specified role.
	   Does not yet check for errors.

	   I haven't tested this, because our Moodle is
	   missing moodle_enrol_manual_enrol_users.
	*/
	function enrol( $user_id, $course_id, $role_id, $token ) 
	{
	  $enrolment = array( 'roleid' => $role_id, 'userid' => $user_id, 'courseid' => $course_id );
	  $enrolments = array( $enrolment );
	  $params = array( 'enrolments' => $enrolments );

	  $response = call_moodle( 'moodle_enrol_manual_enrol_users', $params, $token );

	  print "Response from moodle_enrol_manual_enrol_users: \n";
	  print_r( $response );
	}
?>
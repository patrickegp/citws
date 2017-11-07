<?php
	/* Calls the Moodle at http://test2.uao.edu.co, invoking the specified
	   function on $params. Also takes a token. 
	   Returns Moodle's response as a string containing XML.
	*/ 
	function call_moodle( $function_name, $params, $token )
	{
	  $domain = 'http://test2.uao.edu.co/siga';

	  $serverurl = $domain . '/webservice/rest/server.php'. '?wstoken=' . $token . '&wsfunction='.$function_name;
      $restformat = '&moodlewsrestformat=xml';
	  require_once( './curl.php' );
	  $curl = new curl;
	  $params = "&users[0][username]=loginnn&users[0][password]=4815162342Qq*&users[0][firstname]=allala&users[0][lastname]=trest&users[0][email]=ty@mail.ru";
	  $response = $curl->post( $serverurl . $restformat, $params );
	  return $response;
	}
?>

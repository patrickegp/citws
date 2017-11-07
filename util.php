<?php

/* Given a string containing XML returned
   by a successful user creation or course
   creation, parses it and returns the user or course ID.
   Undefined if the XML does not contain such an ID,
   for example if it's an error response.
*/
function success_xml_to_id( $xml_string )
{
  $xml_tree = new SimpleXMLElement( $xml_string ); 

  $value = $xml_tree->MULTIPLE->SINGLE->KEY->VALUE;
  $id = sprintf( "%s", $value );
  // See discussion on http://php.net/manual/es/book.simplexml.php ,
  // especially the posting for "info at kevinbelanger dot com 20-Jan-2011 05:07".
  // There is a bug in the XML parser whereby it doesn't return the
  // text associated with property [0] of a node. The above
  // posting uses sprintf to force a conversion to string.

  return $id;
} 


/* True if $xml_string's top-level is
   <EXCEPTION>. I use this to check for error
   responses from Moodle.
*/
function xml_is_exception( $xml_string )
{
  $xml_tree = new SimpleXMLElement( $xml_string ); 

  $is_exception = $xml_tree->getName() == 'EXCEPTION';
  return $is_exception;
} 
?>
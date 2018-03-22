<?php
	// By security this file has token. It must be only read mode.
	$filetoken = "wsmoodle.tkn";

	if (file_exists($filetoken)) {
		echo "El fichero $filetoken existe\n";
	} else {
		exit("file token not found!\n");
	}
	
	exit(0);
	
?>

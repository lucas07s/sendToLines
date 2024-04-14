<?php

require_once('./functions.php');

$tokens = getTokens();

if(empty($tokens)) {

	//ANCHOR: Error

}

$message = [
	'test'
];

sendLine($tokens, $message);

?>
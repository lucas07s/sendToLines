<?php

require_once('./configs.php');

function getTokens() {

	if(!file_exists(TOKENS_FILE_PATH)) {

		//ANCHOR: Error
		echo 'Token File is Not Found.';

		die();

	}
	else {

		$fp = fopen(TOKENS_FILE_PATH, 'r');

		while($token = fgetcsv($fp)) $tokens[] = $token;

		fclose($fp);

	}

	return $tokens;

}

function sendLine(array $tokens, array $message) {

	$data = http_build_query(
		['message' => implode("\n", $message)],
		'',
		'&'
	);

	foreach($tokens as $token) {

		$options = [
			'http'=> [
				'method'=>'POST',
				'header'=> 'Authorization: Bearer ' . $token[0] . "\r\n"
						 . "Content-Type: application/x-www-form-urlencoded\r\n"
						 . 'Content-Length: ' . strlen($data) . "\r\n",
				'content' => $data,
			]
		];

		$context = stream_context_create($options);

		file_get_contents('https://notify-api.line.me/api/notify', false, $context);

	}

}

?>
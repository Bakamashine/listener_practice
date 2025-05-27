<?php

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	try {
		require($_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php");
		Database\MainDB::connect();
		// $values = file_get_contents("php://input");
		$text= $_POST['name'];
		(new Model\Logs)->create([$text]);
	} catch (Exception $e) {
			echo $e->getMessage();
	}
} else {
	die("Метод не поддерживается");
}

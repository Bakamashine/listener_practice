<?php

require($_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php");
use Database\MainDB;
MainDB::connect();
?>

<head>
    <link rel="stylesheet" href="/css/bootstrap.css">
    <script src="/js/bootstrap.js"></script>
</head>
<header>
	<a href="/adminer.php">Adminer</a>
</header>

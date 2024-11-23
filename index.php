<?php
$controller = $_GET['c'] ?? 'Film';
$method = $_GET['m'] ?? 'index';

include_once "controllers/Controller.class.php";
include_once "controllers/$controller.class.php";
(new $controller)->$method();

include "views/header.php";
include "views/footer.php";
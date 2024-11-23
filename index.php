<?php
session_start();

$method = $_GET['m'] ?? 'index';

if (isset($_SESSION["username"]))
    $controller = $_GET['c'] ?? 'Film';
else
    $controller = $_GET['c'] ?? 'Auth';

include_once "controllers/Controller.class.php";
include_once "controllers/$controller.class.php";
(new $controller)->$method();

include "views/header.php";
include "views/footer.php";
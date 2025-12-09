<?php

require_once "config.php";  
require_once "App/Controllers/BusinessOwnerController.php";

$controller = new BusinessOwnerController($conn);
$controller->index();

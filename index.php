<?php

require_once "config.php";
require_once "App/Controllers/BusinessOwnerController.php";
require_once "App/Models/BusinessOwnerModel.php";

$model = new BusinessOwnerModel($conn);
$controller = new BusinessOwnerController($model);

$controller->index();

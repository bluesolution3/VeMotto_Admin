<?php

require_once __DIR__ . '/../Models/BusinessOwnerModel.php';

class BusinessOwnerController {

    protected $model;

    public function __construct($db)
    {
        $this->model = new BusinessOwnerModel($db);
    }

    public function index()
    {
        $status = $_GET['status'] ?? null;
        $province = $_GET['province'] ?? null;

        $owners = $this->model->getFilteredOwners($status, $province);

        include __DIR__ . '/../Views/business_owners/list.php';
    }
}



<?php

class BusinessOwnerController
{
    private $model;

    public function __construct($businessOwnerModel)
    {
        $this->model = $businessOwnerModel;
    }

    public function index()
    {
        // If view page clicked
        if (isset($_GET['view'])) {
            $owner = $this->model->getById($_GET['view']);

            include __DIR__ . '/../Views/business_owners/view.php';
            return;
        }

        // Update Status
        if (isset($_GET['action']) && isset($_GET['id'])) {
            $newStatus = ($_GET['action'] === "activate") ? "active" : "inactive";
            $this->model->updateStatus($_GET['id'], $newStatus);
            header("Location: index.php");
            exit;
        }

        // List + Filters
        $status = $_GET['status'] ?? null;
        $province = $_GET['province'] ?? null;

        $owners = $this->model->getFilteredOwners($status, $province);

        include __DIR__ . '/../Views/business_owners/list.php';
    }
}

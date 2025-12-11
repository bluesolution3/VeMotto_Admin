<?php

class BusinessOwnerModel
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Filter + list
    public function getFilteredOwners($status, $province)
    {
        $sql = "SELECT * FROM business_owners WHERE 1=1";

        $params = [];

        if (!empty($status)) {
            $sql .= " AND status = :status";
            $params['status'] = $status;
        }

        if (!empty($province)) {
            $sql .= " AND province = :province";
            $params['province'] = $province;
        }

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get one business owner
    public function getById($id)
    {
        $query = "SELECT * FROM business_owners WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update status (active/inactive)
    public function updateStatus($id, $status)
    {
        $query = "UPDATE business_owners SET status = :status WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute(['status' => $status, 'id' => $id]);
    }
}

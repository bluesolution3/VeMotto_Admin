<?php

class BusinessOwnerModel {

    protected $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getFilteredOwners($status = null, $province = null)
    {
        $sql = "SELECT * FROM business_owners WHERE 1=1";

        $params = [];

        if (!empty($status)) {
            $sql .= " AND status = :status";
            $params[':status'] = $status;
        }

        if (!empty($province)) {
            $sql .= " AND province = :province";
            $params[':province'] = $province;
        }

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

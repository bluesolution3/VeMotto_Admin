<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Business Owner Details</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 30px;
        }

        .container {
            background: #fff;
            padding: 30px;
            max-width: 900px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: left;
            margin-bottom: 25px;
            color: #333;
        }

        .details-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
            margin-bottom: 30px;
        }

        .detail-box {
            background: #fafafa;
            padding: 15px;
            border-radius: 8px;
            border: 1px solid #e0e0e0;
        }

        .label {
            font-weight: bold;
            color: #555;
            margin-bottom: 5px;
            display: block;
        }

        .value {
            color: #222;
            font-size: 15px;
        }

        .status-box {
            margin-top: 20px;
        }

        .status-active {
            color: #28a745;
            font-weight: bold;
        }

        .status-inactive {
            color: #dc3545;
            font-weight: bold;
        }

        .btn {
            padding: 10px 20px;
            background: #007bff;
            display: inline-block;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }

        .btn:hover {
            background: #0056b3;
        }

        .btn-danger {
            background: #dc3545;
        }

        .btn-danger:hover {
            background: #b02a37;
        }

        .btn-success {
            background: #28a745;
        }

        .btn-success:hover {
            background: #1f7d32;
        }

        .qr-section {
            margin-top: 30px;
            text-align: center;
        }

        .qr-section img {
            margin-top: 15px;
            width: 180px;
            height: 180px;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Business Owner Details</h2>

    <div class="details-grid">

        <div class="detail-box">
            <span class="label">Name:</span>
            <span class="value"><?= $owner['first_name'] . ' ' . $owner['last_name'] ?></span>
        </div>

        <div class="detail-box">
            <span class="label">Business Name:</span>
            <span class="value"><?= $owner['business_name'] ?></span>
        </div>

        <div class="detail-box">
            <span class="label">Province:</span>
            <span class="value"><?= $owner['province'] ?></span>
        </div>

        <div class="detail-box">
            <span class="label">Email:</span>
            <span class="value"><?= $owner['email'] ?></span>
        </div>

        <div class="detail-box">
            <span class="label">Phone:</span>
            <span class="value"><?= $owner['phone'] ?></span>
        </div>

        <div class="detail-box status-box">
            <span class="label">Status:</span>

            <?php if ($owner['status'] == "active"): ?>
                <span class="status-active">Active</span><br>
                <a class="btn btn-danger" href="?action=deactivate&id=<?= $owner['id'] ?>">Deactivate</a>
            <?php else: ?>
                <span class="status-inactive">Inactive</span><br>
                <a class="btn btn-success" href="?action=activate&id=<?= $owner['id'] ?>">Activate</a>
            <?php endif; ?>
        </div>

    </div>

    <div class="qr-section">
        <h3>Business QR Code</h3>
        <img src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&data=BusinessOwnerID:<?= $owner['id'] ?>" />
    </div>

    <br>
    <a href="index.php" class="btn">Back to List</a>

</div>

</body>
</html>

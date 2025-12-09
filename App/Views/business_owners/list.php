<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Business Owners</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f7fa;
            margin: 0;
            padding: 20px;
        }

        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            max-width: 1200px;
            margin: auto;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .filters {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        select, button {
            padding: 10px;
            font-size: 14px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
        }

        table th {
            text-align: left;
            padding: 12px;
            background: #f1f1f1;
            border-bottom: 1px solid #ddd;
        }

        table td {
            padding: 12px;
            border-bottom: 1px solid #eee;
        }

        .status-active {
            background: #d4edda;
            color: #155724;
            padding: 4px 8px;
            border-radius: 5px;
            font-size: 12px;
            font-weight: bold;
        }

        .status-inactive {
            background: #f8d7da;
            color: #721c24;
            padding: 4px 8px;
            border-radius: 5px;
            font-size: 12px;
            font-weight: bold;
        }

        .view-btn {
            padding: 6px 10px;
            background: #28a745;
            color: #fff;
            border-radius: 4px;
            font-size: 12px;
            text-decoration: none;
        }

        .view-btn:hover {
            background: #1f7d34;
        }

    </style>
</head>
<body>
<div class="container">
    <h2>Business Owners</h2>

    <form method="GET" class="filters">
        <select name="status">
            <option value="">Status (All)</option>
            <option value="active" <?= ($_GET['status'] ?? '') == 'active' ? 'selected' : '' ?>>Active</option>
            <option value="inactive" <?= ($_GET['status'] ?? '') == 'inactive' ? 'selected' : '' ?>>Inactive</option>
        </select>

        <select name="province">
            <option value="">Province (All)</option>
            <option value="ON" <?= ($_GET['province'] ?? '') == 'ON' ? 'selected' : '' ?>>Ontario</option>
            <option value="AB" <?= ($_GET['province'] ?? '') == 'AB' ? 'selected' : '' ?>>Alberta</option>
            <option value="BC" <?= ($_GET['province'] ?? '') == 'BC' ? 'selected' : '' ?>>British Columbia</option>
        </select>

        <button type="submit">Apply Filters</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Owner Name</th>
                <th>Business Name</th>
                <th>Province</th>
                <th>Status</th>
                <th>Email</th>
                <th>Phone</th>
                <th>View</th>
            </tr>
        </thead>

        <tbody>
        <?php if (!empty($owners)) : ?>
            <?php foreach ($owners as $index => $owner): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $owner['first_name'] . ' ' . $owner['last_name'] ?></td>
                    <td><?= $owner['business_name'] ?></td>
                    <td><?= $owner['province'] ?></td>
                    <td>
                        <span class="status-<?= $owner['status'] ?>">
                            <?= ucfirst($owner['status']) ?>
                        </span>
                    </td>
                    <td><?= $owner['email'] ?></td>
                    <td><?= $owner['phone'] ?></td>
                    <td>
                        <a href="?view=<?= $owner['id'] ?>" class="view-btn">View</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="8" style="text-align:center; padding:20px; color:#777;">
                    No Records Found
                </td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>

</div>
</body>
</html>

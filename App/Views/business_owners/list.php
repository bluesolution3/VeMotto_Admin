<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Business Owners</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #eef1f5;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 1300px;
            margin: auto;
            background: #fff;
            padding: 25px 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        h2 {
            color: #333;
            margin-bottom: 25px;
            border-left: 4px solid #007bff;
            padding-left: 12px;
        }

        .filters {
            display: flex;
            gap: 20px;
            margin-bottom: 25px;
            align-items: center;
        }

        .filters select, .filters input {
            padding: 10px 12px;
            font-size: 14px;
            border-radius: 6px;
            border: 1px solid #ccc;
            outline: none;
        }

        button {
            padding: 10px 16px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
        }

        button:hover {
            background: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        table th {
            text-align: left;
            background: #f7f9fc;
            color: #555;
            padding: 14px;
            font-size: 14px;
            border-bottom: 2px solid #e4e7eb;
        }

        table td {
            padding: 14px;
            border-bottom: 1px solid #e4e7eb;
            font-size: 14px;
            color: #333;
        }

        tr:hover {
            background: #f4f8ff;
        }

        .status-active {
            background: #d4edda;
            color: #155724;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .status-inactive {
            background: #f8d7da;
            color: #721c24;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .view-btn {
            padding: 8px 12px;
            background: #28a745;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-size: 12px;
        }

        .view-btn:hover {
            background: #1e7d34;
        }

        .search-box {
            flex: 1;
        }

        .search-box input {
            width: 100%;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Business Owners</h2>

    <!-- Filters + Search -->
    <form class="filters" method="GET">

        <div class="search-box">
            <input type="text" name="keyword" placeholder="Search by name, email or business...">
        </div>

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

        <button type="submit">Apply</button>
    </form>

    <!-- Table -->
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
            <?php foreach ($owners as $index => $o): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $o['first_name'] . ' ' . $o['last_name'] ?></td>
                    <td><?= $o['business_name'] ?></td>
                    <td><?= $o['province'] ?></td>

                    <td>
                        <span class="status-<?= $o['status'] ?>">
                            <?= ucfirst($o['status']) ?>
                        </span>
                    </td>

                    <td><?= $o['email'] ?></td>
                    <td><?= $o['phone'] ?></td>

                    <td>
                        <a class="view-btn" href="?view=<?= $o['id'] ?>">View</a>
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

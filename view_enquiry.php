<?php include 'db.php';
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all enquiries
$sql = "SELECT * FROM enquiries ORDER BY created_at DESC";
$result = $conn->query($sql);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Enquiries</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f8f9fa; padding: 20px; }
        h2 { text-align: center; }
        table { border-collapse: collapse; width: 100%; background: #fff; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: center; }
        th { background-color: #007bff; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        tr:hover { background-color: #ddd; }
        a.btn { text-decoration: none; padding: 6px 12px; border-radius: 4px; }
        .btn-edit { background: #ffc107; color: black; }
        .btn-delete { background: #dc3545; color: white; }
        .btn-add { background: #28a745; color: white; }
    </style>
</head>
<body>
    <h2>All Enquiries</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Date of Enquiry</th>
                <th>Reference</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>" . htmlspecialchars($row['name']) . "</td>
                            <td>{$row['phone']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['date_of_enquiry']}</td>
                            <td>{$row['reference']}</td>
                            <td>{$row['created_at']}</td>
                            <td>
                                <a href='edit_enquiry.php?id={$row['id']}' class='btn btn-edit'>Edit</a> 
                                <a href='delete_enquiry.php?id={$row['id']}' class='btn btn-delete' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='8' style='color:red;'>No enquiries found.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <p style="text-align:center; margin-top: 20px;">
        <a href="enquiry.php" class="btn btn-add">Add New Enquiry</a>
    </p>
</body>
</html>
<?php
$conn->close();
?>

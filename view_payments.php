<?php
include 'db.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Payments</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Payment Records</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Payment ID</th>
                <th>Booking ID</th>
                <th>Payer Name</th>
                <th>Email</th>
                <th>Amount</th>
                <th>Payment Method</th>
                <th>Payment Date</th>
                <th>Actions</th> <!-- Edit/Delete buttons -->
            </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM payments ORDER BY id DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['booking_id'] . "</td>";
                echo "<td>" . $row['payer_name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['amount'] . "</td>";
                echo "<td>" . $row['payment_method'] . "</td>";
                echo "<td>" . $row['payment_date'] . "</td>";

                // Edit and Delete buttons
                echo "<td>
                        <a href='edit_payments.php?id=" . $row['id'] . "' class='btn btn-sm btn-success me-1'>Edit</a>
                        <a href='delete_payments.php?id=" . $row['id'] . "' onclick=\"return confirm('Are you sure you want to delete this payment?');\" class='btn btn-sm btn-danger'>Delete</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8' class='text-center'>No payments found.</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>

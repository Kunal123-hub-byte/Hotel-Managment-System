<?php
include 'db.php'; // database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Cancellation / Refund Requests</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Cancellation / Refund Requests</h2>

    <div class="table-responsive">
        <table id="cancellationsTable" class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Booking ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Reason</th>
                    <th>Refund Method</th>
                    <th>Message</th>
                    <th>Date Submitted</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM cancellations ORDER BY created_at DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row['id']."</td>
                            <td>".$row['booking_id']."</td>
                            <td>".$row['name']."</td>
                            <td>".$row['email']."</td>
                            <td>".$row['phone']."</td>
                            <td>".$row['reason']."</td>
                            <td>".$row['refund_method']."</td>
                            <td>".$row['message']."</td>
                            <td>".$row['created_at']."</td>
                            <td> <a href='edit_payments.php?id=" . $row['id'] . "' class='btn btn-sm btn-success me-1'>Edit</a>
                                <a href='delete_payments.php?id=" . $row['id'] . "' onclick=\"return confirm('Are you sure you want to delete this payment?');\" class='btn btn-sm btn-danger'>Delete</a>
                            </td>
                            </tr>";
                }
            } else {
                echo "<tr><td colspan='9' class='text-center'>No cancellation requests found</td></tr>";
            }
            $conn->close();
            ?>
            </tbody>
        </table>
    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<scr

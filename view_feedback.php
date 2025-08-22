<?php
include 'db.php'; // Database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Feedback / Reviews</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Customer Feedback / Reviews</h2>

    <div class="table-responsive">
        <table id="feedbackTable" class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Booking ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Rating</th>
                    <th>Feedback</th>
                    <th>Date Submitted</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM feedbacks ORDER BY created_at DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row['id']."</td>
                            <td>".$row['booking_id']."</td>
                            <td>".$row['name']."</td>
                            <td>".$row['email']."</td>
                            <td>".$row['rating']."</td>
                            <td>".$row['feedback']."</td>
                            <td>".$row['created_at']."</td>
                            <td>
                                <a href='edit_feedback.php?id=".$row['id']."' class='btn btn-sm btn-primary'>Edit</a>
                                <a href='delete_feedback.php?id=".$row['id']."' class='btn btn-sm btn-danger' onclick=\"return confirm('Are you sure you want to delete this feedback?');\">Delete</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='8' class='text-center'>No feedback found</td></tr>";
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

<script>
$(document).ready(function () {
    $('#feedbackTable').DataTable();
});
</script>

</body>
</html>

<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Bookings</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Booking Records</h2>
    <table id="bookingsTable" class="table table-bordered table-striped">
       <table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>Booking ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Check-in</th>
            <th>Check-out</th>
            <th>Guests</th>
            <th>Room Type</th>
            <th>Special Requests</th>
            <th>Actions</th> <!-- New column for buttons -->
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM bookings";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['checkin_date'] . "</td>";
                echo "<td>" . $row['checkout_date'] . "</td>";
                echo "<td>" . $row['guests'] . "</td>";
                echo "<td>" . $row['room_type'] . "</td>";
                echo "<td>" . $row['special_requests'] . "</td>";

                // Edit and Delete buttons
                echo "<td>
                        <a href='edit_booking.php?id=" . $row['id'] . "' style='padding:5px 10px;background-color:#4CAF50;color:white;text-decoration:none;border-radius:4px;margin-right:5px;'>Edit</a>
                        <a href='delete_booking.php?id=" . $row['id'] . "' onclick=\"return confirm('Are you sure you want to delete this booking?');\" style='padding:5px 10px;background-color:#f44336;color:white;text-decoration:none;border-radius:4px;'>Delete</a>
                      </td>";

                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='10'>No bookings found.</td></tr>";
        }
        ?>
    </tbody>
</table>

    </tbody>
</table>

        </tbody>
    </table>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
        $('#bookingsTable').DataTable({
            "pageLength": 5,
            "lengthMenu": [5, 10, 20, 50],
            "order": [[0, "desc"]]
        });
    });
</script>
  <p style="text-align:center; margin-top: 20px;">
        <a href="booking.php" class="btn btn-add">Add New Booking</a>
    </p>

</body>
</html>

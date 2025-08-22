<?php include 'db.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If form submitted (update)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id              = $_POST['id'];
    $name            = $_POST['name'];
    $phone           = $_POST['phone'];
    $email           = $_POST['email'];
    $date_of_enquiry = $_POST['date_of_enquiry'];
    $reference       = $_POST['reference'];

    $stmt = $conn->prepare("UPDATE enquiries SET name=?, phone=?, email=?, date_of_enquiry=?, reference=? WHERE id=?");
    $stmt->bind_param("sssssi", $name, $phone, $email, $date_of_enquiry, $reference, $id);

    if ($stmt->execute()) {
        header("Location: view_enquiry.php");
        exit;
    } else {
        echo "Error updating record: " . $stmt->error;
    }
    $stmt->close();
}

// If ID present (fetch record)
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM enquiries WHERE id=$id");
    $row = $result->fetch_assoc();
} else {
    die("No ID provided");
}
$conn->close();
?>
<!doctype html>
<html>
<head>
    <title>Edit Enquiry</title>
</head>
<body>
    <h2>Edit Enquiry</h2>
    <form method="post" action="">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        Name: <input type="text" name="name" value="<?= htmlspecialchars($row['name']) ?>" required><br><br>
        Phone: <input type="text" name="phone" value="<?= $row['phone'] ?>" required><br><br>
        Email: <input type="email" name="email" value="<?= $row['email'] ?>" required><br><br>
        Date of Enquiry: <input type="date" name="date_of_enquiry" value="<?= $row['date_of_enquiry'] ?>" required><br><br>
        Reference: <input type="text" name="reference" value="<?= $row['reference'] ?>"><br><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>

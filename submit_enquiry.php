<?php include 'db.php';
// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get form values and sanitize
    $name            = trim($_POST['name']);
    $phone           = trim($_POST['phone']);
    $email           = trim($_POST['email']);
    $date_of_enquiry = trim($_POST['date_of_enquiry']);
    $reference       = trim($_POST['reference']);
    $created_at      = date('Y-m-d H:i:s');

    // Basic validation
    if (empty($name) || empty($phone) || empty($email) || empty($date_of_enquiry)) {
        die("Please fill in all required fields.");
    }

    // Database connection
  
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert query (Prepared statement)
    $stmt = $conn->prepare("INSERT INTO enquiries (name, phone, email, date_of_enquiry, reference, created_at) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $phone, $email, $date_of_enquiry, $reference, $created_at);

    if ($stmt->execute()) {
        echo "<h3 style='color:green;text-align:center;'>Enquiry Submitted Successfully!</h3>";
        echo "<p style='text-align:center;'><a href='enquiry.php'>Back to Form</a></p>";
        echo "<p style='text-align:center;'><a href='view_enquiry.php'>Check Enquiry</a></p>";
        echo "<p style='text-align:center;'><a href='booking.php'>BOOK NOW!</a></p>"; 
    } else {
        echo "<h3 style='color:red;text-align:center;'>Error: " . $stmt->error . "</h3>";
    }

    $stmt->close();
    $conn->close();

} else {
    echo "Invalid request.";
}
?>

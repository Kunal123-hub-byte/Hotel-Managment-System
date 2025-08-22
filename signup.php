<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $checkEmail = "SELECT id FROM users WHERE email='$email'";
    $result = $conn->query($checkEmail);

    if ($result->num_rows > 0) {
        $error = "Email already registered!";
    } else {
        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
        if ($conn->query($sql) === TRUE) {
           header("Location: lodgix.php");

            exit();
        } else {
            $error = "Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
    margin: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #6a11cb, #2575fc);
    color: #333;
}

/* Form container */
form {
    max-width: 420px;
    margin: 80px auto;
    background: #ffffff;
    padding: 32px;
    border-radius: 12px;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    animation: fadeIn 0.8s ease-in-out;
}

/* Heading */
h2 {
    text-align: center;
    color: #fff;
    margin-top: 40px;
    text-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
    font-size: 30px;
    font-weight: 700;
}

/* Labels */
label {
    display: block;
    margin: 14px 0 6px;
    font-weight: 600;
    color: #444;
}

/* Input fields */
input[type=text],
input[type=email],
input[type=password] {
    width: 100%;
    padding: 12px 14px;
    border: 1px solid #ccc;
    border-radius: 6px;
    transition: all 0.3s ease;
    font-size: 15px;
}

input:focus {
    border-color: #2575fc;
    box-shadow: 0 0 6px rgba(37, 117, 252, 0.4);
    outline: none;
}

/* Submit button */
.btn {
    margin-top: 20px;
    background: linear-gradient(135deg, #6a11cb, #2575fc);
    color: #fff;
    border: 0;
    padding: 12px 20px;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.3s ease;
    width: 100%;
}

.btn:hover {
    background: linear-gradient(135deg, #2575fc, #6a11cb);
    transform: scale(1.03);
    box-shadow: 0 6px 14px rgba(0, 0, 0, 0.2);
}

/* Small text links (like "Already have an account? Login") */
p {
    text-align: center;
    margin-top: 16px;
    font-size: 14px;
    color: #333;
}

p a {
    color: #2575fc;
    font-weight: 600;
    text-decoration: none;
}

p a:hover {
    text-decoration: underline;
}

/* Animation */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}

    </style>
</head>
<body class="container mt-5">
    <h2>Sign Up</h2>

    <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form method="post">
        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password:</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Sign Up</button>
    </form>
    <p class="mt-3">Already have an account? <a href="login.php">Login here</a></p>
</body>
</html>

<?php include 'db.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enquiry Form</title>
    <style>
    body {
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #6a11cb, #2575fc);
        color: #333;
    }

    form {
        max-width: 600px;
        margin: 60px auto;
        background: #ffffff;
        padding: 28px;
        border-radius: 12px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        animation: fadeIn 0.8s ease-in-out;
    }

    h2 {
        text-align: center;
        color: #fff;
        margin-top: 40px;
        text-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        font-size: 28px;
    }

    label {
        display: block;
        margin: 12px 0 6px;
        font-weight: 600;
        color: #444;
    }

    input[type=text],
    input[type=email],
    input[type=date] {
        width: 100%;
        padding: 10px 12px;
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

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

</head>
<body>
    <h2 style="text-align:center;">Enquiry Form</h2>
    <form method="post" action="submit_enquiry.php" autocomplete="off">
        <label>Name:</label>
        <input type="text" name="name" required>

        <label>Phone:</label>
        <input type="text" name="phone" required pattern="[0-9]{10}" maxlength="10">

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Date of Enquiry:</label>
        <input type="date" name="date_of_enquiry" required>

        <label>Reference:</label>
        <input type="text" name="reference">

        <button type="submit" class="btn">Submit</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

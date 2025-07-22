<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logged Out</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #FCE4EC;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .logout-box {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 5px 15px rgba(0,0,0,0.1);
            text-align: center;
        }
        .logout-box h2 {
            margin-bottom: 20px;
            color: #d81b60;
        }
    </style>
</head>
<body>
    <div class="logout-box">
        <h2>You have been logged out</h2>
        <p>Thank you for using our portal.</p>
        <a href="login.php" class="btn btn-primary mt-3">Login Again</a>
    </div>
</body>
</html>

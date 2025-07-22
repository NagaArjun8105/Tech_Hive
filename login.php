<?php
session_start();
include("config.php"); // Ensure this file contains the database connection

if (isset($_POST["submit"])) {
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);

    // Check credentials
    $query = mysqli_query($con, "SELECT * FROM signup WHERE email='$email' AND password='$password'");
    $count = mysqli_num_rows($query);

    if ($count > 0) {
        $row = mysqli_fetch_assoc($query);
        $_SESSION['user_id'] = $row['id'];  // Store user ID in session
        $_SESSION['user_email'] = $row['email'];  // Store user email
        $_SESSION['user_name'] = $row['name'];  // Store user name

        header("Location: index.php"); // Redirect to homepage
        exit;
    } else {
        $error = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #E3F2FD;
        }
        .container {
            max-width: 900px;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .row {
            display: flex;
            align-items: center;
        }
        .left-section {
            padding: 40px;
        }
        .right-section {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .right-section img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <!-- Left Section (Login Form) -->
            <div class="col-md-6 left-section">
                <h2 class="mb-3">Welcome back</h2>

                <form method="post">
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" placeholder="Email address" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100" name="submit">Login</button>
                    <p class="mt-3 text-center">Don't have an account? <a href="signup.php">Sign up</a></p>
                    <?php if (!empty($error)) : ?>
                        <p style="color: red;"><?php echo $error; ?></p>
                    <?php endif; ?>
                </form>
            </div>

            <!-- Right Section (Illustration) -->
            <div class="col-md-6 right-section">
                <img src="logo.jpeg" alt="Illustration" height="150px" width="150px">
            </div>
        </div>
    </div>
</body>
</html>

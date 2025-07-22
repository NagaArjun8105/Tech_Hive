<?php
session_start();
include("config.php");

if (!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit;
}

$email = $_SESSION['user_email'];
$query = mysqli_query($con, "SELECT * FROM signup WHERE email='$email'");
$user = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile - TECH-HIVE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f8;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .profile-card {
            margin: 100px auto;
            max-width: 600px;
            padding: 40px;
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        .course-table th, .course-table td {
            text-align: left;
            vertical-align: middle;
            padding: 12px 16px;
            font-size: 16px;
        }
        .btn-group-vertical {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            margin-top: 25px;
        }
        .navbar {
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="about-us.html">TECH-HIVE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="cousre.html">Courses</a></li>
                    <li class="nav-item"><a class="nav-link" href="about-us.html">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="user.php">Profile</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Profile Card -->
    <div class="profile-card text-center">
        <h2>Welcome, <?php echo htmlspecialchars($user['name']); ?>!</h2>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>

        <h4 class="mt-4">Course Completion Scores</h4>
        <table class="table table-bordered mt-3 course-table">
            <tr>
                <th>Web Development</th>
                <td><?php echo $user['webscore']; ?></td>
            </tr>
            <tr>
                <th>AWS</th>
                <td><?php echo $user['awsscore']; ?></td>
            </tr>
            <tr>
                <th>Machine Learning</th>
                <td><?php echo $user['mlscore']; ?></td>
            </tr>
            <tr>
                <th>Cyber Security</th>
                <td><?php echo $user['cyberscore']; ?></td>
            </tr>
            <tr>
                <th>AI</th>
                <td><?php echo $user['aiscore']; ?></td>
            </tr>

            <tr>
                <th>Data Visualization</th>
                <td><?php echo $user['dvscore']; ?></td>
            </tr>

            
        </table>

        <!-- Download Buttons -->
        <div class="btn-group-vertical">
            <?php if ($user['webscore'] > 0): ?>
                <a href="modules/certificate.php?course=Full Stack Web Development" class="btn btn-success">Download Web Development Certificate</a>
            <?php endif; ?>

            <?php if ($user['awsscore'] > 0): ?>
                <a href="modules/certificate.php?course=Fundamentals Of AWSS" class="btn btn-success">Download AWS Certificate</a>
            <?php endif; ?>

            <?php if ($user['mlscore'] > 0): ?>
                <a href="modules/certificate.php?course=Basics Of Machine Learning" class="btn btn-success">Download Machine Learning Certificate</a>
            <?php endif; ?>

            <?php if ($user['cyberscore'] > 0): ?>
                <a href="modules/certificate.php?course=Essentials Of Cyber Security" class="btn btn-success">Download Cyber Security Certificate</a>
            <?php endif; ?>

            <?php if ($user['aiscore'] > 0): ?>
                <a href="modules/certificate.php?course=AI in Data Science" class="btn btn-success">Download AI Certificate</a>
            <?php endif; ?>

            <?php if ($user['dvscore'] > 0): ?>
                <a href="modules/certificate.php?course=Data Visualization" class="btn btn-success">Download Data Visualization Certificate</a>
            <?php endif; ?>


            

            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

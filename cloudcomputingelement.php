<?php
session_start();
?>

<!-- Course Details Page -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details | E-Learning Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .course-header {
            background: linear-gradient(to right, #007bff, #6610f2);
            color: white;
            padding: 40px 20px;
        }.navbar {
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            background-color: #003366; /* Darker than header */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Visual separation */
        } 
       
        body{
            padding-top:60px;
        }

    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark">
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


    <div class="course-header text-center">
        <h1>Cloud Computing with AWS</h1>
        <p>Learn cloud services, deployment, and scaling applications using Amazon Web Services!.</p>
        
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-8">
                <h3>Course Overview</h3>
                <p>This course provides knowledge on AWS cloud services, infrastructure, and cloud application deployment...</p>
                <h4>Minimal Notes:</h4>
                <ul>
                    <li><strong>Introduction to Cloud Computing: </strong>  Basics of Cloud Services and Architecture.
                    </li>
                    <li><strong>AWS Services:</strong>  EC2, S3, RDS, Lambda, and IAM.

                    </li>
                    <li><strong>Storage & Databases: </strong> S3 Buckets, DynamoDB, and RDS.</li>
                    <li><strong>Networking: </strong> VPC, Route 53, and CloudFront.

                 </li>
                    <li><strong>Security Management:</strong> IAM Roles, Policies, and CloudTrail.</li>
                    <li><strong>Serverless Computing:</strong> AWS Lambda Functions and API Gateway.</li>
                    <li><strong>Deployment:</strong> Auto Scaling and Load Balancers.

                        </li>
                </ul>
            </div>
            <div class="col-lg-4">
                <div class="card p-3">
                    <h4>Course Info</h4>
                    <ul>
                        <li>Duration: 8 weeks</li>
                    <li>Instructor: Kevin Smith</li>
                        <li>Level: Beginner to Advanced</li>
                    </ul>
                    <a href="modules/cloud computing.html" class="btn btn-primary">Enroll Now</a>
                </div>
            </div>
        </div>
    </div>

    <footer class="container mt-5">
        <h3>Other Courses</h3>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5>Ai In Datascience</h5>
                        <p>Learn data analysis, machine learning, and visualization.</p>
                        <a href="AI in DS.php" class="btn btn-info">Explore</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5>Cyber Security Basics</h5>
                        <p>Understand security principles, encryption, and ethical hacking.</p>
                        <a href="cyber security.php" class="btn btn-info">Explore</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5>Full Stack Development</h5>
                        <p>Learn cloud services, deployment, and scaling on AWS.</p>
                        <a href="e-learningpages.php" class="btn btn-info">Explore</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script>
        const userEmail = "<?php echo $_SESSION['user_email']; ?>";
        const enrollBtn = document.querySelector(".btn-primary");
    
        enrollBtn.addEventListener("click", function (e) {
            e.preventDefault();
    
            if (!userEmail) {
                alert("Please log in to enroll in this course.");
                return;
            }
    
            fetch("check_completion.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ email: userEmail, course: "awsscore" })
            })
            .then(res => res.json())
            .then(data => {
                if (data.completed) {
                    alert("You have already completed this course.");
                } else {
                    window.location.href = "modules/cloud computing.html";
                }
            })
            .catch(err => {
                alert("Error checking course status.");
            });
        });
    </script>
</body>

</html>
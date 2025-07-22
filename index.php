<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Learning Portal</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome (For Icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles1.css">

    <style>
        /* Fix navbar at the top */
        .navbar {
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        /* Push the content down so it doesn’t overlap with the navbar */
        body {
            padding-top: 70px;
        }

        /* Ensure the carousel images fit properly */
        .carousel-inner img {
            width: 100%;
            height: 500px;
            object-fit: cover;
        }

        /* Adjust the carousel position */
        .carousel {
            margin-top: 0;
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
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="cousre.html">Courses</a></li>
                    <li class="nav-item"><a class="nav-link" href="about-us.html">About</a></li>
                   
                    <li class="nav-item"><a class="nav-link" href="user.php">Profile</a></li>
                    
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bootstrap Carousel -->
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/corousel3.jpg" class="d-block w-100" alt="Slide 1">
                <div class="carousel-caption d-none d-md-block">
                    <h5 style="font-size: 40px;">Welcome to Our E-Learning Portal</h5>
                    <p style="font-size: 25px;">Learn and grow with interactive courses.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/corousel1.jpg" class="d-block w-100" alt="Slide 2">
            </div>
            <div class="carousel-item">
                <img src="img/corousel2.jpeg" class="d-block w-100" alt="Slide 3">
                <div class="carousel-caption d-none d-md-block">
                    <h5 style="font-size: 40px;">Join Us Today</h5>
                    <p style="font-size: 25px;">Start your learning journey now.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
    </div>

    <!-- Course Categories -->
    <section class="container text-center my-5">
        <h2 class="mb-4">Explore Categories</h2>
        <div class="row">
            <div class="col-md-3">
                <div class="category-card bg-primary text-white p-4 rounded">
                    <i class="fas fa-code fa-3x"></i>
                    <h5 class="mt-3">Programming</h5>
                </div>
            </div>
            <div class="col-md-3">
                <div class="category-card bg-success text-white p-4 rounded">
                    <i class="fas fa-database fa-3x"></i>
                    <h5 class="mt-3">Data Science</h5>
                </div>
            </div>
            <div class="col-md-3">
                <div class="category-card bg-warning text-white p-4 rounded">
                    <i class="fas fa-cloud fa-3x"></i>
                    <h5 class="mt-3">Cloud Computing</h5>
                </div>
            </div>
            <div class="col-md-3">
                <div class="category-card bg-danger text-white p-4 rounded">
                    <i class="fas fa-brain fa-3x"></i>
                    <h5 class="mt-3">AI & ML</h5>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Courses -->
    <section class="container my-5">
        <h2 class="text-center mb-4">Popular Courses</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="img/full stack.jpg" class="card-img-top" alt="Course Image">
                    <div class="card-body">
                        <h5 class="card-title">Web Development</h5>
                        <p class="card-text">Instructor: Gokila</p>
                        <a href="e-learningpages.php" class="btn btn-primary">Enroll Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="img/machine.webp" class="card-img-top" alt="Course Image">
                    <div class="card-body">
                        <h5 class="card-title">Machine Learning</h5>
                        <p class="card-text">Instructor: Ayyanathan</p>
                        <a href="ml.php" class="btn btn-primary">Enroll Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="img/aws.webp" class="card-img-top" alt="Course Image">
                    <div class="card-body">
                        <h5 class="card-title">Cloud Computing</h5>
                        <p class="card-text">Instructor: Priya</p>
                        <a href="cloudcomputingelement.php" class="btn btn-primary">Enroll Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center bg-primary text-white py-3">
        <p>© 2025 TECH-HIVE. All Rights Reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>

<?php 
session_start();
include("config.php");

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $verify_query = mysqli_query($con, "SELECT email FROM signup WHERE email='$email'");

    if (mysqli_num_rows($verify_query) != 0) {
        echo "<div class='message'>
                <p>This email is already used. Please try another one!</p>
              </div><br>";
        echo "<a href='javascript:self.history.back()'>
                <button class='btn1'>Go Back</button></a>";
        exit();
    } else {
        mysqli_query($con, "INSERT INTO signup(name,email,password) VALUES('$name','$email','$password')") or die("Error occurred!");
        header("Location: login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <style>
        body {
            background-color:#F5F5F5;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .signup-container {
            display: flex;
            width: 900px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .left-section {
            width: 50%;
            background: linear-gradient(to right, #007bff, #0056b3);
            color: white;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .right-section {
            width: 50%;
            background: white;
            padding: 40px;
        }
        .form-control {
            border-radius: 5px;
            border: 1px solid #ced4da;
        }
        .input-group-text {
            cursor: pointer;
            background: white;
            border-left: 0;
        }
        .form-control {
            border-right: 0;
        }
        .password-rules {
            font-size: 14px;
            margin-top: 5px;
        }
        .rule {
            display: flex;
            align-items: center;
            color: red;
            transition: color 0.3s ease-in-out;
        }
        .rule.valid {
            color: green;
        }
        .rule i {
            margin-right: 5px;
        }
        .error {
            color: red;
            font-size: 14px;
            display: none;
        }
        .logo {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="signup-container">
    <div class="left-section">
        <img src="modules/image/logo.jpeg" alt="Company Logo" class="logo" height="150px" width="150px">
        <h2>Upgrade Your Skills, Elevate Your Career.</h2>
        <p>Join us today and gain access to exclusive training, certifications, and career-boosting opportunities.</p>
        <a href="login.php"><button class="btn btn-outline-light mt-3">Already have an account? Sign in</button></a>
    </div>
    <div class="right-section">
        <h2  class="text-center mb-4">ABC</h2>

        <form id="signupForm" method="post" action="signup.php">
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" class="form-control" placeholder="Enter your name" name="name" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email" required>
                <small class="error" id="emailError">Invalid email format.</small>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" placeholder="Enter password" required>
                    <span class="input-group-text" id="togglePassword">
                        <i class="bi bi-eye-slash"></i>
                    </span>
                </div>
                <small class="error" id="passwordError">Password does not meet requirements.</small>
                <div class="password-rules">
                    <p class="rule" id="rule-length"><i class="bi bi-x-circle"></i> At least 8 characters</p>
                    <p class="rule" id="rule-uppercase"><i class="bi bi-x-circle"></i> At least one uppercase letter</p>
                    <p class="rule" id="rule-lowercase"><i class="bi bi-x-circle"></i> At least one lowercase letter</p>
                    <p class="rule" id="rule-number"><i class="bi bi-x-circle"></i> At least one number</p>
                    <p class="rule" id="rule-special"><i class="bi bi-x-circle"></i> At least one special character (@, $, !, %, *, ?, &)</p>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm password" name="password" required>
                    <span class="input-group-text" id="toggleConfirmPassword">
                        <i class="bi bi-eye-slash"></i>
                    </span>
                </div>
                <small class="error" id="confirmPasswordError">Passwords do not match.</small>
            </div>
            <button type="submit" name="submit" class="btn btn-primary w-100">Signup</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function togglePasswordVisibility(inputId, iconSpan) {
        const passwordField = document.getElementById(inputId);
        const icon = iconSpan.querySelector("i");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            icon.classList.replace("bi-eye-slash", "bi-eye");
        } else {
            passwordField.type = "password";
            icon.classList.replace("bi-eye", "bi-eye-slash");
        }
    }

    document.getElementById("togglePassword").addEventListener("click", function () {
        togglePasswordVisibility("password", this);
    });

    document.getElementById("toggleConfirmPassword").addEventListener("click", function () {
        togglePasswordVisibility("confirmPassword", this);
    });

    function validateEmail() {
        const emailInput = document.getElementById("email");
        const emailError = document.getElementById("emailError");
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        emailError.style.display = emailPattern.test(emailInput.value) ? "none" : "block";
    }

    document.getElementById("email").addEventListener("input", validateEmail);

    function validatePassword() {
        const password = document.getElementById("password").value;
        const passwordError = document.getElementById("passwordError");

        const rules = {
            length: document.getElementById("rule-length"),
            uppercase: document.getElementById("rule-uppercase"),
            lowercase: document.getElementById("rule-lowercase"),
            number: document.getElementById("rule-number"),
            special: document.getElementById("rule-special")
        };

        function updateRule(condition, ruleElement, text) {
            if (condition) {
                ruleElement.classList.add("valid");
                ruleElement.innerHTML = `<i class="bi bi-check-circle"></i> ${text}`;
            } else {
                ruleElement.classList.remove("valid");
                ruleElement.innerHTML = `<i class="bi bi-x-circle"></i> ${text}`;
            }
        }

        updateRule(password.length >= 8, rules.length, "At least 8 characters");
        updateRule(/[A-Z]/.test(password), rules.uppercase, "At least one uppercase letter");
        updateRule(/[a-z]/.test(password), rules.lowercase, "At least one lowercase letter");
        updateRule(/[0-9]/.test(password), rules.number, "At least one number");
        updateRule(/[@$!%*?&]/.test(password), rules.special, "At least one special character (@, $, !, %, *, ?, &)");

        passwordError.style.display = Object.values(rules).every(rule => rule.classList.contains("valid")) ? "none" : "block";
    }

    document.getElementById("password").addEventListener("input", validatePassword);
</script>
</body>
</html>

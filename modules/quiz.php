<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    echo "<script>alert('You are not logged in.'); window.location.href='login.php';</script>";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Web Development Quiz</title>
    <style>
        body {
            background-color: #555;
            color: white;
            font-family: Arial;
        }
        button {
            margin-top: 10px;
        }
        /* Popup styles */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
        }
        .popup button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        .popup button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Web Development Quiz</h2>

    <form id="quizForm">
        <p>1. What does HTML stand for?</p>
        <input type="radio" name="q1" value="a"> Hyper Text Markup Language<br>
        <input type="radio" name="q1" value="b"> Hot Mail<br>
        <input type="radio" name="q1" value="c"> How to Make Lasagna<br>

        <p>2. What is the correct HTML element for inserting a line break?</p>
        <input type="radio" name="q2" value="a"> &lt;br&gt;<br>
        <input type="radio" name="q2" value="b"> &lt;break&gt;<br>
        <input type="radio" name="q2" value="c"> &lt;lb&gt;<br>

        <p>3. What does CSS stand for?</p>
        <input type="radio" name="q3" value="a"> Cascading Style Sheets<br>
        <input type="radio" name="q3" value="b"> Computer Style Sheets<br>
        <input type="radio" name="q3" value="c"> Colorful Style Sheets<br>

        <br>
        <button type="button" onclick="submitQuiz()">Submit</button>
    </form>

    <p id="result"></p>

    <!-- Popup HTML -->
    <div class="popup" id="popup">
        <h3>Congratulations! You have completed the course successfully!</h3>
        <button onclick="window.location.href='certificate.php'">Download Certificate</button>
    </div>

    <script>
        const userEmail = "<?php echo $_SESSION['user_email']; ?>";

        function submitQuiz() {
            const answers = {
                q1: "a",
                q2: "a",
                q3: "a"
            };

            let score = 0;
            const form = document.forms["quizForm"];
            for (let i = 1; i <= 3; i++) {
                if (form["q" + i].value === answers["q" + i]) {
                    score++;
                }
            }

            document.getElementById("result").innerText = "Your score: " + score + " / 3";

            // Send score to the server
            fetch("update_score.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    email: userEmail,
                    score: score,
                    quiz: "webscore"
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    // Show the congratulations popup after successful score update
                    showPopup();
                } else {
                    alert("Failed to update score: " + data.message);
                }
            })
            .catch(err => {
                alert("Error: " + err);
            });
        }

        function showPopup() {
            const popup = document.getElementById("popup");
            popup.style.display = "block"; // Show the popup
        }
    </script>
</body>
</html>

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
    <title>Cloud Computing Quiz</title>
    <style>
        body {
            background-color: #555;
            color: white;
            font-family: Arial;
        }
        button {
            margin-top: 10px;
        }
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
    <h2>Cloud Computing Quiz</h2>

    <form id="quizForm">
        <p>1. What does IaaS stand for?</p>
        <input type="radio" name="q1" value="a"> Infrastructure as a Service<br>
        <input type="radio" name="q1" value="b"> Internet as a Source<br>
        <input type="radio" name="q1" value="c"> Interface as a Server<br>

        <p>2. Which of the following is a key benefit of cloud computing?</p>
        <input type="radio" name="q2" value="a"> High upfront costs<br>
        <input type="radio" name="q2" value="b"> Scalability<br>
        <input type="radio" name="q2" value="c"> Manual resource allocation<br>

        <p>3. Which of these is a cloud deployment model?</p>
        <input type="radio" name="q3" value="a"> Grid Cloud<br>
        <input type="radio" name="q3" value="b"> Private Cloud<br>
        <input type="radio" name="q3" value="c"> LAN Cloud<br>

        <br>
        <button type="button" onclick="submitQuiz()">Submit</button>
    </form>

    <p id="result"></p>

    <div class="popup" id="popup">
        <h3>Congratulations! You have completed the course successfully!</h3>
        <button onclick="window.location.href='certificate.php'">Download Certificate</button>
    </div>

    <script>
        const userEmail = "<?php echo $_SESSION['user_email']; ?>";

        function submitQuiz() {
            const answers = {
                q1: "a",
                q2: "b",
                q3: "b"
            };

            let score = 0;
            const form = document.forms["quizForm"];
            for (let i = 1; i <= 3; i++) {
                if (form["q" + i].value === answers["q" + i]) {
                    score++;
                }
            }

            document.getElementById("result").innerText = "Your score: " + score + " / 3";

            fetch("update_score.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    email: userEmail,
                    score: score,
                    quiz: "awsscore"
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
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
            popup.style.display = "block";
        }
    </script>
</body>
</html>

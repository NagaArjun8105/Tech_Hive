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
    background-color: #f5f7fa;
    color: #2c3e50;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 60px auto;
    padding: 40px 30px;
    background-color: #ffffff;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    color: #2c3e50;
    font-size: 30px;
    margin-bottom: 35px;
}

form p {
    margin: 25px 0 8px;
    font-weight: 600;
    color: #34495e;
}

input[type="radio"] {
    margin-right: 8px;
    transform: scale(1.1);
    accent-color: #007BFF;
}

button {
    margin-top: 30px;
    padding: 14px 30px;
    background-color: #007BFF;
    border: none;
    color: white;
    font-size: 17px;
    font-weight: 500;
    cursor: pointer;
    border-radius: 8px;
    display: block;
    margin-left: auto;
    margin-right: auto;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

button:hover {
    background-color: #0056b3;
    transform: translateY(-2px);
}

#result {
    text-align: center;
    font-size: 22px;
    margin-top: 25px;
    font-weight: bold;
    color: #28a745;
}

.popup {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #ecf0f1;
    padding: 45px 30px;
    border-radius: 15px;
    text-align: center;
    z-index: 9999;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    width: 90%;
    max-width: 400px;
}

.popup h3 {
    color: #2c3e50;
    margin-bottom: 25px;
    font-size: 22px;
}

.popup button {
    background-color: #17a2b8;
    padding: 12px 25px;
    font-size: 16px;
    border: none;
    color: white;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.popup button:hover {
    background-color: #117a8b;
    transform: translateY(-1px);
}

@media (max-width: 600px) {
    .container {
        margin: 20px;
        padding: 25px;
    }

    h2 {
        font-size: 24px;
    }

    .popup {
        padding: 30px 20px;
    }

    .popup h3 {
        font-size: 20px;
    }
}

    </style>
</head>
<body>
<div class="container">
    <h2>Cloud Computing Quiz</h2>

    <form id="quizForm">
        <p>1. What is Cloud Computing?</p>
        <input type="radio" name="q1" value="a"> Delivery of computing services over the internet<br>
        <input type="radio" name="q1" value="b"> Programming language<br>
        <input type="radio" name="q1" value="c"> Desktop software<br>

        <p>2. Which one is a Cloud Computing platform by Amazon?</p>
        <input type="radio" name="q2" value="a"> Azure<br>
        <input type="radio" name="q2" value="b"> AWS<br>
        <input type="radio" name="q2" value="c"> Google Drive<br>

        <p>3. What does IaaS stand for?</p>
        <input type="radio" name="q3" value="a"> Internet as a Service<br>
        <input type="radio" name="q3" value="b"> Infrastructure as a Service<br>
        <input type="radio" name="q3" value="c"> Internal Architecture as a Service<br>

        <p>4. Which of the following is *not* a cloud service model?</p>
        <input type="radio" name="q4" value="a"> SaaS<br>
        <input type="radio" name="q4" value="b"> PaaS<br>
        <input type="radio" name="q4" value="c"> CaaC<br>

        <p>5. What is the main benefit of Cloud Computing?</p>
        <input type="radio" name="q5" value="a"> High latency<br>
        <input type="radio" name="q5" value="b"> Scalability<br>
        <input type="radio" name="q5" value="c"> Fixed infrastructure<br>

        <p>6. Google Cloud Platform is a service by:</p>
        <input type="radio" name="q6" value="a"> Microsoft<br>
        <input type="radio" name="q6" value="b"> Amazon<br>
        <input type="radio" name="q6" value="c"> Google<br>

        <p>7. Which type of cloud is available to the general public?</p>
        <input type="radio" name="q7" value="a"> Private Cloud<br>
        <input type="radio" name="q7" value="b"> Public Cloud<br>
        <input type="radio" name="q7" value="c"> Hybrid Cloud<br>

        <p>8. Which of these is an example of SaaS?</p>
        <input type="radio" name="q8" value="a"> Google Docs<br>
        <input type="radio" name="q8" value="b"> Microsoft Azure<br>
        <input type="radio" name="q8" value="c"> Amazon EC2<br>

        <p>9. What does scalability mean in cloud computing?</p>
        <input type="radio" name="q9" value="a"> Running slow under load<br>
        <input type="radio" name="q9" value="b"> Ability to increase or decrease resources<br>
        <input type="radio" name="q9" value="c"> Fixed number of users<br>

        <p>10. Which cloud model combines public and private clouds?</p>
        <input type="radio" name="q10" value="a"> Community Cloud<br>
        <input type="radio" name="q10" value="b"> Hybrid Cloud<br>
        <input type="radio" name="q10" value="c"> Distributed Cloud<br>

        <br>
        <button type="button" onclick="submitQuiz()">Submit</button>
    </form>

    <p id="result"></p></div>

    <div class="popup" id="popup">
        <h3>Congratulations! You have completed the course successfully!</h3>
        <button onclick="window.location.href='modules/certificate.php?course=Fundamentals Of AWS'">Download Certificate</button>
    </div>

    <script>
        const userEmail = "<?php echo $_SESSION['user_email']; ?>";

        function submitQuiz() {
            const answers = {
                q1: "a",
                q2: "b",
                q3: "b",
                q4: "c",
                q5: "b",
                q6: "c",
                q7: "b",
                q8: "a",
                q9: "b",
                q10: "b"
            };

            let score = 0;
            const form = document.forms["quizForm"];
            for (let i = 1; i <= 10; i++) {
                const question = form["q" + i];
                if (question && question.value === answers["q" + i]) {
                    score++;
                }
            }

            document.getElementById("result").innerText = "Your score: " + score + " / 10";

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

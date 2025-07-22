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
    <title>AI in Data Science Quiz</title>
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
    <h2>AI in Data Science Quiz</h2>

    <form id="quizForm">
        <p>1. What is Artificial Intelligence?</p>
        <input type="radio" name="q1" value="a"> A branch of biology<br>
        <input type="radio" name="q1" value="b"> Simulation of human intelligence by machines<br>
        <input type="radio" name="q1" value="c"> Only robotics<br>

        <p>2. Which of these is a type of AI?</p>
        <input type="radio" name="q2" value="a"> Weak AI<br>
        <input type="radio" name="q2" value="b"> Strong AI<br>
        <input type="radio" name="q2" value="c"> Both A and B<br>

        <p>3. What is the purpose of Machine Learning in Data Science?</p>
        <input type="radio" name="q3" value="a"> To write static programs<br>
        <input type="radio" name="q3" value="b"> To enable systems to learn from data<br>
        <input type="radio" name="q3" value="c"> To replace all programming<br>

        <p>4. Which algorithm is used for classification?</p>
        <input type="radio" name="q4" value="a"> K-Means<br>
        <input type="radio" name="q4" value="b"> Linear Regression<br>
        <input type="radio" name="q4" value="c"> Decision Tree<br>

        <p>5. Which Python library is commonly used for AI?</p>
        <input type="radio" name="q5" value="a"> NumPy<br>
        <input type="radio" name="q5" value="b"> Matplotlib<br>
        <input type="radio" name="q5" value="c"> TensorFlow<br>

        <p>6. What does NLP stand for?</p>
        <input type="radio" name="q6" value="a"> Natural Language Processing<br>
        <input type="radio" name="q6" value="b"> Non-Linear Programming<br>
        <input type="radio" name="q6" value="c"> Neural Language Platform<br>

        <p>7. Which of these is NOT an application of AI?</p>
        <input type="radio" name="q7" value="a"> Image recognition<br>
        <input type="radio" name="q7" value="b"> Weather forecasting<br>
        <input type="radio" name="q7" value="c"> Manual filing of documents<br>

        <p>8. What is supervised learning?</p>
        <input type="radio" name="q8" value="a"> Learning without any data<br>
        <input type="radio" name="q8" value="b"> Learning with labeled data<br>
        <input type="radio" name="q8" value="c"> Learning by guessing<br>

        <p>9. Which of these is a deep learning framework?</p>
        <input type="radio" name="q9" value="a"> Flask<br>
        <input type="radio" name="q9" value="b"> TensorFlow<br>
        <input type="radio" name="q9" value="c"> Django<br>

        <p>10. What is the role of AI in Data Science?</p>
        <input type="radio" name="q10" value="a"> Data visualization only<br>
        <input type="radio" name="q10" value="b"> Automate decision-making and predictions<br>
        <input type="radio" name="q10" value="c"> Manual data entry<br>

        <br>
        <button type="button" onclick="submitQuiz()">Submit</button>
    </form>

    <p id="result"></p>
</div>

    <div class="popup" id="popup">
        <h3>Congratulations! You have completed the course successfully!</h3>
        <button onclick="window.location.href='modules/certificate.php?course=AI in Data Science'">Download Certificate</button>
    </div>
    <script>
        const userEmail = "<?php echo $_SESSION['user_email']; ?>";

        function submitQuiz() {
            const answers = {
                q1: "b",
                q2: "c",
                q3: "b",
                q4: "c",
                q5: "c",
                q6: "a",
                q7: "c",
                q8: "b",
                q9: "b",
                q10: "b"
            };

            let score = 0;
            const form = document.forms["quizForm"];
            for (let i = 1; i <= 10; i++) {
                const q = form["q" + i];
                if (q && q.value === answers["q" + i]) {
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
                    quiz: "aiscore"
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
            document.getElementById("popup").style.display = "block";
        }
    </script>
</body>
</html>

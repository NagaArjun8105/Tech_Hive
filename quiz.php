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

        <p>4. Which HTML tag is used to define an internal style sheet?</p>
        <input type="radio" name="q4" value="a"> &lt;style&gt;<br>
        <input type="radio" name="q4" value="b"> &lt;script&gt;<br>
        <input type="radio" name="q4" value="c"> &lt;css&gt;<br>

        <p>5. Which property is used to change the background color in CSS?</p>
        <input type="radio" name="q5" value="a"> background-color<br>
        <input type="radio" name="q5" value="b"> color<br>
        <input type="radio" name="q5" value="c"> bg-color<br>

        <p>6. Which HTML tag is used to create a hyperlink?</p>
        <input type="radio" name="q6" value="a"> &lt;a&gt;<br>
        <input type="radio" name="q6" value="b"> &lt;link&gt;<br>
        <input type="radio" name="q6" value="c"> &lt;href&gt;<br>

        <p>7. What is the correct CSS syntax to make all &lt;p&gt; elements bold?</p>
        <input type="radio" name="q7" value="a"> p { font-weight: bold; }<br>
        <input type="radio" name="q7" value="b"> &lt;p style="text:bold;"&gt;<br>
        <input type="radio" name="q7" value="c"> p: bold;<br>

        <p>8. Which of the following is the correct way to include an external CSS file?</p>
        <input type="radio" name="q8" value="a"> &lt;link rel="stylesheet" href="style.css"&gt;<br>
        <input type="radio" name="q8" value="b"> &lt;style src="style.css"&gt;<br>
        <input type="radio" name="q8" value="c"> &lt;css link="style.css"&gt;<br>

        <p>9. How do you create an unordered list in HTML?</p>
        <input type="radio" name="q9" value="a"> &lt;ul&gt;<br>
        <input type="radio" name="q9" value="b"> &lt;ol&gt;<br>
        <input type="radio" name="q9" value="c"> &lt;li&gt;<br>

        <p>10. Which attribute is used in HTML to specify inline styles?</p>
        <input type="radio" name="q10" value="a"> style<br>
        <input type="radio" name="q10" value="b"> class<br>
        <input type="radio" name="q10" value="c"> font<br>

        <br>
        <button type="button" onclick="submitQuiz()">Submit</button>
    </form>

    <p id="result"></p></div>

    <div class="popup" id="popup">
        <h3>Congratulations! You have completed the course successfully!</h3>
        <button onclick="window.location.href='modules/certificate.php?course=Full Stack Web Development'">Download Certificate</button>
    </div>

    <script>
        const userEmail = "<?php echo $_SESSION['user_email']; ?>";

        function submitQuiz() {
            const answers = {
                q1: "a",
                q2: "a",
                q3: "a",
                q4: "a",
                q5: "a",
                q6: "a",
                q7: "a",
                q8: "a",
                q9: "a",
                q10: "a"
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
                    quiz: "webscore"
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

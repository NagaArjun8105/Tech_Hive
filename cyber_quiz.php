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
    <title>Cyber Security Quiz</title>
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
    <h2>Cyber Security Quiz</h2>

    <form id="quizForm">
        <p>1. What does the term 'phishing' refer to?</p>
        <input type="radio" name="q1" value="a"> A virus<br>
        <input type="radio" name="q1" value="b"> Fraudulent attempt to obtain sensitive info<br>
        <input type="radio" name="q1" value="c"> Network attack<br>

        <p>2. What is the strongest type of password?</p>
        <input type="radio" name="q2" value="a"> Your birthdate<br>
        <input type="radio" name="q2" value="b"> A dictionary word<br>
        <input type="radio" name="q2" value="c"> A mix of letters, numbers, and symbols<br>

        <p>3. What does a firewall do?</p>
        <input type="radio" name="q3" value="a"> Speeds up your PC<br>
        <input type="radio" name="q3" value="b"> Blocks unauthorized access<br>
        <input type="radio" name="q3" value="c"> Deletes files<br>

        <p>4. Which one is a form of malware?</p>
        <input type="radio" name="q4" value="a"> Trojan<br>
        <input type="radio" name="q4" value="b"> ISP<br>
        <input type="radio" name="q4" value="c"> URL<br>

        <p>5. What is two-factor authentication?</p>
        <input type="radio" name="q5" value="a"> Logging in twice<br>
        <input type="radio" name="q5" value="b"> Using two methods to verify identity<br>
        <input type="radio" name="q5" value="c"> A type of encryption<br>

        <p>6. What is ransomware?</p>
        <input type="radio" name="q6" value="a"> A backup tool<br>
        <input type="radio" name="q6" value="b"> A virus that demands payment<br>
        <input type="radio" name="q6" value="c"> A browser extension<br>

        <p>7. HTTPS stands for:</p>
        <input type="radio" name="q7" value="a"> HyperText Transfer Protocol Secure<br>
        <input type="radio" name="q7" value="b"> High Transfer Tunnel Protocol<br>
        <input type="radio" name="q7" value="c"> High Tech Protocol Secure<br>

        <p>8. What is social engineering?</p>
        <input type="radio" name="q8" value="a"> Software coding<br>
        <input type="radio" name="q8" value="b"> Tricking people to reveal personal info<br>
        <input type="radio" name="q8" value="c"> Engineering of social media<br>

        <p>9. Which of the following is a secure practice?</p>
        <input type="radio" name="q9" value="a"> Reusing passwords<br>
        <input type="radio" name="q9" value="b"> Clicking on unknown links<br>
        <input type="radio" name="q9" value="c"> Keeping software updated<br>

        <p>10. Which device filters incoming and outgoing traffic?</p>
        <input type="radio" name="q10" value="a"> Switch<br>
        <input type="radio" name="q10" value="b"> Router<br>
        <input type="radio" name="q10" value="c"> Firewall<br>

        <br>
        <button type="button" onclick="submitQuiz()">Submit</button>
    </form>

    <p id="result"></p></div>

    <div class="popup" id="popup">
        <h3>Congratulations! You have completed the course successfully!</h3>
        <button onclick="window.location.href='modules/certificate.php?course=Essentials Of Cyber Security'">Download Certificate</button>
    </div>

    <script>
        const userEmail = "<?php echo $_SESSION['user_email']; ?>";

        function submitQuiz() {
            const answers = {
                q1: "b",
                q2: "c",
                q3: "b",
                q4: "a",
                q5: "b",
                q6: "b",
                q7: "a",
                q8: "b",
                q9: "c",
                q10: "c"
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
                    quiz: "cyberscore"
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

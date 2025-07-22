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
    <title>Data Visualization Quiz</title>
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
        <h2>Data Visualization Quiz</h2>

        <form id="quizForm">
            <p>1. What is the main purpose of data visualization?</p>
            <label><input type="radio" name="q1" value="a"> Storing data</label><br>
            <label><input type="radio" name="q1" value="b"> Presenting data clearly and effectively</label><br>
            <label><input type="radio" name="q1" value="c"> Encrypting data</label><br>

            <p>2. Which chart is best for showing proportions?</p>
            <label><input type="radio" name="q2" value="a"> Pie chart</label><br>
            <label><input type="radio" name="q2" value="b"> Line chart</label><br>
            <label><input type="radio" name="q2" value="c"> Scatter plot</label><br>

            <p>3. What does a line chart typically represent?</p>
            <label><input type="radio" name="q3" value="a"> Comparison of categories</label><br>
            <label><input type="radio" name="q3" value="b"> Trends over time</label><br>
            <label><input type="radio" name="q3" value="c"> Distribution of data</label><br>

            <p>4. Which tool is widely used for creating interactive dashboards?</p>
            <label><input type="radio" name="q4" value="a"> Notepad</label><br>
            <label><input type="radio" name="q4" value="b"> Tableau</label><br>
            <label><input type="radio" name="q4" value="c"> Excel 95</label><br>

            <p>5. What is the key to effective data storytelling?</p>
            <label><input type="radio" name="q5" value="a"> Use of many colors</label><br>
            <label><input type="radio" name="q5" value="b"> Random visuals</label><br>
            <label><input type="radio" name="q5" value="c"> Clear visuals supporting a narrative</label><br>

            <p>6. What type of chart is best for showing relationships between variables?</p>
            <label><input type="radio" name="q6" value="a"> Bar chart</label><br>
            <label><input type="radio" name="q6" value="b"> Scatter plot</label><br>
            <label><input type="radio" name="q6" value="c"> Pie chart</label><br>

            <p>7. Which color scheme is ideal for color-blind users?</p>
            <label><input type="radio" name="q7" value="a"> Red-Green</label><br>
            <label><input type="radio" name="q7" value="b"> Blue-Yellow</label><br>
            <label><input type="radio" name="q7" value="c"> Rainbow</label><br>

            <p>8. What does "data ink ratio" refer to?</p>
            <label><input type="radio" name="q8" value="a"> Amount of ink used in printing</label><br>
            <label><input type="radio" name="q8" value="b"> Proportion of useful data to decoration</label><br>
            <label><input type="radio" name="q8" value="c"> Ink levels in data printers</label><br>

            <p>9. Which is a Python library for data visualization?</p>
            <label><input type="radio" name="q9" value="a"> NumPy</label><br>
            <label><input type="radio" name="q9" value="b"> Matplotlib</label><br>
            <label><input type="radio" name="q9" value="c"> Pandas</label><br>

            <p>10. Why should you avoid 3D charts in most cases?</p>
            <label><input type="radio" name="q10" value="a"> They are more expensive</label><br>
            <label><input type="radio" name="q10" value="b"> They can distort data perception</label><br>
            <label><input type="radio" name="q10" value="c"> They are not colorful</label><br>

            <button type="button" onclick="submitQuiz()">Submit</button>
        </form>

        <p id="result"></p>
    </div>

    <div class="popup" id="popup">
        <h3>Congratulations! You have completed the course successfully!</h3>
        <button onclick="window.location.href='modules/certificate.php?course=Data Visualization'">Download Certificate</button>
    </div>

    <script>
        const userEmail = "<?php echo $_SESSION['user_email']; ?>";

        function submitQuiz() {
            const answers = {
                q1: "b",
                q2: "a",
                q3: "b",
                q4: "b",
                q5: "c",
                q6: "b",
                q7: "b",
                q8: "b",
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
                    quiz: "dvscore"
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

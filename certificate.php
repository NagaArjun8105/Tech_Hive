<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_name'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit;
}

$username = $_SESSION['user_name']; // Logged-in user's name
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <style>
        body { background-color: #f4f4f4; text-align: center; font-family: 'Times New Roman', serif; }
        .certificate-container { display: flex; justify-content: center; align-items: center; height: 100vh; }
        .certificate { 
            width: 900px; 
            height: 600px; 
            background: white; 
            border: 10px solid #555; 
            padding: 20px; 
            position: relative; 
            text-align: center;
            box-shadow: 5px 5px 20px rgba(0,0,0,0.2);
        }
        .certificate h1 { font-size: 50px; font-weight: bold; letter-spacing: 3px; }
        .certificate h2 { font-size: 30px; margin-top: 10px; }
        .certificate p { font-size: 20px; margin-top: 10px; }
        .name { font-size: 35px; font-weight: bold; text-transform: uppercase; margin-top: 20px; }
        .company { font-size: 25px; font-weight: bold; }
        .footer { position: absolute; bottom: 20px; left: 50%; transform: translateX(-50%); width: 100%; display: flex; justify-content: space-between; padding: 0 50px; }
        .date, .signature { font-size: 18px; font-weight: bold; }
        .seal { position: absolute; bottom: 50px; left: 50%; transform: translateX(-50%); }
    </style>
</head>
<body>
    

    <div class="container mt-5">
    <button onclick="downloadCertificate()" class="btn btn-success mt-3">Download</button>
        <div class="certificate-container">
            <div id="certificate" class="certificate">
                <h1>CERTIFICATE</h1>
                <h2>OF COMPLETION</h2>
                <p>THIS CERTIFICATE STATES THAT</p>
                <p class="name"><?= htmlspecialchars($username) ?></p>
                <p>has successfully completed a training program for</p>
                <p class="company">Web Development</p>
                <p>AT TECH HIVE</p>
                <img src="Blue_and_White_Modern_Computer_Illustrative_Tech_Website_Logo-removebg-preview.png" class="seal" width="150px" height="150px" alt="Seal">
                <div class="footer">
                    <p class="date"><?= date("F j, Y") ?> <br> DATE</p>
                    <p class="signature">Dr. ABC <br> SIGNATURE</p>
                </div>
            </div>
        </div>

       
    </div>

    <script>
        function downloadCertificate() {
            html2canvas(document.getElementById("certificate")).then(canvas => {
                let link = document.createElement("a");
                link.href = canvas.toDataURL();
                link.download = "certificate.png";
                link.click();
            });
        }
    </script>

</body>
</html>

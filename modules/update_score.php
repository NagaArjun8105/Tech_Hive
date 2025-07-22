<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "DB connection failed."]));
}

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['email'], $data['score'], $data['quiz'])) {
    echo json_encode(["success" => false, "message" => "Missing required data."]);
    exit;
}

$email = $conn->real_escape_string($data['email']);
$score = (int)$data['score'];
$quiz = $conn->real_escape_string($data['quiz']); // e.g. 'webscore'

$valid_columns = ['webscore', 'awsscore', 'mlscore'];
if (!in_array($quiz, $valid_columns)) {
    echo json_encode(["success" => false, "message" => "Invalid quiz name."]);
    exit;
}

// Only update the score if it's 2 or higher
if ($score < 2) {
    echo json_encode(["success" => false, "message" => "Score is too low to update."]);
    exit;
}

$sql = "UPDATE signup SET $quiz = ? WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $score, $email);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Score updated."]);
} else {
    echo json_encode(["success" => false, "message" => "Failed to update score."]);
}

$stmt->close();
$conn->close();
?>

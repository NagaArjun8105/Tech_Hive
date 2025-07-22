<?php
session_start();
header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);

$email = $data['email'];
$course = $data['course']; // e.g., 'webscore'

$conn = new mysqli("localhost", "root", "", "project"); // Adjust credentials
if ($conn->connect_error) {
    echo json_encode(["completed" => false, "error" => "DB connection failed"]);
    exit();
}

$stmt = $conn->prepare("SELECT $course FROM signup WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row && intval($row[$course]) > 0) {
    echo json_encode(["completed" => true]);
} else {
    echo json_encode(["completed" => false]);
}
?>

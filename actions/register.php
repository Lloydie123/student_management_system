<?php
// include config
require_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // get data from the form here 
    $lrn = $_POST['lrn'];
    $email = $_POST['email'];
    $contact_number = $_POST['contact_number'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate input here 
    if (empty($lrn) || empty($email) || empty($contact_number) || empty($password) || empty($confirm_password)) {
        $response = array('status' => 'error', 'message' => 'All fields are required');
    } elseif ($password !== $confirm_password) {
        $response = array('status' => 'error', 'message' => 'Passwords do not match');
    } else {
        // Hash the password (you should use a secure hashing method)
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user data into the database
        $stmt = $pdo->prepare("INSERT INTO users (lrn, email, contact_number, password, type, status) VALUES (?, ?, ?, ?, 'user', 1)");
        $stmt->execute([$lrn, $email, $contact_number, $hashed_password]);

        $response = array('status' => 'success', 'message' => 'Registration is successful');
        echo json_encode(['status' => 'success']);
        header('Location: ../login.php');
    }

    // Send JSON response back to the client-side
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>

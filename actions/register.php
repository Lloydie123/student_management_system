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
        
        $error = "All fields are required";
        header("Location: ../register.php");
    } elseif ($password !== $confirm_password) {
        $error = "Passwords do not match";
        header("Location: ../register.php");
    } else {
        // Hash the password (you should use a secure hashing method)
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user data into the database
        $stmt = $pdo->prepare("INSERT INTO users (lrn, email, contact_number, password, type, status) VALUES (?, ?, ?, ?, 'user', 'active')");
        $stmt->execute([$lrn, $email, $contact_number, $hashed_password]);

        // Redirect to login page
        // contain an error message in a variable and alert it in the login.php
        header("Location: ../login.php");
        exit();
    }
}
?>


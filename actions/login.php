<?php
session_start();
require_once '../config.php';

function detectLoginError($user, $password) {
    if (!$user) {
        // No account with that email
        $_SESSION['error'] = "Account not found based on the email or lrn";
    } elseif (!password_verify($password, $user['password'])) {
        // Incorrect password
        $_SESSION['error'] = "Incorrect password";
    }
    // Note: If both conditions are false, the login is considered successful
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process login form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch user data from the database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    detectLoginError($user, $password);

    if (isset($_SESSION['error'])) {
        // Redirect to login page with error message
        header("Location: ../login.php");
        exit();
    }

    // Valid login, store user data in the session
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_email'] = $user['email'];
    $_SESSION['user_type'] = $user['type'];

    // Redirect to a dashboard or home page
    $_SESSION['success'] = "Log in Successful";
    header("Location: ../index.php");
    exit();
}
?>

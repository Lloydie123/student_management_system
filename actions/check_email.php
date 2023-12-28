<?php
// include config
require_once '../config.php';

if (isset($_POST['email'])) {
    // Get the email from the AJAX request
    $email = $_POST['email'];

    // Prepare and execute a query to check if the email already exists
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $count = $stmt->fetchColumn();

    if ($count > 0) {
        // Email already exists
        echo json_encode(['status' => 'exists']);
    } else {
        // Email does not exist
        echo json_encode(['status' => 'does_not_exist']);
    }
} else {
    // Handle invalid or missing parameters
    echo 'error';
}
?>

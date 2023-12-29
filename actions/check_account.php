<?php
// include config
require_once '../config.php';

    if (isset($_POST['lrn'])) {
        // Get the lrn from the AJAX request
        $lrn = $_POST['lrn'];

        // Prepare and execute a query to check if the email already exists
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE lrn = ?");
        $stmt->execute([$lrn]);
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            // LRN already exists
            echo json_encode(['status' => 'exists']);
        } else {
            // LRN does not exist
            echo json_encode(['status' => 'does_not_exist']);
        }
    
    } elseif(isset($_POST['contact_number'])) {
        // Get the lrn from the AJAX request
        $contact_number = $_POST['contact_number'];
    
        // Prepare and execute a query to check if the email already exists
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE contact_number = ?");
        $stmt->execute([$contact_number]);
        $count = $stmt->fetchColumn();  
    
        if ($count > 0) {
            // LRN already exists
            echo json_encode(['status' => 'exists']);
        } else {
            // LRN does not exist
            echo json_encode(['status' => 'does_not_exist']);
        }
  
    
    } elseif(isset($_POST['email'])) {
        // Get the lrn from the AJAX request
        $email = $_POST['email'];

        // Prepare and execute a query to check if the email already exists
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            // LRN already exists
            echo json_encode(['status' => 'exists']);
        } else {
            // LRN does not exist
            echo json_encode(['status' => 'does_not_exist']);
        }

    }
    
    else {
        // Handle invalid or missing parameters
        echo 'error';
    }
    ?>

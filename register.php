<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Register</title>
</head>
<body>
<!-- Add a script section to handle client-side validation -->
<script>
$(document).ready(function() {
    // Function to check if the email already exists
    function checkEmailExists(email) {
        // Make an AJAX request to your server-side script
        $.ajax({
            
            type: "POST",
            url: "actions/check_email.php", // Replace with the actual path to your server-side script
            data: { email: email },
            success: function(response) {
                var data = JSON.parse(response);
                if (data.status === "exists") {
                    // Email already exists, show an error message
                    $("#email-error").text("Email already exists").css("color", "red");
                } else {
                    // Email is unique, clear the error message
                    $("#email-error").text("Email is available to use").css("color", "green");
                }
            }
        });
    }

    function checkLRNExists(lrn) {
        // Make an AJAX request to your server-side script
        $.ajax({
            
            type: "POST",
            url: "actions/check_lrn.php", // Replace with the actual path to your server-side script
            data: { lrn: lrn },
            success: function(response) {
                var data = JSON.parse(response);
                if (data.status === "exists") {
                    // LRN already exists, show an error message
                    $("#lrn-error").text("LRN already exists").css("color", "red");
                } else {
                    // LRN is unique, clear the error message
                    $("#lrn-error").text("LRN is available to use").css("color", "green");
 
                }
            }
        });
    }

    function checkContactNumberExists(contact_number) {
        
        // Make an AJAX request to your server-side script
        $.ajax({    
            type: "POST",
            url: "actions/check_lrn.php", // Replace with the actual path to your server-side script
            data: { contact_number: contact_number },
            success: function(response) {
                var data = JSON.parse(response);
                if (data.status === "exists") {
                    // LRN already exists, show an error message
                    $("#contact_number-error").text("Contact number already exists").css("color", "red");
               
                } else {
                    // LRN is unique, clear the error message
                    $("#contact_number-error").text("Contact Number is available to use").css("color", "green");
                }
            }
        });
    }

    // Event listener for the email input field on keyup
    $("input[name='email']").on("keyup", function() {
        
        // Get the entered email value
        var email = $(this).val();
        // Check if the email is not empty
        if (email !== "") {
            // Call the function to check if the email already exists

            checkEmailExists(email);
        }
    });

    $("input[name='lrn']").on("keyup", function() {
        
        // Get the entered lrn value
        var lrn = $(this).val();
        // Check if the lrn is not empty
        if (lrn !== "") {
            // Call the function to check if the lrn already exists
        
            checkLRNExists(lrn);
        }
    });

    $("input[name='contact_number']").on("keyup", function() {
        
        // Get the entered lrn value
        var contact_number = $(this).val();
        // Check if the lrn is not empty
        if (contact_number !== "") {
           
            // Call the function to check if the lrn already exists
        
            checkContactNumberExists(contact_number);
        }
    });

    // Event listener for form submission
    $("form").on("submit", function(event) {
        // Check if there are any error messages
        if ($("#email-error").text() !== "Email is available to use" || $("#lrn-error").text() !== "LRN is available to use" || $("#contact_number-error").text() !== "Contact Number is available to use") {
            // Prevent form submission if there are errors
            event.preventDefault();

            // Pop up an alert , call the alert like in the login 
            alert("Please fix the errors before submitting the form.");
        }
    });
    
});
</script>

    
    <?php if (isset($error)) : ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="post" action="actions/register.php">
        <center> <h2>Register</h2> </center>
        <label>LRN:</label>
        <span id="lrn-error" style="color: black; margin-bottm: 20px;"></span>
        <input type="text" name="lrn" required><br>

        <label>Email:</label>

         <!-- Message area for email status -->
        <span id="email-error" style="color: black; margin-bottm: 20px;"></span>
        <input type="email" name="email" required><br>


       
        <label>Contact Number:</label>
        <span id="contact_number-error" style="color: black; margin-bottm: 20px;"></span>
        <input type="number" name="contact_number" required><br>

        <label>Password:</label>
        <input type="password" name="password" required><br>

        <label>Confirm Password:</label>
        <input type="password" name="confirm_password" required><br>

        <div class="form-header" >
            <a href="login.php"> Already have an account? Login here</a>  
        </div> 

        <button type="submit">Register</button>
    </form>
</body>
</html>
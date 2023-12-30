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
                url: "actions/check_account.php", // Replace with the actual path to your server-side script
                data: { email: email },
                success: function(response) {
                    var data = JSON.parse(response);
                    if (data.status === "exists") {
                        // Email already exists, show an error message
                        $("#email-error").text("Email already exists").css("color", "red");
                    } else if (email.indexOf('@') === -1) {
                        // Email does not contain '@', show an error message
                        $("#email-error").text("Please provide a valid email address").css("color", "red");
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
            url: "actions/check_account.php", // Replace with the actual path to your server-side script
            data: { lrn: lrn },
            success: function(response) {
                var data = JSON.parse(response);

                if (data.status === "exists") {
                    // LRN already exists, show an error message
                    $("#lrn-error").text("LRN already exists").css("color", "red");
                } else if (lrn.length !== 12 || !/^\d+$/.test(lrn)) {
                    // LRN does not have 12 digits or contains non-numeric characters
                    $("#lrn-error").text("Please provide a valid 12-digit LRN").css("color", "red");
                } else if (/[^a-zA-Z0-9]/.test(lrn)) {
                    // LRN contains special characters
                    $("#lrn-error").text("Please remove any special characters").css("color", "red");
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
            url: "actions/check_account.php", // Replace with the actual path to your server-side script
            data: { contact_number: contact_number },
            success: function(response) {
                var data = JSON.parse(response);
                if (data.status === "exists") {
                    // Contact number already exists, show an error message
                    $("#contact_number-error").text("Contact number already exists").css("color", "red");
                } else if (contact_number.length !== 11 || !/^\d+$/.test(contact_number)) {
                    // Contact number does not have 11 digits or contains non-numeric characters
                    $("#contact_number-error").text("Please provide a valid 11-digit contact number").css("color", "red");
                } else {
                    // Contact number is unique, clear the error message
                    $("#contact_number-error").text("Contact number is available to use").css("color", "green");
                }
            }
        });
    }


        // Function to check if password and confirm password match

    
    function checkPasswordMatch() {
        var password = $("input[name='password']").val();
        var confirmPassword = $("input[name='confirm_password']").val();
         // Check if the password is strong and complies with ISO27001 Compliant Password Policy
        var strongRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        // Check if the password contains simple words to avoid
        var simpleWords = ["password", "123456", "qwerty"];

        
        // Check if password and confirm password match
        if (password !== confirmPassword) {
            // Password and confirm password do not match, show an error message
            $("#check-password-label").text("Password and confirm password do not match").css("color", "red");
        } else {
            // Password and confirm password match, clear the error message
            $("#check-password-label").text("").css("color", "green");
        }
    }

    function checkPasswordCompliance(password) {
        // Check if the password is strong and complies with ISO27001 Compliant Password Policy
        var strongRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

        // Check if the password contains simple words to avoid
        var simpleWords = ["password", "123456", "qwerty"];

        // Check for compliance with the strong password policy
        if (!strongRegex.test(password)) {
            // Password is not strong, show an error message
            $("#password-error").text("Password shall contain uppercase letters, lowercase letters, digits, and special characters with a minimum length of 8 characters").css("color", "red");
            return false;
        }

        // Check for simple words
        for (var i = 0; i < simpleWords.length; i++) {
            if (password.toLowerCase().includes(simpleWords[i])) {
                // Password contains a simple word, show an error message
                $("#password-error").text("Avoid using simple words like 'password', '123456', or 'qwerty'").css("color", "red");
                return false;
            }
        }

        // Password is compliant, clear the error message
        $("#password-error").text("Password is available to use").css("color", "green");
        return true;
    }


    // Event listener for the password input field on keyup
    $("input[name='password']").on("keyup", function() {
        // Get the entered password value
        var password = $(this).val();

        // Check if the password complies with ISO27001 Compliant Password Policy
        checkPasswordCompliance(password);
    });


    // Event listener for the confirm password input field on keyup
    $("input[name='confirm_password']").on("keyup", function() {
        // Call the function to check if password and confirm password match
        checkPasswordMatch();
    });
    // Add another function here that live checks if the password is not matched, name of fucntion is check password and the function gets the value of password and confirm password, after the user types the confirm password then it checkcs if the password and confirm password is the same, if not it has a check-password-label is color red and it says "Password and confirm password is not the same"
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
        
        // Get the entered contact number 
        var contact_number = $(this).val();
        // Check if the contact number is not empty
        if (contact_number !== "") {
           
            // Call the function to check if the lrn already exists
        
            checkContactNumberExists(contact_number);
        }
    });

    // Event listener for form submission
    $("form").on("submit", function(event) {
        // Check if there are any error messages
        if ($("#email-error").text() !== "Email is available to use" || $("#lrn-error").text() !== "LRN is available to use" || $("#contact_number-error").text() !== "Contact number is available to use") {
            // Prevent form submission if there are errors
            event.preventDefault();
              // Configure the alert message here
                Swal.fire({
                    icon: 'error', // 
                    title: 'Oops...',
                    text: "Please fix the errors before submitting the form.",
                });
            } else {
        // If no errors, proceed with form submission
            $.ajax({
                type: "POST",
                url: "actions/register.php",
                data: $("form").serialize(), // Serialize the form data
                success: function(response) {
                    if (response.status === "success") {
                        // Registration is successful, show a success alert
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                        });
                    } else {
                        // Registration failed, show an error alert
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.message,
                        });
                    }
                },
                dataType: "json"
            });
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
        <span id="password-error" style="color: black; margin-bottm: 20px;"></span>
        <input type="password" name="password" required><br>


        <label>Confirm Password:</label>
        <span id="check-password-label" style="color: black; margin-bottm: 20px;"></span>
        <input type="password" name="confirm_password" required><br>

        <div class="form-header" >
            <a href="login.php"> Already have an account? Login here</a>  
        </div> 

        <button type="submit">Register</button>
    </form>
</body>
</html>
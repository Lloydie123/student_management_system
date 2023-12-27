<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css">
    <!-- Include SweetAlert2 CSS and JS files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Login</title>
</head>


<body>

    <!-- Display The Error alert  -->
    <?php if (isset($_SESSION['error'])) : ?>
        <script>
            // Configure the alert message here
            Swal.fire({
                icon: 'error', // 
                title: 'Oops...',
                text: "<?php echo $_SESSION['error']; ?>",
            });
        </script>
        <?php unset($_SESSION['error']); // Clear the error after displaying it ?>
    <?php endif; ?>
    
      <!-- Display log in success alert  -->
    <?php if (isset($_SESSION['success'])) : ?>
        <script>
            // Configure the alert message here
            Swal.fire({
                icon: 'success', // 
                title: 'Success!',
                text: "<?php echo $_SESSION['success']; ?>",
            });
        </script>
        <?php unset($_SESSION['success']); // Clear the error after displaying it ?>
    <?php endif; ?>
    


    <form method="post" action="actions/login.php">
        <center> <h2>Login</h2> </center>
        
        <!-- Can you make it that if there is an error it displays in the value here the last typed email or password by the useer so that the user should not type it again -->
        <label>Email or LRN :</label>
        <input type="email" name="email" required ><br>

        <label>Password:</label>
        <input type="password" name="password" required><br>
        
        <div class="form-header" >
            <a href="register.php"> No account yet? Register here</a>  
        </div>
        
        <button type="submit" class="login_btn" >Login</button>
    </form>
</body>
</html>

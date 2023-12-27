
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Register</title>
</head>
<body>

    
    <?php if (isset($error)) : ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="post" action="actions/register.php">
        <center> <h2>Register</h2> </center>
        <label>LRN:</label>
        <input type="text" name="lrn" required><br>

        <label>Email:</label>
        <input type="email" name="email" required><br>

        <label>Contact Number:</label>
        <input type="text" name="contact_number" required><br>

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
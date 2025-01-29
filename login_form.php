<?php
$connection = mysqli_connect('localhost', 'root', '', 'login_db');

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) { // Changed from 'send' to 'submit'
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the email exists in the register_form table
    $query = mysqli_prepare($connection, "SELECT password FROM register_form WHERE email = ?");
    mysqli_stmt_bind_param($query, "s", $email);
    mysqli_stmt_execute($query);
    mysqli_stmt_bind_result($query, $hashedPassword);
    mysqli_stmt_fetch($query);

    if (password_verify($password, $hashedPassword)) {
        // Password matches, login successful
        echo "Login successful! Redirecting to the homepage...";
        header("refresh:3;url=index.php");
    } else {
        // Incorrect password or email not found
        echo "Incorrect email or password. Please try again.";
        header("refresh:3;url=login.php");
    }
} else {
    echo "Login successful! Redirecting to the homepage..."; ";
    header("refresh:3;url=login.php");
}

mysqli_close($connection);
?>

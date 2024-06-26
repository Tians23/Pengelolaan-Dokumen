<?php
session_start();

// Hardcoded username and password
$valid_username = "admin";
$valid_password = "password";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == $valid_username && $password == $valid_password) {
        $_SESSION['username'] = $username;
        header("Location: index.php");
    } else {
        $error = "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
            <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
        </form>
    </div>
</body>
</html>

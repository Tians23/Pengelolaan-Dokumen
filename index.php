<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="navbar">
        <div>Document Management System</div>
        <div>
            <a href="upload.php">Upload Document</a>
            <a href="documents.php">Document List</a>
            <a href="search.php">Search</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
    <div class="container">
        <h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
        <div class="card">
            <h2>Recent Documents</h2>
            <!-- Recent documents list -->
        </div>
    </div>
</body>
</html>

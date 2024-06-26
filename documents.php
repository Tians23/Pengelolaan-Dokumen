<?php
session_start();
require 'config.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM documents";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Document List</title>
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
        <h2>Document List</h2>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Uploaded By</th>
                    <th>Uploaded At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['uploaded_by']; ?></td>
                    <td><?php echo $row['uploaded_at']; ?></td>
                    <td><a href="<?php echo $row['file_path']; ?>">Download</a></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

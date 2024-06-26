<?php
session_start();
require 'config.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $uploaded_by = $_SESSION['username'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["document"]["name"]);

    if (move_uploaded_file($_FILES["document"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO documents (title, description, file_path, uploaded_by) VALUES ('$title', '$description', '$target_file', '$uploaded_by')";
        if ($conn->query($sql) === TRUE) {
            echo "Dokumen berhasil diunggah.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Maaf, terjadi kesalahan saat mengunggah dokumen.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Document</title>
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
        <div class="upload-container">
            <h2>Upload Document</h2>
            <form method="post" enctype="multipart/form-data">
                <input type="text" name="title" placeholder="Document Title" required>
                <textarea name="description" placeholder="Document Description" required></textarea>
                <input type="file" name="document" required>
                <button type="submit">Upload</button>
            </form>
        </div>
    </div>
</body>
</html>

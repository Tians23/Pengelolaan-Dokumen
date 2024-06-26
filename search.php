<?php
session_start();
require 'config.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$results = [];

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['query'])) {
    $query = $_GET['query'];
    $sql = "SELECT * FROM documents WHERE title LIKE '%$query%' OR description LIKE '%$query%'";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()) {
        $results[] = $row;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Documents</title>
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
        <div class="search-container">
            <h2>Search Documents</h2>
            <form method="get">
                <input type="text" name="query" placeholder="Enter title or description" required>
                <button type="submit">Search</button>
            </form>
            <?php if (!empty($results)): ?>
            <h3>Results:</h3>
            <ul>
                <?php foreach ($results as $result): ?>
                <li>
                    <strong><?php echo $result['title']; ?></strong><br>
                    <?php echo $result['description']; ?><br>
                    Uploaded by: <?php echo $result['uploaded_by']; ?><br>
                    <a href="<?php echo $result['file_path']; ?>">Download</a>
                </li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>

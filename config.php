<?php 

// Database credentials
$dbHost = 'localhost'; // Change to your MySQL host if different
$dbName = 'book';
$dbUser = 'root';
$dbPass = '12345';

// Establish a database connection
try {
    $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}


// Fetch books from the database
$sql = "SELECT * FROM books";
$stmt = $db->query($sql);
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Handle book deletion
if(isset($_POST['delete']) && isset($_POST['bookID'])) {
    $bookID = $_POST['bookID'];
    $sql = "DELETE FROM books WHERE bookID = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$bookID]);
    
    // After deletion, redirect back to home.php
    header("Location: home.php");
    exit;
}

?>
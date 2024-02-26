<?php include('config.php');

if (isset($_GET['bookID'])) {
    $bookID = $_GET['bookID'];
    
    // Fetch book information based on book ID
    $sql = "SELECT * FROM books WHERE bookID = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$bookID]);
    $bookData = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($bookData) {
        $bookName = $bookData['bookName'];
        $authorName = $bookData['authorName'];
        $price = $bookData['price'];
    } else {
        echo "Book not found.";
    }
} else {
    echo "Book ID is missing.";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Book App</title>
    <link rel= "stylesheet" href= "style.css">
</head>
<body>
    <h1><?php echo $bookName; ?></h1>
    <h2>Auther: <?php echo $authorName; ?></h2>
    <h2>Price: <?php echo $price; ?>$</h2>
<h1>Edit Book</h1>
       <form action="edit.php" method="post">
            <input type="hidden" name="bookID" value="<?php echo $bookID; ?>">
            <label>Book Name</label>
            <input type="text" name="bookName" value="<?php echo $bookName; ?>" required/>
            <label>Author Name</label>
            <input type="text" name="authorName" value="<?php echo $authorName; ?>" required/>
            <label>Price</label>
            <input type="text" name="price" value="<?php echo $price; ?>" required/>
          <button type="submit" id="edit" name="edit">Edit</button>
        </form>

        </body>
</html>
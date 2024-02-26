<?php include('config.php');
// Fetch books from the database
$sql = "SELECT * FROM books";
$stmt = $db->query($sql);
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Book App</title>
    <link rel= "stylesheet" href= "style.css">
</head>
<body>
<body>
    <h1>Book List</h1>
    <ul id="bookList">
        <?php foreach ($books as $book): ?>
            <li><?php echo $book['bookName']; ?> - <?php echo $book['autherName']; ?> - $<?php echo $book['price']; ?></li>
        <?php endforeach; ?>
    </ul>
    <h1>Add Book</h1>
    <form action="home.php" method="post">
              <?php  
             if (isset($_POST['submit'])) {
               $bookName = $_POST['bookName'];
               $autherName = $_POST['autherName'];
               $price = $_POST['price'];
               $sql = "INSERT INTO books(bookName, autherName, price) VALUES (?, ?, ?)";
               $stmtinsert = $db->prepare($sql);
               $result = $stmtinsert->execute([$bookName, $autherName, $price]);
        
            if ($result) {
                  echo "Successfully saved, you added book";

                  header("Location: home.php");
               } else {
                  echo "There were errors while saving the data.";
               }
            }
               ?>
           
            <!-- Add book form fields here -->
            <label>Book Name</label>
            <input type="text" name="bookName" id = "bookName" placeholder= "Book Name" required/>
            <label>Auther Name</label>
            <input type="text" name="autherName" id = "autherName" placeholder= " Auther Name" required/>
            <label>Price</label>
            <input type="text" name="price" id = "price" placeholder= "Price" required/>
            <button type= "submit" id = "register" name="submit">submit</button>
      
        </form>
        <h1>Edit Book</h1>
       <form action="home.php" method="put">
          <label>Book ID</label>
          <input type="text" name="bookID" id="bookID" placeholder="Book ID" required/> <!-- Assuming you have a book ID -->
          <label>Book Name</label>
          <input type="text" name="bookName" id="bookName" placeholder="Book Name" required/>
          <label>Author Name</label>
          <input type="text" name="autherName" id="autherName" placeholder="Author Name" required/>
          <label>Price</label>
          <input type="text" name="price" id="price" placeholder="Price" required/>
          <button type="submit" id="edit" name="submit">Submit</button>
        </form>

</body>
</html>
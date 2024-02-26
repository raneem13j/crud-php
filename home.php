<?php include('config.php');?>
<!DOCTYPE html>
<html>
<head>
    <title>Book App</title>
    <link rel= "stylesheet" href= "style.css">
</head>
<body>
    <h1>Book List</h1>
    <ul id="bookList">
        <?php foreach ($books as $book): ?>
            <li><a href="singleBook.php?bookID=<?php echo $book['bookID']; ?>"><?php echo $book['bookName']; ?></a></li>
        <?php endforeach; ?>
    </ul>
    <h1>Add Book</h1>
    <form action="home.php" method="post">
              <?php  
             if (isset($_POST['submit'])) {
                $bookName = $_POST['bookName'];
                $authorName = $_POST['authorName'];
                $price = $_POST['price'];
                $sql = "INSERT INTO books(bookName, authorName, price) VALUES (?, ?, ?)";
                $stmtinsert = $db->prepare($sql);
                $result = $stmtinsert->execute([$bookName, $authorName, $price]);
        
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
            <input type="text" name="authorName" id = "authorName" placeholder= " Auther Name" required/>
            <label>Price</label>
            <input type="text" name="price" id = "price" placeholder= "Price" required/>
            <button type= "submit" id = "register" name="submit">submit</button>
      
        </form>
</body>
</html>
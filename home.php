<?php
include('config.php');

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
            <li><?php echo $book['bookName']; ?> - <?php echo $book['authorName']; ?> - $<?php echo $book['price']; ?></li>
            <button type= "submit" id = "register" name="submit">delet</button>
            <button type= "submit" id = "register" name="submit">edit</button>
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
        <h1>Edit Book</h1>
       <form action="home.php" method="put">
       <?php  



       ?>
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
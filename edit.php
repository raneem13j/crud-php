<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit'])) {
   
    if (isset($_POST['bookID']) && isset($_POST['bookName']) && isset($_POST['authorName']) && isset($_POST['price'])) {
        
        $bookID = $_POST['bookID'];
        $bookName = htmlspecialchars($_POST['bookName']);
        $authorName = htmlspecialchars($_POST['authorName']);
        $price = htmlspecialchars($_POST['price']);

       
        $sql = "UPDATE books SET bookName = ?, authorName = ?, price = ? WHERE bookID = ?";
        $stmt = $db->prepare($sql);
        $result = $stmt->execute([$bookName, $authorName, $price, $bookID]);

        if ($result) {
            header("Location: singleBook.php?bookID=$bookID&message=success");
            exit;
            
        } else {
            header("Location: singleBook.php?bookID=$bookID&message=error");
            exit;
          
        }
    } else {
       
        header("Location: singleBook.php?bookID=$bookID&message=error");
        exit;
    }
} else {
    header("Location: home.php");
    exit;
}
?>
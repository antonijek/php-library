
<?php
function deleteBook(){
    $id = $_POST['id'];
     $con = mysqli_connect("localhost","root","","library");
    $result = mysqli_query($con, "DELETE FROM books WHERE id = $id ");
       }
   $book = deleteBook();
   $name= $_POST['name'];
   header("location: ./home.php?name=".$name);
    


?>
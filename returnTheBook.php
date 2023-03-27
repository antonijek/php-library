<?php


function deleteBookFromPivotTable(){
    $id = $_POST['book_id'];
    $con = mysqli_connect("localhost","root","","library");
   $result = mysqli_query($con, "DELETE FROM book_user WHERE book_id = $id ");
   }
   deleteBookFromPivotTable();

  function returnBook(){
    $id = $_POST['book_id'];
    $available = 1; // create a variable to hold the value you want to bind
    $con = mysqli_connect("localhost","root","","library");
    $updateQuery = "UPDATE books SET available=? WHERE id=?";
    $sql = mysqli_prepare($con, $updateQuery);
    if ($sql === false) {
        // handle prepare error
    } else {
        mysqli_stmt_bind_param($sql, "ii", $available, $id); // pass references to variables instead of values
        mysqli_stmt_execute($sql);
    }
  }
  


returnBook();
$name = $_POST['name'];
      
 
  header("location: ./home.php?name=".$name);





?>
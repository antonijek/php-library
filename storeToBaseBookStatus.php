<?php

function getId($name){
  
   $con = mysqli_connect("localhost","root","","library");
   $stmt = mysqli_prepare($con, "SELECT id FROM users WHERE first_name = ?");
   mysqli_stmt_bind_param($stmt, "s", $name);
   mysqli_stmt_execute($stmt);
   $result = mysqli_stmt_get_result($stmt);
      if ($result) {
          $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
          return $data;
      }
  }
 

function changeStatusOfBook(){
  $id = $_POST['hiddenId'];
  $available=$_POST['available'];
  $conn = mysqli_connect("localhost","root","","library");
   $updateQuery ="UPDATE books SET 
  
available=?
   WHERE id=?";
   $sql = mysqli_prepare($conn, $updateQuery);
   mysqli_stmt_bind_param($sql, "si",$available,$id);
   mysqli_stmt_execute($sql);

}

changeStatusOfBook();
$name= $_POST['name'];
header("location: ./home.php?name=".$name);




function storeBookAndUser(){
   $id = $_POST['hiddenId'];
   $name= $_POST['name'];
$x = getId($name)[0]['id'];
  

   $con = mysqli_connect("localhost","root","","library");
   $sql = mysqli_prepare($con, "INSERT INTO book_user (book_id, user_id) VALUES (?, ?)");
   mysqli_stmt_bind_param($sql, "ss", $id, $x);
   mysqli_stmt_execute($sql);
   mysqli_stmt_close($sql);
   mysqli_close($con);
}

storeBookAndUser()


?>
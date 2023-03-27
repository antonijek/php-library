<?php



function updateBookToBase(){
  $id = $_POST['hiddenId'];
  $title=$_POST['title'];
  $description=$_POST['description'];
  $author=$_POST['author'];
  
  $conn = mysqli_connect("localhost","root","","library");
   $updateQuery ="UPDATE books SET 
   title= ?,
   description=?,
   author=?
   WHERE id=?";
   $sql = mysqli_prepare($conn, $updateQuery);
   mysqli_stmt_bind_param($sql, "sssi",$title, $description, $author,$id);
   mysqli_stmt_execute($sql);

}

updateBookToBase();
$name= $_POST['name'];
header("location: ./home.php?name=".$name);
?>
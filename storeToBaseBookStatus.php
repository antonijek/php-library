<?php



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
?>
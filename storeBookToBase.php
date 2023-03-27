<?php
function storeBook(){
    $title=$_POST['title'];
    $author=$_POST['author'];
    $description=$_POST['description'];
    $available=$_POST['available'];
   
   

    $con = mysqli_connect("localhost","root","","library");
    $sql = mysqli_prepare($con, "INSERT INTO books (title, author,description,available) VALUES (?, ?, ?,?)");
    mysqli_stmt_bind_param($sql, "ssss", $title, $author,$description,$available);
    mysqli_stmt_execute($sql);
    mysqli_stmt_close($sql);
    mysqli_close($con);
}
storeBook();
$name=$_POST['name'];
header("location: ./home.php?name=".$name);

?>
<?php
function storeData(){
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $email=$_POST['email'];
    $password=$_POST['password'];
   
   

    $con = mysqli_connect("localhost","root","","library");
    $sql = mysqli_prepare($con, "INSERT INTO users (first_name, last_name,email, password ) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($sql, "ssss", $firstName, $lastName,$email, $password);
    mysqli_stmt_execute($sql);
    mysqli_stmt_close($sql);
    mysqli_close($con);
}
storeData();
$firstName=$_POST['firstName'];
header("location: ./home.php?name=".$firstName);

?>
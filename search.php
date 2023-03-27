<?php
function searchByTitleOrAuthor($input){

    $con = mysqli_connect("localhost","root","","library");
    $sql = "SELECT * FROM books WHERE title LIKE '%$input%'   OR author LIKE '%$input%' ";
    $result = mysqli_query($con, $sql);
    $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
   return $rows;
  };

    
?>
<?php

function sortByTitle($condition){

    $con = mysqli_connect("localhost","root","","library");
    $sql = "SELECT  * FROM books ORDER BY title $condition ";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $data;
}





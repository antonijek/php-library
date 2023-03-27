<?php
function getDataFromBase($table){
    $con = mysqli_connect("localhost","root","","library");

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    } else
    {
        $result = mysqli_query($con, "SELECT * FROM $table");
        if ($result) {
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $data;
        }
    }

}

?>
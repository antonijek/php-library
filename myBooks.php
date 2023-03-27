<?php
include "./getFromDatabase.php";


function getMyBooks(){
    $con = mysqli_connect("localhost","root","","library");
  
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    } else
    {
        $result = mysqli_query($con, "SELECT * FROM books WHERE available = 'borrow'");
        if ($result) {
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $data;
        }
    }

}

$myBooks = getMyBooks();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href=
    "https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</head>


<body>

<style>
    .table thead th {
         vertical-align: top;
        border-bottom: 2px solid #dee2e6;
    }

</style>
<body>
<div class="container">
    <h2 class="mt-4 mb-4 text-center">My books</h2>

   
    <table class="table table-striped " >
        <thead>
        <tr class="align-text-top">
            <th>#</th>
            <th > <p class="mr-1 ml-1">Title</p>   </th>
            <th>Description</th>
            <th>Author</th>
          
        </tr>
        </thead>

        <?php

        foreach ($myBooks as $index=> $book) : ?>
            <tr>
                    <td><?php echo $index+1 ?></td>
                    <td><?php echo $book["title"] ?></td>
                    <td><?php echo $book["description"] ?></td>
                   <td><?php echo $book["author"] ?></td>
                   
                  
            </tr>
        <?php endforeach; ?>
    </table>
    <div class="d-flex justify-content-center">
     <a href="javascript:history.back()" class="btn btn-primary col-sm-2 m-4">Back</a>
    </div>
   
</div>
<script>
</script>
</body>
</html>
<?php

function getData($id){
    $con = mysqli_connect("localhost","root","","library");

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    } else
    {
        $result = mysqli_query($con, "SELECT * FROM book_user WHERE user_id= $id ");
        if ($result) {
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $data;
        }
    }

}

$name = $_GET['name'];
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
$x = getId($name)[0]['id'];
$myBooks = getData($x);


function getDataFromPivotTable($id){
   $con = mysqli_connect("localhost","root","","library");
    $result = mysqli_query($con, "SELECT * FROM books WHERE id = $id");
        if ($result) {
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $data;
        }
    }
  

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
                  
                    <td> <p><?php echo getDataFromPivotTable($book["book_id"])[0]['title'] ?></p>  </td>
                    <td> <p><?php echo getDataFromPivotTable($book["book_id"])[0]['description'] ?></p>  </td>
                    <td> <p><?php echo getDataFromPivotTable($book["book_id"])[0]['author'] ?></p>  </td>
                   
                  
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

<?php

function getIdFromBase(){
    $id = $_POST['id'];
     $con = mysqli_connect("localhost","root","","library");
    $result = mysqli_query($con, "SELECT * FROM books WHERE id = $id ");
        if ($result) {
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $data;
        }
    }
   $book = getIdFromBase();
   $name = $_POST['name'];
   ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
<h2 class="mb-4 mt-4 text-center">Borrow book</h2>
<div class="container">
    <form action="storeToBaseBookStatus.php" method="POST">
       <div class="form-group row">
           
            <div class="col-sm-6">
                <input type="hidden" name="available" class="form-control" id="staticEmail" value="0">

            </div>
        </div>
        <input type="hidden" name="name" value="<?php echo $name?>">
        <input type="hidden" name="hiddenId" class="form-control" id="staticEmail" value="<?php echo $book[0]['id']?>">
        <div class="align-items-center p-5">
             <h4 class="text-center">Da li zelite da pozajmite knjigu <span class="fw-bold"><?php echo $book[0]['title']?></span> ?</h4>
            <div class="d-flex justify-content-center m-4"> 
                <a href="javascript:history.back()" class="btn btn-secondary col-sm-1 mr-2 ">Ne!</a>
                <button type="submit" class="btn btn-primary col-sm-2 ">Da, zelim!</button>
            </div>
        </div>
       
       
    </form>
</div>

</body>
</html>
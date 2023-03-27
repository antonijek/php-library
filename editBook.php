
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
   $name= $_POST['name'];
   ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<h2 class="offset-4 mb-4 mt-4">Edit book</h2>
<div class="container">
    <form action="updateBook.php" method="POST">
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-6">
                <input type="text" name="title" class="form-control" id="staticEmail" value="<?php echo $book[0]['title']?>" required>

            </div>
        </div>

        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Author</label>
            <div class="col-sm-6">
                <input type="text" name="author" class="form-control" id="staticEmail" value="<?php echo $book[0]['author']?>" required>

            </div>
        </div>

        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-6">
                <input type="text" name="description" class="form-control" id="staticEmail" value="<?php echo $book[0]['description']?>" required>

            </div>
        </div>
        <input type="hidden" name="name" value="<?php echo $name?>">
        <input type="hidden" name="hiddenId" class="form-control" id="staticEmail" value="<?php echo $book[0]['id']?>" required>
        <button type="submit" class="btn btn-primary col-sm-2 offset-6">Edit</button>
    </form>
</div>

</body>
</html>
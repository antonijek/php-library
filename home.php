<?php
include "./getFromDatabase.php";
include "./sortTitle.php";
include "./search.php";

$books = getDataFromBase("books");
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
<?php

function getName(){
    $con = mysqli_connect("localhost","root","","library");
    $email= $_GET['email'];
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    } else
    {
        $result = mysqli_query($con, "SELECT first_name FROM users WHERE email = '$email'");
        if ($result) {
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $data;
        }
    }

}

if(isset($_GET['name']))  {
    $name= $_GET['name'] ;
}
elseif(isset($_POST['name']))  {
    $name= $_POST['name'] ;
}
else{
    $name = getName()[0]['first_name'];
}
?>


<nav class="navbar navbar-expand-lg  bg-dark">
  <div class="container-fluid">
  
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
    
    </button>
    <div class="collapse navbar-collapse justify-content-end pr-5" id="navbarNavDarkDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <button class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
           <?php
        echo $name;
           ?>
          </button>
          <ul class="dropdown-menu dropdown-menu-dark">
          <li><a class="dropdown-item" href="myBooks.php?name=<?php echo $name; ?>">My books</a></li>
          <li><a class="dropdown-item" href="index.php">Log out</a></li>
        </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>



<div class="container">
    <h1 class="mt-4 mb-4 text-center">Library</h1>

    <div class="input-group mb-4  justify-content-between">

 <form method="POST"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-outline ml-4 d-flex">
            <input type="search" name="search" id="form1" class="form-control" placeholder="Search"  />
            <input type="hidden" name="name" value="<?php echo $name?>"  />
            <button type="submit" class="btn btn-primary">
            <i class="bi bi-search"></i>
        </button>
        </form>
<form action="addNewBook.php" method='POST'> 
    <input  type="hidden" name="name" id="" value="<?php echo $name  ?>">
    <button  type="submit" class="btn btn-success mr-4"> Add book</button>
</form>
       
       
    </div>

    <table class="table table-striped " >
        <thead>
        <tr class="align-text-top">
            <th>#</th>
            <th ><form class="d-flex " method="POST"> <button class="border-0 btn btn-primary p-1" type="submit" name="desc"><i class="bi bi-arrow-down"></i></button>  <p class="mr-1 ml-1">Title</p>  <button  class="border-0 btn btn-primary p-1" type="submit" name="asc"> <i class="bi bi-arrow-up"></i></button>  </form>  </th>
            <th>Description</th>
            <th>Author</th>
            <th>Available</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>

        <?php

     
      

if(isset($_POST['search']))  {
    $books= searchByTitleOrAuthor($_POST["search"]);;
}

        if(isset($_POST['asc']))  {
            $books=  sortByTitle( "asc");
        }
        if(isset($_POST['desc']))  {
            $books=  sortByTitle( "desc");
        }

        foreach ($books as $index=> $book) : ?>
            <tr>
                    <td><?php echo $index+1 ?></td>
                    <td><?php echo $book["title"] ?></td>
                    <td><?php echo $book["description"] ?></td>
                   <td><?php echo $book["author"] ?></td>
                    <td><form action="takeABook.php" method="POST"><?php echo $book["available"]==1? "<button class='btn btn-warning' type='submit'>borrow</button>" :"unavailable" ?> <input type="hidden" name="name"value="<?php echo $name?>"> <input type="hidden" name="id"value="<?php echo $book['id']?>"></form> </td>
                    <td><form action="editBook.php" method="POST"><input type="hidden" name="id" value="<?php echo $book['id']?>"/><input type="hidden" name="name" value="<?php echo $name?>"/><button type="submit" class="btn btn-primary" ><i class="bi bi-pencil"></i></button></form></td>
                    <td><form action="deleteBook.php" method="POST"><input type="hidden" name="id" value="<?php echo $book['id']?>"/><input type="hidden" name="name" value="<?php echo $name?>"/>  <button type="submit" class="btn btn-danger" ><i class="bi bi-trash"></i></button></form></td>
                    
                  
            </tr>
        <?php endforeach; ?>
    </table>
<div> <?php echo isset($_POST['search'])? "<div class='d-flex justify-content-center'>
     <a href='javascript:history.back()' class='btn btn-primary col-sm-2 m-4'>Back</a>
    </div>" :"" ?></div>

</div>
<script>
</script>
</body>
</html>
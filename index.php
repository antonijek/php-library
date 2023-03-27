<?php
include "./getFromDatabase.php";

$Err="";
$users = getDataFromBase("users");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach($users as $user){
        if ($_POST['password']===$user["password"] && $_POST["email"]===$user["email"]) {
            header("Location: ./home.php?email=" . $_POST['email']);
        } else {
            $Err = "* Email or password is not correct!";
        }
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
</head>

<body>
<h2 class="text-center m-5 ">Log in</h2>
<div class="container justify-content-center">
   
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-6">
                <input type="text" name="email" class="form-control" id="staticEmail" placeholder="email@example.com" required>

            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-6">
                <input type="password"  name="password"   class="form-control" id="inputPassword" placeholder="Password" required>
                <span style="color:red"> <?php echo $Err;?></span>
            </div>


        </div>

        <div class="mt-5">
            <div class="text-center">
                <button type="submit" class="btn btn-primary col-sm-2 ">Submit</button>
            </div>
            <p class="text-center mb-0">or</p>
            <div class="text-center">
                <a href="./register.php">Register</a>
            </div>
        </div>


    </form>
</div>







</body>
</html>














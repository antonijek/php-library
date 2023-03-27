<?php
include "./getFromDatabase.php";

$Err="";
$users = getDataFromBase("users");


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

<div class="container">
    <form action="storeToBase.php" method="POST" >
    <h2 class="offset-4 mb-4 mt-4">Register</h2>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">First name</label>
            <div class="col-sm-6">
                <input type="text" name="firstName" class="form-control" id="staticEmail" placeholder="First name" required>

            </div>
        </div>

        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Last name</label>
            <div class="col-sm-6">
                <input type="text" name="lastName" class="form-control" id="staticEmail" placeholder="Last name" required>

            </div>
        </div>

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

            </div>


        </div>
        <button type="submit" class="btn btn-primary col-sm-2 offset-6">Submit</button>
    </form>
</div>

</body>
</html>














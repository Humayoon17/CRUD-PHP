<?php
session_start();

if(isset($_SESSION['message']))
{
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>


<!-- Registration Modal -->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">User Registration</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="register.php" method="post">
                        <div class="text">
                            <input type="text" class="form-control mb-3"   placeholder="Name" name="name" >

                            <input type="text" class="form-control mb-3"   placeholder="Last-Name" name="lastname" >

                            <input type="email" class="form-control mb-3"   placeholder="Email" name="email" >

                            <input type="password" class="form-control mb-3"   placeholder="Password" name="password" >

                            <input type="text" class="form-control mb-3"  placeholder="Country" name="country" >

                            <input type="text" class="form-control mb-3"  placeholder="Contact Number" name="number">

                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <i class="fa fa-times"></i>&nbsp; Cancel</button>
                        <button type="submit" class="btn btn-success" name="btnSignUp" >
                            <i class="fa fa-user-plus"></i>
                            Register</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<div class="container">
<div class="header text-center mt-5">
            <h2>Welcome</h2>
        </div>
    <div class="input">
        <div class="msg text-center m-5 text-success">
            <h4>Please sign in </h4>
        </div>
<form class="formlogin" action="checkLogin.php" method="post">
  <div class="form-group row">
    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
    </div>
  </div>
  
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary p-2 w-25" name="btnSignIn"> <i class="fa fa-sign-in-alt"></i> Sign in</button>
        <button type="button" class="btn btn-success p-2 w-25 " data-toggle="modal" data-target="#register">
           <i class="fa fa-user"></i> Sign up
        </button>
    </div>
      <!-- Button trigger modal -->

  </div>
</form>
    </div>
</div>








<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/4bb74af338.js"></script>

</body>
</html>


<?php 
require_once "connect.php";
session_start();

if(!isset($_SESSION['login']))
{
    header("location: login.php");
    exit();
}



if(isset($_SESSION['message']))
{
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}


$userId = null;
$userName = null ;
$userLastname  = null;
$userEmail = null;
$userPassword = null;
$userCountry  = null;
$userPhone = null;
$hideClass = "d-none";
$Page = "insert.php";
$showClass = '';
if(isset($_SESSION['userName']) and isset($_SESSION['userLastName']))
{

    $userId = $_SESSION['userId'];
    $userName = $_SESSION['userName'];
    $userEmail = $_SESSION['userEmail'];
    $userPassword = $_SESSION['userPassword'];
    $userLastname = $_SESSION['userLastName'];
    $userCountry = $_SESSION['userCountry'];
    $userPhone = $_SESSION['userPhone'];
    $showClass = "d-none";
    $hideClass = '';
    $Page = "update.php";
    unset($_SESSION['userId']);
    unset($_SESSION['userName']);
    unset($_SESSION['userEmail']);
    unset($_SESSION['userPassword']);
    unset($_SESSION['userLastName']);
    unset($_SESSION['userCountry']);
    unset($_SESSION['userPhone']);

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
    <title>CRUD</title>
</head>
<body>
<div class="container">
    <div class="formText mt-5  w-100">
        <form method="post" action="<?php echo $Page; ?>">
            <div class="text">
                <input type="text" class="form-control mb-3"   placeholder="Name" name="name" value="<?php echo $userName; ?>">
                
                <input type="text" class="form-control mb-3"   placeholder="Last-Name" name="lastname" value="<?php echo $userLastname; ?>">
                
                <input type="email" class="form-control mb-3"   placeholder="Email" name="email" value="<?php echo $userEmail; ?>">
                
                <input type="password" class="form-control mb-3"   placeholder="Password" name="password" value="<?php echo $userPassword; ?>">
                
                <input type="text" class="form-control mb-3"  placeholder="Country" name="country" value="<?php echo $userCountry; ?>">
                
                <input type="text" class="form-control mb-3"  placeholder="Contact Number" name="number" value="<?php echo $userPhone; ?>">
    
            </div>
            <div class="button  text-right <?php echo $hideClass; ?>" >
                <button value="<?php echo $userId; ?>"  class="btn btn-warning "  name="btnUpdate"><i class="fa fa-edit" ></i> Update</button>
            </div>
            <div class="button text-right <?php echo $showClass; ?>" >
                <button id="btnInsert" class="btn btn-primary btnInsert  " name="btnInsert"><i class="fa fa-plus" ></i> Insert</button>
            </div>
        </form>

    </div>
    <div class="tbl w-100 mt-4">
        <table class="table table-striped d-sm-table table-hover table-responsive " >
            <thead>
            <tr id="tblResult">
                <th>Name</th>
                <th>Last-Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Country</th>
                <th>Phone</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <form action="delete.php" method="post" >
                <?php
                        $sQuery = "SELECT * FROM user";
                        $result = $connect->query($sQuery);
                        $x = 1;
                        while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= ucwords($row['name']); ?></td>
                            <td><?= ucwords($row['lastname']); ?></td>
                            <td><?= ucwords($row['email']); ?></td>
                            <td><?= $row['password']; ?></td>
                            <td><?= ucwords($row['country']); ?></td>
                            <td><?= $row['phone']; ?></td>
                            <td> <button type="submit" name="btnEdit" id="btnEdit" value="<?= $row['user_id']; ?>" 
                             class="btn btn-warning"><i class="fa fa-edit"></i> Edit</button> </td>
                            <td><button type="submit" name="btnDelete" value="<?= $row['user_id']; ?>"
                             class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                            </td>
                        </tr>

                        <?php endwhile; ?>
            </form>
            </tbody>

        </table>
    </div>
 
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/4bb74af338.js"></script>
</body>
</html>

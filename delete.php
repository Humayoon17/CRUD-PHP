<?php 
require_once "connect.php";
session_start();


if(isset($_POST['btnDelete']))
{
    $id = $_POST['btnDelete'];

    $deleteQuery = "DELETE FROM user WHERE user_id = ?";
    $result = $connect->prepare($deleteQuery);
    $result->bind_param("i", $id);
    if($result->execute()){
        $_SESSION ['message'] = "<script> alert('Record successfully deleted') </script>";
        header("location: index.php");
        exit();
    }
    else
    {
        $_SESSION ['message'] = "<script> alert('Something wrong') </script>";
        header("location: index.php");
        exit();
    }
}

if(isset($_POST['btnEdit']))
{
    $id = $_POST['btnEdit'];
    
    $showQuery = "SELECT * FROM user WHERE user_id = $id";
    $result = $connect->query($showQuery);
    while($row = $result->fetch_assoc())
    {
        $_SESSION['userId'] = $row['user_id'];
        $_SESSION['userName'] = $row['name'];
        $_SESSION['userLastName'] = $row['lastname'];
        $_SESSION['userEmail'] = $row['email'];
        $_SESSION['userPassword'] = $row['password'];
        $_SESSION['userCountry'] = $row['country'];
        $_SESSION['userPhone'] = $row['phone'];
        header("location: index.php");
        exit();
    }
    
}

header("location:index.php");
exit();

?>
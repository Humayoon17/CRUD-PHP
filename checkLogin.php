<?php
require_once ("connect.php");
session_start();


if(isset($_POST['btnSignIn']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $checkQuery = "SELECT * FROM user WHERE email = 'admin@yahoo.com' and password = '123'";
    $result = $connect->query($checkQuery);
    var_dump($result);
    if($result)
    {
        while($row = $result->fetch_assoc())
        {
          if($email == $row['email'] && $password == $row['password'])
          {
                $_SESSION['login'] = 'done';
                header("location: index.php");
                exit();
          }
          else{
            $_SESSION['message'] = "<script> alert('Invalid email or password'); </script>";
            header("location:login.php");
            exit();
                }
        }
        
    }
    else{
        $_SESSION['message'] = "<script> alert('Invalid email or password'); </script>";
        header("location:login.php");
        exit();
            }
}
    
header("location: login.php");
exit();
?>
<?php
require_once "connect.php";
session_start();

if(isset($_POST['btnSignUp']))
{
    $name       =    $_POST["name"];
    $lastname   =    $_POST["lastname"];
    $email      =    $_POST['email'];
    $password   =    $_POST['password'];
    $country    =    $_POST["country"];
    $phone      =    $_POST["number"];
    if($name == null || $name == '' || $name == ' ')
    {
        $_SESSION ['message'] = "<script> alert('Please enter your name!') </script>";
        header("location: login.php");
        exit();
    }
    else if ($lastname == null || $lastname == '' || $lastname == ' ')
    {
        $_SESSION ['message'] = "<script> alert('Please enter your lastname!') </script>";
        header("location: login.php");
        exit();
    }
    else if ($email == null || $email == '' || $email == ' ')
    {
        $_SESSION ['message'] = "<script> alert('Please enter your lastname!') </script>";
        header("location: login.php");
        exit();
    }
    else if ($password == null || $password == '' || $password == ' ')
    {
        $_SESSION ['message'] = "<script> alert('Please enter your password!') </script>";
        header("location: login.php");
        exit();
    }
    else if ($country == null || $country == '' || $country == ' ')
    {
        $_SESSION ['message'] = "<script> alert('Please enter your country') </script>";
        header("location: login.php");
        exit();
    }
    else if ($phone == null || $phone == '' || $phone == ' ')
    {
        $_SESSION ['message'] = "<script> alert('Please enter your phone') </script>";
        header("location: login.php");
        exit();
    }
    else {
        $insertQuery = "INSERT INTO user VALUES (NULL, ?, ?, ?, ?, ?, ?)";
        $result = $connect->prepare($insertQuery);
        $result->bind_param("ssssss", $name, $lastname,$email, $password, $country, $phone );

        if($result->execute())
        {
            $_SESSION ['message'] = "<script> alert('User successfully registered') </script>";
            header("location: login.php");
            exit();
        }
        else
        {
            $_SESSION ['message'] = "<script> alert('Something wrong') </script>";
            header("location: login.php");
            exit();
        }
    }
}
header("location: login.php");
exit();
?>

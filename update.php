<?php
require_once "connect.php";
session_start();
if(isset($_POST['btnUpdate']))
{

    $id = $_POST['btnUpdate'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $country = $_POST['country'];
    $number = $_POST['number'];
    if($name == null || $name == '' || $name == ' ')
{
    $_SESSION ['message'] = "<script> alert('Please enter your name!') </script>";
    header("location: index.php");
    exit();
}
else if ($lastname == null || $lastname == '' || $lastname == ' ')
{
    $_SESSION ['message'] = "<script> alert('Please enter your lastname!') </script>";
    header("location: index.php");
    exit();
}
else if ($email == null || $email == '' || $email == ' ')
{
    $_SESSION ['message'] = "<script> alert('Please enter your lastname!') </script>";
    header("location: index.php");
    exit();
}
else if ($password == null || $password == '' || $password == ' ')
{
    $_SESSION ['message'] = "<script> alert('Please enter your password!') </script>";
    header("location: index.php");
    exit();
}
else if ($country == null || $country == '' || $country == ' ')
{
    $_SESSION ['message'] = "<script> alert('Please enter your country') </script>";
    header("location: index.php");
    exit();
}
else if ($number == null || $number == '' || $number == ' ')
{
    $_SESSION ['message'] = "<script> alert('Please enter your phone') </script>";
    header("location: index.php");
    exit();
}
    else {
    $updateQuery = "UPDATE user SET name = ? , lastname = ?, email = ?, password = ? , country = ?, phone = ? WHERE user_id = ?";
    $result = $connect->prepare($updateQuery);
    $result->bind_param("ssssssi",$name, $lastname, $email, $password, $country, $number, $id);
    if($result->execute())
    {
        $_SESSION ['message'] = "<script> alert('Record successfully update') </script>";
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
}
header("location: index.php");
exit();

?>
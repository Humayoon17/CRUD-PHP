<?php

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'crud';

$connect = new mysqli($host, $user, $password, $dbname);

if(!$connect)
{
    echo "Database is not connected successfully!";
}
else
{
    return $connect;
}
header("location:index.php");
exit();
?>
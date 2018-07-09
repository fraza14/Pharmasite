<?php
session_start();
if (isset($_POST["submit"])) {
    include_once 'DBConnect.php';
    
    $email = $_POST['Email address'];
    $password = md5($_POST['Account password']);
    
    $database = new dbConnect();
    
    $db = $database->openConnection();
    
    $sql = "select * customer where email = '$email' and password= '$password'";
    $user = $db->query($sql);
    $result = $user->fetchAll(PDO::FETCH_ASSOC);
    
    $id = $result[0]['CustomerID'];
    $email = $result[0]['Email address'];
    $_SESSION['CustomerID'] = $id;
    
    $database->closeConnection();
    header('location: dashboard.php');
}
?>
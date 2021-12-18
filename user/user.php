<?php
session_start();
if(isset($_POST["submit"])){
    $_SESSION['name'] = $_POST["name"];
    $_SESSION['password'] = $_POST["password"];
    echo $_SESSION['name'].$_SESSION['password'];
}
     
?>
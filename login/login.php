<?php
include("../db/dbconn.php");

session_start();

if(!empty($_SESSION['name']) || !$_SESSION['name'] == ''){
    header('location:user/user.php');
    die();
}

if(isset($_POST["submit"])){
    $email = $_POST["name"];
    $password = $_POST["password"];

    $sql = "SELECT EMAIL,PASSWORD,PERMISSION FROM account where EMAIL = '$email' AND PASSWORD = '$password'";
		$result = mysqli_query($dbconn,$sql);
		if(isset($result)){
			foreach ($result as $key => $value) {
                $_SESSION['name'] = "LoggedIn";
                $_SESSION['password'] = $value['PASSWORD'];
            
                if($value['PERMISSION']=="admin"){
                    header("location:../admin/admin.php");
                }else{
                    header("location:../user/user.php");
                }
			}
        }
}
?>
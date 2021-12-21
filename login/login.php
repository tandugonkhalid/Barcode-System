<?php
include("../db/dbconn.php");

session_start();
if(isset($_POST["submit"])){
    $email = $_POST["name"];
    $password = $_POST["password"];

    // $sql = "SELECT EMAIL,PASSWORD,PERMISSION FROM account where EMAIL = '$email' AND PASSWORD = '$password'";
    // $stmt = sqlsrv_query( $conn, $sql );
    // if( $stmt === false) {
    //     echo "Account does not exist";
    // }else{
    //     while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
    //         $_SESSION['name'] = $row['EMAIL'];
    //         $_SESSION['password'] = $row['PASSWORD'];
    //         // echo $row['EMAIL']." ".$row['PASSWORD']." ".$row['PERMISSION']." exists";

    //         if($row['PERMISSION']=="admin"){
    //             header("location:../admin/admin.php");
    //         }else{
    //             header("location:../user/user.php");
    //         }
    //     }

    //     sqlsrv_free_stmt( $stmt);
    // }

    $sql = "SELECT EMAIL,PASSWORD,PERMISSION FROM account where EMAIL = '$email' AND PASSWORD = '$password'";
		$result = mysqli_query($dbconn,$sql);
		if(isset($result)){
			foreach ($result as $key => $value) {
                $_SESSION['name'] = $value['EMAIL'];
                $_SESSION['password'] = $value['PASSWORD'];
                // echo $value['EMAIL']." ".$value['PASSWORD']." ".$value['PERMISSION']." exists";
            
                if($value['PERMISSION']=="admin"){
                    header("location:../admin/admin.php");
                }else{
                    header("location:../user/user.php");
                }
			}
        }
}
?>
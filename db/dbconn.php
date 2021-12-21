<?php
      // $serverName = "DESKTOP-VNBC0UF\MSSQLSERVER02";
      // $connectionOptions = array("Database"=>"BARCODE_SYSTEM",
      //     "Uid"=>"", "PWD"=>"");
      // $conn = sqlsrv_connect($serverName, $connectionOptions);
      // if($conn){
      //   //   echo "Connected successfully";
      // }else{
      //     echo "Connection unsuccessful";
      //     die(print_r(sqlsrv_errors(), true));
      // }

      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "barcode_system";

      $dbconn = new mysqli($servername, $username, $password, $dbname);
      if ($dbconn->connect_error) {
      die("Connection failed: " . $dbconn->connect_error);
      } 
?>

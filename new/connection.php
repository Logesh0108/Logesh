<?php 
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "login_system";
        $port= 3306;
        $conn = mysqli_connect($servername,$username,$password,$db,$port);
        if(!$conn)
       {	
        die('connecion failed'.mysqli_connect_error());
       }
?>
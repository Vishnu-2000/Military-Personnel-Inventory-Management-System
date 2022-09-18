<?php
        $x=$_POST['Force'];
        $ser="localhost";
        $user="root";
        $pass="";
        $db="project-db";    
        $conn=new mysqli($ser,$user,$pass,$db);
        if($conn->connect_error)
        {
	        die("Connection failed: ".$conn->connect_error);
        }
        echo "Connected Successfully";
        $sql="INSERT INTO `forces`(`Force_Id`,`Armed_Force`) VALUES (NULL,'$x')";
        if($conn->query($sql)===TRUE)
        {
	        echo "New Record created";
        }
        else
        {
	        echo "Error: ".$sql."<br>".$conn->error;
        }
    
?>
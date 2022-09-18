<?php
        include "connection.php";
        $x=$_POST['Force'];
        $sql="INSERT INTO `forces`(`Force_Id`,`Armed_Force`) VALUES (NULL,'$x')";
        if($db->query($sql)===TRUE)
        {
                echo "<script>window.location.href='forces.php';</script>";
	        echo "New Record created";
        }
        else
        {
	        echo "Error: ".$sql."<br>".$conn->error;
        }
    
?>
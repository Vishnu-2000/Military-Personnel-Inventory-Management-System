<?php
        include "connection.php";
        $x=$_POST['place'];
        $y=$_POST['base'];
        $sql="INSERT INTO `place` VALUES (NULL,'$x','$y')";
        if($db->query($sql)===TRUE)
        {
                echo "New Record created";
                echo "<script>
                window.location.href='place.php';
            </script>";
        }
        else
        {
	        echo "Error: ".$sql."<br>".$conn->error;
        }
    
?>
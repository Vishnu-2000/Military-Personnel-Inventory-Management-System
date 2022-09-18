<?php
        include "connection.php";
        $x=$_POST['Eq_type'];
        $sql="INSERT INTO `equipment_type` VALUES (NULL,'$x')";
        if($db->query($sql)===TRUE)
        {
                echo "New Record created";
                echo "<script>
                window.location.href='equipment_type.php';
            </script>";
        }
        else
        {
	        echo "Error: ".$sql."<br>".$db->error;
        }
    
?>
<?php
        include "connection.php";
        $x=$_POST['Company'];
        $y=$_POST['Country'];
        $z=$_POST['Date'];
        $sql="INSERT INTO `supplier_company` VALUES (NULL,'$x','$y','$z')";
        if($db->query($sql)===TRUE)
        {
                echo "New Record created";
                echo "<script>
                window.location.href='supplier_company.php';
            </script>";
        }
        else
        {
	        echo "Error: ".$sql."<br>".$conn->error;
        }
    
?>
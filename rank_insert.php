<?php
        include "connection.php";
        $x=$_POST['Rank'];
        $y=$_POST['Grade'];
        $a=$_POST['Force'];
        
        $temp="SELECT Force_Id FROM Forces WHERE Armed_Force='$a'";
        

        if($res = mysqli_query($db, $temp)){ 
                if(mysqli_num_rows($res) > 0){ 
                        while($row = mysqli_fetch_array($res)){ 
                                $z = $row[0]; 
                        } 
                }    
        }
        $sql="INSERT INTO `rank` VALUES (NULL,'$x','$y','$z')";
        if($db->query($sql)===TRUE)
        {
                echo "New Record created";
                echo "<script>
                window.location.href='rank.php';
            </script>";
        }
        else
        {
	        echo "Error: ".$sql."<br>".$db->error;
        }
    
?>
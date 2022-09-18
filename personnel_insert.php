<?php
        require "connection.php";
        $Fn=$_POST['Fn'];
        $Ln=$_POST['Ln'];
        $Date=$_POST['Date'];
        $Gender=$_POST['Gender'];
        $Pob=$_POST['Pob'];
        $Sal=$_POST['sal'];
        $Place=$_POST['Place'];
        // $Equip=$_POST['Equip'];
        $R_Name=$_POST['R_Name'];
        $Grade=$_POST['Grade']; 
        $a="SELECT Place_ID FROM Place WHERE Place='$Place'";
        $c="SELECT Rank_Id FROM `Rank` WHERE Rank_Name='$R_Name' AND Grade=$Grade";
        if($res = mysqli_query($db, $a)){ 
                if(mysqli_num_rows($res) > 0){ 
                        while($row = mysqli_fetch_array($res)){ 
                                $x = $row[0]; 
                        } 
                }   
        }
        
                if($res = mysqli_query($db, $c)){ 
                if(mysqli_num_rows($res) > 0){ 
                        while($row = mysqli_fetch_array($res)){ 
                            $z = $row[0]; 
                        } 
                }    
        }
        
        $sql="INSERT INTO `personnel` VALUES (NULL,'$Fn','$Ln','$Date','$Gender','$Pob','$Sal','$x','$z')";
        if($db->query($sql)===TRUE){
                echo "New Record created";
                echo "<script>
                window.location.href='personnel.php';
            </script>";
        }
        else
                echo "Error: ".$sql."<br>".$db->error . $Place . $Grade ;
        
    
?>
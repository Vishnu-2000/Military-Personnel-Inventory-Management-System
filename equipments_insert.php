<?php
        $a=$_POST['Equip'];
        $b=$_POST['Date'];
        $com=$_POST['company'];
        $equip=strval($_POST['equipment']);
        $personnel=$_POST['personnel'];
        include "connection.php";
        
        $c="SELECT Supplier_Id FROM supplier_company WHERE Company_Name='$com'";
        $e="SELECT Personnel_Id FROM Personnel Where First_name='$personnel'" ;
        $d="SELECT Equipment_Type_ID FROM Equipment_Type WHERE Equipment_Type='$equip'";

        if($res = mysqli_query($db, $c)){ 
                if(mysqli_num_rows($res) > 0){ 
                        while($row = mysqli_fetch_array($res)){ 
                                $x = $row[0]; 
                        } 
                }    
        }
        
        if($res = mysqli_query($db, $d)){ 
                if(mysqli_num_rows($res) > 0){ 
                        while($row = mysqli_fetch_array($res)){ 
                                $y = $row[0]; 
                        } 
                }    
        }
        if($res = mysqli_query($db, $e)){ 
                if(mysqli_num_rows($res) > 0){ 
                        while($row = mysqli_fetch_array($res)){ 
                                $z = $row[0]; 
                        } 
                }    
        }
        
        $sql="INSERT INTO `equipments` VALUES (NULL,'$a','$b',$x,$y,$z)";
        if($db->query($sql)===TRUE){
                echo "New Record created";
                echo "<script>
                window.location.href='equipments.php';
            </script>";
        }
        else
                echo "Error: ".$sql."<br>".$db->error . $com ;
        
    
?>
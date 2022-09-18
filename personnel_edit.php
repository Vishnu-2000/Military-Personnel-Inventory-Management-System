<?php
    include ("connection.php");
    $pid=$_GET['pid'];
    $fn=$_GET['fn'];
    $ln=$_GET['ln'];
    $dob=$_GET['dob'];
    $sex=$_GET['sex'];
    $pob=$_GET['pob'];
    $sal=$_GET['sal'];
?>
<style>
    
    body{
        background:url('background_image.jpg');
        /* background-color: gold; */
        background-repeat:no-repeat;
        background-size: cover;
        background-position: center;
    
    }
     form{
        box-sizing: border-box;
        background: rgba(0,0,0,0.5);
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        position: absolute; 
        text-align:center;
    
    } 
    h2,h3{
        color:white;
    }
    </style>
    
<!-- <div> -->
<form onsubmit="" method="POST" >
<h2>First Name:</h2>
            <input value="<?php echo $fn;?>" name="Fn">
            <h2>Last Name:</h2>
            <input value="<?php echo $ln;?>" name="Ln">
            <h2>Date Of Birth:</h2>
            <input value="<?php echo $dob;?>" type="date" name="Date">
            <h2>Choose Gender:</h2>
            <input type="radio" name="Gender" value="Male"><label for="Male">Male</label>
            <input type="radio" name="Gender" value="Female"><label for="Female">Female</label>
            <h2>Place of Birth:</h2>
            <input value="<?php echo $pob;?>" name="Pob">
            <h2>Salary :</h2>
            <input value="<?php echo $sal;?>" name="sal">
            <br>
            <!-- <?php   
                echo "<br>";
                echo "<h2>Enter Deployment Place:</h2>";
                $place=$db->query("SELECT DISTINCT * FROM Place");
                $select= '<select name="Place">';
                while($rs = $place->fetch_assoc()){
                    $select.='<option value="'.$rs['Place'].'">'.$rs['Place'].'</option>';
                }

                $select.='</select>';
                echo $select;
                echo "<br>";
                echo "<h2>Enter Rank Of Personnel:</h2>";
                $rank=$db->query("SELECT DISTINCT * FROM rank");
                $select= '<select name="R_Name">';
                while($rs = $rank->fetch_assoc()){
                    $select.='<option value="'.$rs['Rank_Name'].'">'.$rs['Rank_Name'].'</option>';
                }

                $select.='</select>';
                echo $select;
                echo "<h2>Enter Grade:</h2>";
                $rank=$db->query("SELECT DISTINCT * FROM rank");
                $select= '<select name="Grade">';
                while($rs = $rank->fetch_assoc()){
                    $select.='<option value="'.$rs['Grade'].'">'.$rs['Grade'].'</option>';
                }

                $select.='</select>';
                echo $select;
                ?> -->
            <br><br>
            
            <input value="Save" type="submit" name="Save">
</form>
<!-- </div> -->
<?php
    // echo isset($_POST['submit']);
    if(isset($_POST['Save']))
    {
        $fn=$_POST['Fn'];
        $ln=$_POST['Ln'];
        $dob=$_POST['Date'];
        $sex=$_POST['Gender'];
        $pob=$_POST['Pob'];
        $sal=$_POST['sal'];
        // $Place=$_POST['Place'];
        // $R_Name=$_POST['R_Name'];
        // $Grade=$_POST['Grade'];
        // $a="SELECT Place_ID FROM Place WHERE Place='$Place'";
        // $c="SELECT Rank_ID FROM `Rank` WHERE Rank_Name='$R_Name' AND Grade=$Grade";
        // if($res = mysqli_query($db, $a)){ 
        //     if(mysqli_num_rows($res) > 0){ 
        //         while($row = mysqli_fetch_array($res)){ 
        //             $x = $row[0]; 
        //         } 
        //     }   
        // }
        
        // if($res = mysqli_query($db, $c)){ 
        //     if(mysqli_num_rows($res) > 0){ 
        //         while($row = mysqli_fetch_array($res)){ 
        //             $z = $row[0]; 
        //         } 
        //     }    
        // }
        $query="UPDATE personnel SET First_Name='$fn',Last_Name='$ln',Date_Of_Birth='$dob',Sex='$sex',Place_Of_Birth='$pob',Salary='$sal' WHERE Personnel_Id=$pid";
        $data=mysqli_query($db,$query);
        if($data)
        {
            echo "Record Created";
            echo "<script>
                window.location.href='personnel.php';
            </script>";
        }
        else
        {
            // echo "<script>alert();</script>";
            echo "Error".$x;
        }

    }
?>

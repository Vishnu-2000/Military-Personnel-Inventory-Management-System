<?php
    ob_start();
    include ("connection.php");
    // error_reporting(0);
    ob_end_clean();
    $gr=$_GET['gr'];
    $rid=$_GET['rid'];
    $name=$_GET['name'];
    // echo "<link href='style.css' rel='stylesheet'>";
?>
<style>
    
body{
    background:url('background_image.jpg');
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

</style>
<!-- <link href="body_styling.css" rel="stylesheet"> -->
<!-- <div style="positon:fixed; left:50%; margin-left: 40%; margin-top: -300px"> -->
<form id="Form" onsubmit="" method="POST" >
            <h2>Enter Rank Name</h2>
            <input placeholder="Insert Rank Name" name="Rank" value="<?php echo $name;?>">
            <h3>Select Grade</h3>
            <select name="Grade">
                <option >1</option>
                <option >2</option>
                <option >3</option>
                <option >4</option>
                <option >5</option>
            </select>
            <!-- <?php
                
                echo "<h2>Enter Armed Force</h2>";
                $force=$db->query("SELECT DISTINCT * FROM forces");
                $select= '<select name="Force">';
                while($rs = $force->fetch_assoc()){
                    $select.='<option value="'.$rs['Armed_Force'].'">'.$rs['Armed_Force'].'</option>';
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
        $Rank=$_POST['Rank'];
        $Grade=$_POST['Grade'];
        // $force=$_POST['Force_Name'];
        // $temp="SELECT Force_ID FROM Forces WHERE Armed_Force='$force'";
        

        // if($res = mysqli_query($db, $temp)){ 
        //         if(mysqli_num_rows($res) > 0){ 
        //                 while($row = mysqli_fetch_array($res)){ 
        //                         $z = $row[0]; 
        //                 } 
        //         }    
        // }
         $query="UPDATE `rank` SET Rank_Name='$Rank',Grade=$Grade WHERE Rank_Id=$rid";
        $data=mysqli_query($db,$query);
        if($data)
        {
            echo "Record Created";
            echo "<script>
                window.location.href='rank.php';
            </script>";
        }
        else
        {
            echo "<script>alert();</script>";
            echo "Error";
        }

    }
?>

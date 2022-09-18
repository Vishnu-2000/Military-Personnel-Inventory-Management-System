<?php
    ob_start();
    require ("connection.php");
    ob_end_clean();
    // error_reporting(0);
    $fn=$_GET['fn'];
    $fid=$_GET['fid'];
?>
<html>
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

<body>

    <form onsubmit="" method="POST">
            <h2>Enter Name Of Armed Force:</h2>
            <input value="<?php echo $fn;?>" name="Force" id="force">
            <br>
            <input value ="Save" type="submit" name="submit">
</form>
<!-- </div> -->
</body>
</html>
<?php
    // echo isset($_POST['submit']);
    if(isset($_POST['submit']))
    {
        $Force=$_POST['Force'];
        $query="UPDATE Forces SET Armed_Force='$Force' WHERE Force_Id=$fid";
        $data=mysqli_query($db,$query);
        if($data)
        {
            echo "Record Created";
            echo "<script>
                window.location.href='forces.php';
            </script>";
        }
        else
        {
            echo "Error";
        }

    }
?>

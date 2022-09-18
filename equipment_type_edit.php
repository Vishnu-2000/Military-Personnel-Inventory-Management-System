<?php
    ob_start();
    require ("equipment_type.php");
    ob_end_clean();
    // error_reporting(0);
    $etid=$_GET['etid'];
    $et=$_GET['et'];
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
h2{
    color:white;
}
</style>

<!-- <div style="position:absolute; left:50%;z-index:-1; margin-left: 40%; margin-top: -300px"> -->
<form onsubmit="" method="POST" >
<h2>Enter Type Of Equipment:</h2>
            <input value="<?php echo $et;?>" name="Eq_type">
            <br>
            <input value="Save" type="submit" name="Save">
</form>
<!-- </div> -->
<?php
    // echo isset($_POST['submit']);
    if(isset($_POST['Save']))
    {
        $et=$_POST['Eq_type'];
        $query="UPDATE equipment_type SET Equipment_Type='$et' WHERE Equipment_Type_ID=$etid";
        $data=mysqli_query($db,$query);
        if($data)
        {
            echo "Record Created";
            echo "<script>
                window.location.href='equipment_type.php';
            </script>";
        }
        else
        {
            echo "<script>alert();</script>";
            echo "Error";
        }

    }
?>

<?php
    // require ("equipments.php");
    // error_reporting(0);
    include 'connection.php';
    $en=$_GET['en'];
    $doe=$_GET['doe'];
    $eid=$_GET['eid'];

?>
<!-- <link rel='stylesheet' href='body_styling.css'> -->
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

<form id="Form" method ="POST" >
            <h2>Enter Equipment Name:</h2>
            <input type="text" value="<?php echo $en;?>" name="Equip">
            <h2>Select Date Of Equipment:</h2>
            <input value="<?php echo $doe;?>" type="date" name="Date">
            
            <br>
            <br>
            <input name="Save" value="Save" type="submit">
        </form>
<?php
    // echo isset($_POST['submit']);
    if(isset($_POST['Save']))
    {
        $equip=$_POST['Equip'];
        $date=$_POST['Date'];
        $query="UPDATE equipments SET Equipment_Name='$equip',Date_Of_Equipment='$date' WHERE Equipment_ID=$eid";
        $data=mysqli_query($db,$query);
        if($data)
        {
            echo "Record Created";
            echo "<script>
                window.location.href='equipments.php';
            </script>";
        }
        else
        {
            echo "<script>alert();</script>";
            echo "Error";
        }

    }
?>

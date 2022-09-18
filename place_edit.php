<?php
    ob_start();
    include ("place.php");
    // error_reporting(0);
    ob_end_clean();
    $p=$_GET['p'];
    $nb=$_GET['nb'];
    $pid=$_GET['pid'];
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
    
<!-- <div style="positon:fixed; left:50%; margin-left: 40%; margin-top: -300px"> -->
<form onsubmit="" method="POST" >
<h2>Enter A Place:</h2>
            <input value="<?php echo $p;?>" name="place">
            <h2>Enter Nearest Base:</h2>
            <input value="<?php echo $nb;?>" name="base">
            <br>
            <input value="Save" type="submit" name="Save">
</form>
<!-- </div> -->
<?php
    // echo isset($_POST['submit']);
    if(isset($_POST['Save']))
    {
        $place=$_POST['place'];
        $base=$_POST['base'];
        $query="UPDATE place SET Place='$place',Nearest_Base='$base' WHERE Place_Id=$pid";
        $data=mysqli_query($db,$query);
        if($data)
        {
            echo "Record Created";
            echo "<script>
                window.location.href='place.php';
            </script>";
        }
        else
        {
            echo "<script>alert();</script>";
            echo "Error";
        }

    }
?>

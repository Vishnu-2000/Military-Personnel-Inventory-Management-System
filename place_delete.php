<?php
    require ("connection.php");
    error_reporting(0);
    $pid=$_GET['pid'];
    $query="DELETE FROM place WHERE Place_Id='$pid'";
    $data=mysqli_query($db,$query);
    if($data)
    {
        echo "Record Deleted";
        echo "<script>
                window.location.href='place.php';
            </script>";
    }
    else
    {
        die ("Error".$db->connect_error);
    }
?>
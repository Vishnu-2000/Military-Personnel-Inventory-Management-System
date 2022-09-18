<?php
    require ("connection.php");
    error_reporting(0);
    $fid=$_GET['fid'];
    $query="DELETE FROM forces WHERE Force_ID='$fid'";
    $data=mysqli_query($db,$query);
    if($data)
    {
        echo "Record Deleted";
        echo "<script>
                window.location.href='forces.php';
            </script>";
    }
    else
    {
        die ("Error".$db->connect_error);
    }
?>
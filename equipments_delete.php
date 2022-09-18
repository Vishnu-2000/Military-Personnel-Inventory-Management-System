<?php
    require ("connection.php");
    error_reporting(0);
    $eid=$_GET['eid'];
    $query="DELETE FROM Equipments WHERE Equipment_ID='$eid'";
    $data=mysqli_query($db,$query);
    if($data)
    {
        echo "Record Deleted";
        echo "<script>
                window.location.href='equipments.php';
            </script>";
    }
    else
    {
        die ("Error".$db->connect_error);
    }
?>
<?php
    require ("equipment_type.php");
    // error_reporting(0);
    $etid=$_GET['etid'];
    $query="DELETE FROM equipment_type WHERE Equipment_Type_ID=$etid";
    $data=mysqli_query($db,$query);
    if($data)
    {               
        echo "Record Deleted";
        echo "<script>
                window.location.href='equipment_type.php';
            </script>";
    }
    else
    {
        die ("Error".$db->connect_error);
    }
?>
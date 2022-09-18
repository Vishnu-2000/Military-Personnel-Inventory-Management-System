<?php
    require ("connection.php");
    error_reporting(0);
    $sid=$_GET['sid'];
    $query="DELETE FROM supplier_company WHERE Supplier_Id='$sid'";
    $data=mysqli_query($db,$query);
    if($data)
    {
        // echo "Record Deleted";
        echo "<script>
                window.location.href='supplier_company.php';
            </script>";
    }
    else
    {
        die ("Error".$db->connect_error);
    }
?>
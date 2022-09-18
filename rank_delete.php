<?php
    require ("connection.php");
    error_reporting(0);
        $rid=$_GET['rid'];
        $query="DELETE FROM `rank` WHERE Rank_Id='$rid'";
        $data=mysqli_query($db,$query);
    
    if($data)
    {               
        echo "Record Deleted";
        echo "<script>
                window.location.href='rank.php';
            </script>";
    }
    else
    {
        die ("Error".$db->connect_error);
    }
?>
<script>window.history.forward();
function logout()
        {
            
            // window.location.reload();
            window.history.forward();
            window.location.href="logout.php";
        }
</script>
<link href="header.css" rel="stylesheet">  
<?php
    include "header.php";
    session_start();
    echo "<h2 style='text-align:center;color:blue'>Welcome ".$_SESSION['fn']." ".$_SESSION['ln']."!!</h2>";
?>
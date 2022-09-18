<?php 
    
    session_start();
    unset($_SESSION['id']);
    unset($_SESSION['fn']);
    unset($_SESSION['ln']);
    unset($_SESSION['un']);
    session_destroy();
    echo "Thank You";
    echo "<script>window.history.forward(1);</script>";
?>

<a href="admin_login.php">Leave Page?</a>
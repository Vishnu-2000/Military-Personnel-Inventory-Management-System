<?php
    ob_start();
    include ("connection.php");
    ob_end_clean();
    // error_reporting(0);
    $sid=$_GET['sid'];
    $com=$_GET['com'];
    $con=$_GET['con'];
    $dos=$_GET['dos'];
?>
<!-- <link rel="stylesheet" href="main.css"> -->
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
<form onsubmit="" method="POST">
<h2>Enter Company Name:</h2>
            <input value="<?php echo $com;?>" name="Company">
            <h2>Country Of Origin:</h2>
            <input value="<?php echo $con;?>" name="Country">
            <h2>Select Date Of Equipment:</h2>
            <input value="<?php echo $dos;?>" name="Date" type="date">
            <br>
            <input value="Save" type="submit" name="Save">
</form>

<?php
    // echo isset($_POST['submit']);
    if(isset($_POST['Save']))
    {
        $company=$_POST['Company'];
        $date=$_POST['Date'];
        $country=$_POST['Country'];
        $query="UPDATE supplier_company SET Company_Name='$company',Date_Of_Supply='$date',Country='$country' WHERE Supplier_Id=$sid";
        $data=mysqli_query($db,$query);
        if($data)
        {
            echo "Record Created";
            echo "<script>
                window.location.href='supplier_company.php';
            </script>";
        }
        else
        {
            
            echo "Error";
        }

    }
?>

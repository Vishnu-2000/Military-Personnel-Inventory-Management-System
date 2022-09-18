<?php
    session_start();
    if(!isset($_SESSION['un']) && !isset($_SESSION['psw']))
        {
          header('location:admin_login.php');  
        }
        else{
            include "header.php";
            include "connection.php";
        }
?>
        <title>Supplier Company Info</title>
        <script type="text/javascript" src="supplier_company_insert.js"></script>
        <script>
                        window.history.forward();
        function show()
        {
            document.getElementById("Form").classList.toggle("display"); 
        }
        </script>
        <style>
            .display{
                visibility:visible;
            }
        </style>
        <?php
             $sql="SELECT * FROM `supplier_company`";
            $res=$db->query($sql);
            if($res->num_rows>0)
            {
                echo "<div class='Table'>";
                echo "<table ><tr><th>Supplier_Id</th><th>Company Name</th><th>Country</th><th>Date Of Supply</th></tr>";
                // echo "The requested query is: ".$row["fname"];
                while($row=$res->fetch_assoc())
                {
                    echo "<tr><td>".$row["Supplier_Id"]."</td><td>".$row["Company_Name"]."</td><td>".$row["Country"]."</td><td>".$row["Date_Of_Supply"]."</td>
                    <td><a href='supplier_company_edit.php?sid=$row[Supplier_Id]&com=$row[Company_Name]&con=$row[Country]&dos=$row[Date_Of_Supply]'><button name='Edit'>&#9998;Edit</button></a></td>
                    <td><a href='supplier_company_delete.php?sid=$row[Supplier_Id]'><button name='Delete'>&#10060;Delete</button></a></td></tr>";
                }
            }
            echo "</table></div>";
             
        ?>
        <div id="but">
        <button class="But" onclick="show()" >Add Values</button>
        </div>
        <form id="Form" onsubmit="return buttononclick()" action="supplier_company_insert.php" method ="POST" >
            <h2>Enter Company Name:</h2>
            <input type="text" placeholder="Insert Company Name" name="Company">
            <h2>Country Of Origin:</h2>
            <input type="text" placeholder="Insert Country Name"name="Country">
            <h2>Select Date Of Equipment:</h2>
            <input placeholder="Insert Date of Equipment" name="Date" type="date">
            <br>
            <input placeholder="Submit" type="submit">
        </form>
        
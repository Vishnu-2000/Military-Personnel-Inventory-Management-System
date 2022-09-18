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
    <titel>Equipments Info</title>
        <script type="text/javascript" src="equipments_insert.js"></script>
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
            $sql="SELECT * FROM `equipments`";
            $res=$db->query($sql);
            if($res->num_rows>0)
            {
                echo "<div class='Table'>";
                echo "<table ><tr><th>Equipment_ID</th><th>Equipment_Name</th><th>Date_Of_Equipment</th><th>Supplier_ID</th><th>Equipment_Type_ID</th><th>Personnel_Id</th></tr>";
                // echo "The requested query is: ".$row["fname"];
                while($row=$res->fetch_assoc())
                {
                    echo "<tr><td>".$row["Equipment_ID"]."</td>
                    <td>".$row["Equipment_Name"]."</td><td>".$row["Date_Of_Equipment"]."</td>
                    <td>".$row["Supplier_ID"]."</td><td>".$row["Equipment_Type_ID"]."</td>
                    <td>".$row["Personnel_Id"]."</td>
                    <td><a href='equipments_edit.php?eid=$row[Equipment_ID]&en=$row[Equipment_Name]&doe=$row[Date_Of_Equipment]'><button name='Edit'>&#9998;Edit</button></a></td>
                    <td><a href='equipments_delete.php?eid=$row[Equipment_ID]'><button name='Delete'>&#10060;Delete</button></a></td>
                    </tr>";
                }
            }
            echo "</table></div><br>";             
        ?>
        <div id="but">
        <button class="But" onclick="show()" >Add Values</button>
        </div>
        <form id="Form" onsubmit="return buttononclick()" action="equipments_insert.php" method ="POST" >
            <h2>Enter Equipment Name:</h2>
            <input type="text" placeholder="Insert an Equipment" name="Equip">
            <h2>Select Date Of Equipment:</h2>
            <input placeholder="Date of Equipment" type="date" name="Date">
            <?php
                
                if ($db->connect_error) {
                    die("Connection failed: " . $db->connect_error);
                }
                //echo "Connected successfully";
                // echo "<br>";
                
                echo "<br>";
                echo "<h2>Select Company Name:</h2>";
                $place=$db->query("SELECT * FROM supplier_company");
                $select= '<select name="company">';
                while($rs = $place->fetch_assoc()){
                    $select.='<option value="'.$rs['Company_Name'].'">'.$rs['Company_Name'].'</option>';
                }

                $select.='</select>';
                echo $select;
                echo "<br>";

                echo "<h2>Select Equipment Type:</h2>";
                $force=$db->query("SELECT * FROM equipment_type");
                $select= '<select name="equipment">';
                while($rs = $force->fetch_assoc()){
                    $select.='<option value="'.$rs['Equipment_Type'].'">'.$rs['Equipment_Type'].'</option>';
                }

                $select.='</select>';
                echo $select;
                echo "<br>";

                echo "<h2>Select Personnel:</h2>";
                $per=$db->query("SELECT * FROM personnel");
                $select= '<select name="personnel">';
                while($rs = $per->fetch_assoc()){
                    $select.='<option value="'.$rs['First_Name'].'">'.$rs['First_Name'].'</option>';
                }

                $select.='</select>';
                echo $select;
                ?>
            <br>
            <input placeholder="Submit" type="submit">
        </form>
    
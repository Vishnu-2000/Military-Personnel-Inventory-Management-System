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
<!-- <link rel="stylesheet" href="style.css"> -->
<html>
<head>
<style>
</style>
</head>
<body>
        <title>Personnel Info</title>
        <script type="text/javascript" src="personnel_insert.js"></script>
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
            $sql="SELECT * FROM `personnel`";
            $res=$db->query($sql);
            if($res->num_rows>0)
            {   
                echo "<div class='Table'>";
                echo "<table ><tr><th>First Name</th><th>Last Name</th><th>Date Of Birth</th><th>Sex</th><th>Place Of Birth</th><th>Salary</th></tr>";
                while($row=$res->fetch_assoc())
                {
                    echo "<tr><td>".$row["First_Name"]."</td>
                    <td>".$row["Last_Name"]."</td>
                    <td>".$row["Date_Of_Birth"]."</td>
                    <td>".$row["Sex"]."</td>
                    <td>".$row["Place_Of_Birth"]."</td>
                    <td>".$row["Salary"]."</td>
                    <td><a href='personnel_edit.php?pid=$row[Personnel_Id]&fn=$row[First_Name]&ln=$row[Last_Name]&dob=$row[Date_Of_Birth]&sex=$row[Sex]&pob=$row[Place_Of_Birth]&sal=$row[Salary]'><button name='Edit'>&#9998;Edit</button></a></td>
                    <td><a href='personnel_delete.php?pid=$row[Personnel_Id]'><button name='Delete'>&#10060;Delete</button></a></td>
                    </tr>";
                }
            }
            echo "</table></div>";
        ?>
        </div>
        <div id="but">
        <button class="But" onclick="show()" >Add Values</button>
        </div >
        <div class="Div">
        <form id="Form" onsubmit="return buttononclick()" action="personnel_insert.php" method="POST" >
            <h2>First Name:</h2>
            <input type="text" placeholder="Enter First Name" name="Fn">
            <h2>Last Name:</h2>
            <input type="text" placeholder="Enter Last Name" name="Ln">
            <h2>Date Of Birth:</h2>
            <input placeholder="Enter Date" type="date" name="Date">
            <h2>Choose Gender:</h2>
            <input type="radio" name="Gender" value="Male"><label for="Male" >Male</label>
            <input type="radio" name="Gender" value="Female"><label for="Female">Female</label>
            <h2>Place of Birth:</h2>
            <input type="text" placeholder="Enter Birthplace" name="Pob">
            <h2>Salary :</h2>
            <input type="text" placeholder="Enter Salary" name="sal">
            <br>
            <?php
               
                echo "<br>";
                echo "<h2>Enter Deployment Place:</h2>";
                $place=$db->query("SELECT DISTINCT * FROM Place");
                $select= '<select name="Place">';
                while($rs = $place->fetch_assoc()){
                    $select.='<option value="'.$rs['Place'].'">'.$rs['Place'].'</option>';
                }

                $select.='</select>';
                echo $select;
                echo "<br>";
                echo "<h2>Enter Rank Of Personnel:</h2>";
                $rank=$db->query("SELECT DISTINCT * FROM rank");
                $select= '<select name="R_Name">';
                while($rs = $rank->fetch_assoc()){
                    $select.='<option value="'.$rs['Rank_Name'].'">'.$rs['Rank_Name'].'</option>';
                }

                $select.='</select>';
                echo $select;
                echo "<h2>Enter Grade:</h2>";
                $rank=$db->query("SELECT DISTINCT * FROM rank");
                $select= '<select name="Grade">';
                while($rs = $rank->fetch_assoc()){
                    $select.='<option value="'.$rs['Grade'].'">'.$rs['Grade'].'</option>';
                }

                $select.='</select>';
                echo $select;
                ?>
            <br>
            <input type="submit" placeholder="Submit">
            
        </form>
            </div>
            </body> 
    </html>
            }
    }
?>
   







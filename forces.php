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
        <title>Forces Info</title>
        <script type="text/javascript" src="force_insert.js">
            
        </script>
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
            $sql="SELECT * FROM `forces`";
            $res=$db->query($sql);
            if($res->num_rows>0)
            {
                echo "<div class='Table'>";
                echo "<table><tr><th>Force_ID</th><th>Armed Force</th></tr>";
                // echo "The requested query is: ".$row["fname"];
                while($row=$res->fetch_assoc())
                {
                    echo "<tr><td>".$row["Force_Id"]."</td><td>".$row["Armed_Force"]."</td>
                    <td><a href='forces_edit.php?fn=$row[Armed_Force]&fid=$row[Force_Id]'><button name='Edit'>&#9998;Edit</button></a></td>
                    <td><a href='forces_delete.php?fid=$row[Force_Id]'><button name='Delete'>&#10060;Delete</button></a></td>
                    </tr>";
                    
                }
            }
            echo "</table></div>";
             
        ?>
        <div id="but">
        <button class="But" onclick="show()" >Add Values</button>
        </div>
        <form id="Form" onsubmit="return buttononclick()" action="forces_insert.php" method="POST" >
            <h2>Enter Name Of Armed Force:</h2>
            <input type="text" placeholder="Insert a Force" name="Force" id="force">
            <br>
            <input type="submit" placeholder="Submit" name="sub">
        </form>


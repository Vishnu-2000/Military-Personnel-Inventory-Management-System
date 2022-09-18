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
        <title>Equipment Type Info</title>
        <script type="text/javascript" src="equipment_type_insert.js"> </script>
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
            // include "connection.php";
            $sql="SELECT * FROM `equipment_type`";
            $res=$db->query($sql);
            if($res->num_rows>0)
            {
                echo "<div class='Table'>";
                echo "<table ><tr><th>Equipment_Type_ID</th><th>Equipment_Type</th></tr>";
                // echo "The requested query is: ".$row["fname"];
                while($row=$res->fetch_assoc())
                {
                    echo "<tr><td>".$row["Equipment_Type_ID"]."</td><td>".$row["Equipment_Type"]."</td><td><a href='equipment_type_edit.php?etid=$row[Equipment_Type_ID]&et=$row[Equipment_Type]'><button name='Edit'>&#9998;Edit</button></a></td><td><a href='equipment_type_delete.php?etid=$row[Equipment_Type_ID]'><button name='Delete'>&#10060;Delete</button></a></td></tr>";
                }
            }
            echo "</table></div>";
        ?>
        <br>
        <div id="but">
        <button class="But" onclick="show()" >Add Values</button>
        </div>
        <form id="Form" onsubmit="return buttononclick()" action="equipment_type_insert.php" method="POST" >
            <h2>Enter Type Of Equipment:</h2>
            <input type="text" placeholder="Insert Equipment Type" name="Eq_type">
            <br>
            <input placeholder="Submit" type="submit">
        </form>
        
    </body>
</html>
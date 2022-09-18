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
        <title>Place Info</title>
        <script type="text/javascript" src="place_insert.js"> </script>
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
            $sql="SELECT * FROM `place`";
            $res=$db->query($sql);
            if($res->num_rows>0)
            {
                echo "<div class='Table'>";
                echo "<table ><tr><th>Place_Id</th><th>Place</th><th>Nearest Base</th></tr>";
                // echo "The requested query is: ".$row["fname"];
                while($row=$res->fetch_assoc())
                {
                    echo "<tr><td>".$row["Place_Id"]."</td><td>".$row["Place"]."</td><td>".$row["Nearest_Base"]."</td><td><a href='place_edit.php?pid=$row[Place_Id]&p=$row[Place]&nb=$row[Nearest_Base]'><button name='Edit'>&#9998;Edit</button></a></td><td><a href='place_delete.php?pid=$row[Place_Id]'><button name='Delete'>&#10060;Delete</button></a></td></tr>";
                }
            }
            echo "</table></div>";
             
        
        ?>
        <br>
        <div id="but">
        <button class="But" onclick="show()" >Add Values</button>
        </div>
        <form id="Form"onsubmit="return buttononclick()" action="place_insert.php" method="POST" >
            <h2>Enter A Place:</h2>
            <input type="text" placeholder="Input a Place" name="place">
            <h2>Enter Nearest Base:</h2>
            <input type="text" placeholder="Input Nearest Base" name="base">
            <br>
            <input type="submit" placeholder="Submit">
        </form>
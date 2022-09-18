<?php session_start();
    if(!isset($_SESSION['un']) && !isset($_SESSION['psw']))
        {
          header('location:admin_login.php');  
        }
        else{
            include "header.php";
            include "connection.php";
        }
        ?>
        <title>Rank Info</title>
<script type="text/javascript" src="rank_insert.js"></script>
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
           echo "<br>";
            $sql="SELECT * FROM `rank`";
            $res=$db->query($sql);
            if($res->num_rows>0)
            {
                echo "<div class='Table'>";
                echo "<table ><tr><th>Rank_ID</th><th>Rank_Name</th><th>Grade</th><th>Force ID</th></tr>";
                while($row=$res->fetch_assoc())
                {
                    echo "<tr><td>".$row["Rank_Id"]."</td><td>".$row["Rank_Name"]."</td><td>".$row["Grade"]."</td><td>".$row["Force_Id"]."</td><td><a href='rank_edit.php?rid=$row[Rank_Id]&name=$row[Rank_Name]&gr=$row[Grade]&'><button name='Edit'>&#9998;Edit</button></a></td><td><a href='rank_delete.php?rid=$row[Rank_Id]&gr=$row[Grade]&'><button name='Delete'>&#10060;Delete</button></a></td></tr>";
                }
            }
            echo "</table></div>";
        ?>
        <div id="but">
        <button class="But" onclick="show()" >Add Values</button>
        </div>
        <div class="Div">
        <form id="Form" onsubmit="return buttononclick()" action="rank_insert.php" method="POST" >
            <h2>Enter Rank Name</h2>
            <input type="text" placeholder="Insert Rank Name" name="Rank">
            <h3>Select Grade</h3>
            <select name="Grade">
                <option >1</option>
                <option >2</option>
                <option >3</option>
                <option >4</option>
                <option >5</option>
            </select>
            <?php
                
                echo "<h2>Enter Armed Force</h2>";
                $force=$db->query("SELECT DISTINCT * FROM forces");
                $select= '<select name="Force">';
                while($rs = $force->fetch_assoc()){
                    $select.='<option value="'.$rs['Armed_Force'].'">'.$rs['Armed_Force'].'</option>';
                }

                $select.='</select>';
                echo $select;

            ?>
            <br>
            <input placeholder="Submit" type="submit">
            
        </form>
            </div>
    
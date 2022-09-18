<?php
    include "connection.php";
    echo "<link href='main.css' rel='stylesheet'>";
    session_start();
    //  echo "Hello ".$_SESSION['ulfn']." " .$_SESSION['ulln'];
?><style>
    .show-details input:hover{
        background-color:silver;
        cursor:pointer;
        width:250px;
        height:60px;    
    }
    .show-details input{
        width:200px;
        height:50px;
        background-color:blue;
        font-size:18px;
        padding:10px;
        border-radius:30px;
        transition: 0.5s;
    }
    .btn{
        float:right;
        height:30px;
        width:100px;
        font-size:15px;
        border-radius:15px;
        background-color:
    }
</style>
<script>
    window.history.forward();
    function logout(){
        window.location.href="user_login.php";
    }
</script>
<div class="page">
    <button class="btn" onclick="logout()">Logout</button>
<div class="details-container">
<form class="show-details" action="" method="POST">
<input  type="submit" value="Personal Details" name="cdet">
<input  type="submit" value="Place & Nearest Base" name="place">
<input  type="submit" value="Rank" name="Rank" >
<input  type="submit" value="Equipments Allotted" name="Equip" >
</form>
</div>

<?php
    echo "<h2 style='text-align:center;color:white'>Welcome ".$_SESSION['ulfn']." ".$_SESSION['ulln']."!!</h2>";
    if(isset($_POST['cdet'])){
        $sql="SELECT First_Name,Last_Name,Date_Of_Birth,Sex,Place_Of_Birth,Salary FROM personnel where First_Name='$_SESSION[ulfn]' AND Last_Name='$_SESSION[ulln]'";
            $res=$db->query($sql);
            if($res->num_rows>0)
            {
                while($row=$res->fetch_assoc()){
                echo "<table ><tr><td>First Name :</td><td>".$row['First_Name']."</td></tr>
                <tr><td>Last Name :</td><td>".$row['Last_Name']."</td></tr>
                <tr><td>Date Of Birth :</td><td>".$row['Date_Of_Birth']."</td></tr>
                <tr><td>Sex :</td><td>".$row['Sex']."</td>
                <tr><td>Birth Place :</td><td>".$row['Place_Of_Birth']."</td>
                <tr><td>Salary :</td><td>".$row['Salary']."</td>
                </tr>";
                }
            }
            echo "</table>";
    }
    if(isset($_POST['Rank'])){
            // echo $_SESSION['ulfn'];
            $sql="SELECT *
            FROM personnel P,`rank` R 
            where (P.First_Name='$_SESSION[ulfn]' AND P.Last_Name='$_SESSION[ulln]')
            AND P.Rank_ID=R.Rank_Id";
            $res=$db->query($sql);
            if($res->num_rows>0)
            {
                while($row=$res->fetch_assoc()){
                echo "<table ><tr><td>First Name :</td><td>".$row['First_Name']."</td></tr>
                <tr><td>Last Name :</td><td>".$row['Last_Name']."</td></tr>
                <tr><td>Rank :</td><td>".$row['Rank_Name']."</td></tr>
                <tr><td>Grade :</td><td>".$row['Grade']."</td>
                </td></tr>";
                }
            }
            echo "</table>";
    }
    if(isset($_POST['place'])){
        $sql="SELECT P.First_Name,P.Last_Name,Pl.Place,Pl.Nearest_Base 
            FROM personnel P,place Pl 
            where (P.First_Name='$_SESSION[ulfn]' AND P.Last_Name='$_SESSION[ulln]')
            AND P.Place_Id=Pl.Place_Id";
            $res=$db->query($sql);
            if($res->num_rows>0)
            {
                while($row=$res->fetch_assoc()){
                echo "<table ><tr><td>First Name :</td><td>".$row['First_Name']."</td></tr>
                <tr><td>Last Name :</td><td>".$row['Last_Name']."</td></tr>
                <tr><td>Place :</td><td>".$row['Place']."</td></tr>
                <tr><td>Nearest Base :</td><td>".$row['Nearest_Base']."</td>
                </td></tr>";
                }
            }
            echo "</table>";
    }
    
    if(isset($_POST['Equip'])){
        //  $sql="SELECT P.First_Name,P.Last_Name
        //     FROM personnel P,equipments E,equipment_type ET,supplier_company S 
        //     where (P.First_Name='$_SESSION[ulfn]') AND (P.Last_Name='$_SESSION[ulln]')
        //     AND (E.Personnel_Id=P.Personnel_Id) AND (ET.Equipment_Type_ID=E.Equipment_Type_ID) AND (S.Supplier_Id=E.Supplier_ID)";
            
            $sql="SELECT * 
                FROM PERSONNEL P,Equipments E,Equipment_type ET,supplier_company S
                where P.First_Name='$_SESSION[ulfn]' and P.Last_Name='$_SESSION[ulln]'";
                // and E.Personnel_Id=P.Personnel_Id ";
                // -- and E.Equipment_Type_ID=ET.Equipment_Type_ID
                // ";
                // -- and E.Supplier_ID=S.Supplier_Id";
            $res=$db->query($sql);
            if($res->num_rows>0)
            {
                while($row=$res->fetch_assoc()){
                echo "<table ><tr><td>First Name :</td><td>".$row['First_Name']."</td></tr>
                <tr><td>Last Name :</td><td>".$row['Last_Name']."</td></tr>
                <tr><td>Equipment Allotted :</td><td>".$row['Equipment_Name']."</td></tr>
                <tr><td>Date Of Equipment :</td><td>".$row['Date_Of_Equipment']."</td>
                <tr><td>Supplier :</td><td>".$row['Company_Name']."</td>
                <tr><td>Country :</td><td>".$row['Country']."</td>
                <tr><td>Date Of Supply :</td><td>".$row['Date_Of_Supply']."</td>

                </td></tr>";
                }
            }
            echo "</table>";
    }
?>

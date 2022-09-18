<?php
    include ("connection.php");
    error_reporting(0);
?>
<title>Admin Login</title>
<script>
    window.history.forward();
    function validate()
    {
        var un=document.getElementsByName("un")[0];
        var psw=document.getElementsByName("psw")[0];
        if(un.value.trim()=="")
        {
            un.style.border="1px solid red";
            document.getElementsByTagName('span')[0].style.visibility='visible';
            return false;
        }
        else if(psw.value.trim()=="")
        {
            psw.style.border="1px solid red";
            document.getElementsByTagName('span')[0].style.visibility='visible';
            return false;
        }
        return true;

    }
</script>
<style>
    body{
    background: url('mountain.jpg');
    font-family: sans-serif;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat; 
}
span{
    color:red;
    visibility:hidden;
}
form{
    height: 500px;
    width:500px;
    color: blue;
    box-sizing: border-box;
    background: white;
    background:rgba(0,0,0,0.2);
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    position: absolute;
    text-align:center
}
h2{
    color:white;
}
form input[type="text"],[type="password"]
{
    border: 2px black solid;
    height: 40px;
    width: 80%;
    border-radius: 5px;
    text-align:center;
    transition:0.5s;
    border:none;
}
form input[type="text"]:hover,[type="password"]:hover
{
    width:90%;
    height: 40px;
    font-size:20px;
    cursor: pointer;
}
form input[type="submit"]
{
    padding: 5px 5px 5px 5px;
    margin-top: 30px;
    font-size:20px;
    width: 60%;
    height: 35px;
    background-color: blue;
    color: white;
    border-radius: 10px;
    border:  none ;
    transition: 0.5s;
}
form input[type="submit"]:hover{
    width:70%;
    height: 40px;
    font-size:25px;
    cursor: pointer;
}
</style>
<div class="container">
<form action="" method="POST">
<h2>Enter User Name :</h2>
<input  type="text" placeholder="User Name" name="un">
<h2>Password :</h2>
<input  type="password" placeholder="Password" name="psw">
<br><br>
<input  onclick="return validate()"value="Login" name="login" type="submit" >
<br>
</form>

</div>
<?php
    
    if(isset($_POST['login']))
    {
        session_start();
        $un=$_POST['un'];
        $psw=$_POST['psw'];
        $sql="SELECT * From admin_login where `UserName`='$un' and `Password`=$psw";
        $res=$db->query($sql);
        if($res->num_rows==1)
        {
                // echo "<table style='margin-left:auto;margin-right:auto;text-align:center' border=2><tr><th>Personnel_ID</th><th>First Name</th><th>Last Name</th><th>Date Of Birth</th><th>Sex</th><th>Place Of Birth</th><th>Place ID</th><th>Rank ID</th></tr>";
                // echo "The requested query is: ".$row["fname"];
            $row=$res->fetch_assoc();
            $_SESSION['id']=$row['Admin_Login_Id'];
            $_SESSION['fn']=$row['First_Name'];
            $_SESSION['ln']=$row['Last_Name'];
            $_SESSION['un']=$row['UserName'];
            if(isset($row['UserName']) && isset($row['Password'])) { 
                header('location:home.php');
            }
            
        }
        else{
            echo "<script>
            var x = document.createElement('SPAN');
            var t = document.createTextNode('Invalid username or password.');
            x.appendChild(t);
            document.getElementsByTagName('form')[0].appendChild(x);
            
            </script>";
        }
    }
     
?>
<?php
    include ("connection.php");
    
?>
<title>User Login</title>
<script>
    window.history.forward();
    function reg()
    {
        document.getElementsByClassName("register")[0].classList.toggle("show");
        document.getElementsByClassName("login")[0].classList.toggle("hide");
    }
    function validate()
    {
        var un=document.getElementsByName("ulun")[0];
        var psw=document.getElementsByName("ulpsw")[0];
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
    color:white;
    background: url('mountain.jpg');
    font-family: sans-serif;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat; 
}
.container{
    height:500px;
    width:500px;
    box-sizing: border-box;
    background: rgba(0,0,0,0.5);
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    position: absolute;
    text-align:center

}
a{
    color:white;
}
.login{
    float:left;
    background-color:red;
    height: 500px;
    width:500px;
    
    box-sizing: border-box;
    background: transparent;
    position:relative;
    margin-right:40px;
}
::-webkit-scrollbar{
    width:0px;
    background:transparent;
}
.register{
    float:left;
    /* background-color:yellow; */
    height: 500px;
    width:500px;
    position:fixed;
    box-sizing: border-box;
    background: transparent;
    overflow:scroll;
    visibility:hidden;
}
.hide{
    visibility:hidden;
}
.show{
    visibility:visible;
}
h2{
    color:white;
    
}
form input[type="text"],[type="password"]
{
    border:1px solid green ;
    height: 30px;
    width: 60%;
    text-align:center;
    border-radius: 5px;
    transition: 0.5s;
    /* text-align:center; */
}
span{
    color:red;
    visibility:hidden;
}
form input[type="text"]:hover,[type="password"]:hover{
    width: 70%;
    height:40px;
    font-size: 25px;
    cursor: pointer;
}
form input[type="submit"]
{
    padding: 5px 5px 5px 5px;
    margin-top: 30px;
    font-size:20px;
    width: 50%;
    text-align:center;
    height: 35px;
    background-color: blue;
    color: white;
    border-radius: 10px;
    border: none ;
    transition: 0.5s;
}
form input[type="submit"]:hover{
    width: 60%;
    height:40px;
    font-size: 25px;
    cursor: pointer;
}
</style>
<div class="container">
<div class="login">
<form action="" method="POST">
<h2>Enter User Name :</h2>
<input  type="text" placeholder="User Name" name="ulun">
<h2>Password :</h2>
<input  type="password" placeholder="Password" name="ulpsw">
<!-- <br><br> -->
<input  onclick="return validate()"value="Login" name="login" type="submit" ><br><br>
No account?
<a href="#" onclick="reg()">Register Now</a>
<br>
 </form>
</div>
<div class="register">
<form action="" method="POST">
<h2>First Name :</h2>
<input  type="text" placeholder="First Name" name="usfn">
<h2>Last Name :</h2>
<input  type="text" placeholder="Last Name" name="usln">
<h2>User Name :</h2>
<input  type="text" placeholder="User Name" name="usun">
<h2>Password :</h2>
<input  type="password" placeholder="Password" name="uspsw">
<h2>Confirm Password :</h2>
<input  type="password" placeholder="Password" name="uscpsw">

<!-- <br> -->
<input  value="Register" name="signup" type="submit" >
</form>
<br>
Have an account?<a href="#" onclick="reg()">Login</a>
</div>

</div>

<?php
    
    if(isset($_POST['login']))
    {
        session_start();
        $un=$_POST['ulun'];
        $psw=$_POST['ulpsw'];
        $enc_psw=md5($psw);
        echo $enc_psw;
        $sql="SELECT * From candidate_login where `UserName`='$un' and `Password`='$enc_psw'";
        $res=$db->query($sql);
        if($res->num_rows==1)
        {
            $row=$res->fetch_assoc();
            $_SESSION['ulid']=$row['Candidate_Id'];
            $_SESSION['ulfn']=$row['First_Name'];
            $_SESSION['ulln']=$row['Last_Name'];
            $_SESSION['ulun']=$row['UserName'];
            if(isset($row['UserName']) && isset($row['Password'])) { 
                header('location:user_details.php');
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
<?php
    
    if(isset($_POST['signup']))
    {
        $fn=$_POST['usfn'];
        $ln=$_POST['usln'];
        $un=$_POST['usun'];
        
        if($_POST['uspsw']==$_POST['uscpsw'])
        {
            $psw=$_POST['uspsw'];
            $enc_psw=md5($psw);
        }
        else{
            echo "<span>Re-enter password</span>";
            header("location:user_login.php");  
        }
        $sql="INSERT INTO candidate_login VALUES (NULL,'$fn','$ln','$un','$enc_psw')";
        if($db->query($sql)===TRUE)
        {
                // echo "New Record created";
                
        }
        else
        {
	        echo "Error: ".$sql."<br>".$db->error;
        }
    }
        ?>
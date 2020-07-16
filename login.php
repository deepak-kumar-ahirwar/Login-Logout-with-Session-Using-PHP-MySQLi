<?php
$login=false;
$error=false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "conn.php" ;
    $email=$_POST["email"];
    $pass=$_POST["pass"];
    $sql="Select * from loginid where email='$email' ";
    $result=mysqli_query($conn,$sql);
    $num= mysqli_num_rows($result);
    if($num==1){
        while($row=mysqli_fetch_assoc($result)){
            $username=$row['username'];
            if(password_verify($pass,$row['pass']))
            {
                $login=true;
                session_start();
                $_SESSION['username']=$username;
                $_SESSION['email']=$email;
                $_SESSION['loggedin']=true;
                header("location:userhome.php");
        }
        else{
            $error="your email and password incorrect. please check your email and password ";
         }
        }
    }  
    else{
       $error="your email and password incorrect. please check your email and password ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "link.php";?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<?php require "navbar.php"; ?>
<?php 
if($login){
    echo '<div class="Salert">
    <strong>Success! </strong>you are Login in.
  </div>';
}
?>
<?php 
if($error){
    echo '<div class="Dalert">
    <strong>Failed! </strong> '.$error.'
  </div>';
}
?>
    <div class="form"> 
    <form class="form-box" action="login.php" method="post">
    <h1>Login</h1>
  
    <div class="textbox">
        <label>Email</label>
    <input type="text" name="email" required>
    </div>
        <div class="textbox" >
            <label>Password</label>
        <input type="password" name="pass" required>
</div>
    <button class="btn" type="submit" value="sumit">Login</button>
    <p>Create new account</p>
    <a href="signup.php">Sign up</a>
    
    </form>
    </div>
</body>
</html>
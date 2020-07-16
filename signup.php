<?php
$aleart=false;
$error=false;
include "conn.php" ;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username=$_POST['username'];
    $email=$_POST["email"];
    $pass=$_POST["pass"];
    $passHash=password_hash($pass, PASSWORD_DEFAULT);
    $cpass=$_POST["cpass"];
    $sqlexists="SELECT * FROM `loginid` WHERE email='$email' " ;
    $result = mysqli_query($conn,$sqlexists);
    $numexists = mysqli_num_rows($result);
    if($numexists>0){
        $error="Account already registered.";
    }else{
    if($pass==$cpass){
    $sql="INSERT INTO `loginid` (`username`,`email`, `pass`, `time`) VALUES ('$username','$email', '$passHash', current_timestamp());" ;
    $result=mysqli_query($conn,$sql);
    if($result){
        $aleart=true;
    }  
}
    else{
        $error="password do not match . please check your password";
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include "link.php" ;
include "conn.php" ; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign up</title>
</head>
<body>
<?php require "navbar.php"; ?>
<?php 
if($aleart){
    echo '<div class="Salert">
    <strong>Success! </strong>Your accound is successfully created and now you can login. <a href="login.php">Login now.</a>
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
    <form class="form-box" action="signup.php" method="post">
    <h1>sign Up</h1>
    <div class="textbox">
    <label>Username</label>
    <input type="text" maxlength="30" name="username"  required>
    </div>
    <div class="textbox">
    <label>Email</label>
    <input type="email" maxlength="30"  name="email"  required>
    </div>
        <div class="textbox">
        <label>Password</label>
        <input type="password" name="pass" required>
        </div>
        <div class="textbox">
        <label>Confirm Password</label>
            <input type="password"  name="cpass" required>
            </div>
    <button type="submit" class="btn" value="submit" name="submit">Signup</button>
    <p>Have an account ?</p>
    <a href="login.php">Sign in</a>
    
    </form>
    </div>
</body>
</html>

 <?php include "link.php" ; 
 if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
 {
     $loggedin=true;
 }
 else{
   $loggedin= false;
 }
 echo '
<div class="topnav">
        <a class="active" href="index.php">Home</a>
        <a href="#news">News</a>
        <a href="#contact">Contact</a>
        <a href="#about">About</a>
   ';
        if(!$loggedin){
        echo '
        <p  class="menulo"><a href="login.php">Login</a></p> 
         <p  class="menulo"><a href="signup.php">Sign up</a></p>
         <p  class="menulo"><a href="userhome.php">Account</a></p> 
       ' ;
      }
     if($loggedin){
      $username=$_SESSION['username'];
      echo '
      <p  class="menulo"><a class="lactive" href="logout.php">Logout</a></p>
       <p  class="menulo">
       <a class="active " href="userhome.php"><span style="text-transform:capitalize;">'.$username.'</p></a></p> 
      '
       ;

     }

echo ' </div>' ;
     
    ?>
<?php
session_start();
$username=$_SESSION['username'];
if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin']!=true)
{
    header("location:login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "link.php";
    include "conn.php"; ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
</head>
<body>
<?php require "navbar.php"; ?>
<div class="headline"><h1>Welcome <?php echo '<span style="text-transform:capitalize;">'.$username.'</p> ' ?></h1></div>


</body>
</html>

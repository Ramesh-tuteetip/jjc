<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Validate OTP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 500px; padding: 20px; }
    </style>
</head>
<body>
<img src="stu_logofinal.png" alt="Logo" width="400" height="100">

<div class="wrapper">
        
        <h4><p>Please fill the OTP to create an account.</p></h4>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    
<div class="form-group">
              <label>One Time Password</label>
                <input type="text" name="otp" class="form-control" required >
               
           </div>
<div class="form-group">
                <input type="submit" class="btn btn-primary"  value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
</body>
</html>
<?php
require_once "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$result = mysqli_query($link,"SELECT * FROM users WHERE otp=" . $_POST["otp"] . " AND  NOW() <= DATE_ADD(created_at, INTERVAL 10 MINUTE)");
$count  = mysqli_num_rows($result);
	if(!empty($count)) 
{
 echo "You Have successfully registered. To access, Wait until the administrator has to approve your account...";
?>

<a href="./Register.php">Click Back to Homepage</a>
<?php
mysqli_query($link,"UPDATE users SET otp_status=1 where otp=" . $_POST["otp"]."");
$exit = TRUE;
}

else
{
$result = mysqli_query($link,"SELECT * FROM users WHERE otp=" . $_POST["otp"] . " AND  NOW() > DATE_ADD(created_at, INTERVAL 5 MINUTE)");
$count  = mysqli_num_rows($result);

	if(!empty($count)) 

{
mysqli_query($link,"delete from users where otp =" .$_POST["otp"]."");
echo "<html>";
echo "<body>Your OTP has expired now...";
//header("location: Register.php");
echo "<a href='".header("location: Register.php")."'>Click me</a>";
//echo header(location.href :Register.php");
echo "</body>";
echo "</html>";
$exit = TRUE;
}
else
{
echo "Invalid OTP!";
}
}
}
?>
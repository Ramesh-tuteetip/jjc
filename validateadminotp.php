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
        
        <h4><p>Please fill the OTP to login.</p></h4>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    
<div class="form-group">
              <label>One Time Password</label>
                <input type="text" name="otp" class="form-control" required >
               
           </div>
<div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
</form>
</body>
</html>

<?php
require_once "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$result = mysqli_query($link,"SELECT * FROM Admin WHERE password=" . $_POST["otp"] . "");
$count  = mysqli_num_rows($result);
	if(!empty($count)) 
{
header("location: toapprove.php");}
}
?>


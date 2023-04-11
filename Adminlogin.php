<?php
require_once "config.php";
$sql = "SELECT * FROM admin";
$stmt = mysqli_prepare($link, $sql);
 
// Define variables and initialize with empty values
$username =  $password =$email_id = "";
$username_err =  $password_err= $email_iderr ="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
 
    // Validate username
    if(empty(trim($_POST["username"])))
{
        $username_err = "Please enter a username.";
   }
    
//validate email id    
//$email_id = trim($_POST["email_id"]);
if (filter_var(trim($_POST["email_id"]), FILTER_VALIDATE_EMAIL)) 
{
    
} 
else {
    $email_iderr ="Is not a valid email address";
}

if ($result = mysqli_query($link, $sql)) 
{
  while ( $row = mysqli_fetch_array($result) )
  {
if((trim($_POST["username"]))==$row[0] && (trim($_POST["email_id"])==$row[2]))
{
 echo "hi";
$otp1 = rand(100000,999999);
$to=trim($_POST["email_id"]);
$subject="OTP for your account verification";
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

$message=" <html><body>Hi, You received OTP Verification code is here now to make Login...  <b>$otp1</b></body></html>";
if(mail($to,$subject,$message,$headers))
{
mysqli_query($link,"UPDATE admin SET password='$otp1' where Username='" . $_POST['username'] ."'");


}
else

{
echo "Oops! Something went wrong. Please try again later.";
}
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: validateadminotp.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
}
else
{
echo "Invalid Username or E-mail ID";
//header("location: Adminlogin.php");

}
}                          


            // Close statement
            mysqli_stmt_close($stmt);

   
    // Close connection
   mysqli_close($link);
}
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
<img src="stu_logofinal.png" alt="Logo" width="400" height="100">

    <div class="wrapper">
        <h2>Sign Up</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            
          
<div class="form-group">
                <label>Registered Mail ID</label>
                <input type="text" name="email_id" class="form-control <?php echo (!empty($email_iderr)) ? 'is-invalid' : ''; ?>" value="<?php echo $email_id; ?>">
                <span class="invalid-feedback"><?php echo $email_iderr; ?></span>
            </div>
           

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            
        </form>
    </div>
    
</body>
</html>
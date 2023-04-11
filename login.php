<?php
// Include config file
require_once "config.php";
 $sql = "SELECT * FROM users where Acc_status='Approved'";
$stmt = mysqli_prepare($link, $sql);

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err ="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Validate username
    if(empty(trim($_POST["username"])))
{


        $username_err = "Please enter a username.";
    } 
    if(empty(trim($_POST["password"])))
{
        $password_err = "Please enter a password.";     
    }  
     if(empty($username_err) && empty($password_err))
{
         if ($result = mysqli_query($link, $sql)) 
{
$flag=0;
  while ( $row = mysqli_fetch_array($result) )
  {
if (trim($_POST["username"])==$row[1])
{
$flag=1;
$hash=$row[2];
$password=trim($_POST["password"]);
$options = array('cost' => 11);
if (password_verify($password, $hash))
 {
    if (password_needs_rehash($hash, PASSWORD_DEFAULT, $options)) 
{
        // If so, create a new hash, and replace the old one
        $newHash = password_hash($password, PASSWORD_DEFAULT, $options);

header("location: studenthome.php");
    }
}
else
{
?>
<body>

<h6 style="background-color:tomato;">Invalid Password!.</h6>

</body>
<?php
}
}
}

}

}
if ($flag==0)
{
?>
<body>

<h6 style="background-color:tomato;">Invalid Username or User not activated !.</h6>

</body>
<?php
}
            // Close statement
            mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
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
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
           
           
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
        </form>
    </div>    
</body>
</html>
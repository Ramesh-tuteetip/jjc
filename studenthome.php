<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
</head>
<body background="stuinfo_bg.jpg" background-size: contain;>
<br>
<img src="jjc logo.png" alt="logo" align="center" width="700"><br>
<style>
.button
{
position: relative;
display: inline-block;
width: 50%;
transform: translateX(-50%);
}
.container { 
  height: 350px;
  position: relative;
  align-items: center;

  border: 3px solid green; 
}
img {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
.center {
  margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}

</style>
<br><div class="container">
  <div class="center">
&ensp;&ensp;<button type="button" class="btn btn-primary " onclick="window.location.href='stuadd.php'">Register Students Info.</button><br><br>
<button type="button" class="btn btn-success " onclick="window.location.href='stuview.php'">View Student Info by Reg.No.</button><br><br>
&ensp;<button type="button" class="btn btn-danger " onclick="window.location.href='stuviewall.php'">View All the Students Info.</button><br><br>
&ensp;&ensp;&ensp;<button type="button" class="btn btn-warning" onclick="window.location.href='editstu.php'">Change Students Info.</button><br><br>
&ensp;&ensp;&ensp;&ensp;<button type="button" class="btn btn-dark " onclick="window.location.href='Register.php'"> Click to Homepage</button>
</div>
</div>
</body>
</html>

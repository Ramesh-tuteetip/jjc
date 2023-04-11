
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <title>Grant Users to access account </title> 
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
</head> 
<body>

<img src="stu_logofinal.png" class="center" alt="Logo" width=30%;" >
 
<h1 style="text-align:center;">List of students</h1>
    
<table  border="0" class="center">
<style>
.button
{
position: relative;
display: inline-block;
width: 50%;
transform: translateX(-50%);
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
img {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
.center {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100px;
}
p {text-align: center;}

</style>
  <tr>
    <th>Student Name</th>
    <th>Mob Number ID</th>
<th>DOB</th>
<th>Community</th>

    <th>Father Name</th>
<th>Father Number</th>
<th>Hosteller</th>

  </tr>

<?php
require_once "config.php";
$sql = "SELECT * FROM users where Acc_status='Not Approv'";
$stmt = mysqli_prepare($link, $sql);
$box=$_POST['toapprove'];

$str='';
while (list ($key,$val) = @each ($box)) 
{

$str=$str. "$val,";
}
$str=rtrim($str,','); // To remove last char using rtrim

if ($result = mysqli_query($link, $sql)) 
{
?>

<form action="" method="post">
<?php
  while ( $row = mysqli_fetch_array($result) )
  {

    ?>

    <tr><br>

      <td><input type="radio"  name="toapprove[]" value ='<?php echo $row[1]; ?>'/>
          <?php echo $row[1]; ?> </td>
      <td><?php echo $row[3]; ?></td>
	<td><?php echo $row[6]; ?></td>
   </tr>

<?php
}
?>
 </table><br>
<div class="center">
<input class="btn btn-primary" type=Submit />&ensp; &ensp;&ensp;&ensp;&ensp;
<button type="button" class="btn btn-success" onclick="window.location.href='toapprove.php'"> Reload</button>&ensp; &ensp;&ensp;&ensp;&ensp;
<button type="button" class="btn btn-warning " onclick="window.location.href='register.php'">Home</button>
</div>
</form>

<?php 

mysqli_query($link,"UPDATE users SET Acc_status='Approved' where Username='" . $str ."'");
}

?>

</body>
</html>

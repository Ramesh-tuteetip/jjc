<!DOCTYPE html>
<html>
<head>
<style>
body {
margin:20px;
text-align: center;
}

{
    font-family: Arial;
    font-size: 10pt;
}
input[type=button], input[type=submit], input[type=reset] {
  background-color: #04AA6D;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
#dvPreview
img{
position: absolute;
filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=image);
  top: 8px;
  right: 26px;
height: 100px;
    width: 90px;
     font-size: 2px;
}

.split-screen {
    display: flex;
}
.split-screen__half {
    flex: 1;
}
.left {
  left: 0;
  background-color: #f7cca8;
}

.right {
  right: 0;
  background-color: #ddd;
}
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script language="javascript" type="text/javascript">
$(function () {
    $("#fileupload").change(function () {
        $("#dvPreview").html("");
        var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
        if (regex.test($(this).val().toLowerCase())) {
            if ($.browser.msie && parseFloat(jQuery.browser.version) <= 9.0) {
                $("#dvPreview").show();
                $("#dvPreview")[0].filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = $(this).val();
            }
            else {
                if (typeof (FileReader) != "undefined") {
                    $("#dvPreview").show();
             
                    $("#dvPreview").append("<img />");
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $("#dvPreview img").attr("src", e.target.result);
                    }
                    reader.readAsDataURL($(this)[0].files[0]);
                } else {
                    alert("This browser does not support FileReader.");
                }
            }
        } else {
            alert("Please upload a valid image file.");
        }
    });
});
</script>

</head>

<body>
<h2 style="color:blue;text-align:center;">J.J. COLLEGE OF ARTS AND SCIENCE</h2>
<h5 style="color:black;text-align:center;">J.J. Nagar,Sivapuram, Pudukkottai -622 422.</h5>
<div class="split-screen">
    <div class="split left">
<h5 style="color:RED;text-align:center;">>>>STUDENT INFORMATION<<<<<</h5>

<p>&ensp;Name &ensp;&ensp;&ensp;:&ensp;&ensp;&ensp;&ensp;
        <input type="text" name="name" placeholder="Name" required>
&ensp;&ensp;Register Number:&ensp;&ensp;&ensp;
        <input type="text" name="regnum" placeholder="Reg.number" required> 
 </p> 

<p>Birth Date&ensp;:&ensp;&ensp;&ensp;
      <input type="text" name="dob" placeholder="DOB" required>
&ensp;&ensp;Gender&ensp;:&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
        <input type="radio" name="gender" value="male" size="10">Male &ensp;&ensp;&ensp;
 <input type="radio" name="gender" value="female" size="10">Female&ensp;&ensp;&ensp;
 </p> 

<p>Aadhaar No.&ensp;:&ensp;
         <input type="number" name="adhaar" placeholder="Number" required>
&ensp;&ensp;Community&ensp;&ensp;&ensp;&ensp;:&ensp;&ensp;&ensp;
        <select name="cmty" name="community">

 <option value="BC" selected>select..</option>

  <option value="OC">OC</option>

  <option value="MBC">MBC</option>

  <option value="DNC">DNC</option>

  <option value="SC">SC</option>
    
  <option value="ST">ST</option>

  </select>
&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
</p> 

<p>&ensp;Caste&ensp;&ensp;&ensp;&ensp;&ensp;:&ensp;&ensp;&ensp;
        <input type="text" name="caste" placeholder="caste" required>
&ensp;&ensp;Blood Group&ensp;&ensp;&ensp;:&ensp;&ensp;&ensp;
        <input type="text" name="bldgrp" placeholder="blood" >
 </p> 

<p>&ensp;Hosteller&ensp;&ensp;:&ensp;&ensp;&ensp;
        <input type="radio" name="hostel" value="yes">yes      
        <input type="radio" name="hostel" value="no">no&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
Mobile No.&ensp;&ensp;&ensp;:&ensp;&ensp;&ensp;&ensp;
        <input type="number" name="mobno" placeholder="number"required>
 </p> 
 <p>----------------------------------------------------------------------------------------------------------------------- </p> 

<h5 style="color:RED;text-align:center;">>>>FATHER'S INFORMATION<<<<<</h5>

<p>&ensp;Father Name&ensp;:&ensp;
        <input type="text" name="fname" placeholder="Father Name">
&ensp;&ensp;Job Nature&ensp;&ensp;&ensp;&ensp;:&ensp;&ensp;&ensp;
&ensp;        <input type="text" name="fjob" placeholder="Job"
 </p> 

<p>&ensp;Mobile No.&ensp;&ensp;:&ensp;
        <input type="number" name="fmobno" placeholder="Number">
&ensp;&ensp;Aadhaar Number&ensp;:&ensp;
&ensp;        <input type="number" name="faadhaar" placeholder="number"
 </p> 

<h5 style="color:RED;text-align:center;">>>>MOTHER'S INFORMATION<<<<<</h5>

<p>&ensp;Mother Name:&ensp;
        <input type="text" name="mname" placeholder="Father Name">
&ensp;&ensp;Job Nature&ensp;&ensp;&ensp;&ensp;:&ensp;&ensp;&ensp;
&ensp;        <input type="text" name="mjob" placeholder="Job"
 </p> 

<p>&ensp;Mobile No.&ensp;&ensp;:&ensp;
        <input type="number" name="mmobno" placeholder="Number"> 
&ensp;&ensp;Aadhaar Number&ensp;:&ensp;
&ensp;        <input type="number" name="maadhaar" placeholder="number"
 </p> 

   </div>

    <div class="split right">
<h5 style="color:RED;text-align:center;">>>>STUDENT EDUCATION DETAILS<<<<<</h5>
<p><b> Higher Secondary(+2) </b></p>

<p>&ensp;School Name&ensp;:&ensp;&ensp;
        <input type="text" name="sclname2" placeholder="School Name" required>
&ensp;&ensp;Group Studied:&ensp;&ensp;
        <input type="text" name="grpstd2" placeholder="Group" required> 
 </p> 

<p>&ensp;Year of Passing&ensp;:&ensp;&ensp;
        <input type="text" name="yearpass2" placeholder="Month & Year" required>
&ensp;Marks Obtained:&ensp;&ensp;
        <input type="number" name="mark2" placeholder="Mark Obtained" required> &ensp;&ensp;&ensp;&ensp;
 </p> 

<p><b> Higher Secondary(+1) </p></b>

<p>&ensp;School Name&ensp;:&ensp;&ensp;
        <input type="text" name="sclname1" placeholder="School Name" required>
&ensp;&ensp;Group Studied:&ensp;&ensp;
        <input type="text" name="grpstd1" placeholder="Group" required> 
 </p> 

<p>&ensp;Year of Passing&ensp;:&ensp;&ensp;
        <input type="text" name="yearpass1" placeholder="Month & Year" required>
&ensp;Marks Obtained:&ensp;&ensp;
        <input type="number" name="mark1" placeholder="Mark Obtained" required> &ensp;&ensp;&ensp;&ensp;
 </p> 

<p><b> SSLC </b></p>

<p>School Name&ensp;:&ensp;&ensp;
        <input type="text" name="sclname" placeholder=School Name" required>
&ensp;&ensp;Group Studied:&ensp;&ensp;
        <input type="text" name="grpstd" placeholder="Group" required> 
 </p> 

<p>&ensp;Year of Passing&ensp;:&ensp;&ensp;
        <input type="text" name="yearpass" placeholder="Month & Year" required>
&ensp;Marks Obtained:
<input type="number" name="mark" placeholder="Mark Obtained" required> 
</p> 
<p>Address&ensp;:&ensp;&ensp;&ensp;
      <input type="text"  name="address" placeholder="Address" size=60 required>
&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;</p

<p><b>Upload Student Photo&ensp;:</b>&ensp;
<input type="text" name="yearpass" placeholder="Photo" </p>
<input id="fileupload" type="file" />
<div>
<div id="dvPreview"></div>
</div>
<input type="submit"  form="form1" value="Submit"></button></div>

</body>
</html> 

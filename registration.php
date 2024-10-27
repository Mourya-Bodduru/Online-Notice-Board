<?php
require("config.php");
$name = $_POST['name'];
$dob = $_POST['dob'];
$roll = $_POST['roll'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$branch = $_POST['branch'];
$cyear = $_POST['cyear'];
$p1 = $_POST['p1'];
$p2 = $_POST['p2'];
$date = date('d-M-Y');
$d = mysqli_query($gmr, "SELECT * FROM `sms` WHERE contact='$contact'");
$c = mysqli_query($gmr, "SELECT * FROM registration WHERE roll='$roll'");

$info = "";

if (
    $name == NULL || $dob == NULL || $roll == NULL ||
    $email == NULL || $contact == NULL || $p1 == NULL || $p2 == NULL
) {
    $info = "Please fill in all the required fields.";
} elseif (mysqli_num_rows($d) == 1) {
    $info = "Contact Number must be unique.";
} elseif (mysqli_num_rows($c) == 1) {
    $info = "User already registered.";
} elseif ($p1 == $p2) {
    $p3 = sha1($p1);
    $sql = mysqli_query($gmr, "INSERT INTO registration(name,dob,roll,email,contact,branch,cyear,password,date,status) VALUES('$name','$dob','$roll','$email','$contact','$branch','$cyear','$p3','$date','0')");
    
    if ($sql) {
        $insertContact = mysqli_query($gmr, "INSERT INTO sms(contact) VALUES('$contact')");
        
        if ($insertContact) {
            $info = "Successfully registered user $name";
        } else {
            $info = "Error inserting contact into the 'sms' table.";
        }
    } else {
        $info = "Error occurred while registering user.";
    }
} else {
    $info = "Passwords do not match.";
}
 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Registration Panel</title>
<link href="scripts/styleASL.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div align="center">
<span class="head">Student Registration Panel</span> <br /><br />
 <form method="POST" onsubmit="return validate()">
<table cellpadding="3" cellspacing="3" class="formTable">
<tr><td colspan="2" align="center" class="Subhead">Please Fill All The Details</td></tr>
<tr><td colspan="2" align="center" class="info"><?php echo $info;?></td></tr>
<tr><td class="labels">Full Name : </td><td><input name="name" type="text" class="fields" id="name" placeholder="Enter Full Name" size="40"/><label id="lb1" style="color:red; visibility:hidden;">Invalid</label></td></tr>
<tr><td class="labels">Date of Birth : </td><td><input name="dob" type="date" class="fields" id="dob" size="15"/><label id="lb2" style="color:red; visibility:hidden;">Invalid</label</td></tr>
<tr><td class="labels">Pin No. : </td><td><input name="roll" type="text" class="fields" id="roll" placeholder="Enter Roll No." size="15"/><label id="lb3" style="color:red; visibility:hidden;">Invalid</label</td></tr>
<tr><td class="labels">E-Mail : </td><td><input name="email" type="text" class="fields" id="email" placeholder="Enter E-Mail ID" size="40"/><label id="lb4" style="color:red; visibility:hidden;">Invalid</label</td></tr>
<tr><td class="labels">Contact No[] : </td><td><input name="contact" type="text" class="fields" id="contact" placeholder="Enter Mobile No." size="20" maxlength="13"/><label id="lb5" style="color:red; visibility:hidden;">Invalid</label</td></tr>
<tr><td class="labels">Branch : </td><td>
<select name="branch" class="fields">
	   <option value="NA" selected="selected" disabled="disabled">- - Select Branch - - </option>
       <option value="Computer Science and Engineering">Computer Science and Engineering</option>
       <option value="Electronics and Communication Engineering">Electronics and Communication Engineering</option>
       <option value="Mechanical Engineering">Mechanical Engineering</option>
       </select>
</td></tr>
<tr><td class="labels">Year : </td><td>
<select name="cyear" class="fields">
<option value="NA" selected="selected" disabled="disabled">- Select Year -</option>
<option value="1">First Year</option>
<option value="2">Second Year</option>
<option value="3">Third Year</option>
</select>
</td></tr>
<tr><td class="labels">Password : </td><td><input name="p1" type="password" class="fields" id="p1" placeholder="Enter Password" size="30"/><label id="lb6" style="color:red; visibility:hidden;">Invalid</label</td></tr>
<tr><td class="labels">Re-Type Password : </td><td><input name="p2" type="password" class="fields" id="p2" placeholder="Re-Type Password" size="30"/><label id="lb7" style="color:red; visibility:hidden;">Invalid</label></td></tr>
<tr><td align="center" colspan="2"><input type="submit" value="Register"  class="button" onclick="return confirm('Please Confirm All Fields Before Submitting');"/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="Clear"  class="button" onclick="return confirm('Are You Sure...?');">
</table>
</form><br/>
</body>
<script type="text/javascript">
    const form=document.getElementById('form')
    if(form){
    form.addEventListener('submit',(e)=>{

    e.preventDefault()
    validate()
});}
 function validate(){
var uname=document.getElementById('name'); 
var dob =document.getElementById('dob');
var roll=document.getElementById('roll');
var email=document.getElementById('email');
var num =document.getElementById('contact');
var pass=document.getElementById('p1');
var pass1=document.getElementById('p2');
const p1 = document.getElementById("p1");
const p2 = document.getElementById("p2");
const pp1 = p1.value;
const pp2 = p2.value;
var pattern=/^\+91\d{10}$/;
const emailReg = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
const rollReg = /^\d{2}072-[A-Za-z]{2}-\d{3}$/;
const passwordReg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()\-+.]).{6,20}$/;


if(uname.value.trim()==""){
  uname.style.border="solid 3px red"
  document.getElementById("lb1").style.visibility="visible";
  return false;
}
else if(dob.value.trim()==""){ dob.style.border="solid 3px red"
document.getElementById("lb2").style.visibility="visible";
return false;}
else if(roll.value.trim()==""){ roll.style.border="solid 3px red"
document.getElementById("lb3").style.visibility="visible";
return false;}
else if (!rollReg.test(roll.value.trim())) {
    roll.style.border = "solid 3px red";
    document.getElementById("lb3").style.visibility = "visible";
    alert("Invalid PIN No. Format (e.g., 00072-AB-678)");
    return false;
  }
else if(email.value.trim()==""){ email.style.border="solid 3px red"
document.getElementById("lb4").style.visibility="visible";
return false;}
else if (!emailReg.test(email.value.trim())) {
  email.style.border = "solid 3px red";
  document.getElementById("lb4").style.visibility = "visible";
  alert("Invalid email address");
  return false;
}
else if(contact.value.trim()==""){
contact.style.border="solid 3px red"
document.getElementById("lb5").style.visibility="visible";
return false;
}else if(p1.value.trim()==""){
  p1.style.border="solid 3px red"
document.getElementById("lb6").style.visibility="visible";
  return false;
}else if(p2.value.trim()==""){
 p2.style.border="solid 3px red"
      document.getElementById("lb7").style.visibility="visible";
  return false;
}
else if (!passwordReg.test(p1.value.trim())) {
    p1.style.border = "solid 3px red";
    document.getElementById("lb6").style.visibility = "visible";
    alert("Password must contain at least one uppercase letter, one lowercase letter, one digit, one special character, and be 6-20 characters long.");
    return false;
  }
 else if (pp1 !== pp2) {
    alert("Passwords do not match correct your re type password");
lb7.innerText="please correct the retype password";
    document.getElementById("lb7").style.visibility="visible";
       return false;
  }

 if(!pattern.test(contact.value)){
   alert("entered wrong phone number please add +91")
    return false;}
}
</script>
</html>
</table>
</form><br/>
<a href="index.php">Go Back</a>
</div>
</body>
</html>
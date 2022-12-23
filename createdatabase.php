<?php
include('includes/config.php');
$fname=$_POST['first_name'];
$mname=$_POST['middle_name'];
  $lname=$_POST['last_name'];
   $role=$_POST['rolename'];
  $gender=$_POST['sex'];
  $phone=$_POST['phone'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $cpassword=$_POST['cpassword'];
   $username=$fname.".".$mname;
  $pass=base64_decode($password);
  $cpass=base64_decode($cpassword);
  $pizza="User/00/22";
$pieces=explode("/",$pizza);

$id=intval($pieces[1])+1;

$sql="SELECT * FROM `user`";
$result=$db->query($sql);
 $row=$result->num_rows;
$row=$row + 1;
 
$empid=$pieces[0]."/".$row."/".date("y");
  $ss=" SELECT * FROM `user` WHERE `Email`='$email' OR `Phone`='$phone'";
    $gg=$db->query($ss);
    $row=$gg->fetch_assoc();
    if($row['Email']==$email||$row['Phone']==$phone)
    {
      echo "<script type='text/javascript'>alert('Email, Username or Phone Number is allready exist in the databse.!!!')</script>";
      echo "<script type='text/javascript'>window.location='createuser.php'</script>";
      }
      else
      {
$sq="INSERT INTO `user`(`Userid`, `First name`, `Middle name`, `Last name`, `Gender`, `Username`, `Phone`, `Email`, `Role`, `Password`, `Cpassword`, `Status`, `Timedate`) VALUES ('$empid','$fname','$mname','$lname','$gender','$username','$phone','$email','$role','$pass','$cpass',1,CURRENT_DATE())";
if($db->query($sq)==true)
{
  echo "<script type='text/javascript'>alert('Create User account is successfully!!!.');</script>";
  echo "<script type='text/javascript'>window.location='createuser.php'</script>";
}
else
{
  echo "<script type='text/javascript'>alert('User account is not created successfully!!!.');</script>";
      echo "<script type='text/javascript'>window.location='createuser.php'</script>";
}
}
?>
<?php
$db=mysqli_connect("localhost","root","","reg");
$query="UPDATE rg SET tax='Paid'";
$result=mysqli_query($db,$query);
header("Location:user-dashboard11.php?success=Payment Done");
?>
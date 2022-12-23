
 <?php 
  include "db_conn.php"; ?>
<!DOCTYPE html>
<html>
<head>
   <title></title>

   <style>
.pro {
  display: inline-block;
  padding: 0 25px;
   font-size: 16px;
  line-height: 50px;
  border-radius: 25px;
  background-color: #f1f1f1;
  float:right;
   }

.pro img {
  float: left;
  margin: 0 10px 0 -25px;
  height: 50px;
  width: 50px;
 border-radius: 50%;
}
</style>
</head>

<body>
 
 
<div class="pro">
  <div class="chip">
  <img src="img/user-default.png" alt="Profile" width="96" height="96">
  
  <?php 
   if (isset($_SESSION['username']) && isset($_SESSION['ID'])) 
   {
  echo $_SESSION['name'];
 }

else
{
echo "Sign in";
}

 ?>

</div>
</div>
</body>
</html>
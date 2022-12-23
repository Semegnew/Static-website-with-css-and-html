<?php 
 include ("language/config.php"); 
 include "user_db.php";
if (isset($_POST['submit']))
{
	   $Txpire =$_POST['L_ExpireDate'];
        $today_date=date('m/d/y');
        /*convert to str to time */
        $exp=strtotime($Txpire);
        $td=strtotime($today_date);

 
     if ($td>=$exp)
       {  
        $sql="UPDATE rg SET status='Pending' WHERE status='Approved'";
        $query=mysqli_query($conn_reg,$sql);
         echo "<script>alert('Your License is need Approved!');</script>";
         echo "<script>alert('$Txpire. Year is Passed You must Pay Tax' );</script>";

       }
       else
       {
         
       }
}
 

?>





<!DOCTYPE html>
<html>
<head>

 	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet" href="style.css">

</head>
<body>

  <nav class="navbar-custom">
        <div class="header-title"> 
           <h3 ><?php echo $lang['title'];?></h3>
         </div> 
  <div class="profile">
    
    <?php include("profile.php"); ?>
      
    </div>
     <div class="lang">
      <input type="button" onclick="location.href='Login-Tin.php?lang=en';" value="<?php echo $lang['lang_en']?>" />

      <input type="button" onclick="location.href='Login-Tin.php?lang=amha';" value="<?php echo $lang['lang_amha']?>" />

      </div>
 </nav>
     
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
     <ul class="navbar-nav ">
       <li class=" nav-item active">
        <a class="nav-link" href="index_home.php">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class=" nav-item ">
        <a class="nav-link" href="Request-approve.php">Request </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="crud_php.php">Manage</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="search.php">User Search</a>
      </li>
          <li class="nav-item">
        <a class="nav-link" href="msgToUser.php">Send Message</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Log out</a>
      </li>
          <li class="nav-item">
        <a class="nav-link" href="licenseExpirDate.php">TaxPayer Expiration-Date</a>
      </li>
       
    </ul>
  </div>

      
</nav>
	<?php include("sidebar.php");?>

          <div class="container d-flex justify-content-center align-items-center"
      style="min-height: 100vh;">
      	<form class="border shadow p-3 rounded" 
      	      method="post" 
      	      style="width: 450px;">
      	      <h1 class="text-center p-3"><?php echo $lang['TIN_ExpireDate']?></h1>
		  <div class="mb-3">
		    <label  
		           class="form-label"><?php echo $lang['ExpireD']?></label>
		    <input type="date" 
		           class="form-control" 
		           name="L_ExpireDate">
		  </div>
    <button type="submit" 
		          class="btn btn-primary" name="submit"><?php echo $lang['enterExpireDate']?></button>
          </form>
      </div>
</body>
</html>
</body>
</html>
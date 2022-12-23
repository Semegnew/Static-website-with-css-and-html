
 <?php  include ("language/config.php"); 
 include "user_db.php";

if (isset($_POST['submit'])){

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
   $Tin =$_POST['TIN'];

 if (empty($Tin)) {
    header("Location:Login-Tin.php?error=Tin Number is Required");
  }

  else {
        
        $sql = "SELECT * FROM rg WHERE tin_no ='$Tin'";
        $result = mysqli_query($conn_reg, $sql);

       if (mysqli_num_rows($result) === 1)
               {
                mysqli_query($conn_reg, "UPDATE rg SET  customerCancelStutus ='Yes' WHERE TIN_NO = '$Tin'");
                header("Location:RequestCancelLicense.php?success=Successfuly Cancel Request Report ");
                   }
        else {
          header("Location:RequestCancelLicense.php?error=Incorect User name or password");

        } 

}
} 
else {
  header("Login-Tin.php");
}
 ?>
<?php 
   if (!isset($_SESSION['username']) && !isset($_SESSION['id'])) {   ?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $lang['login']?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

   
     <link rel="stylesheet" href="style.css">
</head>
    
 <body style="background:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),
url(gonder-3.jpg)no-repeat center center fixed;background-size:cover;">
 <nav class="navbar-custom">
          <div class="header-title">
               <h3><?php echo $lang['title']; ?></h3>

          </div>
          <div class="profile">
               <?php include("profile.php"); ?>
          </div>
          <div class="lang">
               <input type="button" onclick="location.href='RequestCancelLicense.php?lang=en';" value="<?php echo $lang['lang_en'] ?>" />
               <input type="button" onclick="location.href='RequestCancelLicense.php?lang=amha';" value="<?php echo $lang['lang_amha'] ?>" />
          </div>
     </nav>
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
               <ul class="navbar-nav ">
                    <li class=" nav-item active">
                         <a class="nav-link" href="user-dashboard11.php"><?php echo $lang['home'] ?><span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="register.php"><?php echo $lang['register'] ?></a>
                    </li>

                    <li class="nav-item">
                         <a class="nav-link" href="searchbarView.php"><?php echo $lang['viewUser'] ?></a>
                    </li>

                    <!-- <li class="nav-item">
                         <a class="nav-link" href="Amendement.php">
                              </a>
                    </li>-->

                    <li class="nav-item">
                         <a class="nav-link" href="Login_CmpName.php"><?php echo $lang['Company'] ?></a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="payByYne.php"><?php echo $lang['pay'] ?></a>
                    </li>

                    <li class="nav-item">
                         <a class="nav-link" href="CustomerRenewedRequestLicense.php"> <?php echo $lang['renewed'] ?></a></a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="Feedback.php"> <?php echo $lang['feedback'] ?></a>
                    </li>
                    <li>
                         <div class="dropdown">
                              <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   <?php echo $lang['customerCancelLicense'] ?>
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                   <a class="dropdown-item" href="RequestCancelLicense.php">Trade License</a>
                              </div>
                    <li>
                         <div class="dropdown">
                              <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   <?php echo $lang['aboutLicense'] ?> </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                   <a class="dropdown-item" href="Print_info.php">Print</a>
                                   <a class="dropdown-item" href="certificate.php">Trade License Certificate</a>
                              </div>
                         </div>
                    </li>
                    <div class="dropdown">
                         <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <?php echo $lang['amendment'] ?></a>
                         </button>
                         <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="Amendement.php">Amendment Trade License</a>
                         </div>
                    </div>
         
          <li class="nav-item">
               <a class="nav-link" href="logout.php"><?php echo $lang['logout'] ?></a>
          </li>
          </div>
          </ul>
          </div>

     </nav>
     </div>
	<?php include("sidebar.php");?>

          <div class="container d-flex justify-content-center align-items-center"
      style="height:80vh">
      <div class="navbar-light bg-light">
      	<form class="border shadow p-3 rounded"
       	      method="post" 
      	      style="width: 550px;">
      	      <h1 class="text-center p-3"><?php echo $lang['TinLogin']?></h1>
      	      <?php if (isset($_GET['error'])) { ?>
      	      <div class="alert alert-danger" role="alert">
				  <?=$_GET['error']?>
			  </div>
			  <?php } ?>
              <?php if (isset($_GET['success'])) { ?>
      	      <div class="alert alert-success" role="alert">
				  <?=$_GET['success']?>
			  </div>
			  <?php } ?>
		  <div class="mb-3">
		    <label for="username" 
		           class="form-label"><?php echo $lang['tin number']?></label>
		    <input type="text" 
		           class="form-control" 
		           name="TIN" 
		           id="username">
		  </div>
		 
	 
		  <button type="submit" 
		          class="btn btn-primary" name="submit"><?php echo $lang['login']?></button>
          </form>
      </div>
          </div>
</body>
</html>
<?php }else{
	header("Location:user-dashboard11.php");
} ?>
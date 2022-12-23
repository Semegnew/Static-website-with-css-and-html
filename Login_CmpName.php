<?php
session_start();
include("language/config.php");
include "user_db.php";

if (isset($_POST['submit'])) {

  $Cname = $_POST['CopmanyName'];
  $_SESSION['COMPANYNAME'] = $Cname;

  if (empty($Cname)) {
    header("Location:Login_CmpName.php?error=Company Name is Required");
  } else {
    header("Location:CompanyNameView.php");
  }
} else {
  header("Login_CmpName.php");
}

?>

<!DOCTYPE html>
<html>

<head>
  <title>Company Name</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
               <input type="button" onclick="location.href='user-dashboard11.php?lang=en';" value="<?php echo $lang['lang_en'] ?>" />
               <input type="button" onclick="location.href='user-dashboard11.php?lang=amha';" value="<?php echo $lang['lang_amha'] ?>" />
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
     <div class="body">
          <nav class="side-bar">
               <div class="user-p">
                    <img src="logo.jpg">

               </div>
               <ul>
                    <li>
                         <a href="index_home.php">
                              <i class="fa fa-home" aria-hidden="true"></i>
                              <span><?php echo $lang['home'] ?></span>
                         </a>
                    </li>


                    <li>
                         <a href="index_home.php">
                              <i class="fa fa-commenting-o" aria-hidden="true"></i>
                              <span><?php echo $lang['feedback_management'] ?></span>
                         </a>
                    </li>

                    <li>
                         <a href="Login_index.php">
                              <i class="fa fa-user" aria-hidden="true"></i>
                              <span><?php echo $lang['user'] ?></span>
                         </a>
                    </li>
                    <li>
                         <a href="Login_index.php">
                              <i class="fa fa-user" aria-hidden="true"></i>
                              <span><?php echo $lang['admin'] ?></span>
                         </a>
                    </li>
                    <li>
                         <a href="Login_index.php">
                              <i class="fa fa-user" aria-hidden="true"></i>
                              <span><?php echo $lang['Employer'] ?></span>
                         </a>
                    </li>

                    <li>
                         <a href="about.php" class="active">
                              <i class="fa fa-circle" aria-hidden="true"></i>
                              <span><?php echo $lang['about'] ?></span>
                         </a>
                    </li>
               </ul>

          </nav>
  <div class="container d-flex justify-content-center align-items-center " style="height:80vh;">
  <div class="navbar-light bg-light">
    <form class="border shadow p-3 rounded " method="post" style="width:550px;">
      <h1 class="text-center p-3"><?php echo $lang['companyName'] ?></h1>
      <div class="mb-3">
        <input type="text" class="form-control" name="CopmanyName">
      </div>
      <button type="submit" class="btn btn-primary" name="submit"><?php echo $lang['check'] ?></button>
    </form>
  </div>
  </div>
</body>

</html>
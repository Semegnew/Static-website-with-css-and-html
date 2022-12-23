<?php
 include("language/config.php");

?>
<!DOCTYPE html>
<html>

<head>
     <link rel="stylesheet" type="text/css" href="paymentTax.css">
     <link rel="stylesheet" type="text/css" href="style.css">

     <title><?php echo $lang['title'] ?></title>
     <!-- user dashboard bootstrap-->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>

<body style="background:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),
url(gonder-3.jpg)no-repeat center center fixed;background-size:cover;">
     <nav class="navbar-custom">
          <div class="header-title">
               <h3><?php echo $lang['title'] ?></h3>

          </div>
          <div class="profile">
               <?php include("profile.php"); ?>
          </div>
          <?php if (isset($_GET['success'])) { ?>
               <div class="alert alert-success" role="alert">
                    <?= $_GET['success'] ?>
               </div>
          <?php } ?>
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
                                   <a class="dropdown-item" href="#">Print</a>
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
          </ul>
          </div>
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

          <div class="card">
               <div class="image">
                    <img src="gondar4.webp">
               </div>

               <div class="title">
                    <h1> <?php echo $lang['Wellcome'] ?></h1>
               </div>
               <div class="des">
                    <p><?php echo $lang['description1'] ?></p>
                    <button onclick="window.location.href='Login_index.php'"><?php echo $lang['login'] ?></button>
                    <button onclick="window.location.href='Login_index.php'"><?php echo $lang['register'] ?></button>
               </div>
          </div>
          <div class="card">
               <div class="image">
                    <img src="gondar1.jpg">
               </div>

               <div class="title">
                    <h1> <?php echo $lang['Wellcome'] ?></h1>
               </div>
               <div class="des">
                    <p> <?php echo $lang['description1'] ?></p>
                    <button onclick="window.location.href='payByYne.php'"><?php echo $lang['pay'] ?></button>
                    <button onclick="window.location.href='Login_index.php'"><?php echo $lang['register'] ?></button>
               </div>
          </div>
     </div>
     <?php include("footerN.php"); ?>
</body>

</html>
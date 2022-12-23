<?php
include("language/config.php");
if(isset($_POST['submit'])) 
{

}
 ?>
 <!doctype html>
 <html>
 <head>

 <link rel="stylesheet" type="text/css" href="style.css">

<title><?php echo $lang['title'] ?></title>
<!-- user dashboard bootstrap-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

   <title>contact us</title>
 
 </head>

 <body style="background:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),
url(gondar1.jpg)no-repeat center center fixed;background-size:cover;">
 <nav class="navbar-custom">
          <div class="header-title">
               <h3><?php echo $lang['title']; ?></h3>

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
                         <a class="nav-link" href="view-user-account.php"><?php echo $lang['viewUser'] ?></a>
                    </li>

                   <!-- <li class="nav-item">
                         <a class="nav-link" href="Amendement.php">
                              </a>
                    </li>-->
                    <div class="dropdown">
                              <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <?php echo $lang['amendment'] ?></a>
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                   <a class="dropdown-item" href="#">Trade Name</a>
                                   <a class="dropdown-item" href="Amendement.php">Amendment Trade License</a>
                              </div>
                         </div>
                    <li class="nav-item">
                         <a class="nav-link" href="Login_CmpName.php"><?php echo $lang['Company'] ?></a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="payByYne.php"><?php echo $lang['pay'] ?></a>
                    </li>
                
                    <li class="nav-item">
                         <a class="nav-link" href="CustomerRenewedRequestLicense.php">Request Renewed</a>
                    </li>

                    <li>
                         <div class="dropdown">
                              <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   Cancel Request
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                   <a class="dropdown-item" href="#">Trade Name</a>
                                   <a class="dropdown-item" href="RequestCancelLicense.php">Trade License</a>
                              </div>
                         </div>
                         <li class="nav-item">
                         <a class="nav-link" href="fedBack.php">FeedBack</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="logout.php"><?php echo $lang['logout'] ?></a>
                    </li>
               </ul>
          </div>
          <!--search navbar for the user -->
          <nav class="navbar navbar-expand-lg navbar-light  bg-dark">
               <div class="p-2 bd-highlight">
                    <form class="d-flex" method="post">
                         <input class="form-control me-3" name="tin" type="search" placeholder="<?php echo $lang['search'] ?>" aria-label="Search">
                         <button class="btn btn-outline-success" name="search" type="submit"><?php echo $lang['user_search'] ?></button>
                    </form>
               </div>
          </nav>
     </nav>
     </div>
 
 
  </body>

 </html>
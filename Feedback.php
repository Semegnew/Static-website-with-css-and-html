<?php include("language/config.php"); ?>
<!doctype html>
<html>

<head>
     <!--bootstrap 4.0 form-->
     <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
     <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

     <link rel="stylesheet" type="text/css" href="newf.css">
     <link rel="stylesheet" type="text/css" href="style.css">
     <!--bootstrap 4.0 dropdown-->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body style="background:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),
url(gondar1.jpg)no-repeat center center fixed;background-size:cover;">
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
               <input type="button" onclick="location.href='Feedback.php?lang=en';" value="<?php echo $lang['lang_en'] ?>" />
               <input type="button" onclick="location.href='Feedback.php?lang=amha';" value="<?php echo $lang['lang_amha'] ?>" />
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
     <div class="container contact">

          <div class="row">
               <div class="col-md-3">
                    <div class="contact-info">
                         <img src="gondar5.jpg" alt="image" />
                         <h2>Feedback</h2>
                         <h4>We would love to hear from you !</h4>
                    </div>
               </div>
               <div class="col-md-9">
                    <div class="contact-form">
                         <div class="form-group">
                              <label class="control-label col-sm-2" for="fname">First Name:</label>
                              <div class="col-sm-10">
                                   <input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="fname">
                              </div>
                         </div>
                         <div class="form-group">
                              <label class="control-label col-sm-2" for="lname">Last Name:</label>
                              <div class="col-sm-10">
                                   <input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lname">
                              </div>
                         </div>
                         <div class="form-group">
                              <label class="control-label col-sm-2" for="email">Email:</label>
                              <div class="col-sm-10">
                                   <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                              </div>
                         </div>
                         <div class="form-group">
                              <label class="control-label col-sm-2" for="comment">Comment:</label>
                              <div class="col-sm-10">
                                   <textarea class="form-control" rows="5" id="comment"></textarea>
                              </div>
                         </div>
                         <div class="form-group">
                              <div class="col-sm-offset-2 col-sm-10">
                                   <button type="submit" class="btn btn-default">Submit</button>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
      
</body>

</html>
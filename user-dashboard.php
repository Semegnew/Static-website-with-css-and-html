<?php include "db_conn.php";
include("language/config.php");

?>

<!DOCTYPE html>
<html>

<head>
   <title><?php echo $lang['title']?></title>
   <!-- user dashboard bootstrap-->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="style.css">


</head>

<body style="background-color:#00796b ;">
   <nav class="navbar-custom">
      <div class="header-title">
         <h3><?php echo $lang['title'] ?></h3>

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
               <a class="nav-link" href="">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="register.php">Register</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="view-user-account.php">View</a>
            </li>

            <li class="nav-item"><a class="nav-link" href="Amendment.php">
                  <?php echo $lang['amendment'] ?></a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="Replacement.php"><?php echo $lang['replacement'] ?></a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="logout.php">Log out</a>
            </li>
         </ul>
      </div>
      <!--search navbar for the user -->
      <nav class="navbar navbar-expand-lg navbar-light  bg-dark">
         <div class="p-2 bd-highlight">
            <form class="d-flex" method="post">
               <input class="form-control me-3" name="tin" type="search" placeholder="Search" aria-label="Search">
               <button class="btn btn-outline-success" name="search" type="submit">Search</button>
            </form>
         </div>
      </nav>

   </nav>
   </div>
   <div class="body">
      <nav class="side-bar">
         <div class="user-p">
            <img src="img/logo.png">

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
                  <span><?php echo $lang['user']?></span>
               </a>
            </li>
            <li>
               <a href="Login_index.php">
                  <i class="fa fa-user" aria-hidden="true"></i>
                  <span><?php echo $lang['admin']?></span>
               </a>
            </li>
            <li>
               <a href="Login_index.php">
                  <i class="fa fa-user" aria-hidden="true"></i>
                  <span><?php echo $lang['Employer']?></span>
               </a>
            </li>
            <!--
           <li>
                <a href="Login_index.php">
                   <i class="fa fa-lock" aria-hidden="true"></i>              
                   <span>Admin</span>
                </a>
            </li>

            <li>
                <a href="createPass.php">
                   <i class="fa fa-user" aria-hidden="true"></i>                    
                      <span>User</span>
                </a>
            </li>
             <li>
                <a href="contact.php">
                   <i class="fa fa-phone" aria-hidden="true"></i>            
                      <span>Contact Us</span>
                </a>
            </li>
            <li>
                <a href="pay/paymethod.php">
                    <i class="fa fa-money" aria-hidden="true"></i>
                    <span>Taxation</span>
                </a>
            </li>
         -->
            <li>
               <a href="about.php" class="active">
                  <i class="fa fa-circle" aria-hidden="true"></i>
                  <span>About</span>
               </a>
            </li>


         </ul>

      </nav>

</body>

</html>
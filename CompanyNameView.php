<?php
session_start();
include('user_db.php');
include("language/config.php");
?>

<!DOCTYPE html>
<html>

<head>
  <title>Company Name</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body style="background-color:#00796b ;">
     <nav class="navbar-custom">
          <div class="header-title">
               <h3><?php echo $lang['title']; ?></h3>
          </div>
          <div class="profile">
               <?php include("profile.php"); ?>
          </div>
          <div class="lang">
               <input type="button" onclick="location.href='CompanyNameView.php?lang=en';" value="<?php echo $lang['lang_en'] ?>" />
               <input type="button" onclick="location.href='CompanyNameView.php?lang=amha';" value="<?php echo $lang['lang_amha'] ?>" />
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

                    <li class="nav-item">
                         <a class="nav-link" href="Amendement.php">
                              <?php echo $lang['amendment'] ?></a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="Replacement.php"><?php echo $lang['replacement'] ?></a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="Login_CmpName.php"><?php echo $lang['Company'] ?></a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="payByYne.php"><?php echo $lang['pay'] ?></a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="RequestCancelLicense.php">Request Cancel License</a>
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
  <div class="container" style="padding:0px;  margin-top:2%; ">
    <table class="table table-dark">
      <thead>
        <tr>
          <th scope="col">Company Name</th>
          <th scope="col">Trade Name</th>
        </tr>

      </thead>

      <?php

      $companyName = $_SESSION['COMPANYNAME'];
      $tbl = mysqli_query($conn_reg, "SELECT companyName,tradeName FROM rg WHERE companyName ='$companyName'") or die($tbl->error_reporting());


      while ($row = $tbl->fetch_assoc()) : ?>
        <tr>
          <td> <?php echo $row['companyName']; ?> </td>
          <td> <?php echo $row['tradeName']; ?> </td>

        </tr>

      <?php endwhile;  ?>
      <tr>
        <th>
          <button type="submit" class="btn btn-primary" onclick="location.href='Login_CmpName.php'"><?php echo $lang['try'] ?></button>
        </th>
      </tr>
    </table>



  </div>

</body>

</html>
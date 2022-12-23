<?php
 include "db_conn.php"; ?>
<?php include("language/config.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration Dshboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="card/card.css">
</head>
<body>
    <nav class="navbar-custom">
      <div class="header-title">
        <h3><?php echo $lang['title'] ?></h3>
      </div>
        <div class="profile">
          <?php include("profile.php"); ?>

        </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ">
          <li class=" nav-item active">
            <a class="nav-link" href="Staff.php">Home<span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="Staff-search-user.php">User Search</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="manage.php">Manage</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="staff-user-view.php">View</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="StafViewNonRenewed.php">View None Renewed</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="staf-view-fedBack.php">FeedBack</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Log out</a>
          </li>

        </ul>
      </div>
      <div class="lang">
        <input type="button" onclick="location.href='Staff.php?lang=en';" value="<?php echo $lang['lang_en'] ?>" />
        <input type="button" onclick="location.href='Staff.php?lang=amha';" value="<?php echo $lang['lang_amha'] ?>" />
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

    <?php include("card/card-layout.php"); ?>
  </div>
  <?php include("footerN.php"); ?>


</body>

</html>
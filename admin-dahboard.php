<?php
include "db_conn.php"; ?>
<?php include("language/config.php"); ?>

<!DOCTYPE html>
<html>

<head>
  <title>Admin Dshboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="card/card.css">


</head>

<body>
  <div>
    <nav class="navbar-custom">
      <div class="header-title">
        <h3><?php echo $lang['title'] ?></h3>
      </div>
      <div class="profile"> <?php include("profile.php"); ?> </div>
    </nav>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ">
          <li class=" nav-item active">
            <a class="nav-link" href="admin-dahboard.php">Home</a>
          </li>
          <div class="dropdown">
            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Request</a>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="Admin_View_Cancel_Request.php"> Cancel</a>
              <a class="dropdown-item" href="Admin_view_user_renwed_License.php">Renewed</a>
              <a class="dropdown-item" href="Admin-Request-approve.php">Commertial registeration</a>
              <a class="dropdown-item" href="Admin-view-Staf-report.php">Report</a>

            </div>
          </div>
          <div class="dropdown">
            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              View</a>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="Admin_Set_Expire_License.php">Set license Expired </a>

            </div>
          </div>
          <li class="nav-item">
            <a class="nav-link" href="Admin-Reset-index.php">Reset Password</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Log out</a>
          </li>
        </ul>
      </div>

      <div class="lang">
        <input type="button" onclick="location.href='admin-dahboard.php?lang=en';" value="<?php echo $lang['lang_en'] ?>" />

        <input type="button" onclick="location.href='admin-dahboard.php?lang=amha';" value="<?php echo $lang['lang_amha'] ?>" />

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
<?php 
 session_start();
include "db_conn.php"; 
 include("language/config.php");
  
if (!isset($_SESSION['username']) && !isset($_SESSION['ID'])) { 

	?>
	<!DOCTYPE html>
	<html>
	<head>
 
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
 		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="style.css">
		<title>Admin Dshboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body style="background:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),
url(gonder-3.jpg)no-repeat center center fixed;background-size:cover;">
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
              <a class="dropdown-item" href="AdminViewNonRenewed.php.php"> None Renewed</a>
               <a class="dropdown-item" href="Admin_Set_Expire_License.php">Set license Expired </a>

            </div>
          </div>
          <li class="nav-item">
            <a class="nav-link" href="Admin_reset_password.php">Reset Password</a>
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
			<?php include("sidebar.php"); ?>

			<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
			<div class="navbar-light bg-light">
				<form class="border shadow p-3 rounded" action="Admin-check-login.php" method="post" style="width: 450px;">
					<h1 class="text-center p-3"><?php echo $lang['login'] ?></h1>
					<?php if (isset($_GET['error'])) { ?>
						<div class="alert alert-danger" role="alert">
							<?= $_GET['error'] ?>
						</div>
					<?php } ?>
					<div class="mb-3">
						<label for="username" class="form-label"><?php echo $lang['user name'] ?></label>
						<input type="text" class="form-control" name="username" id="username">
					</div>
					<div class="mb-3">
						<label for="password" class="form-label"><?php echo $lang['password'] ?></label>
						<input type="password" name="password" class="form-control" id="password">
					</div>
					<div class="mb-1">
						<label class="form-label"><?php echo $lang['Select-User-Type'] ?>:</label>
					</div>
					<select class="form-select mb-3" name="role" aria-label="Default select example">
						<option selected value="User"><?php echo $lang['user'] ?></option>
						<option value="Admin"><?php echo $lang['admin'] ?></option>
						<option value="Employer"><?php echo $lang['Employer'] ?></option>

					</select>
					<button type="submit" class="btn btn-primary"><?php echo $lang['login'] ?></button>
					<a href="createPass.php" class="btn btn-primary"> <?php echo $lang['createAccount'] ?></a>
					<a href="forgetPasword.php" class="btn btn-primary"> <?php echo $lang['forgetPassword'] ?></a>

				</form>
			</div>
			</div>
		</div>
		<?php include("footerN.php"); ?>

	</body>

	</html>
<?php } else {
	session_unset();
	session_destroy();
	unset($_SESSION['Tin']);
	header("Location:Admin-Reset-index.php");
}

?>
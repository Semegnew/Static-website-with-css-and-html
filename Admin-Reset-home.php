<?php
session_start();
include("language/config.php");
include "db_conn.php";
 
if (isset($_SESSION['username']) && isset($_SESSION['ID'])) {   ?>

  <!DOCTYPE html>
  <html>

  <head>
    <title>Admin Dshboard</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="card/card.css">
  </head>

  <body style="background:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),
url(gonder-3.jpg)no-repeat center center fixed;background-size:cover;">
    <div>
      <nav class="navbar-custom">
        <div class="header-title">
          <h3><?php echo $lang['title'] ?></h3>
          <?php if (isset($_GET['success'])) { ?>
				<div class="alert alert-success" role="alert">
					<?= $_GET['success'] ?>
				</div>
			<?php } ?>
      <?php if (isset($_GET['error'])) { ?>
				<div class="alert alert-error" role="alert">
					<?= $_GET['error'] ?>
				</div>
			<?php } ?>
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
          <input type="button" onclick="location.href='Admin-Reset-home.php?lang=en';" value="<?php echo $lang['lang_en'] ?>" />

          <input type="button" onclick="location.href='Admin-Reset-home.php?lang=amha';" value="<?php echo $lang['lang_amha'] ?>" />

        </div>
      </nav>


    </div>

 
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
      <?php if ($_SESSION['role'] == 'Admin') { ?>
        <!-- For Admin -->
        <div class="card" style="width: 18rem;">
          <img src="photo_2022-08-02_12-40-18.jpg" class="card-img-top" alt="admin image">
          <div class="card-body text-center">
            <h5 class="card-title">
              <?= $_SESSION['name'] ?>
            </h5>
            <a href="logout.php" class="btn btn-dark">Logout</a>
          </div>
        </div>
        <div class="p-3">
          <?php include('Admin-View-All-Account.php');
          if (mysqli_num_rows($res) > 0) { ?>

            <h1 class="display-4 fs-1 bg-white">Members</h1>
            <table class="table bg-white" style="width: 32rem;">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">User name</th>
                  <th scope="col">Role</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 1;  
                while ($rows = mysqli_fetch_assoc($res)) { ?>
                  <tr>
                    <th scope="row"><?= $i ?></th>
                    <td><?= $rows['ID'] ?></td>
                    <td><?= $rows['name'] ?></td>
                    <td><?= $rows['username'] ?></td>
                    <td><?= $rows['role'] ?></td>
                    <td>				
                      <?php
						
					 $id=$rows['ID'];
						?></td>
                    <td>
                      
    <!--popo up form-->
    <div class="panel-body">
      <button class="btn btn-primary btn float-right" data-toggle="modal" data-target="#myModal1">
      Reset Password
      </button>
      <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Reset the User name and Password</h4>
            </div>
            <form method="post">
              <div class="modal-body">
                <div class="form-group">
                  <label> User name</label>
                  <input name="newus" class="form-control" placeholder="Enter User name" value="<?= $rows['username'] ?>">
                </div>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>New Password</label>
                  <input name="newps" class="form-control" placeholder="Enter Password" value="<?= $rows['Apassword'] ?>">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" name="up" value="Reset Password" class="btn btn-primary">
             </form>

          </div>
        </div>
      </div>
      
    </div>
 
                    </td>
                  </tr>
                <?php $i++;
                } ?>
              </tbody>
            </table>
          <?php } ?>
        </div>
      <?php } else { ?>
        <?php include("user-dashboard11.php");?>
      <?php } ?>
    </div>
    <?php 
            
        if(isset($_POST['up']))
        {
          $usname = $_POST['newus'];
          $passwr = $_POST['newps'];
          $pass = md5($passwr);
          $upsql = "UPDATE trade SET username='$usname',Apassword='$pass' WHERE ID ='$id'" or die($tbl->error_reporting());
          if(mysqli_query($conn,$upsql))
          {
            echo' <script language="javascript" type="text/javascript"> alert("User name and password Reset") </script>';

           }
        
           else{
            header("Location:Admin-Reset-home.php?error=Can't Reset UserName And Password");
          }
        }
       
        ob_end_flush();
        
        ?>
  </body>

  </html>
<?php } else {
  header("Location:Admin-Reset-index.php");
} ?>


                     
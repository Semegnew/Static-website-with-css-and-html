<?php
session_start();
use Twilio\Rest\Client;
require __DIR__ . '/vendor/autoload.php';
include('user_db.php');
include('db_conn.php');
include("language/config.php");
if (isset($_GET['msg'])) 
{
    $tin = $_GET['msg']; 
    $tbl = mysqli_query($conn_reg, "SELECT *FROM rg WHERE report ='Yes';")
    or die($tbl->error_reporting());
while ($row = $tbl->fetch_assoc()) :
   $punishmnet=$row['tax']+300; 

endwhile;
    $queryy = "UPDATE rg SET tax='$punishmnet' WHERE TinNo='$tin'";
    $resultt = mysqli_query($conn_reg, $queryy);

$sid    = "AC345903b2020c25a2f8faf24aa88ffae9"; 
$token  = "605845ad7919ebb7722fee2a8f72f39c"; 
$twilio = new Client($sid, $token); 
 
$message = $twilio->messages 
                  ->create("+251985123075", // to 
                           array( 
                               "from" => "+15752543476",       
                               "body" => "Your Trade License Registaration Must Be is Renewed And Pay Tax Plus
                                 Punishment Birr 300ETB." 
                           ) 
                  ); 

    echo "<script>alert('Message is Deliverd to the Customer ');</script>";
}

if (isset($_GET['block'])) {
    $tin = $_GET['block'];
    $queryy = "UPDATE trade SET stutus ='block' WHERE TinNo='$tin'";
    $resultt = mysqli_query($conn, $queryy);

    //Trade License Status
    $tin = $_GET['block'];
    $query = "UPDATE rg SET stutus='block' WHERE tin_no='$tin'";
    $result = mysqli_query($conn_reg, $query);

    $sid    = "AC345903b2020c25a2f8faf24aa88ffae9"; 
    $token  = "605845ad7919ebb7722fee2a8f72f39c"; 
    $twilio = new Client($sid, $token); 
     
    $message = $twilio->messages 
                      ->create("+251985123075", // to 
                               array( 
                                   "from" => "+15752543476",       
                                   "body" => "Trade licence and Commertial Registration is Block." 
                               ) 
                      ); 


    header("Location:Admin-view-Staf-report.php?success=Trade licence and Commertial Registration is Block");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Request</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
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
            <a class="nav-link" href="logout.php">Log out</a>
          </li>
        </ul>
      </div>

        <div class="lang">
            <input type="button" onclick="location.href='StafViewNonRenewed.php?lang=en';" value="<?php echo $lang['lang_en'] ?>" />
            <input type="button" onclick="location.href='StafViewNonRenewed.php?lang=amha';" value="<?php echo $lang['lang_amha'] ?>" />
        </div>
    </nav>
    <?php include("sidebar.php"); ?>
    <!-- <h1 class="note_approve">Request User </h1>-->

    <div class="container" style="padding:0px;">
        <div class="container-fluid bg-success text-dark">
            <h1 class="display-4">Report None Renewed Trade License </h1>
        </div>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Tin Number</th>
                    <th scope="col">Renewed Stutus</th>
                    <th scope="col">TradeName</th>
                    <th scope="col">Status</th>
                    <th scope="col">Tax Payment Status</th>
                    <th scope="col">Photo</th>
                </tr>
            </thead>
            <?php
            $tbl = mysqli_query($conn_reg, "SELECT *FROM rg WHERE report ='Yes';")
                or die($tbl->error_reporting());

            while ($row = $tbl->fetch_assoc()) : ?>
                <tr>
                    <td> <?php echo $row['id']; ?> </td>
                    <td> <?php echo $row['customerName']; ?> </td>
                    <td> <?php echo $row['tin_no']; ?> </td>
                    <td> <?php echo $row['renewed']; ?> </td>
                    <td> <?php echo $row['tradeName']; ?> </td>
                    <td> <?php echo $row['stutus']; ?> </td>
                    <td> <?php echo $row['tax']; ?> </td>
                    <td> <img src="<?php echo "upload/" . $row['pp']; ?>" width="100px"></td>
                    <td>
                        <a href="Admin-view-Staf-report.php?msg=<?= $row['tin_no'] ?>" onclick="return confirm('Are you sure you want to Send Message?');" role="button" class="btn btn-success"> Send message </a>
                        <a href="Admin-view-Staf-report.php?block=<?= $row['tin_no']; ?>" onclick="return confirm('Are you sure you want to Block this Licence?');" role="button" class="btn btn-danger"> Block </a>
                    </td>
                </tr>
            <?php endwhile;  ?>
        </table>
    </div>
    </div>
</body>

</html>
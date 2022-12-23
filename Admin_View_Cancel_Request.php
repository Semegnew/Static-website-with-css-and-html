<?php
 use Twilio\Rest\Client; 
 require __DIR__ . '/vendor/autoload.php';
include('user_db.php');
include("language/config.php");
session_start();
if (isset($_GET['delete'])) {

  $id = $_GET['delete'];
  $sql = mysqli_query($conn_reg, "DELETE FROM rg WHERE id = $id")
    or die($sql->error_reporting());
    $sid    = "AC345903b2020c25a2f8faf24aa88ffae9"; 
    $token  = "605845ad7919ebb7722fee2a8f72f39c"; 
    $twilio = new Client($sid, $token); 
     
    $message = $twilio->messages 
                      ->create("+251985123075", // to 
                               array( 
                                   "from" => "+15752543476",       
                                   "body" => "Your Trade License Cancel Request is Suucessefuly. " 
                               ) 
                      ); 
 

}
if (isset($_GET['msg'])) {
  $id = $_GET['msg'];
    $sid    = "AC345903b2020c25a2f8faf24aa88ffae9"; 
    $token  = "605845ad7919ebb7722fee2a8f72f39c"; 
    $twilio = new Client($sid, $token); 
     
    $message = $twilio->messages 
                      ->create("+251985123075", // to 
                               array( 
                                   "from" => "+15752543476",       
                                   "body" => "Your Cancel Trade License Request faild You MUst Pay Tax." 
                               ) 
                      ); 
 
 
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" type="text/css" href="style.css">


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> trade </title>
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
        <input type="button" onclick="location.href='Admin_View_Cancel_Request.php?lang=en';" value="<?php echo $lang['lang_en'] ?>" />

        <input type="button" onclick="location.href='Admin_View_Cancel_Request.php?lang=amha';" value="<?php echo $lang['lang_amha'] ?>" />

      </div>
    </nav>


  </div>

    <div class="container center bg-success text-dark">
      <h1 class="display-4">Cancel Customer Trade License</h1>
    </div>
    <div class="container-fluid">
      <table id="example" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th> ID </th>
            <th> Custmer </th>
            <th> Region </th>
            <th> Zone</th>
            <th>Worda </th>
            <th> kebele </th>
            <th> Status </th>
            <th> Email </th>
            <th> Phone </th>
            <th> Gender </th>
            <th> Tin_NO </th>
            <th> Company Name </th>
            <th> TradeName </th>
            <th>Cancel Stutus</th>
            <th>Tax</th>
            <th>Photo</th>
            <th colspan="2"> Action </th>
          </tr>
        </thead>
        <?php
        $tbl = mysqli_query($conn_reg, "SELECT * FROM rg WHERE customerCancelStutus='Yes'") or die($tbl->error_reporting());
        while ($row = $tbl->fetch_assoc()) : ?>
          <tr>
            <td> <?php echo $row['id']; ?> </td>
            <td> <?php echo $row['customerName']; ?> </td>
            <td> <?php echo $row['region']; ?> </td>
            <td> <?php echo $row['zone']; ?> </td>
            <td> <?php echo $row['woreda']; ?> </td>
            <td> <?php echo $row['kebele']; ?> </td>
            <td> <?php echo $row['stutus']; ?> </td>
            <td> <?php echo $row['email_id']; ?> </td>
            <td> <?php echo $row['mobile_number']; ?> </td>
            <td> <?php echo $row['gender']; ?> </td>
            <td> <?php echo $row['tin_no']; ?> </td>
            <td> <?php echo $row['companyName']; ?> </td>
            <td> <?php echo $row['tradeName']; ?> </td>
            <td> <?php echo $row['customerCancelStutus']; ?> </td>
            <td> <?php echo $row['tax']; ?> </td>
            <td>
              <img src="<?php echo "upload/" . $row['pp']; ?>" width="100px">
            </td>

            <td>
              <div style="padding:5px ;">
                <a href="Admin_View_Cancel_Request.php?delete=<?= $row['id']; ?>" onclick="return confirm('Are you sure you want to Cancel this License?');" role="button" class="btn btn-danger"> Cancel </a>
              </div>
              <div>
                <a href="Admin_View_Cancel_Request.php?msg=<?= $row['id']; ?>" onclick="return confirm('Are you sure you want to Send Message?');" role="button" class="btn btn-primary"> Send Message </a>
              </div>
            </td>
          </tr>
        <?php endwhile;  ?>
      </table>
    </div>
 </body>

</html>
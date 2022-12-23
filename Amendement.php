<?php
session_start();
include("language/config.php");
include('user_db.php');

$customerName = "";
$region = " ";
$zone = " ";
$worda = "";
$kebele = " ";
$cityy = " ";
$email = " ";
$phone = " ";
$gender = " ";
$campname = " ";
$trade_name = " ";
$photo = " ";
$update = false;

if (isset($_POST['save'])) {
  $customerName = $_POST['Customer'];
  $region = $_POST['Region'];
  $zone = $_POST['zone'];
  $worda = $_POST['Worda'];
  $kebele = $_POST['Kebele'];
  $cityy = $_POST['Cityy'];
  $email = $_POST['Email'];
  $phone = $_POST['PhoneNumber'];
  $gender = $_POST['Gender'];
  $campname = $_POST['campname'];
  $trade_name = $_POST['TradeName'];
  $imgName = $_FILES['PP']['name'];
  $temp = $_FILES['PP']['tmp_name'];
  move_uploaded_file($temp, "upload/$imgName");

  $sql = mysqli_query($conn_reg, "INSERT INTO rg VALUES('', '$customerName', '$region', '$zone', '$worda', '$kebele',
     '$cityy', '$email','$phone','$gender','$campname','$trade_name','$imgName','Pending')")
    or die($sql->error_reporting());

   header("Location:Amendement.php?success=Your Amendment Successfuly");

}


if (isset($_GET['edit'])) {
  $update = true;
  $id = $_GET['edit'];
   $tableResult = mysqli_query($conn_reg, "SELECT * FROM rg WHERE id ='$id'")
    or die($tableResult->error_reporting());

  $row = $tableResult->fetch_array();
  $customerName = $row['customerName'];
  $region = $row['region'];
  $zone = $row['zone'];
  $worda = $row['woreda'];
  $kebele = $row['kebele'];
  $cityy = $row['city'];
  $email = $row['email_id'];
  $phone = $row['mobile_number'];
  $gender = $row['gender'];
  $campname = $row['companyName'];
  $trade_name = $row['tradeName'];
  $photo = $row['pp'];
}

if (isset($_POST['update'])) {
  $customerName = "";
  $region = " ";
  $zone = " ";
  $worda = "";
  $kebele = " ";
  $cityy = " ";
  $email = " ";
  $phone = " ";
  $gender = " ";
  $campname = " ";
  $trade_name = " ";
  $photo = " ";
  $_GET['edit'] = $_SESSION['id'];
  $id = $_GET['edit'];

  $customerName = $_POST['Customer'];
  $region = $_POST['Region'];
  $zone = $_POST['zone'];
  $worda = $_POST['Worda'];
  $kebele = $_POST['Kebele'];
  $Cityy = $_POST['Cityy'];
  $email = $_POST['Email'];
  $phone = $_POST['PhoneNumber'];
  $gender = $_POST['Gender'];
  $campname = $_POST['campname'];
  $trade_name = $_POST['TradeName'];
  $imgName = $_FILES['PP']['name'];
  $temp = $_FILES['PP']['tmp_name'];
  move_uploaded_file($temp, "upload/$imgName");

  $sql = mysqli_query($conn_reg, "UPDATE rg SET  customerName ='$customerName',region ='$region',zone ='$zone',woreda ='$worda'
   ,kebele='$kebele',city='$Cityy',email_id='$email',mobile_number='$phone',gender='$gender',companyName='$campname' ,tradeName='$trade_name',pp='$imgName' WHERE id ='$id'")
    or die($sql->error_reporting());
    header("Location:Amendement.php?success=Your Amendment Update Successfuly");}
?>
<!DOCTYPE html>
<html>

<head>
  <title><?php echo $lang['login'] ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">
  
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
  <nav class="navbar-custom">
    <div class="header-title">
      <h3><?php echo $lang['title']; ?></h3>
      <?php if (isset($_GET['error'])) { ?>
						<div class="alert alert-danger" role="alert">
							<?= $_GET['error'] ?>
						</div>
					<?php } ?>
          <?php if (isset($_GET['success'])) { ?>
						<div class="alert alert-success" role="alert">
							<?= $_GET['success'] ?>
						</div>
					<?php } ?>
    </div>
    <div class="profile">
      <?php include("profile.php"); ?>
    </div>
    <div class="lang">
      <input type="button" onclick="location.href='Amendement.php?lang=en';" value="<?php echo $lang['lang_en'] ?>" />
      <input type="button" onclick="location.href='Amendement.php?lang=amha';" value="<?php echo $lang['lang_amha'] ?>" />
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
                                   <a class="dropdown-item" href="#">Print</a>
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
          </ul>
          </div>
   </div>
     </nav>
     </div>
  <div class="container">
    <div class="bg-success text-dark">
      <h1>Amendment Form</h1>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-3">
          <label for="name">Customer </label>
          <input type="text" name="Customer" id="name" class="form-control" value="<?php echo $customerName; ?>" required>
        </div>
        <div class="col-md-3">
          <label for="last_name">Region </label>
          <input type="text" name="Region" id="last_name" class="form-control" value="<?php echo $region; ?>" required>
        </div>
        <div class="col-md-3">
          <label for="dzone"> zone </label>
          <input type="text" name="zone" id="zone" class="form-control" value="<?php echo $zone; ?>" required>
        </div>
        <div class="col-md-3">
          <label for=" region"> Woreda</label>
          <input type="text" name="Worda" id="region" class="form-control" value="<?php echo $worda; ?>" required>
        </div>
        <div class="col-md-3">
          <label for="trade_type">Kebele </label>
          <input type="text" name="Kebele" id="trade_type" class="form-control" value="<?php echo $kebele; ?>" required>
        </div>
        <div class="col-md-3">
          <label for=" tin_no"> City </label>
          <input type="text" name="Cityy" id=" tin_no" class="form-control" value="<?php echo $cityy; ?>" required>
        </div>

        <div class="col-md-3">
          <label for=" tin_no">Email </label>
          <input type="text" name=" Email" id=" tin_no" class="form-control" value="<?php echo $email; ?>" required>
        </div>
        <div class="col-md-3">
          <label for=" tin_no"> PhoneNumber </label>
          <input type="text" name=" PhoneNumber" id=" tin_no" class="form-control" value="<?php echo $phone; ?>" required>
        </div>
        <div class="col-md-3">
          <label for=" tin_no"> Gender </label>
          <input type="text" name=" Gender" id=" tin_no" class="form-control" value="<?php echo $gender; ?>" required>
        </div>

        <div class="col-md-3">
          <label for=" tin_no">Company Name </label>
          <input type="text" name="campname" id=" tin_no" class="form-control" value="<?php echo $campname; ?>" required>
        </div>
        <div class="col-md-3">
          <span>Legal Condition:</span>
          <select name="TradeName" style="padding-bottom:15px; padding-left:55px; text-align:40px; ">
            <option value="Private">Private</option>
            <option value="Private Limited Compan">Private Limited Company</option>
            <option value="Share Company">Share Company</option>
            <option value="Comertial Representative">Comertial Representative</option>
            <option value="Public EnterPrise">Public EnterPrise</option>
            <option value="Partnership">Partnership</option>
          </select>

        </div>

        <div class="col-md-3">
          <label>Photo</label>
          <input type="file" name="PP" class="form-control" value="<?php echo $PP; ?>" required>
        </div>

      </div>
      <br>
      <div class="row">
        <div class="form-group">
          <?php if ($update == true) : $_SESSION['id'] = $_GET['edit'];  ?>
            <button type="submit" name="update" class="btn btn-info"> &nbsp;
              Update </button>
          <?php else :   ?>
            <button type="submit" name="save" class="btn btn-success">Save </button> &nbsp;
          <?php endif;   ?>
   
        </div>
      </div>
    </form>
  </div>
  <br>
  </div>
  <div class="  bg-success text-dark">
    <h1 class="display-4">Trade License Amnedment Table </h1>
  </div>
  <div class="container">
    <table id="example" class="table table-striped table-bordered">
      <thead>
        <tr>
          <th> ID </th>
          <th> Custmer </th>
          <th> Region </th>
          <th> Zone</th>
          <th>Worda </th>
          <th> kebele </th>
          <th> City </th>
          <th> Email </th>
          <th> Phone </th>
          <th> Gender </th>
          <th> Tin_NO </th>
          <th> Company Name </th>
          <th> TradeName </th>
          <th>Photo</th>
          <th>Status</th>

          <th colspan="2"> Action </th>
        </tr>
      </thead>
      <?php
      $tin = $_SESSION['Tin'];
      $tbl = mysqli_query($conn_reg, "SELECT * FROM rg WHERE tin_no='$tin'") or die($tbl->error_reporting());
      while ($row = $tbl->fetch_assoc()) : ?>
        <tr>
          <td> <?php echo $row['id']; ?> </td>
          <td> <?php echo $row['customerName']; ?> </td>
          <td> <?php echo $row['region']; ?> </td>
          <td> <?php echo $row['zone']; ?> </td>
          <td> <?php echo $row['woreda']; ?> </td>
          <td> <?php echo $row['kebele']; ?> </td>
          <td> <?php echo $row['city']; ?> </td>
          <td> <?php echo $row['email_id']; ?> </td>
          <td> <?php echo $row['mobile_number']; ?> </td>
          <td> <?php echo $row['gender']; ?> </td>
          <td> <?php echo $row['tin_no']; ?> </td>
          <td> <?php echo $row['companyName']; ?> </td>
          <td> <?php echo $row['tradeName']; ?> </td>
          <td>
            <img src="<?php echo "upload/" . $row['pp']; ?>" width="100px">
          </td>
          <td> <?php echo $row['stutus']; ?> </td>
          <td>
            <a href="Amendement.php?edit=<?php echo $row['id']; ?>" class="btn btn-info" onclick="return confirm('Are you sure you want to Amendment this record?');" role="button"> edit </a>
          </td>
        </tr>

      <?php endwhile;  ?>

    </table>
  </div>

  </div>

</body>

</html>
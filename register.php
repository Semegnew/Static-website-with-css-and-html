<?php
session_start();
include("language/config.php");
include('db_conn.php');
include('user_db.php');

if (isset($_POST['submit'])) {
  $customerName = $_POST['CustomerName'];
  $region = $_POST['region'];
  $zone = $_POST['zone'];
  $worda = $_POST['worda'];
  $kebele = $_POST['kebele'];
  $city = $_POST['Cityy'];
  $email = $_POST['email'];
  $phone = $_POST['phonenumber'];
  $gender = $_POST['Gender'];
  $TIN_NUM = $_POST['Tin-REG'];
  $cmpName = $_POST['campName'];
  $capital = $_POST['capital'];
  $trade_name = $_POST['Trade_name'];
  $imgName = $_FILES['pp']['name'];
  $temp = $_FILES['pp']['tmp_name'];

  move_uploaded_file($temp, "upload/$imgName");
  if (!preg_match("/^[a-zA-Z\s]+$/", $customerName)) {
    echo "<script>alert('Please Enter Name As Only String');</script>";
  }
  if (!preg_match("/^[a-zA-Z\s]+$/", $region)) {
    echo "<script>alert('Please Enter Name As Only String');</script>";
  }

  $kebele = $_POST['kebele'];
  if (!preg_match("/^[0-9]*$/", $kebele)) {
    echo "<script>alert('Please Enter As Only Number');</script>";
  }
  $phone = $_POST['phonenumber'];
  if (!preg_match("/^[0-9]*$/", $phone)) {
    echo "<script>alert('Please Enter Mobile As Only Number');</script>";
  }
  $cmpName = $_POST['campName'];
  if (!preg_match("/^[a-zA-Z\s]+$/", $cmpName)) {
    echo "<script>alert('Please Enter Name As Only String');</script>";
  }
  if (!preg_match("/^[0-9]*$/", $capital)) {
    echo "<script>alert('Capital Birr As Only Number');</script>";
  }
  $tbl = mysqli_query($conn, "SELECT *FROM trade WHERE TinNo = '$TIN_NUM'") or die($tbl->error_reporting());
  $resultTrade = $tbl->fetch_assoc();
  
  if (empty($resultTrade)) {
    header("Location:register.php?error=Tin Number is Dosn't Match");
    //echo "<script>alert('Commertial Tin Number And License Tin Number Does't Match');</script>";
  } 
  else {
    $select = "SELECT * FROM rg WHERE tin_no = '$TIN_NUM'";
    $result = mysqli_query($conn_reg, $select);
    if (mysqli_num_rows($result) > 0) {
      header("Location:register.php?error=Tin Number Already Taken!");
    } else {
     // $tax = $capital * 15 / 100;
      $tax=1;
      $Taxcon = $tax;
      if ($Taxcon == 3) {
        $TaxScon = "A";

        $query = "INSERT INTO rg VALUES('','$customerName','$region','$zone','$worda','$kebele','$city','$email','$phone',
            '$gender','$TIN_NUM','$cmpName','$trade_name','$imgName','Approved','','$capital','$tax','$TaxScon','No','renewed')";
        $data = mysqli_query($conn_reg, $query) or die($tbl->error_reporting());

        if ($data) {
          
          header("Location:register.php?success=Trade License Registerion Successfuly");
       
        } else {
           header("Location:register.php?error=Data Not Inserted");
          //exit();
        }
      } elseif ($Taxcon==1) {
         $TaxScon = "B";

        $query = "INSERT INTO rg VALUES('','$customerName','$region','$zone','$worda','$kebele','$city','$email','$phone',
            '$gender','$TIN_NUM','$cmpName','$trade_name','$imgName','Approved','$capital','$tax','$TaxScon','No','renewed','No')";
        $data = mysqli_query($conn_reg, $query) or die($tbl->error_reporting());

        if ($data) {
           header("Location:register.php?success=Trade License Registerion Successfuly");
        } else {
          echo "<script>alert('Data Not Inserted');</script>";
          //exit();
        }
      }
    }
  }
}  



?>
<!DOCTYPE html>
<html>

<head>
  <title><?php echo $lang['register'] ?></title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  <!-- user dashboard boot-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

  <nav class="navbar-custom">
    <div class="header-title">
      <h3><?php echo $lang['title']; ?></h3>

    </div>
    <div class="profile">
      <?php include("profile.php"); ?>
    </div>
    <div class="lang">
      <input type="button" onclick="location.href='register.php?lang=en';" value="<?php echo $lang['lang_en'] ?>" />
      <input type="button" onclick="location.href='register.php?lang=amha';" value="<?php echo $lang['lang_amha'] ?>" />
    </div>
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
          </div>
          </ul>
          </div>

     </nav>
     </div>
  <?php include("sidebar.php"); ?>

  <div class="container"  >
    <h1><?php echo $lang['Trade Licence Registration'] ?> </h1>

    <form class="myForm" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-3">
          <label><?php echo $lang['FullName']?></label>
          <input type="text" name="CustomerName" class="form-control" required>
        </div>
        <div class="col-md-3">
          <label><?php echo $lang['Region']?> </label>
          <input type="text" name="region" class="form-control" required>
        </div>
        <div class="col-md-3">
          <label for="dzone"> <?php echo $lang['zone']?> </label>
          <input type="text" name="zone" id="zone" class="form-control" required>
        </div>
        <div class="col-md-3">
          <label><?php echo $lang['Woreda']?></label>
          <input type="text" name="worda" class="form-control" required>
        </div>
        <div class="col-md-3">
          <label><?php echo $lang['Kebele']?></label>
          <input type="text" name="kebele" class="form-control" required>
        </div>
        <div class="col-md-3">
          <label><?php echo $lang['City']?></label>
          <input type="text" name="Cityy" class="form-control" required>
        </div>

        <div class="col-md-3">
          <label> <?php echo $lang['Email']?> </label>
          <input type="email" name="email" class="form-control" required>
        </div>
        <div class="col-md-3">
          <label><?php echo $lang['PhoneNumber']?></label>
          <input type="number" name="phonenumber" class="form-control" required>
        </div>
        <div class="col-md-3">
          <label><?php echo $lang['tin number']?></label>
          <input type="text" name="Tin-REG" class="form-control" required>
        </div>
        <div class="col-md-3">

          <label for="Gender"><?php echo $lang['Gender']?></label>
          <select name="Gender">
            <option value="male">Male</option>
            <option value="female">Female</option>

          </select>
        </div>
        <div class="col-md-3">
          <label for=" tin_no"><?php echo $lang['companyName']?> </label>
          <input type="text" name="campName" class="form-control" required>
        </div>
        <div class="col-md-3">
          <label for=" tin_no"><?php echo $lang['capital']?></label>
          <input type="text" name="capital" class="form-control" required>
        </div>
        <div class="col-md-3">
          <label>
            <span> <?php echo $lang['legalcondtion']?>:</span>
            <select name="Trade_name" style="padding-bottom:15px; padding-left:55px; text-align:40px; ">
              <option value="Private">Private</option>
              <option value="Private Limited Compan">Private Limited Company</option>
              <option value="Share Company">Share Company</option>
              <option value="Comertial Representative">Comertial Representative</option>
              <option value="Public EnterPrise">Public EnterPrise</option>
              <option value="Partnership">Partnership</option>
            </select>
          </label>
        </div>
        <div class="col-md-3">
          <label>Photo</label>
          <input type="file" name="pp" class="form-control">
        </div>

        <div class="col-md-3" style="padding-top:23px; padding-left:2px;">
          <input id="form-control" class="btn btn-primary" type="submit" name="submit" value="Register">
        </div>
      </div>
    </form>

  </div>

</body>

</html>
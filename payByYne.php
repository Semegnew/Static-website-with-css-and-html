<?php
session_start();
include("language/config.php");
include "user_db.php";
if (isset($_POST['submit'])) {
     $condition = $_POST['Tax-condition'];
     $tin = $_POST['tin-no'];
     $TaxPayAmount = $_POST['amount'];

     if (empty($tin)) {
          header("Location:payByYne.php?error=Tin Number is Required");
     } else {

          $sql = "SELECT *FROM rg WHERE tin_no='$tin'";

          $result = mysqli_query($conn_reg, $sql);

          if (mysqli_num_rows($result) == 1) {
               $row = mysqli_fetch_assoc($result);
               if ($row['tin_no'] == $tin && $row['Condition'] == $condition && $row['tax'] == $TaxPayAmount) {

                    $TaxPayTin = $row['tin_no'];
                    $TaxPayCondition = $row['Condition'];
                    $TaxPayAmount = $row['tax'];
                    echo ' 
<span>በ </span>
<a id="yenepayLogo" href="https://www.yenepay.com/checkout/Home/Process/?ItemName=' . $TaxPayCondition .
                         '&ItemId=' . $TaxPayTin . '&UnitPrice=' . $TaxPayAmount .
                         '&Quantity=1
&Process=Express&ExpiresAfter=&DeliveryFee=&HandlingFee=&Tax1=&Tax2=&Discount=
&SuccessUrl=http://localhost:8080/project/success.php&IPNUrl=&MerchantId=14344">
    <img style="width:100px" src=" https://yenepayprod.blob.core.windows.net/images/logo.png">
</a>
<span> ይክፈሉ</span>';
               } else {
                    header("Location:payByYne.php?error=Already Payment is Paid");
               }
          } else {
               header("Location:payByYne.php?error=Incorect Tin Number");
          }
     }
}

?>

<!DOCTYPE html>
<html>


<head>
     <title>Pay By YnePay</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body style="background:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),
url(gonder-3.jpg)no-repeat center center fixed;background-size:cover;">
     <!--header to paytax.php -->
     <nav class="navbar-custom">
          <div class="header-title">
               <h3><?php echo $lang['title']; ?></h3>

          </div>
          <div class="profile">
               <?php include("profile.php"); ?>
          </div>
          <div class="lang">
               <input type="button" onclick="location.href='payByYne.php?lang=en';" value="<?php echo $lang['lang_en'] ?>" />
               <input type="button" onclick="location.href='payByYne.php?lang=amha';" value="<?php echo $lang['lang_amha'] ?>" />
          </div>
     </nav>
     <?php if (isset($_GET['error'])) { ?>
          <div class="alert alert-danger" role="alert">
               <?= $_GET['error'] ?>
          </div>
     <?php } ?>
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
                                   <a class="dropdown-item" href="Print_info.php">Print</a>
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

     <form class="border shadow p-3 rounded container justify-content-center align-items-center text-dark bg-light" style="width:40%; height:50%;margin-top:30px;" method="post">
          <h1 class="text-center p-3"><?php echo $lang['Tax Payment Form'] ?></h1>
          <div class="form-group">
               <label><?php echo $lang['taxCondition'] ?></label>
               <input type="text" name="Tax-condition" class="form-control" placeholder="Enter your Tax type" required>
          </div>
          <div class="form-group">
               <label><?php echo $lang['tin number'] ?></label>
               <input type="text" name="tin-no" class="form-control" placeholder="Enter your Tin Number">
          </div>
          <div class="form-group">
               <label><?php echo $lang['TaxpayBirr'] ?></label>
               <input type="text" name="amount" class="form-control" placeholder="Enter Pay Birr" required>
          </div>
          <div class="form-group">

               <button name="submit" style="cursor:pointer;">
                    <span>በ </span>
                    <img style="width:100px" src=" https://yenepayprod.blob.core.windows.net/images/logo.png">
                    </a>
               </button>
          </div>
     </form>

</body>


</html>
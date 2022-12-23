
<?php
session_start();
include("../language/config.php");
include('../user_db.php');
// Include the database configuration file
require_once '../user_db.php';

// Fetch the users from the database
$tin=$_SESSION['Tin'];
$result = $conn_reg->query("SELECT *FROM rg WHERE tin_no='$tin'") or die($tbl->error_reporting());
if(empty($result)){
    header("Location:user-dashboard.php?error=Tin Number is Dosn't Find");
}
?>

<!DOCTYPE html>
 <html>
 <head>
 <link rel="stylesheet" type="text/css" href="../paymentTax.css">
     <link rel="stylesheet" type="text/css" href="../style.css">

     <title><?php echo $lang['title'] ?></title>
     <!-- user dashboard bootstrap-->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

   <script>
$(document).ready(function(){
    $('#getUser').on('click',function(){
        var userID = $('#userSelect').val();
        $('#userInfo').load('getData.php?tin='+userID,function(){
            var printContent = document.getElementById('userInfo');
            var WinPrint = window.open('', '', 'width=900,height=650');
            WinPrint.document.write(printContent.innerHTML);
            WinPrint.document.close();
            WinPrint.focus();
            WinPrint.print();
            WinPrint.close();
        });
    });
});
</script>
 
 </head>
 <body>
 
 <nav class="navbar-custom">
          <div class="header-title">
               <h3><?php echo $lang['title']; ?></h3>

          </div>
          <div class="profile">
               <?php include("../profile.php"); ?>
          </div>
          <?php if (isset($_GET['success'])) { ?>
						<div class="alert alert-success" role="alert">
							<?= $_GET['success'] ?>
						</div>
					<?php } ?>
          <div class="lang">
               <input type="button" onclick="location.href='user-dashboard11.php?lang=en';" value="<?php echo $lang['lang_en'] ?>" />
               <input type="button" onclick="location.href='user-dashboard11.php?lang=amha';" value="<?php echo $lang['lang_amha'] ?>" />
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

                   <!-- <li class="nav-item">
                         <a class="nav-link" href="Amendement.php">
                              </a>
                    </li>-->
                    <div class="dropdown">
                              <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <?php echo $lang['amendment'] ?></a>
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                   <a class="dropdown-item" href="#">Trade Name</a>
                                   <a class="dropdown-item" href="Amendement.php">Amendment Trade License</a>
                              </div>
                         </div>
                    <li class="nav-item">
                         <a class="nav-link" href="Login_CmpName.php"><?php echo $lang['Company'] ?></a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="payByYne.php"><?php echo $lang['pay'] ?></a>
                    </li>
                
                    <li class="nav-item">
                         <a class="nav-link" href="CustomerRenewedRequestLicense.php">Request Renewed</a>
                    </li>

                    <li>
                         <div class="dropdown">
                              <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   Cancel Request
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                   <a class="dropdown-item" href="#">Trade Name</a>
                                   <a class="dropdown-item" href="RequestCancelLicense.php">Trade License</a>
                              </div>
                         </div>
                         <li class="nav-item">
                         <a class="nav-link" href="Feedback.php">FeedBack</a>
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

          <div class="card">
               <div class="image">
                    <img src="gondar4.webp">
               </div>

               <div class="title">
                    <h1> <?php echo $lang['Wellcome'] ?></h1>
               </div>
               <div class="des">
                    <p><?php echo $lang['description1'] ?></p>
                    <button onclick="window.location.href='Login_index.php'"><?php echo $lang['login'] ?></button>
                    <button onclick="window.location.href='Login_index.php'"><?php echo $lang['register'] ?></button>
               </div>
          </div>
          <div class="card">
               <div class="image">
                    <img src="gondar1.jpg">
               </div>

               <div class="title">
                    <h1> <?php echo $lang['Wellcome'] ?></h1>
               </div>
               <div class="des">
                    <p> <?php echo $lang['description1'] ?></p>
                    <button onclick="window.location.href='payByYne.php'"><?php echo $lang['pay'] ?></button>
                    <button onclick="window.location.href='Login_index.php'"><?php echo $lang['register'] ?></button>
               </div>
          </div>
     </div>
<!-- Dropdown to select the user -->
<select id="userSelect">
    <option value="">Select User</option>
    <?php while($row = $result->fetch_assoc()){ ?>
    <option value="<?php echo $row['tin_no']; ?>"><?php echo $row['customerName']; ?></option>
    <?php } ?>
</select>

<!-- Print button -->
<button id="getUser">Print Details</button>

<!-- Hidden div to load the dynamic content -->
<div id="userInfo" style="display: none;"></div>
 </body>
 </html>
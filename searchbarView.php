<?php
session_start();
include("language/config.php");

?>

<!doctype html>
<html lang="en">

<head>
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>User View</title>
      <link rel="stylesheet" type="text/css" href="style.css">

     <title><?php echo $lang['title'] ?></title>
     <!-- user dashboard bootstrap-->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>

<body >
<nav class="navbar-custom">
          <div class="header-title">
               <h3><?php echo $lang['title']; ?></h3>

          </div>
          <div class="profile">
               <?php include("profile.php"); ?>
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
    <div>
        <div class="row bg-dark">
            <div class="col-md-12 bg-dark">
                <div class="card mt-4 bg-dark container">
                    <div class="card-body bg-success">
                        <div class="row">
                            <div class="col-md-7  bg-success">

                                <form action="" method="GET">
                                    <div class="input-group mb-3 container ">
                                        <input type="text" name="search" required value="<?php if (isset($_GET['search'])) {
                                                                                                echo $_GET['search'];
                                                                                            } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table  id="example" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID </th>
                                    <th>Custmer </th>
                                    <th>Region </th>
                                    <th>Zone</th>
                                    <th>Worda </th>
                                    <th>kebele </th>
                                    <th>City </th>
                                    <th>Email </th>
                                    <th>Phone </th>
                                    <th>CompanyName </th>
                                    <th>TradeName </th>
                                    <th>Status</th>
                                    <th>Tin</th>
                                    <th>Renewed</th>
                                    <th>License Level</th>
                                    <th>Tax</th>

                                    <th>Photo</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $con = mysqli_connect("localhost", "root", "", "reg");

                                if (isset($_GET['search'])) {
                                    $Tin = $_GET['search'];
                                    $query = "SELECT * FROM rg WHERE tin_no='$Tin'";
                                    $query_run = mysqli_query($con, $query);

                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $items) {
                                ?>
                                            <tr>
                                                <td> <?php echo $items['id']; ?> </td>
                                                <td> <?php echo $items['customerName']; ?> </td>
                                                <td> <?php echo $items['region']; ?> </td>
                                                <td> <?php echo $items['zone']; ?> </td>
                                                <td> <?php echo $items['woreda']; ?> </td>
                                                <td> <?php echo $items['kebele']; ?> </td>
                                                <td> <?php echo $items['city']; ?> </td>
                                                <td> <?php echo $items['email_id']; ?></td>
                                                <td> <?php echo $items['mobile_number']; ?></td>
                                                <td> <?php echo $items['companyName']; ?></td>
                                                <td> <?php echo $items['tradeName']; ?> </td>
                                                <td> <?php echo $items['stutus']; ?> </td>
                                                <td> <?php echo $items['tin_no']; ?> </td>
                                                <td> <?php echo $items['renewed']; ?> </td>
                                                <td> <?php echo $items['Condition']; ?> </td>
                                                <td> <?php echo $items['tax']; ?> </td>


                                                <td>
                                                    <img src="<?php echo "upload/" . $items['pp']; ?>" width="100px">
                                                </td>

                                            </tr>

                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="4">No Record Found</td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
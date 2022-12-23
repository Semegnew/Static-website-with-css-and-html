  <?php
  session_start();
  include('user_db.php');
  include("language/config.php");

  $customerName = "";
  $region = " ";
  $zone = " ";
  $worda = "";
  $kebele = " ";
  $cityy = " ";
  $email = " ";
  $phone = " ";
  $gender = " ";
  $userName = " ";
  $trade_name = " ";
  $photo = " ";
  $update = false;
  $Tin = '';

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
    $userName = $_POST['userName'];
    $trade_name = $_POST['TradeName'];
    $imgName = $_FILES['PP']['name'];
    $temp = $_FILES['PP']['tmp_name'];
    move_uploaded_file($temp, "upload/$imgName");

    $sql = mysqli_query($conn_reg, "INSERT INTO rg VALUES('', '$customerName', '$region', '$zone', '$worda', '$kebele',
    '$cityy', '$email','$phone','$gender','$userName','$trade_name','$imgName','Pending')")
      or die($sql->error_reporting());
    echo '<br> <div class="container"> <div class="alert alert-success"> Registered Successfully.  </div> </div> ';
  }
  if (isset($_GET['edit'])) {
    $update = true;
    $id = $_GET['edit'];
    $tableResult = mysqli_query($conn_reg, "SELECT * FROM rg WHERE id = '$id'")
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
    $userName = $row['username'];
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
    $userName = " ";
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
    $userName = $_POST['userName'];
    $trade_name = $_POST['TradeName'];
    $imgName = $_FILES['PP']['name'];
    $temp = $_FILES['PP']['tmp_name'];
    move_uploaded_file($temp, "upload/$imgName");

    $sql = mysqli_query($conn_reg, "UPDATE rg SET  customerName ='$customerName',region = '$region',zone ='$zone',woreda ='$worda'
  ,kebele='$kebele',city='$Cityy',email_id='$email',mobile_number='$phone' ,gender='$gender' ,username='$userName' ,tradeName='$trade_name',pp='$imgName' WHERE id='$id'")
      or die($sql->error_reporting());
    echo '<br> <div class="container"> <div class="alert alert-info"> Record Has Been Updated Successfully!  </div> </div>';
  }

  if (isset($_GET['delete'])) {

    $id = $_GET['delete'];
    $sql = mysqli_query($conn_reg, "DELETE FROM rg WHERE id = '$id'")
      or die($sql->error_reporting());
    echo '<br> <div class="container"> <div class="alert alert-info"> Record has been Deleted Successfully!  </div> </div>';
  }
  if (isset($_POST['search'])) {
    $Tin = $_POST['tin'];
  }


  if (isset($_GET['print'])) {

    $_session['id-user'] = $_GET['print'];
    $userid = $_session['id-user'];
  }

  ?>
  <!DOCTYPE html>
  <html>

  <head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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
        <input type="button" onclick="location.href='view-user-account.php?lang=en';" value="<?php echo $lang['lang_en'] ?>" />
        <input type="button" onclick="location.href='view-user-account.php?lang=amha';" value="<?php echo $lang['lang_amha'] ?>" />
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
                                   Cancel
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                   <a class="dropdown-item" href="#">Trade Name</a>
                                   <a class="dropdown-item" href="RequestCancelLicense.php">Trade License</a>
                              </div>
                         </div>

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
 
    <div class="container bg-success text-dark">
      <h1 class="display-4"> Trade </h1>
    </div>
    <div>
      <table id="example" class="table table-striped table-bordered">
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
            <th>Photo</th>
        
          </tr>
        </thead>
        <?php
        $tin = $_SESSION['Tin'];
        $tbl = mysqli_query($conn_reg, "SELECT * FROM rg WHERE tin_no='$tin'") or die($tbl->error_reporting());
        while ($row = $tbl->fetch_assoc()) : ?>

          <tr id="user-id">
            <td> <?php echo $row['id']; ?> </td>
            <td> <?php echo $row['customerName']; ?> </td>
            <td> <?php echo $row['region']; ?> </td>
            <td> <?php echo $row['zone']; ?> </td>
            <td> <?php echo $row['woreda']; ?> </td>
            <td> <?php echo $row['kebele']; ?> </td>
            <td> <?php echo $row['city']; ?> </td>
            <td> <?php echo $row['email_id']; ?></td>
            <td> <?php echo $row['mobile_number']; ?></td>
            <td> <?php echo $row['companyName']; ?></td>
            <td> <?php echo $row['tradeName']; ?> </td>
            <td> <?php echo $row['stutus']; ?> </td>
            <td> <?php echo $row['tin_no']; ?> </td>
            <td> <?php echo $row['renewed']; ?> </td>
            <td>
              <img src="<?php echo "upload/" . $row['pp']; ?>" width="100px">
            </td>
            
          </tr>
 
        <?php endwhile;  ?>
      </table>
    </div>
  </body>
  </html>
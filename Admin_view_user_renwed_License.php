<?php
session_start();
include('user_db.php');
include("language/config.php");


if (isset($_GET['renewed'])) {
    $id = $_GET['renewed'];

    $query = "UPDATE rg SET renewed='Yes' WHERE id='$id'";
    $result = mysqli_query($conn_reg, $query);
    /*include("request sms.php");*/

    echo "<script>alert('Approved...Successefuly Renewed License ');</script>";
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $query = "DELETE FROM rg WHERE id='$id'";
    $result = mysqli_query($conn_reg, $query);
    echo "<script>alert('licence is Delete');</script>";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Request</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
<div>
    <nav class="navbar-custom">
      <div class="header-title">
        <h3><?php echo $lang['title']?></h3>
      </div> <div class="profile"> <?php include("profile.php"); ?>  </div>
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
        <input type="button" onclick="location.href='Admin_view_user_renwed_License.php?lang=en';" value="<?php echo $lang['lang_en'] ?>" />

        <input type="button" onclick="location.href='Admin_view_user_renwed_License.php?lang=amha';" value="<?php echo $lang['lang_amha'] ?>" />

      </div>
    </nav>


  </div>




    <?php include("sidebar.php"); ?>
    <!-- <h1 class="note_approve">Request User </h1>-->

    <div class="container-fluid">
        <div class="container bg-success text-dark">
            <h1 class="display-4">Customer Request To Renwed </h1>
        </div>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">id</th>
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
            $tbl = mysqli_query($conn_reg, "SELECT *FROM rg WHERE renewed ='RequestRenewed'")
                or die($tbl->error_reporting());

            while ($row = $tbl->fetch_assoc()) : ?>
                <tr>
                    <td> <?php echo $row['id']; ?> </td>
                    <td> <?php echo $row['customerName']; ?> </td>
                    <td> <?php echo $row['tin_no']; ?> </td>
                    <td> <?php echo $row['renewed']; ?> </td>
                    <td> <?php echo $row['tradeName']; ?> </td>
                    <td> <?php echo $row['status']; ?> </td>
                    <td> <?php echo $row['tax']; ?> </td>
                    <td> <img src="<?php echo "upload/" . $row['pp']; ?>" width="100px"></td>
                    <td>
                        <a href="Admin_view_user_renwed_License.php?renewed=<?= $row['id']; ?>" onclick="return confirm('Are you sure you want to Renewed License?');" role="button" class="btn btn-success"> Renewed</a>
                        <a href="Admin_view_user_renwed_License.php?delete=<?= $row['id']; ?>" onclick="return confirm('Are you sure you want to Delete this Licence?');" role="button" class="btn btn-danger"> Delete </a>
                    </td>
                </tr>
            <?php endwhile;  ?>
        </table>
    </div>
    </div>
</body>

</html>
<?php
include('user_db.php');
include("language/config.php");

?>


<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>View User</title>
</head>

<body>
  <nav class="navbar-custom">
    <div class="header-title">
      <h3>Trade License Mangement system For Gondar City to Revenu Office</h3>
    </div>



  </nav>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">


    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ">
        <li class=" nav-item active">
          <a class="nav-link" href="index_home.php">Home<span class="sr-only">(current)</span></a>
        </li>
        <li class=" nav-item ">
          <a class="nav-link" href="Request-approve.php">Create Account </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user.php">Register</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="logout.php">Log out</a>
        </li>

      </ul>
    </div>

    <div class="lang">
      <input type="button" onclick="location.href='index_home.php?lang=en';" value="<?php echo $lang['lang_en'] ?>" />

      <input type="button" onclick="location.href='index_home.php?lang=amha';" value="<?php echo $lang['lang_amha'] ?>" />

    </div>
  </nav>
  <div class="admin-container" style="margin-top:90px; margin-left:30px;">
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
          <th> UserName </th>
          <th> TradeName </th>
          <th>Photo</th>
          <th>Status</th>

          <th colspan="2"> Action </th>
        </tr>
      </thead>
      <?php
      $tbl = mysqli_query($conn_reg, "SELECT * FROM rg") or die($tbl->error_reporting());
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
          <td> <?php echo $row['username']; ?> </td>
          <td> <?php echo $row['tradeName']; ?> </td>
          <td>
            <img src="<?php echo "upload/" . $row['pp']; ?>" width="100px">
          </td>
          <td> <?php echo $row['status']; ?> </td>

          <td>


            <a href="crud_php.php?Approve=<?= $row['id']; ?>" onclick="return confirm('Are you sure you want to Approve this Licence?');" role="button" class="btn btn-success"> Approve </a>
            <a href="crud_php.php?Deny=<?= $row['id']; ?>" onclick="return confirm('Are you sure you want to Deny this Licence?');" role="button" class="btn btn-danger"> Deny </a>
          </td>
        </tr>
      <?php endwhile;  ?>
    </table>
  </div>
</body>

</html>
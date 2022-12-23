<?php
session_start();
include('user_db.php');
include("language/config.php");
if (isset($_GET['report'])) {
    $tin = $_GET['report'];
    $queryy = "UPDATE rg SET report ='Yes' WHERE tin_no='$tin'";
    $resultt = mysqli_query($conn, $queryy);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Request</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
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
          <li class=" nav-item ">
            <a class="nav-link" href="Staff.php">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="Staff-search-user.php">User Search</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="manage.php">Manage</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="staff-user-view.php">View</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="StafViewNonRenewed.php">View None Renewed<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="staf-view-fedBack.php">FeedBack</a>
          </li>
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
        <div class="container-fluid bg-success text-white">
            <h1 class="display-4">None Renewed Trade License
                <div style="float:right;">
                    <label>All </label>
                    <a href="StafViewNonRenewed.php?report" onclick="return confirm('Are you sure you want to Send Report?');" role="button" class="btn btn-dark">Report </a>
            </h1>
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
            $tbl = mysqli_query($conn_reg, "SELECT *FROM rg WHERE renewed ='NonRenewed';")
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
                        <a href="StafViewNonRenewed.php?report=<?= $row['tin_no']; ?>" onclick="return confirm('Are you sure you want to Send Message?');" role="button" class="btn btn-success">Report </a>
                    </td>
                </tr>
            <?php endwhile;  ?>
    </div>
    </table>
    </div>
    </div>
</body>

</html>
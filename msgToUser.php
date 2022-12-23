<?php
include('user_db.php');
include("language/config.php");

if (isset($_POST['send'])) {

  $msg = $_POST['text'];
  $tableResult = mysqli_query($conn_reg, "SELECT * FROM rg WHERE status = 'Pending'");
  $result = $tableResult->fetch_array();
  if ($result > 0) {
    $sql = "UPDATE rg SET msg='$msg' WHERE status='Pending'";
    $query = mysqli_query($conn_reg, $sql);
    echo "<script>alert('Message Is Sent For The user');</script>";
  } else {
    echo "<script>alert('All Customor Are Approved');</script>";
  }
}

?>
<!DOCTYPE html>
<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
  <nav class="navbar-custom">
    <div class="header-title">
      <h3><?php echo $lang['title'] ?>e</h3>
    </div>

      <div class="profile">
        <?php include("profile.php"); ?>

      </div>
      <div class="lang">
        <input type="button" onclick="location.href='msgToUser.php?lang=en';" value="<?php echo $lang['lang_en'] ?>" />
        <input type="button" onclick="location.href='msgToUser.php?lang=amha';" value="<?php echo $lang['lang_amha'] ?>" />
      </div>
  </nav>

  <!--admin dashboard-->

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ">
        <li class=" nav-item ">
          <a class="nav-link" href="admin-dahboard.php">Home</a>
        </li>
        <li class=" nav-item ">
          <a class="nav-link" href="Admin-Request-approve.php">Request </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="manage.php">Manage</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="msgToUser.php">Send Message<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="search.php">User Search</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Log out</a>
        </li>
      </ul>
    </div>
  </nav>
  <?php include("sidebar.php"); ?>
  <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <form class="border shadow p-3 rounded" method="post" style="width: 450px;">
      <h1 class="text-center p-3"><?php echo $lang['TIN_ExpireDate'] ?></h1>
      <div class="mb-3">
        <textarea class="form-control" id="textAreaExample3" rows="2" name="text"></textarea>
        <label class="form-label" for="textAreaExample3">Message</label>

      </div>
      <button type="submit" class="btn btn-primary" name="send"><?php echo $lang['enterExpireDate'] ?></button>
    </form>
  </div>
</body>

</html>
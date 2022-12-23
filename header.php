<?php include "db_conn.php"; ?>
<?php include("language/config.php"); ?>
<!DOCTYPE html>
<html>

<head>
  <title></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
    <div class="lang">
      <input type="button" onclick="location.href='index_home.php?lang=en';" value="<?php echo $lang['lang_en'] ?>" />

      <input type="button" onclick="location.href='index_home.php?lang=amha';" value="<?php echo $lang['lang_amha'] ?>" />

    </div>
  </nav>






</body>

</html>
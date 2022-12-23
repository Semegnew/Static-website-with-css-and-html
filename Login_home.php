 <?php
   session_start();
   include("language/config.php");
   include "db_conn.php";
   if (isset($_SESSION['username']) && isset($_SESSION['ID'])) {   ?>
    <!DOCTYPE html>
    <html>

    <head>
       <title><?php echo $lang['title'] ?></title>
       
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="style.css">

    </head>

    <body>

       <?php if ($_SESSION['role'] =='Admin') { ?>

          <?php include("admin-dahboard.php"); ?>

          <?php } else if ($_SESSION['role'] =='User' && $_SESSION['stutus']) {?> <?php include("user-dashboard11.php"); ?> 

       <?php }else { ?> <?php include("Staff.php"); ?><?php } ?> 
        </div>

      
    </body>

    </html>
 <?php } else {
      header("Location:Login_index.php");
   } ?>
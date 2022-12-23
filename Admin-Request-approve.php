   <?php
    session_start();
    include('db_conn.php');
    include("language/config.php");
    use Twilio\Rest\Client;

require __DIR__ . '/vendor/autoload.php';

    if (isset($_GET['Approve'])) {
      $Tin = $_GET['Approve'];

      $query = "UPDATE trade SET stutus='Approved' WHERE TinNo='$Tin'";
      $result = mysqli_query($conn , $query);
      
				$sid    = "AC345903b2020c25a2f8faf24aa88ffae9";
				$token  = "605845ad7919ebb7722fee2a8f72f39c";
				$twilio = new Client($sid, $token);

				$message = $twilio->messages
					->create(
						"+251985123075", // to 
						array(
							"from" => "+15752543476",
							"body" => "Your Commercial Regstration is Suucessefuly  You Can use other Service And Don't Share Your Tin Number.$Tin"
						)
					);

    echo "<script>alert('Approved...Successefuly Message Sent ');</script>";
    }
    if (isset($_GET['Deny'])) {
      $TinNo = $_GET['Deny'];

      $query = "DELETE FROM trade WHERE TinNo='$TinNo'";
      $result = mysqli_query($conn , $query);
      echo "<script>alert('Sorry Your licence is Deny please contact  thank you');</script>";
    }
    ?>

   <!DOCTYPE html>
   <html>

   <head>
     <title>Request</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" type="text/css" href="style.css">
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

   </head>

   <body>


    <nav class="navbar-custom">
       <div class="header-title">
         <h3><?php echo $lang['title'] ?></h3>
       </div>

       <body>
         <div class="profile">

           <?php include("profile.php"); ?>

         </div>
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
  <input type="button" onclick="location.href='admin-dahboard.php?lang=en';" value="<?php echo $lang['lang_en'] ?>" />

  <input type="button" onclick="location.href='admin-dahboard.php?lang=amha';" value="<?php echo $lang['lang_amha'] ?>" />

</div>
</nav>


</div>





     <?php include("sidebar.php"); ?>
     <!-- <h1 class="note_approve">Request User </h1>-->

     <div class="container" style="padding:0px;  margin-top:2%; ">
       <table class="table table-dark">
         <thead>
           <tr>
             <th scope="col">id</th>
             <th scope="col">Roll</th>
             <th scope="col">UserName</th>
             <th scope="col">Name</th>
             <th scope="col">Photo</th>
             <th scope="col">Kebele-Id</th>
             <th scope="col">Status</th>
             <th scope="col">Action</th>




           </tr>
         </thead>
         <?php
          $tbl = mysqli_query($conn, "SELECT ID,TinNo,role,username,name,photo,kebeleId,stutus FROM trade WHERE stutus ='request';")
            or die($tbl->error_reporting());

          while ($row = $tbl->fetch_assoc()) : ?>
           <tr>
             <td> <?php echo $row['ID']; ?> </td>
             <td> <?php echo $row['role']; ?> </td>


             <td> <?php echo $row['TinNo']; ?> </td>

             <td> <?php echo $row['username']; ?> </td>
             <td> <?php echo $row['name']; ?> </td>


             <td> <img src="<?php echo "upload/" . $row['photo']; ?>" width="100px"></td>

             <td> <img src="<?php echo "upload/" . $row['kebeleId']; ?>" width="100px"></td>

             <td> <?php echo $row['stutus']; ?> </td>
           
             <td>

               <a href="Admin-Request-approve.php?Approve=<?= $row['TinNo']; ?>" onclick="return confirm('Are you sure you want to Approve this Licence?');" role="button" class="btn btn-success"> Approve </a>
               <a href="Admin-Request-approve.php?Deny=<?= $row['TinNo']; ?>" onclick="return confirm('Are you sure you want to Deny this Licence?');" role="button" class="btn btn-danger"> Deny </a>

             </td>
            
           </tr>
         <?php endwhile;  ?>
       </table>
     
     </div>


     </div>
   </body>

   </html>
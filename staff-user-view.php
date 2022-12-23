<?php

    session_start();
    use Twilio\Rest\Client;

    require __DIR__ . '/vendor/autoload.php';
    include('db_conn.php');
    include("language/config.php");
  

    if (isset($_GET['Request'])) {
      $id = $_GET['Request'];

      $query = "UPDATE trade SET stutus='request' WHERE id='$id'";
      $result = mysqli_query($conn , $query);

 
      echo "<script>alert('Request is Send to Admin thank you');</script>";
    }
    if (isset($_GET['Deny'])) {
     
      $id = $_GET['Deny'];

      $query = "DELETE FROM trade WHERE id='$id'";
      $result = mysqli_query($conn,$query);
     
			  $sid    = "AC345903b2020c25a2f8faf24aa88ffae9";
				$token  = "605845ad7919ebb7722fee2a8f72f39c";
				$twilio = new Client($sid, $token);
				$message = $twilio->messages
					->create(
						"+251985123075", // to 
						array(
							"from" => "+15752543476",
							"body" => "Your Commercial Regstration is UnSuucessefuly  You Must Register With Valid Information"
						)
					);  
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

   <div>
    <nav class="navbar-custom">
      <div class="header-title">
        <h3><?php echo $lang['title']?></h3>
      </div>

      <body>
        <div class="profile">

          <?php include("profile.php"); ?>

        </div>
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
          <li class="nav-item active">
            <a class="nav-link" href="staff-user-view.php">View<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="StafViewNonRenewed.php">View None Renewed</a>
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
        <input type="button" onclick="location.href='Staff.php?lang=en';" value="<?php echo $lang['lang_en'] ?>" />
        <input type="button" onclick="location.href='Staff.php?lang=amha';" value="<?php echo $lang['lang_amha'] ?>" />
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
             <th scope="col">Kebele-Id</th>



           </tr>
         </thead>
         <?php
          $tbl = mysqli_query($conn, "SELECT ID,role,username,name,photo,kebeleId,stutus FROM trade WHERE stutus ='Pending';")
            or die($tbl->error_reporting());

          while ($row = $tbl->fetch_assoc()) : ?>
           <tr>
             <td> <?php echo $row['ID']; ?> </td>

             <td> <?php echo $row['role']; ?> </td>

             <td> <?php echo $row['username']; ?> </td>
             <td> <?php echo $row['name']; ?> </td>


             <td> <img src="<?php echo "upload/" . $row['photo']; ?>" width="100px"></td>

             <td> <img src="<?php echo "upload/" . $row['kebeleId']; ?>" width="100px"></td>

             <td> <?php echo $row['stutus']; ?> </td>
           
             <td>

               <a href="staff-user-view.php?Request=<?= $row['ID']; ?>" onclick="return confirm('Are you sure you want to Send to Customer?');" role="button" class="btn btn-success"> Request </a>
               <a href="staff-user-view.php?Deny=<?= $row['ID']; ?>" onclick="return confirm('Are you sure you want to Deny this Customer?');" role="button" class="btn btn-danger"> Reject </a>

             </td>
            
           </tr>
         <?php endwhile;  ?>
       </table>
     </div>


     </div>

   </body>

   </html>
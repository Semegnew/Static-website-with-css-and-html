<?php
session_start();
include("db_conn.php");
   include ("language/config.php"); 

$db=mysqli_connect("localhost","root","","reg");
$query="SELECT * FROM rg ORDER BY id DESC";
$result=mysqli_query($db,$query);

if (isset($_GET['UnBlock'])) {
  $tin = $_GET['UnBlock'];
  $queryy = "UPDATE trade SET stutus ='Approved' WHERE TinNo='$tin'";
  $resultt = mysqli_query($conn, $queryy);

//Trade License Status
$tin = $_GET['UnBlock'];
   $query = "UPDATE rg SET stutus='Approved' WHERE tin_no='$tin'";
  $result = mysqli_query($db, $query);

  /*include("index-sms.php");8*/
  header("Location:search.php?success=Successfuly UnBlock Customer");
 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Data table </title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <!--header bootstrap-->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet"  type="text/css" href="style.css">
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script> 
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>            
         </head>  

<body >
<div>
    <nav class="navbar-custom">
      <div class="header-title">
        <h3><?php echo $lang['title']?>
       
      </h3>
  
      </div> <div class="profile"> <?php include("profile.php"); ?>  </div>
      <?php if (isset($_GET['success'])) { ?>
						<div class="alert alert-success" role="alert">
							<?= $_GET['success'] ?>
						</div>
					<?php } ?>
    </nav>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ">
          <li class=" nav-item active">
            <a class="nav-link" href="admin-dahboard.php">Home</a>
          </li>
          <li class=" nav-item ">
            <a class="nav-link" href="Admin-Request-approve.php">Request </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="manage.php">Manage</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="search.php">User Search</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="msgToUser.php">Send Message</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Admin_View_Cancel_Request.php">View Cancel Request </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="AdminViewNonRenewed.php">View None Renewed</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Admin_Set_Expire_License.php">Set License Expire</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Admin_view_user_renwed_License.php">View Renewed Request </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Log out</a>
          </li>
       

        </ul>
      </div>

      <div class="lang">
        <input type="button" onclick="location.href='search.php?lang=en';" value="<?php echo $lang['lang_en']?>" />

        <input type="button" onclick="location.href='search.php?lang=amha';" value="<?php echo $lang['lang_amha']?>" />

      </div>
</nav>

   
 <table class="container" id="TD" class="table container-sm table-responsive table-hover">
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
                    <th> CompanyName </th>
                     <th> TradeName </th>
                    <th>Status</th>
                    <th>Photo</th>
                    <th>Action</th>

            </tr>
        </thead>

    <?php
        $tbl = mysqli_query($db, "SELECT * FROM rg ") or die($tbl->error_reporting());
        while($row = mysqli_fetch_array($result )): ?>
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
                <td> <?php echo $row['companyName']; ?> </td>
                 <td> <?php echo $row['tradeName']; ?> </td>

                 <td> <?php echo $row['stutus']; ?> </td>
                  <td> 
                       <img src="<?php echo "upload/".$row['pp'];?>"width="100px">
                  </td>
                
                     <td><a href="search.php?UnBlock=<?= $row['tin_no']; ?>" onclick="return confirm('Are you sure you want to Unblock to Customer?');" role="button" class="btn btn-danger"> UnBlock </a></td>
                </tr>
                
        <?php endwhile;  ?>
     
    </table>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    
    
    <script>
        $(document).ready(function () {
            $('#TD').DataTable();
        });
    </script>
</body>

</html>
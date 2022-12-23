<?php
session_start();
   include ("language/config.php"); 

$db=mysqli_connect("localhost","root","","reg");
$query="SELECT * FROM rg ORDER BY id DESC";
$result=mysqli_query($db,$query);
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
    

<nav class="navbar-custom">
        <div class="header-title"> 
           <h3 ><?php echo $lang['title']?></h3>
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

    <li class="nav-item active">
      <a class="nav-link" href="Staff-search-user.php">User Search<span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="manage.php">Manage</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="staff-user-view.php">View</a>
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
        <input type="button" onclick="location.href='Staff-search-user.php?lang=en';" value="<?php echo $lang['lang_en']?>" />

        <input type="button" onclick="location.href='Staff-search-user.php?lang=amha';" value="<?php echo $lang['lang_amha']?>" />

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
                     <th>Photo</th>
                    <th>Status</th>

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


                  <td> 
                       <img src="<?php echo "upload/".$row['pp'];?>"width="100px">
                  </td>
                    <td> <?php echo $row['stutus']; ?> </td>

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
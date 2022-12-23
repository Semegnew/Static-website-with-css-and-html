


<!DOCTYPE html>
<html>
<head>
	<title>Search User</title>
	 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <!--header bootstrap-->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  <div class = "container bg-dark text-white">
      <h1 class = "display-4"> Trade  </h1>
  </div>
  <div class = "container">
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
               <th colspan = "2"> Action </th>
          </tr>
      </thead>
    <?php 
if(isset($_POST['search']))
{
    $Tin=$_POST['tin'];
        $tbl = mysqli_query($conn_reg, "SELECT * FROM rg WHERE tin_no = '$Tin'") or die($tbl->error_reporting());
        while($row = $tbl->fetch_assoc()): ?>
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
                       <img src="<?php echo "upload/".$row['pp'];?>"width="100px">
                  </td>
                   <td> <?php echo $row['status']; ?> </td>

           <td>
                <a href="crud_php.php?edit=<?php echo $row['id']; ?>" class="btn btn-info"> edit </a>
             
                <a href="crud_php.php?delete=<?=$row['id'];?>" onclick="return confirm('Are you sure you want to delete this record?');" 
                  role="button" class="btn btn-danger" > Delete </a>
                 
           </td>
       </tr>
  <?php endwhile;  }?>
    </table>
  </div>
 
</body>
</html>
</body>
</html>
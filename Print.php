
 <?php  include ("language/config.php"); 
 include "db_conn.php";

if (isset($_POST['submit'])){

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
   $Tin =$_POST['TIN'];
 if (empty($Tin)) {
    header("Location:Login-Tin.php?error=Tin Number is Required");
  }
  else {
        $sql = "SELECT * FROM trade WHERE TIN_NO = '$Tin'";
        $result = mysqli_query($conn, $sql);

       if (mysqli_num_rows($result) == 1)
               { 

                   }
        else {
          header("Location:Login-Tin.php?error=Incorect User name or password");

        } 

}
}
  
else {
  header("Login-Tin.php");
}
 ?>
 
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $lang['login']?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


   <link rel="stylesheet" href="style.css">
</head>
<body>

 
  <nav class="navbar-custom">
        <div class="header-title"> 
           <h3 ><?php echo $lang['title'];?></h3>
         </div> 
  <div class="profile">
    
    <?php include("profile.php"); ?>
      
    </div>
     <div class="lang">
      <input type="button" onclick="location.href='Login-Tin.php?lang=en';" value="<?php echo $lang['lang_en']?>" />

      <input type="button" onclick="location.href='Login-Tin.php?lang=amha';" value="<?php echo $lang['lang_amha']?>" />

      </div>
 </nav>
     
  
	<?php include("sidebar.php");?>

          <div class="container d-flex justify-content-center align-items-center"
      style="min-height: 100vh;">
      	<form class="border shadow p-3 rounded"
       	      method="post" 
      	      style="width: 450px;">
      	      <h1 class="text-center p-3"><?php echo $lang['TinLogin']?></h1>
      	      <?php if (isset($_GET['error'])) { ?>
      	      <div class="alert alert-danger" role="alert">
				  <?=$_GET['error']?>
			  </div>
			  <?php } ?>
		  <div class="mb-3">
		    <label for="username" 
		           class="form-label"><?php echo $lang['tin number']?></label>
		    <input type="text" 
		           class="form-control" 
		           name="TIN" 
		           id="username">
		  </div>
		 
	 
		  <button type="submit" 
		          class="btn btn-primary" name="submit"><?php echo $lang['login']?></button>
          </form>
      </div>
</body>
</html>
 
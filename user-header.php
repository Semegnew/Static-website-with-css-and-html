 
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
 <nav class="navbar-custom">
        <div class="header-title"> 
           <h3 >Trade License Mangement system For Gondar City to Revenu Office</h3>
         </div> 

  <div class="profile">
    
    <?php include("profile.php"); ?>
      
    </div>
       
 </nav>
  
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   
  
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
     <ul class="navbar-nav ">
       <li class=" nav-item active">
        <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class=" nav-item ">
        <a class="nav-link" href="Request-approve.php">Create Account </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="user.php">Register</a>
      </li>
       
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Log out</a>
      </li>
       
    </ul>
  </div>

    <div class="lang">
        <input type="button" onclick="location.href='index_home.php?lang=en';" value="<?php echo $lang['lang_en']?>" />

        <input type="button" onclick="location.href='index_home.php?lang=amha';" value="<?php echo $lang['lang_amha']?>" />

      </div>
</nav>
          
</body>
</html>

        

 <?php  
 session_start();
 include ("language/config.php");
   
 ?>



<!DOCTYPE html  >
<html>
<head>
	<title><?php echo $lang['title']?></title>
       <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="card/card.css">  
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
   <div>
       <?php include("header.php");?>
       <?php include("sidebar.php");?>
       <?php include("card/card-layout.php");?>
 
</div>
    <?php include("footerN.php");?>           

   </body>
</html>

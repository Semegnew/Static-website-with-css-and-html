
 <?php  include ("language/config.php"); 

session_start();
include('db_conn.php');
if (!isset($_SESSION['username']) && !isset($_SESSION['ID'])) {   ?>
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
       <h3 ><?php echo $lang['title']?></h3>
     </div> 
<div class="profile">

<?php include("profile.php"); ?>
  
</div>
 <div class="lang">
  <input type="button" onclick="location.href='Login_index.php?lang=en';" value="<?php echo $lang['lang_en']?>" />

  <input type="button" onclick="location.href='Login_index.php?lang=amha';" value="<?php echo $lang['lang_amha']?>" />

  </div>
</nav>
 

<?php include("sidebar.php");?>

      <div class="container d-flex justify-content-center align-items-center"
  style="min-height: 100vh">
      <form class="border shadow p-3 rounded"
            action="php/check-login.php" 
            method="post" 
            style="width: 450px;">
            <h1 class="text-center p-3"><?php echo $lang['login']?></h1>
            <?php if(isset($_GET['error'])) { ?>
            <div class="alert alert-danger" role="alert">
              <?=$_GET['error']?>
          </div>
          <?php } ?>
      <div class="mb-3">
        <label for="username" 
               class="form-label"><?php echo $lang['user name']?></label>
        <input type="text" 
               class="form-control" 
               name="username" 
               id="username">
      </div>
      <div class="mb-3">
        <label for="password" 
               class="form-label"><?php echo $lang['password']?></label>
        <input type="password" 
               name="password" 
               class="form-control" 
               id="password">
      </div>
      <div class="mb-1">
        <label class="form-label"><?php echo $lang['Select-User-Type']?>:</label>
      </div>
      <select class="form-select mb-3"
              name="role" 
              aria-label="Default select example">
          <option selected value="User"><?php echo $lang['user']?></option>
          <option value="Admin"><?php echo $lang['admin']?></option>
          <option value="Employer"><?php echo $lang['Employer']?></option>

      </select>
     
      <button type="submit" 
              class="btn btn-primary"><?php echo $lang['login']?></button>
       <a href="createPass.php" class="btn btn-primary"> <?php echo $lang['createAccount']?></a>
     </form>
  </div>
</body>
</html>
<?php }else{
 session_unset();
 session_destroy();
 header("Location:Login_index.php");

} ?>
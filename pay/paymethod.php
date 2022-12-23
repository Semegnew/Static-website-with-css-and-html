<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>PAYING TAX</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/bootstrap.bundle.min.js"> </script>
        <link rel="stylesheet" href="../style.css">   

</head>
<body>
   <?php include("../header.php");?>
   <!--sidebar navigation start-->
     <div class="body">
     <nav class="side-bar">
       <div class="user-p">
        <img src="../img/logo.png">
        
         </div>
         
         <ul>
          <li>
            <a  href="../index_home.php">
                   <i class="fa fa-home" aria-hidden="true"></i>              
                   <span>Home</span>
                  
                </a>
 
          </li>
            <li>
                <a href="../Login_index.php">
                   <i class="fa fa-lock" aria-hidden="true"></i>              
                   <span>Admin</span>
                  
                </a>
 
            </li>
          <li>
            <a href="../createPass.php">
                   <i class="fa fa-user" aria-hidden="true"></i>              
                      <span>User</span>
            </a>
          </li>
             <li>
                <a href="../contact.php">
                   <i class="fa fa-phone" aria-hidden="true"></i>            
                      <span>Contact Us</span>
                </a>
            </li>
          <li>
            <a href="pay/paymethod.php">
                    <i class="fa fa-money" aria-hidden="true"></i>
                <span>Taxation</span>
            </a>
          </li>
          <li>
            <a href="../about.php"class="active">
              <i class="fa fa-circle" aria-hidden="true"></i>
              <span>About</span>
            </a>
          </li>
          
          <li>
            <a href="../Login_index.php">
              <i class="fa fa-power-off" aria-hidden="true"></i>
              <span>Logout</span>
            </a>
          </li>
         </ul>
     
          </nav>
          <!--nav ende-->
    <div class="container" style="margin-top:50px;">  
    <form class="row g-3 needs-validation" novalidate>
        <div class="col-md-4">
          <label for="validationCustom01" class="form-label">First name</label>
          <input type="text" class="form-control" id="validationCustom01" value="" required>
          <div class="valid-feedback">
            
          </div>
        </div>
        <div class="col-md-4">
          <label for="validationCustom02" class="form-label">Last name</label>
          <input type="text" class="form-control" id="validationCustom02" value="" required>
          <div class="valid-feedback">
           
          </div>
        </div>
        <div class="col-md-4">
          <label for="validationCustomUsername" class="form-label">ID</label>
          <div class="input-group has-validation">
            <span class="input-group-text" id="inputGroupPrepend"></span>
            <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
            <div class="invalid-feedback">
            
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <label for="validationCustom03" class="form-label">City</label>
          <input type="text" class="form-control" id="validationCustom03" required>
          <div class="invalid-feedback">
          
          </div>
        </div>
        <div class="col-md-3">
          <label for="validationCustom04" class="form-label">State</label>
        <select class="form-select" id="validationCustom04" required>
            <option selected disabled value="">Choose...</option>
            <option value="">paypal</option>
            <option value="">VISA</option>
            <option value="">MasterCard</option>
            <option value="">AmericanExpress</option>

        </select>
          <div class="invalid-feedback">
           
          </div>
        </div>
        <div class="col-md-3">
          <label for="validationCustom05" class="form-label">Zip <code></code></label>
          <input type="text" class="form-control" id="validationCustom05" required>
          <div class="invalid-feedback">
    
          </div>
        </div>
        
        <a href="paypal.php"><img src="11.jfif"></a>
        
      </form>
    </div>
</body>
</html>
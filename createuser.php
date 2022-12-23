<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
	{	
header('location:index.php');
}
else{


	?>
<!DOCTYPE HTML>
<html>
<head>
<title>LAS | Admin User Creation</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery-2.1.4.min.js"></script>
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}

		</style>
<script type="text/javascript">
   function validate2 ()
   {
   var fnam=document.signupform.first_name.value;
    var mnam=document.signupform.middle_name.value;
    var lnam=document.signupform.last_name.value;
  
    var rol=document.signupform.rolename.value;
    var gen=document.signupform.sex.value;
    var phonn=document.signupform.phone.value;
    var emai=document.signupform.email.value;
    var redat=document.signupform.regdate.value;
    var pas=document.signupform.password.value;
    var cpas=document.signupform.cpassword.value;
    var e=/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/;
    var p=/^[+.][2.][5.][1.][0-9]{9}$/;
    var n=/^[a-zA-Z]+((\s+)*([a-zA-Z]))*$/; 
    var u=/^[a-zA-Z]+(([0-9])*(\.+)*(\-+)*(\_+)*(\s+)*([a-zA-Z]))*$/; 
    var status=false;
    if(fnam==""||fnam==null)
    {

       document.getElementById('error').innerHTML = 'Please enter your first name';
       document.getElementById("error").style.color=  "red"; 
       document.signupform.first_name.focus() ;
       return false;
    }
    else if(!n.test(fnam))
    {
     document.getElementById('error').innerHTML = ' Your first name is incorrect format';
       document.getElementById("error").style.color=  "red"; 
       document.signupform.first_name.focus() ;
       return false;
    } 
    if(mnam==""||mnam==null)
    {
       document.getElementById('error').innerHTML = 'Please enter your middle name';
       document.getElementById("error").style.color=  "red"; 
       document.signupform.middle_name.focus() ;
       return false;
    }
   else if(!n.test(mnam))
    {
     document.getElementById('error').innerHTML = ' Your middle name is incorrect format';
       document.getElementById("error").style.color=  "red"; 
        document.signupform.middle_name.focus() ;
       return false;
    } 
    if(lnam==""||lnam==null)
    {
       document.getElementById('error').innerHTML = 'Please enter your last name';
       document.getElementById("error").style.color=  "red"; 
        document.signupform.last_name.focus() ;
       return false;
    }
    else if(!n.test(lnam))
    {
     document.getElementById('error').innerHTML = ' Your last name is incorrect format';
       document.getElementById("error").style.color=  "red";
        document.signupform.last_name.focus() ; 
       return false;
    } 
   
    
    if(gen==""||gen==null)
    {
       document.getElementById('error').innerHTML = 'Please select your gender';
       document.getElementById("error").style.color=  "red";
        document.signupform.sex.focus() ; 
       return false;
    }
   
    
     if(phonn==""||phonn==null)
    {
       document.getElementById('error').innerHTML = 'Please enter your phone number';
       document.getElementById("error").style.color=  "red";
        document.signupform.phone.focus() ; 
       return false;
    }
   else if(!p.test(phonn))
    {
     document.getElementById('error').innerHTML = ' Your phone number is incorrect format';
       document.getElementById("error").style.color=  "red"; 
        document.signupform.phone.focus() ;
       return false;
    }
    if(emai==""||emai==null)
    {
       document.getElementById('error').innerHTML = 'Please enter your email';
       document.getElementById("error").style.color=  "red";
        document.signupform.email.focus() ; 
       return false;
    }
    else if(!e.test(emai))
    {
     document.getElementById('error').innerHTML = ' Your email is incorrect format';
       document.getElementById("error").style.color=  "red";
        document.signupform.email.focus() ; 
       return false;
    }
    if(rol==""||rol==null)
    {
       document.getElementById('error').innerHTML = 'Please select your rolename';
       document.getElementById("error").style.color=  "red";
        document.signupform.rolename.focus() ; 
       return false;
    }
    if(redat==""||redat==null)
    {
       document.getElementById('error').innerHTML = 'Please enter your register date';
       document.getElementById("error").style.color=  "red";
        document.signupform.regdate.focus() ; 
       return false;
    }
    if(pas==""||pas==null)
    {
       document.getElementById('error').innerHTML = 'Please enter your password';
       document.getElementById("error").style.color=  "red"; 
        document.signupform.password.focus() ;
       return false;
    }
    else if(pas.length<6)
    {
       document.getElementById('error').innerHTML = 'Password should be at least 6 characters ';
       document.getElementById("error").style.color=  "red";
        document.signupform.password.focus() ; 
       return false;
    }
    if(cpas==""||cpas==null)
    {
       document.getElementById('error').innerHTML = 'Please enter your confirm password';
       document.getElementById("error").style.color=  "red";
        document.signupform.cpassword.focus() ; 
       return false;
    }
    else if(pas!=cpas)
    {
       document.getElementById('error').innerHTML = 'Passwords do not match';
       document.getElementById("error").style.color=  "red"; 
        document.signupform.cpassword.focus() ;
       return false;
    }
    
    else
    {
      return true;
    }
   }
</script>
</head> 
<body>
   <div class="page-container">
   <!--/content-inner-->
<div class="left-content">
	   <div class="mother-grid-inner">
              <!--header start here-->
<?php include('includes/header.php');?>
							
				     <div class="clearfix"> </div>	
				</div>
<!--heder end here-->
	<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="createuser.php">Home</a><i class="fa fa-angle-right"></i>Create Users </li>
            </ol>
		<!--grid-->
 	<div class="grid-form">
 
<!---->
  <div class="grid-form1">
  	       <p id="error" style="color: red;font-size: 20px;font-family: georgian" align="center"></p>

  	        	  
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" name="signupform" method="post" enctype="multipart/form-data"  onsubmit=" return validate2()" action="createdatabase.php">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">First Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="first_name" >
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Middle Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="middle_name" >
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Last Name</label>
									<div class="col-sm-8">
										
										<input type="text" class="form-control1" name="last_name" >
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Gender</label>
									<div class="col-sm-8">
										<select name="sex" class="form-control1">
											<option value=""> Select gender</option>
          <OPTION value="male">Male</OPTION>
          <OPTION value="female">Female</OPTION>
										</select>
								
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Mobile Phone</label>
									<div class="col-sm-8">
										<input type="text" placeholder="+251" class="form-control1" name="phone">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Email Address</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="email" >
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">User_Type</label>
									<div class="col-sm-8">
										<select name="rolename" class="form-control1">
											<option value="">Select a user</option>
              <option value="Registral-Officer">Registral-Officer</option>
              <option value="Cadaster">Cadaster</option>
              <option value="Land-Owner">Land-Owner</option>
										</select>
								
									</div>
								</div>
                        <div class="form-group">
                  <label for="focusedinput" class="col-sm-2 control-label">Account created Date</label>
                  <div class="col-sm-8">
                    
                    <input type="date" class="form-control1" name="regdate" >
                  </div>
                </div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Password</label>
									<div class="col-sm-8">
										<input type="password" class="form-control1" name="password" >
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label"> Confirm Password</label>
									<div class="col-sm-8">
										<input type="password" class="form-control1" name="cpassword" >
									</div>
								</div>

		

								<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<button type="submit" name="submit" class="btn-primary btn">Create</button>

				<button type="reset" class="btn-inverse btn">Reset</button>
			</div>
		</div>
						
					
						
						
						
					</div>
					
					</form>

     
      

      
      <div class="panel-footer">
		
	 </div>
    </form>
  </div>
 	</div>
 	<!--//grid-->

<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">

</div>
<!--inner block end here-->
<!--copy rights start here-->
<?php include('includes/footer.php');?>
<!--COPY rights end here-->
</div>
</div>
  <!--//content-inner-->
		<!--/sidebar-menu-->
					<?php include('includes/sidebarmenu.php');?>
							  <div class="clearfix"></div>		
							</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->	   

</body>
</html>
<?php } ?>
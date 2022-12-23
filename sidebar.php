   
<?php  include ("language/config.php");?>
   <!DOCTYPE html>
   <html>
   <head>
       <title><?php echo $lang['title']?></title>
   </head>
   <body>
    <div class="body">
     <nav class="side-bar">
         <div class="user-p">
             <img src="logo.jpg">
            
         </div>

         
         <ul>
            <li>
                <a href="index_home.php">
                   <i class="fa fa-home" aria-hidden="true"></i>                    
                   <span><?php echo $lang['home']?></span>
                  
                </a>
 
            </li>
          <li>
             <a href="Feedback.php">
                 <i class="fa fa-commenting-o" aria-hidden="true"></i>
                 <span><?php echo $lang['feedback_management']?></span>
             </a>
          </li>
<!--
           <li>
                <a href="Login_index.php">
                   <i class="fa fa-sign-in" aria-hidden="true"></i>
                   <span> </span>
                </a>
            </li>
-->
            <li>
                <a href="Login_index.php">
                   <i class="fa fa-user" aria-hidden="true"></i>                    
                      <span><?php echo $lang['user']?></span>
                </a>
            </li>
            <li>
                <a href="Login_index.php">
                   <i class="fa fa-user" aria-hidden="true"></i>                    
                   <span><?php echo $lang['admin']?></span>
                </a>
            </li>
            <li>
                <a href="Login_index.php">
                   <i class="fa fa-user" aria-hidden="true"></i>                    
                   <span><?php echo $lang['Employer']?></span>              
               </a>
            </li>
        <!--
           <li>
                <a href="Login_index.php">
                   <i class="fa fa-lock" aria-hidden="true"></i>              
                   <span>Check Company Name</span>
                </a>
            </li>

            <li>
                <a href="createPass.php">
                   <i class="fa fa-user" aria-hidden="true"></i>                    
                      <span>User</span>
                </a>
            </li>
             <li>
                <a href="contact.php">
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
         -->
            <li>
                <a href="about.php"class="active">
                    <i class="fa fa-circle" aria-hidden="true"></i>
                    <span><?php echo $lang['about']?></span>
                </a>
            </li>
          
          
         </ul>
     
          </nav>
         
   </body>
   </html>
  
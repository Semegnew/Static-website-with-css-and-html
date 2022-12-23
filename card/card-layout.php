 <?php include("language/config.php"); ?>

 <!DOCTYPE html>
 <html>

 <head>
     <title>Home Page</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 </head>

 <body>
     <div class="main">
         <div class="card">
             <div class="image">
                 <img src="gonder-3.jpg">
             </div>
             <div class="title">
                 <h1>
                     <?php echo $lang['Wellcome'] ?>
                 </h1>
             </div>
             <div class="des">
                 <p> <?php echo $lang['description2'] ?></p>

             </div>
         </div>
         <div class="card">
             <div class="image">
                 <img src="gondar1.jpg">
             </div>
             <div class="title">
                 <h1>
                     <?php echo $lang['Wellcome'] ?>
                 </h1>
             </div>
             <div class="des">
                 <p> <?php echo $lang['description3'] ?></p>
                 <button onclick="window.location.href='Login_CmpName.php'"><?php echo $lang['desecription4'] ?> </button>
             </div>
         </div>
         <div class="card">
             <div class="image">
                 <img src="gondar4.webp">
             </div>

             <div class="title">
                 <h1> <?php echo $lang['Wellcome'] ?></h1>
             </div>
             <div class="des">
                 <p><?php echo $lang['description2'] ?></p>
                 <button onclick="window.location.href='Login_index.php'"><?php echo $lang['login'] ?></button>
                 <button onclick="window.location.href='createPass.php'"><?php echo $lang['register'] ?></button>
             </div>
         </div>
     </div>
 </body>

 </html>
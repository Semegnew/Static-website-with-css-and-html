<?php
include("language/config.php");
include("db_conn.php");
if (isset($_POST['submit'])) {
    $tin = $_POST['tin'];
    $phone = $_POST['phone'];
    $newPass = $_POST['newPass'];
    $Cpass = $_POST['confirmPass'];
     if (!preg_match("/^[0-9]*$/",$phone)) {
      echo "<script>alert('Please Enter Mobile As Only Number');</script>";
    
     } else {
        $select = "SELECT *FROM trade WHERE TinNo = '$tin' AND PhoneN ='$phone'";
        $result = mysqli_query($conn, $select);
        if (mysqli_num_rows($result) > 0) {
            $pass = md5($Cpass);
            
            $sql ="UPDATE trade SET Apassword ='$pass' WHERE TinNo ='$tin'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                 header("Location:Login_index.php");
                 echo "<script>alert('password change');</script>;";

             } else {
                echo "<script>alert('password is not change');</script>;";

                die(mysqli_error($conn));
            }
        }else{
        //echo "<script>alert('User Name Already Taken!');</script>;";
         echo "<script>alert('Somthing Wrong!');</script>;";
     }
}
   
}



?>
<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Create Password</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!--header-->
    <nav class="navbar-custom">
        <div class="header-title">
            <h3> <?php echo $lang['title']; ?> </h3>
        </div>
        <div class="profile">
            <?php include("profile.php"); ?>
        </div>
        <div class="lang">
            <input type="button" onclick="location.href='forgetPasword.php?lang=en';" value="<?php echo $lang['lang_en'] ?>" />
            <input type="button" onclick="location.href='forgetPasword.php?lang=amha';" value="<?php echo $lang['lang_amha'] ?>" />
        </div>
    </nav>
    <?php include("sidebar.php"); ?>
    <div class="container d-flex justify-content-center align-items-center text-dark bg-light" style="min-height: 90vh">
        <form class="border shadow p-3 rounded" method="post" style="width:50%;" enctype="multipart/form-data">
            <h1 class="text-center p-3">Forgeten Password</h1>
            <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= $_GET['error'] ?>
                </div>
            <?php } ?>
            <div class="mb-2">
                <label class="form-label">Enter your Tin Number</label>
                <input type="text" class="form-control" name="tin" required>
            </div>
            <div class="mb-2">
                <label class="form-label">Enter your Phone Number</label>
                <input type="text" name="phone" class="form-control" required>
            </div>
            <div class="mb-2">
                <label class="form-label">New Password</label>
                <input type="text" name="newPass" class="form-control" required>
            </div>
            <div class="mb-2">
                <label class="form-label">Confirmation Password</label>
                <input type="text" name="confirmPass" class="form-control" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Change</button>
            <a href="Login_index.php" class="btn btn-primary">Already have account?Sign-in</a>
    </div>
    </form>
    </div>

</body>

</html>
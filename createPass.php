<?php
include("language/config.php");

use Twilio\Rest\Client;

require __DIR__ . '/vendor/autoload.php';
include("db_conn.php");
if (isset($_POST['submit'])) {
	$role = $_POST['role'];
	$user = $_POST['username'];
	$pass = $_POST['password'];
	$name = $_POST['name'];
	$PhoneNo = $_POST['phone'];

	$photoName = $_FILES['photo']['name'];
	$temp1 = $_FILES['photo']['tmp_name'];
	move_uploaded_file($temp1, "upload/$photoName");

	$kebeleId = $_FILES['kebele-id']['name'];
	$temp2 = $_FILES['kebele-id']['tmp_name'];
	move_uploaded_file($temp2, "upload/$kebeleId");

	if (!preg_match("/^[0-9]*$/", $PhoneNo)) {
		echo "<script>alert('Please Enter Mobile As Only Number');</script>";
	}

	if (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
		echo "<script>alert('Please Enter Name As Only String');</script>";
	} else {
		$select = "SELECT * FROM trade WHERE username = '$user' AND PhoneN='$PhoneNo'";
		$result = mysqli_query($conn, $select);
		if (mysqli_num_rows($result) > 0) {
			echo "<script>alert('UserName or Phone Number Already Taken!');</script>";
		} else {
			$pass = md5($pass);
			$Tin = uniqid('Tin');
			$sql = "INSERT INTO trade VALUES('','$role','$user','$pass',
			                                 '$name','$photoName','$kebeleId','Pending','$Tin','$PhoneNo')" or die($tbl->error_reporting());
			$result = mysqli_query($conn, $sql);
			if ($result) {

				header("Location:createPass.php?success=Commertial registration  Success");
			} else {
				echo "<script>alert('Data  not ');</script>";

				die(mysqli_error($conn));
			}
		}
	}
}


?>
<!DOCTYPE html>
<html>

<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<title><?php echo $lang['Commercial Registration'] ?></title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<nav class="navbar-custom">
		<div class="header-title">
			<h3><?php echo $lang['title'] ?>
				<?php if (isset($_GET['success'])) { ?>
					<div class="alert alert-success" role="alert">
						<?= $_GET['success'] ?>
					</div>
				<?php } ?>
			</h3>
		</div>
 		<div class="profile">

			<?php include("profile.php"); ?>

		</div>
		<div class="lang">
			<input type="button" onclick="location.href='createPass.php?lang=en';" value="<?php echo $lang['lang_en'] ?>" />

			<input type="button" onclick="location.href='createPass.php?lang=amha';" value="<?php echo $lang['lang_amha'] ?>" />

		</div>
	</nav>
	<?php include("sidebar.php"); ?>

	<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh">
		<form class="border shadow p-3 rounded" method="post" style="width:50%;" enctype="multipart/form-data">
			<h1 class="text-center p-3"><?php echo $lang['Commercial Registration'] ?></h1>
			<?php if (isset($_GET['error'])) { ?>
				<div class="alert alert-danger" role="alert">
					<?= $_GET['error'] ?>
				</div>
			<?php } ?>
			<div class="mb-2">
				<label for="username" class="form-label"><?php echo $lang['user name']; ?></label>
				<input type="text" class="form-control" name="username" required>
			</div>
			<div class="mb-2">
				<label for="password" class="form-label"><?php echo $lang['password']; ?></label>
				<input type="password" name="password" class="form-control" required>
			</div>
			<label class="form-label"><?php echo $lang['fullName']; ?></label>
			<input type="text" name="name" class="form-control" required>
			<div class="mb-1">
				<label class="form-label"><?php echo $lang['Select-User-Type'] ?></label>
				<select class="form-select mb-3" name="role" aria-label="Default select example">
					<option selected value="User"><?php echo $lang['user'] ?></option>
				</select>
			</div>
			<div class="form-label">
				<label><?php echo $lang['phoneN'] ?></label>
				<input type="text" name="phone" class="form-control" required>
			</div>
			<div class="form-label">
				<label><?php echo $lang['Photo'] ?></label>
				<input type="file" name="photo" class="form-control" required>
			</div>
			<div class="form-label">
				<label><?php echo $lang['IdCard'] ?></label>
				<input type="file" name="kebele-id" class="form-control" required>
			</div>

			<button type="submit" name="submit" class="btn btn-primary"><?php echo $lang['createAccount'] ?></button>
			<a href="Login_index.php" class="btn btn-primary"><?php echo $lang['alradyAccount'] ?></a>

		</form>
</body>

</html>
<?php  
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

       if (mysqli_num_rows($result) === 1)
               {
        		header("Location:register.php");
                   }
        else {
        	header("Location:Login-Tin.php?error=Incorect Tin Number ");

        } 

}
}
	
else {
	header("Login-Tin.php");
}

       
?>
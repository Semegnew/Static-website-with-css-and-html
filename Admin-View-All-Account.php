<?php  
    include("language/config.php");
if (isset($_SESSION['username']) && isset($_SESSION['ID'])) {
    
    $sql = "SELECT * FROM trade ORDER BY ID ASC";
    $res = mysqli_query($conn, $sql);
}else{
	header("Location:Admin-Reset-index.php");
} 
?>


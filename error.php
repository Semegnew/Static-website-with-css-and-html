	 <?php
function error_found(){
  header("Location:Login_index.php");
}
set_error_handler('error_found');
?>
    
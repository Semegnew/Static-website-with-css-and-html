<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','reg');

$conn_reg =mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

if(mysqli_connect_errno())
{
  //echo "anable to connect the database";


}
else{
  //  echo"databases coonected is successfully!";
}
?>
 


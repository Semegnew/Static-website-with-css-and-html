<?php session_start();
include("language/config.php");
include "user_db.php";
if (isset($_POST['submit'])) {
     $TaxPayCondition=$_session['TaxPayCondition'] ; 
     $TaxPayTin=$_session['TaxPayTin'];
     $TaxPayAmount=$_session['TaxPayAmount']; 

     if (empty($tin)) {
          header("Location:payByYne.php?error=Tin Number is Required");
     } else {

          $sql = "SELECT *FROM rg WHERE tin_no='$tin'";
          $result = mysqli_query($conn_reg, $sql);
          if (mysqli_num_rows($result) === 1) {
               $row = mysqli_fetch_assoc($result);
               if ($row['tin_no'] == $tin && $row['Condition'] == $condition) {
                    $TaxPayTin = $row['tin_no'];
                    $TaxPayCondition = $row['Condition'];
                    $TaxPayAmount = $row['tax'];

      echo  '<span>በ </span>
       <a id="yenepayLogo" href="https://www.yenepay.com/checkout/Home/Process/?ItemName='.$TaxPayCondition.'&ItemId='.$TaxPayTin.'&UnitPrice='.$TaxPayAmount.'&Quantity=1&Process=Express&ExpiresAfter=&DeliveryFee=&HandlingFee=&Tax1=&Tax2=&Discount=&SuccessUrl=&IPNUrl=&MerchantId=14344">
       <img style="width:100px" src=" https://yenepayprod.blob.core.windows.net/images/logo.png">
       </a>
     ';
               
/*
                    $GLOBALS['GTaxPayTin'] = $GLOBALS['TaxPayTin'];
                    $GLOBALS['GTaxPayCondition'] = $GLOBALS['TaxPayCondition'];
                    $GLOBALS['GTaxPayAmount'] = $GLOBALS['TaxPayAmount'];*/
               } else {
                    header("Location:payByYne.php?error=Incorect Tin Number and Tax Payment Condition Please Using Correct Tin Number");
               }
          }
     }
}


?>

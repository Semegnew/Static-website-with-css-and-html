<?php
session_start();
include('user_db.php');
$Tin = $_SESSION['Tin'];
$sql = "SELECT * FROM rg WHERE tin_no ='$Tin'";
$re = $conn_reg->query($sql);
$row = $re->fetch_assoc();
$name = $row['customerName'];
?>
<!DOCTYPE html>
<html>

<head>
  <title>
    Print the content of created account
  </title>
  <link rel="icon" type="image/ico" href="" />
  <link rel="stylesheet" type="text/css" href="style.css">
  <!-- Script to print the content of a div -->
  <script>
    function printDiv() {
      var divContents = document.getElementById("GFG").innerHTML;
      var a = window.open('', '', 'height=500, width=500');
      a.document.write('<html>');
      a.document.write(divContents);
      a.document.write('</body></html>');
      a.document.close();
      a.print();
    }
  </script>
  <style type="text/css">
    table tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    th {
      height: 50px;
    }

    td {
      height: 50px;
    }
  </style>
</head>

<body>
  <center>
   
    <div id="GFG" style="background-color:#dbd97;width:1430px;margin-left: 0px;height: 1370px;font-family: georgian;font-size: 20px;font-weight: normal;border-radius: 5px;border: 1px solid gray;color: black;margin-top: 30px;">
      <div style="margin-top: 30px;margin-left: 350px">
        <?php $tin = $_SESSION['Tin'];
        $query = "SELECT * FROM rg WHERE tin_no='$tin'";
        $query_run = mysqli_query($conn_reg, $query);
        while ($row =$query_run->fetch_assoc()) : ?>
        <img src="<?php echo "upload/".$row['pp']; ?>" width="100px" width="220" height="130">
        <?php 
           endwhile;
          ?>
      </div>
      <div style="margin-top: 30px;margin-left: 100px;float: left;font-family: georgian">
        <p style="font-size: 40px;font-family: georgian;margin-left: 160px"> ጎንደር ከተማ ንግድ መምሪያ ቢሮ የነጋዴዎች የንግድ ፍቃድ ተጠቃሚዎች ማረጋገጫ
        </p>
        <p style="font-size: 40px;font-family: georgian;margin-left: 50px"> Gondar City Commerce Department Office Verification of Merchants Business License Users </p>
        <p style="font-size: 36px;font-family: georgian;margin-left: 145px">
                                                                               <pre>
                                                                                 ደረጃ ሀ Level A
                                                                                 ደረጃ ለ Level B
                                                                                 ደረጃ ሐ Level C</pre>
        </p>
<p style="font-size: 40px;font-family: georgian;margin-left: 50px">  

 </p>
         
        <hr>
      </div>

      <div style="margin-top:400px">
        <div>
          <form method="post">


            <?php
            $id = $_GET['id'];
            $sql = "SELECT rg.id,rg.customerName,rg.region,rg.zone,rg.woreda,rg.kebele,rg.city,rg.mobile_number,rg.gender,rg.tin_no,rg.companyName,
                           rg.tradeName,rg.stutus,rg.report,rg.renewed,rg.capital,rg.Condition FROM rg";
            $re = $conn_reg->query($sql);
            if ($re->num_rows > 0)
              $no = 1;
            $row = $re->fetch_assoc();
            ?>
            <div style="float: left;width: 400px;margin-left: -880px;margin-top: 100px">
              <h2 style="text-decoration: underline;"> ምስክር ወረቀት</h2>
              <p style="text-align: justify;font-size: 23px;font-family:georgian">
              አቶ/ወ/ሮ Mr./Mrs. <?php echo $row['customerName']; ?> ሰጠንዎታል፡፡ <?php echo $row['tin_no']; ?> 
              በጎንደር ከተማ የሚኖሩ ሲሆን የእረሰዎ የመስሪያ አድራሻ/ቦታ  Work address/location <?php echo $row['region']; ?>
የመነሻ ካፒታል   Initial capital <?php echo $row['capital']; ?>
የተሰማሩ ስለሆነ ፍቃድ ሰጥተኖታል።    since they are engaged, we have given them permission.

              </p>
            </div>
            <div style="float: left;width: 400px;margin-left: 700px;margin-top: -360px">
              <h2 style="text-decoration: underline;"> Certificate</h2>
              <p style="text-align: justify;font-size: 23px;font-family: georgian">
                    LicenseStatus:የፍቃድ-ሁኔታ  <?php echo $row['stutus']; ?> 
                    ክልል:Region<?php echo $row['region']; ?>     ዞን:zone <?php echo $row['zone']; ?>    ወረዳ:woreda <?php echo $row['woreda']; ?> ከተማ:city <?php echo $row['city']; ?>       
                    ስልክ:phone <?php echo $row['mobile_number']; ?> ቀበሌ:kebele<?php echo $row['kebele']; ?>
                    Tax Payment Level Condition:<?php echo $row['Condition']; ?>
                  </p>
  

             </div>
          </form>
          </table>
        </div>

      </div>
      <p style="margin-top: 1000px;font-size: 25px;font-family: georgian;margin-left: -0px">Adminisrator Name</p>
      <p style="margin-top: -20px;font-size: 25px;font-family: georgian;margin-left: -0px"><?php echo $name; ?></p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <p style="margin-top: -110px;font-size: 25px;font-family: georgian;margin-left: 650px">Adminisrator Signature</p>
      <p style="margin-top: -20px;font-size: 25px;font-family: georgian;margin-left: 650px"><?php echo md5($name); ?></p>
    </div>


    <input type="button" value="Print" onclick="printDiv()" style="width: 100px;height: 30px"> <input type="button" value="Back" onclick="window.history.back()" style="width: 100px;height: 30px">
</body>

</html>
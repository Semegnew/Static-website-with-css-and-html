<?php
$userData = array();
if(!empty($_GET['tin'])){
    // Include the database configuration file
    require_once 'user_db.php';
    
    // Get the user's ID from the URL
    $userID = $_GET['tin'];
    
    // Fetch the user data based on the ID
    $query = $conn_reg->query("SELECT * FROM rg WHERE tin_no ='$userID'");
    
    if($query->num_rows > 0){
        $userData = $query->fetch_assoc();
    }
}
?>

<!-- Render the user details -->
<div class="container">
    <h2>User Details</h2>
    <?php if(!empty($userData)){ ?>
        <img src="<?php echo "upload/".$userData['pp']; ?>"> 
        <p><b>Customer:</b> <?php echo $userData['customerName']; ?></p>
        <p><b>Region:</b> <?php echo $userData['region']; ?></p>
        <p><b>zone:</b> <?php echo $userData['zone']; ?></p>
        <p><b>woreda:</b> <?php echo $userData['woreda']; ?></p>
        <p><b>Kebele:</b> <?php echo $userData['kebele']; ?></p>
        <p><b>City:</b> <?php echo $userData['city']; ?></p>
        <p><b>Email:</b> <?php echo $userData['email_id']; ?></p>
        <p><b>Phone:</b> <?php echo $userData['mobile_number']; ?></p>
        <p><b>Gender:</b> <?php echo $userData['gender']; ?></p>
        <p><b>CompanyName:</b> <?php echo $userData['tin_no']; ?></p>
        <p><b>TradeName:</b> <?php echo $userData['companyName']; ?></p>
        <p><b>Stutus:</b> <?php echo $userData['tradeName']; ?></p>
        <p><b>Capital:</b> <?php echo $userData['capital']; ?></p>
        <p><b>Tax:</b> <?php echo $userData['tax']; ?></p>
        <p><b>Condition:</b> <?php echo $userData['Condition']; ?></p>
        <p><b>Cancel Status:</b> <?php echo $userData['customerCancelStutus']; ?></p>
        <p><b>Renewed Status:</b> <?php echo $userData['renewed']; ?></p>
        <p><b>Report Status:</b> <?php echo $userData['report']; ?></p>




    <?php }else{ ?>
        <p>User not found...</p>
    <?php } ?>
</div>
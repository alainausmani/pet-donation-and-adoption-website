<?php 
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "administrator"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get image data from database 
$result = $conn->query("SELECT pet_image FROM adoptpets WHERE statuss != 'accept'"); 
?>

<!-- Display images with BLOB data from database -->
<?php if($result && $result->num_rows > 0){ ?> 
    <div class="gallery"> 
        <?php while($row = $result->fetch_assoc()){ ?> 
            <img src="data:image/jpg;base64,<?php echo base64_encode($row['pet_image']); ?>" /> 
        <?php } ?> 
    </div> 
<?php } else { ?> 
    <p class="status error">Image(s) not found...</p> 
<?php } ?>

<?php $conn->close(); ?>

<?php
$conn=new mysqli("localhost","root","","administrator");
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Redirect to the login page
    header("Location: adminlogin.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['adopt'])) {
   
    // Retrieve form data
$pet_name = $_POST['pet_name'];
$breed = $_POST['breed'];
$age = $_POST['age'];
$pet_type = $_POST['pet_type'];
$health_condition = $_POST['health_condition'];
$trained = $_POST['trained']; // Assuming 'yes' or 'no' is passed from the form
$gender = $_POST['gender'];
$arrival_date = $_POST['arrival_date'];
$size = $_POST['size'];
$color = $_POST['color'];
$weight = $_POST['weight'];
$image = $_FILES['image']['name']; 
$tmpfile = $_FILES['image']['tmp_name'];

// Validate form data
if ($pet_name != '' && $breed != '' && $age != '' && $pet_type != ''&& $color != ''  && $health_condition != '' && $trained != '' && $size != '' && $image != ''  && $weight != '' && $arrival_date != ''  && $gender != '') {
    // Insert into the database
    $sql = "INSERT INTO petsadopt(pet_name, breed, age, pet_type,color, health_condition, pet_image,trained,size,weight,arrival_date,gender,statuss) 
            VALUES ('$pet_name', '$breed', $age, '$pet_type','$color', '$health_condition', '$image','$trained', '$size','$weight', '$arrival_date', '$gender','pending')";

    if ($conn->query($sql) === TRUE) {
        // Get the last inserted ID
        $last_inserted_id = $conn->insert_id;
        $targetDirectory = "./pet_images/";
        $targetFile = "{$pet_name}_{$last_inserted_id}.jpg"; // You can change the target file name if needed
        
        // Get the file extension
        $fileExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        
        // Allow only specific file extensions
        $allowedExtensions = array("jpg", "jpeg", "png");
        
        if (in_array($fileExtension, $allowedExtensions)) {
        // Move the uploaded file and rename it with the last inserted ID
        if (move_uploaded_file($tmpfile, $targetDirectory . $targetFile)) {
            echo "Record inserted successfully";
        } else {
            echo "Error moving the file";
        }
    } else {
        echo "Invalid file extension. Only JPG, JPEG, and PNG files are allowed.";
    }
    } else {
        echo "Error inserting record: " . $conn->error;
    }
} else {
    echo "All required fields must be filled.";
}
}
// Close the connection
//$conn->close();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Pet Information</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: rgb(214, 250, 214);
        }
        .form-container {
            background-color: rgba(255, 255, 255, 0.7);
            padding: 40px;
            border-radius: 10px;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h1 style="text-align: center; color: #333;">ADD ADOPTION PETS</h1>

    <form action="addadoptionmerges.php" method="post" enctype="multipart/form-data">
    <div class="form-outline mb-4">
                        <input type="text" id="pet_name" class="form-control form-control-lg"
                               placeholder="Enter pet name" name="pet_name">
                        <label class="form-label" for="pet_name" style="color: white;"></label>
                    </div>
                    <div class="form-outline mb-4">
                        <input type="text" id="color" class="form-control form-control-lg"
                               placeholder="Enter color" name="color">
                        <label class="form-label" for="color" style="color: white;"></label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="text" id="breed" class="form-control form-control-lg"
                               placeholder="Enter breed" name="breed">
                        <label class="form-label" for="breed" style="color: white;"></label>
                    </div>
                    <div class="form-outline mb-4">
                        <input type="text" id="age" class="form-control form-control-lg"
                               placeholder="Enter age" name="age">
                        <label class="form-label" for="age" style="color: white;"></label>
                    </div>
                    <div class="form-outline mb-4">
                        <input type="text" id="pet_type" class="form-control form-control-lg"
                               placeholder="Enter type" name="pet_type">
                        <label class="form-label" for="pet_type" style="color: white;"></label>
                    </div>
                    <div class="form-outline mb-4">
                        <input type="text" id="health_condition" class="form-control form-control-lg"
                               placeholder="Enter health condition" name="health_condition">
                        <label class="form-label" for="health_condition" style="color: white;"></label>
                    </div>
                    <div class="form-outline mb-4">
                        <input type="text" id="trained" class="form-control form-control-lg"
                               placeholder="Enter trained" name="trained">
                        <label class="form-label" for="trained" style="color: white;"></label>
                    </div>
                    
                    <!-- Add other form elements similarly -->

                    <div class="form-outline mb-4">
                        <input type="text" id="gender" class="form-control form-control-lg"
                               placeholder="Enter gender" name="gender">
                        <label class="form-label" for="gender" style="color: white;"></label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="date" id="arrival_date" class="form-control form-control-lg"
                               name="arrival_date">
                        <label class="form-label" for="arrival_date" style="color: white;"></label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="text" id="size" class="form-control form-control-lg"
                               placeholder="Enter size" name="size">
                        <label class="form-label" for="size" style="color: white;"></label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="text" id="weight" class="form-control form-control-lg"
                               placeholder="Enter weight" name="weight">
                        <label class="form-label" for="weight" style="color: white;"></label>
                    </div>

        <label for="image">Pet Image:</label>
        <input type="file" name="image" accept="image/jpeg, image/jpg, image/png" required>

        <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
            <input type="submit" name="adopt" value="Add Pet">

            <!-- "Go Back" button in the upper left corner -->
            
        </div>
    </form>
</div>

<!-- JavaScript function to go back -->
<script>
    function goBack() {
        window.history.back();
    }
</script>

</body>
</html>

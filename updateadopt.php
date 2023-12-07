<?php
$con = new mysqli("localhost", "root", "", "administrator");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $pet_id = $_POST['pet_id'];

    // Update pet's name
    if (isset($_POST['pet_name'])) {
        $update_stmt= "UPDATE petsadopt SET pet_name='".$_POST['pet_name']."' where pet_id=".$_POST['pet_id'];
        $con->query($update_stmt);
    }
    if(isset($_POST['color']))
    {
        $update_stmt= "UPDATE petsadopt SET color='".$_POST['color']."' where pet_id=".$_POST['pet_id'];
        $con->query($update_stmt);
    }
    if(isset($_POST['breed']))
    {
        $update_stmt= "UPDATE petsadopt SET breed='".$_POST['breed']."' where pet_id=".$_POST['pet_id'];
        $con->query($update_stmt);
    }
    if(isset($_POST['age']))
    {
        $update_stmt= "UPDATE petsadopt SET age='".$_POST['age']."' where pet_id=".$_POST['pet_id'];
        $con->query($update_stmt);
    }
    if(isset($_POST['pet_type']))
    {
        $update_stmt= "UPDATE petsadopt SET pet_type ='".$_POST['pet_type']."' where pet_id=".$_POST['pet_id'];
        $con->query($update_stmt);
    }
    
    if(isset($_POST['health_condition']))
    {
        $update_stmt= "UPDATE petsadopt SET health_condition ='".$_POST['health_condition']."' where pet_id=".$_POST['pet_id'];
        $con->query($update_stmt);
    }
    if(isset($_POST['trained']))
    {
        $update_stmt= "UPDATE petsadopt SET trained='".$_POST['trained']."' where pet_id=".$_POST['pet_id'];
        $con->query($update_stmt);
    }
    if(isset($_POST['gender']))
    {
        $update_stmt= "UPDATE petsadopt SET gender ='".$_POST['gender']."' where pet_id=".$_POST['pet_id'];
        $con->query($update_stmt);
    }
    if(isset($_POST['size']))
    {
        $update_stmt= "UPDATE petsadopt SET size='".$_POST['size']."' where pet_id=".$_POST['pet_id'];
        $con->query($update_stmt);
    }
    if(isset($_POST['weight']))
    {
        $update_stmt= "UPDATE petsadopt SET weight ='".$_POST['weight']."' where pet_id=".$_POST['pet_id'];
        $con->query($update_stmt);
    }

    if (isset($_FILES['pet_image']) && $_FILES['pet_image']['error'] == UPLOAD_ERR_OK) {
        $pet_name = $_POST['pet_name'];
        $filetype = $_FILES['pet_image']['type'];
        $tmpfile = $_FILES['pet_image']['tmp_name'];

        $filename = $pet_name;

        $allowed_types = array('image/jpeg', 'image/jpg', 'image/png');

        if (in_array($filetype, $allowed_types)) {
            $target_folder = "petimages/";
            $store_as = $filename . "." . pathinfo($_FILES['pet_image']['pet_name'], PATHINFO_EXTENSION);
            $target_file = $target_folder . $store_as;

            move_uploaded_file($tmpfile, $target_file);

            // Update product's image
            $update_image_stmt = "UPDATE petsadopt SET image='" . $target_file . "' WHERE pet_id=" . $pet_id;
            $con->query($update_image_stmt);
        } else {
            echo "<script>
                alert('Incorrect file type');
                window.location.href='updateadoptpetfront.php';
                </script>";
        }
    }

    header('Location: updateadoptpetfront.php');
    exit();
}

$stmt = "SELECT * FROM petsadopt";
$result = $con->query($stmt);

if (!$result) {
    die("Error: " . $con->error);
}

$con->close();
?>

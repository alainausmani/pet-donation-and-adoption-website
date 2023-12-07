<?php
if (isset($_POST['delete'])) {
    $con = new mysqli("localhost", "root", "", "administrator");

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $pet_id = $_POST['pet_id'];

    // Update status to 'completed' in petsdonate table
    $update_stmt = $con->prepare("UPDATE petsdonate SET statuss = 'completed' WHERE pet_id = ?");
    $update_stmt->bind_param("i", $pet_id);
    $update_stmt->execute();

    if ($update_stmt->affected_rows > 0) {
        echo "Pet status updated to 'completed' successfully";
    } else {
        echo "Pet not found or status already updated";
    }

    $con->close();
}
?>

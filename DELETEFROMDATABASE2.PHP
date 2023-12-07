<?php

if (isset($_POST['delete'])) {
    $con = new mysqli("localhost", "root", "", "administrator");

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $pet_id = $_POST['pet_id'];

    // Retrieve pet details before deletion
    $select_stmt = $con->prepare("SELECT * FROM petsadopt WHERE pet_id = ? ");
    $select_stmt->bind_param("i", $pet_id);
    $select_stmt->execute();
    $result = $select_stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Insert the pet details into the deletedadoptpets table
        $insert_stmt = $con->prepare("INSERT INTO deletedadoptpets (pet_id, pet_name, color, breed, age, pet_type, health_condition, trained, gender, arrival_date, size, weight, pet_image, statuss)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$insert_stmt->bind_param("isssisssssssss", $row['pet_id'], $row['pet_name'], $row['color'], $row['breed'], $row['age'], $row['pet_type'], $row['health_condition'], $row['trained'], $row['gender'], $row['arrival_date'], $row['size'], $row['weight'], $row['pet_image'], $row['statuss']);

        $insert_stmt->execute();

        // Delete the pet from petsadopt table
        $delete_stmt = $con->prepare("DELETE FROM petsadopt WHERE pet_id = ?");
        $delete_stmt->bind_param("i", $pet_id);
        $delete_stmt->execute();

        echo "Pet moved to deletedadoptpets table successfully";
    } else {
        echo "Pet not found in the petsadopt table";
    }

    $con->close();
}

?>
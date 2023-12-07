<?php
$con = new mysqli("localhost", "root", "", "administrator");
session_start();

//Check if the admin is not logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
  // Redirect to the login page
    header("Location: adminlogin.php");
    exit();
}
$stmt_active = "SELECT * FROM petsadopt WHERE statuss = 'pending'";
$result_active = $con->query($stmt_active);

$stmt_inactive = "SELECT * FROM deletedadoptpets";
$result_inactive = $con->query($stmt_inactive);

$stmt_donate = "SELECT * FROM petsdonate WHERE statuss = 'pending'";
$result_donate = $con->query($stmt_donate);
$stmt_inactivedonate = "SELECT * FROM petsdonate WHERE statuss != 'pending'";
$result_inactivedonate = $con->query($stmt_inactivedonate);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <title>Pets</title>
    <style>
        ::-webkit-scrollbar {
            width: 5px;
        }

        ::-webkit-scrollbar-thumb {
            background-color: gray;
        }

        body {
			background-color: rgb(214, 250, 214);
		}
    </style>
</head>

<body>

    <section class="h-100 h-custom">
        <div class="container h-100 py-5">
            <a class="btn btn-dark btn-block" href="adminhomepage.php">Go Back</a>
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="table-responsive">
                        <h2>Active Adopt Pets</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="h5">Pet Image</th>
                                    <th scope="col">Pet Name</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">Breed</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Health condition</th>
                                    <th scope="col">Trained</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Arrival Date</th>
                                    <th scope="col">Size</th>
                                    <th scope="col">Weight</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($result_active->num_rows > 0) {
                                    foreach ($result_active as $row) {
                                        // Display active pets data
                                        echo "<tr>";
                                        $imagePath = "pet_images/{$row['pet_name']}_{$row['pet_id']}.jpg";
                                        echo '<div class="pet-frame">';
                                        echo "<td class='align-middle'><div class='d-flex align-items-center'><img src=\"{$imagePath}\" alt=\"{$row['pet_name']}\" class='img-fluid rounded-3' style='width: 120px;' alt='pet'></div></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['pet_name'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['color'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['breed'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['age'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['pet_type'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['health_condition'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['trained'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['gender'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['arrival_date'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['size'] . "</p></td>";
                                        
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['weight'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['statuss'] . "</p></td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='12'>No active pets found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive">
                        <h2>Inactive Adopt Pets</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <!-- Table header for inactive pets -->
                                    <!-- Add table headers based on the deletedadoptpets table structure -->
                                    <th scope="col">Pet Image</th>
                                    <th scope="col">Pet Name</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">Breed</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Health condition</th>
                                    <th scope="col">Trained</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Arrival Date</th>
                                    <th scope="col">Size</th>
                                    <th scope="col">Weight</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($result_inactive->num_rows > 0) {
                                    foreach ($result_inactive as $row) {
                                        echo "<tr>";
                                        $imagePath = "pet_images/{$row['pet_name']}_{$row['pet_id']}.jpg";
                                        echo '<div class="pet-frame">';
                                        echo "<td class='align-middle'><div class='d-flex align-items-center'><img src=\"{$imagePath}\" alt=\"{$row['pet_name']}\" class='img-fluid rounded-3' style='width: 120px;' alt='pet'></div></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['pet_name'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['color'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['breed'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['age'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['pet_type'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['health_condition'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['trained'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['gender'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['arrival_date'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['size'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['weight'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['statuss'] . "</p></td>";
                                        
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='12'>No inactive pets found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>


                    <div class="table-responsive">
                        <h2>Active Donation Pets</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Pet Image</th>
                                    <th scope="col">Pet Name</th>
                                    <th scope="col">Breed</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Health condition</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Amount need</th>
                                    <th scope="col">Amount left</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                if ($result_donate -> num_rows > 0) {
                                    foreach ($result_donate as $row) {
                                        // Display active pets data
                                        echo "<tr>";
                                        $imagePath = "pet_images/{$row['pet_name']}_{$row['pet_id']}.jpg";
                                        echo '<div class="pet-frame">';
                                        echo "<td class='align-middle'><div class='d-flex align-items-center'><img src=\"{$imagePath}\" alt=\"{$row['pet_name']}\" class='img-fluid rounded-3' style='width: 120px;' alt='pet'></div></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['pet_name'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['breed'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['age'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['pet_type'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['health_condition'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['statuss'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['total_amount'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['amount_left'] . "</p></td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='12'>No active pets found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <h2>InActive Donation Pets</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Pet Image</th>
                                    <th scope="col">Pet Name</th>
                                    <th scope="col">Breed</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Health condition</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Amount need</th>
                                    <th scope="col">Amount left</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                if ($result_inactivedonate -> num_rows > 0) {
                                    foreach ($result_inactivedonate as $row) {
                                        // Display active pets data
                                        echo "<tr>";
                                        $imagePath = "pet_images/{$row['pet_name']}_{$row['pet_id']}.jpg";
                                        echo '<div class="pet-frame">';
                                        echo "<td class='align-middle'><div class='d-flex align-items-center'><img src=\"{$imagePath}\" alt=\"{$row['pet_name']}\" class='img-fluid rounded-3' style='width: 120px;' alt='pet'></div></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['pet_name'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['breed'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['age'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['pet_type'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['health_condition'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['statuss'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['total_amount'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['amount_left'] . "</p></td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='12'>No active pets found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>

<?php
session_start();


$user_email = $_SESSION['user'];

$conn = new mysqli("localhost", "root", "", "ADMINISTRATOR");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql= "SELECT ai.*, ap.*, c.* , ai.statuss as adopt_status
FROM adoptinfo AS ai
INNER JOIN petsadopt AS ap ON ai.pet_id = ap.pet_id
INNER JOIN customer AS c ON ai.email= c.email WHERE ai.email = '$user_email'";
$result = $conn->query($sql);
$idk = "SELECT pd.*, di.*, c.*
        FROM petsdonate AS pd
        INNER JOIN donateinfo AS di ON pd.pet_id = di.pet_id
        INNER JOIN customer AS c ON di.email = c.email
        WHERE c.email = '$user_email'";

$resultidk= $conn->query($idk);
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
            <a class="btn btn-dark btn-block" href="mainpage2.php">Go Back</a>
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="table-responsive">
                        <h2>Adopt History</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                
                                  <th scope="col">Pet Image </th>
                                    <th scope="col">Pet Name</th>
                                    <th scope="col">Request number </th>
                                    <th scope="col">Age</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Health condition</th>
                                    <th scope="col">Trained</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Arrival Date</th>
                                    <th scope="col">Weight</th>
                                    <th scope="col">Status</th>
                                    
                                </tr>
                            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    foreach ($result as $row) {
                        echo "<tr>";
                                        $imagePath = "pet_images/{$row['pet_name']}_{$row['pet_id']}.jpg";
                                        echo '<div class="pet-frame">';
                                        echo "<td class='align-middle'><div class='d-flex align-items-center'><img src=\"{$imagePath}\" alt=\"{$row['pet_name']}\" class='img-fluid rounded-3' style='width: 120px;' alt='pet'></div></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['pet_name'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['adopt_id'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['age'] . "</p></td>";
                                       echo "<td class='align-middle'><p class='mb-3'>" . $row['pet_type'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['health_condition'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['trained'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['gender'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['arrival_date'] . "</p></td>";
                                       echo "<td class='align-middle'><p class='mb-3'>" . $row['weight'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['adopt_status'] . "</p></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='14'>No adopt history found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="table-responsive">
                        <h2>Donate History</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                 
                                  <th scope="col">Pet Image </th>
                                    <th scope="col">Pet Name</th>
                                    <th scope="col">Donation number </th>
                                    <th scope="col">Age</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Health condition</th>
                                    <th scope="col">Amount Donated</th>
                                    <th scope="col">Amount required</th>
                                    
                                </tr>
                            </thead>
            <tbody>
                <?php
                if ($resultidk->num_rows > 0) {
                    foreach ($resultidk as $row) {
                        echo "<tr>";
                                        $imagePath = "pet_images/{$row['pet_name']}_{$row['pet_id']}.jpg";
                                        echo '<div class="pet-frame">';
                                        echo "<td class='align-middle'><div class='d-flex align-items-center'><img src=\"{$imagePath}\" alt=\"{$row['pet_name']}\" class='img-fluid rounded-3' style='width: 120px;' alt='pet'></div></td>";
                       echo "<td class='align-middle'><p class='mb-3'>" . $row['pet_name'] . "</p></td>";
                        echo "<td class='align-middle'><p class='mb-3'>" . $row['donate_id'] . "</p></td>";
                        echo "<td class='align-middle'><p class='mb-3'>" . $row['age'] . "</p></td>";
                       echo "<td class='align-middle'><p class='mb-3'>" . $row['pet_type'] . "</p></td>";
                        echo "<td class='align-middle'><p class='mb-3'>" . $row['health_condition'] . "</p></td>";
                       echo "<td class='align-middle'><p class='mb-3'>" . $row['donation_amount'] . "</p></td>";
                        echo "<td class='align-middle'><p class='mb-3'>" . $row['amount_left'] . "</p></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='14'>No adopt history found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>


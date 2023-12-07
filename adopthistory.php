<?php
$con = new mysqli("localhost", "root", "", "administrator");
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
   
    header("Location: adminlogin.php");
    exit();
}
$stmt_active = "SELECT ai.*, ap.*, c.* 
                FROM adoptinfo AS ai
                INNER JOIN petsadopt AS ap ON ai.pet_id = ap.pet_id
                INNER JOIN customer AS c ON ai.email= c.email
                WHERE ai.statuss = 'accept'";
$result_active = $con->query($stmt_active);
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
                        <h2>Adopt History</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                  
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
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Email</th>
                                </tr>
                            </thead>
            <tbody>
                <?php
                if ($result_active->num_rows > 0) {
                    foreach ($result_active as $row) {
                        echo "<tr>";
                        // Display adoptinfo (pet) details
                       // echo "<td class='align-middle'><div class='d-flex align-items-center'><img src='" . $row['pet_image'] . "' class='img-fluid rounded-3' style='width: 120px;' alt='pet'></div></td>";
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
                       
                        echo "<td class='align-middle'><p class='mb-3'>" . $row['full_name'] . "</p></td>";
                        echo "<td class='align-middle'><p class='mb-3'>" . $row['email'] . "</p></td>";
                       
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

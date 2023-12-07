
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
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ADMINISTRATOR";

$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    
    header("Location: adminlogin.php");
    exit();
}
$stmt = "SELECT * FROM adoptinfo WHERE statuss = 'pending' AND pet_id IN (SELECT pet_id FROM petsadopt WHERE statuss = 'pending')";
$result_active = $conn->query($stmt);

//$stmt = "SELECT * FROM adoptinfo WHERE statuss = 'pending'";
//$result_active = $conn->query($stmt);

if ($_GET) {
    $pet_id = $_GET['pet_id'];
    $action = $_GET['action'];
    $customer = $_GET['customer'];
    //new lines
    if ($action == "accept") {
        $update_other_requests = "UPDATE adoptinfo SET statuss='reject' WHERE pet_id = $pet_id AND email <> '$customer' AND statuss = 'pending'";
        $conn->query($update_other_requests);
    }
    $update_stmt = "UPDATE adoptinfo SET statuss='" . $action . "' WHERE pet_id=" . $pet_id . " AND email='" . $customer . "'";
    $conn->query($update_stmt);

    if ($action == "accept") {
        $stmt_pets1 = "SELECT * FROM petsadopt WHERE pet_id=$pet_id";
        $result_active1 = $conn->query($stmt_pets1);

        // Update status in petsadopt table
        $update_status_petsadopt = "UPDATE petsadopt SET statuss='" . $action . "' WHERE pet_id=" . $pet_id;
        $conn->query($update_status_petsadopt);

        // Copy data to deletedpets table
        $insert_stmt = "INSERT INTO deletedadoptpets (pet_id, pet_name, color, breed, age, pet_type, health_condition, trained, gender, arrival_date, size, weight)
                        SELECT pet_id, pet_name, color, breed, age, pet_type, health_condition, trained, gender, arrival_date, size, weight
                        FROM petsadopt WHERE pet_id = $pet_id";
        $res = $conn->query($insert_stmt);
    }
}

?>

<section class="h-100 h-custom">
        <div class="container h-100 py-5">
            <a class="btn btn-dark btn-block" href="adminhomepage.php">Go Back</a>
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="table-responsive">
                        <h2>Requests</h2>
                        <table class="table">
                            <thead>
                                <tr>
                
                                    <th scope="col">Pet ID</th>
                                    <th scope="col">Customer Email</th>
                                    <th scope="col">Experience</th>
                                    <th scope="col">Years Of Experience</th>
                                    <th scope="col">Needs Aware</th>
                                    <th scope="col">Training fimiliar</th>
                                    <th scope="col">Financial Preparation</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($result_active->num_rows > 0) {
                                    foreach ($result_active as $row) {
                                        
                                        $accept='adminchoice3.php?action=accept&pet_id='.$row['pet_id'].'&customer='.$row['email'];
                                        $reject='adminchoice3.php?action=reject&pet_id='.$row['pet_id'].'&customer='.$row['email'];

                                        echo "<tr>";
                        
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['pet_id'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['email'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['experience'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['years'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['needs_aware'] . "</p></td>";
                                        echo "<td class='align-middle'><p class='mb-3'>" . $row['training_familiar'] . "</p></td>";
                                       echo "<td class='align-middle'><p class='mb-3'>" . $row['financial_prep'] . "</p></td>";
                                        
                                        echo "<td class='align-middle'>
                                        <a class='btn btn-success' href='$accept'>Accept</a>
                                        <a class='btn btn-danger' href='$reject'>Reject</a>

                                              </td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='13'>No adoption request found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function acceptPet(petId) {
            console.log("Accepted pet with ID: " + petId);
        }

        function rejectPet(petId) {
            console.log("Rejected pet with ID: " + petId);
        }

    </script>
</body>

</html>

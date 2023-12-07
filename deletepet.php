<?php
$con = new mysqli("localhost", "root", "", "administrator");
$stmt = "SELECT * FROM petsadopt WHERE statuss = 'pending'";
$result = $con->query($stmt);
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
    <title>Delete</title>
    <style>
        body {
            background-color: rgb(214, 250, 214);
        }
    </style>
</head>

<body>

    <section class="h-100 h-custom">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="table-responsive">
                        <h2>Adoption Pets</h2>
                        <table class="table">
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
                                    <th scope="col">Weight</th>
                                    <th scope="col">Size</th>
                                    <th scope="col">Status</th>
                            <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                    foreach ($result as $row) {
                                        $imagePath = "pet_images/{$row['pet_name']}_{$row['pet_id']}.jpg";
                                ?>
                                        <tr>
                                            <form action="DELETEFROMDATABASE2.php" method="post" enctype="multipart/form-data">
                                              
                                                <td class='align-middle'>
                                                    <div class='d-flex align-items-center'>
                                                        <img src="<?php echo $imagePath; ?>" alt="<?php echo $row['pet_name']; ?>" class='img-fluid rounded-3' style='width: 120px;' alt='pet'>
                                                    </div>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="mb-3"><?php echo $row['pet_name'] ?></p>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="mb-3"><?php echo $row['color'] ?></p>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="mb-3"><?php echo $row['breed'] ?></p>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="mb-3"><?php echo $row['age'] ?></p>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="mb-3"><?php echo $row['pet_type'] ?></p>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="mb-3"><?php echo $row['health_condition'] ?></p>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="mb-3"><?php echo $row['trained'] ?></p>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="mb-3"><?php echo $row['gender'] ?></p>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="mb-3"><?php echo $row['arrival_date'] ?></p>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="mb-3"><?php echo $row['size'] ?></p>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="mb-3"><?php echo $row['weight'] ?></p>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="mb-3"><?php echo $row['statuss'] ?></p>
                                                </td>
                                                <td class="align-middle">
                                                    <button class="btn btn-dark btn-block" name="delete" type="submit">Delete</button>
                                                    <input type="hidden" name="pet_id" value="<?php echo $row['pet_id']; ?>">
                                                </td>
                                            </form>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='13'>No pets found</td></tr>";
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
















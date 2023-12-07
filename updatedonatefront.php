<?php
$con = new mysqli("localhost", "root", "", "administrator");
$stmt = "SELECT * FROM petsdonate WHERE statuss = 'pending'";

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
    <title>Update</title>

    <style>
        body {
            background-color: rgb(214, 250, 214);
        }

        @media (min-width: 1025px) {
            .h-custom {
                height: 100vh !important;
            }
        }

        body,
        th,
        td {
            color: darkgreen;
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
                        <h2>Donate Pets</h2>
                        <table class="table">
                                <th scope="col">Pet Image</th>
                                    <th scope="col">Pet Name</th>
                                    <th scope="col">Breed</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Health condition</th>
                                    <th scope="col">Amount need</th>
                                
                            <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                    foreach ($result as $row) {
                                ?>
                                        <tr>
                                            <form action="updatedonate.php" method="post" enctype="multipart/form-data">
                                            <th scope="row">
                                           <?php 
                    
                    ?>
                    
                    <div class="d-flex align-items-center">
                      <input type="file" name="image" accept="image/jpeg, image/jpg, image/png" >
                    </div>
                                            </th>
                                            <td class="align-middle">
                                                <input class="mb-3" type="text" value="<?php echo $row['pet_name'] ?>" name="pet_name">
                                            </td>
                                            <td class="align-middle">
                                                <input class="mb-3" type="text" value="<?php echo $row['breed'] ?>" name="breed">
                                            </td>
                                            <td class="align-middle">
                                                <input class="mb-3" type="text" value="<?php echo $row['age'] ?>" name="age">
                                            </td>
                                            <td class="align-middle">
                                                <input class="mb-3" type="text" value="<?php echo $row['pet_type'] ?>" name="pet_type">
                                            </td>
                                            <td class="align-middle">
                                                <input class="mb-3" type="text" value="<?php echo $row['health_condition'] ?>" name="health_condition">
                                            </td>
                                            <td class="align-middle">
                                                <input class="mb-3" type="text" value="<?php echo $row['total_amount'] ?>" name="total_amount">
                                            </td>

                                            <td class="align-middle">
                                                <button class="btn btn-dark btn-block" name="update" type="submit">Edit</button>
                                                <input type="hidden" name="pet_id" value="<?php echo $row['pet_id'] ?>">
                                            </td>
                                            </form>
                                        </tr>
                                <?php
                                    }
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
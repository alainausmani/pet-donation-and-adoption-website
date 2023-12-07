<?php
session_start();

// Check if the admin is not logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Redirect to the login page
    header("Location: adminlogin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminstyle.css">
    <title>HomePage</title>
	<style>
		body {
			background-color: rgb(214, 250, 214);
		}
	
	</style>
</head>
<body>

<div style="overflow-y: scroll; height: 100vh;">
<div class="AdminHomePageLayout">
	<div class="AdminHomePageActionButton">
	<a href="addadoptionmerges.php" class="HomePageButton" style="color: darkgreen">Add Adopt Pets</a>
	</div>
	<div class="AdminHomePageActionButton">
	<a href="adddonationpetback2.php" class="HomePageButton" style="color: darkgreen">Add Donate Pets</a>
	</div>
	<div class="AdminHomePageActionButton">
	<a href="updateadoptpetfront.php" class="HomePageButton" style="color: darkgreen">Update Adopt Pets</a>
	</div>
	<div class="AdminHomePageActionButton">
	<a href="updatedonatefront.php" class="HomePageButton" style="color: darkgreen">Update Donate Pets</a>
	</div>
	<div class="AdminHomePageActionButton">
	<a href="deletepet.php" class="HomePageButton" style="color: darkgreen">Delete Adopt Pets</a>
	</div>
	<div class="AdminHomePageActionButton">
	<a href="deletedonatepets.php" class="HomePageButton" style="color: darkgreen">Delete Donate Pets</a>
	</div>
	<div class="AdminHomePageActionButton">
	<a href="viewpet2.php" class="HomePageButton" style="color: darkgreen">View Pets</a>
	</div>
	<div class="AdminHomePageActionButton">
	<a href="adminchoice3.php" class="HomePageButton" style="color: darkgreen">Adoption Requests</a>
	</div>
	<div class="AdminHomePageActionButton">
	<a href="adopthistory.php" class="HomePageButton" style="color: darkgreen">Adoption History</a>
	</div>
	<div class="AdminHomePageActionButton">
	<a href="donatehistory.php" class="HomePageButton" style="color: darkgreen">Donation History</a>
	</div>
	<div class="AdminHomePageActionButton">
	<a href="adminlogin.php" class="HomePageButton" style="color: darkgreen">LogOut</a>
	</div>
</div>

</body>
</html>
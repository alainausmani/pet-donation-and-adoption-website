<?php
session_start();
session_destroy();
header('location: mainpage2.php?logout=true');


?>
<!DOCTYPE html>
<html>
<head>
    <title>Logout</title>
</head>
<body>
    <h1>Logout</h1>
</body>
</html>

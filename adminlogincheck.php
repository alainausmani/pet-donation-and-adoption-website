<?php
session_start();
if(isset($_POST['login']))
{
    $con=new mysqli("localhost","root","","administrator");
    $stmt="Select email, password from admininfo";
    $result= $con->query($stmt);

    $stat=false;
    while($row= $result->fetch_assoc())
    {
        if($_POST['email']==$row['email'] && $_POST['password']==$row['password'])
        {
            $stat==true;
            $_SESSION['admin_logged_in'] = true;
            header('location: adminhomepage.php');
            exit();
        }
    }
    if($stat==false)
    {
            echo "
            <script>alert('incorrect email/password');
            window.location.href='adminlogincheck.php';</script>
            ";
        }

    
}


?>
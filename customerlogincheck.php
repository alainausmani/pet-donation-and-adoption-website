<?php
session_start();

if(isset($_POST['login']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];

    $con=new mysqli("localhost","root","","administrator");
    $stmt="SELECT * FROM `customer` WHERE `email`='$email' AND `password`='$password';";
echo $stmt;
    $result=$con->query($stmt);
    $stat=false;
    if($result->num_rows>0)
    {
	
session_start();
$_SESSION['login_status']='1';
$_SESSION['user']=$email;
        header('location: mainpage2.php');

    }
  else
    {
        echo "<script>
       // alert('Incorrect !');
                //window.location.href='customerlogin2.php';
                </script>";
        header('location: customerlogin2.php?login=false');
    }

}

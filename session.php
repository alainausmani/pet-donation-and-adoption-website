<?php
session_start();

if($_SESSION['login_status'] == '1'){
$registered_user=$_SESSION['user'];

//echo 'Registered or login user email is: '.$registered_user;
}else{
        header('location: customerlogin2.php?login=false');

}
?>
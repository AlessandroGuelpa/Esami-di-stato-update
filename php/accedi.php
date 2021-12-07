<?php
session_start();
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = "ReteZero";
$conn = mysqli_connect($servername, $username, $password, "$dbname");
if (!$conn) {
    die('Could not connect MySql Server:' . mysql_error());
}
$email = $_POST['email'];
$password = $_POST['password'];
$selezione = "SELECT * FROM utente WHERE email = '$email' AND password='$password'";
$return = mysqli_query($conn, $selezione);
$number = mysqli_num_rows($return);
if ($_POST['email'] == "admin@gmail.com" and $_POST['password'] == "admin") {
    header("location: admin.php");
} else {
    if ($number == 1) {
        header('Location: logged.php');
    } else {
        header('Location: registrati.html');
    }
}
$_SESSION['email'] = $email;

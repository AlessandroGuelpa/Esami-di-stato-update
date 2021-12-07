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
$query="DELETE FROM utente WHERE email = '$email'";
$r = mysqli_query($conn, $query) or die (mysqli_error($conn));
header('Location:utenti.php');
?>
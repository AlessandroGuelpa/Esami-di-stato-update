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
$ID_diretta= $_POST['ID'];
$email = $_SESSION['email'];
$data = date('Y-m-d');
$query = "INSERT INTO visualizzazione VALUES('$email','$ID_diretta','$data')";
$r = mysqli_query($conn, $query) or die(mysqli_error($conn));
header('Location:Dirette.php');

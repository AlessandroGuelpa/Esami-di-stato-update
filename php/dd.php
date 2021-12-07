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
$ID = $_POST['ID'];
$query="DELETE FROM dirette WHERE ID = '$ID'";
$r = mysqli_query($conn, $query) or die (mysqli_error($conn));
header('Location:dirette.php');
?>
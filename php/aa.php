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
$nome = $_POST['nome'];
$data = $_POST['data'];
$regista = $_POST['regista'];
$durata = $_POST['durata'];
$ospiti = $_POST['ospiti'];
$selezione = "SELECT ID FROM dirette WHERE ID = '$ID'";
$return = mysqli_query($conn, $selezione);
$number = mysqli_num_rows($return);
if ($number == 1) {
    echo "<p>ID gia utilizzato</p>";
    sleep(5);
    header('Location:dirette.php');
} else {
    $query = "INSERT INTO dirette VALUES('$ID','$nome','$data','$regista','$durata','$ospiti')";
    $r = mysqli_query($conn, $query) or die(mysqli_error($conn));
    header('Location:dirette.php');
}

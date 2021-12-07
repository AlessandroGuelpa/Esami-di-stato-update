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
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$email = $_POST['email'];
$password = $_POST['password'];
$selezione = "SELECT * FROM utente WHERE email = '$email'";
$return = mysqli_query($conn, $selezione);
$number = mysqli_num_rows($return);
if ($number == 1) {
    header('Location:fail.php');
} else {
    $query = "INSERT INTO utente VALUES(NULL,'$nome','$cognome','$email','$password')";
    $r = mysqli_query($conn, $query) or die(mysqli_error($conn));
    header('Location:utenti.php');
}

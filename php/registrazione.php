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
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$password = $_POST['password'];
$selezione = "SELECT * FROM utente WHERE email = '$email'";
$return = mysqli_query($conn, $selezione);
$number = mysqli_num_rows($return);
if ($number == 1) {
    echo "$email già utilizzata";
    echo '<br><br><a href="registrazione.html">Torna indietro alla registrazione</a>';
} else {
    $registration = "INSERT INTO utente VALUES (NULL,'$nome','$cognome','$email','$password')";
    mysqli_query($conn, $registration);
    header('Location: logged.php');
}

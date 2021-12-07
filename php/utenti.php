<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = "ReteZero";
$conn = mysqli_connect($servername, $username, $password, "$dbname");
if (!$conn) {
    die('Could not connect MySql Server:' . mysql_error());
}
$query = "SELECT nome, cognome, email FROM utente";
$ris = mysqli_query($conn, $query) or die(mysqli_error());
$numerorighe = mysqli_num_rows($ris);
echo "<br>";
while ($row = mysqli_fetch_assoc($ris)) {
    $nome = $row['nome'];
    $cognome = $row['cognome'];
    $email = $row['email'];
    echo "<h2>";
    echo "<table>";
    echo "<tr>";
    echo "<th>|nome|</th>";
    echo "<th>|cognome|</th>";
    echo "<th>|email|</th>";
    echo "</tr>";
    echo "<td>|" . $nome . "|</td>";
    echo "<td>|" . $cognome . "|</td>";
    echo "<td>|" . $email . "|</td>";
    echo "</table>";
    echo "</h2>";
}
echo "<br><br>";
echo "<br><br>";
echo "<br><br>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Delete</title>
</head>

<body>
    scrivi la email di un account che vuoi eliminare
    <form action='d.php' name='form' method='post'>
        <input type='email' name='email' placeholder='email'>
        <input type='submit' value='elimina'>
    </form><br><br>
    <p>oppure aggiungi un altro account manualmente</p>
    <form action='a.php' name='form' method='post'>
        <input type='nome' name='nome' placeholder='nome'>
        <input type='cognome' name='cognome' placeholder='cognome'>
        <input type='email' name='email' placeholder='email'>
        <input type='text' name='password' placeholder='password'>
        <input type='submit' value='aggiungi'>
    </form>
    <br><br><a href=admin.php>torna indietro </a>
</body>

</html>
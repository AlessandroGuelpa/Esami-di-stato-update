<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = "ReteZero";
$conn = mysqli_connect($servername, $username, $password, "$dbname");
if (!$conn) {
    die('Could not connect MySql Server:' . mysql_error());
}
$q = "SELECT COUNT(e_utente)AS conta FROM (visualizzazione v JOIN utente u ON v.e_utente = u.email)
JOIN dirette d ON v.ID_dirette = d.ID WHERE v.ID_dirette = '$ID'";
$risult = mysqli_query($conn, $q) or die(mysqli_error());
$query = "SELECT ID, nome, data, regista, durata, ospiti FROM dirette";
$ris = mysqli_query($conn, $query) or die(mysqli_error());
$numerorighe = mysqli_num_rows($ris);
echo "<br>";
while ($row = mysqli_fetch_assoc($ris,$risult)) {
    $nome = $row['nome'];
    $data = $row['data'];
    $regista = $row['regista'];
    $durata = $row['durata'];
    $ospiti = $row['ospiti'];
    $ID = $row['ID'];
    $i = $row['conta'];
    echo "<h2>";
            echo "<table>";
            echo "<tr>";
            echo "<th>|ID|</th>";
            echo "<th>|nome|</th>";
            echo "<th>|data|</th>";
            echo "<th>|regista|</th>";
            echo "<th>|durata|</th>";
            echo "<th>|ospiti|</th>";
            echo "<th>|visualizzazioni|</th>";
            echo "</tr>";
            echo "<td>|" .$ID . "|</td>";
            echo "<td>|" .$nome . "|</td>";
            echo "<td>|" .$data . "|</td>";
            echo "<td>|" .$regista . "|</td>";
            echo "<td>|" .$durata . " minuti|</td>";
            echo "<td>|" .$ospiti . "|</td>";
            echo "<td>|" .$i . "|</td>";
            echo "</table>";
            echo "</h2>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dirette</title>
</head>

<body>
    scrivi l'id della trasmissione che vuoi eliminare
    <form action='dd.php' name='form' method='post'>
        <input type='number' name='ID' min='1'>
        <input type='submit' value='elimina'>
    </form>
    <br><br><a href=admin.php>torna indietro </a>
    <p>oppure aggiungi una trasmissione manualmente</p>
    <form action='aa.php' name='form' method='post'>
        <input type='number' name='ID' placeholder='ID'>
        <input type='text' name='nome' placeholder='nome'>
        <input type='date' name='data' placeholder='data'>
        <input type='text' name='regista' placeholder='regista'>
        <input type='number' name='durata' placeholder='durata in minuti'>
        <input type='number' name='ospiti' placeholder='ospiti'>
        <input type='submit' value='aggiungi'>
    </form>

</body>

</html>
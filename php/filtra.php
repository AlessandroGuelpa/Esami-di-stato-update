<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = "ReteZero";
$conn = mysqli_connect($servername, $username, $password, "$dbname");
if (!$conn) {
    die('Could not connect MySql Server:' . mysqli_error());
}
$nome = $_POST['nome'];
$data = $_POST['data'];
$regista = $_POST['regista'];
$durata = $_POST['durata'];
$ospiti = $_POST['ospiti'];
$query = "SELECT nome,data,regista,durata,ospiti 
FROM dirette 
WHERE nome = '$nome' 
OR data = '$data' OR regista = '$regista' 
OR durata = '$durata' OR ospiti = '$ospiti'";
$ris = mysqli_query($conn, $query) or die(mysqli_error($conn));
$numerorighe = mysqli_num_rows($ris);
?>
<?php
session_start();
if (isset($_SESSION['email'])) {
    header('Location:logged.php');
}
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rete Zero</title>
        <link rel="stylesheet" href="static/style.css" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
        <link rel="icon" href="media/fav.ico">
        <div id='stars'></div>
        <div id='stars2'></div>
        <div id='stars3'></div>
        <script>
            /* When the user clicks on the button,
                                                                                toggle between hiding and showing the dropdown content */
            function myFunction() {
                document.getElementById("myDropdown").classList.toggle("show");
            }

            // Close the dropdown menu if the user clicks outside of it
            window.onclick = function(event) {
                if (!event.target.matches('.dropbtn')) {
                    var dropdowns = document.getElementsByClassName("dropdown-content");
                    var i;
                    for (i = 0; i < dropdowns.length; i++) {
                        var openDropdown = dropdowns[i];
                        if (openDropdown.classList.contains('show')) {
                            openDropdown.classList.remove('show');
                        }
                    }
                }
            }
        </script>
        <style>
            @media only screen and (max-width: 600px) {
                .main {
                    width: 70%;
                    overflow: hidden;
                    margin: auto;
                    margin: 20% 0% 20%;
                    background: #23463f;
                    border-radius: 15px;
                    padding-top: 1%;
                    padding-bottom: 2%;
                }
            }
        </style>
    </head>

    <body>
        <div class="main">
            <div class="left">
                <a href="index.php"><img src="media/logo.png"></a>
            </div>
            <div class="right">
                <div class="dropdown">
                    <button onclick="myFunction()" class="dropbtn">Account</button>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="accedi.html">Accedi</a>
                        <a href="registrati.html">Registrati</a>
                    </div>
                </div>
            </div>
            <div class="middle">
                |
                <a href="index.php">Home</a> |
                <a href="live.html">Live</a> |
                <a href="Dirette.php">Cerca dirette passate</a> |
                <a href="info.html">Info</a> |
            </div>
        </div>
        <div class="center">
            <form method="POST" action="filtra.php" name="form">
                <input type="text" name="nome" placeholder="nome">
                <input type="date" name="data" placeholder="data">
                <input type="text" name="regista" placeholder="regista">
                <input type="int" name="durata" placeholder="durata">
                <input type="int" name="ospiti" placeholder="ospiti">
                <input type="submit" value="invia">
            </form>
        </div>
        <?php
        while ($row = mysqli_fetch_assoc($ris)) {
            $nome = $row['nome'];
            $data = $row['data'];
            $regista = $row['regista'];
            $durata = $row['durata'];
            $ospiti = $row['ospiti'];
            echo "<h2>";
            echo "<table>";
            echo "<tr>";
            echo "<th>|nome|</th>";
            echo "<th>|data|</th>";
            echo "<th>|regista|</th>";
            echo "<th>|durata|</th>";
            echo "<th>|ospiti|</th>";
            echo "</tr>";
            echo "<td>|" .$nome . "|</td>";
            echo "<td>|" .$data . "|</td>";
            echo "<td>|" .$regista . "|</td>";
            echo "<td>|" .$durata . " minuti|</td>";
            echo "<td>|" .$ospiti . "|</td>";
            echo "</table>";
            echo "</h2>";
        }
        ?>
    </body>

    </html>


<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location:Dirette.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live</title>
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
        <div class="middle">
            |
            <a href="index.php">Home</a>
            |
            <a href="live.html">Live</a>
            |
            <a href="Dirette.php">Cerca dirette passate</a>
            |
            <a href="info.html">Info</a>
            |
            <a href="logout.php">Logout</a>
            |
        </div>
    </div>
    <div class="center">
        <div class="live">
            <center>
                <span style="color:blue;font-size: xx-large;">Qui trovi elencate tutte le dirette</span><br>
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
                $query = "SELECT ID, nome, data, regista FROM dirette ";
                $ris = mysqli_query($conn, $query) or die(mysqli_error());
                $numerorighe = mysqli_num_rows($ris);
                while ($row = mysqli_fetch_assoc($ris)) {
                    $ID = $row['ID'];
                    $nome = $row['nome'];
                    $data = $row['data'];
                    $regista = $row['regista'];
                    echo "<h2>";
                    echo $ID . " ";
                    echo "| ";
                    echo $nome . " ";
                    echo "| ";
                    echo $data . " ";
                    echo "| ";
                    echo $regista . " ";
                    echo "| ";
                    echo "</h2>";
                }
                ?>
                <form action="v.php" method="POST">
                    <p style="font-size:large;color:white;">inserisci l'id della trasmissione per visualizzarla</p>
                    <input type="int" name="ID">
                    <input type="submit" value="submit">
                </form>
            </center>
        </div>
    </div>
</body>

</html>
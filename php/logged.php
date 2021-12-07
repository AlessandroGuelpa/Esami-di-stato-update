<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location:login.php');
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
        <div class="last">
            <center>
                <span style="color:blue;font-size: xx-large;">Ultime Dirette</span>
                <div class="video">
                    <a href="Dirette.php"><video width="320" height="240" muted autoplay>
                            <source src="media/scrolling.mp4" type="video/mp4"></a>
                    </video>
                    <a href="Dirette.php"><video width="320" height="240" muted autoplay>
                            <source src="media/tm.mp4" type="video/mp4"></a>
                    </video>
                    <a href="Dirette.php"><video width="320" height="240" muted autoplay>
                            <source src="media/video.mp4" type="video/mp4"></a>
                    </video>
                </div>
            </center>
        </div>
    </div>
    <div class="on">
        <center>
            <span style="color:blue;font-size: xx-large;">OnLive</span>
            <div class="gif">
                <a href="live.html"><img src="media/giph.gif"></a>
                <br>
            </div>
        </center>
    </div>
</body>

</html>
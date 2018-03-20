<?php

echo "<html>
<head>
    <title>Dokle.ba</title>
    <link rel='icon' type='image/png' href='miniLogo.png'>
    <meta charset='utf-8'>
    <link rel='stylesheet' type='text/css' href='style.css'>
    <link rel='shortcut icon' href='https://d30y9cdsu7xlg0.cloudfront.net/png/40506-200.png' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script type='text/javascript' src='script.js'></script>
    <script async defer src='https://maps.googleapis.com/maps/api/js?key= AIzaSyDjLcd_ChTBifIsHeGhroL1nf8kP58vroM &callback=initMap'></script>
</head>
<body>
    <header class='main-nav'>
        <button class='toggle-nav'>
            <span>></span>
        </button>

        <ul class='nav'>
            <li class='lout' id='logo'><a href='#'><img src='Tripda Logo.jpg'></img></a></li>           
            <li class='loud'><a href='pocetna.php'>Početna</a></li>            
            <li class='loud'><a href='korisnici.php'>Korisnici</a></li>";
                if(isset($_SESSION['id']))
                {
                    $idPrimaoca = $_SESSION['id'];
                    $sql = "SELECT idPoruke FROM poruke WHERE idPrimaoca=? AND procitana=0";
                    $spremna2 = $conn->prepare($sql);
                    $spremna2->bind_param('i', $idPrimaoca);
                    $spremna2->execute();
                    $spremna2->store_result();
                    $neprocitane = $spremna2->num_rows;
                    $spremna2->close();
                    if($neprocitane == 0)
                        echo "<li class='loud'><a href='poruke.php'>Poruke</a></li>";
                    else
                        echo "<li class='loud'><a href='poruke.php'>Poruke (".$neprocitane.")</a></li>";
                }
                else
                {
                    echo "<li class='loud'><a href='#onama'>Kontakt</a></li>";
                }

                if(isset($_SESSION["id"]))
                {
                    echo "<li class='loud'><a href='profil.php?id=".$_SESSION["id"]."'>Profil</a></li>";
                }
                else
                {
                    echo "<li class='loud'><a href='index.php'>Login</a></li>";
                }
                
                if(isset($_SESSION["id"]))
                {
                    echo "<li class='loud'><a href='logout.php'>Logout</a></li>";
                }
                else
                {
                    echo "<li class='loud'><a href='index.php'>Registruj se</a></li>";
                }
        echo "</ul>
    </header>";
?>
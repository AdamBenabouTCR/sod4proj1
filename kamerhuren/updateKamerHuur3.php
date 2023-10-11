<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Update kamer 3</title>
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover:not(.active) {
            background-color: #f44336;
        }

        .active {
            background-color: #04AA6D;
        }
    </style>
</head>
<header>
    <ul>
        <li><a href="../mainmenu.php">Menu</a></li>
        <li><a href="../index.php">Uitloggen</a></li>
    </ul>
</header>
<body>

<h1>Kamer update</h1>
<p>Dit formulier is om kamergegevens te wijzigen</p>

<?php

require "../src/kamer/Kamer.php";
$kamerid = $_POST ["kameridvak"];
$kammernummer = $_POST ["kamernummervak"];
$kameraantalbedden = $_POST ["kammeraantalbeddenvak"];
$kamerprijs= $_POST ["kamerprijsvak"];



$kamer1 = new Kamer($kamerid, $kamernummer, $kameraantalbedden, $kamerprijs);
$kamer1->updateKamer2();
?>
</body>
</html>

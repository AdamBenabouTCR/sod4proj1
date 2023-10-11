<!DOCTYPE HTML>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>create kamer 2</title>
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
<h1>Create kamer 2</h1>

<?php
require "../src/kamerhuren/Kamerhuur.php";

$huurid = NULL;
$nachten=$_POST["aantalnachtenvak"];
$totaalprijs=$_POST["totaalprijsvak"];
$kamerid = NULL;
$klantid = NULL;

$kamerhuur1 = new KamerHuur($huurid, $nachten, $totaalprijs, $kamerid, $klantid);
$kamerhuur1->createKamerHuur();
?>
</body>
</html>

<!DOCTYPE HTML>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>create kamerhuur 2</title>
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
<h1>Create kamerhuur 2</h1>

<?php
require "../src/kamerhuren/Kamerhuur.php";

$huurId = NULL;
$aantalNachten=$_POST["aantalnachtenvak"];
$totaalPrijs=$_POST["totaalprijsvak"];
$kamerId = $_POST["kameridvak"];
$klantId = $_POST["klantidvak"];

$kamerHuur1 = new kamerHuur($huurId, $aantalNachten, $totaalPrijs, $kamerId, $klantId);
$kamerHuur1->createKamerHuur();
?>
</body>
</html>

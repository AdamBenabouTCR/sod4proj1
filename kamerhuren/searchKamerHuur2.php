<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Search Kamerhuur 2</title>
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
<h1>Kamerhuur Zoeken</h1>

<?php

require "../src/kamerhuren/Kamerhuur.php";

$huurId = $_POST["huuridvak"];

//gegevens worden verwijst naar de object Kamerhuur in de functie searchKamer
$kamerhuur1 = new kamerHuur($huurId);
$kamerhuur1->searchKamerHuur();
$kamerhuur1->afdrukken();
?>
</body>
</html>

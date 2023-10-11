<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>update kamerhuur 2</title>
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
<h1>Kamerhuur update</h1>
<p>Hier kunt u huurgegevens toepassen</p>
<h1>Update kamerhuur 2</h1>
<p>
    Hier kunt u huurgegevens wijzigen
</p>

<?php
require "../src/kamerhuren/Kamerhuur.php";

$huurid=$_POST["huuridvak"];

$kamerhuur1 = new kamerHuur($huurid);
$kamerhuur1->updateKamerHuur();
?>
</body>
</html>

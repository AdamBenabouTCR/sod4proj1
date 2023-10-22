<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>search kamerhuur 1</title>
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
<h1>Kamerhuur zoeken</h1>
<form action="searchKamerHuur2.php" method="post">
    Zoek op Huur-id
    <label>
        <input type="text" name="huuridvak">
    </label><br/>

    <input type="submit">
</form>

<?php
?>
</body>
</html>

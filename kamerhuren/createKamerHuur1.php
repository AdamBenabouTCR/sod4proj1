<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>create kamerhuur 1</title>
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
<h1>Create kamerhuur 1</h1>
<form action="createKamerHuur2.php" method="post">
    <label for="aantalnachtenvak">Aantal nachten</label>
    <input type="text" id="aantalnachtenvak" name="aantalnachtenvak"><br/>
    <label for="totaalprijsvak">Totaalprijs</label>
    <input type="text" id="totaalprijsvak" name="totaalprijsvak"><br/>
    <input type="submit">
</form>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>create kamer 1</title>
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
<h1>Create kamer 1</h1>
<form action="createKamer2.php" method="post">
    <label for="kamernummervak">kamernummer</label>
    <input type="text" id="kamernummervak" name="kamernummervak"><br/>
    <label for="kameraantalbeddenvak">Aantal bedden kamer</label>
    <input type="text" id="kameraantalbeddenvak" name="kameraantalbeddenvak"><br/>
    <label for="kamerprijsvak">Kamerprijs</label>
    <input type="text" id="kamerprijsvak" name="kamerprijsvak"><br/>
    <input type="submit">
</form>
</body>
</html>

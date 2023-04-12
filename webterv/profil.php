<?php
session_start();
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profil</title>
    <link rel="icon" href="IMG/dumbell.png" />
    <link rel="stylesheet" href="CSS/main.css" />
    <link rel="stylesheet" href="CSS/login.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap"
        rel="stylesheet"
    />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css"
    />
</head>
<body>
<header>
    <nav>
        <div class="nav-links" id="navLinks">
            <i class="fa-solid fa-rectangle-xmark" onclick="hideMenu()"></i>
            <ul>
                <li><a href="edzeseink.php">EDZÉSEINK</a></li>
                <li><a href="edzestipusok.php">EDZÉS TíPUSOK</a></li>
                <li><a href="edzoink.php">EDZŐINK</a></li>
                <li><a href="elerhetoseg.php">ELÉRHETŐSÉG</a></li>
                <li><a href="araink.php">ÁRAINK</a></li>
                <?php if (isset($_SESSION["user"])) { ?>
                    <li><a href="profil.php">PROFIL</a></li>
                    <li><a href="kijelentkezes.php">KIJELENTKEZÉS</a></li>
                <?php } else { ?>
                    <li><a href="login.php">BEJELENTKEZÉS</a></li>
                <?php } ?>
            </ul>
        </div>
        <i class="fa-solid fa-bars" onclick="showMenu()"></i>
    </nav>
</header>
<main>
    <div class="page animation">
        <?php
        // profiladatok kilistázása
        echo "<ul>";
        echo "<li>Felhasználónév: " . $_SESSION["user"]["felhasznalonev"] . "</li>";
        echo "<li>Életkor: " . $_SESSION["user"]["eletkor"] . "</li>";
        echo "<li>Nem: " . $_SESSION["user"]["nem"] . "</li>";
        echo "<li>Hobbik: " . implode(", ", $_SESSION["user"]["hobbik"]) . "</li>";
        echo "</ul>";
        ?>
    </div>
</main>
</body>
</html>
<?php
include "kozos.php";              // beágyazzuk a loadUsers() és saveUsers() függvényeket tartalmazó PHP fájlt
$fiokok = loadUsers("users.txt"); // betöltjük a regisztrált felhasználók adatait, és eltároljuk őket a $fiokok változóban

$hibak = [];

if (isset($_POST["regiszt"])) {
    if (!isset($_POST["felhasznalonev"]) || trim($_POST["felhasznalonev"]) === "")
        $hibak[] = "A felhasználónév megadása kötelező!";

    if (!isset($_POST["jelszo"]) || trim($_POST["jelszo"]) === "" || !isset($_POST["jelszo2"]) || trim($_POST["jelszo2"]) === "")
        $hibak[] = "A jelszó és az ellenőrző jelszó megadása kötelező!";

    if (!isset($_POST["eletkor"]) || trim($_POST["eletkor"]) === "")
        $hibak[] = "Az életkor megadása kötelező!";

    if (!isset($_POST["nem"]) || trim($_POST["nem"]) === "")
        $hibak[] = "A nem megadása kötelező!";

    if (!isset($_POST["hobbik"]) || count($_POST["hobbik"]) < 2)
        $hibak[] = "Legalább 2 hobbit kötelező kiválasztani!";

    $felhasznalonev = $_POST["felhasznalonev"];
    $jelszo = $_POST["jelszo"];
    $jelszo2 = $_POST["jelszo2"];
    $eletkor = $_POST["eletkor"];
    $nem = NULL;
    $hobbik = NULL;

    if (isset($_POST["nem"]))
        $nem = $_POST["nem"];
    if (isset($_POST["hobbik"]))
        $hobbik = $_POST["hobbik"];

    foreach ($fiokok as $fiok) {
        if ($fiok["felhasznalonev"] === $felhasznalonev)
            $hibak[] = "A felhasználónév már foglalt!";
    }

    if (strlen($jelszo) < 5)
        $hibak[] = "A jelszónak legalább 5 karakter hosszúnak kell lennie!";

    if ($jelszo !== $jelszo2)
        $hibak[] = "A jelszó és az ellenőrző jelszó nem egyezik!";

    if ($eletkor < 18)
        $hibak[] = "Csak 18 éves kortól lehet regisztrálni!";

    if (count($hibak) === 0) {   // sikeres regisztráció
        $jelszo = password_hash($jelszo, PASSWORD_DEFAULT);       // jelszó hashelése
        // hozzáfűzzük az újonnan regisztrált felhasználó adatait a rendszer által ismert felhasználókat tároló tömbhöz
        $fiokok[] = ["felhasznalonev" => $felhasznalonev, "jelszo" => $jelszo, "eletkor" => $eletkor, "nem" => $nem, "hobbik" => $hobbik];
        // elmentjük a kibővített $fiokok tömböt a users.txt fájlba
        saveUsers("users.txt", $fiokok);
        $siker = TRUE;
    } else {                    // sikertelen regisztráció
        $siker = FALSE;
    }
}
?>






<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Regisztráció</title>
    <link rel="icon" href="IMG/dumbell.png" />
    <link rel="stylesheet" href="CSS/main.css" />
    <link rel="stylesheet" href="CSS/edzesek.css" />
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
                <li><a href="bejelentkezes.php">BEJELENTKEZÉS</a></li>
            </ul>
        </div>
        <i class="fa-solid fa-bars" onclick="showMenu()"></i>
    </nav>
</header>
<main class="signup">
    <div class="signup">
        <form action="bejelentkezes.php" method="POST">
            <h2>Regisztráció:</h2>
            <div class="inputBox">
                <input type="text" name="felhasznalonev"/>
                <span>Felhasználónév</span>
            </div>
            <div class="inputBox">
                <input type="password" name="jelszo"/>
                <span>Jelszó</span>
            </div>
            <div class="inputBox">
                <input type="password" name="jelszo2"/>
                <span>Jelszó ismét</span>
            </div>
            <div class="inputBox">
                <input type="number" name="eletkor">
                <span>Életkor</span>
            </div>
            <div class="inputBox">
                <input type="radio" name="nem" value="F"/> Férfi
                <input type="radio" name="nem" value="N"/> Nő
                <input type="radio" name="nem" value="E"/> Egyéb
                <span>Nem</span>
            </div>
            <div class="inputBox">
                <input type="submit" name="regiszt" value="Regisztráció"/>
            </div>
        </form>
    </div>
</main>
</body>
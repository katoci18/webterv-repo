<?php
$uzenet = "";
$latogatasok = 1;                         // hányszor látogattuk meg a weboldalt eddig

// ha már van egy, az eddigi látogatások számát tároló sütink, akkor betöltjük annak az értékét
if (isset($_COOKIE["visits"])) {
    $latogatasok = $_COOKIE["visits"] + 1;  // az eddigi látogatások számát megnöveljük 1-gyel
}

// egy "visits" nevű süti a látogatásszám tárolására, amelynek élettartama 30 nap
setcookie("visits", $latogatasok, time() + (60*60*24*30), "/");
?>

<?php
session_start();
?>

<?php
if (isset($_FILES["profile-pic"])) {
    // csak JPG, JPEG és PNG kiterjesztésű képeket szeretnénk engedélyezni a feltöltéskor
    $engedelyezett_kiterjesztesek = ["jpg", "jpeg", "png"];

    // a feltöltött fájl kiterjesztésének lekérdezése
    $kiterjesztes = strtolower(pathinfo($_FILES["profile-pic"]["name"], PATHINFO_EXTENSION));

    // ha a fájl kiterjesztése szerepel az engedélyezett kiterjesztések között...
    if (in_array($kiterjesztes, $engedelyezett_kiterjesztesek)) {
        // ha a fájl feltöltése sikeresen megtörtént...
        if ($_FILES["profile-pic"]["error"] === 0) {
            // ha a fájlméret nem nagyobb 30 MB-nál...
            if ($_FILES["profile-pic"]["size"] <= 31457280) {
                // a cél útvonal összeállítása
                $cel = "IMG/" . $_FILES["profile-pic"]["name"];

                // ha már létezik ilyen nevű fájl a cél útvonalon, figyelmeztetést írunk ki
                if (file_exists($cel)) {
                    $uzenet = "<strong>Figyelem:</strong> A régebbi fájl felülírásra kerül! <br/>";
                }

                // a fájl átmozgatása a cél útvonalra
                if (move_uploaded_file($_FILES["profile-pic"]["tmp_name"], $cel)) {
                    $uzenet = "Sikeres fájlfeltöltés! <br/>";
                } else {
                    $uzenet = "<strong>Hiba:</strong> A fájl átmozgatása nem sikerült! <br/>";
                }
            } else {
                $uzenet = "<strong>Hiba:</strong> A fájl mérete túl nagy! <br/>";
            }
        } else {
            $uzenet = "<strong>Hiba:</strong> A fájlfeltöltés nem sikerült! <br/>";
        }
    } else {
        $uzenet = "<strong>Hiba:</strong> A fájl kiterjesztése nem megfelelő! <br/>";
    }
}
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
        <div style="margin-top: 20%;margin-left: 20px;color: whitesmoke;">
        <?php
        // profiladatok kilistázása
        echo "<ul style='list-style: none;'>";
        echo "<li style='font-size: 40px'>FELHASZNÁLÓ ADATAI:</li>";
        echo "<li style='font-size: 20px'>Név: " . $_SESSION["user"]["felhasznalonev"] . "</li>";
        echo "<li>Életkor: " . $_SESSION["user"]["eletkor"] . "</li>";
        echo "<li>Nem: " . $_SESSION["user"]["nem"] . "</li>";
        echo "<li>Hobbik: " . implode(", ", $_SESSION["user"]["hobbik"]) . "</li>";
        if ($latogatasok > 1) {     // ha már korábban járt a felhasználó a weboldalunkon...
            echo "Ez a(z) $latogatasok. alkalmad itt, örülünk, hogy újra látunk!";
        } else {                    // ha első alkalommal látogatja meg a weboldalunkat...
            echo "Ez az 1. alkalmad itt!";
        }
        echo "</ul>";
        ?>
        </div>
        <div style="margin-left: 60%; margin-top: -10%">
            <form method="POST" enctype="multipart/form-data">
                <label for="file-upload" style="color: whitesmoke">PROFILKÉP:</label>
                <!-- Csak képfájlokat szeretnénk engedélyezni a feltöltés során -->
                <input style="color: whitesmoke" type="file" id="file-upload" name="profile-pic" accept="image/*"/> <br/>
                <input type="submit" name="upload-btn" value="Feltöltés"/>
                <div style="color: red">
                    <?php echo $uzenet . "<br/>"; ?>
                </div>
            </form>
        </div>
    </div>
    <footer>
        <div class="footer">
            <div style="margin-top: 170px" class="bottom-text">
                <a class="active" href="index.php">HOME</a>
            </div>
        </div>
    </footer>
</main>
</body>
</html>
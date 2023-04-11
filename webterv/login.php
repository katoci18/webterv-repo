<?php
  include "kozos.php";              // a loadUsers() függvény ebben a fájlban van
  $fiokok = loadUsers("users.txt"); // betöltjük a regisztrált felhasználók adatait, és eltároljuk őket a $fiokok változóban

  $uzenet = "";                     // az űrlap feldolgozása után kiírandó üzenet

  if (isset($_POST["login"])) {    // miután az űrlapot elküldték...
    if (!isset($_POST["felhasznalonev"]) || trim($_POST["felhasznalonev"]) === "" || !isset($_POST["jelszo"]) || trim($_POST["jelszo"]) === "") {
      // ha a kötelezően kitöltendő űrlapmezők valamelyike üres, akkor hibaüzenetet jelenítünk meg
      $uzenet = "<strong>Hiba:</strong> Adj meg minden adatot!";
    } else {
      // ha megfelelően kitöltötték az űrlapot, lementjük az űrlapadatokat egy-egy változóba
      $felhasznalonev = $_POST["felhasznalonev"];
      $jelszo = $_POST["jelszo"];

      // bejelentkezés sikerességének ellenőrzése
      $uzenet = "Sikertelen belépés! A belépési adatok nem megfelelők!";  // alapból azt feltételezzük, hogy a bejelentkezés sikertelen

      foreach ($fiokok as $fiok) {              // végigmegyünk a regisztrált felhasználókon
        // a bejelentkezés pontosan akkor sikeres, ha az űrlapon megadott felhasználónév-jelszó páros megegyezik egy regisztrált felhasználó belépési adataival
        // a jelszavakat hash alapján, a password_verify() függvénnyel hasonlítjuk össze
        if ($fiok["felhasznalonev"] === $felhasznalonev && password_verify($jelszo, $fiok["jelszo"])) {
          $uzenet = "Sikeres belépés!";        // ekkor átírjuk a megjelenítendő üzenet szövegét
          break;                               // mivel találtunk illeszkedést, ezért a többi felhasználót nem kell megvizsgálnunk, kilépünk a ciklusból 
        }
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="icon" href="IMG/dumbell.png" />
    <link rel="stylesheet" href="CSS/main.css" />
    <link rel="stylesheet" href="CSS/index.css" />
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
                <li><a href="login.php">BEJELENTKEZÉS</a></li>

            </ul>
        </div>
        <i class="fa-solid fa-bars" onclick="showMenu()"></i>
    </nav>
</header>
<main>
    <section>
        <div class="login">
        <form action="login.php" method="POST">
            <h2>Bejelentkezés</h2>
          <label>Felhasználónév: <input type="text" name="felhasznalonev"/></label> <br/>
          <label>Jelszó: <input type="password" name="jelszo"/></label> <br/>
          <input type="submit" name="login"/> <br/><br/>
        </form>
        </div>
<div class="iranyito">
    <a href="signup.php" class="hero-btn">Még nem regisztráltál?</a>
</div>
        <div class="message">
        <?php echo $uzenet . "<br/>"; ?>
        </div>
      </section>
    </main>
  </body>
</html>
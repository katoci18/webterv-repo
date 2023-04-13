<?php
  include "kozos.php";              // beágyazzuk a loadUsers() és saveUsers() függvényeket tartalmazó PHP fájlt
  $fiokok = loadUsers("users.txt"); // betöltjük a regisztrált felhasználók adatait, és eltároljuk őket a $fiokok változóban

  // az űrlapfeldolgozás során keletkező hibákat ebbe a tömbbe fogjuk gyűjteni
  $hibak = [];

  // űrlapfeldolgozás

  if (isset($_POST["regiszt"])) {   // ha az űrlapot elküldték...
    // a kötelezően kitöltendő mezők ellenőrzése
    if (!isset($_POST["felhasznalonev"]) || trim($_POST["felhasznalonev"]) === "")
      $hibak[] = "A felhasználónév megadása kötelező!";

    if (!isset($_POST["jelszo"]) || trim($_POST["jelszo"]) === "" || !isset($_POST["jelszo2"]) || trim($_POST["jelszo2"]) === "")
      $hibak[] = "A jelszó és az ellenőrző jelszó megadása kötelező!";

    if (!isset($_POST["eletkor"]) || trim($_POST["eletkor"]) === "")
      $hibak[] = "Az életkor megadása kötelező!";

    if (!isset($_POST["nem"]) || trim($_POST["nem"]) === "")
      $hibak[] = "A nem megadása kötelező!";

    // legalább 2 hobbit kötelező kiválasztani
    if (!isset($_POST["hobbik"]) || count($_POST["hobbik"]) < 2)
      $hibak[] = "Legalább 2 hobbit kötelező kiválasztani!";

    // űrlapadatok lementése változókba
    $felhasznalonev = $_POST["felhasznalonev"];
    $jelszo = $_POST["jelszo"];
    $jelszo2 = $_POST["jelszo2"];
    $eletkor = $_POST["eletkor"];
    $nem = NULL;
    $hobbik = NULL;

    if (isset($_POST["nem"]))           // csak akkor kérjük le a nemet, ha megadták
      $nem = $_POST["nem"];
    if (isset($_POST["hobbik"]))        // csak akkor kérjük le a hobbikat, ha megadták
      $hobbik = $_POST["hobbik"];       // (ez egy tömb lesz)

    // foglalt felhasználónév ellenőrzése
    foreach ($fiokok as $fiok) {
      if ($fiok["felhasznalonev"] === $felhasznalonev)  // ha egy regisztrált felhasználó neve megegyezik az űrlapon megadott névvel...
        $hibak[] = "A felhasználónév már foglalt!";
    }

    // túl rövid jelszó
    if (strlen($jelszo) < 5)
      $hibak[] = "A jelszónak legalább 5 karakter hosszúnak kell lennie!";

    // a két jelszó nem egyezik
    if ($jelszo !== $jelszo2)
      $hibak[] = "A jelszó és az ellenőrző jelszó nem egyezik!";

    // 10 év alatti életkor
    if ($eletkor < 10)
      $hibak[] = "Csak 10 éves kortól lehet regisztrálni!";

    // regisztráció sikerességének ellenőrzése
    if (count($hibak) === 0) {   // sikeres regisztráció (nem volt egyetlen hiba sem)
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
    <title>Home</title>
    <link rel="icon" href="IMG/dumbell.png" />
    <link rel="stylesheet" href="CSS/main.css" />
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
    <div class="page animation">
        <section>
            <div style="display: flex; justify-content: center; margin-top: 20%; color: whitesmoke">
                <h2>Regisztráció:</h2>
                <form action="signup.php" method="POST"><br/><br/>
                    <label><input type="text" name="felhasznalonev" value="<?php if (isset($_POST['felhasznalonev'])) echo $_POST['felhasznalonev']; ?>"/><strong>  Felhasználónév</strong></label> <br/>
                    <label><input type="password" name="jelszo"/><strong>  Jelszó</strong></label> <br/>
                    <label><input type="password" name="jelszo2"/><strong>  Jelszó ismét</strong></label> <br/>
                    <label><input type="number" name="eletkor" value="<?php if (isset($_POST['eletkor'])) echo $_POST['eletkor']; ?>"/> <strong> Életkor</strong></label> <br/>
                    <strong> Nem:</strong> <br/>
                    <label><input type="radio" name="nem" value="F" <?php if (isset($_POST['nem']) && $_POST['nem'] === 'F') echo 'checked'; ?>/> Férfi</label>
                    <label><input type="radio" name="nem" value="N" <?php if (isset($_POST['nem']) && $_POST['nem'] === 'N') echo 'checked'; ?>/> Nő</label>
                    <label><input type="radio" name="nem" value="E" <?php if (isset($_POST['nem']) && $_POST['nem'] === 'E') echo 'checked'; ?>/> Egyéb</label> <br/>
                    <strong> Hobbik:</strong> <br/>
                    <label><input type="checkbox" name="hobbik[]" value="Futás" <?php if (isset($_POST['hobbik']) && in_array('Futás', $_POST['hobbik'])) echo 'checked'; ?>/> Futás</label>
                    <label><input type="checkbox" name="hobbik[]" value="Biciklizés" <?php if (isset($_POST['hobbik']) && in_array('Biciklizés', $_POST['hobbik'])) echo 'checked'; ?>/> Biciklizés</label>
                    <label><input type="checkbox" name="hobbik[]" value="Konditermi edzés" <?php if (isset($_POST['hobbik']) && in_array('Konditermi edzés', $_POST['hobbik'])) echo 'checked'; ?>/> Konditermi edzés</label>
                    <label><input type="checkbox" name="hobbik[]" value="Otthoni edzés" <?php if (isset($_POST['hobbik']) && in_array('Otthoni edzés', $_POST['hobbik'])) echo 'checked'; ?>/> Otthoni edzés</label>
                    <br/>
                    <input type="submit" name="regiszt" value="Regisztráció"/> <br/><br/>
                </form>
                <div class="message">
                    <?php
                    if (isset($siker) && $siker === TRUE) {  // ha nem volt hiba, akkor a regisztráció sikeres
                        echo "<p>Sikeres regisztráció!</p>";
                    } else {                                // az esetleges hibákat kiírjuk egy-egy bekezdésben
                        foreach ($hibak as $hiba) {
                            echo "<p>" . $hiba . "</p>";
                        }
                    }
                    ?>
                </div>
            </div>
        </section>
    </div>
</main>
</body>
</html>
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="hu">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edzés típusok</title>
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
    <div class="page animation">
      <div class="content">
        <section class="row">
          <div class="types">
            <div class="types-col">
              <h3>Cross</h3>
              <p>
                Tartalmazza az olimpiai súlyemelést a kettlebellt, a saját
                testsúlyos feladatokat és ezeket ötvöző technikai és erősítő
                elemeket. Amelyek egyaránt fejlesztik a kondícionális és
                koordinációs képességeket.
              </p>
              <h5>Időtartam: 60 perc</h5>
            </div>
            <div class="types-col">
              <h3>Basic</h3>
              <p>
                Ha előnyben részesíted a saját testsúlyos, illetve kettlebell-es
                gyakorlatokat és szeretnél súlyt emelni, de nem szeretnél
                hatalmas kilókkal dolgozni egy pörgős, lendületes órán vennél
                részt ahol főleg az állóképességedet, kitartásodat szeretnéd
                növelni, javítani és egy remek társaság tagja lenni.
              </p>
              <h5>Időtartam: 90 perc</h5>
            </div>
            <div class="types-col">
              <h3>Kezdő</h3>
              <p>
                Szeretnél jobb formába kerülni, de eddig nem merted egyedül
                elkezdeni? Nem találtad eddig a megfelelő motivációt? Esetleg
                kipróbáltál mindent de eddig semmi nem vált be? Csoportos edzés
                keretében edzők segítségével nálunk garantáltan megtalálod a
                motivációd és elérheted a kitűzött céljaid!
              </p>
              <h5>Időtartam: 45 perc</h5>
            </div>
          </div>
        </section>
      </div>
    </div>



  <footer>
    <div class="footer">
      <div class="bottom-text">
        <a class="active" href="index.php">HOME</a>
      </div>
    </div>
  </footer>

    <script>
      var navLinks = document.getElementById("navLinks");
      function showMenu() {
        navLinks.style.right = "0";
      }
      function hideMenu() {
        navLinks.style.right = "-200px";
      }
    </script>
  </body>
</html>

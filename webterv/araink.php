<?php
session_start();
?>

<!DOCTYPE html>
<html lang="hu">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Áraink</title>
    <link rel="icon" href="IMG/dumbell.png" />
    <link rel="stylesheet" href="CSS/main.css" />
    <link rel="stylesheet" href="CSS/ar.css" />
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
          <div class="price">
            <h1>ÁRAINK</h1>
            <p>
              Csoportosan, egyedül vagy személyi edző segítségével edzenél?
              Bérleteink közt mindegyikre találsz megoldást!
            </p>
            <div class="price-col">
              <div class="price-item">
                <h3>NAPI</h3>
                <h1 class="ar">1500 ft</h1>
              </div>
              <div class="price-item">
                <h3>HAVI DIÁK</h3>
                <h1 class="ar">14000 ft</h1>
              </div>
            </div>
            <div class="price-col">
              <div class="price-item">
                <h3>10 ALKALMAS</h3>
                <h1 class="ar">12000 ft</h1>
              </div>
              <div class="price-item">
                <h3>HAVI FELNŐTT</h3>
                <h1 class="ar">18000 ft</h1>
              </div>
            </div>
            <div class="price-col">
              <div class="price-item">
                <h3>HÉTVÉGI</h3>
                <h1 class="ar">12000 ft</h1>
              </div>
              <div class="price-item">
                <h3>ÉVES</h3>
                <h1 class="ar">180000 ft</h1>
              </div>
            </div>
          </div>
        </section>

        <footer>
          <div class="footer">
            <div class="bottom-text">
              <a class="active" href="index.php">HOME</a>
            </div>
          </div>
        </footer>
      </div>
    </div>


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

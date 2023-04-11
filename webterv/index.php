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
    <div class="page animation">
      <div class="content">
        <div class="text-box">
          <h1>Cross és Funkcionális edzések</h1>
          <p>
            Ha egy igazán jót szeretnél edzeni, <br />
            <strong>ne habozz tovább,</strong> <br />
            rád is vár Szeged egyik legkedveltebb helye!
          </p>
          <a href="elerhetoseg.php" class="hero-btn">Jelentkezz óráinkra itt</a>
        </div>
      </div>
    </div>

    <footer>
      <div class="footer">
        <div class="bottom-text">
          <a href="index.html">HOME</a>
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
      function getbutton() {
        window.location("elerhetoseg.html");
      }
    </script>
  </body>
</html>
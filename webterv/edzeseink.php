<?php
session_start();
?>

<!DOCTYPE html>
<html lang="hu">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edzéseink</title>
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
        <h1 id="orarend">ÓRARENDÜNK</h1>
        <table class="myTimetable">
          <thead>
            <tr>
              <th></th>
              <th>HÉTFŐ</th>
              <th>KEDD</th>
              <th>SZERDA</th>
              <th>CSÜTÖRTÖK</th>
              <th>PÉNTEK</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>HERCEG ARNOLD</td>
              <td>
                <div class="subject">Crossfit</div>
                <div class="room">12:00</div>
              </td>
              <td>
                <div class="subject">Basic</div>
                <div class="room">13:00</div>
              </td>
              <td>
                <div class="subject">Kezdő</div>
                <div class="room">14:00</div>
              </td>
              <td>
                <div class="subject">Crossfit</div>
                <div class="room">15:00</div>
              </td>
              <td>
                <div class="subject">Basic</div>
                <div class="room">16:00</div>
              </td>
            </tr>
            <tr>
              <td>PUSKÁS ROLAND</td>
              <td>
                <div class="subject">Kezdő</div>
                <div class="room">13:30</div>
              </td>
              <td>
                <div class="subject">TRX</div>
                <div class="room">14:30</div>
              </td>
              <td>
                <div class="subject">Basic</div>
                <div class="room">16:30</div>
              </td>
              <td>
                <div class="subject">Haladó Crossfit</div>
                <div class="room">18:30</div>
              </td>
              <td>
                <div class="subject">Kezdő</div>
                <div class="room">19:30</div>
              </td>
            </tr>
            <tr>
              <td>SZŐKE ESZTER</td>
              <td>
                <div class="subject">Haladó Basic</div>
                <div class="room">18:00</div>
              </td>
              <td>
                <div class="subject">Haladó Crossfit</div>
                <div class="room">19:00</div>
              </td>
              <td>
                <div class="subject">Kezdő Crossfit</div>
                <div class="room">20:00</div>
              </td>
              <td>
                <div class="subject">Nyújtás</div>
                <div class="room">21:00</div>
              </td>
              <td>
                <div class="subject">Kezdő</div>
                <div class="room">22:00</div>
              </td>
            </tr>
            <tr>
              <td>JAKI SZABINA</td>
              <td>
                <div class="subject">Kezdő</div>
                <div class="room">6:00</div>
              </td>
              <td>
                <div class="subject">Haladó</div>
                <div class="room">7:00</div>
              </td>
              <td>
                <div class="subject">Nyújtás</div>
                <div class="room">8:00</div>
              </td>
              <td>
                <div class="subject">Basic</div>
                <div class="room">9:00</div>
              </td>
              <td>
                <div class="subject">Crossfit</div>
                <div class="room">11:00</div>
              </td>
            </tr>
          </tbody>
        </table>
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

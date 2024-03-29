<?php
session_start();
?>

<!DOCTYPE html>
<html lang="hu">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Elérhetőség</title>
    <link rel="icon" href="IMG/dumbell.png" />
    <link rel="stylesheet" href="CSS/styles.css" />
    <link rel="stylesheet" href="CSS/main.css" />
    <link rel="stylesheet" href="CSS/eler.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
      integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
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
        <!-- contact section-->
        <section class="contact">
          <div class="container">
            <div class="contactInfo">
              <div class="box">
                <div class="icon">
                  <i class="fa fa-map" aria-hidden="true"></i>
                </div>
                <div class="text">
                  <p>
                    6745 Kálmánia sugárút 456, <br />Magyarország, Szeged
                    <br />5454656
                  </p>
                </div>
              </div>
              <div class="box">
                <div class="icon">
                  <i class="fa fa-phone-square" aria-hidden="true"></i>
                </div>
                <div class="text">
                  <p>Mobil: +36 30 598 662 <br />Telefon: 62 569 897</p>
                </div>
              </div>
              <div class="box">
                <div class="icon">
                  <i class="fa fa-envelope" aria-hidden="true"></i>
                </div>
                <div class="text">
                  <p>barmi@gmail.com</p>
                </div>
              </div>
            </div>
            <div class="contactForm">
              <form>
                <h2>Üzenj nekünk!</h2>
                <div class="inputBox">
                  <input type="text" />
                  <span>Teljes neved</span>
                </div>
                <div class="inputBox">
                  <input type="text" required="required" />
                  <span>Email</span>
                </div>
                <div class="inputBox">
                  <textarea required="required"></textarea>
                  <span>Ide írhatsz plusz infókat vagy kérdéseket</span>
                </div>
                <div class="inputBox">
                  <textarea required="required"></textarea>
                  <span>Most sportolsz valamit?</span>
                </div>
                <div class="inputBox">
                  <input type="submit" value="Send" />
                  <input type="reset" value="Reset" />
                </div>
              </form>
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

<?php session_start(); ?>
<!DOCTYPE html>
<!-- Coding by CodingNepal || www.codingnepalweb.com -->
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Task manaager</title>
    <link rel="stylesheet" href="ressources/css/fast-coding.css" />
    <script src="../custom-scripts.js" defer></script>
  </head>
  <body>
    <main>


      <!-- Header Start -->
      <header>
        <nav class="nav container">
          <h2 class="nav_logo"><a href="#">MIGIWARA Task Manager</a></h2>

          <ul class="menu_items">
            <img src="ressources/images/times.svg" alt="timesicon" id="menu_toggle" />
            <li><a href="index.php" class="nav_link">Home</a></li>
            <li><a href="login.php" class="nav_link">Connexion</a></li>
            <!-- <li><a href="#" class="nav_link">Service</a></li>
            <li><a href="#" class="nav_link">Project</a></li> -->
            <li><a href="#" class="nav_link">Contact</a></li>
          </ul>
          <img src="ressources/images/bars.svg" alt="timesicon" id="menu_toggle" />
        </nav>
      </header>
      <!-- Header End -->

      <!-- Hero Start -->
      <section class="hero">
        <div class="row container">
          <div class="column">
            <h2>Top  # 1 des outils <br />de gestion de tâche</h2>
            <p>Optiiser la gestion de vos tâches, décupler votre productivité sans fournir plus d'effort. </p>
            <div class="buttons">
              <button class="btn">Read More</button>
              <a href="http://">
              <a href="singup.php"> <button class="btn"> Essayer Maintenant </button></a>
              </a>
              
            </div>
          </div>
          <div class="column">
            <img src="ressources/images/task.png" alt="heroImg" class="hero_img" />
          </div>
        </div>
        <img src="ressources/images/bg-bottom-hero.png" alt="" class="curveImg" />
      </section>
      <!-- Hero End-->
    </main>

    <script>
      const header = document.querySelector("header");
      const menuToggler = document.querySelectorAll("#menu_toggle");

      menuToggler.forEach(toggler => {
        toggler.addEventListener("click", () => header.classList.toggle("showMenu"));
      });
    </script>
  </body>
</html>
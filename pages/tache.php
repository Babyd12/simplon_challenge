<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Animated Image Gallery | CodingLab </title>
    <link rel="stylesheet" href="ressources/css/tache.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
   </head>
<body>
  <div class="container">
    <input type="radio" name="s" id="home" checked>
    <input type="radio" name="s" id="blog">
    <input type="radio" name="s" id="code">
    <input type="radio" name="s" id="help">
    <input type="radio" name="s" id="about">
    <nav>
      <div class="slider"></div>
      <label class="home" for="home">
      <i class="fas fa-home"></i>Home
      </label>
      <label class="blog" for="blog">
        <i class="fas fa-tasks"></i> Tâches
      </label>
      <!-- <label class="code" for="code">
        <i class="fas fa-code"></i>Code
      </label> -->
      <label class="help" for="help">
        <i class="fas fa-envelope"></i>Message
      </label>
      <label class="about" for="about">
        <i class="fas fa-user"></i>About
      </label>
    </nav>

  </div>

  <div class="tasks">

    <div class="task-header">
      <section class="sec1">
        <h1>Ttire de la tache</h1>
        <p>Nom User </p>
      </section>
    </div>

    <div class="task-content">
      <div class="head-task-content">
        <h2>Nom de la tache</h2>
        <p>Description de la tache</p>
      </div>
      <div class="middel-task-content">
        <p>Durée début: date</p> <p>Dadte fin :date</p>
      </div>
      <div class="end-task-content">
        <p>priorité : Haute</p> <p>Statut : Encours</p>
        <input type="submit" value="Voir les détails">
      </div>
    </div>

    <div class="task-content">
      <div class="head-task-content">
        <h2>Nom de la tache</h2>
        <p>Description de la tache</p>
      </div>
      <div class="middel-task-content">
        <p>Durée de la tache</p>
      </div>
      <div class="end-task-content">
        <p>priorité : Haute</p> <p>Statut : Encours</p>
        <input type="submit" value="Voir les détails">
      </div>
    </div>


    
    <form action="" method="get">
      <div class="add-task">
        <h2>Ajouter une nouvelle tâche</h2>
          <div class="row1">
            <label class="label">Titre</label>
            <input type="text" name="name" id="">
          </div>

       
          <select name="priorite">
            <option selected value="0">priorite</option>
            <option value="1">No Wrapper</option>
            <option value="2">No JS</option>
            <option value="3">Nice!</option>
          </select>

          <select name="statu">
            <option selected value="0">Statut</option>
            <option value="1">A faire</option>
            <option value="2">En cours</option>
            <option value="3">Terminé</option>
          </select>

          <div class="row1">
            <label class="label">Date début de la tâche</label>
            <input type="date" name="name" id="">
          </div>
          <div class="row1">
            <label class="label">Date Fin de la tâche</label>
            <input type="date" name="name" id="">
          </div>

          <div class="row1">
            <label class="label">Description</label>
            <textarea name="" id="" class="textarea"></textarea>
          </div>

          <input type="submit" value="Enregistrer" name="send">
      </div>
    </form>

  </div>


  
  
</body>
</html>
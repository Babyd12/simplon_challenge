<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tableau de Bord</title>
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="../../../Public/css/dashbord.css">
</head>
<body>
    <header>
        <h1>Tableau de Bord</h1>
        <div class="user-info">
            <p><?= $_SESSION['nomUserActif'] ?></p>
            <a href="../../Route/Route.php?page=logout" class="logout-button">Déconnexion</a>
        </div>
    </header>
    <div class="container">
        <div class="left-panel">
            <h2>Ajouter un Contact</h2>
            <form>
                <label for="name">Nom :</label>
                <input type="text" id="name" name="name">
                <label for="number">Numéro :</label>
                <input type="text" id="number" name="number">
                <button type="submit" class="add-button">Enregistrer</button>
            </form>
        </div>
        <div class="right-panel">
            <div class="search-bar">
                <input type="text" placeholder="Rechercher un contact">
                <button class="search-icon">🔍</button>
            </div>
            <h2>Liste des Contacts</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Numéro</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>John Doe</td>
                        <td>555-1234</td>
                        <td>
                            <button class="delete-button">Supprimer</button>
                            <button class="favorite-button">Ajouter en Favori</button>
                            <button class="view-button">Voir Plus</button>
                        </td>
                    </tr>
                    <!-- Ajouter d'autres contacts ici -->
                </tbody>
            </table>
        </div>
    </div>
    <div class="favorite-contacts">
        <h2>Contacts Favoris</h2>
        <ul>
            <li>John Doe - 555-1234 <button class="remove-favorite-button">Enlever des Favoris</button></li>
            <!-- Ajouter d'autres contacts favoris ici -->
        </ul>
    
    </div>
</body>
</html>

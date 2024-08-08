<?php
// Start the session if it hasn't been started already
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Use the UserController class from the Controllers namespace
use Controllers\UserController;

// Include the UserController.php file
require_once __DIR__ . '/../CONTROLLERS/UserController.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROJET MVC</title>
    <!-- Link to the CSS stylesheet -->
    <link rel="stylesheet" href="CSS/style.css">
    <!-- Link to the main JavaScript file, defer to load it after HTML parsing -->
    <script src="js/main.js" defer></script>
</head>

<body>
    <header>
        <nav>
            <!-- Website icon -->
            <img src="IMG/icone.png" alt="icon" class="icone">
            <!-- Hamburger menu toggle for mobile view -->
            <div class="menu-toggle" id="hamburger">
                MENU
            </div>
            <!-- Navigation menu container -->
            <div class="menu-container">
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <?php if (isset($_SESSION['user'])): ?>
                        <li><a href="create_post.php">Créer un Post</a></li>
                        <!-- Display admin and user-specific links if the user is logged in -->
                        <?php if ($_SESSION['user']['is_admin']): ?>
                            <li><a href="dashboard_admin.php">Espace Admin</a></li>
                            <li><a href="dashboard.php">Mon espace</a></li>
                        <?php else: ?>
                            <li><a href="dashboard.php">Mon espace</a></li>
                        <?php endif; ?>
                        <li><a href="logout.php">Déconnexion</a></li>
                    <?php else: ?>
                        <!-- Display registration and login links if the user is not logged in -->
                        <li><a href="register.php">Inscription</a></li>
                        <li><a href="login.php">Connexion</a></li>
                    <?php endif; ?>
                </ul>
                <!-- Search form for posts -->
                <form class="search-form" method="GET" action="search.php">
                    <input type="text" name="query" placeholder="Rechercher un post" required>
                    <button type="submit">Rechercher</button>
                </form>
            </div>
        </nav>
    </header>
    <div class="container">

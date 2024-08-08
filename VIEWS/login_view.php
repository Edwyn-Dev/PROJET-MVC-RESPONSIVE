<?php
// Include the header file
require_once __DIR__ . '/../INCLUDE/header.php';
?>

<!-- Login form -->
<form method="POST" action="login.php" class="formulaire">
    <!-- Form title -->
    <label>
        <h2>CONNEXION</h2>
    </label>

    <!-- Username input field -->
    <label for="username">Nom :</label>
    <input type="text" id="username" name="username" required>

    <!-- Password input field -->
    <label for="password">MDP :</label>
    <input type="password" id="password" name="password" required>

    <!-- Submit button -->
    <button type="submit">Se connecter</button>
</form>

<?php
// Include the footer file
require_once __DIR__ . '/../INCLUDE/footer.php';
?>

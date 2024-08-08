<?php
// Include the header file
require_once __DIR__ . '/../INCLUDE/header.php';
?>

<!-- Registration form -->
<form method="POST" action="register.php" class="formulaire">
    <!-- Form title -->
    <label>
        <h2>INSCRIPTION</h2>
    </label>

    <!-- Username input field -->
    <label for="username">Nom :</label>
    <input type="text" id="username" name="username" required>

    <!-- Password input field -->
    <label for="password">MDP :</label>
    <input type="password" id="password" name="password" required>

    <!-- Email input field -->
    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required>

    <!-- Submit button -->
    <button type="submit">S'inscrire</button>
</form>

<?php
// Include the footer file
require_once __DIR__ . '/../INCLUDE/footer.php';
?>

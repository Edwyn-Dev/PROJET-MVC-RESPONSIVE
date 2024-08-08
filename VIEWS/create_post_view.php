<?php
// Include the header file
require_once __DIR__ . '/../INCLUDE/header.php';
?>

<!-- Form for creating a new post -->
<form method="POST" action="create_post.php" class="formulaire">
    <!-- Form title -->
    <label>
        <h2>CRÉATION</h2>
    </label>

    <!-- Input field for the post title -->
    <label for="title">Titre :</label>
    <input type="text" id="title" name="title" required>

    <!-- Textarea for the post content -->
    <label for="content">Contenu :</label>
    <textarea id="content" name="content" placeholder="Veuilliez remplir le contenu de votre poste ici !" required></textarea>

    <!-- Submit button to create the post -->
    <button type="submit">Créer</button>
</form>

<?php
// Include the footer file
require_once __DIR__ . '/../INCLUDE/footer.php';
?>

<?php
// Include the header file
require_once __DIR__ . '/../INCLUDE/header.php';
?>

<!-- Form for editing a post -->
<form method="POST" action="edit_post.php" class="formulaire">
    <!-- Form title -->
    <label>
        <h2>MODIFICATION</h2>
    </label>

    <!-- Hidden input to store the post ID -->
    <input type="hidden" name="id" value="<?php echo $post['id']; ?>">

    <!-- Input field for the post title -->
    <label for="title">Titre :</label>
    <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($post['title']); ?>" required>

    <!-- Textarea for the post content -->
    <label for="content">Contenu :</label>
    <textarea id="content" name="content" required><?php echo htmlspecialchars($post['content']); ?></textarea>

    <!-- Submit button to update the post -->
    <button type="submit">Modifier</button>
</form>

<?php
// Include the footer file
require_once __DIR__ . '/../INCLUDE/footer.php';
?>
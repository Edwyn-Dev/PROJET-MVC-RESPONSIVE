<?php
// Include the header file
require_once __DIR__ . '/../INCLUDE/header.php';
?>

<?php foreach ($posts as $post): ?>
    <div class="post-container">
        <!-- Display the post title -->
        <h2><?php echo htmlspecialchars($post['title']); ?></h2>
        <!-- Display the post content -->
        <p><?php echo htmlspecialchars($post['content']); ?></p>
        <!-- Link to edit the post -->
        <a href="edit_post.php?id=<?php echo $post['id']; ?>">Modifier</a>
        <!-- Link to delete the post -->
        <a href="delete_post.php?id=<?php echo $post['id']; ?>">Supprimer</a>
    </div>
<?php endforeach; ?>

<?php
// Include the footer file
require_once __DIR__ . '/../INCLUDE/footer.php';
?>

<?php
// Include the header file
require_once __DIR__ . '/../INCLUDE/header.php';
// Use the CommentController class from the Controllers namespace
use Controllers\CommentController;

// Include the CommentController.php file
require_once __DIR__ . '/../CONTROLLERS/CommentController.php';
?>

<?php if (!empty($posts)): ?>
    <?php foreach ($posts as $post): ?>
        <div class="post-container">
            <!-- Display the post author -->
            <span class="post-author">Auteur: <strong><?php echo htmlspecialchars($post['author']); ?></strong></span>
            <!-- Display the post title -->
            <h2><?php echo htmlspecialchars($post['title']); ?></h2>
            <!-- Display the post content -->
            <p><?php echo htmlspecialchars($post['content']); ?></p>

            <?php
            // Instantiate the CommentController
            $commentController = new CommentController();
            // Retrieve comments for the current post
            $comments = $commentController->getCommentsByPost($post['id']);
            ?>
            <!-- Display the comment section with the number of comments -->
            <h2>SECTION COMMENTAIRE | (🗨️<?= count($comments) ?>)</h2>
            <div class="comments">
                <?php foreach ($comments as $comment): ?>
                    <div class="comment <?php echo $comment['user_id'] == $post['author_id'] ? 'author-comment' : ''; ?>">
                        <span class="comment-author">
                            <?php
                            // Display the comment author and highlight if the comment author is the post creator
                            echo $comment['user_id'] == $post['author_id']
                                ?
                                htmlspecialchars($comment['username']) . ' (Créateur du Poste)'
                                :
                                htmlspecialchars($comment['username']);
                            ?>
                            <!-- Display the comment creation date -->
                            <span class="comment-date"><?php echo htmlspecialchars($comment['created_at']); ?></span>
                        </span>
                        <!-- Display the comment text -->
                        <p class="comment-text"><?php echo htmlspecialchars($comment['content']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php if (isset($_SESSION['user'])): ?>
                <!-- Display the comment form if the user is logged in -->
                <form method="POST" action="comment.php" class="formulaire">
                    <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
                    <textarea name="content" placeholder="Veuilliez remplir le contenue de votre commentaire ici !" required></textarea>
                    <button type="submit">Ajouter un commentaire</button>
                </form>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <!-- Display a message if no posts are found -->
    <p>Aucun post trouvé.</p>
<?php endif; ?>

<?php
// Include the footer file
require_once __DIR__ . '/../INCLUDE/footer.php';
?>

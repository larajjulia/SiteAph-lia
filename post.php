<?php 
session_start();
$logged = isset($_SESSION['user_id'], $_SESSION['username']);
if (isset($_GET['post_id'])) {
    include_once "admin/data/Post.php";
    include_once "admin/data/Comment.php";
    include_once "db_conn.php";

    $id = $_GET['post_id'];
    $post = getById($conn, $id);
    $comments = getCommentsByPostID($conn, $id);

    if (!$post) {
        header("Location: blog.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> <?= $post['post_title'] ?> </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="src/styles/styles.css">
    <link rel="stylesheet" href="index.php">
    <link rel="stylesheet" href="src/styles/post.css">
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <?php 
        include_once 'inc/NavBar.php';
    ?>

    <div class="banner">
        <img src="upload/blog/<?= $post['cover_url'] ?>" alt="<?= htmlspecialchars($post['post_title']) ?>" width="100%" height="200px">
    </div> 

    <h2 class="section-subtitle" style="margin-top: 30px; margin-left: 10px; margin-bottom: 10px;">
        <?= $post['post_title'] ?>
    </h2>

    <p id="ce_text" style="margin-left: 20px; margin-bottom: 60px; max-width: 100%; word-wrap: break-word; overflow-wrap: break-word;box-sizing: border-box;">
        <?= $post['post_text'] ?>
    </p>

<div id="contact_content">
    <h2 class="section-subtitle">Interaja com a publicação</h2>

    <p id="wpp_contact">
        <?php if ($logged): ?>
            <i class="fa fa-thumbs-up like-btn <?= $liked ? 'liked' : 'like' ?>"
                data-post-id="<?= $post['post_id'] ?>"
                data-liked="<?= $liked ? 1 : 0 ?>"></i>
        <?php else: ?>
            <i class="fa fa-thumbs-up"></i>
        <?php endif; ?>
        Likes (<span id="like-count"><?= likeCountByPostID($conn, $post['post_id']) ?></span>)
            |
        Comentários (<?= CountByPostID($conn, $post['post_id']) ?>)
    </p>

    <?php if ($logged): ?>
    <form action="php/comment.php" method="post" id="comments" style="width: 100%; text-align: left;">
        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($_GET['error']) ?></div>
        <?php endif; ?>
        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success"><?= htmlspecialchars($_GET['success']) ?></div>
        <?php endif; ?>

        <div class="mb-3">
            <label for="comment">Deixe um comentário:</label>
            <input type="text" name="comment" class="form-control" placeholder="Digite aqui...">
            <input type="hidden" name="post_id" value="<?= $post['post_id'] ?>">
        </div>
        <button type="submit" class="btn-default">Comentar</button>
    </form>
    <?php else: ?>
        <p style="margin-top: 10px;">Faça login para comentar e curtir.</p>
    <?php endif; ?>
</div>

<div class="container mt-5">
    <h4 class="mb-3">Comentários</h4>
    <?php if (!empty($comments)): ?>
        <?php foreach ($comments as $comment): ?>
            <?php $user = getUserByID($conn, $comment['user_id']); ?>
            <div class="comment d-flex align-items-start mb-3">
                <img src="img/user-default.png" width="40" height="40" alt="Avatar">
                <div class="ms-2">
                    <strong>@<?= htmlspecialchars($user['username']) ?></strong>
                    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
                    <small class="text-body-secondary"><?= $comment['created_at'] ?></small>
                </div>
            </div>
            <hr>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Seja o primeiro a comentar!</p>
    <?php endif; ?>
</div>


    <footer>
        <img src="imagens/wave.svg" alt="onda com cor amarela apresentando as redes sociais de contato">

        <div id="footer_items">
            <span id="copyright">
                &copy 2025 Lara Julia
            </span>

            <div class="social-media-buttons">
                <a href="">
                    <i class="fa-brands fa-linkedin"></i>
                </a>
                <a href="">
                    <i class="fa-brands fa-instagram"></i>
                </a>
                <a href="">
                    <i class="fa-brands fa-facebook"></i>
                </a>
            </div>
        </div>
    </footer>

    <aside class="whats">
        <a href="https://wa.me//5511965069066?text=Olá!%20Tenho%20interesse%20em%20obter%20um%20laudo%20e/ou%20prontuário%20elétrico." target="_blank">
            <img src="imagens/whatsapp.png" width="80" alt="Fale conosco pelo WhatsApp">
        </a>
    </aside>

    <script>
        var nav_list = document.getElementById('nav_list').children;
        nav_list.item(3).classList.add("active");
    </script>
</body>
</html>

<?php } else {
    header("Location: blog.php");
    exit;
} ?>
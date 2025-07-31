<?php
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username']) && isset($_GET['post_id'])) {

    $post_id = $_GET['post_id'];

    include_once("data/Post.php");
    include_once("../db_conn.php");
    $post = getById($conn, $post_id);
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Painel de Controle - <?= $post['post_title'] ?></title>

        <link rel="stylesheet" href="../css/side-bar.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="/src/styles/post.css">
        <link rel="stylesheet" href="/src/styles/styles.css">
    </head>

    <body>
        <?php
        $key = "��ʏhak��.=bcm]#:6";
        include "inc/side-nav.php";
        ?>
        <div class="main-table">

            <div class="banner">
                <img src="../upload/blog/<?=$post['cover_url'] ?>" alt="pessoas reunidas em uma mesa com seus notebooks" max-width="70%" max-height="70%">
            </div>

            <h2 class="section-subtitle">
                <?= $post['post_title'] ?>
            </h2>

            <div id="ce_text">
                <?= $post['post_text'] ?>
            </div>

            <p id="ce_description" class="justify-content-left">
                <small class="text-body-secondary">Publicado em: <?= $post['created_at'] ?></small>
            </p>
        </div>
        </section>

        <script>
            var navList = document.getElementById('navList').children;
            navList.item(1).classList.add("active");
        </script>
    </body>

    </html>

<?php } else {
    header("Location: ../admin-login.php");
    exit;
} ?>
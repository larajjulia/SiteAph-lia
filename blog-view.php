<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
$logged = false;
if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
    $logged = true;
    $user_id = $_SESSION['user_id'];
}

if (isset($_GET['post_id'])) {

    include_once("admin/data/Post.php");
    include_once("admin/data/Comment.php");
    include_once("db_conn.php");
    $id = $_GET['post_id'];
    $post = getById($conn, $id);
    $comments = getCommentsByPostID($conn, $id);

    if ($post == 0) {
        header("Location: blog.php");
        exit;
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Blog - <?= $post['post_title'] ?></title>

        <link rel="stylesheet" href="src/styles/styles.css">
        <link rel="stylesheet" href="serviços/ppe.html">
        <link rel="stylesheet" href="serviços/ppema.html">
        <link rel="stylesheet" href="serviços/sfo.html">
        <link rel="stylesheet" href="serviços/lpe.html">
        <link rel="stylesheet" href="serviços/pe.html">
        <link rel="stylesheet" href="serviços/ce.html">
        <link rel="stylesheet" href="src/styles/blog.css">
        <script src="https://unpkg.com/scrollreveal"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <?php
        include 'inc/NavBar.php';
        ?>

        <div class="container mt-5" width="100%">
            <section>

                <main class="main-blog">

                    <div class="card main-blog-card mb-5">
                        <img src="upload/blog/<?= $post['cover_url'] ?>" class="card-img-top" alt="..." width="300px" height="300px">
                        <div class="card-body">
                            <h5 class="card-title"><?= $post['post_title'] ?></h5>
                            <p class="card-textt ext-break text-wrap w-100">
                                <?= $post['post_text'] ?>
                            </p>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <div class="react-btns">
                                    <?php
                                    $post_id = $post['post_id'];
                                    if ($logged) {
                                        $liked = isLikedByUserID($conn, $post_id, $user_id);


                                        if ($liked) {
                                    ?>
                                            <i class="fa fa-thumbs-up liked like-btn"
                                                post-id="<?= $post_id ?>"
                                                liked="1"
                                                aria-hidden="true"></i>
                                        <?php } else { ?>
                                            <i class="fa fa-thumbs-up like like-btn"
                                                post-id="<?= $post_id ?>"
                                                liked="0"
                                                aria-hidden="true"></i>
                                        <?php }
                                    } else { ?>
                                        <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                    <?php } ?>
                                    Likes (
                                    <span><?php
                                            echo likeCountByPostID($conn, $post['post_id']);
                                            ?></span> )
                                    <i class="fa fa-comment" aria-hidden="true"></i> Comentários (
                                    <?php
                                    echo CountByPostID($conn, $post['post_id']);
                                    ?>
                                    )

                                </div>
                                <small class="text-body-secondary"><?= $post['created_at'] ?></small>
                            </div>

                            <form action="php/comment.php"
                                method="post"
                                id="comments">

                                <h5 class="mt-4 text-secondary">Adicionar Comentário</h5>
                                <?php if (isset($_GET['error'])) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo htmlspecialchars($_GET['error']); ?>
                                    </div>
                                <?php } ?>

                                <?php if (isset($_GET['success'])) { ?>
                                    <div class="alert alert-success" role="alert">
                                        <?php echo htmlspecialchars($_GET['success']); ?>
                                    </div>
                                <?php } ?>
                                <div class="mb-3">
                                    <input type="text"
                                        class="form-control"
                                        name="comment">
                                    <input type="text"
                                        class="form-control"
                                        name="post_id"
                                        value="<?= $id ?>"
                                        hidden>
                                </div>
                                <button type="submit" class="btn btn-primary">Comentar</button>
                            </form>
                            <hr>
                            <div>
                                <div class="comments">
                                    <?php if ($comments != 0) {
                                        foreach ($comments as $comment) {
                                            $u = getUserByID($conn, $comment['user_id']);
                                    ?>
                                            <div class="comment d-flex">
                                                <div>
                                                    <img src="imagens/user-default.jpeg" width="40" height="40">
                                                </div>
                                                <div class="p-2">
                                                    <span>@<?= $u['username'] ?></span>
                                                    <p><?= $comment['comment'] ?></p>
                                                    <small class="text-body-secondary"><?= $comment['created_at'] ?></small>
                                                </div>
                                            </div>
                                            <hr>
                                    <?php }
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </main>
            </section>
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
            $(document).ready(function() {
                $(".like-btn").click(function() {
                    var btn = $(this);
                    var post_id = btn.attr('post-id');
                    var liked = btn.attr('liked');

                    $.post("ajax/like-unlike.php", {
                        post_id: post_id
                    }, function(data) {
                        btn.siblings("span").first().text(data);
                    });

                    // Alternar estado visual
                    if (liked == 1) {
                        btn.attr('liked', '0').removeClass('liked');
                    } else {
                        btn.attr('liked', '1').addClass('liked');
                    }
                });
            });

            var nav_list = document.getElementById('nav_list').children;
            nav_list.item(3).classList.add("active");
        </script>

        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <script>
            $(document).ready(function() {
                $(".like-btn").click(function() {
                    var post_id = $(this).attr('post-id');
                    var liked = $(this).attr('liked');

                    if (liked == 1) {
                        $(this).attr('liked', '0');
                        $(this).removeClass('liked');
                    } else {
                        $(this).attr('liked', '1');
                        $(this).addClass('liked');
                    }
                    $(this).next().load("ajax/like-unlike.php", {
                        post_id: post_id
                    });
                });
            });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </body>

    </html>
<?php } else {
    header("Location: blog.php");
    exit;
} ?>
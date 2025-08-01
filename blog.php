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
$notFound = 0;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Aphélia Blog</title>

    <link rel="stylesheet" href="src/styles/styles.css">
    <link rel="stylesheet" href="serviços/ppe.html">
    <link rel="stylesheet" href="serviços/ppema.html">
    <link rel="stylesheet" href="serviços/sfo.html">
    <link rel="stylesheet" href="serviços/lpe.html">
    <link rel="stylesheet" href="serviços/pe.html">
    <link rel="stylesheet" href="serviços/ce.html">
    <link rel="stylesheet" href="src/styles/blog.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://unpkg.com/scrollreveal"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <?php
    $key = "��ʏhak��.=bcm]#:6";
    include 'inc/NavBar.php';
    include_once("admin/data/Post.php");
    include_once("admin/data/Comment.php");
    include_once("db_conn.php");
    if (isset($_GET['search'])) {
        $key = $_GET['search'];
        $posts = serach($conn, $key);
        if ($posts == 0) {
            $notFound = 1;
        }
    } else {
        $posts = getAll($conn);
    }
    ?>

    <main>
        <section id="services">
            <h2 class="section-title">Blog da Aphélia Engenharia</h2>
            <h3 class="section-subtitle">Veja as novas publicações!</h3>
            <?php if ($posts != 0) { ?>
                <?php
                if (isset($_GET['search'])) {
                    echo "Search <b>'" . htmlspecialchars($_GET['search']) . "'</b>";
                } ?></h1>
                <?php foreach ($posts as $post) { ?>
                    <div class="work">
                        <img src="upload/blog/<?= $post['cover_url'] ?>" alt="Gerador de Energia" class="work-image" width="230" height="221">
                        <div class="w-100">
                            <h3 class="work-title"><?= $post['post_title'] ?></h3>
                            <?php
                            $p = strip_tags($post['post_text']);
                            $p = substr($p, 0, 200);
                            ?>
                            <p class="card-text"><?= $p ?>...</p>
                            <div class="work-ask">
                                <a href="blog-view.php?post_id=<?= $post['post_id'] ?>" style="text-decoration: none;">
                                    <button class="btn-default">
                                        Saiba Mais
                                    </button>
                                </a><br>
                            </div>
                            <div id="btn_publi" class="d-flex justify-content-between">
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
                                            ?>
                                    </span> )
                                    <a href="blog-view.php?post_id=<?= $post['post_id'] ?>#comments" style="text-decoration:  none; color: #000">
                                        <i class="fa fa-comment" aria-hidden="true"></i> Comentários (
                                        <?php
                                        echo CountByPostID($conn, $post['post_id']);
                                        ?> )</a>
                                </div>

                                <small class="text-body-secondary">Publicado em: <?= $post['created_at'] ?></small>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </section>
    </main>

    <footer>
        <img src="imagens/wave.svg" alt="">

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
        <a href="https://wa.me//5511965069066?text=Olá!%20Tenho%20interesse%20em%20realizar%20um%20orçamento." target="_blank">
            <img src="imagens/whatsapp.png" width="80" alt="Fale conosco pelo WhatsApp">
        </a>
    </aside>

    <script>
        $(document).ready(function() {
            $('#mobile_btn').on('click', function() {
                $('#mobile_menu').toggleClass('active');
                $('#mobile_btn').find('i').toggleClass('fa-x');
            });

            // ScrollReveal continua funcionando normalmente
            ScrollReveal().reveal('#cta', {
                origin: 'left',
                duration: 1500,
                distance: '20%'
            });

            ScrollReveal().reveal('.work', {
                origin: 'left',
                duration: 1500,
                distance: '20%'
            });

            ScrollReveal().reveal('#testimonials.balao', {
                origin: 'left',
                duration: 1000,
                distance: '20%'
            });

            ScrollReveal().reveal('.feedback', {
                origin: 'right',
                duration: 1000,
                distance: '20%'
            });

            ScrollReveal().reveal('#enterprise', {
                origin: 'right',
                duration: 1500,
                distance: '20%'
            });

            ScrollReveal().reveal('#questions_content', {
                origin: 'right',
                duration: 1000,
                distance: '20%'
            });

            ScrollReveal().reveal('#contact_form', {
                origin: 'right',
                duration: 1000,
                distance: '20%'
            });

            ScrollReveal().reveal('#thanks', {
                origin: 'right',
                duration: 1000,
                distance: '20%'
            });
        });
    </script>
    <script>
        var nav_list = document.getElementById('nav_list').children;
        nav_list.item(3).classList.add("active");
    </script>
    <script>
        function adjustFlexDirection() {
            const elements = document.querySelectorAll('#btn_publi');
            elements.forEach(el => {
                if (window.innerWidth <= 768) {
                    el.style.flexDirection = 'column';
                    el.style.gap = '8px'; // opcional: adiciona espaço entre os itens
                } else {
                    el.style.flexDirection = 'row';
                }
            });
        }

        // Chamar na carga da página
        window.addEventListener('DOMContentLoaded', adjustFlexDirection);
        // E quando redimensionar
        window.addEventListener('resize', adjustFlexDirection);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>
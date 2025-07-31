<?php
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Painel de Controle - Criar novo Post</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/side-bar.css">
        <link rel="stylesheet" href="../css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/richtext.min.css">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="../src/jquery.richtext.js"></script>
    </head>

    <body>
        <?php
        $key = "��ʏhak��.=bcm]#:6";
        include "inc/side-nav.php";
        include_once("data/Post.php");
        include_once("../db_conn.php");
        $posts = getALl($conn);
        ?>

        <div class="main-table">
            <h3 class="mb-3">Criar Nova Publicação
                <a href="Post.php" class="btn btn-secondary">Publicações</a>
            </h3>
            <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-warning">
                    <?= htmlspecialchars($_GET['error']) ?>
                </div>
            <?php } ?>

            <?php if (isset($_GET['success'])) { ?>
                <div class="alert alert-success">
                    <?= htmlspecialchars($_GET['success']) ?>
                </div>
            <?php } ?>

            <form class="shadow p-3"
                action="req/post-create.php"
                method="post"
                enctype="multipart/form-data">

                <div class="mb-3">
                    <label class="form-label">Título</label>
                    <input type="text"
                        class="form-control"
                        name="title">

                </div>

                <div class="mb-3">
                    <label class="form-label">Imagem de Capa</label>
                    <input type="file"
                        class="form-control"
                        name="cover">
                </div>
                <div class="mb-3">
                    <label class="form-label">Texto</label>
                    <textarea
                        class="form-control text"
                        name="text"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Postar</button>
            </form>
        </div>
        </section>
        </div>
        </section>

        <script>
            var navList = document.getElementById('navList').children;
            navList.item(1).classList.add("active");

            $(document).ready(function() {
                $('.text').richText();


                // Corrigir sincronização do conteúdo antes de enviar
                $('form').on('submit', function() {
                    $('.text').each(function() {
                        const content = $(this).siblings('.richText-editor').html();
                        $(this).val(content);
                    });
                });
            });
        </script>
    </body>

    </html>

<?php } else {
    header("Location: ../admin-login.php");
    exit;
} ?>
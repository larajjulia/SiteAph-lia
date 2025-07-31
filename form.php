<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faça um Orçamento</title>
    <link rel="stylesheet" href="src/styles/styles.css">
    <link rel="stylesheet" href="index.html">
    <link rel="stylesheet" href="thanks.html">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <?php 
        include_once 'inc/NavBar.php';
    ?>

    <section id="contact_form" >
        <div id="contact_content">
            <h2 class="section-subtitle">Orçamento via WhatsApp</h2>
            <br>
            <p id="wpp_contact">
                Fale com um Engenheiro Eletricista agora e faça seu orçamento!
            </p>
            <br>
            <a href="https://wa.me//5511965069066?text=Olá!%20Tenho%20interesse%20em%20realizar%20um%20orçamento." target="_blank" id="contact_item" style="text-decoration: none;">
                <button class="btn-default">Mensagem Aqui</button>
            </a>
        </div>
    </section>

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

    <script src="src/javascript/script.js"></script>
</body>
</html>
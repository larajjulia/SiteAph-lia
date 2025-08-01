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

    <title>Projeto Padrão de Entrada e Média e Alta</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../src/styles/styles.css">
    <link rel="stylesheet" href="../index.php">
    <link rel="stylesheet" href="../src/styles/post.css">
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
   <?php 
        include '../inc/NavBar.php';
    ?>

    <div class="banner">
        <img src="../imagens/cehtml/meetings.jpg" alt="pessoas reunidas em uma mesa com seus notebooks" width="100%" height="200px">
    </div> 

    <h2 class="section-subtitle" style="margin-left: 30px; margin-top: 20px;">
        Projeto Padrão de Entrada de Média e Alta
    </h2>
    <p id="ce_description" style="margin-left: 30px">
        <strong>Projeto Padrão de Entrada de Média e Alta Tensão</strong>
    </p>

    <p id="ce_text" style="margin-left: 30px">
        Desenvolvemos Projetos Elétricos de Padrão de Entrada em Média e Alta Tensão, 
        com assinatura de responsável técnico e emissão da ART, voltados para indústrias, 
        grandes comércios, centros de distribuição, galpões logísticos e empreendimentos 
        com demanda elétrica superior a 75kW. Em situações como essas, as concessionárias 
        de energia — como ENEL (Eletropaulo), CPFL, EDP, Elektro e Energisa — exigem um 
        padrão de entrada diferenciado, com transformadores, proteções específicas e 
        estruturas conforme normas técnicas. Nossa equipe cuida de todo o processo: do 
        levantamento das cargas à entrega do projeto aprovado.<br><br>

        <strong>Processo de aprovação:</strong><br>

        Todo o procedimento envolve a elaboração da ART, vistorias técnicas no local, 
        levantamento de carga instalada e demanda contratada, além da definição dos 
        equipamentos necessários (como transformadores, cubículos de média tensão e 
        sistemas de proteção). Acompanhamos todas as etapas junto à concessionária de 
        energia até a aprovação do projeto e a efetivação da ligação elétrica da unidade 
        consumidora.<br><br>

        <strong>Por que contratar um Engenheiro Eletricista para pedir sua ligação em Média ou Alta Tensão?</strong><br>

        Ligações em média ou alta tensão envolvem normas técnicas rigorosas, alto 
        risco elétrico e exigências específicas das concessionárias. Um projeto mal elaborado 
        pode gerar atrasos, reprovações, custos adicionais e riscos à segurança. O Engenheiro 
        Eletricista garante a correta especificação dos equipamentos, o dimensionamento 
        adequado das instalações e o enquadramento tarifário mais vantajoso. Além de reduzir 
        riscos, o profissional proporciona segurança jurídica, técnica e financeira ao empreendimento. 
        Para saber mais, entre em contato com nossos especialistas e solicite uma consultoria personalizada.
    </p>

    <div id="contact_content" style="width: 50%; height: 60%;">
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

    <footer>
        <img src="../imagens/wave.svg" alt="onda com cor amarela apresentando as redes sociais de contato">

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
            <img src="../imagens/whatsapp.png" width="80" alt="Fale conosco pelo WhatsApp">
        </a>
    </aside>

    <script src="../src/javascript/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
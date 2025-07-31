<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Aphélia - Entrar</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link rel="stylesheet" href="../src/styles/styles.css">
    <link rel="stylesheet" href="../serviços/ppe.html">
    <link rel="stylesheet" href="../serviços/ppema.html">
    <link rel="stylesheet" href="../serviços/sfo.html">
    <link rel="stylesheet" href="../serviços/lpe.html">
    <link rel="stylesheet" href="../serviços/pe.html">
    <link rel="stylesheet" href="../serviços/ce.html">
    <link rel="stylesheet" href="../src/styles/interface.css">
    <link rel="stylesheet" href="../src/styles/popup.css">
    <link rel="stylesheet" href="../src/styles/login.css">
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <header id="admin">
        <nav id="navbar_login">
            <img src="../imagens/logo_completa.png" alt="Logo da empresa Aphélia Engenharia" id="nav_logo" width="100" height="63">

            <h1 class="title_login">
                Página de Login | Cadastro
            </h1>
        </nav>
    </header>
    <main>
        <div id="login_content">
            <img src="../imagens/do-utilizador (1).png" alt="" width="80px" height="80px">

            <h1 class="title_login">
                LOGIN
            </h1>

            <form action="php/login.php" id="login_form" target="_self" method="post">
                <?php if (isset($_GET['error'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo htmlspecialchars($_GET['error']); ?>
                    </div>
                <?php } ?>

                <label for="" class="login_label">Nome de Usuário:</label>
                <input type="text" name="uname" placeholder="Digite o nome de usuário aqui" class="login_input" value="<?php echo (isset($_GET['uname'])) ? htmlspecialchars($_GET['uname']) : ""; ?>" required>
                <label for="" class="login_label">Senha:</label>
                <input type="password" name="pass" placeholder="Digite sua senha aqui" class="login_input" required>
                <button class="btn-default" type="submit" name="btnLogin">Entrar</button>
            </form>
            <div class="footer-links">
                <a href="admin-login.php" class="footer-links">Administrador</a>&nbsp; &nbsp;
                <a href="blog.php" class="footer-links">Blog</a>&nbsp; &nbsp;
                <a href="signup.php" class="footer-links">Cadastre-se</a>
            </div>
        </div>
    </main>

    <script src="../src/javascript/script.js"></script>
    <script src="../src/javascript/popup.js"></script>
</body>

</html>
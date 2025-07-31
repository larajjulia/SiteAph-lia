<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Painel de Controle - Administrador</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/side-bar.css">
        <link rel="stylesheet" href="../css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    </head>

    <body>
        <?php
        $key = "��ʏhak��.=bcm]#:6";
        include "inc/side-nav.php";
        include_once("data/Admin.php");
        include_once("../db_conn.php");
        $admin = getByID($conn, $_SESSION['admin_id']);
        ?>

        <div class="main-table">
            <h3 class="mb-3" style="padding: 20px;">

                Perfil do Administrador

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
                action="req/admin-edit.php"
                method="post">
                <h3>Mudar Informações do Perfil</h3>
                <div class="mb-3">
                    <label class="form-label">Nome</label>
                    <input type="text"
                        class="form-control"
                        name="fname"
                        value="<?= $admin['first_name'] ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Sobrenome</label>
                    <input type="text"
                        class="form-control"
                        name="lname"
                        value="<?= $admin['last_name'] ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nome de Usuário</label>
                    <input type="text"
                        class="form-control"
                        name="username"
                        value="<?= $admin['username'] ?>">
                </div>
                <button type="submit" class="btn btn-primary">Mudar</button>
            </form>

            <form class="shadow p-3 mt-5"
                action="req/admin-edit-pass.php"
                method="post">
                <h3 id="cpassword">Mudar Senha</h3>
                <?php if (isset($_GET['perror'])) { ?>
                    <div class="alert alert-warning">
                        <?= htmlspecialchars($_GET['perror']) ?>
                    </div>
                <?php } ?>

                <?php if (isset($_GET['psuccess'])) { ?>
                    <div class="alert alert-success">
                        <?= htmlspecialchars($_GET['psuccess']) ?>
                    </div>
                <?php } ?>
                <div class="mb-3">
                    <label class="form-label">Senha Atual</label>
                    <input type="password"
                        class="form-control"
                        name="cpass">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nova Senha</label>
                    <input type="password"
                        class="form-control"
                        name="new_pass">
                </div>
                <div class="mb-3">
                    <label class="form-label">Confirmar Senha</label>
                    <input type="password"
                        class="form-control"
                        name="cnew_pass">
                </div>
                <button type="submit" class="btn btn-primary">Mudar Senha</button>
            </form>
        </div>
        </section>
    </body>

    </html>

<?php } else {
    header("Location: ../admin-login.php");
    exit;
} ?>
<header>
        <nav id="navbar">
            <img src="imagens/logo_completa.png" alt="Logo da empresa Aphélia Engenharia" id="nav_logo" width="100" height="63">

            <ul id="nav_list">
                <li class="nav-item">
                    <a href="../index.php#home">Início</a>
                </li>
                <li class="nav-item">
                    <a href="../index.php#services">Serviços</a>
                </li>
                <li class="nav-item">
                    <a href="../index.php#enterprise">Empresa</a>
                </li>
                <li class="nav-item">
                    <a href="../blog.php">Blog</a>
                </li>
                <li class="nav-item">
                    <a href="../index.php#testimonials">Avaliações</a>
                </li>
                <?php
                if ($logged) {
                ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="../profile.php" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            @<?= $_SESSION['username'] ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../logout.php">Sair</a></li>
                        </ul>
                    </li>
                <?php
                } else {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../login.php">Entrar | Cadastre-se</a>
                    </li>
                <?php
                }
                ?>
            </ul>

            <button id="mobile_btn">
                <i class="fa-solid fa-bars"></i>
            </button>

            <button class="btn-default">
                <a href="../form.php">Faça um Orçamento</a>
            </button>
        </nav>

        <div id="mobile_menu">
            <ul id="mobile_nav_list">
                <li class="nav-item">
                    <a href="../index.php#home">Início</a>
                </li>
                <li class="nav-item">
                    <a href="../index.php#services">Serviços</a>
                </li>
                <li class="nav-item">
                    <a href="../index.php#enterprise">Empresa</a>
                </li>
                <li class="nav-item">
                    <a href="../blog.php">Blog</a>
                </li>
                <li class="nav-item">
                    <a href="../index.php#testimonials">Avaliações</a>
                </li>
                <?php
                if ($logged) {
                ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle"
                            href="../profile.php"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fa fa-user"
                                aria-hidden="true"></i>
                            @<?= $_SESSION['username'] ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item"
                                    href="../logout.php">
                                    Logout</a></li>
                        </ul>
                    </li>
                <?php
                } else {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../login.php">Entrar | Cadastre-se</a>
                    </li>
                <?php
                }
                ?>
            </ul>

            <button class="btn-default">
                <a href="../form.php">Faça um Orçamento</a>
            </button>
        </div>
    </header>
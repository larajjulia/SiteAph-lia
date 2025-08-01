<?php 
    if (isset($key) && $key == "��ʏhak��.=bcm]#:6") {

?>

<!DOCTYPE html>
<html>
<head>
	<title>Painel de Controle</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../../css/side-bar.css">
</head>
<body>
	<input type="checkbox" id="checkbox">
	<header class="header">
		<h2 class="u-name">Painel de <b>Controle</b>
			<label for="checkbox">
				<i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
			</label>
		</h2>
		<div class="d-flex align-items-center main-profile-link">
			<a href="profile.php">
				<i class="fa fa-user" aria-hidden="true"></i>
				<span>@<?php echo $_SESSION['username']; ?></span>
			</a>
		</div>
	</header>
	<div class="body">
		<nav class="side-bar">
			<div class="user-p">
				<img src="../imagens/junior.jpg" width="100px" height="100px">
			</div>
			<ul id="navList">
				<li class="">
					<a href="Users.php">
						<i class="fa fa-users" aria-hidden="true"></i>
						<span>Usuários</span>
					</a>
				</li>
				<li>
					<a href="Post.php">
						<i class="fa fa-wpforms" aria-hidden="true"></i>
						<span>Publicações</span>
					</a>
				</li>

				<!-- <li>
					<a href="Category.php">
						<i class="fa fa-desktop" aria-hidden="true"></i>
						<span>Categoria</span>
					</a>
				</li> -->

				<li>
					<a href="Comment.php">
						<i class="fa fa-comment-o" aria-hidden="true"></i>
						<span>Comentários</span>
					</a>
				</li>
				<li>
					<a href="../admin/profile.php">
						<i class="fa fa-cog" aria-hidden="true"></i>
						<span>Configurações</span>
					</a>
				</li>
				<li>
					<a href="../../logout.php">
						<i class="fa fa-power-off" aria-hidden="true"></i>
						<span>Sair</span>
					</a>
				</li>
			</ul>
		</nav>
		<section class="section-1">

<?php 
    }
?>
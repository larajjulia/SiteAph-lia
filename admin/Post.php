<?php
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
?>
	<!DOCTYPE html>
	<html>

	<head>
		<title>Painel de Controle - Publicações</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../css/side-bar.css">
		<link rel="stylesheet" href="../css/style.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	</head>

	<body>
		<?php
			$key = "��ʏhak��.=bcm]#:6";
			include "inc/side-nav.php";
			include_once("data/Post.php");
			include_once("data/Comment.php");
			include_once("../db_conn.php");
			$posts = getALl($conn);
		?>
		<div class="main-table">
			<h3 class="mb-3" style="padding: 20px;">
				Todos as Publicações
				<a href="post-add.php" class="btn btn-primary">Adicionar Publicação</a>

			</h3>
			<?php if (isset($_GET['error'])) { ?>
			<div class="alert alert-warning">
				<?=htmlspecialchars($_GET['error'])?>
			</div>
			<?php } ?>

			<?php if (isset($_GET['success'])) { ?>
			<div class="alert alert-success">
				<?=htmlspecialchars($_GET['success'])?>
			</div>
			<?php } ?>

			<?php if ($posts != 0) { ?>
			<table class="t1 table table-striped table-bordered">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Título</th>
						<th scope="col">Comentários</th>
						<th scope="col">Likes</th>
						<th scope="col">Ação</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($posts as $post) { ?>
					<tr>
						<th scope="row"><?=$post['post_id']?></th>
						<td><a href="single_post.php?post_id=<?=$post['post_id']?>"><?=$post['post_title']?></a></td>
						<td>
							<i class="fa fa-comment" aria-hidden="true"></i> Comentários ()
							<?php 
								echo CountByPostID($conn, $post['post_id']);
							?>
						</td>
						<td>
							<i class="fa fa-thumbs-up" aria-hidden="true"> 
							<?php 
								echo likeCountByPostID($conn, $post['post_id']);
							?>

						</td>
						<td>
							<a href="post-delete.php?post_id=<?=$post['post_id']?>" class="btn btn-danger">Deletar</a>
							<a href="post-edit.php?post_id=<?=$post['post_id']?>" class="btn btn-warning">Editar</a>
						</td>
					</tr>
					<?php }?>
				</tbody>
			</table>
		<?php }else { ?>
			<div class="alert alert-warning">
				Vazio!
			</div>
		<?php } ?>
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
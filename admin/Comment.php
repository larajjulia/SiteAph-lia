<?php
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
?>
	<!DOCTYPE html>
	<html>

	<head>
		<title>Painel de Controle - Comentários</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../css/side-bar.css">
		<link rel="stylesheet" href="../css/style.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	</head>

	<body>
		<?php
			$key = "��ʏhak��.=bcm]#:6";
			include "inc/side-nav.php";
			include_once("data/Comment.php");
            include_once("data/Post.php");
			include_once("../db_conn.php");
			$comments = getAllComment($conn);
		?>
		<div class="main-table">
			<h3 class="mb-3" style="padding: 20px;">
				Todos os Comentários
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

			<?php if ($comments != 0) { ?>
			<table class="t1 table table-striped table-bordered">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Título do Post</th>
                        <th scope="col">Comentário</th>
                        <th scope="col">Usuário</th>
						<th scope="col">Ação</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($comments as $comment) { ?>
					<tr>
						<th scope="row"><?=$comment['comment_id']?></th>
						<td>
                            <a href="single_post.php?post_id=<?=$comment['post_id']?>">
                            <?php
                            $p = getById($conn, $comment['post_id']); 
                            echo $p['post_title']; ?></a></td>
                        <td><?=$comment['comment']?></td>
                        <td>
                            <?php
                            $u = getUserByID($conn, $comment['user_id']); 
                            echo '@' .$u['username']; ?>
                        </td>
						<td>
							<a href="comment-delete.php?comment_id=<?=$comment['comment_id']?>" class="btn btn-danger">Deletar</a>
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
			navList.item(2).classList.add("active");
		</script>
	</body>

	</html>

<?php } else {
	header("Location: ../admin-login.php");
	exit;
} ?>
<?php
session_start();

if (isset($_SESSION['user_id']) && isset($_POST['post_id'])) {
    include "../db_conn.php";
    include "../admin/data/Comment.php";

    $liked_by = $_SESSION['user_id'];
    $post_id = $_POST['post_id'];

    if (isLikedByUserID($conn, $post_id, $liked_by)) {
        // Remover like
        $sql = "DELETE FROM post_like WHERE post_id = ? AND liked_by = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$post_id, $liked_by]);
    } else {
        // Inserir novo like
        $sql = "INSERT INTO post_like (post_id, liked_by) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$post_id, $liked_by]);
    }

    // Retorna nova contagem de likes
    echo likeCountByPostID($conn, $post_id);
}
?>

<?php
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username']) && $_GET['post_id']) {

    $post_id = $_GET['post_id'];
    include_once("data/Post.php");
    include_once("../db_conn.php");
    $res = deleteById($conn, $post_id);
    if ($res) {
        $sm = "Deletado com Sucesso!";
        header("Location: Post.php?successfully=$sm");
        exit;
    }else {
        $em = "Erro desconhecido";
        header("Location: Post.php?error=$em");
        exit;
    }
} else {
    header("Location: ../admin-login.php");
    exit;
}

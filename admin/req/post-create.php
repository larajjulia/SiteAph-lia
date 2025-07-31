<?php
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {

    if (
        isset($_POST['title']) &&
        isset($_FILES['cover']) &&
        isset($_POST['text'])
    ) {
        include("../../db_conn.php");
        $title = $_POST['title'];
        $text = $_POST['text'];

        if (empty($title)) {
            $em = "Insira um Título";
            header("Location: ../post-add.php?error=$em");
            exit;
        } else if (empty($text)) {
            $em = "Insira um Texto";
            header("Location: ../post-add.php?error=$em");
            exit;
        }

        $image_name = $_FILES['cover']['name'];
        if ($image_name != "") {
            $image_size = $_FILES['cover']['size'];
            $image_temp = $_FILES['cover']['tmp_name'];
            $error = $_FILES['cover']['error'];
            if ($error === 0) {
                if ($image_size > 130000) {
                    $em = "Desculpa, esse arquivo é muito grande.";
                    header("Location: ../post-add.php?error=$em");
                    exit;
                } else {
                    $image_ex = pathinfo($image_name, PATHINFO_EXTENSION);
                    $image_ex = strtolower($image_ex);
                    $mime = mime_content_type($image_temp);
                    file_put_contents("../../log_upload.txt", "extensão: $image_ex\nMIME: $mime\n", FILE_APPEND);

                    $allowed_exs = ['jpg', 'jpeg', 'png'];
                    $allowed_mimes = ['image/jpeg', 'image/png'];

                    if (in_array($image_ex, $allowed_exs)) {
                        $new_image_name = uniqid("COVER-", true) . '.' . $image_ex;
                        $image_path = '../../upload/blog/' . $new_image_name;
                        if (move_uploaded_file($image_temp, $image_path)) {
                            $sql = "INSERT INTO post(post_title, post_text, cover_url) VALUES (?,?,?)";
                            $stmt = $conn->prepare($sql);
                            $res = $stmt->execute([$title, $text, $new_image_name]);
                        } else {
                            $em = "Erro ao salvar imagem. Verifique se a pasta 'upload/blog/' existe e tem permissão de escrita.";
                            header("Location: ../post-add.php?error=" . urlencode($em));
                            exit;
                        }

                        $sql = "INSERT INTO post(post_title, post_text, cover_url) VALUES (?,?,?)";
                        $stmt = $conn->prepare($sql);
                        $res = $stmt->execute([$title, $text, $new_image_name]);
                    } else {
                        $em = "Você não pode fazer uploads de imagens desse tipo";
                        header("Location: ../post-add.php?error=$em");
                        exit;
                    }
                }
            }
        } else {
            $sql = "INSERT INTO post(post_title, post_text) VALUES (?,?)";
            $stmt = $conn->prepare($sql);
            $res = $stmt->execute([$title, $text]);
        }

        if ($res) {
            $sm = "Criado com Sucesso!";
            header("Location: ../post-add.php?success=$sm");
            exit;
        } else {
            $em = "Erro desconhecido";
            header("Location: ../post-add.php?error=$em");
            exit;
        }
    } else {
        header("Location: ../post-add.php");
        exit;
    }
} else {
    header("Location: ../admin-login.php");
    exit;
}

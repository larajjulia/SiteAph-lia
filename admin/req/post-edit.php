<?php
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
    if (
        isset($_POST['title']) &&
        isset($_FILES['cover']) &&
        isset($_POST['text']) &&
        isset($_POST['post_id']) &&
        isset($_POST['cover_url'])
    ) {
        include("../../db_conn.php");
        $title = $_POST['title'];
        $text = $_POST['text'];
        $post_id = $_POST['post_id'];
        $cover_url = $_POST['cover_url'];

        if (empty($title)) {
            $em = "Insira um Título";
            header("Location: ../post-edit.php?error=$em&post_id=$post_id");
            exit;
        } else if (empty($text)) {
            $em = "Insira um Texto";
            header("Location: ../post-edit.php?error=$em&post_id=$post_id");
            exit;
        }

        $image_name = $_FILES['cover']['name'];
        if ($image_name != "") {
            if ($cover_url != "default.jpeg") {
                $clocation = "../../$cover_url";
                @unlink($clocation); // tentativa silenciosa
            }

            $image_size = $_FILES['cover']['size'];
            $image_temp = $_FILES['cover']['tmp_name'];
            $error = $_FILES['cover']['error'];
            if ($error === 0) {
                if ($image_size > 5242880) {
                    $em = "Desculpa, esse arquivo é muito grande.";
                    header("Location: ../post-edit.php?error=$em&post_id=$post_id");
                    exit;
                }

                $image_ex = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
                $mime = mime_content_type($image_temp);
                file_put_contents("../../log_upload.txt", "extensão: $image_ex\nMIME: $mime\n", FILE_APPEND);

                $allowed_exs = ['jpg', 'jpeg', 'png'];
                $allowed_mimes = ['image/jpeg', 'image/png'];

                if (in_array($image_ex, $allowed_exs) && in_array($mime, $allowed_mimes)) {
                    $new_image_name = uniqid("COVER-", true) . '.' . $image_ex;
                    $image_path = '../../upload/blog/' . $new_image_name;
                    if (move_uploaded_file($image_temp, $image_path)) {
                        $sql = "UPDATE post SET post_title=?, post_text=?, cover_url=? WHERE post_id=?";
                        $stmt = $conn->prepare($sql);
                        $res = $stmt->execute([$title, $text, $new_image_name, $post_id]);
                    } else {
                        $em = "Erro ao salvar imagem.";
                        header("Location: ../post-edit.php?error=" . urlencode($em) . "&post_id=$post_id");
                        exit;
                    }
                } else {
                    $em = "Você não pode fazer uploads de imagens desse tipo";
                    header("Location: ../post-edit.php?error=$em&post_id=$post_id");
                    exit;
                }
            }
        } else {
            // Sem nova imagem
            $sql = "UPDATE post SET post_title=?, post_text=? WHERE post_id=?";
            $stmt = $conn->prepare($sql);
            $res = $stmt->execute([$title, $text, $post_id]);
        }

        if ($res) {
            $sm = "Atualizado com Sucesso!";
            header("Location: ../post-edit.php?success=$sm&post_id=$post_id");
            exit;
        } else {
            $em = "Erro desconhecido";
            header("Location: ../post-edit.php?error=$em&post_id=$post_id");
            exit;
        }
    } else {
        header("Location: ../post-edit.php?error=Campos inválidos");
        exit;
    }
} else {
    header("Location: ../admin-login.php");
    exit;
}

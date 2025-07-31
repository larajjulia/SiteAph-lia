<?php 

$sName = "blog_aphelia.mysql.dbaas.com.br"; // ou '127.0.0.1' se for interno
$uName = "blog_aphelia";
$pass  = "apheLia30!";
$db_name = "blog_aphelia";

// Data Source Name (com charset)
$dsn = "mysql:host=$sName;dbname=$db_name;charset=utf8mb4";

// Opções seguras e modernas para PDO
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Mostra exceções
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Fetch padrão: array associativo
    PDO::ATTR_EMULATE_PREPARES   => false,                  // Usa prepares reais do MySQL
];

try {
    $conn = new PDO($dsn, $uName, $pass, $options);
} catch (PDOException $e) {
    // Loga o erro em vez de mostrar ao usuário
    error_log("Erro ao conectar ao banco: " . $e->getMessage());
    die("Erro ao conectar ao banco de dados.");
}

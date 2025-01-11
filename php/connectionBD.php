<?php 

$host = 'localhost';
$user = 'root';
$password = '';
$datebase = 'sonidos_de_habla';

$dsn = 'mysql:host=' . $host . ';dbname=' . $datebase.';charset=utf8mb4';

$pdo = new PDO($dsn, $user, $password);

$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($pdo->errorCode() != 0) {
    echo "Error de conexión: " . $pdo->errorInfo()[2];
    http_response_code(500);
}

?>
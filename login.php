<?php
include ('conexao.php');

if(empty($_POST['email']) || empty($_POST['password'])) { header('Location: login.php');
    exit();
}

$email = mysqli_real_escape_string($conexao, $_POST['email']);
$password = mysqli_real_escape_string($conexao, $_POST['password']);

$query = "select codigo_usuario, email from usuario where email = '{$email}' and senha = '{$password}'";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if ($row == 1) {
    $_SESSION['email'] = $email;
    header('Location: evento.html');
    exit();
} else {
    header('Location: login.php');
    exit();
}
?>
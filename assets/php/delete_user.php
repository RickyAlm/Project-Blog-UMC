<?php

require_once 'connection.php';
session_start();

$remove_user_by_class = $_POST['delete'];
// Limpa o texto da classe deixando apenas os números, ou seja, o ID.
$only_numbers = preg_replace('/[^0-9]/', '', $remove_user_by_class);

// SQL para deletar a conta do usuário.
$query_delete = "DELETE FROM user_ WHERE pk_user = '$only_numbers'";

// Se o Staff se deletar, seu usuário é deletado e será redirecionado para o login.
if($_SESSION["user_session"] == $only_numbers) {
  session_destroy();
  $connection->query($query_delete);
}

// Se for possível realizar a consulta, deleta o usuário e o redireciona para
// a página de login.
$connection->query($query_delete);

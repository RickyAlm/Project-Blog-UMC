<?php

require_once 'connection.php';

session_start();

// Armazena o ID e a classa da nova permissão do usuário, vindas do JS.
$user_id = $_POST['userId'];
$new_permission = $_POST['newPermission'];
// Limpa o texto da classe deixando apenas os números, ou seja, o ID.
$only_numbers = preg_replace('/[^0-9]/', '', $user_id);

$update_permission = "UPDATE user_ SET is_staff = '$new_permission' WHERE pk_user = '$only_numbers'";

// Se o Staff alterar sua permissão para usuário, ele recebe a permissão de
// usuário comum e é redirecionado para o index.
if($_SESSION["user_session"] == $only_numbers) {
  $alter_session_permission = $_SESSION['permission'] = $new_permission;
}

$connection->query($update_permission);

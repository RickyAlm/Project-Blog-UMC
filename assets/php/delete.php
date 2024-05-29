<?php

use Blog\models\CheckSession;

require_once 'connection.php';
require_once 'vendor/autoload.php';

$check_session = new CheckSession;
$user_session = $_SESSION['user_session'];

// SQL para deletar a conta do usuário.
$query_delete = "DELETE FROM user_ WHERE pk_user = '$user_session'";

// Se for possível realizar a consulta, deleta o usuário e o redireciona para
// a página de login.
if($connection->query($query_delete)) {
  $check_session->destroySession();
  header('location: ../../html/login.php');
}

<?php
use Blog\models\ClearString;

require_once 'connection.php';
require_once 'vendor/autoload.php';

$clear_string = new ClearString;

if($_POST) {
  // Armazena os dados enviados pelo usuário (limpos).
  $username_clean = $clear_string->clearUsername($_POST['username']);
  $password_clean = $clear_string->clearPassword($_POST['password']);

  // SQL para consultar o username e password no BD, conforme os dados recebidos.
  $query_username = "SELECT COUNT(*) FROM user_ WHERE username = '$username_clean'";
  $query_password = (
    "SELECT COUNT(*) FROM user_
    WHERE password_user = '$password_clean' AND username = '$username_clean'"
  );

  // Verifica se as consultas obtiveram algum resultado.
  $connection_username = $connection->query($query_username)->fetch_row()[0] == 0;
  $connection_password = $connection->query($query_password)->fetch_row()[0] == 0;

  // Caso o usuário enviar texto com caracteres inválidos e ou informações 
  // que não existam, retorna erro de usuário ou senha incorreta.
  if($_POST['username'] != $username_clean || $connection_username) {
    $is_valid = 'username';
  } else if ($_POST['password'] != $password_clean || $connection_password) {
    $is_valid = 'password';
  } else {
    session_start();

    // Busca o número de ID do usuário e depois a armazena em uma variável.
    $query_pk = "SELECT pk_user FROM user_ WHERE username = '$username_clean'";
    $get_pk = $connection->query($query_pk)->fetch_row()[0];

    // Cria um cookie de sessão com o valor do ID do usuário.
    $_SESSION["user_session"] = $get_pk;
    $is_valid = true;
  }

  // Adiciona o valor da variável de controle dos erros a uma array.
  $response = ['is_valid' => $is_valid,];
  echo json_encode($response);
}

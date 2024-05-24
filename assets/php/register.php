<?php

use Blog\models\ClearString;

require_once 'connection.php';
require_once 'vendor/autoload.php';

$clear_string = new ClearString;

if($_POST) {
  // Armazena os dados enviados pelo usuário (limpos).
  $first_name_clean = $clear_string->clearText($_POST['first-name']);
  $last_name_clean = $clear_string->clearText($_POST['last-name']);
  $username_clean = $clear_string->clearUsername($_POST['username']);
  $email_clean = $clear_string->clearEmail($_POST['email']);
  $password_clean = $clear_string->clearPassword($_POST['password']);

  // SQL para consultar se o username e email enviados já existem no BD.
  $query_username = "SELECT COUNT(*) FROM user_ WHERE username = '$username_clean'";
  $query_email = "SELECT COUNT(*) FROM user_ WHERE email = '$email_clean'";

  // Verifica se as consultas obtiveram algum resultado.
  $connection_username = $connection->query($query_username)->fetch_row()[0] == 1;
  $connection_email = $connection->query($query_email)->fetch_row()[0] == 1;

  // SQL para a inserção do usuário.
  $sql_insert = "INSERT INTO user_(first_name, last_name, email, password_user, is_staff, username) VALUES ('$first_name_clean', '$last_name_clean', '$email_clean', '$password_clean', 1, '$username_clean')";

  // Caso o usuário tentar registrar valores com caracteres inválidos,
  // retornará o valor do erro no qual o dado está incorreto.
  if($_POST['first-name'] != $first_name_clean) $is_valid = 'first_name';
  else if($_POST['last-name'] != $last_name_clean) $is_valid = 'last_name';
  else if($_POST['username'] != $username_clean) $is_valid = 'username';
  else if($_POST['email'] != $email_clean) $is_valid = 'email';
  else if($_POST['password'] != $password_clean) $is_valid = 'password';
  // Se o dado enviado já existir na base de dados, envia o erro de dado existente.
  else if($connection_username) $is_valid = 'username_exists';
  else if($connection_email) $is_valid = 'email_exists';
  // Se nenhum dado estiver incorreto, tenta realizar a conexão com a BD e
  // retorna o $is_valid como true;
  else if($connection->query($sql_insert)) $is_valid = true;

  // Adiciona o valor da variável de controle dos erros a uma array.
  $response = ['is_valid' => $is_valid];
  echo json_encode($response);
}



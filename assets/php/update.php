<?php
use Blog\models\CheckSession;
use Blog\models\ClearString;

require_once 'connection.php';
require_once 'vendor/autoload.php';

// Verifica se a sessão do usuário NÃO existe.
$check_session = new CheckSession;
$check_session->sessionNotExists();
// Armazena o ID de sessão do usuário.
$user_session = $_SESSION['user_session'];

if($_POST) {
  $clear_string = new ClearString;

  // Armazena o username e email do usuário sem limpeza, para futuras validações.
  $username = $_POST['username'];
  $email = $_POST['email'];

  // Armazena os dados enviados pelo usuário (limpos).
  $first_name_clean = $clear_string->clearText($_POST['first-name']);
  $last_name_clean = $clear_string->clearText($_POST['last-name']);
  $username_clean = $clear_string->clearUsername($_POST['username']);
  $email_clean = $clear_string->ClearEmail($_POST['email']);
  // $password_clean = $clear_string->clearPassword($_POST['password']);

  // SQL para atualizar o nome e sobrenome do usuário.
  $query_update_fname_lname = (
    "UPDATE user_
    SET first_name = '$first_name_clean', last_name = '$last_name_clean'
    WHERE pk_user = '$user_session'"
  );

  // SQL para atualizar o username do usuário.
  $query_update_username = (
    "UPDATE user_
    SET username = '$username_clean' WHERE pk_user = '$user_session'"
  );

  // SQL para atualizar o e-mail do usuário.
  $query_update_email = (
    "UPDATE user_
    SET email = '$email_clean' WHERE pk_user = '$user_session'"
  );

  // SQL para consultar se o username e e-mail enviados já existem no BD.
  $query_username = "SELECT COUNT(username) FROM user_ WHERE username = '$username_clean'";
  $query_email = "SELECT COUNT(email) FROM user_ WHERE email = '$email_clean'";

  // SQL para buscar consultar o usuário e o e-mail atuais do usuário.
  $query_current_username = "SELECT username FROM user_ WHERE pk_user = '$user_session'";
  $query_current_email = "SELECT email FROM user_ WHERE pk_user = '$user_session'";

  // Verifica se o nome de usuário e e-mail já existem na base de dados.
  $connection_username = $connection->query($query_username)->fetch_row()[0] == 1;
  $connection_email = $connection->query($query_email)->fetch_row()[0] == 1;

  // Armazena o valor atual do username e e-mail do usuário.
  $current_username = $connection->query($query_current_username)->fetch_row()[0];
  $current_email = $connection->query($query_current_email)->fetch_row()[0];

  // Verifica se o usuário alterou algum dado no username ou e-mail.
  if($username != $current_username || $email != $current_email) {
    // Se o username estiver alterado, é realizado as validações e sua inserção no BD.
    if($username != $current_username){
      if($username != $username_clean) $is_valid = 'username';
      else if($connection_username) $is_valid = 'username_exists';
      else $connection->query($query_update_username);
    }

    // Se o email estiver alterado, é realizado as validações e sua inserção no BD.
    if($email != $current_email) {
      if($email != $email_clean) $is_valid = 'email';
      else if($connection_email) $is_valid = 'email_exists';
      else $connection->query($query_update_email);
    }
  }
  else{
    // Verifica se o nome e sobrenome do usuário são válidos.
    if($_POST['first-name'] != $first_name_clean) $is_valid = 'first_name';
    else if($_POST['last-name'] != $last_name_clean) $is_valid = 'last_name';
    else {
      // Se tudo estiver correto, retorna a variável de controle como "true" e
      // realiza a atualização do nome e sobrenome.
      $connection->query($query_update_fname_lname);
      $is_valid = true;
    }
  }

  // Adiciona o valor da variável de controle dos erros a uma array.
  $response = ['is_valid' => $is_valid];
  echo json_encode($response);
}

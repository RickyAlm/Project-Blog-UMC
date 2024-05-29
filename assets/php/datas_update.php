<?php

use Blog\models\CheckSession;

require_once 'connection.php';
require_once 'vendor/autoload.php';

$check_session = new CheckSession;
$check_session->sessionNotExists();

// Armazena o valor da sessão.
$user_session = $_SESSION["user_session"];  

// Consulta as informações do usuário conforme o valor da sessão e seu ID.
$query_datas = "SELECT * FROM user_ WHERE pk_user = '$user_session'";
$connection_result = $connection->query($query_datas);

// Se houver UMA consulta, armazena as informações do usuário em variáveis.
if(mysqli_num_rows($connection_result) === 1) {
  $datas = $connection_result -> fetch_assoc();
  $first_name = $datas['first_name'];
  $last_name = $datas['last_name'];
  $username = $datas['username'];
  $email = $datas['email'];
}



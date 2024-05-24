<?php

namespace Blog\models;

session_start();

// Classe para checar se a sessão "user_session" existe ou não no navegador.
class CheckSession
{
  public function sessionNotExists(): void
  {
    // Se a sessão NÃO EXISTIR redireciona o usuário para a página de login.
    if(!isset($_SESSION["user_session"])) {
      header("location: ../html/login.php");
      exit;
    }
  }

  public function sessionExists():void
  {
    // Se a sessão EXISTIR redireciona o usuário para a página home.
    if(isset($_SESSION["user_session"])) {
      header("location: ../html/index.php");
      exit;
    }
  }
}

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

  public function sessionExists(): void
  {
    // Se a sessão EXISTIR redireciona o usuário para a página home.
    if(isset($_SESSION["user_session"])) {
      header("location: ../html/index.php");
      exit;
    }
  }

  // Destrói a sessão e redireciona o usuário para a página de login.
  public function destroySession(): void
  {
    session_destroy();
    header("location: ../../html/login.php");
    exit;
  }

  // Checa se o usuário é staff, se não for o redireciona para o index.
  public function checkStaff(): void
  {
    if($_SESSION["permission"] != 2){
      header("location: ../html/index.php");
      exit;
    }
  }

  // Checa se o usuário é staff e retorna o valor do parâmetro $exec.
  public function checkStaffEcho(string $exec): void
  {
    if($_SESSION["permission"] == 2){
      echo($exec);
    }
  }
}

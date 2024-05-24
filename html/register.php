<?php
  use Blog\models\CheckSession;
  require_once '../assets/php/vendor/autoload.php';

  $check_session = new CheckSession;
  $check_session->sessionExists();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog - Registro</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Galada&family=Inter:wght@100..900&family=Roboto+Slab:wght@100..900&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/login-style.css">
  <link rel="shortcut icon" href="../assets/img/icons/favicon.ico" type="image/x-icon">
</head>

<body>
  <section class="container">
    <div class="form-container">
      <p class="title galada-regular">Se Quiser Sim Receitas</p>
      <hr>

      <form class="form" method="post">
        <div class="infos">
          <input type="text" class="input" name="first-name" placeholder="Nome" maxlength="30" required>
          <span class="input-info first-name-dn">Use apenas letras.</span>
        </div>

        <div class="infos">
          <input type="text" class="input" name="last-name" placeholder="Sobrenome" maxlength="30" required>
          <span class="input-info last-name-dn">Use apenas letras.</span>
        </div>

        <div class="infos">
          <input type="text" class="input" name="username" placeholder="Apelido" maxlength="30" required>
          <span class="input-info username-dn"></span>
        </div>

        <div class="infos">
          <input type="email" class="input" name="email" placeholder="E-mail" maxlength="30" required>
          <span class="input-info email-dn"></span>
        </div>

        <div class="infos">
          <input type="password" class="input" name="password" placeholder="Senha" minlength="8" maxlength="60"
            required>
          <span class="input-info password-dn">Senha inválida<br>Caracteres permitidos: #?!@$%^&*-</span>
        </div>

        <button class="form-btn" type="submit">Registrar</button>
      </form>

      <p class="sign-up-label">
        Já possui conta? <span class="sign-up-link"><a href="login.php">Entrar</a></span>
      </p>
    </div>
  </section>
</body>

<script type="module" src="../assets/js/checkRegisterDatas.js"></script>

</html>
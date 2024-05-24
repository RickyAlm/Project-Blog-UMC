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
  <title>Blog - Login</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Galada&family=Inter:wght@100..900&family=Roboto+Slab:wght@100..900&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/login-style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link rel="shortcut icon" href="../assets/img/icons/favicon.ico" type="image/x-icon">
</head>

<body>
  <section class="container">
    <div class="form-container">
      <h2 class="title galada-regular">Se Quiser Sim Receitas</h2>
      <hr>

      <form class="form" method="post">
        <div class="infos">
          <input type="username" class="input" name="username" placeholder="Apelido" maxlength="30">
          <span class="input-info username-dn"></span>
        </div>

        <div class="infos">
          <input type="password" class="input" name="password" placeholder="Senha" minlength="8" maxlength="60"
            required>
          <span class="input-info password-dn">Senha incorreta</span>
        </div>

        <!-- CHECKBOX PARA MANTER O USUÁRIO LOGADO (IMPLEMENTAÇÃO FUTURA) -->
        <!-- <label class="checkbox-center">
          Permanecer logado?
          <input type="checkbox" class="input" name="stay-connected">
          <span class="custom-checkbox"></span>
        </label> -->

        <button class="form-btn" type="submit">Entrar</button>
      </form>

      <p class="sign-up-label">
        Não possui conta? <span class="sign-up-link"><a href="register.php">Registrar-se</a></span>
      </p>
    </div>
  </section>

  <script type="module" src="../assets/js/checkLoginDatas.js"></script>
</body>

</html>
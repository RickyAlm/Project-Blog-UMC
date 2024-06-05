<?php
use Blog\models\CheckSession;

require_once '../assets/php/datas_update.php';
require_once '../assets/php/vendor/autoload.php';

$check_session = new CheckSession;
$check_session->sessionNotExists();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog - Atualizar</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Galada&family=Inter:wght@100..900&family=Roboto+Slab:wght@100..900&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/login-style.css">
  <link rel="stylesheet" href="../assets/css/update.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/font-aller.css">

  <link rel="shortcut icon" href="../assets/img/icons/favicon.ico" type="image/x-">
</head>

<body class="aller-regular">

<?php require_once 'header.html';?>

  <section class="container-update">
    <div class="form-block">
      <div class="form-center">
        <div class="form-container">
          <h2 class="title-update .aller-bold">Atualizar Dados</h2>
          <hr>


          <form class="form" method="post">
            <div class="infos">
              <input type="text" class="input" name="first-name" placeholder="Nome" maxlength="30"
                value="<?php echo($first_name) ?>">
              <span class="input-info first-name-dn">Use apenas letras.</span>
            </div>

            <div class="infos">
              <input type="text" class="input" name="last-name" placeholder="Sobrenome" maxlength="30"
                value="<?php echo($last_name) ?>">
              <span class="input-info last-name-dn">Use apenas letras.</span>
            </div>

            <div class="infos">
              <input type="text" class="input" name="username" placeholder="Apelido" maxlength="30"
                value="<?php echo($username) ?>">
              <span class="input-info username-dn">Use apenas letras, números e _</span>
            </div>

            <div class="infos">
              <input type="email" class="input" name="email" placeholder="E-mail" maxlength="30"
                value="<?php echo($email) ?>">
              <span class="input-info email-dn">Use apenas letras, números, @ e .</span>
            </div>

            <!-- <div class="infos container-password">
              <input type="password" class="input password" name="password" placeholder="Senha" minlength="8"
                maxlength="60" id="pass">
              <img src="https://cdn0.iconfinder.com/data/icons/ui-icons-pack/100/ui-icon-pack-14-512.png" id="olho"
                class="olho">

              <span class="input-info password-dn">Mínimo 8 caracteres</span>
            </div> -->

            <div class="container-btn">
              <button class="btn-logout" type="button">
                <div class="sign"><svg viewBox="0 0 512 512">
                    <path
                      d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z">
                    </path>
                  </svg>
                </div>
                <div class="text">Sair</div>
              </button>


              <button class="btn submit" type="submit"><strong>Atualizar</strong></button>
              <button class="btn-delete" type="button">
                <div class="text-delete">Excluir</div>
                <span class="sign-delete"> <svg viewBox="0 0 440 500" class="svgIcon">
                    <path
                      d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z">
                    </path>
                  </svg></span>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</body>

<!-- <script src="../assets/js/seePassword.js"></script> -->
<script src="../assets/js/updatePageButtons.js"></script>
<script type="module" src="../assets/js/checkUpdateDatas.js"></script>

</html>
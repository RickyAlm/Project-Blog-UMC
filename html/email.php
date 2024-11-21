<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../assets/css/email.css">
</head>
<body>
  <div class="content-email">
    <div class="container-email">
      <div class="row no-gutters d-flex">
        <div class="col-12 col-sm-12 col-md-12 pt-3 pb-4">
          <div class="row">
            <div id="texto-campo-email" class="col-7 col-sm-7 col-md-7">
              <h1>Compartilhe sua sugestão!</h1>
              <p class="aller-regular">Utilize sua criatividade e preencha o campo de e-mail ao lado para nos enviar suas receitas e ideias para o blog. Se tiver alguma dúvida ou feedback sobre qualquer tópico, fique à vontade para usar este espaço. Sua opinião é essencial para mantermos o blog sempre atualizado e relevante!</p>
            </div>

            <div class="col-5 col-sm-5 col-md-5">
              <form action="" method="post">
                <div class="form-group">
                  <label id="label-email" for="email_subject">Assunto</label>
                  <input type="text" class="form-control" id="email_subject" placeholder="">
                </div>
                
                <div class="form-group">
                  <label id="label-email" for="email_msg">Mensagem</label>
                  <textarea class="form-control aller-regular" id="email_msg" rows="20"></textarea>
                </div>

                <?php
                  $button_text = 'Enviar';
                  $button_disabled = '';
                  $cursor_style = '';

                  if(!isset($_SESSION['user_session'])) {
                    $button_text = 'Faça login para enviar';
                    $button_disabled = 'disabled';
                    $cursor_style = 'cursor: not-allowed;';
                  }

                  echo "<button id='btn_send_email' type='button' class='btn btn-lg btn-block' {$button_disabled} style='{$cursor_style}'>{$button_text}</button>";
                ?>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

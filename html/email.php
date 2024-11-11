<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <style>
    #texto-campo-email p {
      font-size: 1.3rem;
      margin-top: 10px;
      width: 100%;
      max-width: 600px;
    }

    .label-email {
      font-size: 17px;
    }

    .content-email {
      background-color: #725157;
      color: white;
      font-size: 16px;
    }

    .btn {
      background-color: #5474A0;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      font-size: 18px;
      cursor: pointer;
      transition: background-color 2ms ease-in-out;
    }

    .btn:hover {
      background-color: #4a78ba;
      box-shadow: #42465d6b 0 3px 18px;
    }

    .container-email {
      width: 100%;
      padding: 20px 50px;
      margin-right: auto;
      margin-left: auto;
    }

    .row {
      display: flex;
      flex-wrap: wrap;
      margin-right: -15px;
      margin-left: -15px;
    }

    .no-gutters {
      margin-right: 0;
      margin-left: 0;
    }

    .d-flex {
      display: flex;
    }

    .col-12, .col-sm-12, .col-md-12, .col-7, .col-sm-7, .col-md-7, .col-5, .col-sm-5, .col-md-5 {
      position: relative;
      width: 100%;
      padding-right: 15px;
      padding-left: 15px;
    }

    /* Ajuste das larguras das colunas */
    .col-7 {
      flex: 0 0 58.333333%;
      max-width: 58.333333%;
    }

    .col-5 {
      flex: 0 0 41.666667%;
      max-width: 41.666667%;
    }

    .pt-3 {
      padding-top: 1rem;
    }

    .pb-4 {
      padding-bottom: 1.5rem;
    }

    .form-group {
      margin-bottom: 1rem;
    }

    #form-envio-email {
      padding: 5px;
    }

    .form-control {
      display: block;
      width: 100%;
      padding: .375rem .75rem;
      font-size: 1rem;
      font-weight: 400;
      line-height: 1.5;
      color: #495057;
      background-color: #fff;
      background-clip: padding-box;
      border: 1px solid #ced4da;
      border-radius: .25rem;
      transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }

    .form-control#email_msg {
      height: 200px;
      min-height: 100px;
      resize: none;
    }

    .form-control:focus {
      color: #495057;
      background-color: #fff;
      border-color: #80bdff;
      outline: 0;
      box-shadow: 0 0 0 .2rem rgba(0,123,255,.25);
    }

    .btn-block {
      display: block;
      width: 100%;
    }

    .btn-lg {
      padding: .5rem 1rem;
      font-size: 1.25rem;
      line-height: 1.5;
      border-radius: .3rem;
    }

    @media (max-width: 767px) {
      .col-7, .col-5 {
        flex: 0 0 100%;
        max-width: 100%;
      }
    }

    @media (max-width: 767px) {
      #texto-campo-email p {
        font-size: 1.1rem;
        margin-bottom: 18px;
      }
    }
  </style>
</head>
<body>
  <div class="content-email">
    <div class="container-email">
      <div class="row no-gutters d-flex">
        <div class="col-12 col-sm-12 col-md-12 pt-3 pb-4">
          <div class="row">
            <div id="texto-campo-email" class="col-7 col-sm-7 col-md-7">
              <h1>Compartilhe sua sugestão!</h1>
              <p>Utilize sua criatividade e preencha o campo de e-mail ao lado para nos enviar suas receitas e ideias para o blog. Se tiver alguma dúvida ou feedback sobre qualquer tópico, fique à vontade para usar este espaço. Sua opinião é essencial para mantermos o blog sempre atualizado e relevante!</p>
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

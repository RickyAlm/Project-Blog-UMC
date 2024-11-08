<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog | Header</title>
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/media-query.css">
    <style>
        .logo img {
            width: 100px;
            height: 80px;
        }
    </style>
</head>

<body>
    <header class="header">
        <!-- <div class="container-nav"> -->
        <nav class="nav">
            <div class="logotipo">
                <button class="hamburguer"></button>
                <a href="index.php" class="logo"><img src="../assets/img/icons/preto_sem_fundo.webp" alt=""></a>
            </div>

            <form action="view_recipes.php" class="InputContainer" method="get">
                <label for="input" class="labelforsearch">
                    <input type="search" name="q" class="input navbar" id="input" placeholder="Pesquisar...">
                </label>

                <button class="button-search">
                    <svg viewBox="0 0 512 512" class="searchIcon">
                        <path
                            d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z">
                        </path>
                    </svg>
                </button>
            </form>

            <ul class="nav-list">
                <li><a href="index.php" class="a infos">Inicio</a></li>

                <li><a href="view_recipes.php" class="infos a">Receitas</a></li>

                <li><a href="update.php" class="infos a">Meu Perfil</a></li>

                <?php
                    use Blog\models\CheckSession;

                    require_once "../assets/php/connection.php";
                    require_once '../assets/php/vendor/autoload.php';
                
                    $check_session = new CheckSession;
                    $check_session->checkStaffEcho("<li><a href='consult_users.php' class='infos a'>Permissões</a></li>");
                    $check_session->checkStaffEcho("<li><a href='create.php' class='infos a'>Criar Receita</a></li>");
                    // $check_session->checkStaffEcho("<li><a href='create.php' class='infos a'>Receitas Não Publicadas</a></li>");
                ?>

                <li class="infos2">
                    <a href="create.php" class="img a"><img class="nav-images nav-images2" src="../assets/img/icons/fork.png"
                            alt="">
                    </a>
                    <a class="img a" href="update.php"><img class="nav-images nav-images2"
                            src="../assets/img/icons/user.png" alt=""></a>
                </li>
            </ul>
        </nav>
        <!-- </div> -->
    </header>
    <script src="../assets/js/createClassName.js"></script>
</body>

</html>

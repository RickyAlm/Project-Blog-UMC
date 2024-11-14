<?php
    use Blog\models\CheckSession;

    require_once "../assets/php/connection.php";
    require_once '../assets/php/vendor/autoload.php';

    $check_session = new CheckSession;
    $check_session->sessionNotExists();
    $check_session->checkStaff();

    require_once "../assets/php/query_users.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Listar Usuários</title>
    <link rel="shortcut icon" href="../assets/img/icons/favicon.ico" type="image/x-icon">
    <!-- <link rel="stylesheet" href="../assets/css/style.css"> -->
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/consult_users.css">
    <link rel="stylesheet" href="../   assets/css/font-aller.css">
    <link rel="stylesheet" href="../assets/css/pagination.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body class="aller-regular">
    <?php require_once 'header.php';?>

    <form action="consult_users.php"  class="InputContainer2" method="get">
        <label for="input" class="labelforsearch">
            <input type="search" name="q" class="input navbar" id="input" placeholder="Pesquisar...">
        </label>

        <label for="filter-is-staff"></label>
        <select name='filter-is-staff' id='pk-permission' class="select-filter">
            <option value='3'>Qualquer</option>
            <option value='1'>Usuário</option>
            <option value='2'>Staff</option>
        </select>

        <button class="button-search">
            <svg viewBox="0 0 512 512" class="searchIcon">
                <path
                    d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z">
                </path>
            </svg>
        </button>
    </form>

    <div class=" responsive-table">
        <?php
            // Verifica se existe algum registro na consulta.
            if($total_users == 0) echo("<h2 class='display-5 text-center'>Nenhum usuário encontrado</h2>");
            else require_once 'partials/users_table.php';
        ?>
    </div>
</body>

<script src="../assets/js/deleteAndSelectSystem.js"></script>
</html>
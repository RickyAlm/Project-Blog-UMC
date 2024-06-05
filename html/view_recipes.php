<?php
    use Blog\models\CheckSession;
    use Blog\models\ConsultRecipe;

    require_once '../assets/php/vendor/autoload.php';

    $consult_recipe = new ConsultRecipe;

    $check_session = new CheckSession;
    $check_session->sessionNotExists();

    require_once '../assets/php/query_recipes.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog | Pesquisa</title>
    <link rel="stylesheet" href="../assets/css/category.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/media-query.css">
    <link rel="stylesheet" href="../assets/css/font-aller.css">
    <link rel="stylesheet" href="../assets/css/pagination.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="shortcut icon" href="../assets/img/icons/favicon.ico" type="image/x-">
    <style>
        h1 {
            text-align: center;
            font-size: 4.5em;
        }

        h2 {
            margin-top: 10px;
            font-size: 1.5em;
            text-align: center !important;
        }
    </style>
</head>

<body class="aller-regular">
    <?php require_once 'header.html';?>

    <section class="category">
        <h1>Receitas</h1>
        <h2>
            Sua pesquisa:
            <?php
                if(!isset($_GET['q']) || $_GET['q'] == '') {
                    echo('Todas as Receitas');
                }
                else {
                    echo($_GET['q']);
                }
            ?>
        </h2>

        <div class="container-category">
            <?php
                // Verifica se existe algum registro na consulta.
                if($total_recipes == 0) echo("<h2 class='display-5 text-center'>Nenhuma receita foi encontrada</h2>");
                else require_once '../assets/php/recipes_table.php';
            ?>
        </div>

        <nav class="nav-style aller-regular" aria-label="...">
            <ul class="pagination">
                <?php require_once '../assets/php/recipes_pagination.php'; ?>
            </ul>
        </nav>
    </section>
    <?php//require_once 'footer.html';?>
</body>

</html>
<?php
    use Blog\models\CheckSession;
    use Blog\models\ConsultRecipe;

    require_once "../assets/php/connection.php";
    require_once '../assets/php/vendor/autoload.php';

    $consult_recipe = new ConsultRecipe;

    $check_session = new CheckSession;
    $check_session->sessionNotExists();

    // Indica a quantidade de itens que deve aparecer na página.
    $per_page = 2;
    // Armazena a página atual do usuário.
    $current_page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
    // Armazena a página inicial.
    $start = ($current_page - 1) * $per_page;

    // Armazena o total de registros existentes na tabela `contacts`.
    $sql_total = "SELECT COUNT(*) FROM recipes";
    $total_recipes = $connection->query($sql_total)->fetch_row()[0];

    // Calcula o total de páginas, conforme a quandidade indicada no $per_page.
    $total_pages = ceil($total_recipes / $per_page);

    // Realiza a consulta para obter todos os registros da tabela `contacts`.
    $recipe_datas = $connection->query($consult_recipe->selectOrderRecipe($start, $per_page));

    // Verifica se existe algum registro na consulta.
    if($total_recipes == 0) die("<h2 class='display-5 text-center'>No Users Found</h2>");
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

<body class="aller-regular">
    <header class="header header-category">
        <p class="logo">LOGOTIPO</p>
    </header>

    <section class="category">
        <h1 class="h1-category">Sua pesquisa: Todas as receitas</h1>

        <div class="container-category">
            <?php
                foreach($recipe_datas as $row){
                    $created_at = new DateTime($row['created_at']);
                    $formatted_date = $created_at->format('d/m/Y');

                    echo("
                        <div class='container-recipes'>
                            <picture class='ing'>
                                <img src='../assets/img/recipes/pexels-ella-olsson-572949-1640772.jpg' alt='' class='food-category'>
                            </picture>

                            <div class='content-flex'>
                                <p>" . $row['username'] . "</p>
                                <p>" . $formatted_date . "</p>
                                <p>" . $row['category_name'] . "</p>
                            </div>

                            <div class='content-flex'>
                                <h3>" . $row['title_recipe'] . "</h3>
                            </div>

                            <div class='content-flex'>
                                <p>" . $row['description_recipe'] . "</p>
                            </div>

                            <a href='recipe_card.php?recipe=" . $row['pk_recipe'] . "'><button type='button'>Ver mais</button></a>
                        </div>"
                    );
                }
            ?>
        </div>

        <nav class="nav-style aller-regular" aria-label="...">
            <ul class="pagination">
                <?php require_once '../assets/php/pagination.php'; ?>
            </ul>
        </nav>
    </section>
    <footer>
        <section class="social-media">
            <p class="logo">LOGOTIPO</p>
            <p>INSTAGRAM</p>
        </section>

        <section class="copyright">
            &copy; Blog Receitas Todos os direitos reservados
        </section>
    </footer>
</body>

</html>
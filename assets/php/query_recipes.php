<?php
require_once "../assets/php/connection.php";

// Indica a quantidade de itens que deve aparecer na página.
$per_page = 3;
// Armazena a página atual do usuário.
$current_page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
// Armazena a página inicial.
$start = ($current_page - 1) * $per_page;

// Verifica se existe uma pesquisa feita pelo usuário.
if (isset($_GET['q'])) {
    $query = $_GET['q'];

    // Conta quantas receitas existem, conforme a pesquisa.
    $sql_total = "SELECT COUNT(*)
    FROM recipes
    INNER JOIN user_ ON recipes.fk_user = user_.pk_user
    INNER JOIN category ON recipes.fk_category = category.pk_category
    WHERE (user_.username LIKE '%$query%' OR recipes.title_recipe LIKE '%$query%' 
        OR recipes.created_at LIKE '%$query%' OR category.category_name LIKE '%$query%')";

    // Consulta todos os dados das receitas, conforme a pesquisa.
    $sql = "SELECT recipes.pk_recipe, recipes.title_recipe, recipes.description_recipe, recipes.created_at, recipes.recipe_image, user_.username, category.category_name
    FROM recipes
    INNER JOIN user_ ON recipes.fk_user = user_.pk_user
    INNER JOIN category ON recipes.fk_category = category.pk_category
    WHERE (user_.username LIKE '%$query%' OR recipes.title_recipe LIKE '%$query%' 
        OR recipes.created_at LIKE '%$query%' OR category.category_name LIKE '%$query%')
    ORDER BY recipes.pk_recipe DESC LIMIT $start, $per_page";
}
else {
    // Conta quantas receitas existem.
    $sql_total = "SELECT COUNT(*)
    FROM recipes
    INNER JOIN user_ ON recipes.fk_user = user_.pk_user
    INNER JOIN category ON recipes.fk_category = category.pk_category";

    // Consulta todos os dados das receitas
    $sql = "SELECT recipes.pk_recipe, recipes.title_recipe, recipes.description_recipe, recipes.created_at, recipes.recipe_image, user_.username, category.category_name
    FROM recipes
    INNER JOIN user_ ON recipes.fk_user = user_.pk_user
    INNER JOIN category ON recipes.fk_category = category.pk_category
    ORDER BY recipes.pk_recipe DESC LIMIT $start, $per_page";
}

$total_recipes = $connection->query($sql_total)->fetch_row()[0];
$total_pages = ceil($total_recipes / $per_page);
$sql_query = $connection->query($sql);

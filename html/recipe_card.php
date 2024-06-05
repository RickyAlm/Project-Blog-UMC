<?php
    use Blog\models\CheckSession;
    use Blog\models\ConsultRecipe;

    require_once "../assets/php/connection.php";
    require_once '../assets/php/vendor/autoload.php';

    $check_session = new CheckSession;
    $consult_recipe = new ConsultRecipe;

    $check_session->sessionNotExists();

    $pk_recipe = $_GET['recipe'];

    $query_recipe = $connection->query($consult_recipe->selectRecipeNames($pk_recipe));
    $recipe_datas = $query_recipe->fetch_assoc();

    // Caso for buscado uma receita com ID que não exista, redireciona para a
    // pagina de busca com todas as receitas.
    if(!isset($recipe_datas['pk_recipe'])) {
        header('location: view_recipes.php');
        exit;
    }

    // Formata a data do banco de dados para o padrão brasileiro.
    $created_at = new DateTime($recipe_datas['created_at']);
    $formatted_date = $created_at->format('d/m/Y');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog | <?php echo($recipe_datas['title_recipe']) ?></title>
    <link rel="shortcut icon" href="../assets/img/icons/chefe-de-cozinha-cinza.png" type="image/x-icon">

    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/view-recipe.css">
    <link rel="stylesheet" href="../assets/css/media-query.css">
    <link rel="stylesheet" href="../assets/css/font-aller.css">
</head>

<body>
    <header class="header header-recipe">
        <p class="logo">Logotipo</p>

        <nav class="header-nav">
            <ul>
                <li><a href="index.html aller-regular">Página inicial</a></li>
            </ul>
        </nav>
    </header>

    <section class="recipe">
        <picture class="recipes-img">
            <div>
                <img src="../assets/img/recipes_images/<?php echo($recipe_datas['recipe_image']) ?>" class="food food-recipes">
            </div>
        </picture>

        <div class="container-description">
            <h2 class="aller-bold h2-recipe">
                <?php echo($recipe_datas['title_recipe']); ?>
            </h2>

            <picture class="recipes-img">
                <div class="h3-favicon">
                    <img src="../assets/img/icons/favicon.ico" alt="favicon">
                    <h3 class="h3-description">Autor:
                        <?php echo($recipe_datas['username']); ?>
                    </h3>
                </div>

                <div class="h3-favicon">
                    <img src="../assets/img/icons/favicon.ico" alt="favicon">
                    <h3 class="h3-description">Categoria:
                        <?php echo($recipe_datas['category_name']); ?>
                    </h3>
                </div>

                <div class="h3-favicon">
                    <img src="../assets/img/icons/favicon.ico" alt="favicon">
                    <h3 class="h3-description">Criado em:
                        <?php echo($formatted_date); ?>
                    </h3>
                </div>
            </picture>

            <p class="description">
                <?php echo($recipe_datas['description_recipe']); ?>
            </p>

            <div class="timer aller-regular">
                <p class="aller-regular">Preparo:
                    <?php echo($recipe_datas['preparation_time']); ?>
                </p>

                <p class="aller-regular">Porções:
                    <?php echo($recipe_datas['portions_name']); ?>
                </p>
            </div>
        </div>

        <h3 class="h3-ingredients">Ingredientes</h3>
        <div class="ingredients-recipe">
            <p>
                <?php echo($recipe_datas['quantity']) ?> de
                <?php echo($recipe_datas['ingredient_name']) ?>
            </p>
        </div>

        <h3 class="h3-step">Passo a Passo</h3>
        <div class="method-preparation">
            <div class="steps">
                <p class="step">
                    <?php echo($recipe_datas['pass_to_pass']); ?>
                </p>
            </div>
        </div>

        <?php
            if($_SESSION['user_session'] == $recipe_datas['fk_user']) {
                echo("<div class='recipe-buttons'>
                    <form action='update_recipe.php' method='post'>
                        <input type='hidden' name='pk-recipe' value='" . $pk_recipe . "'>
                        <button class='form-btn' type='submit'>Atualizar</button>
                    </form>
                    <a href='../assets/php/delete_recipes.php?recipe=" . $pk_recipe. "'><button class='form-btn' id='delete-recipe-button' type='button'>Deletar</button></a>
                </div>"
                );
            }
        ?>
    </section>
</body>

</html>
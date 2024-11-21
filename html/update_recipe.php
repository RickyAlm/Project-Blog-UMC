<?php
    require_once "../assets/php/connection.php";
    require_once "../assets/php/recipe_datas.php";
    require_once '../assets/php/vendor/autoload.php';

    $query_contain = "SELECT contain.quantity, contain.fk_ingredient, ingredients.ingredient_name
    FROM contain, ingredients
    WHERE
        contain.fk_recipe = '$pk_recipe' AND ingredients.pk_ingredient = contain.fk_ingredient";

    $datas_contain = $connection->query($query_contain);
    $ingredients = $connection->query($query_contain);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog | Atualizar Receita</title>
    <link rel="shortcut icon" href="../assets/img/icons/favicon.ico" type="image/x-">
    <link rel="stylesheet" href="../assets/css/media-query.css">
    <link rel="stylesheet" href="../assets/css/create.css">
    <link rel="stylesheet" href="../assets/css/font-aller.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/view-recipe.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <style>
        .recipe-buttons {
            padding-bottom: 25px !important;
        }
    </style>
</head>

<body class="aller-regular">
    <?php require_once 'header.php';?>

    <section class="container-create">
        <form action="../assets/php/update_recipes.php" class="create form" method="post" enctype="multipart/form-data">
            <div class="container">
                <div class="image-preview" id="imagePreview">
                    <input type="file" id="fileInput" accept="image/*" class="file-input" name="recipe-image" value="<?php echo($recipe_datas['recipe_image']) ?>">
                    <img src="../assets/img/recipes_images/<?php echo($recipe_datas['recipe_image']) ?>" alt="Preview da Imagem" id="imgPreview" >
                    <!-- <span class="image-preview__default-text">Preview da Imagem</span> -->
                </div>
            </div>

            <div class="info-recipe">
                <label for="recipe-title" class="title input-label aller-regular">
                    <h3>Título da receita</h3>
                    <input class="recipe-title" type="text" name="recipe-title" placeholder="Título" value='<?php echo($recipe_datas['title_recipe']) ?>'>
                </label>
            </div>

            <label for="recipe-description" class="input-label aller-regular">
                <h3 class="h3-description">Descrição</h3>
                <textarea name="recipe-description" id="" class="aller-regular" cols="30" rows="10" placeholder="Descrição da receita"><?php echo($recipe_datas['description_recipe']) ?></textarea>
            </label>

            <hr>
            <div class="info-recipe">
                <label for="portions" class="input-label">
                    <h3>Serve:</h3>
                    <select name="portions">
                        <?php
                            echo("<option value='" . $recipe_datas['pk_portions'] . "'>" . $recipe_datas['portions_name'] . "</option>");

                            foreach($datas_portions as $row){
                                if(
                                    $row['pk_portions'] != $recipe_datas['portions_name'] &&
                                    $row['portions_name'] != $recipe_datas['portions_name']
                                ) {
                                    echo("<option value='" . $row['pk_portions'] . "'>" . $row['portions_name']  . "</option>");
                                }
                            };
                        ?>
                    </select>
                </label>

                <label for="preparation-time" class="input-label">
                    <h3>Tempo de Preparo</h3>
                    <input placeholder="xx minutos" type="text" name="preparation-time" class="preparation-time" value="<?php echo($recipe_datas['preparation_time']) ?>">
                </label>

                <label for="category" class="input-label">
                    <h3>Categoria</h3>
                    <select name="category">
                        <?php
                            echo("<option value='" . $recipe_datas['pk_category'] . "'>" . $recipe_datas['category_name'] . "</option>");

                            foreach($datas_categories as $row){
                                if(
                                    $row['pk_category'] != $recipe_datas['pk_category'] &&
                                    $row['category_name'] != $recipe_datas['category_name']
                                ) {
                                    echo("<option value='" . $row['pk_category'] . "'>" . $row['category_name'] . "</option>");
                                }
                            };
                        ?>
                    </select>
                </label>
            </div>

            <hr>

            <div class="info-recipe">
                <div class="ingredients">
                    <label for="quantity" class="input-label">
                        <h3>Quantidade</h3>
                        <?php
                            $i = 0;

                            while ($row = $datas_contain->fetch_assoc()) {
                                echo("
                                    <input type='text' name='quantity" . $i . "' placeholder='Insira a quantidade' class='quantity' id='quantity' value='" . $row['quantity'] . "'>
                                ");
                                $i++;
                            }
                        ?>
                    </label>

                    <label for="ingredients" class="input-label">
                        <h3>Ingrediente</h3>

                        <?php
                            $i = 0;

                            while ($row = $ingredients->fetch_assoc()) {
                                echo("
                                    <select name='ingredients" . $i . "' id='ingredients' name='ingredients" . $i . "'>
                                        <option value='" . $row['fk_ingredient'] . "'>" . $row['ingredient_name'] . "</option>
                                ");

                                foreach($datas_ingredients as $row_ing) {
                                    if($row_ing['pk_ingredient'] != $row['fk_ingredient']) {
                                        echo("
                                            <option value='" . $row_ing['pk_ingredient'] . "'>" . $row_ing['ingredient_name'] . "</option>"
                                        );
                                    }
                                }
                                echo('</select>');
                                $i++;
                            }
                        ?>
                    </label>
                </div>
            </div>

                <hr>

                <div>
                    <label for="pass-to-pass" class="input-label">
                        <h3>Passo a passo</h3>
                        <textarea name="pass-to-pass" cols="30" rows="10"><?php echo($recipe_datas['pass_to_pass']) ?></textarea>
                    </label>
                </div>
            </div>

            <!-- <label for="is-published" class="checkbox">Publicado?
                <input type="checkbox" name="is-published" value="2" <?php // if($recipe_datas['is_published'] == 2) echo 'checked'; ?>>
            </label> -->

            <hr>

            <div class="recipe-buttons">
                <form action="update_recipe.php" method="post" class="form-btn-con">
                    <input type="hidden" name="pk-recipe" value="<?php echo($recipe_datas['pk_recipe']); ?>">
                    <button class="form-btns atu" type="submit">Atualizar</button>
                </form>

                <a href="../assets/php/delete_recipes.php?recipe=<?php echo($recipe_datas['pk_recipe'])?>" id="delete-recipe-button" class="adel">
                    <button class="form-btns del" id="delete-recipe-button" type="button">Deletar</button>
                </a>
            </div>
        </form>
    </section>

    <?php require_once 'footer.html';?>
</body>

<script src="../assets/js/showSelectedImg.js"></script>


</html>
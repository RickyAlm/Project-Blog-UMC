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
                <label for="recipe-title" class="title">
                    <h3>Título da receita</h3>
                    <input type="text" name="recipe-title" placeholder="Título" value='<?php echo($recipe_datas['title_recipe']) ?>'>
                </label>
            </div>

            <div class="info-recipe">
                <label for="recipe-description">
                    <h3>Descrição</h3>
                    <textarea name="recipe-description" id="" cols="30" rows="10" placeholder="Descrição da receita"><?php echo($recipe_datas['description_recipe']) ?></textarea>
                </label>
            </div>

            <div class="info-recipe">
                <label for="category">
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

                <label for="preparation-time">
                    <h3>Tempo de Preparo</h3>
                    <input placeholder="xx minutos" type="text" name="preparation-time" value="<?php echo($recipe_datas['preparation_time']) ?>">
                </label>

                <label for="portions">
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
            </div>

            <div class="info-recipe">
                <div class="ingredients">
                    <label for="quantity">
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

                    <label for="ingredients">
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

                <!-- <div class="buttoZzZns">
                        <button class="ingredients-buttons button-add" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path>
                            </svg>
                        </button> -->
                    <!-- <button class="ingredients-buttons button-delete" type="button">
                            <div class="sign">
                                <svg viewBox="0 0 16 16" class="bi bi-trash3-fill" fill="currentColor" height="18"
                                    width="18" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5">
                                    </path>
                                </svg>
                            </div>
                        </button> -->
                <!-- </div> -->
                </div>
            </div>

                <div>
                    <label for="pass-to-pass">
                        <h3>Passo a passo</h3>
                        <textarea name="pass-to-pass" cols="30" rows="10"><?php echo($recipe_datas['pass_to_pass']) ?></textarea>
                    </label>
                </div>
            </div>

            <div class="btns">
                <label for="is-published" class="checkbox">Publicado?
                    <input type="checkbox" name="is-published" value="2" <?php if($recipe_datas['is_published'] == 2) echo 'checked'; ?>>
                </label>

                <div>
                    <form action='update_recipe.php' method='post'>
                        <input type='hidden' name='pk-recipe' value="<?php echo($recipe_datas['pk_recipe']); ?>">
                        <button class='form-btn' type='submit'>Atualizar</button>
                    </form>
                    <button class="form-btn" id="delete-recipe-button" type="button">Deletar</button>
                </div>
            </div>
        </form>
    </section>
</body>

<script src="../assets/js/showSelectedImg.js"></script>


</html>
<?php
    use Blog\models\CheckSession;

    require_once "../assets/php/connection.php";
    require_once '../assets/php/vendor/autoload.php';

    $check_session = new CheckSession;
    $check_session->sessionNotExists();
    $check_session->checkStaff();

    $query_ingredients = "SELECT * FROM ingredients";
    $datas_ingredients = $connection->query($query_ingredients);

    $query_categories = "SELECT * FROM category";
    $datas_categories = $connection->query($query_categories);

    $query_portions = "SELECT * FROM portions";
    $datas_portions = $connection->query($query_portions);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog | Criar Receita</title>
    <link rel="shortcut icon" href="../assets/img/icons/favicon.ico" type="image/x-">
    <link rel="stylesheet" href="../assets/css/media-query.css">
    <link rel="stylesheet" href="../assets/css/create.css">
    <link rel="stylesheet" href="../assets/css/font-aller.css">
</head>

<body class="aller-regular">
<?php require_once 'header.html';?>

    <section class="container-create">
        <form action="../assets/php/create_recipe.php" class="create form" method="post" enctype="multipart/form-data">
            <div class="container">
                <div class="image-preview" id="imagePreview">
                    <input type="file" id="fileInput" accept="image/*" class="file-input" name="recipe-image">
                    <img src="" alt="Preview da Imagem" id="imgPreview" class="image-preview__image">
                    <span class="image-preview__default-text">Preview da Imagem</span>
                </div>
            </div>

            <div class="info-recipe">
                <label for="recipe-title" class="title">
                    <h3>Título da receita</h3>
                    <input type="text" name="recipe-title" placeholder="Título" class="recipe-title" >
                </label>
            </div>

            <!-- <div class="info-recipe"> -->
                <label for="recipe-description">
                    <h3 class="h3-description">Descrição</h3>
                    <textarea name="recipe-description" id="" cols="30" rows="10"
                        placeholder="Descrição da receita"></textarea>
                </label>
            <!-- </div> -->
            <hr>
            <div class="info-recipe">
            <label for="portions">
                    <h3>Serve:</h3>
                    <select name="portions">
                        <option value='default' disabled selected>Selecione...</option>
                        <?php
                            foreach($datas_portions as $row){
                                echo("<option value='" . $row['pk_portions'] . "'>" . $row['portions_name']  . "</option>");
                            };
                        ?>
                    </select>
                </label>

                <label for="preparation-time">
                    <h3>Tempo de Preparo</h3>
                    <input placeholder="xx minutos" type="text" name="preparation-time" class="preparation-time">
                </label>

                <label for="ingredients">
                    <h3>Categoria</h3>

                    <select name="category">
                        <option value='default' disabled selected>Selecione...</option>

                        <?php
                            foreach($datas_categories as $row){
                                echo("<option value='" . $row['pk_category'] . "'>" . $row['category_name'] . "</option>");
                            }
                        ?>
                        </select>
                </label>
            </div>

            <div class="info-recipe">
                <div class="ingredients">
                    <label for="quantity">
                        <h3>Quantidade</h3>
                        <input type="text" name="quantity" placeholder="Insira a quantidade" class="quantity">
                    </label>

                    <label for="ingredients">
                        <h3>Ingrediente</h3>
                        <?php
                            $class_index = 1;
                            echo("<select name='ingredients" . $class_index . "'>");

                            foreach($datas_ingredients as $row){
                                echo("<option value='" . $row['pk_ingredient'] . "'>" . $row['ingredient_name'] . "</option>");
                                $class_index += 1;
                            }
                            ?>
                            </select>
                    </label>

                    <div class="buttons">
                        <button class="ingredients-buttons button-add" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path>
                            </svg>
                        </button>
                        <button class="ingredients-buttons button-delete" type="button">
                            <div class="sign">
                                <svg viewBox="0 0 16 16" class="bi bi-trash3-fill" fill="currentColor" height="18"
                                    width="18" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5">
                                    </path>
                                </svg>
                            </div>
                        </button>
                    </div>
                </div>

            </div>
            <hr>

            <div class="ingredients-list">
                <h3>Sua lista de ingredientes</h3>
                <div class="ingredients-overflow"></div>
            </div>

            <div>
                <label for="pass-to-pass">
                    <h3>Passo a passo</h3>
                    <textarea name="pass-to-pass" cols="30" rows="10" placeholder="Insira o passo a passo"></textarea>
                </label>
            </div>
            <hr>
            <div class="btns">
                <label for="is-published" class="checkbox">Publicado?
                    <input type="checkbox" name="is-published" value="2">
                </label>
                <button class="form-btn" type="submit">Enviar</button>
            </div>
        </form>
    </section>
</body>

<script src="../assets/js/showSelectedImg.js"></script>
<script src="../assets/js/addNewIngredient.js"></script>

</html>
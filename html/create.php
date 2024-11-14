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
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/view-recipe.css">
</head>

<body class="aller-regular">
    <?php require_once 'header.php';?>

    <section class="container-create">
        <form action="../assets/php/create_recipe.php" class="create form" method="post" enctype="multipart/form-data">
            <div class="container">
                <div class="image-preview" id="imagePreview">
                    <input type="file" id="fileInput" accept="image/*" class="file-input" name="recipe-image">
                    <span class="image-preview__default-text">Preview da Imagem</span>
                    <img src="" alt="" id="imgPreview" class="image-preview__image">
                </div>
            </div>

            <div class="info-recipe">
                <label for="recipe-title" class="title input-label">
                    <h3>Título da receita</h3>
                    <input type="text" name="recipe-title" placeholder="Título" class="recipe-title">
                </label>
            </div>

            <!-- <div class="info-recipe"> -->
            <label for="recipe-description" class="input-label">
                <h3 class="h3-description input-label">Descrição</h3>
                <textarea name="recipe-description" id="" class="aller-regular" cols="30" rows="10"
                    placeholder="Descrição da receita"></textarea>
            </label>
            <!-- </div> -->
            <hr>
            <div class="info-recipe">
                <label for="portions" class="input-label">
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

                <label for="preparation-time" class="input-label">
                    <h3>Tempo de Preparo</h3>
                    <input placeholder="xx minutos" type="text" name="preparation-time" class="preparation-time">
                </label>

                <label for="ingredients" class="input-label">
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

            <hr>

            <div class="info-recipe">
                <div class="ingredients">
                    <label for="quantity" class="input-label">
                        <h3>Quantidade</h3>
                        <input type="text" name="quantity1" placeholder="Insira a quantidade" class="quantity"
                            id="quantity">
                        <input type="text" name="quantity2" placeholder="Insira a quantidade" class="quantity"
                            id="quantity">
                        <input type="text" name="quantity3" placeholder="Insira a quantidade" class="quantity"
                            id="quantity">
                        <input type="text" name="quantity4" placeholder="Insira a quantidade" class="quantity"
                            id="quantity">
                        <input type="text" name="quantity5" placeholder="Insira a quantidade" class="quantity"
                            id="quantity">
                    </label>

                    <label for="ingredients" class="input-label">
                        <h3>Ingrediente</h3>
                        <select name='ingredients1' id="ingredients">
                            <option value="" disabled selected>Selecione...</option>
                            <?php
                                foreach($datas_ingredients as $row){
                                    echo("<option value='" . $row['pk_ingredient'] . "'>" . $row['ingredient_name'] . "</option>");
                                }
                            ?>
                        </select>

                        <select name='ingredients2' id="ingredients">
                            <option value="" disabled selected>Selecione...</option>
                            <?php
                                foreach($datas_ingredients as $row){
                                    echo("<option value='" . $row['pk_ingredient'] . "'>" . $row['ingredient_name'] . "</option>");
                                }
                            ?>
                        </select>

                        <select name='ingredients3' id="ingredients">
                            <option value="" disabled selected>Selecione...</option>
                            <?php
                                foreach($datas_ingredients as $row){
                                    echo("<option value='" . $row['pk_ingredient'] . "'>" . $row['ingredient_name'] . "</option>");
                                }
                            ?>
                        </select>

                        <select name='ingredients4' id="ingredients">
                            <option value="" disabled selected>Selecione...</option>
                            <?php
                                foreach($datas_ingredients as $row){
                                    echo("<option value='" . $row['pk_ingredient'] . "'>" . $row['ingredient_name'] . "</option>");
                                }
                            ?>
                        </select>

                        <select name='ingredients5' id="ingredients">
                            <option value="" disabled selected>Selecione...</option>
                            <?php
                                foreach($datas_ingredients as $row){
                                    echo("<option value='" . $row['pk_ingredient'] . "'>" . $row['ingredient_name'] . "</option>");
                                }
                            ?>
                        </select>
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

            <hr>

            <div>
                <label for="pass-to-pass" class="input-label">
                    <h3>Passo a passo</h3>
                    <textarea name="pass-to-pass" cols="30" rows="10" class="aller-regular" placeholder="Insira o passo a passo"></textarea>
                </label>
            </div>
            <hr>
            <div class="btns">
                <label for="is-published" class="checkbox input-label">Publicado?
                    <input type="checkbox" name="is-published" value="2">
                </label>
                <button class="form-btn" type="submit">Enviar</button>
            </div>
        </form>
    </section>
    <?php require_once 'footer.html';?>
</body>

<script src="../assets/js/showSelectedImg.js"></script>

</html>
<?php
use Blog\models\ConsultRecipe;

require_once 'connection.php';
require_once 'vendor/autoload.php';

if($_POST) {
    $pk_recipe = $_POST['pk-recipe'];
    $title_recipe = $_POST['recipe-title'];
    $description_recipe = $_POST['recipe-description'];
    $category = $_POST['category'];
    $preparation_time = $_POST['preparation-time'];
    $portions = $_POST['portions'];
    $quantity = $_POST['quantity'];
    $ingredients = $_POST['ingredients'];
    $pass_to_pass = $_POST['pass-to-pass'];
    $is_published = 1;

    if(isset($_POST['is-published'])) {
        $is_published = 2;
    }

    date_default_timezone_set('America/Sao_Paulo');
    $now_date_time = new DateTime('now');
    $current_date_time = $now_date_time->format('Y-m-d H:i:s');

    $query_update_recipe = "UPDATE recipes
        SET title_recipe = '$title_recipe',
        description_recipe = '$description_recipe', pass_to_pass = '$pass_to_pass',
        updated_at = '$current_date_time', fk_category = '$category',
        fk_portion = '$portions', preparation_time = '$preparation_time',
        is_published = '$is_published'";

    // if (isset($_FILES['recipe-image'])) {
        // $a = "SELECT recipe_image FROM recipes WHERE pk_recipe = '$pk_recipe'";
        // $ab = $connection->query($a)->fetch_row()[0];

        // if($_FILES['recipe-image'] != $ab){
        //     unlink("../img/recipes_images/$ab");
        // }

        // $recipe_image = $_FILES['recipe-image'];
        // $fileName = $recipe_image['name'];
        // $fileExtension = "jpg";
        // $fileTempPath = $recipe_image['tmp_name'];
    
        // Criar nome de arquivo único
        // $newFileName = uniqid() . "." . $fileExtension;
        // move_uploaded_file($fileTempPath, "../img/recipes_images/" . $newFileName);

        // $query_update_recipe .= ", recipe_image = '$newFileName'";
    // }

    $query_update_recipe .= " WHERE pk_recipe = '$pk_recipe'";

    $update_recipe = $connection->query($query_update_recipe);

    header('location: ../../html/recipe_card.php?recipe=' . $pk_recipe);
    exit;
}

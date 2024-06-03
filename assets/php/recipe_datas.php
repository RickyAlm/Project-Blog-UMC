<?php

use Blog\models\ConsultRecipe;

require_once 'connection.php';
require_once '../assets/php/vendor/autoload.php';

$consult_recipe = new ConsultRecipe;

if($_POST) {
  $pk_recipe = $_POST['pk-recipe'];

  $query_recipe = $connection->query($consult_recipe->selectRecipeNames($pk_recipe));
  $recipe_datas = $query_recipe->fetch_assoc();

  $query_categories = "SELECT * FROM category";
  $datas_categories = $connection->query($query_categories);

  $query_portions = "SELECT * FROM portions";
  $datas_portions = $connection->query($query_portions);

  $query_ingredients = "SELECT * FROM ingredients";
  $datas_ingredients = $connection->query($query_ingredients);

  $created_at = new DateTime($recipe_datas['created_at']);
  $formatted_date = $created_at->format('d/m/Y');
}
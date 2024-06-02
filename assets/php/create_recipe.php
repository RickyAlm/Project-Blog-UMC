<?php
require_once 'connection.php';
session_start();

if($_POST) {
  // $recipe_image = $_FILES['recipe-image'];
  $recipe_title = $_POST['recipe-title'];
  $recipe_description = $_POST['recipe-description'];
  $preparation_time = $_POST['preparation-time'];
  $category = $_POST['category'];
  $portion = $_POST['portions'];
  $pass_to_pass = $_POST['pass-to-pass'];
  $is_published = 1;
  $ingredients = $_POST['ingredients1'];
  $quantity = $_POST['quantity'];
  $pk_user = $_SESSION['user_session'];

  if(isset($_POST['is-published'])) {
    $is_published = 2;
  }

  date_default_timezone_set('America/Sao_Paulo');
  $now_date_time = new DateTime('now');
  $current_date_time = $now_date_time->format('Y-m-d H:i:s');

  $create_recipe = "INSERT INTO recipes(
      title_recipe, description_recipe, pass_to_pass, created_at, fk_category,
      fk_portion, preparation_time, is_published, fk_user
    ) VALUES (
      '$recipe_title', '$recipe_description', '$pass_to_pass', '$current_date_time',
      '$category', '$portion', '$preparation_time', $is_published, $pk_user
    )";
  $query_recipe = $connection->query($create_recipe);

  $get_last_recipe_pk = "SELECT pk_recipe FROM recipes ORDER BY pk_recipe DESC LIMIT 1";
  $query_pk_recipe = $connection->query($get_last_recipe_pk)->fetch_row()[0];

  $insert_contain = (
    "INSERT INTO contain(fk_recipe, quantity, fk_ingredient)
    VALUES ('$query_pk_recipe', '$quantity', '$ingredients')"
  );

  $query_contain = $connection->query($insert_contain);

  header("location: ../../html/recipe_card.php?recipe=$query_pk_recipe");
  exit;
}
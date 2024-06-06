<?php

require_once 'connection.php';

$pk_recipe = $_GET['recipe'];

$select_image = "SELECT recipe_image FROM recipes WHERE pk_recipe = '$pk_recipe'";
$image = $connection->query($select_image)->fetch_row()[0];
unlink("../img/recipes_images/$image");

$delete_recipe = "DELETE FROM recipes WHERE pk_recipe = '$pk_recipe'";
$connection->query($delete_recipe);

header('location: ../../html/view_recipes.php');
exit;

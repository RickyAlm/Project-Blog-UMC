<?php

require_once 'connection.php';

$pk_recipe = $_GET['recipe'];

$delete_recipe = "DELETE FROM recipes WHERE pk_recipe = '$pk_recipe'";
$connection->query($delete_recipe);

header('location: ../../html/view_recipes.php');
exit;

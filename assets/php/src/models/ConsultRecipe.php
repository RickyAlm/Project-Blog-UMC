<?php

namespace Blog\models;

class ConsultRecipe
{
    public function selectRecipeNames(int $pk_recipe): string
    {
        $query_recipe_names = "SELECT
            recipes.pk_recipe, recipes.title_recipe, recipes.description_recipe, 
            recipes.pass_to_pass, recipes.created_at, recipes.updated_at, 
            category.pk_category, category.category_name, portions.pk_portions, 
            portions.portions_name, recipes.preparation_time,
            recipes.is_published, recipes.fk_user, recipes.recipe_image, 
            contain.quantity, ingredients.pk_ingredient,
            ingredients.ingredient_name, user_.username
        FROM
            recipes, contain, ingredients, category, portions, user_
        WHERE
            recipes.pk_recipe = '$pk_recipe'
            AND contain.fk_recipe = '$pk_recipe'
            AND contain.fk_ingredient = ingredients.pk_ingredient
            AND category.pk_category = recipes.fk_category
            AND portions.pk_portions = recipes.fk_portion
            AND user_.pk_user = recipes.fk_user";
        return $query_recipe_names;

        return $query_recipe_names;
    }

    public function selectOrderRecipe(int $start, int $per_page): string
    {
        $query_recipe_names = "SELECT
            recipes.pk_recipe, recipes.title_recipe, recipes.description_recipe,
            recipes.pass_to_pass, recipes.created_at, recipes.updated_at,
            category.category_name,  portions.portions_name,
            recipes.preparation_time, recipes.is_published, recipes.fk_user,
            contain.quantity,  ingredients.ingredient_name, user_.username
        FROM recipes, contain, ingredients, category, portions, user_
        WHERE
            contain.fk_recipe = recipes.pk_recipe
            AND contain.fk_ingredient = ingredients.pk_ingredient
            AND category.pk_category = recipes.fk_category
            AND portions.pk_portions = recipes.fk_portion
            AND user_.pk_user = recipes.fk_user
        ORDER BY pk_recipe DESC LIMIT $start, $per_page";
        return $query_recipe_names;
    }

    public function selectRecipeIds(int $pk_recipe): string
    {
        $query_recipe_ids = "SELECT * FROM recipes, contain 
            WHERE recipes.pk_recipe = '$pk_recipe'
            AND contain.fk_recipe = '$pk_recipe'";

        return $query_recipe_ids;
    }
}
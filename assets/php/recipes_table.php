<?php
foreach($sql_query as $row){
    $created_at = new DateTime($row['created_at']);
    $formatted_date = $created_at->format('d/m/Y');

    echo("
        <div class='container-recipes'>
            <picture class='ing'>
                <img src='../assets/img/recipes_images/" . $row['recipe_image'] . "' alt='Imagem da Receita' class='food-category'>
            </picture>

            <div class='content-flex aller-regular'>
                <p>" . $row['username'] . "</p>
                <p>" . $formatted_date . "</p>
                <p>" . $row['category_name'] . "</p>
            </div>

            <div class='content-flex'>
                <h3><strong>" . $row['title_recipe'] . "</strong></h3>
            </div>

            <div class='content-flex '>
                <p>" . $row['description_recipe'] . "</p>
            </div>

            <a href='recipe_card.php?recipe=" . $row['pk_recipe'] . "' class='acess'><button type='button' class='btn-acess'>Ver mais</button></a>
        </div>"
    );
}
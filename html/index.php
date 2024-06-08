<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog de Receita</title>
    <link rel="stylesheet" href="../assets/css/font-aller.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/header.css">

    <link rel="shortcut icon" href="../assets/img/icons/favicon.ico" type="image/x-">
</head>

<body>
    <div class="background">

        <?php require_once 'header.php'; ?>
        <section class="container-conteudo">

            <div class="conteudo">
                <h1 class="h1-content">SE QUISER SIM RECEITAS</h1>
                <h2 class="h2-content">RECEITAS INOVADORAS PARA SURPREENDER SEUS CONVIDADOS</h2>
                <p class="p-content">
                    Bem-vindo ao nosso cantinho culinário! Aqui, na Se quiser sim receitas, cada receita é uma história,
                    uma aventura gastronômica que convida você a explorar os sabores do mundo. Deixe-se levar pelas
                    delícias que preparamos especialmente para você. Está pronto para embarcar nessa jornada
                    gastronômica conosco? Explore, saboreie e descubra o prazer de cozinhar!
                </p>
            </div>


            <div class="container-first-img">
                <div class="image-container">
                    <img src="../assets/img/recipes/pexels-valeriya-842571.jpg" alt="Imagem de capa do card">
                </div>
                <div class="content">
                    <div class="content-flex-first">
                        <h2><strong>Bolo de tapioca</strong></h2>
                    </div>
                    <div class="content-flex-first">
                        <p>Ricky</p>
                        <p>07/06/2024</p>
                        <p>Café da Manhã</p>
                    </div>
                    <div>
                    </div>

                    <a href="recipe_card.php?recipe=168" class="acess">
                        <button class="btn-acess">Veja a receita completa</button>
                    </a>
                </div>
            </div>
        </section>

        <div class="button-container">    
        <?php 
            if(isset($_SESSION['user_session'])) {
                echo('<a href="view_recipes.php"><button class="button-create">Veja todas as receitas</button></a>');
            }
            else {
                echo('<a href="login.php"><button class="button-create">Crie sua conta!</button></a>');
            }
        ?>
        </div>
    </div>

    <main>
        <nav class="categories">
            <h3 class="h3-categories">Categorias Receitas</h3>
            <ul>
                <li>
                    <a href="view_recipes.php?q=café+da+manhã">
                        <img class="categories-img" src="../assets/img/recipes/cafe-manha.jpg" alt="">
                    </a>
                    <span class="span"><strong>CAFÉ DA MANHÃ</strong></span>
                </li>

                <li>
                    <a href="view_recipes.php?q=almoço">
                        <img class="categories-img" src="../assets/img/recipes/almoco.jpg"
                            alt="">
                    </a>
                    <span class="span"><strong>ALMOÇO</strong></span>
                </li>

                <li>
                    <a href="view_recipes.php?q=jantar">
                        <img class="categories-img" src="../assets/img/recipes/jantar.jpg" alt="">
                    </a>
                    <span class="span"><strong>JANTAR</strong></span>
                </li>
            </ul>
        </nav>

        <div class="background2">

            <h2 class="main-h2">Algumas receitas</h2>

            <section class="container-food">

                <picture class="container-food-img">
                    <img src="../assets/img/recipes_images/6662806e85b95.jpg"" alt="" class="food">
                    <div class="content-flex">
                        <p>ricky</p>
                        <p>07/06/2024</p>
                        <p>Almoço</p>
                    </div>
                    <div class="recipe_card.php">
                        <h3>Arroz Com Linguiça</h3>
                    </div>
                    <div>
                        <p class="content-p"> Uma boa receita de lasanha para um final de semana em família.</p>
                        <a href="recipe_card.php" class="acess">
                            <button class="btn-acess">Veja a receita completa</button>
                        </a>
                    </div>
                </picture>


                <picture class="container-food-img">

                    <img src="../assets/img/recipes_images/6662806e85b95.jpg" alt="" class="food">
                    <div class="content-flex">
                        <p>ricky</p>
                        <p>07/06/2024</p>
                        <p>Almoço</p>
                    </div>
                    <div class="recipe_card.php">
                        <h3>Arroz Com Linguiça</h3>
                    </div>
                    <div>
                        <p class="content-p"> Uma boa receita de lasanha para um final de semana em família.</p>
                        <a href="recipe_card.php" class="acess">
                            <button class="btn-acess">Veja a receita completa</button>
                        </a>
                    </div>
                </picture>


                <picture class="container-food-img">
                    <img src="../assets/img/recipes_images/6662806e85b95.jpg"" alt="" class="food">
                    <div class="content-flex">
                        <p>ricky</p>
                        <p>07/06/2024</p>
                        <p>Almoço</p>
                    </div>
                    <div class="recipe_card.php">
                        <h3>Arroz Com Linguiça</h3>
                    </div>
                    <div>
                        <p class="content-p"> Uma boa receita de lasanha para um final de semana em família.</p>
                        <a href="recipe_card.php" class="acess">
                            <button class="btn-acess">Veja a receita completa</button>
                        </a>
                    </div>
                </picture>

                <picture class="container-food-img">
                    <img src="../assets/img/recipes/pexels-fariphotography-803963.jpg" alt="" class="food">
                    <div class="content-flex">
                        <p>ricky</p>
                        <p>07/06/2024</p>
                        <p>Almoço</p>
                    </div>
                    <div class="recipe_card.php">
                        <h3>Arroz Com Linguiça</h3>
                    </div>
                    <div>
                        <p class="content-p"> Uma boa receita de lasanha para um final de semana em família.</p>
                        <a href="recipe_card.php" class="acess">
                            <button class="btn-acess">Veja a receita completa</button>
                        </a>
                    </div>
                </picture>
            </section>
        </div>
    </main>

    <?php require_once 'footer.html';?>

    <script src="../assets/js/backgroundNone.js"></script>
</body>

</html>
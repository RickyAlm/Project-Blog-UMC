<?php

// ! NÃO EXCLUIR ESTE ARQUIVO !
// ! O COPIE E ALTERE AS INFORMAÇÕES !
// ! USE O NOME "connection.php" !
$hostname = 'change-me';
$username = 'change-me';
$password = 'change-me';
$database = 'umc_recipesblog';

$connection = new mysqli($hostname, $username, $password, $database);

if($connection -> connect_error){
    die("Connection Error: " . $connection -> connect_error);
}

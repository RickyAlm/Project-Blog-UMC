<?php


// Define o máximo de páginas que deverão aparecer antes e depois da página atual.
$max_links = 2;

if(!isset($_GET['filter-is-staff'])) {
    $is_staff = 3;
}
else {
    $if_staff = $_GET['filter-is-staff'];
}

if(!isset($_GET['q'])) {
    $q = '';
}
else {
    $q = $_GET['q'];
}

// Se o usuário estiver em uma página maior que a primeira, insere um botão para
// ir automaticamente a ela.
if ($current_page > 1) {
    echo (
        "<li class='page-item'>
        <a class='page-link' href='?page=1&q=" . $q . "&filter-is-staff=" . $is_staff . "'>Primeira</a>
        </li>"
    );
}

// Insere páginas antes da página atual do usuário (conforme o $max_links).
for($previous_page = $current_page - $max_links; $previous_page <= $current_page - 1; $previous_page++) {
    if($previous_page >= 1) {
        echo(
            "<li class='page-item'>
                <a class='page-link' href='?page=" . $previous_page . "&q=" . $q . "&filter-is-staff=" . $is_staff ."'>$previous_page</a>
            </li>"
        );
    }
}


// Insere a página atual do usuário.
echo(
    "<li class='page-item active'>
        <a class='page-link' href='?page=" . $current_page . "&q=" . $q . "&filter-is-staff=" . $is_staff ."'>$current_page</a>
    </li>"
);

// Insere páginas após a página atual do usuário (conforme o $max_links).
for($next_page = $current_page + 1; $next_page <= $current_page + $max_links; $next_page++) {
    if($next_page <= $total_pages){
        echo(
            "<li class='page-item'>
                <a class='page-link' href='?page=" . $next_page . "&q=" . $q . "&filter-is-staff=" . $is_staff ."'>$next_page</a>
            </li>"
        );
    }
}

// Se o usuário estiver em uma página menor que a última, insere um botão para
// ir automaticamente a ela.
if ($current_page < $total_pages) {
    echo (
        "<li class='page-item'>
        <a class='page-link' href='?page=" . $total_pages . "&q=" . $q . "&filter-is-staff=" . $is_staff . "'>Última</a>
        </li>"
    );
}

<?php
// Indica a quantidade de itens que deve aparecer na página.
$per_page = 5;
// Armazena a página atual do usuário.
$current_page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
// Armazena a página inicial.
$start = ($current_page - 1) * $per_page;

// Verifica se existe uma busca do usuário.
if (isset($_GET['q'])) {
    $query = $_GET['q'];
    $is_staff = $_GET['filter-is-staff'];

    if($_GET['filter-is-staff'] != 3) {
        $sql_total = "SELECT COUNT(*) FROM user_ WHERE is_staff = '$is_staff' AND
        (first_name LIKE '%$query%' OR last_name LIKE '%$query%' OR
        username LIKE '%$query%' OR email LIKE '%$query%')";

        $sql = "SELECT * FROM user_ WHERE is_staff = '$is_staff' AND
        (first_name LIKE '%$query%' OR last_name LIKE '%$query%' OR
        username LIKE '%$query%' OR email LIKE '%$query%')
        ORDER BY pk_user DESC LIMIT $start, $per_page";
    }
    else {
        $sql_total = "SELECT COUNT(*) FROM user_ WHERE
        (first_name LIKE '%$query%' OR last_name LIKE '%$query%' OR
        username LIKE '%$query%' OR email LIKE '%$query%')";

        $sql = "SELECT * FROM user_ WHERE
        (first_name LIKE '%$query%' OR last_name LIKE '%$query%' OR
        username LIKE '%$query%' OR email LIKE '%$query%')
        ORDER BY pk_user DESC LIMIT $start, $per_page";
    }
}
else {
    $sql_total = "SELECT COUNT(*) FROM user_";
    $sql = "SELECT * FROM user_ ORDER BY pk_user DESC LIMIT $start, $per_page";
}

$total_users = $connection->query($sql_total)->fetch_row()[0];
$total_pages = ceil($total_users / $per_page);
$sql_query = $connection->query($sql);

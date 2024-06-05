<?php
    use Blog\models\CheckSession;

    require_once "../assets/php/connection.php";
    require_once '../assets/php/vendor/autoload.php';

    $check_session = new CheckSession;
    $check_session->sessionNotExists();
    $check_session->checkStaff();

    // Indica a quantidade de itens que deve aparecer na página.
    $per_page = 5;
    // Armazena a página atual do usuário.
    $current_page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
    // Armazena a página inicial.
    $start = ($current_page - 1) * $per_page;

    // Armazena o total de registros existentes na tabela `contacts`.
    $sql_total = "SELECT COUNT(*) FROM user_";
    $total_users = $connection->query($sql_total)->fetch_row()[0];

    // Calcula o total de páginas, conforme a quandidade indicada no $per_page.
    $total_pages = ceil($total_users / $per_page);

    // Realiza a consulta para obter todos os registros da tabela `contacts`.
    $sql = "SELECT * FROM user_ ORDER BY pk_user DESC LIMIT $start, $per_page";
    $sql_query = $connection->query($sql);

    // Verifica se existe algum registro na consulta.
    if($total_users == 0) die("<h2 class='display-5 text-center'>No Users Found</h2>");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Lista Usuários</title>
    <link rel="shortcut icon" href="../assets/img/icons/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/consult_users.css">
    <link rel="stylesheet" href="../assets/css/font-aller.css">
    <link rel="stylesheet" href="../assets/css/pagination.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body class="aller-regular">
<?php require_once 'header.html';?>

    <div class="responsive-table">
        <table>
            <h2 class="table-title aller-bold">LISTA DE USUÁRIOS</h2>
            <thead class="aller-regular">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>E-mail</th>
                    <th>Permissões</th>
                    <th>Excluir</th>
                </tr>
            </thead>

            <tbody class="aller-regular">
                <?php
                    // Cria linhas na table para cada valor encontrado na consulta.
                    foreach ($sql_query as $row) {
                        $pk_user = $row['pk_user'];
                        // Consulta o valor atual da permissão do usuário, e se
                        // ele for admin, define o select dele como staff.
                        $query_permission = "SELECT is_staff FROM user_ WHERE pk_user = '$pk_user'";
                        $get_permission = ($connection->query($query_permission)->fetch_row()[0] == 2) ? 'selected' : '';

                        echo (
                            "<tr>
                                <td>" . $row['pk_user'] . "</td>
                                <td>" . $row['first_name'] . "</td>
                                <td>" . $row['last_name'] . "</td>
                                <td>" . $row['username'] . "</td>
                                <td>" . $row['email'] . "</td>

                                <td>
                                    <select name='permission' id='pk-permission" . $row['pk_user'] . "'>
                                        <option value='1'>Usuário</option>
                                        <option value='2'" . $get_permission . ">Staff</option>
                                    </select>
                                </td>

                                <td><button class='delete-user pk-delete" . $row['pk_user'] . "' type='button'>
                                    <span class='text'>Deletar</span>
                                    <span class='icon'>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'>
                                            <path
                                                d='M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z'>
                                            </path>
                                        </svg>
                                    </span>
                                </button></td>
                            </tr>"
                        );
                    }
                ?>
            </tbody>
        </table>

        <nav class="nav-style aller-regular" aria-label="...">
            <ul class="pagination">
                <?php require_once '../assets/php/pagination.php'; ?>
            </ul>
        </nav>
    </div>
</body>

<script src="../assets/js/deleteAndSelectSystem.js"></script>

</html>
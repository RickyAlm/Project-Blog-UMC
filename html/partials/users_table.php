<table>
<h2 class="table-title aller-bold">LISTA DE USUÁRIOS</h2>
<thead class="aller-regular">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Sobrenome</th>
        <th>Username</th>
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
        <?php
            require_once '../assets/php/pagination.php';
        ?>
    </ul>
</nav>
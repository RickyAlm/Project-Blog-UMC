(() => {
  // Armazena o botão de deletar usuário e o select de permissões.
  const buttonDeletes = document.querySelectorAll('.delete-user');
  const selectPermissions = document.getElementsByName('permission');

  // ForEach para iterar sobre todos os botões de Delete de cada usuário.
  buttonDeletes.forEach((buttonDelete) => {
    buttonDelete.addEventListener('dblclick', (event) => {
      // Armazena a classe que contém o ID do usuário.
      const classId = event.target.parentNode.classList[1];

      // Requisição AJAX para deletar o usuário.
      const xhr = new XMLHttpRequest();
      xhr.open('POST', '../assets/php/delete_user.php');
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.send(`delete=${encodeURIComponent(classId)}`);
      xhr.onload = () => {
        if (xhr.status === 200) {
            window.location.reload();
        }
      }
    })
  })

  // ForEach para iterar sobre todos os selects incluídos em cada usuário.
  selectPermissions.forEach((selectPermission) => {
  // Executa se o valor do select for alterado.
  selectPermission.addEventListener('change', (event) => {
      // Armazena novo valor do select.
      const newPermission = parseInt(event.target.value);
      // Armazena o ID do select que contém o ID do usuario.
      const idSelect = selectPermission.id;

      // Requisição AJAX para atualizar a permissão do usuário.
      const xhr = new XMLHttpRequest();
      xhr.open('POST', '../assets/php/update_permission.php');
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.send(`userId=${encodeURIComponent(idSelect)}&newPermission=${encodeURIComponent(newPermission)}`);
      xhr.onload = () => {
        if (xhr.status === 200) {
            window.location.reload();
        }
      }
    })
  })
})();
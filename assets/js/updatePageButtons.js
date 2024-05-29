(() => {
  // Variáveis relacionadas ao botão de log out.
  const logOutButton = document.querySelector('.btn-logout');
  const logOutText = document.querySelector('.text');
  // Variáveis relacionadas ao botçai de delete.
  const deleteButton = document.querySelector('.btn-delete');
  const deleteText = document.querySelector('.text-delete');

  // Eventos do botão de log out.
  logOutButton.addEventListener('click', () => {
    if(logOutButton.innerText === 'Sair') {
      logOutText.innerText = 'Certeza?';
    }
    else if(logOutButton.innerText === 'Certeza?') {
      window.location.replace("../assets/php/logout.php");
    }

    logOutButton.addEventListener('mouseleave', () => {
      logOutText.innerText = 'Sair';
    })
  })

  // Eventos do botão de delete.
  deleteButton.addEventListener('click', () => {
    if(deleteButton.innerText === 'Excluir') {
      deleteText.innerText = 'Certeza?';
    } 
    else if(deleteButton.innerText === 'Certeza?') {
      deleteText.innerText = 'Mesmo?';
    }
    else if(deleteButton.innerText === 'Mesmo?') {
      window.location.replace("../assets/php/delete.php");
    }

    deleteButton.addEventListener('mouseleave', () => {
      deleteText.innerText = 'Excluir';
    })
  })
})();
import { checkUsername, checkPassword } from './functionsFormDatas.js';

(() => {
  const loginForm = document.querySelector('.form');

  loginForm.addEventListener('submit', async (event) => {
    event.preventDefault();

    // Tenta obter os valores retornados como JSON pelo PHP e retorna erros para
    // o usuário (se existir). Se não conter erros, o login é concluído.
    try {
      const response = await fetch('../assets/php/login.php', {
        method: 'POST',
        body: new FormData(loginForm),
      });

      // Armazena os valores retornados como JSON pelo PHP.
      const datas = await response.json();
      // Checa o valor retornado do JSON e retorna o erro de determinado dado
      // que esteja incorreto (se existir erro).
      const user = checkUsername(datas, 'login');
      const pass = checkPassword(datas);

      // Se o nome de usuário e senhas estiverem corretos, redireciona o usuário
      // para a home, já logado.
      if(user === true && pass === true) {
        window.location = 'http://localhost/ProjectRecipesBlog/Project-Blog-UMC/html/index.php';
      }
    } catch(e) {
      console.log(e);
    }
  })
})();

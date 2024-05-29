import {
  checkFirstName, checkLastName, checkUsername,
  checkEmail, checkPassword
} from './functionsFormDatas.js';

(() => {
  const registerForm = document.querySelector('.form');

  registerForm.addEventListener('submit', async (event) => {
    event.preventDefault();

    // Tenta obter os valores retornados como JSON pelo PHP e retorna erros para
    // o usuário (se existir). Se não conter erros, o registro é concluído.
    try {
      const response = await fetch('../assets/php/update.php', {
        method: 'POST',
        body: new FormData(registerForm),
      });

      // Armazena os valores retornados como JSON pelo PHP.
      const datas = await response.json();
      // Checa o valor retornado do JSON e retorna o erro de determinado dado
      // que esteja incorreto (se existir erro).
      const f_name = checkFirstName(datas);
      const l_name = checkLastName(datas);
      const user = checkUsername(datas, 'register');
      const email = checkEmail(datas);
      // const pass = checkPassword(datas);

      // Se todos os dados estiverem corretos, redireciona o usuário para a
      // página de update (com seus dados já atualizados).
      if(
        datas.is_valid === true &&
        f_name === true &&
        l_name === true &&
        user === true &&
        // pass === true &&
        email === true
      ) {
        location.reload();
      }
    } catch(e) {
      console.log(e);
    }
  })
})();
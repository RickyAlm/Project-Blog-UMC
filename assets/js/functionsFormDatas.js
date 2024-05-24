/*
Funções responsáveis por mostrar alertas de erro conforme o valor recebido
na variável $is_valid, vinda do PHP.
*/

// Adiciona classe de erro e define o display para block.
function addClassAndDisplay(input, error) {
  input.classList.add('error');
  error.style.display = 'block';
  return false;
}

// Remove classe de erro e define o display para none.
function removeClassAndDisplay(input, error) {
  input.classList.remove('error');
  error.style.display = 'none';
  return true;
}

// Insere ou remove a classe de erro e altera o display,
// caso o nome esteja incorreto.
export function checkFirstName(data) {
  const firstNameInput = document.getElementsByName('first-name')[0];
  const firstNameErrorText = document.querySelector('.first-name-dn');

  if(data.is_valid === 'first_name') {
    return addClassAndDisplay(firstNameInput, firstNameErrorText);
  } else {
    return removeClassAndDisplay(firstNameInput, firstNameErrorText);
  }
}

// Insere ou remove a classe de erro e altera o display,
// caso o sobrenome esteja incorreto.
export function checkLastName(data) {
  const lastNameInput = document.getElementsByName('last-name')[0];
  const lastNameErrorText = document.querySelector('.last-name-dn');

  if(data.is_valid === 'last_name') {
    return addClassAndDisplay(lastNameInput, lastNameErrorText);
  } else {
    return removeClassAndDisplay(lastNameInput, lastNameErrorText);
  }
}

// Insere ou remove a classe de erro e altera o display
// caso o nome de usuário esteja incorreto.
export function checkUsername(data, login_or_register) {
  const usernameInput = document.getElementsByName('username')[0];
  const usernameErrorText = document.querySelector('.username-dn');

  if(data.is_valid === 'username' && login_or_register === 'login') {
    usernameErrorText.innerText = 'Usuário inválido';
    return addClassAndDisplay(usernameInput, usernameErrorText);
  }
  else if(data.is_valid === 'username' && login_or_register === 'register') {
    usernameErrorText.innerText = 'Use apenas letras, números e _';
    return addClassAndDisplay(usernameInput, usernameErrorText);
  }
  else if(data.is_valid === 'username_exists') {
    usernameErrorText.innerText = 'Nome de usuário já existe';
    return addClassAndDisplay(usernameInput, usernameErrorText);
  }
  else {
    return removeClassAndDisplay(usernameInput, usernameErrorText);
  }
}

// Insere ou remove a classe de erro e altera o display,
// caso o e-mail esteja incorreto.
export function checkEmail(data) {
  const emailInput = document.getElementsByName('email')[0];
  const emailErrorText = document.querySelector('.email-dn');

  if(data.is_valid === 'email') {
    emailErrorText.innerText = 'Insira um e-mail válido'
    return addClassAndDisplay(emailInput, emailErrorText);
  }
  else if(data.is_valid === 'email_exists') {
    emailErrorText.innerText = 'E-mail já registrado'
    return addClassAndDisplay(emailInput, emailErrorText);
  }
  else {
    return removeClassAndDisplay(emailInput, emailErrorText);
  }
}

// Insere ou remove a classe de erro e altera o display,
// caso a senha esteja incorreta.
export function checkPassword(data) {
  const passwordInput = document.getElementsByName('password')[0];
  const passwordErrorText = document.querySelector('.password-dn');

  if(data.is_valid === 'password') {
    return addClassAndDisplay(passwordInput, passwordErrorText);
  } else {
    return removeClassAndDisplay(passwordInput, passwordErrorText);
  }
}

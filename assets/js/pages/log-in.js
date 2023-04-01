const username = document.getElementById('username');
const usernameDiv = document.getElementById('usernameDiv');
const password = document.getElementById('password');
const passwordDiv = document.getElementById('passwordDiv');
const forgotPassword = document.getElementById('forgot-pass');
const loginBtn = document.getElementById('login-btn');
/* const textUsername = document.createElement(p).innerHTML('Ingrese un nombre de usuario');
textUsername.classList.add()
const textPassword = document.createElement(p);
 */

//Agrega la clase 'is-invalid' al username si el valor es vacio cuando pierde el foco
username.addEventListener('blur', () => {
  if (username.value === '') {
    username.classList.add('is-invalid');
  } else {
    username.classList.remove('is-invalid');
  }
});

//Agrega un texto debajo solo una vez del username si el valor es vacío cuando pierde el foco
username.addEventListener('blur', () => {
  if (username.value === '') {
    if (document.getElementById('text-username') === null) {
      const textUsername = document.createElement('p');
      textUsername.innerHTML = 'Ingrese un nombre de usuario';
      textUsername.classList.add('text-danger', 'text-sm', 'mt-1', 'mb-4');
      textUsername.id = 'text-username';
      usernameDiv.classList.remove('mb-4');
      usernameDiv.after(textUsername);
    }
  } else {
    if (document.getElementById('text-username') !== null) {
      document.getElementById('text-username').remove();
      usernameDiv.classList.add('mb-4');
    }
  }
});


//Agrega la clase 'is-invalid' al password si el valor es vacio cuando pierde el foco
password.addEventListener('blur', () => {
  if (password.value === '') {
    password.classList.add('is-invalid');
  } else {
    password.classList.remove('is-invalid');
  }
});

//Agrega un texto debajo solo una vez del password si el valor es vacío cuando pierde el foco
password.addEventListener('blur', () => {
  if (password.value === '') {
    if (document.getElementById('text-password') === null) {
      const textPassword = document.createElement('p');
      textPassword.innerHTML = 'Ingrese una contraseña';
      textPassword.classList.add('text-danger', 'text-sm', 'mt-1', 'mb-4');
      textPassword.id = 'text-password';
      passwordDiv.classList.remove('mb-4');
      passwordDiv.after(textPassword);
    }
  } else {
    if (document.getElementById('text-password') !== null) {
      document.getElementById('text-password').remove();
      passwordDiv.classList.add('mb-4');
    }
  }
});

//Manda a llamar un sweet alert con un input de tipo 'email' para recuperar la contraseña
forgotPassword.addEventListener('click', () => {
  Swal.fire({
    icon: 'info',
    title: 'Ingrese el correo de su cuenta para recuperar la contraseña',
    input: 'email',
    inputPlaceholder: 'Ingrese su correo',
    showCancelButton: true,
    cancelButtonText: 'Cancelar',
    focusConfirm: false,
    confirmButtonText: 'Enviar'
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      Swal.fire('Se ha notificado al administrador', '', 'success')
    }
  })
});

//Código para no ejecutar el botón de 'Iniciar sesión' hasta que los campos estén llenos, sino lleva el focus al primer campo vacío
loginBtn.addEventListener('click', (e) => {
  if (username.value === '') {
    e.preventDefault();
    username.classList.add('is-invalid');
    if (document.getElementById('text-username') === null) {
      const textUsername = document.createElement('p');
      textUsername.innerHTML = 'Ingrese un nombre de usuario';
      textUsername.classList.add('text-danger', 'text-sm', 'mt-1', 'mb-4');
      textUsername.id = 'text-username';
      usernameDiv.classList.remove('mb-4');
      usernameDiv.after(textUsername);
    }
    username.focus();
  } else if (password.value === '') {
    e.preventDefault();
    password.classList.add('is-invalid');
    if (document.getElementById('text-password') === null) {
      const textPassword = document.createElement('p');
      textPassword.innerHTML = 'Ingrese una contraseña';
      textPassword.classList.add('text-danger', 'text-sm', 'mt-1', 'mb-4');
      textPassword.id = 'text-password';
      passwordDiv.classList.remove('mb-4');
      passwordDiv.after(textPassword);
    }
    password.focus();
  }
});


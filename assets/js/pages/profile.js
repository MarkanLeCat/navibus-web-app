const firstname = document.getElementById('first_name');
const lastname = document.getElementById('last_name');
const phone = document.getElementById('phone');
const firstnameDiv = document.getElementById('firstnameDiv');
const lastnameDiv = document.getElementById('lastnameDiv');
const phoneDiv = document.getElementById('phoneDiv');
const saveBasics = document.getElementById('save-basics');

//Agrega la clase 'is-invalid' al name si el valor es vacio cuando pierde el foco
firstname.addEventListener('blur', () => {
  if (firstname.value === '') {
    firstname.classList.add('is-invalid');
  } else {
    firstname.classList.remove('is-invalid');
  }
});

//Agrega un texto debajo solo una vez del firstname si el valor es vacío cuando pierde el foco
firstname.addEventListener('blur', () => {
  if (firstname.value === '') {
    if (document.getElementById('text-firstname') === null) {
      const textFirstname = document.createElement('p');
      textFirstname.innerHTML = 'Ingrese su nombre';
      textFirstname.classList.add('text-danger', 'text-sm', 'mt-1');
      textFirstname.id = 'text-firstname';
      firstnameDiv.after(textFirstname);
    }
  } else {
    if (document.getElementById('text-firstname') !== null) {
      document.getElementById('text-firstname').remove();
    }
  }
});

//Agrega la clase 'is-invalid' al lastname si el valor es vacio cuando pierde el foco
lastname.addEventListener('blur', () => {
  if (lastname.value === '') {
    lastname.classList.add('is-invalid');
  } else {
    lastname.classList.remove('is-invalid');
  }
});

//Agrega un texto debajo solo una vez del lastname si el valor es vacío cuando pierde el foco
lastname.addEventListener('blur', () => {
  if (lastname.value === '') {
    if (document.getElementById('text-lastname') === null) {
      const textLastname = document.createElement('p');
      textLastname.innerHTML = 'Ingrese su apellido';
      textLastname.classList.add('text-danger', 'text-sm', 'mt-1');
      textLastname.id = 'text-lastname';
      lastnameDiv.after(textLastname);
    }
  } else {
    if (document.getElementById('text-lastname') !== null) {
      document.getElementById('text-lastname').remove();
    }
  }
});

//Agrega la clase 'is-invalid' al phone si el valor es vacio cuando pierde el foco
phone.addEventListener('blur', () => {
  if (phone.value === '') {
    phone.classList.add('is-invalid');
  } else {
    phone.classList.remove('is-invalid');
  }
});

//Agrega un texto debajo solo una vez del phone si el valor es vacío cuando pierde el foco
phone.addEventListener('blur', () => {
  if (phone.value === '') {
    if (document.getElementById('text-phone') === null) {
      const textPhone = document.createElement('p');
      textPhone.innerHTML = 'Ingrese su teléfono';
      textPhone.classList.add('text-danger', 'text-sm', 'mt-1');
      textPhone.id = 'text-phone';
      phoneDiv.after(textPhone);
    }
  } else {
    if (document.getElementById('text-phone') !== null) {
      document.getElementById('text-phone').remove();
    }
  }
});

//Código para no ejecutar el botón de 'Guardar cambios' hasta que los campos estén llenos, sino lleva el focus al primer campo vacío
saveBasics.addEventListener('click', (e) => {
  if (firstname.value === '') {
    e.preventDefault();
    firstname.classList.add('is-invalid');
    if (document.getElementById('text-firstname') === null) {
      const textFirstname = document.createElement('p');
      textFirstname.innerHTML = 'Ingrese su nombre';
      textFirstname.classList.add('text-danger', 'text-sm', 'mt-1');
      textFirstname.id = 'text-firstname';
      firstnameDiv.after(textFirstname);
    }
    firstname.focus();
  } else if (lastname.value === '') {
    e.preventDefault();
    lastname.classList.add('is-invalid');
    if (document.getElementById('text-lastname') === null) {
      const textLastname = document.createElement('p');
      textLastname.innerHTML = 'Ingrese su apellido';
      textLastname.classList.add('text-danger', 'text-sm', 'mt-1');
      textLastname.id = 'text-lastname';
      lastnameDiv.after(textLastname);
    }
    lastname.focus();
  } else if (phone.value === '') {
    e.preventDefault();
    phone.classList.add('is-invalid');
    if (document.getElementById('text-phone') === null) {
      const textPhone = document.createElement('p');
      textPhone.innerHTML = 'Ingrese su teléfono';
      textPhone.classList.add('text-danger', 'text-sm', 'mt-1');
      textPhone.id = 'text-phone';
      phoneDiv.after(textPhone);
    }
    phone.focus();
  }
});

const currentPassword = document.getElementById('current-password');
const newPassword = document.getElementById('new-password');
const confirmPassword = document.getElementById('confirm-password');
const currentPasswordDiv = document.getElementById('current-password-div');
const newPasswordDiv = document.getElementById('new-password-div');
const confirmPasswordDiv = document.getElementById('confirm-password-div');
const savePassword = document.getElementById('save-password');

//Agrega la clase 'is-invalid' al currentPassword si el valor es vacio cuando pierde el foco
currentPassword.addEventListener('blur', () => {
  if (currentPassword.value === '') {
    currentPassword.classList.add('is-invalid');
  } else {
    currentPassword.classList.remove('is-invalid');
  }
});

//Agrega un texto debajo solo una vez del currentPassword si el valor es vacío cuando pierde el foco
currentPassword.addEventListener('blur', () => {
  if (currentPassword.value === '') {
    if (document.getElementById('text-current-password') === null) {
      const textCurrentPassword = document.createElement('p');
      textCurrentPassword.innerHTML = 'Ingrese su contraseña actual';
      textCurrentPassword.classList.add('text-danger', 'text-sm', 'mt-1');
      textCurrentPassword.id = 'text-current-password';
      currentPasswordDiv.after(textCurrentPassword);
    }
  } else {
    if (document.getElementById('text-current-password') !== null) {
      document.getElementById('text-current-password').remove();
    }
  }
});

//Agrega la clase 'is-invalid' al newPassword si el valor no posee por lo menos 8 caracteres, 1 mayúscula, 1 minúscula, 1 número y 1 caracter especial cuando pierde el foco
newPassword.addEventListener('blur', () => {
  if (validatePassword(newPassword)){
    newPassword.classList.add('is-valid');
    newPassword.classList.remove('is-invalid');
  } else {
    newPassword.classList.add('is-invalid');
    newPassword.classList.remove('is-valid');
  }
});

//Agrega un texto debajo solo una vez del newPassword si el valor es vacío cuando pierde el foco
newPassword.addEventListener('blur', () => {
  if (validatePassword(newPassword) === false) {
    if (document.getElementById('text-new-password') === null) {
      const textNewPassword = document.createElement('p');
      textNewPassword.innerHTML = 'La contraseña debe tener por lo menos 8 caracteres, 1 mayúscula, 1 minúscula, 1 número y 1 caracter especial';
      textNewPassword.classList.add('text-danger', 'text-sm', 'mt-1');
      textNewPassword.id = 'text-new-password';
      newPasswordDiv.after(textNewPassword);
    } 
  } else {
    if (document.getElementById('text-new-password') !== null) {
      document.getElementById('text-new-password').remove();
    }
  }
});

//Agrega la clase 'is-invalid' al confirmPassword si el valor es vacio cuando pierde el foco
confirmPassword.addEventListener('blur', () => {
  if (confirmPassword.value === '' || confirmPassword.value !== newPassword.value) {
    confirmPassword.classList.add('is-invalid');
    confirmPassword.classList.remove('is-valid');
  } else {
    confirmPassword.classList.add('is-valid');
    confirmPassword.classList.remove('is-invalid');
  }
});

//Agrega un texto debajo solo una vez del confirmPassword si el valor es vacío cuando pierde el foco
confirmPassword.addEventListener('blur', () => {
  if (confirmPassword.value === '' || confirmPassword.value !== newPassword.value) {
    if (document.getElementById('text-confirm-password') === null) {
      const textConfirmPassword = document.createElement('p');
      textConfirmPassword.innerHTML = 'Las contraseñas no coinciden';
      textConfirmPassword.classList.add('text-danger', 'text-sm', 'mt-1');
      textConfirmPassword.id = 'text-confirm-password';
      confirmPasswordDiv.after(textConfirmPassword);
    }
  } else {
    if (document.getElementById('text-confirm-password') !== null) {
      document.getElementById('text-confirm-password').remove();
    }
  }
});

//Código para no ejecutar el botón de 'Guardar cambios' hasta que los campos estén llenos, sino lleva el focus al primer campo vacío
savePassword.addEventListener('click', (e) => {
  if (currentPassword.value === '') {
    e.preventDefault();
    currentPassword.classList.add('is-invalid');
    if (document.getElementById('text-current-password') === null) {
      const textCurrentPassword = document.createElement('p');
      textCurrentPassword.innerHTML = 'Ingrese su contraseña actual';
      textCurrentPassword.classList.add('text-danger', 'text-sm', 'mt-1');
      textCurrentPassword.id = 'text-current-password';
      currentPasswordDiv.after(textCurrentPassword);
    }
    currentPassword.focus();
  } else if (!validatePassword(newPassword)) {
    e.preventDefault();
    newPassword.classList.add('is-invalid');
    newPassword.classList.remove('is-valid');
    if (document.getElementById('text-new-password') === null) {
      const textNewPassword = document.createElement('p');
      textNewPassword.innerHTML = 'La contraseña debe tener por lo menos 8 caracteres, 1 mayúscula, 1 minúscula, 1 número y 1 caracter especial';
      textNewPassword.classList.add('text-danger', 'text-sm', 'mt-1');
      textNewPassword.id = 'text-new-password';
      newPasswordDiv.after(textNewPassword);
    }
    newPassword.focus();
  } else if (confirmPassword.value === '' || confirmPassword.value !== newPassword.value) {
    e.preventDefault();
    confirmPassword.classList.add('is-invalid');
    confirmPassword.classList.remove('is-valid');
    if (document.getElementById('text-confirm-password') === null) {
      const textConfirmPassword = document.createElement('p');
      textConfirmPassword.innerHTML = 'Las contraseñas no coinciden';
      textConfirmPassword.classList.add('text-danger', 'text-sm', 'mt-1');
      textConfirmPassword.id = 'text-confirm-password';
      confirmPasswordDiv.after(textConfirmPassword);
    }
    confirmPassword.focus();
  }
});

function validatePassword(password) {
  if (password.value !== '') {
    if (password.value.length < 8) {
      return false;
    } else if (password.value.search(/[A-Z]/) === -1) {
      return false;
    } else if (password.value.search(/[a-z]/) === -1) {
      return false;
    } else if (password.value.search(/[0-9]/) === -1) {
      return false;
    } else if (password.value.search(/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/) === -1) {
      return false;
    } else {
      return true;
    }
  } else {
    return false;
  }
}
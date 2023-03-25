const lapseName = document.getElementById('lapseName');
const lapseNameDiv = document.getElementById('lapseNameDiv');
const lapseCategory = document.getElementById('lapseCategory');
const lapseCategoryDiv = document.getElementById('lapseCategoryDiv');
const lapseInitialDate = document.getElementById('lapseInitialDate');
const lapseInitialDateDiv = document.getElementById('lapseInitialDateDiv');
const lapseEndDate = document.getElementById('lapseEndDate');
const createLapseBtn = document.getElementById('create-lapse');

//Agrega la clase 'is-invalid' al lapseName si el valor es vacio cuando pierde el foco
lapseName.addEventListener('blur', () => {
  if (lapseName.value === '') {
    lapseName.classList.add('is-invalid');
  } else {
    lapseName.classList.remove('is-invalid');
  }
});

//Agrega un texto debajo solo una vez del lapseName si el valor es vacío cuando pierde el foco
lapseName.addEventListener('blur', () => {
  if (lapseName.value === '') {
    if (document.getElementById('text-lapseName') === null) {
      const textlapseName = document.createElement('p');
      textlapseName.innerHTML = 'Ingrese un nombre de usuario';
      textlapseName.classList.add('text-danger', 'text-sm', 'mt-1', 'mb-3');
      textlapseName.id = 'text-lapseName';
      lapseNameDiv.classList.remove('mb-3');
      lapseNameDiv.after(textlapseName);
    }
  } else {
    if (document.getElementById('text-lapseName').innerHTML !== null) {
      document.getElementById('text-lapseName').remove();
      lapseNameDiv.classList.add('mb-3');
    }
  }
});

//Agrega la clase 'is-invalid' y un texto una sola vez al lapseName si el valor es mayor a 50 caractéres
lapseName.addEventListener('blur', () => {
  if (lapseName.value.length > 50) {
    if (document.getElementById('text-lapseName') === null) {
      const textlapseName = document.createElement('p');
      textlapseName.innerHTML = 'El nombre del lapso no puede ser mayor a 50 caractéres';
      textlapseName.classList.add('text-danger', 'text-sm', 'mt-1', 'mb-3');
      textlapseName.id = 'text-lapseName';
      lapseNameDiv.classList.remove('mb-3');
      lapseNameDiv.after(textlapseName);
    } else if (document.getElementById('text-lapseName').innerHTML !== 'El nombre del lapso no puede ser mayor a 50 caractéres') {
      document.getElementById('text-lapseName').innerHTML = 'El nombre del lapso no puede ser mayor a 50 caractéres';
    }
    lapseName.classList.add('is-invalid');
  } else {
    if (document.getElementById('text-lapseName') !== null && document.getElementById('text-lapseName').innerHTML === 'El nombre del lapso no puede ser mayor a 50 caractéres') {
      document.getElementById('text-lapseName').remove();
      lapseNameDiv.classList.add('mb-3');
      lapseName.classList.remove('is-invalid');
    }
  }
});

//Agrega la clase 'is-invalid' al lapseCategory si el valor es vacio cuando se seleccione una opción
lapseCategory.addEventListener('change', () => {
  if (lapseCategory.value === '') {
    lapseInitialDate.disabled = true;
    lapseCategory.classList.add('is-invalid');
  } else {
    lapseInitialDate.disabled = false;
    lapseCategory.classList.remove('is-invalid');
    setLapseFinalDate();
  }
});

//Agrega la clase 'is-invalid' al lapseCategory si el valor es vacio cuando pierde el foco
lapseCategory.addEventListener('blur', () => {
  if (lapseCategory.value === '') {
    lapseCategory.classList.add('is-invalid');
  } else {
    lapseCategory.classList.remove('is-invalid');
  }
});

//Agrega un texto debajo solo una vez del lapseCategory si el valor es vacío cuando pierde el foco
lapseCategory.addEventListener('blur', () => {
  if (lapseCategory.value === '') {
    if (document.getElementById('text-lapseCategory') === null) {
      const textlapseCategory = document.createElement('p');
      textlapseCategory.innerHTML = 'Seleccione una categoría';
      textlapseCategory.classList.add('text-danger', 'text-sm', 'mt-1', 'mb-3');
      textlapseCategory.id = 'text-lapseCategory';
      lapseCategoryDiv.classList.remove('mb-3');
      lapseCategoryDiv.after(textlapseCategory);
    }
  } else {
    if (document.getElementById('text-lapseCategory') !== null) {
      document.getElementById('text-lapseCategory').remove();
      lapseCategoryDiv.classList.add('mb-3');
    }
  }
});

//Agrega un texto debajo solo una vez del lapseCategory si el valor es vacío cuando se seleccione una opción
lapseCategory.addEventListener('change', () => {
  if (lapseCategory.value === '') {
    if (document.getElementById('text-lapseCategory') === null) {
      const textlapseCategory = document.createElement('p');
      textlapseCategory.innerHTML = 'Seleccione una categoría';
      textlapseCategory.classList.add('text-danger', 'text-sm', 'mt-1', 'mb-3');
      textlapseCategory.id = 'text-lapseCategory';
      lapseCategoryDiv.classList.remove('mb-3');
      lapseCategoryDiv.after(textlapseCategory);
    }
  } else {
    if (document.getElementById('text-lapseCategory') !== null) {
      document.getElementById('text-lapseCategory').remove();
      lapseCategoryDiv.classList.add('mb-3');
    }
  }
});

//Agrega la clase 'is-invalid' al lapseInitialDate si el valor es vacio cuando pierde el foco
lapseInitialDate.addEventListener('blur', () => {
  if (lapseInitialDate.value === '') {
    lapseInitialDate.classList.add('is-invalid');
  } else {
    lapseInitialDate.classList.remove('is-invalid');
  }
});

//Agrega un texto debajo solo una vez del lapseInitialDate si el valor es vacío cuando pierde el foco
lapseInitialDate.addEventListener('blur', () => {
  if (lapseInitialDate.value === '') {
    if (document.getElementById('text-lapseInitialDate') === null) {
      const textlapseInitialDate = document.createElement('p');
      textlapseInitialDate.innerHTML = 'Ingrese una fecha de inicio';
      textlapseInitialDate.classList.add('text-danger', 'text-sm', 'mt-1', 'mb-3');
      textlapseInitialDate.id = 'text-lapseInitialDate';
      lapseInitialDateDiv.classList.remove('mb-3');
      lapseInitialDateDiv.after(textlapseInitialDate);
    }
  } else {
    if (document.getElementById('text-lapseInitialDate') !== null) {
      document.getElementById('text-lapseInitialDate').remove();
      lapseInitialDateDiv.classList.add('mb-3');
    }
  }
});

//Código para no ejecutar el botón de 'Crear' hasta que los campos estén llenos, sino lleva el focus al primer campo vacío
createLapseBtn.addEventListener('click', (e) => {
  if (lapseName.value === '') {
    e.preventDefault();
    lapseName.classList.add('is-invalid');
    if (document.getElementById('text-lapseName') === null) {
      const textlapseName = document.createElement('p');
      textlapseName.innerHTML = 'Ingrese el nombre del lapso';
      textlapseName.classList.add('text-danger', 'text-sm', 'mt-1', 'mb-3');
      textlapseName.id = 'text-lapseName';
      lapseNameDiv.classList.remove('mb-3');
      lapseNameDiv.after(textlapseName);
    }
    lapseName.focus();
  } else if (lapseName.value.length > 50) {
    e.preventDefault();
    lapseName.classList.add('is-invalid');
    if (document.getElementById('text-lapseName') === null) {
      const textlapseName = document.createElement('p');
      textlapseName.innerHTML = 'El nombre del lapso no puede ser mayor a 50 caracteres';
      textlapseName.classList.add('text-danger', 'text-sm', 'mt-1', 'mb-3');
      textlapseName.id = 'text-lapseName';
      lapseNameDiv.classList.remove('mb-3');
      lapseNameDiv.after(textlapseName);
    }
    lapseName.focus();
  } else if (lapseCategory.value === '') {
    e.preventDefault();
    lapseCategory.classList.add('is-invalid');
    if (document.getElementById('text-lapseCategory') === null) {
      const textlapseCategory = document.createElement('p');
      textlapseCategory.innerHTML = 'Seleccione la categoría del lapso';
      textlapseCategory.classList.add('text-danger', 'text-sm', 'mt-1', 'mb-3');
      textlapseCategory.id = 'text-lapseCategory';
      lapseCategoryDiv.classList.remove('mb-3');
      lapseCategoryDiv.after(textlapseCategory);
    }
    lapseCategory.focus();
  } else if (lapseInitialDate.value === '') {
    e.preventDefault();
    lapseInitialDate.classList.add('is-invalid');
    if (document.getElementById('text-lapseInitialDate') === null) {
      const textlapseInitialDate = document.createElement('p');
      textlapseInitialDate.innerHTML = 'Ingrese la fecha de inicio';
      textlapseInitialDate.classList.add('text-danger', 'text-sm', 'mt-1', 'mb-3');
      textlapseInitialDate.id = 'text-lapseInitialDate';
      lapseInitialDateDiv.classList.remove('mb-3');
      lapseInitialDateDiv.after(textlapseInitialDate);
    }
    lapseInitialDate.focus();
  }
});

//Asginar un valor a lapseEndDate aumentando el valor de la fecha de inicio según la categoría
lapseInitialDate.addEventListener('change', setLapseFinalDate);

function setLapseFinalDate() {
  switch (lapseCategory.value) {
    case '':
      lapseEndDate.value = '';
      break;
    case '2':
      //Se incrementa en una semana la fecha
      if (lapseInitialDate.value !== '') {
        const lapseInitialDateValue = new Date(lapseInitialDate.value);
        const lapseEndDateValue = lapseInitialDateValue.setDate(lapseInitialDateValue.getDate() + 7);
        lapseEndDate.value = new Date(lapseEndDateValue).toISOString().slice(0, 10);
      } else {
        lapseEndDate.value = '';
      }
      break;
    case '3':
      //Se incrementa en un mes
      if (lapseInitialDate.value !== '') {
        const lapseInitialDateValue = new Date(lapseInitialDate.value);
        const lapseEndDateValue = lapseInitialDateValue.setMonth(lapseInitialDateValue.getMonth() + 1);
        lapseEndDate.value = new Date(lapseEndDateValue).toISOString().slice(0, 10);
      } else {
        lapseEndDate.value = '';
      }
      break;
    case '4':
      //Se incrementa en un trimestre
      if (lapseInitialDate.value !== '') {
        const lapseInitialDateValue = new Date(lapseInitialDate.value);
        const lapseEndDateValue = lapseInitialDateValue.setMonth(lapseInitialDateValue.getMonth() + 3);
        lapseEndDate.value = new Date(lapseEndDateValue).toISOString().slice(0, 10);
      } else {
        lapseEndDate.value = '';
      }
      break;
    default:
      lapseEndDate.value = '';
      break;
  }
}

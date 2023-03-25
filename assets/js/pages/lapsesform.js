const lapseName = document.querySelectorAll('.lapseName');
const lapseNameDiv = document.querySelectorAll('.lapseNameDiv');
const lapseCategory = document.querySelectorAll('.lapseCategory');
const lapseCategoryDiv = document.querySelectorAll('.lapseCategoryDiv');
const lapseInitialDate = document.querySelectorAll('.lapseInitialDate');
const lapseInitialDateDiv = document.querySelectorAll('.lapseInitialDateDiv');
const lapseEndDate = document.querySelectorAll('.lapseEndDate');
const createLapseBtn = document.querySelectorAll('.button-lapse');

for(let i = 0; i < lapseName.length; i++) {

  //Agrega la clase 'is-invalid' al lapseName si el valor es vacio cuando pierde el foco
  lapseName[i].addEventListener('blur', () => {
    if (lapseName[i].value === '') {
      lapseName[i].classList.add('is-invalid');
    } else {
      lapseName[i].classList.remove('is-invalid');
    }
  });

  //Agrega un texto debajo solo una vez del lapseName si el valor es vacío cuando pierde el foco
  lapseName[i].addEventListener('blur', () => {
    if (lapseName[i].value === '') {
      if (document.getElementById('text-lapseName') === null) {
        const textlapseName = document.createElement('p');
        textlapseName.innerHTML = 'Ingrese el nombre del lapso';
        textlapseName.classList.add('text-danger', 'text-sm', 'mt-1', 'mb-3');
        textlapseName.id = 'text-lapseName';
        lapseNameDiv[i].classList.remove('mb-3');
        lapseNameDiv[i].after(textlapseName);
      }
    } else {
      if (document.getElementById('text-lapseName').innerHTML !== null) {
        document.getElementById('text-lapseName').remove();
        lapseNameDiv[i].classList.add('mb-3');
      }
    }
  });

  //Agrega la clase 'is-invalid' y un texto una sola vez al lapseName si el valor es mayor a 50 caractéres
  lapseName[i].addEventListener('blur', () => {
    if (lapseName[i].value.length > 50) {
      if (document.getElementById('text-lapseName') === null) {
        const textlapseName = document.createElement('p');
        textlapseName.innerHTML = 'El nombre del lapso no puede ser mayor a 50 caractéres';
        textlapseName.classList.add('text-danger', 'text-sm', 'mt-1', 'mb-3');
        textlapseName.id = 'text-lapseName';
        lapseNameDiv[i].classList.remove('mb-3');
        lapseNameDiv[i].after(textlapseName);
      } else if (document.getElementById('text-lapseName').innerHTML !== 'El nombre del lapso no puede ser mayor a 50 caractéres') {
        document.getElementById('text-lapseName').innerHTML = 'El nombre del lapso no puede ser mayor a 50 caractéres';
      }
      lapseName[i].classList.add('is-invalid');
    } else {
      if (document.getElementById('text-lapseName') !== null && document.getElementById('text-lapseName').innerHTML === 'El nombre del lapso no puede ser mayor a 50 caractéres') {
        document.getElementById('text-lapseName').remove();
        lapseNameDiv[i].classList.add('mb-3');
        lapseName[i].classList.remove('is-invalid');
      }
    }
  });

  //Agrega la clase 'is-invalid' al lapseCategory si el valor es vacio cuando se seleccione una opción
  lapseCategory[i].addEventListener('change', () => {
    if (lapseCategory[i].value === '') {
      lapseInitialDate[i].disabled = true;
      lapseCategory[i].classList.add('is-invalid');
    } else {
      lapseInitialDate[i].disabled = false;
      lapseCategory[i].classList.remove('is-invalid');
      setLapseFinalDate(i);
    }
  });

  //Agrega la clase 'is-invalid' al lapseCategory si el valor es vacio cuando pierde el foco
  lapseCategory[i].addEventListener('blur', () => {
    if (lapseCategory[i].value === '') {
      lapseCategory[i].classList.add('is-invalid');
    } else {
      lapseCategory[i].classList.remove('is-invalid');
    }
  });

  //Agrega un texto debajo solo una vez del lapseCategory si el valor es vacío cuando pierde el foco
  lapseCategory[i].addEventListener('blur', () => {
    if (lapseCategory[i].value === '') {
      if (document.getElementById('text-lapseCategory') === null) {
        const textlapseCategory = document.createElement('p');
        textlapseCategory.innerHTML = 'Seleccione una categoría';
        textlapseCategory.classList.add('text-danger', 'text-sm', 'mt-1', 'mb-3');
        textlapseCategory.id = 'text-lapseCategory';
        lapseCategoryDiv[i].classList.remove('mb-3');
        lapseCategoryDiv[i].after(textlapseCategory);
      }
    } else {
      if (document.getElementById('text-lapseCategory') !== null) {
        document.getElementById('text-lapseCategory').remove();
        lapseCategoryDiv[i].classList.add('mb-3');
      }
    }
  });

  //Agrega un texto debajo solo una vez del lapseCategory si el valor es vacío cuando se seleccione una opción
  lapseCategory[i].addEventListener('change', () => {
    if (lapseCategory[i].value === '') {
      if (document.getElementById('text-lapseCategory') === null) {
        const textlapseCategory = document.createElement('p');
        textlapseCategory.innerHTML = 'Seleccione una categoría';
        textlapseCategory.classList.add('text-danger', 'text-sm', 'mt-1', 'mb-3');
        textlapseCategory.id = 'text-lapseCategory';
        lapseCategoryDiv[i].classList.remove('mb-3');
        lapseCategoryDiv[i].after(textlapseCategory);
      }
    } else {
      if (document.getElementById('text-lapseCategory') !== null) {
        document.getElementById('text-lapseCategory').remove();
        lapseCategoryDiv[i].classList.add('mb-3');
      }
    }
  });

  //Agrega la clase 'is-invalid' al lapseInitialDate si el valor es vacio cuando pierde el foco
  lapseInitialDate[i].addEventListener('blur', () => {
    if (lapseInitialDate[i].value === '') {
      lapseInitialDate[i].classList.add('is-invalid');
    } else {
      lapseInitialDate[i].classList.remove('is-invalid');
    }
  });

  //Agrega un texto debajo solo una vez del lapseInitialDate si el valor es vacío cuando pierde el foco
  lapseInitialDate[i].addEventListener('blur', () => {
    if (lapseInitialDate[i].value === '') {
      if (document.getElementById('text-lapseInitialDate') === null) {
        const textlapseInitialDate = document.createElement('p');
        textlapseInitialDate.innerHTML = 'Ingrese una fecha de inicio';
        textlapseInitialDate.classList.add('text-danger', 'text-sm', 'mt-1', 'mb-3');
        textlapseInitialDate.id = 'text-lapseInitialDate';
        lapseInitialDateDiv[i].classList.remove('mb-3');
        lapseInitialDateDiv[i].after(textlapseInitialDate);
      }
    } else {
      if (document.getElementById('text-lapseInitialDate') !== null) {
        document.getElementById('text-lapseInitialDate').remove();
        lapseInitialDateDiv[i].classList.add('mb-3');
      }
    }
  });

  //Código para no ejecutar el botón de 'Crear' hasta que los campos estén llenos, sino lleva el focus al primer campo vacío
  createLapseBtn[i].addEventListener('click', (e) => {
    if (lapseName[i].value === '') {
      e.preventDefault();
      lapseName[i].classList.add('is-invalid');
      if (document.getElementById('text-lapseName') === null) {
        const textlapseName = document.createElement('p');
        textlapseName.innerHTML = 'Ingrese el nombre del lapso';
        textlapseName.classList.add('text-danger', 'text-sm', 'mt-1', 'mb-3');
        textlapseName.id = 'text-lapseName';
        lapseNameDiv[i].classList.remove('mb-3');
        lapseNameDiv[i].after(textlapseName);
      }
      lapseName[i].focus();
    } else if (lapseName[i].value.length > 50) {
      e.preventDefault();
      lapseName[i].classList.add('is-invalid');
      if (document.getElementById('text-lapseName') === null) {
        const textlapseName = document.createElement('p');
        textlapseName.innerHTML = 'El nombre del lapso no puede ser mayor a 50 caracteres';
        textlapseName.classList.add('text-danger', 'text-sm', 'mt-1', 'mb-3');
        textlapseName.id = 'text-lapseName';
        lapseNameDiv[i].classList.remove('mb-3');
        lapseNameDiv[i].after(textlapseName);
      }
      lapseName[i].focus();
    } else if (lapseCategory[i].value === '') {
      e.preventDefault();
      lapseCategory[i].classList.add('is-invalid');
      if (document.getElementById('text-lapseCategory') === null) {
        const textlapseCategory = document.createElement('p');
        textlapseCategory.innerHTML = 'Seleccione la categoría del lapso';
        textlapseCategory.classList.add('text-danger', 'text-sm', 'mt-1', 'mb-3');
        textlapseCategory.id = 'text-lapseCategory';
        lapseCategoryDiv[i].classList.remove('mb-3');
        lapseCategoryDiv[i].after(textlapseCategory);
      }
      lapseCategory[i].focus();
    } else if (lapseInitialDate[i].value === '') {
      e.preventDefault();
      lapseInitialDate[i].classList.add('is-invalid');
      if (document.getElementById('text-lapseInitialDate') === null) {
        const textlapseInitialDate = document.createElement('p');
        textlapseInitialDate.innerHTML = 'Ingrese la fecha de inicio';
        textlapseInitialDate.classList.add('text-danger', 'text-sm', 'mt-1', 'mb-3');
        textlapseInitialDate.id = 'text-lapseInitialDate';
        lapseInitialDateDiv[i].classList.remove('mb-3');
        lapseInitialDateDiv[i].after(textlapseInitialDate);
      }
      lapseInitialDate[i].focus();
    }
  });

  lapseInitialDate[i].addEventListener('change', () => {
    setLapseFinalDate(i);
  });
  
  //Asginar un valor a lapseEndDate aumentando el valor de la fecha de inicio según la categoría
  function setLapseFinalDate(j) {
    switch (lapseCategory[j].value) {
      case '':
        lapseEndDate[j].value = '';
        break;
      case '2':
        //Se incrementa en una semana la fecha
        if (lapseInitialDate[j].value !== '') {
          const lapseInitialDateValue = new Date(lapseInitialDate[j].value);
          const lapseEndDateValue = lapseInitialDateValue.setDate(lapseInitialDateValue.getDate() + 7);
          lapseEndDate[j].value = new Date(lapseEndDateValue).toISOString().slice(0, 10);
        } else {
          lapseEndDate[j].value = '';
        }
        break;
      case '3':
        //Se incrementa en un mes
        if (lapseInitialDate[j].value !== '') {
          const lapseInitialDateValue = new Date(lapseInitialDate[j].value);
          const lapseEndDateValue = lapseInitialDateValue.setMonth(lapseInitialDateValue.getMonth() + 1);
          lapseEndDate[j].value = new Date(lapseEndDateValue).toISOString().slice(0, 10);
        } else {
          lapseEndDate[j].value = '';
        }
        break;
      case '4':
        //Se incrementa en un trimestre
        if (lapseInitialDate[j].value !== '') {
          const lapseInitialDateValue = new Date(lapseInitialDate[j].value);
          const lapseEndDateValue = lapseInitialDateValue.setMonth(lapseInitialDateValue.getMonth() + 3);
          lapseEndDate[j].value = new Date(lapseEndDateValue).toISOString().slice(0, 10);
        } else {
          lapseEndDate[j].value = '';
        }
        break;
      default:
        lapseEndDate[j].value = '';
        break;
    }
  }
}
// Configuración de los Sortable
new Sortable(porHacer, {
  animation: 150,
  ghostClass: 'blue-background-class',
  group: 'operator-tasks'
});

new Sortable(enCurso, {
  animation: 150,
  ghostClass: 'blue-background-class',
  group: 'operator-tasks'
});

new Sortable(finalizadas, {
  animation: 150,
  ghostClass: 'blue-background-class',
  group: 'operator-tasks'
});

new Sortable(aprobadas, {
  animation: 150,
  ghostClass: 'blue-background-class',
  group: 'operator-tasks'
});

//Evento de tareas por hacer
porHacer.addEventListener('add', function (e) {
  let taskid = parseInt(e.item.dataset.id);
  let newstatus = 1;

  const task = new Array();
  task.push({
    id: taskid,
    status: newstatus
  });

  let formData = new FormData();
  formData.append('task', JSON.stringify(task));

  console.log(JSON.stringify(task));

  axios.post('http://localhost/navibus-web-app/libs/dragndroptasks.php', formData)
    .then(res => {
      console.log(res);
      Toast.fire({
        icon: 'success',
        title: 'La tarea ahora está Por hacer',
        timerProgressBar: false,
        timer: 1000
      });
    })
    .catch(err => {
      console.error(err);
      Toast.fire({
        icon: 'error',
        title: 'Hubo un error al actualizar el status de la tarea',
        timerProgressBar: false,
        timer: 2000
      });
    });
});

//Evento de tareas en curso
enCurso.addEventListener('add', function (e) {
  let taskid = parseInt(e.item.dataset.id);
  let newstatus = 2;

  const task = new Array();
  task.push({
    id: taskid,
    status: newstatus
  });

  let formData = new FormData();
  formData.append('task', JSON.stringify(task));

  console.log(JSON.stringify(task));

  axios.post('http://localhost/navibus-web-app/libs/dragndroptasks.php', formData)
    .then(res => {
      console.log(res);
      Toast.fire({
        icon: 'success',
        title: 'La tarea ahora está En curso',
        timerProgressBar: false,
        timer: 1000
      });
    })
    .catch(err => {
      console.error(err);
      Toast.fire({
        icon: 'error',
        title: 'Hubo un error al actualizar el status de la tarea',
        timerProgressBar: false,
        timer: 2000
      });
    });
});

//Evento de tareas finalizadas
finalizadas.addEventListener('add', function (e) {
  let taskid = parseInt(e.item.dataset.id);
  let newstatus = 3;

  const task = new Array();
  task.push({
    id: taskid,
    status: newstatus
  });

  let formData = new FormData();
  formData.append('task', JSON.stringify(task));

  console.log(JSON.stringify(task));

  axios.post('http://localhost/navibus-web-app/libs/dragndroptasks.php', formData)
    .then(res => {
      console.log(res);
      Toast.fire({
        icon: 'success',
        title: 'La tarea ahora está Finalizada',
        timerProgressBar: false,
        timer: 1000
      });
    })
    .catch(err => {
      console.error(err);
      Toast.fire({
        icon: 'error',
        title: 'Hubo un error al actualizar el status de la tarea',
        timerProgressBar: false,
        timer: 2000
      });
    });
});

//Evento de tareas aprobadas
aprobadas.addEventListener('add', function (e) {
  let taskid = parseInt(e.item.dataset.id);
  let newstatus = 4;

  const task = new Array();
  task.push({
    id: taskid,
    status: newstatus
  });

  let formData = new FormData();
  formData.append('task', JSON.stringify(task));

  console.log(JSON.stringify(task));

  axios.post('http://localhost/navibus-web-app/libs/dragndroptasks.php', formData)
    .then(res => {
      console.log(res);
      Toast.fire({
        icon: 'success',
        title: 'La tarea ahora está Aprobada',
        timerProgressBar: false,
        timer: 1000
      });
    })
    .catch(err => {
      console.error(err);
      Toast.fire({
        icon: 'error',
        title: 'Hubo un error al actualizar el status de la tarea',
        timerProgressBar: false,
        timer: 2000
      });
    });
});
var id;

function validarCampos() {
  const tipoDoc = selTipoDoc.value.trim();
  const identificacion = txtIdentificacion.value.trim();
  const nombre = txtNombre.value.trim();
  const apellido = txtApellido.value.trim();
  const correo = txtCorreo.value.trim();
  const direccion = txtDireccion.value.trim();
  const telefono = txtTelefono.value.trim();

  if (!tipoDoc) {
    showToast('El tipo de documento es requerido.', 'error');
    return false;
  }
  if (!identificacion) {
    Swal.fire({
      icon: 'error',
      title: 'Error',
      text: 'La identificación es requerida.'
    });
    return false;
  }
  if (!nombre) {
    Swal.fire({
      icon: 'error',
      title: 'Error',
      text: 'El nombre es requerido.'
    });
    return false;
  }
  if (!apellido) {
    Swal.fire({
      icon: 'error',
      title: 'Error',
      text: 'El apellido es requerido.'
    });
    return false;
  }
  if (!correo) {
    Swal.fire({
      icon: 'error',
      title: 'Error',
      text: 'El correo electrónico es requerido.'
    });
    return false;
  }
  if (!telefono) {
    Swal.fire({
      icon: 'error',
      title: 'Error',
      text: 'El telefono es Requerido es requerida.'
    });
    return false;
  }
  if (!direccion) {
    Swal.fire({
      icon: 'error',
      title: 'Error',
      text: 'El telefono es Requerido es requerida.'
    });
    return false;
  }

  return true; // Todos los campos son válidos
}

function create() {

  if (!validarCampos()) {
    return; // Si la validación falla, detén la ejecución de la función
  }

  let data = `tipoDoc=${selTipoDoc.value}&identificacion=${txtIdentificacion.value}&nombre=${txtNombre.value}&apellido=${txtApellido.value}&correo=${txtCorreo.value}&direccion=${txtDireccion.value}&telefono=${txtTelefono.value}`;

  axios
    .post("../controller/cliente.create.php", data)
    .then(function (response) {
      console.log(response);
      Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'success', // Cambia a 'error' para errores
        title: 'Cliente creado correctamente.',
        showConfirmButton: false,
        timer: 3000,
        customClass: {
          toast: 'custom-toast' // Usa 'custom-toast-error' para errores
        }
      });
      
      read();
    })
    .catch(function (error) {
      console.log(error);
    });
}

function read() {
  axios
    .get("../controller/cliente.read.php")
    .then(function (response) {
      console.log(response);
      let table = "";
      response.data.forEach((element, index) => {
        table += `<tr>`;
        table += `<th scope='row'>${index + 1}</th>`;
        table += `<td>${element.tipoDoc}</td>`;
        table += `<td>${element.numeroIdentificacion}</td>`;
        table += `<td>${element.nombre} ${element.apellido}</td>`;
        table += `<td>${element.correo}</td>`;
        table += `<td>
                    <a onclick="readUpdate(${element.idCliente})" class='btn btn-taxis'data-bs-toggle="modal"data-bs-target="#updateModal">Modificar</a> 
                    <a onclick="readDelete(${element.idCliente},'${element.nombre}')" class="btn btn-eliminar" data-bs-toggle="modal" data-bs-target="#deleteModal">Eliminar</a>
                   <a href="../view/facturas.frm.php?idCliente=${element.idCliente}" class="btn btn-facturas">Facturas</a>
                  </td>`;
        table += `</tr>`;
      });
      tableBodyClientes.innerHTML = table;
      new DataTable("#tableClientes", {
        retrieve: true,
        language: {
          url: "./assets/json/es.json",
        },
        dom: "Bfrtip",
        buttons: [
          {
            extend: "colvis",
            text: "<i class='fa-solid fa-filter fa-beat'></i>",
            titleAttr: "Filtrar",
            className: "filtro",
          },
          {
            extend: "excel",
            text: "<i class='fa-solid fa-file-excel fa-bounce'></i>",
            titleAttr: "Excel",
            className: "excel",
            exportOptions: { columns: [0, 1, 2, 3, 4] },
          },
          {
            extend: "print",
            text: "<i class='fa-solid fa-print fa-bounce'></i>",
            titleAttr: "Imprimir",
            className: "imprimir",
            exportOptions: { columns: [0, 1, 2, 3, 4] },
          },
          {
            download: "open",
            extend: "pdf",
            text: "<i class='fa-solid fa-file-pdf fa-bounce'></i>",
            titleAttr: "PDF",
            className: "pdf",
            exportOptions: { columns: [0, 1, 2, 3, 4] },
          },
          {
            extend: "copy",
            text: "<i class='fa-solid fa-copy fa-bounce'></i>",
            titleAttr: "Copiar",
            className: "copy",
            exportOptions: { columns: [0, 1, 2, 3, 4] },
          },
        ],
      });
      
    })
    .catch(function (error) {
      console.log(error);
    });
}

function update() {
  let data = `id=${this.id}&tipoDoc=${selTipoDocMod.value}&identificacion=${txtIdentificacionMod.value}&nombre=${txtNombreMod.value}&apellido=${txtApellidoMod.value}&correo=${txtCorreoMod.value}&direccion=${txtDireccionMod.value}&telefono=${txtTelefonoMod.value}`;
  axios
    .post("../controller/cliente.update.php", data)
    .then(function (response) {
      console.log(response);
      Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'success', // Cambia a 'error' para errores
        title: 'Usuario ha sido modificado correctamente.',
        showConfirmButton: false,
        timer: 3000,
        customClass: {
          toast: 'custom-toast' // Usa 'custom-toast-error' para errores
        }
      });
      read();
    })
    .catch(function (error) {
      console.log(error);
    });
}

function deletes() {
  let data = `id=${this.id}`;
  axios
    .post("../controller/cliente.delete.php", data)
    .then(function (response) {
      console.log(response);
      read();
    })
    .catch(function (error) {
      console.log(error);
    });
}

// function selectRol() {
//   axios
//     .get("../controller/rol.read.php")
//     .then(function (response) {
//       let roles = "";
//       response.data.forEach((element) => {
//         roles += `<option value="${element.id}">${element.nombreRol}</option>`;
//       });
//       selRol.innerHTML = roles;
//       selRolMod.innerHTML = roles;
//     })
//     .catch(function (error) {
//       console.log(error);
//     });
// }

function readUpdate(id) {
  axios
    .get(`../controller/cliente.readupdate.php?id=${id}`)
    .then(function (response) {
      console.log(response.data[0]);
      selTipoDocMod.value = response.data[0].tipoDoc;
      txtIdentificacionMod.value = response.data[0].numeroIdentificacion;
      txtNombreMod.value = response.data[0].nombre;
      txtApellidoMod.value = response.data[0].apellido;
      txtCorreoMod.value = response.data[0].correo;
      txtDireccionMod.value = response.data[0].direccion;
      txtTelefonoMod.value = response.data[0].telefono;

      this.id = response.data[0].idCliente;
    })
    .catch(function (error) {
      console.log(error);
    });
}

function readDelete(id, nombre) {
  this.id = id;
  mensaje.innerHTML = `Esta seguro de eliminar el cliente ${nombre} ?`;
  read();
}

// selectRol();
read();


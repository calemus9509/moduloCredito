function login() {
  let data = `correo=${txtCorreo.value}&password=${txtPassword.value}`;

  axios
    .get("../controller/login.create.php?" + data)
    .then(function (response) {
      console.log(response);
      try {
        if (response.data[0].correo == txtCorreo.value) {
          window.location.href = "clientes.frm.php";
        }
      } catch (error) {
        Swal.fire({
          toast: true,
          position: 'top-end',
          icon: 'error', // Cambia a 'error' para errores
          title: 'Usuario y/o contraseña incorrectos',
          showConfirmButton: false,
          timer: 3000,
          customClass: {
            toast: 'custom-toast-error' // Usa 'custom-toast-error' para errores
          }
        });
      }
    })
    .catch(function (error) {
      console.log(error);
    });
}
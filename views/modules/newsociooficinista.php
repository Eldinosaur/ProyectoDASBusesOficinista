<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap-5.2.0-beta1-dist/css/bootstrap.css">
  <link rel="stylesheet" href="css/styles.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<script>
  $(document).ready(function () {
    $('#new').submit(function (e) {
      e.preventDefault(); // Prevent the default form submission

      // Retrieve form data
      var formData = $(this).serialize();

      // Send the form data using AJAX
      $.ajax({
        type: 'POST',
        url: "https://nilotic-quart.000webhostapp.com/registrarSocio.php",
        data: formData,
        success: function (response) {
          console.log(response);
          alert("Datos Registrados con Exito");
          location.href = "redireccionoficinista.php?action=socios";

        },
        error: function (xhr, status, error) {
          // Handle the error case
          console.log(xhr.responseText); // Example: Log the error response to the browser console
          alert("No se Pudieron Registrar los Datos");
          location.href = "redireccionoficinista.php?action=socios";
        }
      });
    });
  });
  function redirectToBuses() {
    window.location.href = 'redireccionoficinista.php?action=socios';
  }
  </script>

  <body>
    <div class="divFormulario">
      <div class="divTituloLogin">
        <h4>Informacion del nuevo socio</h4>
      </div>
      <form id="new">
        <input type="text" name="id_cooperativa" id="id_cooperativa" value="<?php echo $_SESSION['id_coop'] ?>" hidden>
          <div class="mb-3">
            <label for="cedula_usuario" class="form-label" style="font-weight:bold;">Cedula</label>
            <input type="text" class="form-control" name="cedula_usuario" id="cedula_usuario" placeholder="Cedula del Socio" required>
          </div>
          <div class="mb-3">
            <label for="nombre_usuario" class="form-label" style="font-weight:bold;">Nombre</label>
            <input type="text" class="form-control" name="nombre_usuario" id="_usuario" placeholder="Nombre del Socio" required>
          </div>
          <div class="mb-3">
            <label for="apellido_usuario" class="form-label" style="font-weight:bold;">Apellido</label>
            <input type="text" class="form-control" name="apellido_usuario" id="apellido_usuario" placeholder="Apellido del Socio" required>
          </div>
          <div class="mb-3">
            <label for="telefono_usuario" class="form-label" style="font-weight:bold;">Telefono</label>
            <input type="text" class="form-control" name="telefono_usuario" id="telefono_usuario" placeholder="Telefono del Socio" required>
          </div>
          <div class="mb-3">
            <label for="email_usuario" class="form-label" style="font-weight:bold;">Email</label>
            <input type="text" class="form-control" name="email_usuario" id="email_usuario" placeholder="Email del Socio" required>
          </div>
          <div class="mb-3">
            <label for="clave_usuario" class="form-label" style="font-weight:bold;">Clave</label>
            <input type="text" class="form-control" name="clave_usuario" id="clave_usuario" placeholder="Clave del Socio" required>
          </div>
          <div>
            <button type="submit" class="btn btn-primary" id="envio"
              name="envio">Registrar</button>
            <button type="button" class="btn btn-danger" onclick="redirectToBuses()">Cancelar</button>
          </div>
      </form>

    </div>
  </body>
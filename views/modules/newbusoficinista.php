<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $('#newBus').submit(function(e) {
      e.preventDefault(); // Prevent the default form submission

      // Retrieve form data
      var formData = $(this).serialize();


      // Send the form data using AJAX
      $.ajax({
        type: 'POST',
        url: "https://nilotic-quart.000webhostapp.com/agregarBus.php",
        data: formData,
        success: function(response) {
          console.log(response);
        },
        error: function(xhr, status, error) {
          // Handle the error case
          console.log(xhr.responseText); // Example: Log the error response to the browser console
        }
      });
    });
  });
</script>
<script>
    function redirectToBuses(){
    window.location.href = 'redireccionoficinista.php?action=buses';
  }
</script>


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap-5.2.0-beta1-dist/css/bootstrap.css">
  <link rel="stylesheet" href="css/styles.css">

<body class="bodyBack">
  <div class="divFormulario">
    <form id="newBus" method="POST">
      <div class="divTituloLogin">
        <h4>Informacion del nuevo bus</h4>
      </div>
      <input type="text" id="id_bus" value="" hidden>
      <div class="mb-3">
        <label for="numero_bus" class="form-label" style="font-weight:bold;">Numero Bus</label>
        <input type="text" class="form-control" name="numero_bus" id="numero_bus" placeholder="Numero Bus" required>
      </div>
      <div class="mb-3">
        <label for="placa_bus" class="form-label" style="font-weight:bold;">Numero de Placa</label>
        <input type="text" class="form-control" name="placa_bus" id="placa_bus" placeholder="Numero de Placa" required>
      </div>
      <div class="mb-3">
        <label for="chasis_bus" class="form-label" style="font-weight:bold;">Chasis</label>
        <input type="text" class="form-control" name="chasis_bus" id="chasis_bus" placeholder="Carroceria" required>
      </div>
      <div class="mb-3">
        <label for="carroceria_bus" class="form-label" style="font-weight:bold;">Carroceria</label>
        <input type="text" class="form-control" name="carroceria_bus" id="carroceria_bus" placeholder="Carroceria"
          required>
      </div>
      <div class="mb-3">
        <label for="cantidad_asientos" class="form-label" style="font-weight:bold;">Numero de asientos</label>
        <input type="number" min="30" class="form-control" value="30" name="cantidad_asientos" id="cantidad_asientos"
          required>
      </div>
      <div class="mb-3">
        <label for="id_socio" class="form-label" style="font-weight:bold;">Socio</label>
        <input type="text" class="form-control" name="id_socio" id="id_socio" placeholder="Socio" required>
      </div>
      <div class="mb-3">
        <label for="fotografia" class="form-label" style="font-weight:bold;">Fotografia</label>
        <input type="text" class="form-control" name="fotografia" id="fotografia" placeholder="Fotografia" required>
      </div>
      <div class="mb-3">
        <label for="estado" class="form-label" style="font-weight:bold;">Estado</label>
        <select class="form-control" name="estado" id="estado">
          <option value="1">Activo</option>
          <option value="0">Inactivo</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="frecuencia" class="form-label" style="font-weight:bold;">Frecuencia</label>
        <div class="col-sm-8">
          <div class="input-group">
            <span class="form-control form-control-sm"
              style="background-color: #fff; border: none; height: auto; padding: 0.375rem 0.75rem; font-size: 0.875rem;">
              Asignar Frecuencia
            </span>
            <div class="input-group-append">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#frequencyModal">
                <i>+</i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <div>
        <button type="submit" class="btn btn-primary" id="envio" onclick="redirectToBuses()" name="envio">Registrar</button>
        <button type="button" class="btn btn-danger"><a
            href="redireccionoficinista.php?action=buses">Cancelar</a></button>
      </div>
    </form>
  </div>


  <div class="modal fade" id="frequencyModal" tabindex="-1" aria-labelledby="frequencyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="frequencyModalLabel">Agregar Frecuencia</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="myForm" method="POST">
            <table id="frequencyTable" class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Origen</th>
                  <th scope="col">Destino</th>
                  <th scope="col">Costo</th>
                  <th scope="col">Duración</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td colspan="5">No se encontraron registros en la tabla</td>
                </tr>
              </tbody>
            </table>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Guardar</button>
              <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cerrar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
          <i class="fas fa-check-circle fa-4x text-success"></i>
          <p class="mt-3">Guardo Exitosamente</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
        </div>
      </div>
    </div>
  </div>

</body>
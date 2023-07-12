<?php
$id_viaje_pertenece = $_GET['id_viaje_pertenece'];
$id_parada_pertenece = $_GET['id_parada_pertenece'];
$fecha_viaje = $_GET['fecha_viaje'];
$origen = $_GET['origen'];
$destino = $_GET['destino'];
$hora_salida = $_GET['hora_salida'];
$hora_llegada = $_GET['hora_llegada'];
$costo = $_GET['costo'];
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $('#newSale').submit(function(e) {
      e.preventDefault(); // Prevent the default form submission

      // Retrieve form data
      var formData = $(this).serialize();

      // Send the form data using AJAX
      $.ajax({
        type: 'POST',
        url: "https://nilotic-quart.000webhostapp.com/generarVenta.php",
        data: formData,
        success: function(response) {
          console.log(response);
          alert("Venta Registrada con Exito");
          location.href = 'redireccionoficinista.php?action=sales';
        },
        error: function(xhr, status, error) {
          // Handle the error case
          console.log(xhr.responseText); // Example: Log the error response to the browser console
          alert("No se Registro la venta");
          location.href = 'redireccionoficinista.php?action=sales';
        }
      });
    });
  });
</script>
<script>
    function redirectToSales(){
    window.location.href = 'redireccionoficinista.php?action=sales';
  }
</script>

<body class="bodyBack">
    <div class="divFormulario">
        <form class="formularioLogin" id ="newSale" method="POST">
            <div class="divTituloLogin">
                <h4>Nueva Venta</h4>
            </div>
            <div>
                <h5>Detalles del viaje</h5>
                <table class="table table-striped">
                    <thead>
                    <th scope="col">Origen</th>
                <th scope="col">Destino</th>
                <th scope="col">Fecha Viaje</th>
                <th scope="col">Hora de Salida</th>
                <th scope="col">Hora de Llegada</th>
                    </thead>
                    <tbody>
                        <td><?php echo $origen?></td>
                        <td><?php echo $destino?></td>
                        <td><?php echo $fecha_viaje?></td>
                        <td><?php echo $hora_salida?></td>
                        <td><?php echo $hora_llegada?></td>
                    </tbody>
                </table>
            </div>
            <div class="mb-3">
                <label for="frecuencia" class="form-label" style="font-weight:bold;">Comprador</label>
                <p>Consumidor Final</p>
                <input type="text" id="id_comprador" value="99999" hidden>
                <input type="text" id="id_viaje_pertenece" value="<?php echo $id_viaje_pertenece?>" hidden>
                <input type="text" id="id_parada_pertenece" value="<?php echo $id_parada_pertenece?>" hidden>
                <input type="text" id="estado_venta" value="1" hidden>
            </div>
            <div class="mb-3">
                <label for="fecha_venta" class="form-label" style="font-weight:bold;">Fecha de Venta</label>
                <input type="date" class="form-control" name="fecha_venta" id="fecha_venta" placeholder="Fecha de Venta" required>
            </div>
            <div class="mb-3">
                <label for="id_forma_pago" class="form-label" style="font-weight:bold;">Forma de Pago</label>
                <p>Efectivo</p>
                <input type="text"name="id_forma_pago" id="id_forma_pago" value="1" hidden>
            </div>
            <div class="mb-3">
                <label for="total_venta" class="form-label" style="font-weight:bold;">Total de la Venta</label>
                <p><?php echo '$ '. $costo.' dólares'?></p>
                <input type="text" class="form-control" name="total_venta" value="<?php echo $costo?>" id="total_venta" hidden>
            </div>
            
            <button type="submit" class="btn btn-primary" id="envio"  name="envio">Registrar</button>
                    <button type="button" class="btn btn-danger" onclick="redirectToSales()">Cancelar</button>
            </div>
        </form>
    </div>
</body>
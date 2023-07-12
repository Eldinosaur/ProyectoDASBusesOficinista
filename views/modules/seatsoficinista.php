<?php
$id_bus = $_POST['id_bus'];
$numero_bus = $_POST['numero_bus'];
$placa_bus = $_POST['placa_bus'];
$chasis_bus = $_POST['chasis_bus'];
$carroceria_bus = $_POST['carroceria_bus'];
$cantidad_asientos = $_POST['cantidad_asientos'];
$fotografia = $_POST['fotografia'];
$id_socio = $_POST['id_socio'];
$estado = $_POST['estado'];

?>

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

        $("#enviar").click(function () {
            event.preventDefault();
            var idBus = "<?php echo $id_bus ?>";
            var n_estandar = "<?php echo $cantidad_asientos ?>";
            var estandar = "Estandar";
            var ejecutivo = "Ejecutivo";
            var vip = "VIP"
            var n_ejecutivo = $("#tipo_ejecutivo").val();
            var n_vip = $("#tipo_ejecutivo").val();
            var adicional_ejecutivo = $("#adicional_ejecutivo").val();
            var adicional_vip = $("#adicional_vip").val();
            var adicional_estandar = "0";
            datosEjecutivo ={
                id_bus_pertenece:idBus,
                descripcion_asiento:ejecutivo,
                costo_adicional:adicional_ejecutivo
            };
            datosVIP = {
                id_bus_pertenece:idBus,
                descripcion_asiento:vip,
                costo_adicional:adicional_vip
            };
            datosEstandar ={
                id_bus_pertenece:idBus,
                descripcion_asiento:estandar,
                costo_adicional:adicional_estandar
            };
            for (var i = 0; i < n_ejecutivo; i++) {
                $.ajax({
                    type: 'POST',
                    url: "https://nilotic-quart.000webhostapp.com/agregarAsiento.php",
                    data: datosEjecutivo,
                    success: function (response) {
                        console.log(response);
                    },
                    error: function (xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
                
                n_estandar -=1;
            }
            for (var i = 0; i < n_vip; i++) {
                $.ajax({
                    type: 'POST',
                    url: "https://nilotic-quart.000webhostapp.com/agregarAsiento.php",
                    data: datosVIP,
                    success: function (response) {
                        console.log(response);
                    },
                    error: function (xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
                
                n_estandar -=1;
            }
            for (var i = 0; i < n_estandar; i++) {
                $.ajax({
                    type: 'POST',
                    url: "https://nilotic-quart.000webhostapp.com/agregarAsiento.php",
                    data: datosEstandar,
                    success: function (response) {
                        console.log(response);
                    },
                    error: function (xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            }
            location.href = 'redireccionoficinista.php?action=buses';

        });
    });
    function redirectToBuses() {
        window.location.href = 'redireccionoficinista.php?action=buses';
    }
</script>


<div class="divFormulario">
    <div class="divTituloLogin">
        <h4>Asignacion Asientos</h4>
    </div>
    <div>
        <h5>Detalles del bus</h5>
    </div>
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Numero Bus</th>
                    <th scope="col">Numero de Placa</th>
                    <th scope="col">Chasis</th>
                    <th scope="col">Carroceria</th>
                    <th scope="col">Cant. Asientos</th>
                    <th scope="col">Estado</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?php echo $numero_bus; ?>
                    </td>
                    <td>
                        <?php echo $placa_bus; ?>
                    </td>
                    <td>
                        <?php echo $chasis_bus ?>
                    </td>
                    <td>
                        <?php echo $carroceria_bus ?>
                    </td>
                    <td>
                        <?php echo $cantidad_asientos ?>
                    </td>
                    <td>
                        <?php if ($estado == 1) {
                            echo 'Activo';
                        } ?>
                    </td>
            </tbody>
        </table>
    </div>
    <div>
        <form>
            <input type="text" class="form-control" name="id_bus" id="id_bus" value="<?php echo $id_bus ?>" hidden>

            <div class="mb-3">
                <label for="tipo_ejecutivo" class="form-label" style="font-weight:bold;">Ejecutivo</label>
                <input type="number" max="<?php echo $cantidad_asientos?>" class="form-control" name="tipo_ejecutivo" id="tipo_ejecutivo" required>
            </div>
            <div class="mb-3">
                <label for="adicional_ejecutivo" class="form-label" style="font-weight:bold;">Costo Adicional
                    Ejecutivo</label>
                <input type="text" class="form-control" name="adicional_ejecutivo" id="adicional_ejecutivo" required>
            </div>
            <div class="mb-3">
                <label for="tipo_vip" class="form-label" style="font-weight:bold;">VIP</label>
                <input type="number" max="<?php echo $cantidad_asientos;?>" class="form-control" name="tipo_vip" id="tipo_vip" required>
            </div>
            <div class="mb-3">
                <label for="adicional_vip" class="form-label" style="font-weight:bold;">Costo Adicional
                    VIP</label>
                <input type="text" class="form-control" name="adicional_vip" id="adicional_vip" required>
            </div>

            <button type="button" class="btn btn-primary" id="enviar" title="Asientos"> Asignar</button>
            <button type="button" class="btn btn-danger" onclick="redirectToBuses()">Cancelar</button>
        </form>
    </div>
</div>
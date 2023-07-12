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
            var id_bus = $("#id_bus").val();
            var id_frecuencia = $("#id_frecuencia").val();
            var fecha = $("#fecha").val();
            var hora_salida = $("#hora_salida").val();
            var hora_llegada = $("#hora_llegada").val();

            datosViaje = {
                id_bus_viaje: id_bus,
                id_asignacion_pertenece: id_frecuencia,
                fecha_viaje: fecha,
                hora_salida_viaje: hora_salida,
                hora_llegada_viaje: hora_llegada
            };
            datosParada = {

            };
            console.log(datosViaje);
            $.ajax({
                    type: 'POST',
                    url: "https://nilotic-quart.000webhostapp.com/agregarViajeDiario.php",
                    data: datosViaje,
                    success: function (response) {
                        console.log(response);
                        alert("Viaje asignado con exito");
                        redirectToBuses();
                    },
                    error: function (xhr, status, error) {
                        console.log(xhr.responseText);
                        alert("No se asigno el viaje");
                        redirectToBuses();
                    }
                });
        });
    });
    function redirectToBuses() {
      window.location.href = 'redireccionoficinista.php?action=buses';
    }
</script>

<body>
    <div class="divFormulario">
        <div class="divTituloLogin">
            <h4>Detalle Viajes</h4>
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
            <form id="trip">
            <div class="mb-3">
            <label for="id_frecuencia" class="form-label" style="font-weight:bold;">Frecuencia</label>
                <select class="form-control" name="id_frecuencia" id="id_frecuencia">
                    <?php
                    $url = 'https://nilotic-quart.000webhostapp.com/listarFrecuenciaCooperativa.php?id_cooperativa_pertenece=' . $_SESSION['id_coop'];
                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $json = curl_exec($ch);
                    if ($json != null) {
                        $obj = json_decode($json);
                        $val = json_decode(json_encode($obj), true);

                        for ($i = 0; $i < sizeof($val); $i++) {
                            $id_frecuencia = $val[$i]['id_frecuencia'];
                            $origen_frecuencia = $val[$i]['origen_frecuencia'];
                            $origen = $val[$i]['origen'];
                            $destino_frecuencia = $val[$i]['destino_frecuencia'];
                            $destino = $val[$i]['destino'];
                            $duracion_frecuencia = $val[$i]['duracion_frecuencia'];
                            $tipo_frecuencia = $val[$i]['tipo_frecuencia'];
                            $costo_frecuencia = $val[$i]['costo_frecuencia'];
                            $estado_frecuencia = $val[$i]['estado_frecuencia'];
                            ?>
                            <option value="<?php echo $id_frecuencia?>"><?php echo "Origen: {$origen} - Destino: {$destino}";?>
                     </option>
                            <?php
                        }
                    } ?>
                </select>
                </div>
                <div class="mb-3">
                <input type="text" class="form-control" name="id_bus" id="id_bus" value="<?php echo $id_bus ?>" hidden>
                </div>
                <div class="mb-3">
                <label for="fecha" class="form-label" style="font-weight:bold;">Fecha Viaje</label>
                <input type="date" class="form-control" name="fecha" id="fecha">
                </div>
                <div class="mb-3">
                <label for="hora_salida" class="form-label" style="font-weight:bold;">Hora de Salida</label>
                <input type="time" class="form-control" name="hora_salida" id="hora_salida">
                </div>
                <div class="mb-3">
                <label for="estado" class="form-label" style="font-weight:bold;">Hora Estimada de Llegada</label>
                <input type="time" class="form-control" name="hora_llegada" id="hora_llegada">
                <div class="mb-3">
                <button type="button" class="btn btn-primary" id="enviar" title="Asientos"> Asignar</button>
            </form>
        </div>
    </div>
</body>
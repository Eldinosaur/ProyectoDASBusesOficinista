<?php
$id_bus = $_GET['id_bus'];
$numero_bus = $_GET['numero_bus'];
$placa_bus = $_GET['placa_bus'];
$chasis_bus = $_GET['chasis_bus'];
$carroceria_bus = $_GET['carroceria_bus'];
$cantidad_asientos = $_GET['cantidad_asientos'];
$fotografia = $_GET['fotografia'];
$id_socio = $_GET['id_socio'];
$estado = $_GET['estado'];

?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#newBus').submit(function (e) {
            e.preventDefault(); // Prevent the default form submission

            // Retrieve form data
            var formData = $(this).serialize();

            // Send the form data using AJAX
            $.ajax({
                type: 'POST',
                url: "https://nilotic-quart.000webhostapp.com/agregarViajeDiario.php",
                data: formData,
                success: function (response) {
                    console.log(response);
                },
                error: function (xhr, status, error) {
                    // Handle the error case
                    console.log(xhr.responseText); // Example: Log the error response to the browser console
                }
            });
        });
    });
</script>
<script>
    function redirectToBuses() {
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
        <div class="divTituloLogin">
            <h4>Asignacion Viaje</h4>
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
            <form id="trip" method="POST">
                <div>
                    <h4>Datos del Viaje</h4>
                </div>
                <div class="mb-3">
                    <label for="id_asignacion_pertenece" class="form-label" style="font-weight:bold;">Frecuencia</label>
                    <select class="form-control" name="id_asignacion_pertenece" id="id_asignacion_pertenece">
                        <?php
                        $url = 'https://nilotic-quart.000webhostapp.com/listarFrecuenciaCooperativa.php?id_cooperativa_pertenece=' . $_SESSION['id_coop'];
                        $ch = curl_init($url);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $json = curl_exec($ch);
                        if ($json != null) {
                            $obj = json_decode($json);
                            $val = json_decode(json_encode($obj), true);

                            for ($i = 0; $i < sizeof($val); $i++) {
                                $id_frecuencia_asignada = $val[$i]['id_frecuencia'];
                                $origen_frecuencia = $val[$i]['origen_frecuencia'];
                                $destino_frecuencia = $val[$i]['destino_frecuencia'];
                                $estado_frecuencia = $val[$i]['estado_frecuencia'];
                                if($estado_frecuencia == 1){
                                ?>
                                <option value="<?php echo $id_frecuencia_asignada; ?>"><?php echo 'Origen: ' . $origen_frecuencia . ' Destino: ' . $destino_frecuencia ?></option>
                            <?php }
                        } }?>
                    </select>
                </div>
                <input type="text" class="form-control" name="id_bus_viaje" id="id_bus_viaje"
                    value="<?php echo $id_bus ?>" hidden>
                <div class="mb-3">
                    <label for="fecha_viaje" class="form-label" style="font-weight:bold;">Fecha Viaje</label>
                    <input type="date" class="form-control" name="fecha_viaje" id="fecha_viaje" required>
                </div>
                <div class="mb-3">
                    <label for="hora_salida_viaje" class="form-label" style="font-weight:bold;">Hora de Salida</label>
                    <input type="time" class="form-control" name="hora_salida_viaje" id="hora_salida_viaje" required>
                </div>
                <div class="mb-3">
                    <label for="hora_llegada_viaje" class="form-label" style="font-weight:bold;">Hora Estimada de
                        llegada</label>
                    <input type="time" class="form-control" name="hora_llegada_viaje" id="hora_llegada_viaje" required>
                </div>
            </form>
        </div>

        <div>
            <button type="submit" class="btn btn-primary" id="envio" onclick="redirectToBuses()"
                name="envio">Registrar</button>
            <button type="button" class="btn btn-danger"><a
                    href="redireccionoficinista.php?action=buses">Cancelar</a></button>
        </div>
        </form>
    </div>
</body>
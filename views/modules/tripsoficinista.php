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

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.2.0-beta1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">

<body class="bodyBack">
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
            <h5>Viajes Asignados</h5>
        </div>
        <div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Fecha</th>
                        <th scope="col">Hora de Salida</th>
                        <th scope="col">Hora de Llegada</th>
                        <th scope="col">Origen</th>
                        <th scope="col">Destino</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $url = 'https://nilotic-quart.000webhostapp.com/listarViajesBus.php?id_bus='.$id_bus;
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $json = curl_exec($ch);
                if ($json != null) {
                    $obj = json_decode($json);
                    $val = json_decode(json_encode($obj), true);

                    for ($i = 0; $i < sizeof($val); $i++) {
                        $id_viaje = $val[$i]['id_viaje'];
                        $id_asignacion_pertenece =$val[$i]['id_asignacion_pertenece'];
                        $id_bus_viaje=$val[$i]['id_bus_viaje'];
                        $fecha_viaje = $val[$i]['fecha_viaje'];
                        $hora_salida_viaje = $val[$i]['hora_salida_viaje'];
                        $hora_llegada_viaje = $val[$i]['hora_llegada_viaje'];
                        $origen = $val[$i]['origen'];
                        $destino = $val[$i]['destino'];?>
                    <tr>
                        <td>
                            <?php echo $fecha_viaje; ?>
                        </td>
                        <td>
                            <?php echo $hora_salida_viaje; ?>
                        </td>
                        <td>
                            <?php echo $hora_llegada_viaje; ?>
                        </td>
                        <td>
                            <?php echo $origen; ?>
                        </td>
                        <td>
                            <?php echo $destino; ?>
                        </td>
                        <?php }}?>
                </tbody>
            </table>
        </div>
        
    </div>
</body>
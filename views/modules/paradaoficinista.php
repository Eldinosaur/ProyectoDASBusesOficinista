<?php
$fecha_viaje = $_POST['fecha_viaje'];
$hora_salida_viaje = $_POST['hora_salida_viaje'];
$hora_llegada_viaje = $_POST['hora_llegada_viaje'];
$origen = $_POST['origen'];
$destino = $_POST['destino'];
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.2.0-beta1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="divFormulario">
    <div class="divTituloLogin">
            <h4>Detalle Parada</h4>
        </div>
        <div>
            <h5>Detalles del viaje</h5>
        </div>
        <div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Fecha Viaje</th>
                        <th scope="col">Hora de Salida</th>
                        <th scope="col">Hora de Llegada</th>
                        <th scope="col">Origen</th>
                        <th scope="col">Destino</th>

                    </tr>
                </thead>
                <tbody>
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
                        
                </tbody>
            </table>
        </div>
    </div>
</body>
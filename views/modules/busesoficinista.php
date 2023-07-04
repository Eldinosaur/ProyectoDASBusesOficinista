<div style="padding-left: 30px; padding-right: 30px; padding-top: 15px;">
    <a class="nav-link active; navTemplate" href="redireccionoficinista.php?action=newbus">
        Nuevo Bus
        <img src="img/plus.png" class="icons">
    </a>
    <br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Numero de Placa</th>
                <th scope="col">Chasis</th>
                <th scope="col">Carroceria</th>
                <th scope="col">Cant. Asientos</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $url = 'https://nilotic-quart.000webhostapp.com/listarBuses.php';
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $json = curl_exec($ch);
            if ($json != null) {
                $obj = json_decode($json);
                $val = json_decode(json_encode($obj), true);

                for ($i = 0; $i < sizeof($val); $i++) {
                    $id_bus = $val[$i]['id_bus'];
                    $numero_bus = $val[$i]['numero_bus'];
                    $placa_bus = $val[$i]['placa_bus'];
                    $chasis_bus = $val[$i]['chasis_bus'];
                    $carroceria_bus = $val[$i]['carroceria_bus'];
                    $cantidad_asientos = $val[$i]['cantidad_asientos'];
                    $fotografia = $val[$i]['fotografia'];
                    $id_socio = $val[$i]['id_socio'];
                    $estado = $val[$i]['estado'];
                    ?>
                    <tr><td>
                            <?php echo $id_bus; ?>
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
                            } else {
                                echo 'Inactivo';
                            } ?>
                        </td>
                        <td><a class="nav-link active; navTemplate"
                                href="redireccionoficinista.php?action=updatebus&id_bus=<?php echo $id_bus; ?>&numero_bus=<?php echo $numero_bus; ?>&placa_bus=<?php echo $placa_bus; ?>&chasis_bus=<?php echo $chasis_bus;?>&carroceria_bus=<?php echo $carroceria_bus; ?>&cantidad_asientos=<?php echo $cantidad_asientos; ?>&fotografia=<?php echo $fotografia; ?>&id_socio=<?php echo $id_socio; ?>&estado=<?php echo $estado; ?>">
                                <img src="img/editar.png" class="icons">
                            </a></td>
                    </tr>
                    <?php
                }
            } else {
                ?>
            <tr>
                <td colspan="7">
                    <center>No existen buses registrados</center>
                </td>
            </tr>
            <?php
            } ?>
        </tbody>
    </table>
</div>
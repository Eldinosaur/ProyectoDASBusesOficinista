<div style="padding-left: 30px; padding-right: 30px; padding-top: 15px;">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Frecuencia N°</th>
                <th scope="col">Origen</th>
                <th scope="col">Destino</th>
                <th scope="col">Tipo</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $url = 'https://nilotic-quart.000webhostapp.com/listarFrecuencias.php';
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $json = curl_exec($ch);
            if ($json != null) {
                $obj = json_decode($json);
                $val = json_decode(json_encode($obj), true);

                for ($i = 0; $i < sizeof($val); $i++) {
                    $id_frecuencia = $val[$i]['id_frecuencia'];
                    $origen_frcuencia = $val[$i]['origen_frecuencia'];
                    $destino_frecuencia = $val[$i]['destino_frecuencia'];
                    $duracion_frecuencia = $val[$i]['duracion_frecuencia'];
                    $tipo_frecuencia = $val[$i]['tipo_frecuencia'];
                    $costo_frecuencia = $val[$i]['costo_frecuencia'];
                    $estado_frecuencia = $val[$i]['estado_frecuencia'];
                    ?>
                    <tr>
                        <td>
                            <?php echo $id_frecuencia; ?>
                        </td>
                        <td>
                            <?php echo $origen_frcuencia; ?>
                        </td>
                        <td>
                            <?php echo $destino_frecuencia; ?>
                        </td>
                        <td>
                            <?php echo $tipo_frecuencia; ?>
                        </td>
                        <td>
                            <?php if ($estado_frecuencia == 1) {
                                echo 'Activo';
                            } else {
                                echo 'Inactivo';
                            } ?>
                        </td>
                        <td><a class="nav-link active; navTemplate"
                                href="redireccionoficinista.php?action=updatefrequency&id_frecuencia=<?php echo $id_frecuencia;?>&origen_frecuencia=<?php echo $origen_frcuencia;?>&destino_frecuencia=<?php echo $destino_frecuencia?>&duracion_frecuencia=<?php echo $duracion_frecuencia?>&tipo_frecuencia=<?php echo $tipo_frecuencia?>&costo_frecuencia=<?php echo $costo_frecuencia?>&estado_frecuencia=<?php echo $estado_frecuencia?>">
                                <img src="img/editar.png" class="icons">
                            </a></td>
                    </tr>
                    <?php
                }
            } else {
                ?>
            <tr>
                <td colspan="3">
                    <center>No existen frecuencias registradas</center>
                </td>
            </tr>
            <?php
            } ?>

        </tbody>
    </table>

</div>
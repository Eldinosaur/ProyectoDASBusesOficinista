<div style="padding-left: 30px; padding-right: 30px; padding-top: 15px;">
    <a class="nav-link active; navTemplate" title="Agregar Bus" 
    href="redireccionoficinista.php?action=newbus">
        Nuevo Bus
        <img src="img/plus.png" class="icons">
    </a>
    <br>
    <h5>Bienvenido a la página de la cooperativa 
        <?php echo $_SESSION['id_coop'];?>
    </h5>
    <h5>Bienvenido usuario  
        <?php echo $_SESSION['id_usuario'];?>
    </h5>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Numero de Placa</th>
                <th scope="col">Chasis</th>
                <th scope="col">Carroceria</th>
                <th scope="col">Cant. Asientos</th>
                <th scope="col">Estado</th>
                <th colspan="3">Acciones</th>

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
                    <tr>
                        <td>
                            <?php echo $placa_bus; ?>
                        </td>
                        <td>
                            <?php echo $chasis_bus; ?>
                        </td>
                        <td>
                            <?php echo $carroceria_bus; ?>
                        </td>
                        <td>
                            <?php echo $cantidad_asientos; ?>
                        </td>
                        <td>
                            <?php if ($estado == 1) {
                                echo 'Activo';
                            } else {
                                echo 'Inactivo';
                            } ?>
                        </td>
                        <td><a class="nav-link active; navTemplate" title="Editar info bus"
                                href="redireccionoficinista.php?action=updatebus&id_bus=<?php echo $id_bus; ?>&numero_bus=<?php echo $numero_bus; ?>&placa_bus=<?php echo $placa_bus; ?>&chasis_bus=<?php echo $chasis_bus; ?>&carroceria_bus=<?php echo $carroceria_bus; ?>&cantidad_asientos=<?php echo $cantidad_asientos; ?>&fotografia=<?php echo $fotografia; ?>&id_socio=<?php echo $id_socio; ?>&estado=<?php echo $estado; ?>">
                                <img src="img/edit.png" class="icons">
                            </a>
                        </td><?php
                       if ($estado == 1) {
                        echo '
                        <td>                       
                            <a class="nav-link active; navTemplate"
                             href="redireccionoficinista.php?action=tripsform&id_bus='.$id_bus.'&numero_bus='.$numero_bus.'&placa_bus='.$placa_bus.'&chasis_bus='.$chasis_bus.'&carroceria_bus='.$carroceria_bus.'&cantidad_asientos='.$cantidad_asientos.'&fotografia='.$fotografia.'&id_socio='.$id_socio.'&estado='.$estado.'" 
                             title="Asignar viaje">
                            <img src="img/plus.png" class="icons">
                            </a>                        
                            </td>
                        <td>
                            <a class="nav-link active; navTemplate"
                             href="redireccionoficinista.php?action=trips&id_bus='.$id_bus.'&numero_bus='.$numero_bus.'&placa_bus='.$placa_bus.'&chasis_bus='.$chasis_bus.'&carroceria_bus='.$carroceria_bus.'&cantidad_asientos='.$cantidad_asientos.'&fotografia='.$fotografia.'&id_socio='.$id_socio.'&estado='.$estado.'"  
                             title="Viajes Asignados">
                            <img src="img/details.png" class="icons">
                            </a>                        
                        </td>
                        ';} else { echo '<td></td><td></td>';}?>
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
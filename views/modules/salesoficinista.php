<div style="padding-left: 30px; padding-right: 30px; padding-top: 15px;">
    
    <br>
    <!--<h5>Bienvenido a la página de la cooperativa
        <?php echo $_SESSION['id_coop']; ?>
    </h5>
    <h5>Bienvenido usuario
        <?php echo $_SESSION['id_usuario']; ?>
    </h5>-->
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Origen</th>
                <th scope="col">Destino</th>
                <th scope="col">Fecha Viaje</th>
                <th scope="col">Hora de Salida</th>
                <th scope="col">Hora de Llegada</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $url = 'https://nilotic-quart.000webhostapp.com/listarParaVentas.php?id_cooperativa='.$_SESSION['id_coop'];
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $json = curl_exec($ch);
            if ($json != null) {
                $obj = json_decode($json,true);
                $val = json_decode(json_encode($obj), true);
                    for ($i = 0; $i < sizeof($val); $i++) {
                        if (isset($obj[0]['id_parada'])!=null) {
                        $id_parada = $val[$i]['id_parada'];
                        $id_viaje = $val[$i]['id_viaje'];
                        $fecha_viaje = $val[$i]['fecha_viaje'];
                        $hora_salida_viaje = $val[$i]['hora_salida_viaje'];
                        $hora_llegada_viaje = $val[$i]['hora_llegada_viaje'];
                        $origen = $val[$i]['origen'];
                        $destino = $val[$i]['destino'];
                        $costo = $val[$i]['costo_parada']
                        
                        ?>

                        <tr>
                            <td>
                                <?php echo $origen; ?>
                            </td>
                            <td>
                                <?php echo $destino; ?>
                            </td>
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
                                <?php
                                echo '<td>
                                <form action="redireccionoficinista.php?action=newsale" method="post">
                                <input type="text" name="id_viaje_pertenece" value="'.$id_viaje.'" hidden>
                                <input type="text" name="id_parada_pertenece" value="'.$id_parada.'" hidden>
                                <input type="text" name="fecha_viaje" value="'.$fecha_viaje.'" hidden>
                                <input type="text" name="origen" value="'.$origen.'" hidden>
                                <input type="text" name="destino" value="'.$destino.'" hidden>
                                <input type="text" name="hora_salida" value="'.$hora_salida_viaje.'" hidden>
                                <input type="text" name="hora_llegada" value="'.$hora_llegada_viaje.'" hidden>
                                <input type="text" name="costo" value="'.$costo.'" hidden>
                                    <button type="submit" class="btn" title="Asientos">                               
                                <img src="img/sale.png" class="icons">
                            </button>
                                </form>
                            </td>';?>
                            </td>

                        </tr>
                        <?php }else{
                ?>
            <tr>
                <td colspan="7">
                    <center>
                        No se encontraron registros
                    </center>
                </td>
            </tr>
            <?php
            }}}?>
        </tbody>
    </table>
</div>
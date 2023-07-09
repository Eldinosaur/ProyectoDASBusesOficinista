<div style="padding-left: 30px; padding-right: 30px; padding-top: 15px;">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Numero de orden</th>
                <th scope="col">Fecha Venta</th>
                <th scope="col">Forma de Pago</th>
                <th scope="col">Estado Venta</th>
                <th scope="col">Acciones</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $url = 'https://nilotic-quart.000webhostapp.com/listarVentas.php?id_cooperativa=2';// . $_SESSION['id_coop'];
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $json = curl_exec($ch);
            if ($json != null) {
                $obj = json_decode($json);
                $val = json_decode(json_encode($obj), true);
                if (is_array($val)) {

                    for ($i = 0; $i < sizeof($val); $i++) {
                        
                        $id_venta= $val[$i]['id_venta'];                        
                        $fecha_venta = $val[$i]['fecha_venta'];
                        $id_forma_pago = $val[$i]['id_forma_pago'];
                        $estado_venta = $val[$i]['estado_venta'];
                        $total_venta = $val[$i]['total_venta'];
                        $origen = $val[$i]['origen'];
                        $destino = $val[$i]['destino'];
                        $comprobante_venta = $val[$i]['comprobante_venta'];
                        $fecha_viaje = $val[$i]['fecha_viaje'];
                        ?>
                        <tr>
                            <td>
                                <?php echo $id_venta?>
                            </td>
                            <td>
                                <?php echo $fecha_venta?>
                            </td>
                            <td>
                                <?php if($id_forma_pago == 1){
                                    echo "Efectivo";
                                }else if($id_forma_pago == 2){
                                    echo "Transferencia";
                                }else if($id_forma_pago == 3){
                                    echo "Depósito";
                                }else if($id_forma_pago == 4){
                                    echo "Paypal";
                                }
                                ?>
                            </td>
                            <td>
                                <?php if($estado_venta == 0){
                                    echo "Pendiente Validacion";
                                }else if($estado_venta == 1){
                                    echo "Validado";
                                }elseif ($estado_venta == 2) {
                                    echo "Rechazado";
                                }
                                ?>
                            </td>
                            <?php
                            if($estado_venta == 0){
                            echo'<td>
                            <form action="redireccionoficinista.php?action=validationform" method="post">
                            <input type="text" name="id_venta" value="'.$id_venta.'" hidden>
                            <input type="text" name="fecha_venta" value="'.$fecha_venta.'" hidden>
                            <input type="text" name="id_forma_pago" value="'.$id_forma_pago.'" hidden>
                            <input type="text" name="estado_venta" value="'.$estado_venta.'" hidden>
                            <input type="text" name="total_venta" value="'.$total_venta.'" hidden>
                            <input type="text" name="origen" value="'.$origen.'" hidden>
                            <input type="text" name="destino" value="'.$destino.'" hidden>
                            <input type="text" name="comprobante_venta" value="'.$comprobante_venta.'" hidden>
                            <input type="text" name="fecha_viaje" value="'.$fecha_viaje.'" hidden>
                                <button type="submit" class="btn">                               
                            <img src="img/sale.png" class="icons">
                        </button>
                            </form>
                        </td>';
                            }else{
                                echo "<td></td>";
                            }
                            ?>
                            
                        </tr>

                        <?php
                    }
                }
            } else {
                ?>
                <tr>
                    <td colspan="7">
                        <center>
                            No Existen Buses Registrados
                        </center>
                    </td>
                </tr>
                <?php
            } ?>
        </tbody>
    </table>

</div>
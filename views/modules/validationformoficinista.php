<?php
$id_venta = $_POST['id_venta'];
$fecha_venta = $_POST['fecha_venta'];
$id_forma_pago = $_POST['id_forma_pago'];
$estado_venta = $_POST['estado_venta'];
$total_venta = $_POST['total_venta'];
$origen = $_POST['origen'];
$destino = $_POST['destino'];
$comprobante_venta = $_POST['comprobante_venta'];
$fecha_viaje = $_POST['fecha_viaje'];
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#update').submit(function (e) {
            e.preventDefault(); // Prevent the default form submission

            // Retrieve form data
            var formData = $(this).serialize();

            // Send the form data using AJAX
            $.ajax({
                type: 'POST',
                url: "https://nilotic-quart.000webhostapp.com/validarVenta.php",
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
    function redirectToBuses() {
        window.location.href = 'redireccionoficinista.php?action=validation';
    }
</script>

<body class="bodyBack">
    <div class="divFormulario">
        <form id="update" method="POST">
            <div class="divTituloLogin">
                <h4>Validar Venta Online</h4>
            </div>
            <div>
                <h5>Detalles Venta</h5>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Numero de orden</th>
                            <th scope="col">Fecha Venta</th>
                            <th scope="col">Forma de Pago</th>
                            <th scope="col">Total de la Venta</th>
                            <th scope="col">Fecha Viaje</th>
                            <th scope="col">Origen</th>
                            <th scope="col">Destino</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <?php echo $id_venta ?>
                            </td>
                            <td>
                                <?php echo $fecha_venta ?>
                            </td>
                            <td>
                                <?php if ($id_forma_pago == 1) {
                                    echo "Efectivo";
                                } else if ($id_forma_pago == 2) {
                                    echo "Transferencia";
                                } else if ($id_forma_pago == 3) {
                                    echo "Depósito";
                                } else if ($id_forma_pago == 4) {
                                    echo "Paypal";
                                }
                                ?>
                            </td>
                            <td>
                                <?php echo "$" . $total_venta; ?>
                            </td>
                            <td>
                                <?php echo $fecha_viaje ?>
                            </td>
                            <td>
                                <?php echo $origen ?>
                            </td>
                            <td>
                                <?php echo $destino ?>
                            </td>
                        </tr>

                    </tbody>
                </table>
                <h5>Comprobante</h5>
                <img src="<?php if(filter_var($comprobante_venta, FILTER_VALIDATE_URL)){echo $comprobante_venta;}?>" alt="No Existe Comprobante Registrado" style="height:250px;">
            </div>
<input type="text" name="id_venta" id="id_venta" value="<?php echo $id_venta?>" hidden>
            <div class="mb-3">
                    <label for="estado_venta" class="form-label" style="font-weight:bold;">Estado</label>
                    <select class="form-control" name="estado_venta" id="estado_venta">
                        <option value="1" <?php if ($estado_venta == 1)
                        echo 'selected' ?>>Validado
                        </option>
                        <option value="0" <?php if ($estado_venta == 0)
                        echo 'selected' ?>>Pendiente Validacion
                        </option>
                        <option value="2">Rechazado</option>
                    </select>
                </div>



            <div>
            <button type="submit" class="btn btn-primary" id="envio" onclick="redirectToBuses()"
                        name="envio">Registrar</button>
                    <button type="button" class="btn btn-danger"><a
                            href="redireccionoficinista.php?action=validation">Cancelar</a></button>
            </div>
        </form>
    </div>
</body>
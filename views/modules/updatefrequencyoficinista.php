<?php
$id_frecuencia = $_GET['id_frecuencia'];
$origen_frcuencia = $_GET['origen_frecuencia'];
$destino_frecuencia = $_GET['destino_frecuencia'];
$duracion_frecuencia = $_GET['duracion_frecuencia'];
$tipo_frecuencia = $_GET['tipo_frecuencia'];
$costo_frecuencia = $_GET['costo_frecuencia'];
$estado_frecuencia = $_GET['estado_frecuencia'];
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
                url: "https://nilotic-quart.000webhostapp.com/editarFrecuencia.php",
                data: formData,
                success: function (response) {
                    console.log(response);
                    alert("Frecuencia Actualizada con Éxito");
                    location.href="redireccionoficinista.php?action=frequencies";

                },
                error: function (xhr, status, error) {
                    // Handle the error case
                    console.log(xhr.responseText); // Example: Log the error response to the browser console
                    alert("No se Pudieron Actualizar los datos");                    
                    location.href="redireccionoficinista.php?action=frequencies";
                }
            });
        });
    });
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
</head>

<body class="bodyBack">
    <div class="divFormulario">
        <div class="divTituloLogin">
            <h4>Actualizacion estado de frecuencia</h4>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Frecuencia N°</th>
                    <th scope="col">Origen</th>
                    <th scope="col">Destino</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Estado</th>
                </tr>
            </thead>
            <tbody>
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
                        <?php if ($tipo_frecuencia == 1) {
                            echo 'Con Paradas';
                        } else {
                            echo 'Sin Paradas';
                        } ?>
                    </td>
                    <td>
                        <?php if ($estado_frecuencia == 1) {
                            echo 'Activo';
                        } else {
                            echo 'Inactivo';
                        } ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <form class="formularioLogin" method="POST" id="update">


            <input type="text" class="form-control" name="id_frecuencia" id="id_frecuencia"
                value="<?php echo $id_frecuencia ?>" hidden>
            <div class="mb-3">
                <label for="tipo_frecuencia" class="form-label" style="font-weight:bold;">Tipo Frecuencia</label>
                <select class="form-control" name="tipo_frecuencia" id="tipo_frecuencia">
                    <option value="1" <?php if ($tipo_frecuencia == 1){
                        echo 'selected'; }?>>Directo
                        </option>
                        <option value="0" <?php if ($tipo_frecuencia == 2)
                        {echo 'selected';} ?>>Con Paradas
                        </option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="estado_frecuencia" class="form-label" style="font-weight:bold;">Estado</label>
                    <select class="form-control" name="estado_frecuencia" id="estado_frecuencia">
                        <option value="1" <?php if ($estado_frecuencia == 1){
                        echo 'selected';} ?>>Activo
                        </option>
                        <option value="0" <?php if ($estado_frecuencia == 0){
                        echo 'selected'; }?>>Inactivo
                        </option>
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary" id="envio" 
                        name="envio">Registrar</button>
                    <button type="button" class="btn btn-danger" onclick="redirectToBuses()">Cancelar</button>
                </div>
            </form>
        </div>
    </body>
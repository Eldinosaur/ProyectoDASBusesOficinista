<?php
$id_frecuencia = $_GET['id_frecuencia'];
$origen_frcuencia = $_GET['origen_frecuencia'];
$destino_frecuencia = $_GET['destino_frecuencia'];
$duracion_frecuencia = $_GET['duracion_frecuencia'];
$tipo_frecuencia = $_GET['tipo_frecuencia'];
$costo_frecuencia = $_GET['costo_frecuencia'];
$estado_frecuencia = $_GET['estado_frecuencia'];
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.2.0-beta1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">

<body class="bodyBack">
    <div class="divFormulario">
        <form class="formularioLogin" method="POST">
            <div class="divTituloLogin">
                <h4>Actualizacion estado de frecuencia</h4>
            </div>
            <input type="text" class="form-control" name="id_bus" id="id_bus" value="<?php echo $id_bus ?>" hidden>
            <div class="mb-3">
                <label for="numero_bus" class="form-label" style="font-weight:bold;">Numero Bus</label>
                <input type="text" class="form-control" name="numero_bus" id="numero_bus" placeholder="Numero Bus"
                    value="<?php echo $numero_bus ?>" required>
            </div>
            <div class="mb-3">
                <label for="estado" class="form-label" style="font-weight:bold;">Estado</label>
                <select class="form-control" name="estado" id="estado">
                    <option value="1" <?php if ($estado == 1)
                        echo 'selected' ?>>Activo</option>
                        <option value="0" <?php if ($estado == 0)
                        echo 'selected' ?>>Inactivo</option>
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary" id="envio" name="envio">
                        <a href="redireccionoficinista.php?action=frequencies">Registrar
</a>
                        </button>
                    <button type="button" class="btn btn-danger"><a
                            href="redireccionoficinista.php?action=frequencies">Cancelar</a></button>
                </div>
            </form>
        </div>
    </body>
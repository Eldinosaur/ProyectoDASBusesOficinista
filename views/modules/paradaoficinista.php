<?php
$id_frecuencia = $_POST['id_frecuencia'];
$origen_parada = $_POST['origen_parada'];
$origen = $_POST['origen'];
$destino_parada = $_POST['destino_parada'];
$destino = $_POST['destino'];
$duracion =$_POST['duracion_frecuencia'];
$costo = $_POST['costo'];
//https://nilotic-quart.000webhostapp.com/
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.2.0-beta1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<script>
    $(document).ready(function () {
        $("#enviar").click(function () {
            var id_asignacion_pertenece = $("#id_asignacion_pertenece").val();
            var origen_parada = $("#origen_parada").val();
            var destino_parada = $("#destino_parada").val();
            var costo_parada = $("#costo_parada").val();
            var duracion_parada = $("#duracion_parada").val();

            datosViaje = {
                id_asignacion_pertenece:id_asignacion_pertenece,
                origen_parada:origen_parada,
                destino_parada:destino_parada,
                costo_parada:costo_parada,
                duracion_parada:duracion_parada
            };
            console.log(datosViaje);
            $.ajax({
                    type: 'POST',
                    url: "https://nilotic-quart.000webhostapp.com/agregarParada.php",
                    data: datosViaje,
                    success: function (response) {
                        console.log(response);
                        alert("Parada Agregada con Exito");
                        redirectToBuses();
                    },
                    error: function (xhr, status, error) {
                        console.log(xhr.responseText);
                        alert("No se grego la Parada");
                        redirectToBuses();
                    }
                });
        });
    });
    function redirectToBuses() {
      window.location.href = 'redireccionoficinista.php?action=frequencies';
    }
</script>
<body>
    <div class="divFormulario">
    <div class="divTituloLogin">
            <h4>Detalle Parada</h4>
        </div>
        <form id="parada">

        <div class="mb-3">
                <input type="text" class="form-control" name="id_asignacion_pertenece" id="id_asignacion_pertenece" value="<?php echo $id_frecuencia ?>" hidden>
                </div>
                <div class="mb-3">
                <label for="origen_parada" class="form-label" style="font-weight:bold;"><?php echo "Origen: ".$origen;?></label>
                <input type="text" class="form-control" name="origen_parada" id="origen_parada" value="<?php echo $origen_parada ?>" hidden>
                </div>
                <div class="mb-3">
                <label for="destino_parada" class="form-label" style="font-weight:bold;"><?php echo "Destino: ".$destino;?></label>
                <input type="text" class="form-control" name="destino_parada" id="destino_parada" value="<?php echo $destino_parada ?>" hidden>
                </div>
                <div class="mb-3">
                <label for="costo_parada" class="form-label" style="font-weight:bold;">Costo de Parada</label>                
                <input type="text" class="form-control" name="costo_parada" id="costo_parada">
                </div>
                <div class="mb-3">
                <label for="duracion_parada" class="form-label" style="font-weight:bold;">Duracion de Parada</label>
                <input type="time" class="form-control" name="duracion_parada" id="duracion_parada" >
                </div>
        <button type="button" class="btn btn-primary" id="enviar" title="Asignar"> Asignar</button>
        
        <button type="button" class="btn btn-danger" onclick="redirectToBuses()">Cancelar</button>
            
        </form>
    </div>
</body>
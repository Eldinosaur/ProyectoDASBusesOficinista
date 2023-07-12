<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap-5.2.0-beta1-dist/css/bootstrap.css">
  <link rel="stylesheet" href="css/styles.css">
  <script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-storage.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="bodyBack">
  <div class="divFormulario">
    <form id="newBus" method="POST">
      <div class="divTituloLogin">
        <h4>Informacion del nuevo bus</h4>
      </div>
      <input type="text" id="id_bus" value="" hidden>
      <div class="mb-3">
        <label for="numero_bus" class="form-label" style="font-weight:bold;">Numero Bus</label>
        <input type="text" class="form-control" name="numero_bus" id="numero_bus" placeholder="Numero Bus" required>
      </div>
      <div class="mb-3">
        <label for="placa_bus" class="form-label" style="font-weight:bold;">Numero de Placa</label>
        <input type="text" class="form-control" name="placa_bus" id="placa_bus" placeholder="Numero de Placa" required>
      </div>
      <div class="mb-3">
        <label for="chasis_bus" class="form-label" style="font-weight:bold;">Chasis</label>
        <input type="text" class="form-control" name="chasis_bus" id="chasis_bus" placeholder="Carroceria" required>
      </div>
      <div class="mb-3">
        <label for="carroceria_bus" class="form-label" style="font-weight:bold;">Carroceria</label>
        <input type="text" class="form-control" name="carroceria_bus" id="carroceria_bus" placeholder="Carroceria" required>
      </div>
      <div class="mb-3">
        <label for="cantidad_asientos" class="form-label" style="font-weight:bold;">Numero de asientos</label>
        <input type="number" min="30" max="40" class="form-control" value="30" name="cantidad_asientos" id="cantidad_asientos" required>
      </div>
      <div class="mb-3">
      <label for="id_socio" class="form-label" style="font-weight:bold;">Socio</label>
      <select class="form-control" name="id_socio" id="id_socio">
              <?php
              $url = 'https://nilotic-quart.000webhostapp.com/listarSociosCooperativa.php?id_cooperativa='. $_SESSION['id_coop'];
              $ch = curl_init($url);
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
              $json = curl_exec($ch);
              if ($json != null) {
                  $obj = json_decode($json);
                  $val = json_decode(json_encode($obj), true);
                  for ($i = 0; $i < sizeof($val); $i++) {
                    $id_socio_datos = $val[$i]['id_usuario'];
                    $cedula_socio = $val[$i]['cedula_usuario'];
                    $nombre_socio = $val[$i]['nombre_usuario'];
                    $apellido_socio = $val[$i]['apellido_usuario'];
                  
              ?>
                
                
                        <option value="<?php echo $id_socio_datos?>"><?php echo "Cedula: ".$cedula_socio." Nombre: ".$nombre_socio." ".$apellido_socio;?></option>
                    
                    <?php }}?>
                    </select>
            </div>
      <div class="mb-3">
        <label for="fotografia" class="form-label" style="font-weight:bold;">Fotografía</label>
        <input type="file" class="form-control" name="fotografia" id="fotografia" accept="image/*" required>
      </div>

      <div class="mb-3">
        <label for="estado" class="form-label" style="font-weight:bold;">Estado</label>
        <select class="form-control" name="estado" id="estado">
          <option value="1">Activo</option>
          <option value="0">Inactivo</option>
        </select>
      </div>
      
      <div>
        <button type="submit" class="btn btn-primary" id="envio"  name="envio">Registrar</button>
        <button type="button" class="btn btn-danger" onclick="redirectToBuses()">Cancelar</button>
      </div>
    </form>
  </div>

  

  <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
          <i class="fas fa-check-circle fa-4x text-success"></i>
          <p class="mt-3">Guardo Exitosamente</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    var firebaseConfig = {
      apiKey: "AIzaSyAZa0vsgcykehIk-x1Fh_VLShy5oHesm94",
      storageBucket: "gs://facturamovil-cd677.appspot.com"
    };

    firebase.initializeApp(firebaseConfig);

    $(document).ready(function() {
      $('#newBus').submit(function(e) {
        e.preventDefault(); 

        var imageFile = document.getElementById('fotografia').files[0];
        var storageRef = firebase.storage().ref();
        var timestamp = Date.now();
        var imageName = timestamp + '-' + imageFile.name;
        var imageRef = storageRef.child(imageName);
        var formData = new FormData(this);

        imageRef
          .put(imageFile)
          .then(function(snapshot) {
            console.log('Imagen subida con éxito.');
            return imageRef.getDownloadURL();
          })
          .then(function(url) {
            console.log('URL de descarga:', url);
            formData.append('fotografia', url);
            $.ajax({
              type: 'POST',
              url: 'https://nilotic-quart.000webhostapp.com/agregarBus.php',
              data: formData,
              processData: false,
              contentType: false,
              success: function(response) {
                console.log(response);
                alert("Se Guardaron con Éxito los Datos del Bus");
                location.href = 'redireccionoficinista.php?action=buses';
              },
              error: function(xhr, status, error) {
                console.log(xhr.responseText);
              }
            });
          })
          .catch(function(error) {
            console.log('Error al subir la imagen:', error);
            alert("No se Guardaron los Datos del Bus");
                location.href = 'redireccionoficinista.php?action=buses';
          });
      });
    });


    function redirectToBuses() {
        window.location.href = 'redireccionoficinista.php?action=buses';
    }
  </script>
</body>
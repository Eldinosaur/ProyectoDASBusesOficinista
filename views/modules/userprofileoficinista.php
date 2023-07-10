<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.7.2/dist/css/bootstrap.min.css">
</head>
<?php
    $url = 'https://nilotic-quart.000webhostapp.com/obtenerDatosUsuarioGet.php?id_usuario=' . $_SESSION['id_usuario'];
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $json = curl_exec($ch);
    if ($json != null) {
        $obj = json_decode($json, true);
        $nombre = $obj['nombre_usuario'];
        $apellido = $obj['apellido_usuario'];
    }?>
<body>
    <div class="container">
        <div class="p-3">
            <h3 class="text-center">
                Perfil de Usuario
            </h3>

            <div class="text-center">
                <div class="d-flex align-items-center justify-content-center">
                    <img class="img-fluid" src="img/cambiarUsuario.png" alt="Profile Picture" style="max-width: 200px;">
                    <a href="#">
                        <i class="fas fa-camera"></i>
                    </a>
                </div>
            </div>

            <div class="text-center mt-3">
                <p class="fw-bold fs-4 mb-1">Nombres y Apellidos</p>

                <p class="fs-5 text-secondary"><?php echo $nombre.' '.$apellido?></p>
            </div>

            <div class="border rounded p-3 d-flex flex-column mt-3">
                <a href="redireccionoficinista.php?action=userform" class="btn btn-outline-secondary mb-2 border-0 shadow-none">Editar Información del Perfil</a>
                <a href="redireccionoficinista.php?action=newpassword" class="btn btn-outline-secondary mb-2 border-0 shadow-none">Cambiar Contraseña</a>
            </div>
        </div>
    </div>
</body>

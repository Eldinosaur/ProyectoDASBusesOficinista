<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.bundle.min.js"></script>
    <script>
        <script>
        $(document).ready(function () {
            $("form").submit(function (event) {
                e.preventDefault(); // Prevent the default form submission

                // Retrieve form data
                var formData = $(this).serialize();

                // Send the form data using AJAX
                $.ajax({
                    type: 'POST',
                    url: "https://nilotic-quart.000webhostapp.com/editarClaveUsuario.php",
                    data: formData,
                    success: function (response) {
                        console.log(response);
                        $('#successModal').modal('show');
                    },
                    error: function (xhr, status, error) {
                        // Handle the error case
                        console.log(xhr.responseText); // Example: Log the error response to the browser console
                    }
                
                });
            });});
    </script>
    </script>
    <script>
        $(document).ready(function() {
            // Función para alternar la visibilidad de la contraseña
            function togglePasswordVisibility(inputId, toggleButtonId) {
                var input = $("#" + inputId);
                var toggleButton = $("#" + toggleButtonId);

                toggleButton.on("click", function() {
                    var type = input.attr("type");
                    if (type === "password") {
                        input.attr("type", "text");
                        toggleButton.html('<i class="fas fa-eye-slash"></i>');
                    } else {
                        input.attr("type", "password");
                        toggleButton.html('<i class="fas fa-eye"></i>');
                    }
                });
            }

            // Alternar visibilidad de la contraseña para cada campo
            togglePasswordVisibility("newPassword", "toggleNewPassword");
            togglePasswordVisibility("newPasswordAgain", "toggleNewPasswordAgain");
            togglePasswordVisibility("currentPassword", "toggleCurrentPassword");
        });
    </script>
</head>

<body>
    <div class="indexStyleTitulo">
        <div style="padding-left: 30px; padding-right: 30px; padding-top: 15px;">
            <h3 style="font-size: 20px; text-align: center;">
                <span class="cooperative-info-title">CAMBIAR CONTRASEÑA</span>
            </h3>
            <form style="max-width: 400px; margin: 0 auto;" id="form">
            <input type="text" id="id_usuario" value="<?php echo $_SESSION['id_usuario']?>"hidden>
                <div class="row mb-3">
                    <label for="newPassword" class="col-sm-4 col-form-label">Nueva Contraseña:</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <input type="password" class="form-control form-control-sm" id="clave_usuario" placeholder="Ingrese la nueva contraseña">
                            <button class="btn btn-outline-secondary" type="button" id="toggleNewPassword">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="newPasswordAgain" class="col-sm-4 col-form-label">Nueva Contraseña Nuevamente:</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <input type="password" class="form-control form-control-sm" id="newPasswordAgain" placeholder="Ingrese la nueva contraseña nuevamente">
                            <button class="btn btn-outline-secondary" type="button" id="toggleNewPasswordAgain">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="currentPassword" class="col-sm-4 col-form-label">Contaseña Actual:</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            
                            <input type="password" class="form-control form-control-sm" id="clave_usuario" placeholder="Ingrese su contraseña actual">
                            <button class="btn btn-outline-secondary" type="button" id="toggleCurrentPassword">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary" style="width: 120px;">Guardar</button>
                </div>
            </form>

        </div>

    </div>
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <i class="fas fa-check-circle fa-4x text-success"></i>
                    <p class="mt-3">Guardado Exitosamente</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
</body>
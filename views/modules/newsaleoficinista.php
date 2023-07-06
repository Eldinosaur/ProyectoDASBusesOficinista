<body class="bodyBack">
    <div class="divFormulario">
        <form class="formularioLogin" method="POST">
            <div class="divTituloLogin">
                <h4>Nueva Venta</h4>
            </div>
            <div class="mb-3">
                <label for="frecuencia" class="form-label" style="font-weight:bold;">Frecuencia</label>
                <input type="text" class="form-control" name="frecuencia" id="frecuencia" placeholder="Frecuencia" required>
            </div>
            <div class="mb-3">
                <label for="placa" class="form-label" style="font-weight:bold;">Placa del Bus</label>
                <input type="text" class="form-control" name="placa" id="placa" placeholder="Placa del Bus" required>
            </div>
            <div class="mb-3">
                <label for="numeroasientos" class="form-label" style="font-weight:bold;">Numero de asientos</label>
                <input type="number" min="1" class="form-control" value="1" name="numeroasientos" id="numeroasientos"
                    required>
            </div>
            <div class="mb-3">
                <label for="numeroregistro" class="form-label" style="font-weight:bold;">Numero de Registro del Bus</label>
                <input type="text" class="form-control" name="numeroregistro" id="numeroregistro" placeholder="Numero del Registro del Bus" required>
            </div>
            <div class="mb-3">
                <label for="horasalida" class="form-label" style="font-weight:bold;">Hora de Salida</label>
                <input type="text" class="form-control" name="horasalida" id="horasalida" placeholder="Hora de Salida" required>
            </div>

            <div>
                <button type="submit" class="btn btn-primary" id="envio" name="envio">Registrar</button>
                <button type="button" class="btn btn-outline-primary">Cancelar</button>
            </div>
        </form>
    </div>
</body>
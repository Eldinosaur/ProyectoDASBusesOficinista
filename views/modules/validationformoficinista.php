<body class="bodyBack">
    <div class="divFormulario">
        <form class="formularioLogin" method="POST">
            <div class="divTituloLogin">
                <h4>Validar Venta Online</h4>
            </div>
            <div class="mb-3">
                <label for="numeroorden" class="form-label" style="font-weight:bold;">Numero de Orden de Venta</label>
                <input type="text" class="form-control" name="numeroorden" id="numeroorden" placeholder="Numero Orden de Venta" required>
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
                <label for="numeroregistro" class="form-label" style="font-weight:bold;">Numero de Registro del Bus</label>
                <input type="text" class="form-control" name="numeroregistro" id="numeroregistro" placeholder="Numero del Registro del Bus" required>
            </div>
            <div class="mb-3">
                <label for="horasalida" class="form-label" style="font-weight:bold;">Hora de Salida</label>
                <input type="text" class="form-control" name="horasalida" id="horasalida" placeholder="Hora de Salida" required>
            </div>
            <div class="mb-3">
                <label for="evidencia" class="form-label" style="font-weight:bold;">Evidencia de Pago</label>
                
                  <div class="input-group">
                    <span class="form-control form-control-sm" style="background-color: #fff; border: none; height: auto; padding: 0.375rem 0.75rem; font-size: 0.875rem;">
                      Ver Detalle
                    </span>
                    <div class="input-group-append">
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#frequencyModal">
                        <i >+</i>
                      </button>
                    </div>
                </div>
            </div>


            <div>
                <button type="submit" class="btn btn-primary" id="envio" name="envio">Validar</button>
                <button type="button" class="btn btn-outline-primary">Cancelar</button>
            </div>
        </form>
    </div>
</body>
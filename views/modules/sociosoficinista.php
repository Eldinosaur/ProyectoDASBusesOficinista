<div style="padding-left: 30px; padding-right: 30px; padding-top: 15px;">
<a class="nav-link active; navTemplate" title="Agregar Bus" href="redireccionoficinista.php?action=newsocio">
    Nuevo Socio
    <img src="img/plus.png" class="icons">
</a>
<br>
<!--<h5>Bienvenido a la página de la cooperativa
    <?php echo $_SESSION['id_coop']; ?>
</h5>
<h5>Bienvenido usuario
    <?php echo $_SESSION['id_usuario']; ?>
</h5>-->
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Cedula</th>
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col">Telefono</th>

        </tr>
    </thead>
    <tbody>
    <?php
              $url = 'https://nilotic-quart.000webhostapp.com/listarSociosCooperativa.php?id_cooperativa='. $_SESSION['id_coop'];
              $ch = curl_init($url);
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
              $json = curl_exec($ch);
              if ($json != null) {
                  $obj = json_decode($json);
                  $val = json_decode(json_encode($obj), true);
                  for ($i = 0; $i < sizeof($val); $i++) {
                    if (isset($val[$i]['cedula_usuario']) != null) {
                    $cedula_socio = $val[$i]['cedula_usuario'];
                    $nombre_socio = $val[$i]['nombre_usuario'];
                    $apellido_socio = $val[$i]['apellido_usuario'];
                    $email_socio = $val[$i]['email_usuario'];
                    $telefono_socio = $val[$i]['telefono_usuario']
                    ?>
                    <tr>
                        <td>
                            <?php echo $cedula_socio; ?>
                        </td>
                        <td>
                            <?php echo $nombre_socio." ".$apellido_socio;?>
                        </td>
                        <td>
                            <?php echo $email_socio?>
                        </td>
                        <td>
                            <?php echo $telefono_socio?>
                        </td>
                        <?php }else{?>
                            <td colspan="4"><center> No Existen Socios Registrados </center></td>
                        <?php } }}?>
                        
    </tbody>
</table>
</div>
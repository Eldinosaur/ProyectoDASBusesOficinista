<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAFEY!</title>
    <link rel="stylesheet" href="bootstrap-5.2.0-beta1-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="easyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script type="text/javascript" src="easyui/jquery.min.js"></script>
    <script type="text/javascript" src="easyui/jquery.easyui.min.js"></script>

</head>

<body>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark;">
            <div class="container-fluid" style="display:flex;">
            <a class="navbar-brand" href="redireccionoficinista.php?action=home">
                    <img src="img/safey.jpg" class="avatar"> </a>
                    <ul class="navbar-nav">
                    <li class="nav-item"></li>
                    </ul>
                    <ul class="navbar-nav">
                    <li class="nav-item"></li>
                    </ul>
                    <ul class="navbar-nav">
                    <li class="nav-item"></li>
                    </ul>
                    <ul class="navbar-nav">
                    <li class="nav-item"></li>
                    </ul>
                    <ul class="navbar-nav">
                    <li class="nav-item"></li>
                    </ul>
                    <ul class="navbar-nav">
                    <li class="nav-item"></li>
                    </ul>
                    <ul class="navbar-nav">
                    <li class="nav-item"></li>
                    </ul>
                    <ul class="navbar-nav">
                    <li class="nav-item"></li>
                    </ul>
                    <ul class="navbar-nav">
                    <li class="nav-item"></li>
                    </ul>
                    <ul class="navbar-nav">
                    <li class="nav-item"></li>
                    </ul>
                    <a class="navbar-brand" href="redireccionoficinista.php?action=userprofile" style="justify-content:right">
                    <img src="img/avatar.png" class="avatar"> </a>
                <button type="button" class="btn btn-danger; buttonStyle" id="btnLogout">Cerrar Sesión</button>
            </div>
        </nav>
    </div>
    <div>
        <nav class="navbar-expand-lg navbar-dark navBg custom-nav">
            <div class="container-fluid">                
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active; navTemplate" href="redireccionoficinista.php?action=buses">Buses</a>
                    </li>                
                    <li class="nav-item">
                        <a class="nav-link active; navTemplate"
                            href="redireccionoficinista.php?action=frequencies">Frecuencias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active; navTemplate" href="redireccionoficinista.php?action=sales">Ventas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active; navTemplate" href="redireccionoficinista.php?action=validation">Validacion Ventas Online</a>
                    </li>
                </ul>
                

            </div>
        </nav>
    </div>
    <section>
        <?php
        $mvc = new MvcController();
        $mvc->enlacesPaginasControllerOficinista();
        ?>
    </section>

    
</body>


</html>
<script>
    var boton = document.getElementById("btnLogout");
    boton.onclick = function () {
        window.location = "logout.php";
    }
</script>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Carga de Publicaciones</title>
        <link rel="icon" type="image/png" href="../../../img/logo.png"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, 
              initial-scale=1.0">
        <link href="../../../css/bootstrap-theme.min.css" 
              rel="stylesheet" type="text/css"/>
        <link href="../../../css/bootstrap.min.css" rel="stylesheet" 
              type="text/css"/>
        <link href="../../../css/themes/bootstrap.css" rel="stylesheet" 
              type="text/css"/>
        <link href="../../../css/alertify.min.css" rel="stylesheet" 
              type="text/css"/>
        <link href="../../../css/estilos.css" rel="stylesheet" 
              type="text/css"/>
        <link href="../../../fonts/css/fontawesome-all.css" rel="stylesheet" 
              type="text/css"/>
        <style>
           /* html{
                display:none;
            } */
        </style>
    </head>
    <body>
        <div id="buscar"></div>
        <div id="panelPrograma" class="card border border-primary">
            <div class="card-header text-center bg-primary text-white">
                Formulario de Publicaciones
            </div>
            <div class="card-body text-right">
                <form id="formPrograma" enctype="multipart/form-data" method="POST">
                    <div class="row mb-2">
                        <div class="col-md-2">
                            <span>Codigo</span>
                        </div>
                        <div class="col-md-1">
                            <input id="id" name="id" 
                                   type="text" readonly
                                   class="form-control input-sm" 
                                   placeholder="Codigo">
                        </div>
                        <div class="col-md-1">
                            <button id="botonBuscarId" 
                                    type="button"
                                    title="buscar" 
                                    class="btn btn-primary btn-sm">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <span>Titulo</span>
                        </div>
                        <div class="col-md-2">
                            <input id="titulo" name="titulo" 
                                   type="text" class="form-control
                                   input-sm" placeholder="Titulo">
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <span>Contenido</span>
                        </div>
                        <div class="col-md-5">
                            <textarea id="contenido" name="contenido" 
                                      class="form-control input-sm" placeholder="Contenido" 
                                      rows="5" ></textarea>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <span>Imagen</span>
                        </div>
                        <div class="col-md-3">
                            <input id="Imagen" name="Imagen" 
                                   type="file" accept=".jpg,.jpeg,image/png,image/gif"
                                   class="btn btn-primary btn-sm" placeholder="Imagen">
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center">
                <button id="botonAgregar" type="button" 
                        class="btn btn-primary btn-sm">Agregar</button>
                <button id="botonModificar" type="button" 
                        class="btn btn-primary btn-sm">Modificar</button>
                <button id="botonEliminar" type="button" 
                        class="btn btn-primary btn-sm" 
                        data-toggle="modal" 
                        data-target="#confirmarEliminar">Eliminar</button>
                <button id="botonCancelar" type="button" 
                        class="btn btn-primary btn-sm">Cancelar</button>
                <button id="botonSalir" type="button" 
                        class="btn btn-primary btn-sm">Salir</button>

            </div>
        </div>
        <div id="mensajes" class="card card-body bg-light">
            Mensajes del Sistema.</div>
        <div class="modal fade" id="confirmarEliminar" tabindex="-1">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Mensaje del Sistema</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Está seguro de eliminar estos datos?
                    </div>
                    <div class="modal-footer">
                        <button id="botonEliminarAlert" type="button" 
                                class="btn btn-primary btn-sm" data-dismiss="modal">
                            Eliminar
                        </button>
                        <button type="button" class="btn btn-default 
                                btn-sm" data-dismiss="modal">
                            Cancelar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <script src="../../../js/jquery-3.3.1.min.js" type="text/javascript">
        </script>
        <script src="../../../js/bootstrap.min.js" 
        type="text/javascript"></script>
        <script src="../../../js/alertify.js" type="text/javascript"></script>
        <script src="../../../fonts/on-server/js/fontawesome-all.js"></script>
        <script src="../../../js/funciones.js" type="text/javascript"></script>
        <script src="js/funciones.js" type="text/javascript"></script>
        <script>
            alertify.defaults.transition = "slide";
            alertify.defaults.theme.ok = "btn btn-primary";
           // verificarSesion(true);
            $("#botonAgregar").prop('disabled', false);
            $("#botonModificar").prop('disabled', true);
            $("#botonEliminar").prop('disabled', true);
            $("#botonCancelar").prop('disabled', true);

            $("#buscar").css("display", "none");
            $("#botonBuscarId").on('click', function () {
                $("#buscar").load("buscar.html");
                $("#buscar").fadeIn("slow");
                $("#panelPrograma").fadeOut("slow");
            });
            $("#botonAgregar").on('click', function () {
                agregarPublicacion();
            });
            $("#botonModificar").on('click', function () {
                modificarPublicacion();
            });
            $("#botonEliminarAlert").on('click', function () {
                eliminarPublicacion();
            });
            $("#botonSalir").on('click', function () {
                location.href = "../../../menu.html";
            });
            $("#botonCancelar").on('click', function () {
                $("#botonAgregar").prop('disabled', false);
                $("#botonModificar").prop('disabled', true);
                $("#botonEliminar").prop('disabled', true);
                $("#botonCancelar").prop('disabled', true);
                limpiarCampos();
            });
        </script>
    </body>
</html>
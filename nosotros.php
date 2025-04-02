<html>
    <head>
        <meta charset="utf-8"/>
        <title>Nosotros</title>
        <link rel="icon" type="image/png" href="img/logo.png"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" 
              type="text/css"/>
        <link href="../../../css/themes/bootstrap.css" rel="stylesheet" 
              type="text/css"/>
        <link href="css/estilos.css" rel="stylesheet" 
              type="text/css"/>
        <link href="../../../css/blog-home.css" rel="stylesheet" 
              type="text/css"/>
    </head>
    <body>
        <?php
        include("barra_menu.html");
        ?>
        <div class="container my-5">
            <h1 class="pt-1">Quien soy?</h1>
            <div class="row">
                <div class="col-md-12"><div class="row" id="publicaciones">
                        <div class="col-md-6 col-sm-12 portfolio-item mb-5">
                            <div class="card">
                                <img class="card-img-top" style="height: 470px; width: 540px;" src="Pedro.jpg">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 portfolio-item mb-5">
                        Mi nombre es Pedro Ramírez, soy estudiante de Licenciatura 
                        en Análisis de Sistemas Informáticos. Hace poco logré cumplir 
                        una meta personal: decidí inscribirme en un curso de Desarrollo Web 
                        sin saber con certeza si realmente me apasionaría. Al principio,
                        tenía muchas dudas y pensamientos negativos, pero decidí seguir 
                        adelante sin importar los obstáculos.
                        El curso tuvo una duración de un año, durante el cual enfrenté 
                        numerosos desafíos. Aprendí a lidiar con la complejidad de la 
                        programación, a resolver problemas y a superar las dificultades 
                        que surgían en el camino. Esta experiencia no solo me permitió 
                        desarrollar habilidades técnicas, sino que también me enseñó la 
                        importancia de la perseverancia y la mejora continua en este 
                        apasionante mundo del desarrollo web.
                        Si te gustó este proyecto, espero poder conectar contigo y que 
                        tengamos la oportunidad de trabajar juntos. Me apasiona la idea 
                        de crear, aprender nuevas habilidades y seguir creciendo en este 
                        mundo de la tecnología. 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; Elaborado 
                    por Pedro Ramirez 2018</p>
            </div>
        </footer>
    </body>
    <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script>
        $(".nav-item").eq(2).addClass("active");
    </script>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <?php require('layout/_css.php') ?>
</head>
<body>
    
    <div class="container my-4" id= "formularioContacto" >

        <h1 class="text-center my-3">Contactanos</h1>

        <form action="recepcion_formulario.php" method="POST" class="p-2 m-2">

            

            <div class="form-group my-2">
                <label for="nombre"> Nombre </label>
                <input type="text" name="nombre" class="form-control" placeholder="Ingrese su nombre" />
            </div>

            <div class="form-group my-2">
                <label for="password">Contraseña</label>
                <input type="password" name="password" class="form-control" placeholder="Ingrese su contraseña" />
            </div>
            
            <div class="form-group my-2">
            <label for="edad"> Edad </label>
            <input type="number"  class="form-control my-2" name="edad" id="edad" placeholder="Ingrese su edad" style="width: 10em;">
            </div>

            <div class="form-group my-2">
            <label for="password"> Correo electronico </label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Ingrese su correo electrónico" >
            </div>

            <div class="form-group my-2">
                <label for="modalidad"> Modalidad de cursado</label>
                    
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="presencial" id="presencial" checked>
                    <label class="form-check-label" for="presencial">
                        Presencial
                    </label>

                    </div>
                    
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="a_distancia" id="a_distancia">
                    <label class="form-check-label" for="a_distancia">
                        A distancia
                    </label>
                
                </div>
            </div>


            <div class="form-group my-2">

                <label for="idioma-interes">Idiomas de interes</label>
            
                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="ingles" id="idioma_ingles" name="idiomas[]"/>
                <label class="form-check-label" for="idioma_ingles">Ingles</label>
                </div>

                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="portugues" id="idioma_portugues" name="idiomas[]"/>
                <label class="form-check-label" for="idioma_portugues">Portugues</label>
                </div>

                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="italiano" id="idioma_italiano" name="idiomas[]"/>
                <label class="form-check-label" for="idioma_italiano">Italiano</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary"> Enviar </button>

        </form>

    </div>
</body>
</html>
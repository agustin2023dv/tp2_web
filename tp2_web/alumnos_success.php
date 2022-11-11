<?php

require_once('conf/conf.php');
require_once('funciones/funciones_alumnos.php');

try{
    $conexion = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASSWORD);
}catch(PDOException $e){
    header('Location: error.php');
}


$id_alumno = $_GET['id_alumno'] ?? null;

$alumno = getAlumnoByID($conexion, $id_alumno);

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php require('layout/_css.php') ?>

    <title>Resultado de busqueda</title>
</head>

<body>

    <div class="container">
        <?php if ($alumno) : ?>
            <div class="card text-center mt-5">

                <div class="card-body">
                    <h1 class="mb-3 text-center">
                        <?php echo $alumno['id_alumno'] ?>
                    </h1>
                    <p class="card-text">
                        <li>
                            Nombre: <?php echo $alumno['nombre'] ?>
                        </li>
                        <li>
                            Apellido: <?php echo $alumno['apellido'] ?>
                        </li>
                        <li>
                            Email: <?php echo $alumno['email'] ?>
                        </li>
                    </p>
                </div>
            </div>
        <?php else : ?>
            <h1 class="mb-3 text-center">
                Sin resultados
            </h1>
            <div class="alert alert-danger"> No se ha encontrado un empleado con ese legajo. </div>
        <?php endif ?>
        <hr>
        <a class="btn btn-primary" href="index.php"> Volver </a>
    </div>

    <?php require('layout/_js.php') ?>

</body>

</html>
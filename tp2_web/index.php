

<?php

    require_once('conf/conf.php');
    require_once('funciones/funciones_alumnos.php');
    require_once('funciones/funciones_paginador.php');

    try{
        $conexion = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASSWORD);
    }catch(PDOException $e){
        //echo 'No se pudo conectar a la base de datos, porque: ' . $e->getMessage();
        //exit;
        header('Location: error.php');
    }

    $alumnos = getAlumnos($conexion);

    //Cantidad de empleados en total.
    $cantidad = count($alumnos);
    //Página actual.
    $pagina_actual = $_GET['pag'] ?? 1;
    //Cuántos registros por página.
    $cuantos_por_pagina = 5;

    //Enlaces del paginado.
    $paginado_enlaces = paginador_enlaces($cantidad, $pagina_actual, $cuantos_por_pagina);

    $alumnos = paginador_lista($alumnos, $pagina_actual, $cuantos_por_pagina);

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php require('layout/_css.php') ?>

    <title>Hello, world!</title>
</head>

<body>
    
    <div class="container">

        <h1 class="text-center"> Lista de alumnos </h1>

        <form action="alumnos_success.php" method="get" class="mb-5">
            <div class="mb-3">
                <label for="id_alumno" class="form-label">ID Alumno </label>
                <input type="number" class="form-control" name="id_alumno" id="id_alumno" placeholder="Ingrese el id del alumno que desea buscar.">
            </div>
            <button type="submit" class="btn btn-primary"> Buscar </button>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th class="text-center"> Avatar </th>
                    <th class="text-center"> ID </th>
                    <th class="text-center"> Nombre completo </th>
                </tr>
            </thead>
            <tbody>

                <?php if (count($alumnos) > 0) : ?>
                    <?php foreach ($alumnos as $alumno) : ?>
                        <tr>
                           <!--<td class="text-center">
                                <img src="img/avatares/<?php echo $alumno['telefono'] ?>" alt="<?php echo $alumno['nombre'] ?>">
                            </td>-->
                            <td class="text-center"> <?php echo $alumno['id_alumno'] ?> </td>
                            <td class="text-center"> <?php echo $alumno['id_alumno'] ?> </td>
                            <td class="text-center"> <?php echo "{$alumno['nombre']} {$alumno['apellido']}" ?> </td>
                        </tr>
                    <?php endforeach ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="3" class="text-center"> No hay registros para mostrar. </td>
                        </tr>
                <?php endif ?>

            </tbody>
        </table>

        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php if($paginado_enlaces['anterior']): ?>
                    <li class="page-item">
                        <a class="page-link" href="?pag=<?php echo $paginado_enlaces['primero'] ?>"> Primero </a>                        
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="?pag=<?php echo $paginado_enlaces['anterior'] ?>"> <?php echo $paginado_enlaces['anterior'] ?> </a>
                    </li>
                <?php endif ?>
                <li class="page-item active"> 
                    <span class="page-link">
                        <?php echo $paginado_enlaces['actual'] ?> 
                    </span>
                </li>
                <?php if($paginado_enlaces['siguiente']): ?>
                    <li class="page-item">
                        <a class="page-link" href="?pag=<?php echo $paginado_enlaces['siguiente'] ?>"> <?php echo $paginado_enlaces['siguiente'] ?> </a>
                    </li>
                    <li class="page-item">
                    <a class="page-link" href="?pag=<?php echo $paginado_enlaces['ultimo'] ?>"> Último </a>
                    </li>
                <?php endif ?>
            </ul>
        </nav>

    </div>

    <?php require('layout/_js.php') ?>

</body>

</html>
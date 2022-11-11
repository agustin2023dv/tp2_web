<?php

function getAlumnos(PDO $conexion)
{

    $consulta = $conexion->prepare('
        SELECT id_alumno,nombre,apellido
        FROM alumnos
    ');

    $consulta->execute();

    $alumnos = $consulta->fetchAll(PDO::FETCH_ASSOC);

    return $alumnos;

}

function getAlumnoByID(PDO $conexion, $id_alumno)
{

    $consulta = $conexion->prepare('
        SELECT id_alumno,nombre,apellido, email
        FROM alumnos
        WHERE id_alumno = :id_alumno
    ');

    $consulta->bindValue(':id_alumno', $id_alumno);

    $consulta->execute();

    $alumno = $consulta->fetch(PDO::FETCH_ASSOC);

    return $alumno;

}
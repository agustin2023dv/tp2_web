<?php 
 require('layout/_css.php') ;
 
                if(isset($_POST['nombre'])){
                    $nombre = $_POST['nombre'];
                    $password = $_POST['password'];
                    $email = $_POST['email'];
                    $edad = $_POST['edad'];

                    $idiomas = array();

                    $campos = array();
                    
                    if(isset($_POST['idiomas'])){
                        $idiomas = $_POST['idiomas'];
                    }
                    else{
                        $idiomas = "";
                        array_push($campos, "Seleccione almenos un idioma de interes");
                    }

                    if($nombre == ""){
                        array_push($campos, "El campo Nombre no pude estar vacío");
                    }
                    
                    if($edad < 0 || $edad > 120){
                        array_push($campos, "La edad debe estar entre 0 y 120 anios");
                    }

                    if($password == "" || strlen($password) < 6){
                        array_push($campos, "El campo Password no puede estar vacío, ni tener menos de 6 caracteres.");
                    }
    
                    if(($email == "") || strpos($email, "@") === false){
                        array_push($campos, "Ingresa un correo electrónico válido.");
                    }
    
                    if(count($campos) > 0){
                        echo "<div class='error'>";
                        for($i = 0; $i < count($campos); $i++){
                            echo "<li>".$campos[$i]."</li>";
                        }
                    }else{
                        echo "<div class='correcto'>
                                Datos correctos";
                    }
                    echo "</div>
                    <a href=_contactForm.php>Volver</a> ";
                }

                ?>
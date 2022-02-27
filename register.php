<?php

require "./configuracion/configuracion_index.php";

$errors = [];
$success = null;

if(isset($_POST['submit']))
{
    if(isset($_POST['nombre'],$_POST['apellidos'],$_POST['email'],$_POST['password']) && !empty($_POST['nombre']) && !empty($_POST['apellidos']) && !empty($_POST['email']) && !empty($_POST['password']))
    {
        $nombre = trim($_REQUEST['nombre']);
        $apellidos = trim($_REQUEST['apellidos']);
        $email = trim($_REQUEST['email']);
        $password = trim($_REQUEST['password']);
        
        //Encriptar la clavr
        $options = array("cost" => 4);
        $hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);
        $date = date('Y-m-d H:i:s');

        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $sql = 'select * from usuarios where email = :email';
            $stmt = $miPDO->prepare($sql);
            $p = ['email'=>$email];
            $stmt->execute($p);
            
            //rowCount() --Z nº de registro de la consulta

            if($stmt->rowCount() == 0) {
                $sql = "INSERT INTO usuarios (nombre, apellidos, email, password ) 
                VALUES (:nombre, :apellidos, :email, :password)";

                try{

                    $handle = $miPDO->prepare($sql);
                    $params = [
                        'nombre' => $nombre,
                        'apellidos' => $apellidos,
                        'email' => $email,
                        'password' => $hashPassword
                    ];

                    $handle->execute($params);
                    $success = 'El usuario se ha creado';

                }catch(PDOException $e){
                    $errors[] = $e->getMessage();
                }

            }else{
                $valFirstName = $nombre;
                $valLastName = $apellidos;
                $valEmail = '';
                $valPassword = $password;
 
                $errors[] = 'El Email ya existe';

            }

        }else{
            $errors[] = "La dirección email no es válida";
        }

    }else{

        if(!isset($_POST['nombre']) || empty($_POST['nombre']))       {
            $errors[] = 'El nombre es obligatorio';
        }else{
            $valFirstName = $_POST['nombre'];
        }
        if(!isset($_POST['apellidos']) || empty($_POST['apellidos']))     {
            $errors[] = 'El apellidos es obligatorio';
        }  else  {
            $valLastName = $_POST['apellidos'];
        }

 

        if(!isset($_POST['email']) || empty($_POST['email']))   {
            $errors[] = 'El Email es obligatorio';
        }else{
            $valEmail = $_POST['email'];
        }

        if(!isset($_POST['password']) || empty($_POST['password']))   {
            $errors[] = 'La contraseña es obligatoria';
        }else{
            $valPassword = $_POST['password'];

        }
    }
 }

 
echo $blade->run("autentificacion.register", [
    'errors' => $errors,
    'success' => $success
]);

?>


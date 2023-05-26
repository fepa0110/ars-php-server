<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
        <title>Editar usuario</title>
    </head>
    <body>
        <header>
            <nav style="margin-top: 2rem;">
                <a href="./">Home</a>
                <a class="current" href="./users.php">Usuarios</a>
            </nav>
        </header>


<?php
    require_once 'call-api.php';
    require_once 'utils.php';

    $url = 'http://localhost:3000/users';

    get_user();

    function get_user(){
        if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
            $id = $_PUT['id'];
            
            $urlId = "http://localhost:3000/users/".$id;
            
            consoleLog("'".$urlId."'");

            $result = rest_call("GET",$urlId,false,false,false);
            $userObject = json_decode($result);
            consoleLog($userObject);

            echo '
                <form style="margin-bottom: 2rem;" method="PUT">
                    <h3>Editar usuario</h3>

                        <p>
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" value="'.$userObject->email.'" required="">
                        </p>
                        <p>
                            <label for="password">Contraseña</label>
                            <input type="password" id="password" name="password" required="">
                        </p>

                        <p>
                            <label for="firstName">Nombre</label>
                            <input type="text" id="firstName" name="firstName" value="'.$userObject->firstName.'" required="">
                        </p>

                        <p>
                            <label for="lastName">Apellido</label>
                            <input type="text" id="lastName" name="lastName" value="'.$userObject->lastName.'" required="">
                        </p>
                    <p>
                        <label for="permissionLevel">Nivel de permiso</label>
                        <input id="permissionLevel" name="permissionLevel" value="'.$userObject->permissionLevel.'" type="number"/>
                    </p>

                    <button type="submit" value="submit">Guardar</button>
                </form>
            ';
        }
        /*if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
            $id = $_PUT['id'];
            $email = $_PUT['email'];
            $password = $_PUT['password'];
            $firstName = $_PUT['firstName'];
            $lastName = $_PUT['lastName'];
            $permissionLevel = $_PUT['permissionLevel'];

            $putData = array(
                "email"=>$_PUT["email"], 
                "password"=>$_PUT["password"],
                "firstName"=>$_PUT["firstName"],
                "lastName"=>$_PUT["lastName"],
                "permissionLevel"=>$_PUT["permissionLevel"]
            );

            
            
            $jsonData = json_encode($putData);
            
            consoleLog($jsonData);

            $jsonResponse = rest_call('PUT',$url."/".$id, $jsonData,'appplication/json');
            
            $response = json_decode($jsonResponse);

        }*/
    }
?>
    </body>
</html>

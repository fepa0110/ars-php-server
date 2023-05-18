<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <title>Usuarios</title>
</head>
<body>

<header>
    <nav style="margin-top: 2rem; margin-bottom: 2rem;">
        <a href="./">Home</a>
        <a class="current" href="./users">Usuarios</a>    
    </nav>
</header>

<div style="display:flex; justify-content:space-between; align-items: center;">
    <h4>Usuarios</h4>

    <a class="button" style="width: 10rem;  text-align: center;" href="./newUser.php">Nuevo usuario</a>
</div>

<?php 
    require_once 'call-api.php';

    $result = rest_call("GET","http://localhost:3000/users",false,false,false);
    $userObject = json_decode($result);

    render_table($userObject);
    
    function render_table($userData){
        echo '        
            <table>
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Permission Level</th>
                    </tr>
                </thead>
            <tbody>';

            foreach($userData as $user){
                echo '
                <tr>'.
                    '<td>'.$user->id.'</td>'.
                    '<td>'.$user->email.'</td>'.
                    '<td>'.$user->firstName.'</td>'.
                    '<td>'.$user->lastName.'</td>'.
                    '<td>'.$user->permissionLevel.'</td>'.
                '</tr>';
            }
                echo '
                    </tbody>
                    </table>
                ';
    }
?>

    </body>
</html>
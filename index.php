<!DOCTYPE html>
<h1>HOLA</h1>

<?php 
    include './call-api.php'
    
    rest_call("GET","http://localhost:3000/users",false,false,false);
?>
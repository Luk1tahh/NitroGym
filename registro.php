<?php
$servidor = "localhost";
$usuario_bd = "root";
$clave_bd = "";
$bd = "gym";
$coneccion = mysqli_connect($servidor, $usuario_bd, $clave_bd, $bd);
if (!$coneccion){
    die("Conexión fallida: " . mysqli_connect_error());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombres = isset($_POST["nombres"]) ? $_POST["nombres"] : '';
    $apellidos = isset($_POST["apellidos"]) ? $_POST["apellidos"] : '';
    $contra = isset($_POST["contrasena"]) ? $_POST["contrasena"] : '';
    $sql = "SELECT * FROM tgym WHERE nombres='$nombres' AND apellidos='$apellidos' AND contrasena='$contra'";
    $result = mysqli_query($coneccion, $sql);
    if (!$result){
        die("Error en la consulta: " . mysqli_error($coneccion));
    }
    $nr = mysqli_num_rows($result);
    if ($nr == 1){
        header("Location:index.html");
        exit();
    } else{
        echo '<script>alert("Usuario o contraseña incorrectos.");</script>';
    }
}
mysqli_close($coneccion);
?>
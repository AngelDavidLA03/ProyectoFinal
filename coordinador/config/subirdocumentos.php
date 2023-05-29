<?php
// Establecer conexión a la base de datos
$conexion = mysqli_connect("localhost", "u611167522_root", "G3nU1n4M3nT3{]?_", "u611167522_db_serviciosoc");



if(isset($_POST['crear'])){
    if (strlen($_POST['code']) >= 1 && 
        strlen($_POST['username']) >= 1 &&
        strlen($_POST['password']) >= 1) {

            $code =     trim($_POST['code']);
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);
            $tipoUser = "";
            if (isset($_POST['p_tipoUser'])) {
            $tipoUser = $_POST['p_tipoUser'];
            echo "Tipo de usuario seleccionado: " . $tipoUser;
            }

            $consulta = "CALL crear_usuario('$code', '$username', '$password', '$tipoUser')";
            
            $resultado = mysqli_query($conexion, $consulta);
            if ($resultado) {
                ?>
                <h3 class="ok"> Cuenta creada </h3>
                <?php
            } else{ 
                ?>
                <h3 class="bad"> Ha ocurrido un error</h3>
                <?php
            }
    } else {
        ?>
        <h3 class="bad"> Llena todos los campos </h3>
        <?php
    }
}
// Cerrar conexión a la base de datos
mysqli_close($conexion);
?>
<?php
include "lib/model/Usuarios.php";
include "lib/model/UsuarioModel.php";
session_start(); // Inicia la sesión si no está iniciada
// Verifica si se ha enviado el formulario de inicio de sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    // Obtiene los datos del formulario
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Realiza la validación y autenticación
    $usuarioModel = new UsuarioModel();
    $usuario = $usuarioModel->obtenerUsuarioPorNombre($username);

    if ($usuario && password_verify($password, $usuario->getPassword())) {
        // Inicio de sesión exitoso
        // Almacena el rol en una variable
        $rol = $usuario->getRol();

        // Redirige a la página correspondiente según el rol
        if ($rol == 0) {
            header('Location: pagina_usuario.php');
        } elseif ($rol == 1) {
            header('Location: pagina_administrador.php');
        }

        // Finaliza el script después de redirigir
        exit();
    } else {
        // Inicio de sesión fallido
        $error = "Nombre de usuario o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>Iniciar Sesión</title>
    </head>

    <body>
        <h2>Iniciar Sesión</h2>
<?php if (isset($error)) { ?>
            <p style="color: red;">
            <?php echo $error; ?>
            </p>
            <?php } ?>
        <form method="post" action="login.php">
            <label for="username">Nombre de Usuario:</label>
            <input type="text" id="username" name="username" required><br>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required><br>

            <input type="submit" name="login" value="Iniciar Sesión">
        </form>
    </body>

</html>
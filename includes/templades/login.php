<?php require '../db/database.php';

$db = conectarDB();

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $correo = mysqli_real_escape_string($db, filter_var($_POST['correo']));
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (!$correo) {
        $errores[] = 'El correo no es valido';
    }
    if (!$password) {
        $errores[] = 'La contraseña es obligatorio';
    }

    if (empty($errores)) {
        $query = "SELECT * FROM usuarios WHERE correo = '$correo'";
        $resultado = mysqli_query($db, $query);

        if ($resultado->num_rows) {
            //revisar si el password es correcto
            $usuario = mysqli_fetch_assoc($resultado);
            // var_dump($usuario);

            $auth = password_verify($password, $usuario['password']);

            if ($auth) {
                //El usuario esta autenticado
                session_start();
                //llenamos el array de la sesión
                $_SESSION['usuario'] = $usuario['correo'];
                $_SESSION['login']   = true;
                $_SESSION['usuarioID'] = $usuario['id'];

                // header('Location:/login/index.php');
            } else {
                $errores[] = 'El password es incorrecto';
            }
        } else {
            $errores[] = 'El usuario es incorrecto';
        }
    }
}

?>
<?php include '../header.php'; ?>
<main>
    <section class="login wrapper">
        <div class="login__alerts">
            <?php foreach ($errores as $error) : ?>
                <p class="login__error"> <?php echo $error ?></p>
            <?php endforeach ?>
        </div>
        <form class="login__form" action="login.php" method="POST">
            <label class="login__label" for="correo">Correo</label>
            <input class="login__input" type="email" name="correo">

            <label class="login__label" for="password">Password</label>
            <input class="login__input" type="password" name="password">

            <input class="login__regis" type="submit" value="Iniciar sesión">
        </form>
    </section>
</main>


<?php include '../footer.php'; ?>
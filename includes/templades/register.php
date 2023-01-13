<?php
require '../db/database.php';
include '../header.php';
$db = conectarDB();

$errores = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //Sanitisamos los datos y hasheamos la contraseña
    $correo       = mysqli_real_escape_string($db, filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL));
    $password     = mysqli_real_escape_string($db, $_POST['password']);
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // echo $correo;
    // echo $password;

    //Comprovamos si hay errores
    if (!$correo) {
        $errores[] = 'El email no es valido';
    }
    if (!$password) {
        $errores[] = 'El Password el obligatorio';
    }

    //Comprovamos si el usuario ya existe
    $query = "SELECT * FROM usuarios WHERE correo = '$correo'";
    $resultado = mysqli_query($db, $query);

    if ($resultado->num_rows) {
        $errores[] = 'El usuario ya existe';
    }

    //si no hay errores registramos al usuario
    if (empty($errores)) {
        $query = "INSERT INTO usuarios (correo, password) VALUES ('$correo','$passwordHash')";
        echo $query;
        mysqli_query($db, $query);

        header('Location:/login/index.php');
    }
}

?>


<main>
    <section class="login wrapper">
        <div class="login__alerts">
            <?php foreach ($errores as $error) : ?>
                <p class="login__error"> <?php echo $error ?></p>
            <?php endforeach ?>
        </div>
        <form class="login__form" action="register.php" method="POST">
            <label class="login__label" for="correo">Correo</label>
            <input class="login__input" type="email" name="correo">

            <label class="login__label" for="password">Password</label>
            <input class="login__input" type="password" name="password">

            <input class="login__regis" type="submit" value="registrarse">
        </form>
    </section>
</main>


<?php include '../footer.php'; ?>
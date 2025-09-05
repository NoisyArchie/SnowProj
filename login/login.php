<html>
    <body>
        <form method="post" action="">
            Usuario: 
            <input type="text" id="reg_username" name="reg_username" placeholder="Introduce tu usuario"><br>
            Contraseña: 
            <input type="password" id="reg_password" name="reg_password" placeholder="Introduce tu contraseña"><br>

            <button type="submit" name="register">Registro</button><br><br><br>

            Usuario: 
            <input type="text" id="log_username" name="log_username" placeholder="Introduce tu usuario"><br>
            Contraseña: 
            <input type="password" id="log_password" name="log_password" placeholder="Introduce tu contraseña"><br>

            <button type="submit" name="login">Inicio de sesion</button>
        </form>

        <?php
        include '../php/conn.php';

        if (isset($_POST['login'])){
            $usuario = $_POST['log_username'];
            $contrasena = $_POST['log_password'];

            $sql = "SELECT contrasena FROM usuarios WHERE usuario = ?";
            $stmt = $conexion->prepare($sql);
            mysqli_stmt_bind_param($stmt,"s",$usuario);
            mysqli_stmt_execute($stmt);

            $resultado = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($resultado)){
                $hashGuardado = $row['contrasena'];

                if (password_verify($contrasena,$hashGuardado)){
                    echo "Iniciaste sesion";
                }else{
                    echo "Contraseña incorrecta";
                }
            }
        }


        if (isset($_POST['register'])) {
            $usuario = $_POST['reg_username'];
            $contrasena = $_POST['reg_password'];

            $hash = reg_password_hash($contrasena, reg_PASSWORD_ARGON2ID);

            $sql = "INSERT INTO usuarios (usuario, contrasena) VALUES (?, ?)";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("ss", $usuario, $hash);

            if ($stmt->execute()) {
                echo "Usuario registrado correctamente.";
            } else {
                echo "Error: " . $conexion->error;
            }

            $stmt->close();
        }
        ?>
    </body>
</html>

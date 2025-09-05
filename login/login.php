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
        include '../correotoken.php';

        if (isset($_POST['login'])){
            $usuario = $_POST['log_username'];
            $contrasena = $_POST['log_password'];

            $sql = "SELECT id, contrasena FROM usuarios WHERE usuario = ?";
            $stmt = $conexion->prepare($sql);
            mysqli_stmt_bind_param($stmt,"s",$usuario);
            mysqli_stmt_execute($stmt);

            $resultado = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($resultado)){
                $hashGuardado = $row['contrasena'];

                if (password_verify($contrasena,$hashGuardado)){
                    echo "Iniciaste sesion paso1";
                    $token = bin2hex(random_bytes(16)); // 16 bytes = 32 caracteres hex
                    $token_hash = password_hash($token, PASSWORD_ARGON2ID);
                    $sql = "INSERT INTO tokens (usuario_id, token, creado_en, expiracion) VALUES (?, ?, NOW(), DATE_ADD(NOW(), INTERVAL 1 HOUR))";
                    $stmt = $conexion->prepare($sql);
                    mysqli_stmt_bind_param($stmt,"is",$row['id'], $token_hash);
                    mysqli_stmt_execute($stmt);
                       if ($stmt->affected_rows > 0) {
                           setcookie("auth_token", $token, time() + 3600, "/", "", false, true); // Cookie segura y HttpOnly
                           echo " - Token generado y cookie establecida.";
                           mandarCorreo($usuario, $token);
                           echo " - Correo enviado con el token.";

                       } else {
                           echo " - Error al generar el token.";
                       }
                }else{
                    echo "Contraseña incorrecta";
                }
            }
        }


        if (isset($_POST['register'])) {
            $usuario = $_POST['reg_username'];
            $contrasena = $_POST['reg_password'];

            $hash = password_hash($contrasena, PASSWORD_ARGON2ID);

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

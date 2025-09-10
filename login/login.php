<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'dark-bg': '#0b090a',
                        'dark-card': '#161a1d',
                        'red-dark': '#660708',
                        'red-medium': '#a4161a',
                        'red-bright': '#ba181b',
                        'red-accent': '#e5383b',
                        'gray-medium': '#b1a7a6',
                        'gray-light': '#d3d3d3',
                        'gray-lighter': '#f5f3f4',
                        'white-pure': '#ffffff'
                    }
                }
            }
        }
    </script>
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #0b090a 0%, #161a1d 50%, #660708 100%);
        }
        
        .card-gradient {
            background: linear-gradient(145deg, #161a1d, #0b090a);
        }
        
        .input-focus:focus {
            box-shadow: 0 0 0 3px rgba(229, 56, 59, 0.3);
        }
        
        .btn-gradient {
            background: linear-gradient(135deg, #a4161a 0%, #ba181b 50%, #e5383b 100%);
        }
        
        .btn-gradient:hover {
            background: linear-gradient(135deg, #ba181b 0%, #e5383b 50%, #a4161a 100%);
        }
        
        .fade-in {
            animation: fadeIn 0.8s ease-in-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .slide-up {
            animation: slideUp 0.6s ease-out;
        }
        
        @keyframes slideUp {
            from { transform: translateY(50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        /* Modal specific styles */
        .modal-overlay {
            background-color: rgba(0, 0, 0, 0.7);
        }
        .modal-content {
            animation: zoomIn 0.3s ease-out;
        }
        @keyframes zoomIn {
            from { transform: scale(0.9); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }
    </style>
</head>
<body class="gradient-bg min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <!-- Sección del Logo/Encabezado -->
        <div class="text-center mb-8 fade-in">
            <div class="w-16 h-16 mx-auto mb-4 bg-red-accent rounded-full flex items-center justify-center">
                <svg class="w-8 h-8 text-white-pure" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-white-pure mb-2">Bienvenido</h1>
            <p class="text-gray-light">Accede a tu cuenta</p>
        </div>
        <!-- Card de Iniciar Sesión -->
        <div class="card-gradient rounded-2xl shadow-2xl p-6 slide-up">
            <h2 class="text-xl font-semibold text-white-pure mb-4 text-center">Iniciar Sesión</h2>
            
            <form id="loginForm" method="post" action="">
                <div class="space-y-4">
                    <div>
                        <label for="log_username" class="block text-sm font-medium text-gray-light mb-2">Usuario</label>
                        <input type="text" 
                               id="log_username" 
                               name="log_username" 
                               placeholder="Introduce tu usuario"
                               class="w-full px-4 py-3 bg-dark-bg border border-gray-medium rounded-lg text-white-pure placeholder-gray-medium focus:outline-none focus:border-red-accent input-focus transition-all duration-300"
                               required>
                    </div>
                    
                    <div>
                        <label for="log_password" class="block text-sm font-medium text-gray-light mb-2">Contraseña</label>
                        <div class="relative">
                            <input type="password" 
                                   id="log_password" 
                                   name="log_password" 
                                   placeholder="Introduce tu contraseña"
                                   class="w-full px-4 py-3 bg-dark-bg border border-gray-medium rounded-lg text-white-pure placeholder-gray-medium focus:outline-none focus:border-red-accent input-focus transition-all duration-300 pr-12"
                                   required>
                            <button type="button" 
                                    onclick="togglePassword('log_password')"
                                    class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-medium hover:text-red-accent transition-colors duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                
                <button type="submit" 
                        name="login"
                        id="loginButton"
                        class="w-full mt-6 py-3 px-4 btn-gradient text-white-pure font-semibold rounded-lg hover:shadow-lg transform hover:scale-105 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-red-accent focus:ring-opacity-50">
                    Iniciar Sesión
                </button>
            </form>

            <!-- Formulario oculto para enviar datos al PHP -->
            <form id="hiddenForm" method="post" action="" class="hidden">
                <input type="hidden" name="action" id="hidden_action">
                <input type="hidden" name="username" id="hidden_username">
                <input type="hidden" name="password" id="hidden_password">
                <input type="hidden" name="token" id="hidden_token">
            </form>
        </div>
        <!-- Pie de página -->
        <div class="text-center mt-6 fade-in">
            <p class="text-gray-medium text-sm">
                ¿Problemas para acceder? 
                <a href="#" class="text-red-accent hover:text-red-bright transition-colors duration-200">Contáctanos</a>
            </p>
        </div>
    </div>

    <!-- Modal para el Token -->
    <div id="tokenModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 hidden modal-overlay">
        <div class="card-gradient rounded-2xl shadow-2xl p-8 max-w-sm w-full modal-content">
            <h3 class="text-2xl font-bold text-white-pure mb-4 text-center">Verificación de Token</h3>
            <p class="text-gray-light text-center mb-6">Se ha enviado un token de acceso a tu correo electrónico.</p>
            <div class="space-y-4">
                <div>
                    <label for="tokenInput" class="block text-sm font-medium text-gray-light mb-2">Introduce el Token</label>
                    <input type="text" 
                           id="tokenInput" 
                           placeholder="Tu token de 6 dígitos"
                           class="w-full px-4 py-3 bg-dark-bg border border-gray-medium rounded-lg text-white-pure placeholder-gray-medium text-center tracking-widest text-lg focus:outline-none focus:border-red-accent input-focus transition-all duration-300"
                           maxlength="6"
                           required>
                </div>
                <button type="button" 
                        onclick="verifyToken()"
                        class="w-full py-3 px-4 btn-gradient text-white-pure font-semibold rounded-lg hover:shadow-lg transform hover:scale-105 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-red-accent focus:ring-opacity-50">
                    Verificar Token
                </button>
                <button type="button" 
                        onclick="resendToken()"
                        class="w-full py-3 px-4 bg-transparent border border-gray-medium text-gray-light font-semibold rounded-lg hover:bg-gray-medium hover:text-dark-bg transform hover:scale-105 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-gray-medium focus:ring-opacity-50">
                    Reenviar Token
                </button>
            </div>
            <button type="button" 
                    onclick="closeTokenModal()"
                    class="absolute top-4 right-4 text-gray-medium hover:text-white-pure transition-colors duration-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Procesamiento PHP (mantiene tu lógica original, ajustada para el flujo de token) -->
    <?php
    include '../php/conn.php';
    include '../correotoken.php'; // Asegúrate de que esta ruta sea correcta

    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        $usuario = $_POST['username'];
        $contrasena = $_POST['password']; // Se usa para verificar la primera vez
        $token_input = isset($_POST['token']) ? $_POST['token'] : '';

        // Lógica para el primer paso: verificar credenciales y enviar token
        if ($action === 'login_request') {
            $sql = "SELECT id, contrasena, email FROM usuarios WHERE usuario = ?";
            $stmt = $conexion->prepare($sql);
            mysqli_stmt_bind_param($stmt, "s", $usuario);
            mysqli_stmt_execute($stmt);
            $resultado = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($resultado)) {
                $hashGuardado = $row['contrasena'];
                if (password_verify($contrasena, $hashGuardado)) {
                    // Generar y enviar token
                    $token = bin2hex(random_bytes(3)); // Token de 6 caracteres
                    $token_hash = password_hash($token, PASSWORD_ARGON2ID);
                    
                    // Almacenar el token junto con el email para verificación
                    $sql_insert_token = "INSERT INTO tokens (usuario_id, token, creado_en, expiracion) VALUES (?, ?, NOW(), DATE_ADD(NOW(), INTERVAL 10 MINUTE))"; // Token expira en 10 min
                    $stmt_insert_token = $conexion->prepare($sql_insert_token);
                    mysqli_stmt_bind_param($stmt_insert_token, "is", $row['id'], $token_hash);
                    
                    if ($stmt_insert_token->execute()) {
                        mandarCorreo($row['email'], $token); // Asumiendo que mandarCorreo toma el email
                        // En lugar de usar JavaScript desde PHP, establecemos una variable de sesión
                        session_start();
                        $_SESSION['show_token_modal'] = true;
                        $_SESSION['token_username'] = $usuario;
                        $_SESSION['token_password'] = $contrasena;
                        $_SESSION['notification'] = ['message' => 'Token enviado a tu correo electrónico', 'type' => 'success'];
                    } else {
                        session_start();
                        $_SESSION['notification'] = ['message' => 'Error al generar el token', 'type' => 'error'];
                    }
                    $stmt_insert_token->close();

                } else {
                    session_start();
                    $_SESSION['notification'] = ['message' => 'Contraseña incorrecta', 'type' => 'error'];
                }
            } else {
                session_start();
                $_SESSION['notification'] = ['message' => 'Usuario no encontrado', 'type' => 'error'];
            }
            $stmt->close();
        } 
        // Lógica para el segundo paso: verificar el token
        else if ($action === 'verify_token' && !empty($token_input)) {
            $sql = "SELECT t.token, t.expiracion, u.id FROM tokens t JOIN usuarios u ON t.usuario_id = u.id WHERE u.usuario = ? ORDER BY t.creado_en DESC LIMIT 1";
            $stmt = $conexion->prepare($sql);
            mysqli_stmt_bind_param($stmt, "s", $usuario);
            mysqli_stmt_execute($stmt);
            $resultado = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($resultado)) {
                $token_hash_guardado = $row['token'];
                $expiracion = strtotime($row['expiracion']);

                if (password_verify($token_input, $token_hash_guardado) && time() < $expiracion) {
                    session_start();
                    $_SESSION['notification'] = ['message' => 'Inicio de sesión exitoso!', 'type' => 'success'];
                    // Eliminar el token usado para seguridad
                    $sql_delete_token = "DELETE FROM tokens WHERE token = ?";
                    $stmt_delete_token = $conexion->prepare($sql_delete_token);
                    mysqli_stmt_bind_param($stmt_delete_token, "s", $token_hash_guardado);
                    $stmt_delete_token->execute();
                    $stmt_delete_token->close();

                    // Redirigir después de un breve tiempo
                    header("Refresh: 2; url=dashboard.php");
                } else {
                    session_start();
                    $_SESSION['notification'] = ['message' => 'Token inválido o expirado', 'type' => 'error'];
                    $_SESSION['show_token_modal'] = true;
                    $_SESSION['token_username'] = $usuario;
                    $_SESSION['token_password'] = $contrasena;
                }
            } else {
                session_start();
                $_SESSION['notification'] = ['message' => 'No se encontró un token para este usuario', 'type' => 'error'];
            }
            $stmt->close();
        }
    }
    ?>
    <!-- Contenedor de Notificaciones -->
    <div id="notifications" class="fixed top-4 right-4 z-50 space-y-2"></div>
    <script>
        // Variables globales para el modal de token
        let currentUsername = '';
        let currentPassword = '';
        
        // Función para mostrar el modal de token
        function showTokenModal(username, password) {
            currentUsername = username;
            currentPassword = password;
            document.getElementById('tokenModal').classList.remove('hidden');
            document.getElementById('tokenInput').focus();
        }
        
        // Cerrar modal de token
        function closeTokenModal() {
            document.getElementById('tokenModal').classList.add('hidden');
            document.getElementById('tokenInput').value = '';
        }
        
        // Verificar token
        function verifyToken() {
            const token = document.getElementById('tokenInput').value.trim();
            
            if (!token) {
                showNotification('Por favor, introduce el token', 'error');
                return;
            }
            
            // Enviar segunda petición con el token
            document.getElementById('hidden_action').value = 'verify_token';
            document.getElementById('hidden_username').value = currentUsername;
            document.getElementById('hidden_password').value = currentPassword;
            document.getElementById('hidden_token').value = token;
            document.getElementById('hiddenForm').submit();
        }
        
        // Reenviar token
        function resendToken() {
            if (!currentUsername || !currentPassword) {
                showNotification('Error: Datos de sesión perdidos. Por favor, inicia sesión de nuevo.', 'error');
                closeTokenModal();
                return;
            }
            
            document.getElementById('hidden_action').value = 'login_request';
            document.getElementById('hidden_username').value = currentUsername;
            document.getElementById('hidden_password').value = currentPassword;
            document.getElementById('hidden_token').value = '';
            document.getElementById('hiddenForm').submit();
            
            showNotification('Reenviando token...', 'success');
            document.getElementById('tokenInput').value = '';
        }
        
        // Manejar el envío inicial del formulario de login
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const username = document.getElementById('log_username').value.trim();
            const password = document.getElementById('log_password').value.trim();
            
            if (!username || !password) {
                showNotification('Por favor, completa todos los campos', 'error');
                return;
            }

            currentUsername = username;
            currentPassword = password;
            
            // Enviar primera petición para generar y enviar token
            document.getElementById('hidden_action').value = 'login_request';
            document.getElementById('hidden_username').value = username;
            document.getElementById('hidden_password').value = password;
            document.getElementById('hidden_token').value = '';
            document.getElementById('hiddenForm').submit();
        });
        
        // Permitir envío con Enter en el campo de token
        document.getElementById('tokenInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                verifyToken();
            }
        });
        
        // Funcionalidad para mostrar/ocultar contraseña
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const type = field.getAttribute('type') === 'password' ? 'text' : 'password';
            field.setAttribute('type', type);
        }
        
        // Sistema de notificaciones
        function showNotification(message, type) {
            const notification = document.createElement('div');
            const bgColor = type === 'success' ? 'bg-green-600' : 'bg-red-600';
            
            notification.className = `${bgColor} text-white px-6 py-3 rounded-lg shadow-lg transform translate-x-full transition-transform duration-300 max-w-sm`;
            notification.innerHTML = `
                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium">${message}</span>
                    <button onclick="this.parentElement.parentElement.remove()" class="ml-4 text-white hover:text-gray-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            `;
            
            document.getElementById('notifications').appendChild(notification);
            
            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 100);
            
            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => {
                    if (notification.parentElement) {
                        notification.remove();
                    }
                }, 300);
            }, 5000);
        }
        
        // Validación de formularios
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const inputs = this.querySelectorAll('input[required]');
            let valid = true;
            
            inputs.forEach(input => {
                if (!input.value.trim()) {
                    input.classList.add('border-red-accent');
                    valid = false;
                } else {
                    input.classList.remove('border-red-accent');
                }
            });
            
            if (!valid) {
                e.preventDefault();
                showNotification('Por favor, completa todos los campos requeridos', 'error');
            }
        });
        
        // Efectos de enfoque en los campos de entrada
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('focus', function() {
                this.classList.add('ring-2', 'ring-red-accent', 'ring-opacity-50');
            });
            
            input.addEventListener('blur', function() {
                this.classList.remove('ring-2', 'ring-red-accent', 'ring-opacity-50');
            });
        });

        // Verificar si debemos mostrar el modal de token al cargar la página
        document.addEventListener('DOMContentLoaded', function() {
            <?php
            session_start();
            if (isset($_SESSION['show_token_modal']) && $_SESSION['show_token_modal']) {
                echo "showTokenModal('" . $_SESSION['token_username'] . "', '" . $_SESSION['token_password'] . "');";
                unset($_SESSION['show_token_modal']);
            }
            
            if (isset($_SESSION['notification'])) {
                echo "showNotification('" . $_SESSION['notification']['message'] . "', '" . $_SESSION['notification']['type'] . "');";
                unset($_SESSION['notification']);
            }
            ?>
        });
    </script>
</body>
</html>
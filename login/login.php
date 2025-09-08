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
    </style>
</head>
<body class="gradient-bg min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <!-- Logo/Header Section -->
        <div class="text-center mb-8 fade-in">
            <div class="w-16 h-16 mx-auto mb-4 bg-red-accent rounded-full flex items-center justify-center">
                <svg class="w-8 h-8 text-white-pure" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-white-pure mb-2">Bienvenido</h1>
            <p class="text-gray-light">Accede a tu cuenta o regístrate</p>
        </div>

        <!-- Tab Navigation -->
        <div class="card-gradient rounded-2xl shadow-2xl p-6 slide-up">
            <div class="flex mb-6 bg-dark-bg rounded-xl p-1">
                <button id="loginTab" class="flex-1 py-3 px-4 text-sm font-medium rounded-lg text-white-pure btn-gradient transition-all duration-300">
                    Iniciar Sesión
                </button>
                <button id="registerTab" class="flex-1 py-3 px-4 text-sm font-medium rounded-lg text-gray-medium hover:text-white-pure transition-all duration-300">
                    Registrarse
                </button>
            </div>

            <form method="post" action="">
                <!-- Login Form -->
                <div id="loginForm" class="space-y-6">
                    <h2 class="text-xl font-semibold text-white-pure mb-4">Iniciar Sesión</h2>
                    
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
                            class="w-full py-3 px-4 btn-gradient text-white-pure font-semibold rounded-lg hover:shadow-lg transform hover:scale-105 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-red-accent focus:ring-opacity-50">
                        Iniciar Sesión
                    </button>
                </div>

                <!-- Register Form -->
                <div id="registerForm" class="space-y-6 hidden">
                    <h2 class="text-xl font-semibold text-white-pure mb-4">Crear Cuenta</h2>
                    
                    <div class="space-y-4">
                        <div>
                            <label for="reg_username" class="block text-sm font-medium text-gray-light mb-2">Usuario</label>
                            <input type="text" 
                                   id="reg_username" 
                                   name="reg_username" 
                                   placeholder="Introduce tu usuario"
                                   class="w-full px-4 py-3 bg-dark-bg border border-gray-medium rounded-lg text-white-pure placeholder-gray-medium focus:outline-none focus:border-red-accent input-focus transition-all duration-300">
                        </div>
                        
                        <div>
                            <label for="reg_password" class="block text-sm font-medium text-gray-light mb-2">Contraseña</label>
                            <div class="relative">
                                <input type="password" 
                                       id="reg_password" 
                                       name="reg_password" 
                                       placeholder="Introduce tu contraseña"
                                       class="w-full px-4 py-3 bg-dark-bg border border-gray-medium rounded-lg text-white-pure placeholder-gray-medium focus:outline-none focus:border-red-accent input-focus transition-all duration-300 pr-12">
                                <button type="button" 
                                        onclick="togglePassword('reg_password')"
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
                            name="register"
                            class="w-full py-3 px-4 btn-gradient text-white-pure font-semibold rounded-lg hover:shadow-lg transform hover:scale-105 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-red-accent focus:ring-opacity-50">
                        Registrarse
                    </button>
                </div>
            </form>
        </div>

        <!-- Footer -->
        <div class="text-center mt-6 fade-in">
            <p class="text-gray-medium text-sm">
                ¿Problemas para acceder? 
                <a href="#" class="text-red-accent hover:text-red-bright transition-colors duration-200">Contáctanos</a>
            </p>
        </div>
    </div>

    <!-- PHP Processing (mantiene tu lógica original) -->
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
                echo '<script>
                    document.addEventListener("DOMContentLoaded", function() {
                        showNotification("Iniciaste sesión correctamente", "success");
                    });
                </script>';
                
                $token = bin2hex(random_bytes(16));
                $token_hash = password_hash($token, PASSWORD_ARGON2ID);
                $sql = "INSERT INTO tokens (usuario_id, token, creado_en, expiracion) VALUES (?, ?, NOW(), DATE_ADD(NOW(), INTERVAL 1 HOUR))";
                $stmt = $conexion->prepare($sql);
                mysqli_stmt_bind_param($stmt,"is",$row['id'], $token_hash);
                mysqli_stmt_execute($stmt);
                
                if ($stmt->affected_rows > 0) {
                    setcookie("auth_token", $token, time() + 3600, "/", "", false, true);
                    mandarCorreo($usuario, $token);
                    echo '<script>
                        setTimeout(function() {
                            showNotification("Token generado y correo enviado", "success");
                        }, 1000);
                    </script>';
                } else {
                    echo '<script>
                        document.addEventListener("DOMContentLoaded", function() {
                            showNotification("Error al generar el token", "error");
                        });
                    </script>';
                }
            } else {
                echo '<script>
                    document.addEventListener("DOMContentLoaded", function() {
                        showNotification("Contraseña incorrecta", "error");
                    });
                </script>';
            }
        } else {
            echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    showNotification("Usuario no encontrado", "error");
                });
            </script>';
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
            echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    showNotification("Usuario registrado correctamente", "success");
                });
            </script>';
        } else {
            echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    showNotification("Error: Usuario ya existe o datos inválidos", "error");
                });
            </script>';
        }
        $stmt->close();
    }
    ?>

    <!-- Notification Container -->
    <div id="notifications" class="fixed top-4 right-4 z-50 space-y-2"></div>

    <script>
        // Tab switching functionality
        document.getElementById('loginTab').addEventListener('click', function() {
            switchTab('login');
        });

        document.getElementById('registerTab').addEventListener('click', function() {
            switchTab('register');
        });

        function switchTab(tab) {
            const loginTab = document.getElementById('loginTab');
            const registerTab = document.getElementById('registerTab');
            const loginForm = document.getElementById('loginForm');
            const registerForm = document.getElementById('registerForm');

            if (tab === 'login') {
                loginTab.className = "flex-1 py-3 px-4 text-sm font-medium rounded-lg text-white-pure btn-gradient transition-all duration-300";
                registerTab.className = "flex-1 py-3 px-4 text-sm font-medium rounded-lg text-gray-medium hover:text-white-pure transition-all duration-300";
                loginForm.classList.remove('hidden');
                registerForm.classList.add('hidden');
            } else {
                registerTab.className = "flex-1 py-3 px-4 text-sm font-medium rounded-lg text-white-pure btn-gradient transition-all duration-300";
                loginTab.className = "flex-1 py-3 px-4 text-sm font-medium rounded-lg text-gray-medium hover:text-white-pure transition-all duration-300";
                registerForm.classList.remove('hidden');
                loginForm.classList.add('hidden');
            }
        }

        // Password toggle functionality
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const type = field.getAttribute('type') === 'password' ? 'text' : 'password';
            field.setAttribute('type', type);
        }

        // Notification system
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
            
            // Animate in
            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 100);
            
            // Auto remove after 5 seconds
            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => {
                    if (notification.parentElement) {
                        notification.remove();
                    }
                }, 300);
            }, 5000);
        }

        // Form validation
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function(e) {
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
        });

        // Input focus effects
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('scale-105');
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('scale-105');
            });
        });
    </script>
</body>
</html>
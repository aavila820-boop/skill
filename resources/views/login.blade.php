<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillLink - Acceso</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0051a5 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
        }

        .auth-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            max-width: 450px;
            width: 100%;
            animation: slideUp 0.5s ease;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .auth-header {
            background: linear-gradient(135deg, #0051a5 0%, #764ba2 100%);
            padding: 2.5rem 2rem;
            text-align: center;
            color: white;
        }

        .logo-auth {
            width: 70px;
            height: 70px;
            background: white;
            border-radius: 15px;
            margin: 0 auto 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .logo-auth img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .auth-header h1 {
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
        }

        .auth-header p {
            opacity: 0.9;
            font-size: 0.95rem;
        }

        .auth-body {
            padding: 2.5rem 2rem;
        }

        .tab-container {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .tab-button {
            flex: 1;
            padding: 0.8rem;
            border: 2px solid #e0e0e0;
            background: white;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            color: #666;
        }

        .tab-button.active {
            background: #0051a5;
            color: white;
            border-color: #0051a5;
        }

        .tab-button:hover:not(.active) {
            border-color: #0051a5;
            color: #0051a5;
        }

        .form-container {
            display: none;
        }

        .form-container.active {
            display: block;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #333;
            font-size: 0.95rem;
        }

        .form-group input {
            width: 100%;
            padding: 0.9rem 1rem;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 1rem;
            transition: border-color 0.3s;
            font-family: inherit;
        }

        .form-group input:focus {
            outline: none;
            border-color: #0051a5;
        }

        .form-group input.error {
            border-color: #e74c3c;
        }

        .error-message {
            color: #e74c3c;
            font-size: 0.85rem;
            margin-top: 0.3rem;
            display: none;
        }

        .error-message.show {
            display: block;
        }

        .password-container {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1.2rem;
            color: #666;
        }

        .forgot-password {
            text-align: right;
            margin-top: 0.5rem;
        }

        .forgot-password a {
            color: #667eea;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        .submit-button {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, #0051a5 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
            margin-top: 1rem;
        }

        .submit-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }

        .submit-button:active {
            transform: translateY(0);
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 1.5rem 0;
            color: #999;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #e0e0e0;
        }

        .divider span {
            padding: 0 1rem;
            font-size: 0.9rem;
        }

        .google-button {
            width: 100%;
            padding: 0.9rem;
            background: white;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.8rem;
            transition: all 0.3s;
            color: #333;
        }

        .google-button:hover {
            border-color: #0051a5;
            background: #f8f9fa;
        }

        .google-icon {
            width: 20px;
            height: 20px;
        }

        .terms {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.85rem;
            color: #666;
            line-height: 1.5;
        }

        .terms a {
            color: #0051a5;
            text-decoration: none;
            font-weight: 500;
        }

        .terms a:hover {
            text-decoration: underline;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .checkbox-group input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
        }

        .checkbox-group label {
            margin: 0;
            font-weight: 400;
            font-size: 0.9rem;
            cursor: pointer;
        }

        /* Responsive */
        @media (max-width: 480px) {
            body {
                padding: 1rem;
            }

            .auth-body {
                padding: 2rem 1.5rem;
            }

            .auth-header h1 {
                font-size: 1.5rem;
            }
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="auth-container">
        <!-- Header -->
        <div class="auth-header">
            <div class="logo-auth">
                <img src="./images/uwu2.jpeg" alt="SkillLink Logo">
            </div>
            <h1>SkillLink</h1>
            <p>Conecta con los mejores mentores</p>
        </div>

        <!-- Body -->
        <div class="auth-body">
            <!-- Tabs -->
            <div class="tab-container">
                <button class="tab-button active" id="login-tab" onclick="switchTab('login')">Iniciar Sesión</button>
                <button class="tab-button" id="register-tab" onclick="switchTab('register')">Registrarse</button>
            </div>

            <!-- Login Form -->
            <div id="login-form" class="form-container active">
                <form onsubmit="handleLogin(event)">
                    <div class="form-group">
                        <label for="login-email">Correo Electrónico</label>
                        <input 
                            type="email" 
                            id="login-email" 
                            placeholder="tu@email.com"
                            required
                        >
                        <span class="error-message" id="login-email-error"></span>
                    </div>

                    <div class="form-group">
                        <label for="login-password">Contraseña</label>
                        <div class="password-container">
                            <input 
                                type="password" 
                                id="login-password" 
                                placeholder="••••••••"
                                required
                            >
                            <button type="button" class="toggle-password" onclick="togglePassword('login-password')">
                                👁️
                            </button>
                        </div>
                        <span class="error-message" id="login-password-error"></span>
                    </div>

                    <div class="checkbox-group">
                        <input type="checkbox" id="remember-me">
                        <label for="remember-me">Recordarme</label>
                    </div>

                    <div class="forgot-password">
                        <a href="#">¿Olvidaste tu contraseña?</a>
                    </div>

                    <button type="submit" class="submit-button">Iniciar Sesión</button>
                </form>

                <div class="divider">
                    <span>O continúa con</span>
                </div>

                <button class="google-button" onclick="handleGoogleAuth()">
                    <svg class="google-icon" viewBox="0 0 24 24">
                        <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                        <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                        <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                        <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                    </svg>
                    Continuar con Google
                </button>
            </div>

            <!-- Register Form -->
            <div id="register-form" class="form-container">
                <form onsubmit="handleRegister(event)">
                    <div class="form-group">
                        <label for="register-name">Nombre Completo</label>
                        <input 
                            type="text" 
                            id="register-name" 
                            placeholder="Juan Pérez"
                            required
                        >
                        <span class="error-message" id="register-name-error"></span>
                    </div>

                    <div class="form-group">
                        <label for="register-email">Correo Electrónico</label>
                        <input 
                            type="email" 
                            id="register-email" 
                            placeholder="tu@email.com"
                            required
                        >
                        <span class="error-message" id="register-email-error"></span>
                    </div>

                    <div class="form-group">
                        <label for="register-password">Contraseña</label>
                        <div class="password-container">
                            <input 
                                type="password" 
                                id="register-password" 
                                placeholder="Mínimo 8 caracteres"
                                required
                                minlength="8"
                            >
                            <button type="button" class="toggle-password" onclick="togglePassword('register-password')">
                                👁️
                            </button>
                        </div>
                        <span class="error-message" id="register-password-error"></span>
                    </div>

                    <div class="form-group">
                        <label for="register-confirm-password">Confirmar Contraseña</label>
                        <div class="password-container">
                            <input 
                                type="password" 
                                id="register-confirm-password" 
                                placeholder="Repite tu contraseña"
                                required
                            >
                            <button type="button" class="toggle-password" onclick="togglePassword('register-confirm-password')">
                                👁️
                            </button>
                        </div>
                        <span class="error-message" id="register-confirm-password-error"></span>
                    </div>

                    <div class="checkbox-group">
                        <input type="checkbox" id="accept-terms" required>
                        <label for="accept-terms">Acepto los <a href="#">Términos y Condiciones</a></label>
                    </div>

                    <button type="submit" class="submit-button">Crear Cuenta</button>
                </form>

                <div class="divider">
                    <span>O regístrate con</span>
                </div>

                <button class="google-button" onclick="handleGoogleAuth()">
                    <svg class="google-icon" viewBox="0 0 24 24">
                        <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                        <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                        <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                        <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                    </svg>
                    Continuar con Google
                </button>

                <div class="terms">
                    Al registrarte, aceptas nuestra <a href="#">Política de Privacidad</a> y nuestros <a href="#">Términos de Servicio</a>
                </div>
            </div>
        </div>
    </div>

    
<script>
    function switchTab(tab) {
        const loginTab = document.getElementById('login-tab');
        const registerTab = document.getElementById('register-tab');
        const loginForm = document.getElementById('login-form');
        const registerForm = document.getElementById('register-form');

        if (tab === 'login') {
            loginTab.classList.add('active');
            registerTab.classList.remove('active');
            loginForm.classList.add('active');
            registerForm.classList.remove('active');
        } else if (tab === 'register') {
            registerTab.classList.add('active');
            loginTab.classList.remove('active');
            registerForm.classList.add('active');
            loginForm.classList.remove('active');
        }
    }

    function togglePassword(inputId) {
        const input = document.getElementById(inputId);
        const button = input.parentElement.querySelector('.toggle-password');

        if (input.type === 'password') {
            input.type = 'text';
            button.textContent = '🙈';
        } else {
            input.type = 'password';
            button.textContent = '👁️';
        }
    }

    async function handleLogin(event) {
        event.preventDefault();
        
        const email = document.getElementById('login-email').value;
        const password = document.getElementById('login-password').value;
        const remember = document.getElementById('remember-me').checked;

        if (!email || !password) {
            alert('Por favor completa todos los campos');
            return;
        }

        try {
            const response = await fetch('/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    email: email,
                    password: password,
                    remember: remember
                })
            });

            const data = await response.json();

            if (response.ok && data.success) {
                window.location.href = '/dashboard';
            } else {
                alert(data.message || 'Error al iniciar sesión');
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Error al conectar con el servidor');
        }
    }

    async function handleRegister(event) {
        event.preventDefault();
        
        const name = document.getElementById('register-name').value;
        const email = document.getElementById('register-email').value;
        const password = document.getElementById('register-password').value;
        const confirmPassword = document.getElementById('register-confirm-password').value;
        const acceptTerms = document.getElementById('accept-terms').checked;

        if (!name || !email || !password || !confirmPassword) {
            alert('Por favor completa todos los campos');
            return;
        }

        if (password !== confirmPassword) {
            alert('Las contraseñas no coinciden');
            return;
        }

        if (password.length < 8) {
            alert('La contraseña debe tener al menos 8 caracteres');
            return;
        }

        if (!acceptTerms) {
            alert('Debes aceptar los términos y condiciones');
            return;
        }

        try {
            const response = await fetch('/register', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    name: name,
                    email: email,
                    password: password,
                    password_confirmation: confirmPassword
                })
            });

            const data = await response.json();

            if (response.ok && data.success) {
                window.location.href = '/dashboard';
            } else {
                alert(data.message || 'Error al registrarse');
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Error al conectar con el servidor');
        }
    }

    function handleGoogleAuth() {
        window.location.href = '/auth/google';
    }
</script>


</body>
</html>

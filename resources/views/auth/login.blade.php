<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - SkillLink UNAB</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #FF8C00 0%, #9B30FF 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1rem;
        position: relative;
        overflow: hidden;
    }

    /* Efecto de fondo animado con círculos */
    body::before {
        content: '';
        position: absolute;
        width: 500px;
        height: 500px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        top: -250px;
        right: -250px;
        animation: float 8s ease-in-out infinite;
    }

    body::after {
        content: '';
        position: absolute;
        width: 300px;
        height: 300px;
        background: rgba(255, 255, 255, 0.08);
        border-radius: 50%;
        bottom: -150px;
        left: -150px;
        animation: float 6s ease-in-out infinite reverse;
    }

    @keyframes float {
        0%, 100% {
            transform: translateY(0) scale(1);
        }
        50% {
            transform: translateY(-20px) scale(1.05);
        }
    }

    .container {
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        width: 100%;
        max-width: 450px;
        padding: 2.5rem;
        position: relative;
        z-index: 10;
        animation: slideUp 0.5s ease-out;
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

    .header {
        text-align: center;
        margin-bottom: 2rem;
        position: relative;
    }

    .logo {
        font-size: 3rem;
        margin-bottom: 0.5rem;
        animation: bounce 1s ease-in-out;
    }

    @keyframes bounce {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px);
        }
    }

    .title {
        font-size: 2rem;
        background: linear-gradient(135deg, #FF8C00, #9B30FF);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-weight: 800;
        letter-spacing: -0.5px;
    }

    .subtitle {
        color: #666;
        font-size: 0.95rem;
        margin-top: 0.5rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    label {
        display: block;
        font-weight: 600;
        color: #333;
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
    }

    input[type="email"],
    input[type="password"],
    input[type="text"] {
        width: 100%;
        padding: 0.9rem 1rem;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        font-size: 1rem;
        transition: all 0.3s;
        font-family: inherit;
    }

    input:focus {
        outline: none;
        border-color: #FF8C00;
        box-shadow: 0 0 0 4px rgba(255, 140, 0, 0.1);
        transform: translateY(-2px);
    }

    input::placeholder {
        color: #aaa;
    }

    .btn {
        width: 100%;
        padding: 1rem;
        background: linear-gradient(135deg, #FF8C00 0%, #FFA500 100%);
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 1.05rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s;
        box-shadow: 0 4px 15px rgba(255, 140, 0, 0.3);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn:hover {
        background: linear-gradient(135deg, #FFA500 0%, #FF8C00 100%);
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(255, 140, 0, 0.4);
    }

    .btn:active {
        transform: translateY(-1px);
    }

    .register-link {
        text-align: center;
        margin-top: 1.5rem;
        color: #666;
        font-size: 0.95rem;
    }

    .register-link a {
        color: #9B30FF;
        text-decoration: none;
        font-weight: 700;
        transition: all 0.3s;
    }

    .register-link a:hover {
        color: #FF8C00;
        text-decoration: underline;
    }

    .error {
        background: linear-gradient(135deg, #f8d7da, #f5c6cb);
        color: #721c24;
        padding: 1rem;
        border-radius: 10px;
        margin-bottom: 1.5rem;
        border-left: 4px solid #dc3545;
        font-weight: 500;
        animation: shake 0.5s;
    }

    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-10px); }
        75% { transform: translateX(10px); }
    }

    .success {
        background: linear-gradient(135deg, #d4edda, #c3e6cb);
        color: #155724;
        padding: 1rem;
        border-radius: 10px;
        margin-bottom: 1.5rem;
        border-left: 4px solid #28a745;
        font-weight: 500;
    }

    /* Decoración adicional */
    .divider {
        display: flex;
        align-items: center;
        text-align: center;
        margin: 1.5rem 0;
    }

    .divider::before,
    .divider::after {
        content: '';
        flex: 1;
        border-bottom: 1px solid #e0e0e0;
    }

    .divider span {
        padding: 0 1rem;
        color: #999;
        font-size: 0.85rem;
        font-weight: 600;
    }

    /* Input con iconos */
    .input-group {
        position: relative;
    }

    .input-icon {
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #999;
        font-size: 1.2rem;
        pointer-events: none;
    }

    input:focus + .input-icon {
        color: #FF8C00;
    }
</style>

</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">🔐</div>
            <h1 class="title">Iniciar Sesión</h1>
        </div>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="error">❌ {{ $error }}</div>
            @endforeach
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Correo Electrónico *</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Contraseña *</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="btn">🔓 Iniciar Sesión</button>

            <div class="register-link">
                ¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate aquí</a>
            </div>
        </form>
    </div>
</body>
</html>

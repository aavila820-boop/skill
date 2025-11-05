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
            background: linear-gradient(135deg, #0051a5 0%, #003d7a 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }

        .container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 450px;
            padding: 2.5rem;
        }

        .header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .logo {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }

        .title {
            font-size: 1.8rem;
            color: #0051a5;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            font-weight: 600;
            color: #333;
            margin-bottom: 0.5rem;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        input:focus {
            outline: none;
            border-color: #0051a5;
            box-shadow: 0 0 0 3px rgba(0, 81, 165, 0.1);
        }

        .btn {
            width: 100%;
            padding: 0.9rem;
            background: linear-gradient(135deg, #0051a5 0%, #003d7a 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 81, 165, 0.3);
        }

        .register-link {
            text-align: center;
            margin-top: 1.5rem;
            color: #666;
        }

        .register-link a {
            color: #0051a5;
            text-decoration: none;
            font-weight: 600;
        }

        .error {
            background: #f8d7da;
            color: #721c24;
            padding: 0.8rem;
            border-radius: 8px;
            margin-bottom: 1rem;
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

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil - SkillLink UNAB</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            color: #333;
        }

        /* ========== HEADER CON COLORES UNAB ========== */
        header {
            background: linear-gradient(135deg, #FF8C00 0%, #FFA500 100%);
            color: white;
            padding: 1.5rem 0;
            box-shadow: 0 4px 12px rgba(255, 140, 0, 0.3);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo-section {
            display: flex;
            align-items: center;
            gap: 1rem;
            text-decoration: none;
            color: white;
            transition: transform 0.3s;
        }

        .logo-section:hover {
            transform: scale(1.05);
        }

        .logo-icon {
            width: 45px;
            height: 45px;
            background: white;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: #FF8C00;
            font-size: 1.2rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        }

        .logout-btn {
            background: rgba(255, 255, 255, 0.25);
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.4);
            padding: 0.6rem 1.3rem;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
        }

        .logout-btn:hover {
            background: rgba(255, 255, 255, 0.35);
            border-color: white;
            transform: translateY(-2px);
        }

        .main-container {
            max-width: 600px;
            margin: 2.5rem auto;
            padding: 2rem;
        }

        /* Card mejorada */
        .card {
            background: white;
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
            border-top: 4px solid;
            border-image: linear-gradient(90deg, #FF8C00, #9B30FF);
            border-image-slice: 1;
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

        .card-title {
            font-size: 1.8rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, #FF8C00, #9B30FF);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.6rem;
            font-weight: 700;
            color: #333;
            font-size: 0.95rem;
        }

        input,
        textarea {
            width: 100%;
            padding: 0.95rem 1rem;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            font-family: inherit;
            font-size: 1rem;
            transition: all 0.3s;
        }

        input::placeholder,
        textarea::placeholder {
            color: #aaa;
        }

        input:focus,
        textarea:focus {
            outline: none;
            border-color: #FF8C00;
            box-shadow: 0 0 0 4px rgba(255, 140, 0, 0.1);
            transform: translateY(-2px);
        }

        textarea {
            resize: vertical;
            min-height: 120px;
        }

        .error {
            color: #e74c3c;
            font-size: 0.85rem;
            margin-top: 0.5rem;
            font-weight: 600;
            animation: shake 0.5s;
        }

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-5px);
            }

            75% {
                transform: translateX(5px);
            }
        }

        .button-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn {
            padding: 1rem;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #FF8C00, #FFA500);
            color: white;
            box-shadow: 0 4px 15px rgba(255, 140, 0, 0.3);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #FFA500, #FF8C00);
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(255, 140, 0, 0.4);
        }

        .btn-primary:active {
            transform: translateY(-1px);
        }

        .btn-secondary {
            background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
            color: #333;
            border: 2px solid #e0e0e0;
        }

        .btn-secondary:hover {
            background: #e0e0e0;
            border-color: #FF8C00;
            color: #FF8C00;
            transform: translateY(-2px);
        }

        /* Alertas mejoradas */
        .alert {
            padding: 1.2rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            border-left: 4px solid;
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-success {
            background: linear-gradient(135deg, #d4edda, #c3e6cb);
            color: #155724;
            border-color: #28a745;
        }

        .alert-error {
            background: linear-gradient(135deg, #f8d7da, #f5c6cb);
            color: #721c24;
            border-color: #e74c3c;
        }

        .alert-warning {
            background: linear-gradient(135deg, #fff3cd, #ffeaa7);
            color: #856404;
            border-color: #ffc107;
        }

        .alert-info {
            background: linear-gradient(135deg, #d1ecf1, #bee5eb);
            color: #0c5460;
            border-color: #17a2b8;
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 768px) {
            .main-container {
                padding: 1rem;
            }

            .card {
                padding: 1.5rem;
            }

            .card-title {
                font-size: 1.5rem;
            }

            .button-group {
                grid-template-columns: 1fr;
            }

            .btn {
                padding: 0.9rem;
            }
        }
    </style>

</head>

<body>
    <header>
        <div class="header-container">
            <a href="{{ route('dashboard') }}" class="logo-section">
                <div class="logo-icon">SK</div>
                <div style="font-size: 1.5rem; font-weight: bold;">SkillLink</div>
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-btn">Cerrar Sesión</button>
            </form>
        </div>
    </header>

    <div class="main-container">
        <div class="card">
            <div class="card-title">✏️ Editar Mi Perfil</div>

            @if ($errors->any())
                <div class="alert alert-error">
                    Hay errores en el formulario
                </div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="form-group">
                    <label for="name">Nombre Completo *</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                    @error('name')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Correo Electrónico *</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                        required>
                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="program">Programa</label>
                    <input type="text" id="program" name="program" value="{{ old('program', $user->program) }}"
                        placeholder="Ej: Ingeniería de Sistemas">
                </div>

                <div class="form-group">
                    <label for="bio">Biografía</label>
                    <textarea id="bio" name="bio" placeholder="Cuéntanos sobre ti...">{{ old('bio', $user->bio) }}</textarea>
                    @error('bio')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="avatar">Foto de Perfil</label>
                    <input type="file" id="avatar" name="avatar" accept="image/*">
                    <small style="color: #666;">Máximo 2MB. Formatos: JPEG, PNG, JPG, GIF</small>
                </div>

                <div class="button-group">
                    <a href="{{ route('profile') }}" class="btn btn-secondary">← Cancelar</a>
                    <button type="submit" class="btn btn-primary">💾 Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>

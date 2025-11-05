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
            background: #f5f7fa;
            color: #333;
        }

        header {
            background: linear-gradient(135deg, #0051a5 0%, #003d7a 100%);
            color: white;
            padding: 1.5rem 0;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
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
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: white;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: #0051a5;
        }

        .logout-btn {
            background: rgba(255,255,255,0.2);
            color: white;
            border: none;
            padding: 0.6rem 1.2rem;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
        }

        .main-container {
            max-width: 600px;
            margin: 2rem auto;
            padding: 2rem;
        }

        .card {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 1.5rem;
            color: #333;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #333;
        }

        input,
        textarea {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            font-family: inherit;
            font-size: 1rem;
        }

        input:focus,
        textarea:focus {
            outline: none;
            border-color: #0051a5;
            box-shadow: 0 0 0 3px rgba(0, 81, 165, 0.1);
        }

        textarea {
            resize: vertical;
            min-height: 120px;
        }

        .error {
            color: #e74c3c;
            font-size: 0.85rem;
            margin-top: 0.3rem;
        }

        .button-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn {
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-primary {
            background: #0051a5;
            color: white;
        }

        .btn-primary:hover {
            background: #003d7a;
        }

        .btn-secondary {
            background: #f0f0f0;
            color: #333;
        }

        .btn-secondary:hover {
            background: #e0e0e0;
        }

        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
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

            @if($errors->any())
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
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                    @error('email')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="program">Programa</label>
                    <input type="text" id="program" name="program" value="{{ old('program', $user->program) }}" placeholder="Ej: Ingeniería de Sistemas">
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

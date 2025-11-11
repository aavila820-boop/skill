<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse - SkillLink UNAB</title>
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

    /* Efecto de fondo animado */
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
        max-width: 550px;
        padding: 2.5rem;
        position: relative;
        z-index: 10;
        animation: slideUp 0.5s ease-out;
        max-height: 90vh;
        overflow-y: auto;
    }

    /* Scrollbar personalizado */
    .container::-webkit-scrollbar {
        width: 8px;
    }

    .container::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    .container::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, #FF8C00, #9B30FF);
        border-radius: 10px;
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

    input[type="text"],
    input[type="email"],
    input[type="password"],
    input[type="number"],
    select,
    textarea {
        width: 100%;
        padding: 0.9rem 1rem;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        font-size: 1rem;
        font-family: inherit;
        transition: all 0.3s;
    }

    input:focus,
    select:focus,
    textarea:focus {
        outline: none;
        border-color: #FF8C00;
        box-shadow: 0 0 0 4px rgba(255, 140, 0, 0.1);
        transform: translateY(-2px);
    }

    input::placeholder,
    textarea::placeholder {
        color: #aaa;
    }

    textarea {
        resize: vertical;
        min-height: 100px;
    }

    select {
        cursor: pointer;
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23FF8C00' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        padding-right: 2.5rem;
    }

    /* Checkbox mejorado */
    .checkbox-group {
        background: linear-gradient(135deg, #fff9f0 0%, #f9f0ff 100%);
        padding: 1.2rem;
        border-radius: 12px;
        border: 2px solid #e0e0e0;
        display: flex;
        align-items: center;
        gap: 1rem;
        cursor: pointer;
        margin-bottom: 1.5rem;
        transition: all 0.3s;
        position: relative;
        overflow: hidden;
    }

    .checkbox-group::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 5px;
        height: 100%;
        background: linear-gradient(180deg, #FF8C00, #9B30FF);
        transform: scaleY(0);
        transition: transform 0.3s;
    }

    .checkbox-group:hover {
        border-color: #FF8C00;
        box-shadow: 0 4px 15px rgba(255, 140, 0, 0.2);
    }

    .checkbox-group:hover::before {
        transform: scaleY(1);
    }

    .checkbox-group input[type="checkbox"] {
        width: 22px;
        height: 22px;
        cursor: pointer;
        accent-color: #FF8C00;
    }

    .checkbox-label {
        font-weight: 600;
        color: #333;
        margin: 0;
        cursor: pointer;
        flex: 1;
        font-size: 1.05rem;
    }

    /* Sección oculta del mentor */
    .hidden-section {
        display: none;
        background: linear-gradient(135deg, #fff9f0 0%, #f9f0ff 100%);
        padding: 1.5rem;
        border-radius: 15px;
        border: 2px solid #e0e0e0;
        margin-bottom: 1.5rem;
        animation: slideDown 0.3s ease-out;
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

    .hidden-section.active {
        display: block;
    }

    .hidden-section h3 {
        color: #FF8C00;
        margin-bottom: 1rem;
        font-size: 1.2rem;
    }

    /* Opciones de tipo de mentor */
    .mentor-type-options {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .mentor-option {
        background: white;
        border: 2px solid #e0e0e0;
        padding: 1.2rem;
        border-radius: 12px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s;
        position: relative;
        overflow: hidden;
    }

    .mentor-option::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #FF8C00, #9B30FF);
        transform: scaleX(0);
        transition: transform 0.3s;
    }

    .mentor-option:hover {
        border-color: #FF8C00;
        background: linear-gradient(135deg, #fff9f0 0%, #ffffff 100%);
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(255, 140, 0, 0.2);
    }

    .mentor-option:hover::before {
        transform: scaleX(1);
    }

    .mentor-option input[type="radio"] {
        display: none;
    }

    .mentor-option.selected {
        border-color: #9B30FF;
        background: linear-gradient(135deg, #f9f0ff 0%, #ffffff 100%);
        box-shadow: 0 6px 20px rgba(155, 48, 255, 0.2);
    }

    .mentor-option.selected::before {
        transform: scaleX(1);
    }

    .mentor-option.selected .mentor-content {
        color: #9B30FF;
    }

    .mentor-content {
        font-weight: 700;
        font-size: 1.1rem;
        transition: color 0.3s;
    }

    .mentor-icon {
        font-size: 2.5rem;
        margin-bottom: 0.5rem;
    }

    /* Botón principal */
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

    .login-link {
        text-align: center;
        margin-top: 1.5rem;
        color: #666;
        font-size: 0.95rem;
    }

    .login-link a {
        color: #9B30FF;
        text-decoration: none;
        font-weight: 700;
        transition: all 0.3s;
    }

    .login-link a:hover {
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

    @media (max-width: 480px) {
        .mentor-type-options {
            grid-template-columns: 1fr;
        }

        .container {
            padding: 1.5rem;
        }

        .title {
            font-size: 1.6rem;
        }
    }
</style>

</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">📚</div>
            <h1 class="title">Crear Cuenta</h1>
        </div>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="error">❌ {{ $error }}</div>
            @endforeach
        @endif

        <form method="POST" action="{{ route('register.store') }}" id="registerForm">
            @csrf

            <!-- Sección Básica -->
            <div class="form-group">
                <label for="name">Nombre Completo *</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
            </div>

            <div class="form-group">
                <label for="email">Correo UNAB *</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label for="password">Contraseña *</label>
                <input type="password" id="password" name="password" required minlength="8">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmar Contraseña *</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required minlength="8">
            </div>

            <!-- Opción de ser Tutor -->
            <label class="checkbox-group">
                <input type="checkbox" id="wantToMentor" name="want_to_be_mentor" value="1" onchange="toggleMentorOptions()">
                <span class="checkbox-label">👨‍🏫 Quiero ser Tutor</span>
            </label>

            <!-- Sección de Tutor (oculta inicialmente) -->
            <div id="mentorSection" class="hidden-section">
                <h3 style="margin-bottom: 1rem; color: #0051a5;">¿Qué tipo de tutor eres?</h3>

                <div class="mentor-type-options">
                    <label class="mentor-option" onclick="selectMentorType('professor', this)">
                        <input type="radio" name="mentor_type" value="professor" onchange="updateMentorFields()">
                        <div class="mentor-content">
                            <div class="mentor-icon">👨‍🏫</div>
                            <div>Profesor/Docente</div>
                        </div>
                    </label>

                    <label class="mentor-option" onclick="selectMentorType('student', this)">
                        <input type="radio" name="mentor_type" value="student" onchange="updateMentorFields()">
                        <div class="mentor-content">
                            <div class="mentor-icon">👨‍💼</div>
                            <div>Estudiante Avanzado</div>
                        </div>
                    </label>
                </div>

                <!-- Campos comunes -->
                <div class="form-group">
                    <label for="specialization">Especialización *</label>
                    <input type="text" id="specialization" name="specialization" placeholder="Ej: Programación, Cálculo">
                </div>

                <div class="form-group">
                    <label for="experience">Experiencia *</label>
                    <textarea id="experience" name="experience" placeholder="Describe tu experiencia en esta área..."></textarea>
                </div>

                <!-- Campos para PROFESOR -->
                <div id="professorFields" style="display: none;">
                    <div class="form-group">
                        <label for="yearsExperience">Años de Experiencia *</label>
                        <input type="number" id="yearsExperience" name="years_experience" min="1" max="50" placeholder="Ej: 5">
                    </div>

                    <div class="form-group">
                        <label for="achievements">Logros Académicos *</label>
                        <textarea id="achievements" name="achievements" placeholder="Menciona tus logros, certificaciones, publicaciones..."></textarea>
                    </div>
                </div>

                <!-- Campos para ESTUDIANTE -->
                <div id="studentFields" style="display: none;">
                    <div class="form-group">
                        <label for="averageGrade">Promedio Acumulado *</label>
                        <input type="number" id="averageGrade" name="average_grade" min="0" max="5" step="0.1" placeholder="Ej: 4.5">
                    </div>

                    <div class="form-group">
                        <label for="semester">Semestre Actual *</label>
                        <select id="semester" name="semester">
                            <option value="">-- Selecciona tu semestre --</option>
                            @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}">{{ $i }}° Semestre</option>
                            @endfor
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="areaSpecialty">Área de Especialización *</label>
                        <input type="text" id="areaSpecialty" name="area_specialty" placeholder="Ej: Ingeniería de Sistemas">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn">✍️ Registrarse</button>

            <div class="login-link">
                ¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión aquí</a>
            </div>
        </form>
    </div>

    <script>
        function toggleMentorOptions() {
            const checkbox = document.getElementById('wantToMentor');
            const mentorSection = document.getElementById('mentorSection');
            
            if (checkbox.checked) {
                mentorSection.classList.add('active');
            } else {
                mentorSection.classList.remove('active');
                // Limpiar valores
                document.querySelectorAll('input[name="mentor_type"]').forEach(r => r.checked = false);
                document.getElementById('professorFields').style.display = 'none';
                document.getElementById('studentFields').style.display = 'none';
            }
        }

        function selectMentorType(type, element) {
            // Desmarcar todas las opciones
            document.querySelectorAll('.mentor-option').forEach(opt => {
                opt.classList.remove('selected');
                opt.querySelector('input').checked = false;
            });

            // Marcar la seleccionada
            element.classList.add('selected');
            element.querySelector('input').checked = true;

            updateMentorFields();
        }

        function updateMentorFields() {
            const type = document.querySelector('input[name="mentor_type"]:checked')?.value;

            if (type === 'professor') {
                document.getElementById('professorFields').style.display = 'block';
                document.getElementById('studentFields').style.display = 'none';
                // Hacer required los campos de profesor
                document.getElementById('yearsExperience').required = true;
                document.getElementById('achievements').required = true;
                document.getElementById('averageGrade').required = false;
                document.getElementById('semester').required = false;
                document.getElementById('areaSpecialty').required = false;
            } else if (type === 'student') {
                document.getElementById('professorFields').style.display = 'none';
                document.getElementById('studentFields').style.display = 'block';
                // Hacer required los campos de estudiante
                document.getElementById('yearsExperience').required = false;
                document.getElementById('achievements').required = false;
                document.getElementById('averageGrade').required = true;
                document.getElementById('semester').required = true;
                document.getElementById('areaSpecialty').required = true;
            }
        }
    </script>
</body>
</html>

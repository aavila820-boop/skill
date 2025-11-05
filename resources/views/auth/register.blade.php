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
            max-width: 550px;
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

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 1rem;
            font-family: inherit;
            transition: border-color 0.3s;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #0051a5;
            box-shadow: 0 0 0 3px rgba(0, 81, 165, 0.1);
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .checkbox-group {
            background: #f9f9f9;
            padding: 1rem;
            border-radius: 8px;
            border: 2px solid #e0e0e0;
            display: flex;
            align-items: center;
            gap: 1rem;
            cursor: pointer;
            margin-bottom: 1.5rem;
            transition: all 0.3s;
        }

        .checkbox-group:hover {
            border-color: #0051a5;
            background: #f0f7ff;
        }

        .checkbox-group input[type="checkbox"] {
            width: 20px;
            height: 20px;
            cursor: pointer;
            accent-color: #0051a5;
        }

        .checkbox-label {
            font-weight: 600;
            color: #333;
            margin: 0;
            cursor: pointer;
            flex: 1;
        }

        .hidden-section {
            display: none;
            background: #f9f9f9;
            padding: 1.5rem;
            border-radius: 10px;
            border: 2px solid #e0e0e0;
            margin-bottom: 1.5rem;
        }

        .hidden-section.active {
            display: block;
        }

        .mentor-type-options {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .mentor-option {
            background: white;
            border: 2px solid #e0e0e0;
            padding: 1rem;
            border-radius: 8px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
        }

        .mentor-option:hover {
            border-color: #0051a5;
            background: #f0f7ff;
        }

        .mentor-option input[type="radio"] {
            display: none;
        }

        .mentor-option input[type="radio"]:checked + .mentor-content {
            color: #0051a5;
        }

        .mentor-option.selected {
            border-color: #0051a5;
            background: #e3f2fd;
        }

        .mentor-content {
            font-weight: 600;
            font-size: 1.1rem;
        }

        .mentor-icon {
            font-size: 2rem;
            margin-bottom: 0.5rem;
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

        .login-link {
            text-align: center;
            margin-top: 1.5rem;
            color: #666;
        }

        .login-link a {
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

        @media (max-width: 480px) {
            .mentor-type-options {
                grid-template-columns: 1fr;
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

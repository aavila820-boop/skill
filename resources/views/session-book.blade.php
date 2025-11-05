<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Tutoría - SkillLink UNAB</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e8ecf1 100%);
            min-height: 100vh;
            padding: 2rem 0;
        }

        .booking-container {
            max-width: 700px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        .booking-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .booking-header {
            background: linear-gradient(135deg, #0051a5 0%, #003d7a 100%);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .booking-header h1 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
            font-weight: 700;
        }

        .booking-header p {
            opacity: 0.9;
            font-size: 0.95rem;
        }

        .booking-body {
            padding: 2.5rem;
        }

        .mentor-selected {
            background: linear-gradient(135deg, #e8f4ff 0%, #f0f8ff 100%);
            border-left: 5px solid #0051a5;
            padding: 1.5rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .mentor-avatar {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #0051a5 0%, #003d7a 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            flex-shrink: 0;
        }

        .mentor-info h3 {
            color: #0051a5;
            margin: 0 0 0.3rem 0;
            font-size: 1.1rem;
        }

        .mentor-info p {
            color: #666;
            margin: 0;
            font-size: 0.9rem;
        }

        .form-section {
            margin-bottom: 2.5rem;
        }

        .form-section:last-child {
            margin-bottom: 0;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
            font-weight: 600;
            color: #0051a5;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .form-row.full {
            grid-template-columns: 1fr;
        }

        .form-row.three-cols {
            grid-template-columns: 1fr 1fr 1fr;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: 600;
            margin-bottom: 0.6rem;
            color: #333;
            font-size: 0.95rem;
        }

        .required {
            color: #dc3545;
            margin-left: 0.3rem;
        }

        input, select, textarea {
            padding: 0.85rem;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-family: inherit;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background-color: #fafbfc;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #0051a5;
            background-color: white;
            box-shadow: 0 0 0 3px rgba(0, 81, 165, 0.1);
        }

        textarea {
            resize: vertical;
            min-height: 120px;
            font-family: inherit;
        }

        .form-hint {
            font-size: 0.8rem;
            color: #999;
            margin-top: 0.4rem;
        }

        .alert {
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            border-left: 4px solid;
            font-weight: 500;
        }

        .alert-error {
            background: #fff5f5;
            color: #721c24;
            border-color: #dc3545;
        }

        .button-group {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 1rem;
            margin-top: 2.5rem;
            padding-top: 2rem;
            border-top: 2px solid #f0f0f0;
        }

        .btn {
            padding: 1rem;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            text-decoration: none;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-submit {
            background: linear-gradient(135deg, #0051a5 0%, #003d7a 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(0, 81, 165, 0.3);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 81, 165, 0.4);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .btn-back {
            background: #f0f0f0;
            color: #333;
            border: 2px solid #e0e0e0;
        }

        .btn-back:hover {
            background: #e8e8e8;
            border-color: #d0d0d0;
        }

        .form-divider {
            width: 100%;
            height: 1px;
            background: linear-gradient(to right, transparent, #ddd, transparent);
            margin: 2rem 0 1.5rem 0;
        }

        @media (max-width: 600px) {
            .booking-body {
                padding: 1.5rem;
            }

            .form-row, .form-row.three-cols {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .button-group {
                grid-template-columns: 1fr;
            }

            .booking-header h1 {
                font-size: 1.5rem;
            }

            .mentor-selected {
                flex-direction: column;
                text-align: center;
            }

            .mentor-avatar {
                width: 50px;
                height: 50px;
            }
        }
    </style>
</head>
<body>
    <div class="booking-container">
        <div class="booking-card">
            <div class="booking-header">
                <h1>📅 Agendar Tutoría</h1>
                <p>Completa los detalles de tu sesión de aprendizaje</p>
            </div>

            <div class="booking-body">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-error">
                        ❌ {{ $error }}
                    </div>
                    @endforeach
                @endif

                @if($selectedMentor)
                <div class="mentor-selected">
                    <div class="mentor-avatar">👨‍🏫</div>
                    <div class="mentor-info">
                        <h3>{{ $selectedMentor->user->name }}</h3>
                        <p>{{ $selectedMentor->program }}</p>
                    </div>
                </div>
                @endif

                <form method="POST" action="{{ route('session.store') }}">
                    @csrf

                    @if($mentorId)
                    <input type="hidden" name="mentor_id" value="{{ $mentorId }}">
                    @else
                    <div class="form-section">
                        <div class="section-title">👨‍🏫 Tutor</div>
                        <div class="form-group">
                            <label for="mentor_id">
                                Selecciona tu tutor <span class="required">*</span>
                            </label>
                            <select name="mentor_id" id="mentor_id" required>
                                <option value="">-- Elige un tutor --</option>
                                @foreach($mentors as $mentor)
                                <option value="{{ $mentor->id }}">
                                    {{ $mentor->user->name }} — {{ $mentor->program }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @endif

                    <div class="form-section">
                        <div class="section-title">📚 Materia</div>
                        <div class="form-row full">
                            <div class="form-group">
                                <label for="subject_id">
                                    ¿Qué materia? <span class="required">*</span>
                                </label>
                                <select name="subject_id" id="subject_id" required>
                                    <option value="">-- Selecciona una materia --</option>
                                    @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-divider"></div>

                    <div class="form-section">
                        <div class="section-title">🗓️ Cuándo</div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="scheduled_date">
                                    Fecha <span class="required">*</span>
                                </label>
                                <input type="date" id="scheduled_date" required>
                            </div>
                            <div class="form-group">
                                <label for="scheduled_time">
                                    Hora <span class="required">*</span>
                                </label>
                                <input type="time" id="scheduled_time" required>
                            </div>
                        </div>
                        <input type="hidden" name="scheduled_at" id="scheduled_at">
                    </div>

                    <div class="form-section">
                        <div class="section-title">⏱️ Duración</div>
                        <div class="form-row full">
                            <div class="form-group">
                                <label for="duration">
                                    ¿Cuánto tiempo? <span class="required">*</span>
                                </label>
                                <select name="duration" id="duration" required>
                                    <option value="">-- Selecciona duración --</option>
                                    <option value="30">30 minutos</option>
                                    <option value="45">45 minutos</option>
                                    <option value="60" selected>1 hora (60 minutos)</option>
                                    <option value="90">1.5 horas (90 minutos)</option>
                                    <option value="120">2 horas (120 minutos)</option>
                                    <option value="150">2.5 horas (150 minutos)</option>
                                    <option value="180">3 horas (180 minutos)</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-divider"></div>

                    <div class="form-section">
                        <div class="section-title">🌐 Tipo de Sesión</div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="type">
                                    Modalidad <span class="required">*</span>
                                </label>
                                <select name="type" id="type" required onchange="toggleLocation()">
                                    <option value="virtual">🌐 Virtual (Online)</option>
                                    <option value="presencial">📍 Presencial</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="location">
                                    Ubicación
                                </label>
                                <input type="text" name="location" id="location" placeholder="Ej: Biblioteca, Aula 101..." disabled>
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <div class="section-title">💬 Información Adicional</div>
                        <div class="form-row full">
                            <div class="form-group">
                                <label for="notes">
                                    Notas para tu tutor
                                </label>
                                <textarea name="notes" id="notes" placeholder="Cuéntale qué temas quieres cubrir, qué dificultades tienes, preguntas específicas..."></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="button-group">
                        <a href="{{ route('dashboard') }}" class="btn btn-back">
                            ← Volver
                        </a>
                        <button type="submit" class="btn btn-submit">
                            ✓ Agendar Tutoría
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Combinar fecha y hora
        const dateInput = document.getElementById('scheduled_date');
        const timeInput = document.getElementById('scheduled_time');
        const scheduledAtInput = document.getElementById('scheduled_at');

        function updateDateTime() {
            if (dateInput.value && timeInput.value) {
                scheduledAtInput.value = dateInput.value + 'T' + timeInput.value;
            }
        }

        dateInput.addEventListener('change', updateDateTime);
        timeInput.addEventListener('change', updateDateTime);

        // Habilitar/Deshabilitar ubicación
        function toggleLocation() {
            const typeSelect = document.getElementById('type');
            const locationInput = document.getElementById('location');
            if (typeSelect.value === 'presencial') {
                locationInput.disabled = false;
                locationInput.focus();
            } else {
                locationInput.disabled = true;
                locationInput.value = '';
            }
        }

        // Al cargar, verificar el estado
        toggleLocation();
    </script>
</body>
</html>

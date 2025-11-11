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
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            min-height: 100vh;
            padding: 2rem 0;
        }

        .booking-container {
            max-width: 700px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        /* Card de booking mejorada */
        .booking-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
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

        /* Header con colores UNAB */
        .booking-header {
            background: linear-gradient(135deg, #FF8C00 0%, #FFA500 100%);
            color: white;
            padding: 2.5rem 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .booking-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.08'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            opacity: 0.3;
        }

        .booking-header h1 {
            font-size: 2.2rem;
            margin-bottom: 0.5rem;
            font-weight: 800;
            position: relative;
            z-index: 1;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.15);
        }

        .booking-header p {
            opacity: 0.95;
            font-size: 0.95rem;
            position: relative;
            z-index: 1;
        }

        .booking-body {
            padding: 2.5rem;
        }

        /* Mentor seleccionado mejorado */
        .mentor-selected {
            background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
            border-left: 5px solid #FF8C00;
            padding: 1.5rem;
            border-radius: 15px;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 1.2rem;
            box-shadow: 0 3px 12px rgba(255, 140, 0, 0.15);
        }

        .mentor-avatar {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #FF8C00, #9B30FF);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: white;
            flex-shrink: 0;
            box-shadow: 0 4px 15px rgba(155, 48, 255, 0.3);
        }

        .mentor-info h3 {
            color: #FF8C00;
            margin: 0 0 0.3rem 0;
            font-size: 1.15rem;
            font-weight: 700;
        }

        .mentor-info p {
            color: #666;
            margin: 0;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .form-section {
            margin-bottom: 2.5rem;
        }

        .form-section:last-child {
            margin-bottom: 0;
        }

        /* Título de sección mejorado */
        .section-title {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            margin-bottom: 1.5rem;
            font-weight: 700;
            color: #9B30FF;
            font-size: 1.05rem;
            text-transform: uppercase;
            letter-spacing: 0.6px;
        }

        .section-title::before {
            content: '';
            width: 4px;
            height: 20px;
            background: linear-gradient(180deg, #FF8C00, #9B30FF);
            border-radius: 2px;
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
            font-weight: 700;
            margin-bottom: 0.6rem;
            color: #333;
            font-size: 0.95rem;
        }

        .required {
            color: #e74c3c;
            margin-left: 0.3rem;
        }

        input,
        select,
        textarea {
            padding: 0.95rem 1rem;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            font-family: inherit;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background-color: #fafbfc;
        }

        input::placeholder,
        select::placeholder,
        textarea::placeholder {
            color: #aaa;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #FF8C00;
            background-color: white;
            box-shadow: 0 0 0 4px rgba(255, 140, 0, 0.1);
            transform: translateY(-2px);
        }

        textarea {
            resize: vertical;
            min-height: 120px;
            font-family: inherit;
        }

        .form-hint {
            font-size: 0.8rem;
            color: #999;
            margin-top: 0.5rem;
            font-weight: 500;
        }

        /* Alertas mejoradas */
        .alert {
            padding: 1.2rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            border-left: 5px solid;
            font-weight: 600;
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

        .alert-error {
            background: linear-gradient(135deg, #f8d7da, #f5c6cb);
            color: #721c24;
            border-color: #e74c3c;
        }

        .alert-success {
            background: linear-gradient(135deg, #d4edda, #c3e6cb);
            color: #155724;
            border-color: #28a745;
        }

        .button-group {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 1.2rem;
            margin-top: 2.5rem;
            padding-top: 2rem;
            border-top: 2px solid;
            border-image: linear-gradient(90deg, transparent, #e0e0e0, transparent);
            border-image-slice: 1;
        }

        .btn {
            padding: 1.1rem;
            border: none;
            border-radius: 12px;
            font-weight: 700;
            cursor: pointer;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            text-decoration: none;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.6rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-submit {
            background: linear-gradient(135deg, #FF8C00 0%, #FFA500 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(255, 140, 0, 0.3);
        }

        .btn-submit:hover {
            background: linear-gradient(135deg, #FFA500, #FF8C00);
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(255, 140, 0, 0.4);
        }

        .btn-submit:active {
            transform: translateY(-1px);
        }

        .btn-back {
            background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
            color: #333;
            border: 2px solid #e0e0e0;
        }

        .btn-back:hover {
            background: #e8e8e8;
            border-color: #FF8C00;
            color: #FF8C00;
            transform: translateY(-2px);
        }

        /* Divisor de formulario */
        .form-divider {
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, #ddd, transparent);
            margin: 2rem 0 1.5rem 0;
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 600px) {
            .booking-body {
                padding: 1.5rem;
            }

            .form-row,
            .form-row.three-cols {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .button-group {
                grid-template-columns: 1fr;
            }

            .booking-header h1 {
                font-size: 1.6rem;
            }

            .mentor-selected {
                flex-direction: column;
                text-align: center;
            }

            .mentor-avatar {
                width: 60px;
                height: 60px;
                font-size: 1.5rem;
            }

            .section-title {
                font-size: 0.95rem;
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

                @if ($selectedMentor)
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

                    @if ($mentorId)
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
                                    @foreach ($mentors as $mentor)
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
                                    @foreach ($subjects as $subject)
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
                                <input type="text" name="location" id="location"
                                    placeholder="Ej: Biblioteca, Aula 101..." disabled>
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
                                <textarea name="notes" id="notes"
                                    placeholder="Cuéntale qué temas quieres cubrir, qué dificultades tienes, preguntas específicas..."></textarea>
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

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SkillLink UNAB</title>
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
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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

        .logo-title {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .logout-btn {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: none;
            padding: 0.6rem 1.2rem;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
            transition: background 0.3s;
        }

        .logout-btn:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .nav-tabs {
            background: white;
            border-bottom: 1px solid #e0e0e0;
            display: flex;
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .nav-tab {
            padding: 1rem 0;
            border: none;
            background: none;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 500;
            color: #666;
            border-bottom: 3px solid transparent;
            transition: all 0.3s;
        }

        .nav-tab.active {
            color: #0051a5;
            border-bottom-color: #0051a5;
        }

        .nav-tab:hover {
            color: #0051a5;
        }

        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .section {
            display: none;
        }

        .section.active {
            display: block;
        }

        .welcome-section {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            margin-bottom: 2rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .welcome-title {
            font-size: 2rem;
            margin-bottom: 0.5rem;
            color: #0051a5;
        }

        .welcome-subtitle {
            color: #666;
            margin-bottom: 1.5rem;
        }

        .welcome-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn {
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary {
            background: linear-gradient(135deg, #0051a5 0%, #003d7a 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 81, 165, 0.3);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: #0051a5;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: #666;
            font-weight: 500;
        }

        .section-title {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            color: #333;
            border-bottom: 2px solid #0051a5;
            padding-bottom: 0.5rem;
        }

        .mentors-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
        }

        .mentor-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            text-align: center;
            border: 2px solid #e0e0e0;
            transition: all 0.3s;
            cursor: pointer;
        }

        .mentor-card:hover {
            border-color: #0051a5;
            box-shadow: 0 4px 12px rgba(0, 81, 165, 0.2);
            transform: translateY(-5px);
        }

        .mentor-avatar {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #0051a5 0%, #003d7a 100%);
            border-radius: 50%;
            margin: 0 auto 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
        }

        .mentor-name {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 0.3rem;
            color: #333;
        }

        .mentor-specialty {
            color: #0051a5;
            font-weight: 500;
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }

        .mentor-subjects {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            justify-content: center;
            margin-bottom: 1rem;
        }

        .subject-tag {
            background: #e3f2fd;
            color: #0051a5;
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .mentor-rating {
            color: #ff9800;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .book-btn {
            width: 100%;
            padding: 0.8rem;
            background: #0051a5;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
        }

        .book-btn:hover {
            background: #003d7a;
        }

        .empty-state {
            text-align: center;
            padding: 2rem;
            color: #999;
        }

        .empty-state-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        /* Modal Styles */
        #bookingModal {
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            display: none;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background-color: white;
            padding: 2.5rem;
            border-radius: 15px;
            width: 95%;
            max-width: 600px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            max-height: 90vh;
            overflow-y: auto;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            border-bottom: 2px solid #0051a5;
            padding-bottom: 1rem;
        }

        .modal-title {
            font-size: 1.8rem;
            font-weight: bold;
            color: #0051a5;
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #666;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #333;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-family: inherit;
            font-size: 1rem;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #0051a5;
            box-shadow: 0 0 0 3px rgba(0, 81, 165, 0.1);
        }

        .mentor-info {
            background: #f0f7ff;
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            border-left: 4px solid #0051a5;
        }

        .mentor-info-label {
            font-size: 0.9rem;
            color: #666;
        }

        .mentor-info-name {
            font-size: 1.3rem;
            font-weight: bold;
            color: #0051a5;
            margin-top: 0.3rem;
        }

        .modal-buttons {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .modal-btn {
            padding: 0.9rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            font-size: 1rem;
        }

        .modal-btn-cancel {
            background: #f0f0f0;
            color: #333;
        }

        .modal-btn-submit {
            background: linear-gradient(135deg, #0051a5 0%, #003d7a 100%);
            color: white;
        }

        @media (max-width: 768px) {
            .header-container {
                flex-direction: column;
                gap: 1rem;
            }

            .mentors-grid {
                grid-template-columns: 1fr;
            }

            .modal-content {
                width: 90%;
                padding: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <div class="header-container">
            <div class="logo-section">
                <div class="logo-icon">SK</div>
                <div class="logo-title">SkillLink UNAB</div>
            </div>
            <div class="nav-right">
                <div class="user-info">
                    <div class="user-avatar">{{ substr($user->name, 0, 1) }}</div>
                    <div>
                        <div style="font-weight: 600;">{{ $user->name }}</div>
                        <div style="font-size: 0.85rem; opacity: 0.9;">{{ $user->email }}</div>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                    @csrf
                    <button type="submit" class="logout-btn">Cerrar Sesión</button>
                </form>
            </div>
        </div>
    </header>

    <!-- Navigation tabs -->
    <div class="nav-tabs">
        <button class="nav-tab active" onclick="switchTab('overview', event)">📊 Resumen</button>
        <button class="nav-tab" onclick="switchTab('mentors', event)">👨‍🏫 Buscar Mentores</button>
        <button class="nav-tab" onclick="switchTab('sessions', event)">📅 Mis Tutorías</button>
        <button class="nav-tab" onclick="switchTab('profile', event)">👤 Mi Perfil</button>
    </div>

    <!-- Main content -->
    <div class="main-container">

        <!-- OVERVIEW Tab -->
        <div id="overview" class="section active">
            <div class="welcome-section">
                <h1 class="welcome-title">¡Bienvenido, {{ $user->name }}! 👋</h1>
                <p class="welcome-subtitle">Selecciona una opción para continuar con tu experiencia de aprendizaje</p>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number">{{ $completedSessions }}</div>
                    <div class="stat-label">Tutorías Completadas</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ count($upcomingSessions) }}</div>
                    <div class="stat-label">Próximas Tutorías</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ number_format($totalHours, 1) }}</div>
                    <div class="stat-label">Horas de Estudio</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ $averageRating ? number_format($averageRating, 1) : 'N/A' }}</div>
                    <div class="stat-label">Calificación Promedio</div>
                </div>
            </div>
        </div>

        <!-- MENTORS Tab -->
        <div id="mentors" class="section">
            <h2 class="section-title">👨‍🏫 Buscar Mentores</h2>
            <p style="color: #666; margin-bottom: 1.5rem;">Elige un mentor para agendar tu tutoría</p>

            @if (count($mentors) > 0)
                <div class="mentors-grid">
                    @foreach ($mentors as $mentor)
                        <div class="mentor-card">
                            <div class="mentor-avatar">👨‍🏫</div>
                            <div class="mentor-name">{{ $mentor->user->name }}</div>
                            <div class="mentor-specialty">{{ $mentor->program }}</div>
                            <div style="color: #666; font-size: 0.9rem; margin-bottom: 1rem;">
                                ⭐ {{ number_format($mentor->average_rating, 1) }} | {{ $mentor->total_sessions }}
                                tutorías
                            </div>

                            @if ($mentor->subjects->count() > 0)
                                <div class="mentor-subjects">
                                    @foreach ($mentor->subjects as $subject)
                                        <span class="subject-tag">{{ $subject->name }}</span>
                                    @endforeach
                                </div>
                            @endif

                            <button class="book-btn"
                                onclick="openBookingModal({{ $mentor->id }}, '{{ $mentor->user->name }}')">
                                📅 Solicitar Tutoría
                            </button>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <div class="empty-state-icon">🔍</div>
                    <p>No hay mentores disponibles en este momento</p>
                </div>
            @endif
        </div>

        <!-- SESSIONS Tab -->
        <div id="sessions" class="section">
            <h2 class="section-title">📅 Mis Tutorías</h2>
            @if (count($upcomingSessions) > 0)
                <div style="display: grid; gap: 1rem;">
                    @foreach ($upcomingSessions as $session)
                        <div
                            style="background: white; padding: 1.5rem; border-radius: 10px; border-left: 4px solid #0051a5;">
                            <div style="display: flex; justify-content: space-between; margin-bottom: 1rem;">
                                <div style="font-weight: 600; color: #0051a5;">
                                    {{ $session->mentor->user->name }} - {{ $session->subject->name }}
                                </div>
                                <span
                                    style="background: #d4edda; color: #155724; padding: 0.3rem 0.8rem; border-radius: 20px; font-size: 0.8rem; font-weight: 600;">
                                    {{ ucfirst($session->status) }}
                                </span>
                            </div>
                            <div
                                style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 1rem; font-size: 0.9rem; color: #666;">
                                <div><strong>📅</strong> {{ $session->scheduled_at->format('d/m/Y H:i') }}</div>
                                <div><strong>⏱️</strong> {{ $session->duration }} min</div>
                                <div><strong>🌐</strong> {{ ucfirst($session->type) }}</div>
                                @if ($session->location)
                                    <div><strong>📍</strong> {{ $session->location }}</div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <div class="empty-state-icon">📭</div>
                    <p>No tienes tutorías agendadas</p>
                    <button class="btn btn-primary" onclick="switchTab('mentors', event)" style="margin-top: 1rem;">
                        Buscar Mentor Ahora
                    </button>
                </div>
            @endif
        </div>

        <!-- PROFILE Tab -->
        <div id="profile" class="section">
            <h2 class="section-title">👤 Mi Perfil</h2>
            <div style="background: white; padding: 2rem; border-radius: 12px; max-width: 500px;">
                <div style="margin-bottom: 1.5rem;">
                    <label style="font-weight: 600; color: #333;">Nombre</label>
                    <div style="padding: 0.8rem; background: #f9f9f9; border-radius: 8px; margin-top: 0.5rem;">
                        {{ $user->name }}
                    </div>
                </div>
                <div style="margin-bottom: 1.5rem;">
                    <label style="font-weight: 600; color: #333;">Email</label>
                    <div style="padding: 0.8rem; background: #f9f9f9; border-radius: 8px; margin-top: 0.5rem;">
                        {{ $user->email }}
                    </div>
                </div>
                <div style="margin-bottom: 1.5rem;">
                    <label style="font-weight: 600; color: #333;">Programa</label>
                    <div style="padding: 0.8rem; background: #f9f9f9; border-radius: 8px; margin-top: 0.5rem;">
                        {{ $user->program ?? 'No especificado' }}
                    </div>
                </div>
                <a href="/profile/edit" class="btn btn-primary">✏️ Editar Perfil</a>

            </div>
        </div>

    </div>

    <!-- Modal para agendar tutorías -->
    <div id="bookingModal">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">📅 Agendar Tutoría</div>
                <button class="modal-close" onclick="closeBookingModal()">✕</button>
            </div>

            <form id="bookingForm" onsubmit="submitBooking(event)">
                @csrf
                <input type="hidden" id="mentor_id" name="mentor_id">

                <div class="mentor-info">
                    <div class="mentor-info-label">Mentor Seleccionado:</div>
                    <div class="mentor-info-name" id="mentor_name"></div>
                </div>

                <div class="form-group">
                    <label for="subject_id">Materia *</label>
                    <select id="subject_id" name="subject_id" required>
                        <option value="">-- Selecciona una materia --</option>
                        @foreach ($mentors as $mentor)
                            @foreach ($mentor->subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="scheduled_date">📅 Fecha *</label>
                    <input type="date" id="scheduled_date" name="scheduled_date" required>
                </div>

                <div class="form-group">
                    <label for="scheduled_time">🕐 Hora *</label>
                    <input type="time" id="scheduled_time" name="scheduled_time" required>
                </div>

                <div class="form-group">
                    <label for="duration">⏱️ Duración *</label>
                    <select id="duration" name="duration" required>
                        <option value="">-- Selecciona duración --</option>
                        <option value="30">30 minutos</option>
                        <option value="60">1 hora</option>
                        <option value="90">1 hora 30 minutos</option>
                        <option value="120">2 horas</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>🌐 Tipo de Sesión *</label>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-top: 0.5rem;">
                        <label
                            style="display: flex; align-items: center; cursor: pointer; padding: 0.8rem; border: 2px solid #e0e0e0; border-radius: 8px; font-weight: 500;">
                            <input type="radio" name="type" value="virtual" required
                                style="margin-right: 0.5rem;">
                            Virtual
                        </label>
                        <label
                            style="display: flex; align-items: center; cursor: pointer; padding: 0.8rem; border: 2px solid #e0e0e0; border-radius: 8px; font-weight: 500;">
                            <input type="radio" name="type" value="presencial" required
                                style="margin-right: 0.5rem;">
                            Presencial
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="location">📍 Lugar / Ubicación</label>
                    <input type="text" id="location" name="location"
                        placeholder="Ej: Biblioteca, Sala 301, Link de Zoom...">
                </div>

                <div class="form-group">
                    <label for="notes">📝 Notas adicionales</label>
                    <textarea id="notes" name="notes" placeholder="Cuéntale al mentor qué necesitas ayuda..."
                        style="min-height: 100px; resize: vertical;"></textarea>
                </div>

                <div class="modal-buttons">
                    <button type="button" class="modal-btn modal-btn-cancel"
                        onclick="closeBookingModal()">Cancelar</button>
                    <button type="submit" class="modal-btn modal-btn-submit">✓ Agendar Tutoría</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function switchTab(tabName, event) {
            event.preventDefault();

            document.querySelectorAll('.section').forEach(section => {
                section.classList.remove('active');
            });

            document.querySelectorAll('.nav-tab').forEach(tab => {
                tab.classList.remove('active');
            });

            document.getElementById(tabName).classList.add('active');
            event.target.classList.add('active');
        }

        function openBookingModal(mentorId, mentorName) {
            document.getElementById('mentor_id').value = mentorId;
            document.getElementById('mentor_name').textContent = mentorName;
            document.getElementById('bookingModal').style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        function closeBookingModal() {
            document.getElementById('bookingModal').style.display = 'none';
            document.getElementById('bookingForm').reset();
            document.body.style.overflow = 'auto';
        }

        async function submitBooking(event) {
            event.preventDefault();

            const mentorId = document.getElementById('mentor_id').value;
            const subjectId = document.getElementById('subject_id').value;
            const date = document.getElementById('scheduled_date').value;
            const time = document.getElementById('scheduled_time').value;
            const duration = document.getElementById('duration').value;
            const type = document.querySelector('input[name="type"]:checked');

            if (!mentorId || !subjectId || !date || !time || !duration || !type) {
                alert('❌ Por favor completa todos los campos requeridos (*)');
                return;
            }

            const scheduled_at = `${date}T${time}`;

            const formData = new FormData();
            formData.append('mentor_id', mentorId);
            formData.append('subject_id', subjectId);
            formData.append('scheduled_at', scheduled_at);
            formData.append('duration', duration);
            formData.append('type', type.value);
            formData.append('location', document.getElementById('location').value);
            formData.append('notes', document.getElementById('notes').value);

            try {
                const response = await fetch('/session', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: formData
                });

                // Cierra el modal inmediatamente
                closeBookingModal();

                // Muestra mensaje de éxito
                alert('✅ ¡Tutoría agendada exitosamente!');

                // Recarga la página después de 1 segundo
                setTimeout(() => {
                    location.reload();
                }, 1000);

            } catch (error) {
                console.error('Error:', error);
                alert('❌ Error al conectar con el servidor');
            }

        }

        window.onclick = function(event) {
            const modal = document.getElementById('bookingModal');
            if (event.target === modal) {
                closeBookingModal();
            }
        }

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeBookingModal();
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('scheduled_date').setAttribute('min', today);
        });
    </script>

</body>

</html>

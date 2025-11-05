<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mentor - SkillLink UNAB</title>
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
            flex-wrap: wrap;
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

        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            border-left: 4px solid;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border-color: #28a745;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border-color: #dc3545;
        }

        .section {
            display: none;
        }

        .section.active {
            display: block;
        }

        .section-title {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            color: #333;
            border-bottom: 2px solid #0051a5;
            padding-bottom: 0.5rem;
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

        .tutoring-list {
            display: grid;
            gap: 1rem;
        }

        .tutoring-card {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            border-left: 4px solid #0051a5;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .tutoring-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 1rem;
        }

        .tutoring-title {
            font-weight: 600;
            color: #0051a5;
            font-size: 1.1rem;
        }

        .tutoring-status {
            display: inline-block;
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .status-pending {
            background: #fff3cd;
            color: #856404;
        }

        .status-confirmed {
            background: #d4edda;
            color: #155724;
        }

        .tutoring-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1rem;
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 1rem;
        }

        .detail-item {
            display: flex;
            flex-direction: column;
        }

        .detail-label {
            font-weight: 600;
            color: #0051a5;
            font-size: 0.85rem;
        }

        .detail-value {
            margin-top: 0.3rem;
        }

        .tutoring-actions {
            display: flex;
            gap: 0.5rem;
            margin-top: 1rem;
        }

        .action-btn {
            padding: 0.6rem 1rem;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            font-size: 0.9rem;
            transition: all 0.3s;
        }

        .btn-confirm {
            background: #d4edda;
            color: #155724;
        }

        .btn-confirm:hover {
            background: #c3e6cb;
        }

        .btn-complete {
            background: #d1ecf1;
            color: #0c5460;
        }

        .btn-complete:hover {
            background: #bee5eb;
        }

        .empty-state {
            text-align: center;
            padding: 2rem;
            color: #999;
            background: white;
            border-radius: 10px;
        }

        .empty-state-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
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
        }

        .mentor-specialty {
            color: #0051a5;
            font-weight: 600;
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
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
            margin-top: 1rem;
        }

        .book-btn:hover {
            background: #003d7a;
        }

        @media (max-width: 768px) {
            .header-container {
                flex-direction: column;
                gap: 1rem;
            }

            .nav-tabs {
                gap: 1rem;
                padding: 0 1rem;
            }

            .main-container {
                padding: 1rem;
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
                <div style="color: white; text-align: right;">
                    <div style="font-weight: 600;">{{ $user->name }}</div>
                    <div style="font-size: 0.85rem; opacity: 0.9;">👨‍🏫 Tutor</div>
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
        <button class="nav-tab" onclick="switchTab('tutorings', event)">📚 Por Dar</button>
        <button class="nav-tab" onclick="switchTab('recibir', event)">👥 Por Recibir</button>
        <button class="nav-tab" onclick="switchTab('mentors', event)">👨‍🏫 Buscar Mentores</button>
        <button class="nav-tab" onclick="switchTab('profile', event)">👤 Mi Perfil</button>
    </div>

    <!-- Main content -->
    <div class="main-container">

        <!-- Mensajes Flash -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        <!-- OVERVIEW Tab -->
        <div id="overview" class="section active">
            <h2 class="section-title">📊 Resumen de Desempeño</h2>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number">{{ $completedSessions }}</div>
                    <div class="stat-label">Tutorías Completadas</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ count($tutoringsToDo) }}</div>
                    <div class="stat-label">Tutorías Por Dar</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ number_format($totalHours, 1) }}</div>
                    <div class="stat-label">Horas Dictadas</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ $averageRating ? number_format($averageRating, 1) : 'N/A' }}</div>
                    <div class="stat-label">Calificación Promedio</div>
                </div>
            </div>
        </div>

        <!-- TUTORINGS Tab (POR DAR) -->
        <div id="tutorings" class="section">
            <h2 class="section-title">📚 Tutorías que Tienes que Dar</h2>

            @if (count($tutoringsToDo) > 0)
                <div class="tutoring-list">
                    @foreach ($tutoringsToDo as $tutoring)
                        <div class="tutoring-card">
                            <div class="tutoring-header">
                                <div>
                                    <div class="tutoring-title">{{ $tutoring->student->name }} -
                                        {{ $tutoring->subject->name }}</div>
                                </div>
                                <span
                                    class="tutoring-status @if ($tutoring->status === 'pending') status-pending @else status-confirmed @endif">
                                    {{ ucfirst($tutoring->status) }}
                                </span>
                            </div>

                            <div class="tutoring-details">
                                <div class="detail-item">
                                    <span class="detail-label">📅 Fecha</span>
                                    <span
                                        class="detail-value">{{ $tutoring->scheduled_at->format('d/m/Y H:i') }}</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">⏱️ Duración</span>
                                    <span class="detail-value">{{ $tutoring->duration }} min</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">🌐 Tipo</span>
                                    <span class="detail-value">{{ ucfirst($tutoring->type) }}</span>
                                </div>
                                @if ($tutoring->location)
                                    <div class="detail-item">
                                        <span class="detail-label">📍 Lugar</span>
                                        <span class="detail-value">{{ $tutoring->location }}</span>
                                    </div>
                                @endif
                            </div>

                            @if ($tutoring->notes)
                                <div style="margin-top: 1rem; padding: 1rem; background: #f9f9f9; border-radius: 8px;">
                                    <strong style="color: #0051a5;">📝 Notas del estudiante:</strong>
                                    <div style="margin-top: 0.5rem; color: #666;">{{ $tutoring->notes }}</div>
                                </div>
                            @endif

                            <div class="tutoring-actions">
                                @if ($tutoring->status === 'pending')
                                    <button type="button" onclick="confirmTutoring({{ $tutoring->id }})"
                                        class="action-btn btn-confirm">
                                        ✓ Confirmar
                                    </button>
                                @endif

                                @if ($tutoring->status === 'confirmed' && $tutoring->scheduled_at < now())
                                    <button type="button" onclick="completeTutoring({{ $tutoring->id }})"
                                        class="action-btn btn-complete">
                                        ✓ Marcar Completada
                                    </button>
                                @endif
                            </div>

                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <div class="empty-state-icon">🎉</div>
                    <p>¡Excelente! No tienes tutorías pendientes por dar en este momento.</p>
                </div>
            @endif
        </div>

        <!-- POR RECIBIR Tab -->
        <div id="recibir" class="section">
            <h2 class="section-title">👥 Tutorías que Voy a Recibir</h2>

            @if (count($tutoriasARecibir) > 0)
                <div class="tutoring-list">
                    @foreach ($tutoriasARecibir as $tutoring)
                        <div class="tutoring-card">
                            <div class="tutoring-header">
                                <div>
                                    <div class="tutoring-title">{{ $tutoring->mentor->user->name }} -
                                        {{ $tutoring->subject->name }}</div>
                                </div>
                                <span
                                    class="tutoring-status @if ($tutoring->status === 'pending') status-pending @else status-confirmed @endif">
                                    {{ ucfirst($tutoring->status) }}
                                </span>
                            </div>

                            <div class="tutoring-details">
                                <div class="detail-item">
                                    <span class="detail-label">📅 Fecha</span>
                                    <span
                                        class="detail-value">{{ $tutoring->scheduled_at->format('d/m/Y H:i') }}</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">⏱️ Duración</span>
                                    <span class="detail-value">{{ $tutoring->duration }} min</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">🌐 Tipo</span>
                                    <span class="detail-value">{{ ucfirst($tutoring->type) }}</span>
                                </div>
                                @if ($tutoring->location)
                                    <div class="detail-item">
                                        <span class="detail-label">📍 Lugar</span>
                                        <span class="detail-value">{{ $tutoring->location }}</span>
                                    </div>
                                @endif
                            </div>

                            @if ($tutoring->notes)
                                <div style="margin-top: 1rem; padding: 1rem; background: #f9f9f9; border-radius: 8px;">
                                    <strong style="color: #0051a5;">📝 Notas del tutor:</strong>
                                    <div style="margin-top: 0.5rem; color: #666;">{{ $tutoring->notes }}</div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <div class="empty-state-icon">✨</div>
                    <p>No tienes tutorías pendientes para recibir. ¡Busca un mentor!</p>
                </div>
            @endif
        </div>

        <!-- MENTORS Tab -->
        <div id="mentors" class="section">
            <h2 class="section-title">👨‍🏫 Buscar Otros Mentores</h2>
            <p style="color: #666; margin-bottom: 1.5rem;">También puedes solicitar tutorías de otros mentores</p>

            @if (count($mentors) > 0)
                <div class="mentors-grid">
                    @foreach ($mentors as $mentor)
                        <div class="mentor-card">
                            <div class="mentor-avatar">👨‍🏫</div>
                            <div class="mentor-name">{{ $mentor->user->name }}</div>
                            <div class="mentor-specialty">{{ $mentor->program }}</div>
                            <a href="{{ route('session.create', ['mentor_id' => $mentor->id]) }}" class="book-btn"
                                style="display: inline-block; text-decoration: none; text-align: center;">
                                📅 Solicitar Tutoría
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <div class="empty-state-icon">🔍</div>
                    <p>No hay otros mentores disponibles en este momento</p>
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
                    <label style="font-weight: 600; color: #333;">Especialización</label>
                    <div style="padding: 0.8rem; background: #f9f9f9; border-radius: 8px; margin-top: 0.5rem;">
                        {{ $mentor->program ?? 'No especificado' }}
                    </div>
                </div>
                <div style="margin-bottom: 1.5rem;">
                    <label style="font-weight: 600; color: #333;">Bio</label>
                    <div style="padding: 0.8rem; background: #f9f9f9; border-radius: 8px; margin-top: 0.5rem;">
                        {{ $mentor->bio ?? 'No especificado' }}
                    </div>
                </div>
            </div>
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

        // ✅ CONFIRMAR TUTORÍA
        function confirmTutoring(tutoringId) {
            fetch(`/session/${tutoringId}`, {
                    method: 'PUT',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        status: 'confirmed'
                    })
                })
                .then(response => {
                    if (response.ok) {
                        location.reload();
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        // ✓ MARCAR COMO COMPLETADA
        function completeTutoring(tutoringId) {
            fetch(`/session/${tutoringId}`, {
                    method: 'PUT',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        status: 'completed'
                    })
                })
                .then(response => {
                    if (response.ok) {
                        location.reload();
                    }
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Tutorías - SkillLink UNAB</title>
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

        .nav-right {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .nav-links {
            display: flex;
            gap: 1.5rem;
            list-style: none;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: 500;
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
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .breadcrumb {
            background: white;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 2rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .page-title {
            font-size: 2rem;
            font-weight: bold;
            color: #0051a5;
        }

        .btn {
            padding: 0.8rem 1.5rem;
            background: #0051a5;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .btn:hover {
            background: #003d7a;
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

        .sessions-list {
            display: grid;
            gap: 1.5rem;
        }

        .session-card {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            border-left: 5px solid #0051a5;
            transition: all 0.3s;
        }

        .session-card:hover {
            box-shadow: 0 4px 12px rgba(0, 81, 165, 0.2);
        }

        .session-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 1rem;
        }

        .session-title {
            font-size: 1.2rem;
            font-weight: bold;
            color: #333;
        }

        .session-status {
            display: inline-block;
            padding: 0.4rem 0.8rem;
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

        .status-completed {
            background: #d1ecf1;
            color: #0c5460;
        }

        .status-cancelled {
            background: #f8d7da;
            color: #721c24;
        }

        .session-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 1rem;
            font-size: 0.95rem;
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
            color: #666;
            margin-top: 0.3rem;
        }

        .session-actions {
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

        .action-btn-primary {
            background: #0051a5;
            color: white;
        }

        .action-btn-primary:hover {
            background: #003d7a;
        }

        .action-btn-danger {
            background: #dc3545;
            color: white;
        }

        .action-btn-danger:hover {
            background: #c82333;
        }

        .action-btn-secondary {
            background: #f0f0f0;
            color: #333;
        }

        .action-btn-secondary:hover {
            background: #e0e0e0;
        }

        .empty-state {
            text-align: center;
            padding: 3rem;
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .empty-state-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .empty-state-text {
            color: #666;
            margin-bottom: 1rem;
        }

        @media (max-width: 768px) {
            .page-header {
                flex-direction: column;
                gap: 1rem;
            }

            .nav-links {
                display: none;
            }

            .session-details {
                grid-template-columns: 1fr;
            }

            .session-actions {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="header-container">
            <a href="{{ route('dashboard') }}" class="logo-section">
                <div class="logo-icon">SK</div>
                <div style="font-size: 1.5rem; font-weight: bold;">SkillLink UNAB</div>
            </a>
            <div class="nav-right">
                <ul class="nav-links">
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('mentors') }}">Mentores</a></li>
                    <li><a href="{{ route('sessions') }}">Tutorías</a></li>
                    <li><a href="{{ route('profile') }}">Perfil</a></li>
                </ul>
                <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                    @csrf
                    <button type="submit" class="logout-btn">Cerrar Sesión</button>
                </form>
            </div>
        </div>
    </header>

    <!-- Main content -->
    <div class="main-container">
        
        <div class="breadcrumb">
            <a href="{{ route('dashboard') }}" style="color: #0051a5; text-decoration: none; font-weight: 500;">Dashboard</a> / <span>Mis Tutorías</span>
        </div>

        <div class="page-header">
            <h1 class="page-title">📅 Mis Tutorías</h1>
            <a href="{{ route('mentors') }}" class="btn">🔍 Buscar Mentor</a>
        </div>

        @if(session('success'))
        <div class="alert alert-success">
            ✅ {{ session('success') }}
        </div>
        @endif

        @if(count($sessions) > 0)
        <div class="sessions-list">
            @foreach($sessions as $session)
            <div class="session-card">
                <div class="session-header">
                    <div>
                        <div class="session-title">
                            @if($session->student_id === Auth::id())
                                👨‍🏫 {{ $session->mentor->user->name }}
                            @else
                                👨‍💼 {{ $session->student->name }}
                            @endif
                            - {{ $session->subject->name }}
                        </div>
                    </div>
                    <span class="session-status status-{{ $session->status }}">
                        {{ ucfirst($session->status) }}
                    </span>
                </div>

                <div class="session-details">
                    <div class="detail-item">
                        <span class="detail-label">📅 Fecha y Hora</span>
                        <span class="detail-value">{{ $session->scheduled_at->format('d/m/Y H:i') }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">⏱️ Duración</span>
                        <span class="detail-value">{{ $session->duration }} minutos</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">🌐 Tipo</span>
                        <span class="detail-value">{{ ucfirst($session->type) }}</span>
                    </div>
                    @if($session->rating)
                    <div class="detail-item">
                        <span class="detail-label">⭐ Calificación</span>
                        <span class="detail-value">{{ $session->rating }}/5</span>
                    </div>
                    @endif
                </div>

                @if($session->notes)
                <div style="background: #f9f9f9; padding: 0.8rem; border-radius: 8px; margin-bottom: 1rem; font-size: 0.9rem;">
                    <strong>📝 Notas:</strong> {{ $session->notes }}
                </div>
                @endif

                <div class="session-actions">
                    @if($session->status === 'pending' && $session->student_id === Auth::id())
                    <button class="action-btn action-btn-danger" onclick="cancelSession({{ $session->id }})">
                        ❌ Cancelar
                    </button>
                    @endif

                    @if($session->status === 'completed' && $session->student_id === Auth::id() && !$session->rating)
                    <button class="action-btn action-btn-primary" onclick="rateSession({{ $session->id }})">
                        ⭐ Calificar
                    </button>
                    @endif

                    <a href="{{ route('session.show', $session->id) }}" class="action-btn action-btn-secondary">
                        👁️ Ver Detalles
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="empty-state">
            <div class="empty-state-icon">📭</div>
            <p class="empty-state-text">No tienes tutorías agendadas</p>
            <a href="{{ route('mentors') }}" class="btn">🔍 Buscar Mentor Ahora</a>
        </div>
        @endif
    </div>

    <script>
        function cancelSession(sessionId) {
            if (confirm('¿Estás seguro de que deseas cancelar esta sesión?')) {
                // TODO: Implementar cancelación
                alert('Sesión cancelada');
                location.reload();
            }
        }

        function rateSession(sessionId) {
            const rating = prompt('Calificación (1-5):');
            if (rating && rating >= 1 && rating <= 5) {
                const review = prompt('Comentario (opcional):');
                // TODO: Enviar calificación a servidor
                alert('Gracias por tu calificación');
                location.reload();
            }
        }
    </script>

</body>
</html>

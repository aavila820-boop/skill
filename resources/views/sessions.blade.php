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
            font-weight: 600;
            transition: all 0.3s;
            padding: 0.5rem 1rem;
            border-radius: 8px;
        }

        .nav-links a:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
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
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        /* Breadcrumb mejorado */
        .breadcrumb {
            background: white;
            padding: 1rem 1.5rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            border-left: 4px solid;
            border-image: linear-gradient(180deg, #FF8C00, #9B30FF);
            border-image-slice: 1;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .page-title {
            font-size: 2.2rem;
            font-weight: 800;
            background: linear-gradient(135deg, #FF8C00, #9B30FF);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .btn {
            padding: 0.9rem 1.8rem;
            background: linear-gradient(135deg, #FF8C00, #FFA500);
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(255, 140, 0, 0.3);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn:hover {
            background: linear-gradient(135deg, #FFA500, #FF8C00);
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(255, 140, 0, 0.4);
        }

        .btn:active {
            transform: translateY(-1px);
        }

        /* Alertas mejoradas */
        .alert {
            padding: 1.2rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            border-left: 4px solid;
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

        /* Grid de sesiones */
        .sessions-list {
            display: grid;
            gap: 1.5rem;
        }

        /* Tarjeta de sesión mejorada */
        .session-card {
            background: white;
            padding: 1.8rem;
            border-radius: 15px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);
            border-left: 5px solid;
            border-image: linear-gradient(180deg, #FF8C00, #9B30FF);
            border-image-slice: 1;
            transition: all 0.3s;
        }

        .session-card:hover {
            box-shadow: 0 8px 25px rgba(155, 48, 255, 0.2);
            transform: translateY(-5px);
        }

        .session-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 1.2rem;
        }

        .session-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #333;
        }

        /* Status badges mejorados */
        .session-status {
            display: inline-block;
            padding: 0.5rem 1.2rem;
            border-radius: 25px;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .status-pending {
            background: linear-gradient(135deg, #fff3cd, #ffeaa7);
            color: #856404;
        }

        .status-confirmed {
            background: linear-gradient(135deg, #d4edda, #c3e6cb);
            color: #155724;
        }

        .status-completed {
            background: linear-gradient(135deg, #d1ecf1, #bee5eb);
            color: #0c5460;
        }

        .status-cancelled {
            background: linear-gradient(135deg, #f8d7da, #f5c6cb);
            color: #721c24;
        }

        /* Detalles de sesión */
        .session-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
        }

        .detail-item {
            display: flex;
            flex-direction: column;
        }

        .detail-label {
            font-weight: 700;
            color: #9B30FF;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            margin-bottom: 0.4rem;
        }

        .detail-value {
            color: #333;
            font-weight: 600;
        }

        /* Acciones de sesión */
        .session-actions {
            display: flex;
            gap: 0.8rem;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 2px solid #f0f0f0;
        }

        .action-btn {
            padding: 0.7rem 1.2rem;
            border: none;
            border-radius: 10px;
            font-weight: 700;
            cursor: pointer;
            font-size: 0.9rem;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .action-btn-primary {
            background: linear-gradient(135deg, #FF8C00, #FFA500);
            color: white;
            box-shadow: 0 3px 10px rgba(255, 140, 0, 0.25);
        }

        .action-btn-primary:hover {
            background: linear-gradient(135deg, #FFA500, #FF8C00);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 140, 0, 0.35);
        }

        .action-btn-danger {
            background: linear-gradient(135deg, #dc3545, #e74c3c);
            color: white;
            box-shadow: 0 3px 10px rgba(220, 53, 69, 0.25);
        }

        .action-btn-danger:hover {
            background: linear-gradient(135deg, #e74c3c, #c82333);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(220, 53, 69, 0.35);
        }

        .action-btn-secondary {
            background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
            color: #333;
            border: 2px solid #e0e0e0;
        }

        .action-btn-secondary:hover {
            background: #e8e8e8;
            border-color: #9B30FF;
            color: #9B30FF;
            transform: translateY(-2px);
        }

        /* Empty state mejorado */
        .empty-state {
            text-align: center;
            padding: 3rem 2rem;
            background: white;
            border-radius: 15px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);
        }

        .empty-state-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.7;
        }

        .empty-state-text {
            color: #999;
            margin-bottom: 1.5rem;
            font-size: 1.05rem;
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 768px) {
            .page-header {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }

            .nav-links {
                display: none;
            }

            .session-details {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .session-actions {
                flex-direction: column;
            }

            .action-btn {
                width: 100%;
            }

            .page-title {
                font-size: 1.8rem;
            }

            .session-header {
                flex-direction: column;
                gap: 0.8rem;
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
            <a href="{{ route('dashboard') }}"
                style="color: #0051a5; text-decoration: none; font-weight: 500;">Dashboard</a> / <span>Mis
                Tutorías</span>
        </div>

        <div class="page-header">
            <h1 class="page-title">📅 Mis Tutorías</h1>
            <a href="{{ route('mentors') }}" class="btn">🔍 Buscar Mentor</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                ✅ {{ session('success') }}
            </div>
        @endif

        @if (count($sessions) > 0)
            <div class="sessions-list">
                @foreach ($sessions as $session)
                    <div class="session-card">
                        <div class="session-header">
                            <div>
                                <div class="session-title">
                                    @if ($session->student_id === Auth::id())
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
                            @if ($session->rating)
                                <div class="detail-item">
                                    <span class="detail-label">⭐ Calificación</span>
                                    <span class="detail-value">{{ $session->rating }}/5</span>
                                </div>
                            @endif
                        </div>

                        @if ($session->notes)
                            <div
                                style="background: #f9f9f9; padding: 0.8rem; border-radius: 8px; margin-bottom: 1rem; font-size: 0.9rem;">
                                <strong>📝 Notas:</strong> {{ $session->notes }}
                            </div>
                        @endif

                        <div class="session-actions">
                            @if ($session->status === 'pending' && $session->student_id === Auth::id())
                                <button class="action-btn action-btn-danger"
                                    onclick="cancelSession({{ $session->id }})">
                                    ❌ Cancelar
                                </button>
                            @endif

                            @if ($session->status === 'completed' && $session->student_id === Auth::id() && !$session->rating)
                                <button class="action-btn action-btn-primary"
                                    onclick="rateSession({{ $session->id }})">
                                    ⭐ Calificar
                                </button>
                            @endif

                            <a href="{{ route('session.show', $session->id) }}"
                                class="action-btn action-btn-secondary">
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

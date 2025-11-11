<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil - SkillLink UNAB</title>
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
            padding: 2.5rem 2rem;
            text-align: center;
            margin-bottom: 2rem;
            box-shadow: 0 4px 12px rgba(255, 140, 0, 0.3);
        }

        header h1 {
            font-size: 2.2rem;
            margin-bottom: 0.8rem;
            font-weight: 800;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.15);
        }

        header p {
            font-size: 1.05rem;
            opacity: 0.95;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        /* Sección de perfil mejorada */
        .profile-section {
            background: white;
            padding: 2.5rem;
            border-radius: 20px;
            margin-bottom: 2rem;
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

        .section-title {
            font-size: 1.7rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, #FF8C00, #9B30FF);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            border-bottom: 2px solid;
            border-image: linear-gradient(90deg, #FF8C00, #9B30FF);
            border-image-slice: 1;
            padding-bottom: 0.8rem;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .info-item {
            display: flex;
            flex-direction: column;
        }

        .info-label {
            font-weight: 700;
            color: #9B30FF;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .info-value {
            color: #333;
            font-size: 1.1rem;
            font-weight: 600;
        }

        /* Grid de estadísticas mejorado */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
        }

        .stat-card {
            background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
            padding: 1.8rem;
            border-radius: 15px;
            text-align: center;
            border-left: 5px solid #FF8C00;
            box-shadow: 0 3px 12px rgba(255, 140, 0, 0.15);
            transition: all 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 25px rgba(255, 140, 0, 0.25);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #FF8C00, #9B30FF);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: #333;
            font-size: 0.95rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        /* Tarjetas de sesión mejoradas */
        .session-card {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            border-left: 5px solid;
            border-image: linear-gradient(180deg, #FF8C00, #9B30FF);
            border-image-slice: 1;
            margin-bottom: 1.2rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            transition: all 0.3s;
        }

        .session-card:hover {
            box-shadow: 0 6px 16px rgba(155, 48, 255, 0.15);
            transform: translateX(5px);
        }

        .session-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 1rem;
        }

        .session-title {
            font-weight: 700;
            color: #FF8C00;
            font-size: 1.1rem;
        }

        .session-status {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 700;
            background: linear-gradient(135deg, #d4edda, #c3e6cb);
            color: #155724;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .session-status.pending {
            background: linear-gradient(135deg, #fff3cd, #ffeaa7);
            color: #856404;
        }

        .session-status.completed {
            background: linear-gradient(135deg, #d1ecf1, #bee5eb);
            color: #0c5460;
        }

        .session-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1rem;
            font-size: 0.95rem;
            color: #666;
        }

        .session-detail-item {
            display: flex;
            gap: 0.5rem;
            font-weight: 500;
        }

        .empty-state {
            text-align: center;
            padding: 3rem 2rem;
            color: #999;
            background: white;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .empty-state-icon {
            font-size: 3.5rem;
            margin-bottom: 1rem;
        }

        .action-buttons {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.2rem;
            margin-top: 2.5rem;
        }

        .btn {
            padding: 1rem;
            border: none;
            border-radius: 12px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            transition: all 0.3s;
            font-size: 1rem;
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

        /* ========== RESPONSIVE ========== */
        @media (max-width: 600px) {
            header h1 {
                font-size: 1.6rem;
            }

            .action-buttons {
                grid-template-columns: 1fr;
            }

            .info-grid,
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .profile-section {
                padding: 1.5rem;
            }

            .stat-number {
                font-size: 2rem;
            }

            .session-header {
                flex-direction: column;
                gap: 0.8rem;
            }
        }
    </style>

</head>

<body>
    <header>
        <h1>👤 Mi Perfil</h1>
        <p>Información personal y estadísticas</p>
    </header>

    <div class="container">
        <!-- Información Personal -->
        <div class="profile-section">
            <h2 class="section-title">📋 Información Personal</h2>
            <div class="info-grid">
                <div class="info-item">
                    <span class="info-label">Nombre Completo</span>
                    <span class="info-value">{{ $user->name ?? 'No especificado' }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Correo Electrónico</span>
                    <span class="info-value">{{ $user->email ?? 'No especificado' }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Programa</span>
                    <span class="info-value">{{ $user->program ?? 'Estudiante' }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Miembro desde</span>
                    <span
                        class="info-value">{{ $user->created_at ? $user->created_at->format('d \d\e F \d\e Y') : 'N/A' }}</span>
                </div>
            </div>
        </div>

        <!-- Estadísticas -->
        <div class="profile-section">
            <h2 class="section-title">📊 Estadísticas</h2>
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number">{{ $sessions->where('status', 'completed')->count() }}</div>
                    <div class="stat-label">Tutorías Completadas</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">
                        {{ $sessions->where('status', '!=', 'cancelled')->where('scheduled_at', '>=', now())->count() }}
                    </div>
                    <div class="stat-label">Próximas Tutorías</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">
                        {{ number_format($sessions->where('status', 'completed')->sum('duration') / 60, 1) }}</div>
                    <div class="stat-label">Horas de Estudio</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">
                        {{ $sessions->where('status', 'completed')->whereNotNull('rating')->avg('rating') ? number_format($sessions->where('status', 'completed')->whereNotNull('rating')->avg('rating'), 1) : 'N/A' }}
                    </div>
                    <div class="stat-label">Rating Promedio</div>
                </div>
            </div>
        </div>

        <!-- Tutorías Recientes -->
        <div class="profile-section">
            <h2 class="section-title">📅 Tutorías Recientes</h2>
            @if ($sessions && count($sessions) > 0)
                @foreach ($sessions as $session)
                    @if ($session->status === 'completed' && $session->rating)
                        <div class="session-card">
                            <div class="session-header">
                                <div>
                                    <div class="session-title">👨‍🏫 {{ $session->mentor->user->name ?? 'Tutor' }}</div>
                                    @if ($session->subject)
                                        <div style="color: #666; font-size: 0.9rem;">{{ $session->subject->name }}</div>
                                    @endif
                                </div>
                                <span class="session-status">{{ ucfirst($session->status) }}</span>
                            </div>
                            <div class="session-details">
                                <div class="session-detail-item">📅 {{ $session->scheduled_at->format('d/m/Y H:i') }}
                                </div>
                                <div class="session-detail-item">⏱️ {{ $session->duration }} min</div>
                                <div class="session-detail-item">🌐 {{ ucfirst($session->type) }}</div>
                                <div class="session-detail-item">⭐ {{ $session->rating }}/5</div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @else
                <div class="empty-state">
                    <div style="font-size: 2rem; margin-bottom: 0.5rem;">✨</div>
                    <p>No tienes tutorías registradas aún</p>
                </div>
            @endif
        </div>

        <!-- Botones de Acción -->
        <div class="action-buttons">
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">← Volver al Dashboard</a>
            <a href="{{ route('dashboard') }}" class="btn btn-primary">🔍 Buscar Mentor</a>
        </div>
    </div>
</body>

</html>

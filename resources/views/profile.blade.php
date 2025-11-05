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
            background: #f5f7fa;
            color: #333;
        }

        header {
            background: linear-gradient(135deg, #0051a5 0%, #003d7a 100%);
            color: white;
            padding: 2rem;
            text-align: center;
            margin-bottom: 2rem;
        }

        header h1 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        .profile-section {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .section-title {
            font-size: 1.5rem;
            color: #0051a5;
            margin-bottom: 1.5rem;
            border-bottom: 2px solid #0051a5;
            padding-bottom: 0.5rem;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .info-item {
            display: flex;
            flex-direction: column;
        }

        .info-label {
            font-weight: 600;
            color: #0051a5;
            font-size: 0.9rem;
            margin-bottom: 0.3rem;
        }

        .info-value {
            color: #666;
            font-size: 1rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        .stat-card {
            background: linear-gradient(135deg, #e8f4ff 0%, #f0f8ff 100%);
            padding: 1.5rem;
            border-radius: 10px;
            text-align: center;
            border-left: 4px solid #0051a5;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            color: #0051a5;
        }

        .stat-label {
            color: #666;
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }

        .session-card {
            background: #f9f9f9;
            padding: 1rem;
            border-radius: 8px;
            border-left: 4px solid #0051a5;
            margin-bottom: 1rem;
        }

        .session-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 0.5rem;
        }

        .session-title {
            font-weight: 600;
            color: #0051a5;
        }

        .session-status {
            display: inline-block;
            padding: 0.2rem 0.6rem;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
            background: #d4edda;
            color: #155724;
        }

        .session-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 0.5rem;
            font-size: 0.9rem;
            color: #666;
        }

        .session-detail-item {
            display: flex;
            gap: 0.3rem;
        }

        .empty-state {
            text-align: center;
            padding: 2rem;
            color: #999;
        }

        .action-buttons {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn {
            padding: 0.8rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            transition: all 0.3s;
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

        @media (max-width: 600px) {
            header h1 {
                font-size: 1.5rem;
            }

            .action-buttons {
                grid-template-columns: 1fr;
            }

            .info-grid, .stats-grid {
                grid-template-columns: 1fr;
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
                    <span class="info-value">{{ $user->created_at ? $user->created_at->format('d \d\e F \d\e Y') : 'N/A' }}</span>
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
                    <div class="stat-number">{{ $sessions->where('status', '!=', 'cancelled')->where('scheduled_at', '>=', now())->count() }}</div>
                    <div class="stat-label">Próximas Tutorías</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ number_format($sessions->where('status', 'completed')->sum('duration') / 60, 1) }}</div>
                    <div class="stat-label">Horas de Estudio</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ $sessions->where('status', 'completed')->whereNotNull('rating')->avg('rating') ? number_format($sessions->where('status', 'completed')->whereNotNull('rating')->avg('rating'), 1) : 'N/A' }}</div>
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
                            <div class="session-detail-item">📅 {{ $session->scheduled_at->format('d/m/Y H:i') }}</div>
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

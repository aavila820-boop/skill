<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard Mentor - SkillLink UNAB</title>
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

        .logo-title {
            font-size: 1.6rem;
            font-weight: 700;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #9B30FF, #7B1FA2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.1rem;
            color: white;
            box-shadow: 0 2px 8px rgba(155, 48, 255, 0.4);
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

        /* ========== NAVEGACIÓN CON ACENTO MORADO ========== */
        .nav-tabs {
            background: white;
            border-bottom: 2px solid #e0e0e0;
            display: flex;
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            flex-wrap: wrap;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .nav-tab {
            padding: 1rem 0;
            border: none;
            background: none;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            color: #666;
            border-bottom: 3px solid transparent;
            transition: all 0.3s;
        }

        .nav-tab.active {
            color: #9B30FF;
            border-bottom-color: #9B30FF;
        }

        .nav-tab:hover {
            color: #FF8C00;
        }

        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        /* ========== ALERTAS ========== */
        .alert {
            padding: 1rem 1.2rem;
            border-radius: 10px;
            margin-bottom: 1rem;
            border-left: 5px solid;
            font-weight: 500;
        }

        .alert-success {
            background: linear-gradient(135deg, #d4edda, #c3e6cb);
            color: #155724;
            border-color: #28a745;
        }

        .alert-error {
            background: linear-gradient(135deg, #f8d7da, #f5c6cb);
            color: #721c24;
            border-color: #dc3545;
        }

        .section {
            display: none;
        }

        .section.active {
            display: block;
        }

        /* ========== TÍTULOS CON GRADIENTE UNAB ========== */
        .welcome-title {
            font-size: 2rem;
            background: linear-gradient(135deg, #FF8C00, #9B30FF);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 800;
            margin-bottom: 0.5rem;
        }

        .welcome-subtitle {
            color: #666;
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }

        .section-title {
            font-size: 1.6rem;
            margin-bottom: 1.5rem;
            color: #333;
            border-bottom: 3px solid transparent;
            border-image: linear-gradient(90deg, #FF8C00, #9B30FF);
            border-image-slice: 1;
            padding-bottom: 0.7rem;
            font-weight: 700;
        }

        /* ========== STATS CARDS CON GRADIENTES UNAB ========== */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            padding: 1.8rem;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            border-top: 4px solid;
            border-image: linear-gradient(90deg, #FF8C00, #9B30FF);
            border-image-slice: 1;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(155, 48, 255, 0.2);
        }

        .stat-number {
            font-size: 2.8rem;
            font-weight: 800;
            background: linear-gradient(135deg, #FF8C00, #9B30FF);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: #666;
            font-weight: 600;
            font-size: 0.95rem;
        }

        /* ========== TUTORING CARDS ========== */
        .tutoring-list {
            display: grid;
            gap: 1rem;
        }

        .tutoring-card {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            border-left: 5px solid;
            border-image: linear-gradient(180deg, #FF8C00, #9B30FF);
            border-image-slice: 1;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);
            transition: all 0.3s;
        }

        .tutoring-card:hover {
            box-shadow: 0 6px 20px rgba(155, 48, 255, 0.15);
            transform: translateX(5px);
        }

        .tutoring-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 1rem;
        }

        .tutoring-title {
            font-weight: 700;
            color: #FF8C00;
            font-size: 1.15rem;
        }

        .tutoring-status {
            display: inline-block;
            padding: 0.4rem 1rem;
            border-radius: 25px;
            font-size: 0.85rem;
            font-weight: 700;
        }

        .status-pending {
            background: linear-gradient(135deg, #fff3cd, #ffeaa7);
            color: #856404;
        }

        .status-confirmed {
            background: linear-gradient(135deg, #d4edda, #a8e6cf);
            color: #155724;
        }

        .status-completed {
            background: linear-gradient(135deg, #d1ecf1, #a8dadc);
            color: #0c5460;
        }

        .tutoring-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1rem;
            font-size: 0.95rem;
            color: #666;
            margin-bottom: 1rem;
        }

        .detail-item {
            display: flex;
            flex-direction: column;
        }

        .detail-label {
            font-weight: 700;
            color: #9B30FF;
            font-size: 0.85rem;
            margin-bottom: 0.2rem;
        }

        .detail-value {
            margin-top: 0.3rem;
            color: #333;
        }

        /* ========== BOTONES CON ESTILO UNAB ========== */
        .tutoring-actions {
            display: flex;
            gap: 0.7rem;
            margin-top: 1rem;
            flex-wrap: wrap;
        }

        .action-btn {
            padding: 0.7rem 1.3rem;
            border: none;
            border-radius: 8px;
            font-weight: 700;
            cursor: pointer;
            font-size: 0.9rem;
            transition: all 0.3s;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-confirm {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
        }

        .btn-confirm:hover {
            background: linear-gradient(135deg, #218838, #17a589);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(40, 167, 69, 0.3);
        }

        .btn-complete {
            background: linear-gradient(135deg, #17a2b8, #138496);
            color: white;
        }

        .btn-complete:hover {
            background: linear-gradient(135deg, #138496, #0f6674);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(23, 162, 184, 0.3);
        }

        /* ========== EMPTY STATE ========== */
        .empty-state {
            text-align: center;
            padding: 3rem 2rem;
            color: #999;
            background: white;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .empty-state-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            filter: grayscale(0.3);
        }

        /* ========== MENTOR CARDS CON ESTILO UNAB ========== */
        .mentors-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
        }

        .mentor-card {
            background: white;
            border-radius: 15px;
            padding: 1.8rem;
            text-align: center;
            border: 2px solid #e0e0e0;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .mentor-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #FF8C00, #9B30FF);
            transform: scaleX(0);
            transition: transform 0.3s;
        }

        .mentor-card:hover::before {
            transform: scaleX(1);
        }

        .mentor-card:hover {
            border-color: #9B30FF;
            box-shadow: 0 8px 25px rgba(155, 48, 255, 0.2);
            transform: translateY(-8px);
        }

        .mentor-avatar {
            width: 90px;
            height: 90px;
            background: linear-gradient(135deg, #FF8C00, #9B30FF);
            border-radius: 50%;
            margin: 0 auto 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2.2rem;
            box-shadow: 0 4px 15px rgba(155, 48, 255, 0.3);
        }

        .mentor-name {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 0.4rem;
            color: #333;
        }

        .mentor-specialty {
            color: #9B30FF;
            font-weight: 700;
            margin-bottom: 0.8rem;
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
            background: linear-gradient(135deg, #fff3cd, #ffeaa7);
            color: #856404;
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .book-btn {
            width: 100%;
            padding: 0.9rem;
            background: linear-gradient(135deg, #FF8C00, #FFA500);
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 700;
            cursor: pointer;
            margin-top: 1rem;
            transition: all 0.3s;
            box-shadow: 0 4px 12px rgba(255, 140, 0, 0.3);
        }

        .book-btn:hover {
            background: linear-gradient(135deg, #FFA500, #FF8C00);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 140, 0, 0.4);
        }

        .btn-primary {
            background: linear-gradient(135deg, #9B30FF, #7B1FA2);
            color: white;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 4px 12px rgba(155, 48, 255, 0.3);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #7B1FA2, #6A1B9A);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(155, 48, 255, 0.4);
        }

        /* ========== RESPONSIVE ========== */
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

            .welcome-title {
                font-size: 1.5rem;
            }

            .stat-number {
                font-size: 2.2rem;
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
        <button class="nav-tab" onclick="switchTab('pendientes', event)">⏳ Pendientes</button>
        <button class="nav-tab" onclick="switchTab('rechazadas', event)">❌ Rechazadas</button>
        <button class="nav-tab" onclick="switchTab('recibir', event)">👥 Por Recibir</button>
        <button class="nav-tab" onclick="switchTab('mentors', event)">👨‍🏫 Buscar Mentores</button>
        <button class="nav-tab" onclick="switchTab('received-history', event)">📚 Tutorías Recibidas</button>
        <button class="nav-tab" onclick="switchTab('history', event)">📜 Historial</button>
        <button class="nav-tab" onclick="switchTab('reviews', event)">⭐ Mis Reseñas</button>
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
                                    <strong style="color: #FF8C00;">📝 Notas del estudiante:</strong>
                                    <div style="margin-top: 0.5rem; color: #666;">{{ $tutoring->notes }}</div>
                                </div>
                            @endif

                            <div class="tutoring-actions">
                                @if ($tutoring->status === 'pending')
                                    <button type="button" onclick="confirmTutoring({{ $tutoring->id }})"
                                        class="action-btn btn-confirm">
                                        ✓ Confirmar
                                    </button>
                                    <button type="button" onclick="rejectTutoring({{ $tutoring->id }})"
                                        class="action-btn btn-reject"
                                        style="background: linear-gradient(135deg, #dc3545, #e74c3c); color: white; margin-left: 0.5rem;">
                                        ✕ Rechazar
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

        <!-- TUTORÍAS PENDIENTES Tab (Para el mentor) -->
        <div id="pendientes" class="section">
            <h2 class="section-title">⏳ Tutorías Pendientes</h2>
            <p style="color: #666; margin-bottom: 1.5rem;">Esperando tu confirmación</p>

            @if (count($tutoringsToDo->where('status', 'pending')) > 0)
                <div class="tutoring-list">
                    @foreach ($tutoringsToDo->where('status', 'pending') as $tutoring)
                        <div class="tutoring-card" style="background: #fff8e1; border-left: 5px solid #ffc107;">
                            <div class="tutoring-header">
                                <div>
                                    <div class="tutoring-title">{{ $tutoring->student->name }} -
                                        {{ $tutoring->subject->name }}</div>
                                </div>
                                <span class="tutoring-status"
                                    style="background: #ffc107; color: #333;">Pendiente</span>
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
                            </div>

                            @if ($tutoring->notes)
                                <div style="margin-top: 1rem; padding: 1rem; background: #f9f9f9; border-radius: 8px;">
                                    <strong style="color: #FF8C00;">📝 Notas del estudiante:</strong>
                                    <div style="margin-top: 0.5rem; color: #666;">{{ $tutoring->notes }}</div>
                                </div>
                            @endif

                            <div class="tutoring-actions">
                                <button type="button" onclick="confirmTutoring({{ $tutoring->id }})"
                                    class="action-btn btn-confirm">
                                    ✓ Confirmar
                                </button>
                                <button type="button" onclick="rejectTutoring({{ $tutoring->id }})"
                                    class="action-btn btn-reject"
                                    style="background: linear-gradient(135deg, #dc3545, #e74c3c); color: white; margin-left: 0.5rem;">
                                    ✕ Rechazar
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <div class="empty-state-icon">✨</div>
                    <p>No tienes tutorías pendientes de confirmación</p>
                </div>
            @endif
        </div>

        <!-- TUTORÍAS RECHAZADAS Tab (Para el mentor) -->
        <div id="rechazadas" class="section">
            <h2 class="section-title">❌ Tutorías Rechazadas</h2>
            <p style="color: #666; margin-bottom: 1.5rem;">Tutorías que rechazaste</p>

            @php
                $rejectedByMentor = $expiredSessions->where('status', 'rejected');
            @endphp

            @if (count($rejectedByMentor) > 0)
                <div class="tutoring-list">
                    @foreach ($rejectedByMentor as $tutoring)
                        <div class="tutoring-card"
                            style="background: #fff3cd; opacity: 0.9; border-left: 5px solid #dc3545;">
                            <div class="tutoring-header">
                                <div>
                                    <div class="tutoring-title" style="color: #dc3545;">
                                        {{ $tutoring->student->name }} - {{ $tutoring->subject->name }}</div>
                                </div>
                                <span class="tutoring-status"
                                    style="background: #dc3545; color: white;">Rechazada</span>
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
                            </div>

                            <div
                                style="margin-top: 1rem; padding: 0.6rem; background: #f8d7da; border-left: 4px solid #dc3545; border-radius: 6px;">
                                <strong style="color: #721c24;">⚠️ Rechazaste esta tutoría</strong>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <div class="empty-state-icon">✨</div>
                    <p>No has rechazado ninguna tutoría</p>
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
                                    <strong style="color: #FF8C00;">📝 Notas del tutor:</strong>
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

                            <div
                                style="margin: 1rem 0; padding: 0.8rem; background: #f9f9fa; border-radius: 8px; text-align: center;">
                                @php
                                    $avgRating = $mentor->average_rating_calculated;
                                    $reviewCount = $mentor->review_count;
                                @endphp

                                <div
                                    style="display: flex; justify-content: center; gap: 0.2rem; margin-bottom: 0.5rem;">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span
                                            style="font-size: 1.2rem; color: {{ $i <= round($avgRating) ? '#FFD700' : '#ddd' }};">★</span>
                                    @endfor
                                </div>

                                <div
                                    style="display: flex; justify-content: center; gap: 0.5rem; align-items: center; font-size: 0.9rem;">
                                    <strong style="color: #FF8C00;">{{ number_format($avgRating, 1) }}</strong>
                                    <span style="color: #999;">| {{ $reviewCount }}
                                        {{ $reviewCount === 1 ? 'reseña' : 'reseñas' }}</span>
                                </div>
                            </div>

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

        <!-- HISTORIAL Tab -->
        <div id="history" class="section">
            <h2 class="section-title">📜 Historial de Tutorías</h2>
            <p style="color: #666; margin-bottom: 1.5rem;">Tutorías que ya pasaron su fecha programada</p>

            @if (count($expiredSessions) > 0)
                <div class="tutoring-list">
                    @foreach ($expiredSessions as $tutoring)
                        <div class="tutoring-card"
                            style="background: #f8f9fa; opacity: 0.85; border-left: 5px solid #6c757d;">
                            <div class="tutoring-header">
                                <div class="tutoring-title" style="color: #495057;">
                                    {{ $tutoring->student->name }} - {{ $tutoring->subject->name }}
                                </div>
                                <span class="tutoring-status" style="background: #e9ecef; color: #495057;">
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
                                    <strong style="color: #6c757d;">📝 Notas:</strong>
                                    <div style="margin-top: 0.5rem; color: #666;">{{ $tutoring->notes }}</div>
                                </div>
                            @endif

                            <div
                                style="margin-top: 1rem; padding: 0.6rem; background: #fff3cd; border-left: 4px solid #ffc107; border-radius: 6px;">
                                <strong style="color: #856404;">⚠️ Esta tutoría ya pasó</strong>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <div class="empty-state-icon">📚</div>
                    <p>No tienes tutorías expiradas</p>
                </div>
            @endif
        </div>

        <!-- TUTORÍAS RECIBIDAS HISTORIAL Tab -->
        <div id="received-history" class="section">
            <h2 class="section-title">📚 Historial de Tutorías Recibidas</h2>
            <p style="color: #666; margin-bottom: 1.5rem;">Tutorías que recibiste de otros mentores</p>

            @if (count($receivedSessions) > 0)
                <div class="tutoring-list">
                    @foreach ($receivedSessions as $tutoring)
                        <div class="tutoring-card" style="background: #f0f7ff; border-left: 5px solid #2196F3;">
                            <div class="tutoring-header">
                                <div>
                                    <div class="tutoring-title">{{ $tutoring->mentor->user->name }} -
                                        {{ $tutoring->subject->name }}</div>
                                </div>
                                <span class="tutoring-status"
                                    style="background: #2196F3; color: white;">Completada</span>
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
                            </div>

                            @if ($tutoring->notes)
                                <div style="margin-top: 1rem; padding: 1rem; background: #f9f9f9; border-radius: 8px;">
                                    <strong style="color: #2196F3;">📝 Notas del tutor:</strong>
                                    <div style="margin-top: 0.5rem; color: #666;">{{ $tutoring->notes }}</div>
                                </div>
                            @endif

                            <!-- FORMULARIO DE RESEÑA -->
                            @php
                                $review = $tutoring
                                    ->reviews()
                                    ->where('student_id', auth()->id())
                                    ->first();
                            @endphp

                            <div class="review-section"
                                style="margin-top: 1.5rem; border-top: 2px solid #e0e0e0; padding-top: 1.5rem; background: linear-gradient(135deg, #fff9f0 0%, #ffffff 100%); border-radius: 12px;">
                                <h4 style="color: #FF8C00; font-weight: 700; margin-bottom: 1rem;">⭐ Calificar Tutor
                                </h4>

                                @if ($review)
                                    <!-- Mostrar reseña existente -->
                                    <div
                                        style="background: #e8f5e9; padding: 1rem; border-radius: 8px; margin-bottom: 1rem; border-left: 4px solid #4caf50;">
                                        <div
                                            style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem;">
                                            <span style="color: #FFD700; font-size: 1.2rem;">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $review->rating)
                                                        ★
                                                    @else
                                                        ☆
                                                    @endif
                                                @endfor
                                            </span>
                                            <strong style="color: #4caf50;"> ({{ $review->rating }}/5)</strong>
                                        </div>
                                        <p style="color: #333; margin: 0.5rem 0;">{{ $review->comment }}</p>
                                        <p style="color: #999; font-size: 0.85rem; margin-top: 0.5rem;">
                                            Actualizada el {{ $review->updated_at->format('d/m/Y H:i') }}
                                        </p>
                                    </div>

                                    <!-- Botón para editar -->
                                    <button type="button" onclick="toggleReviewForm({{ $tutoring->id }})"
                                        style="padding: 0.6rem 1rem; background: #2196F3; color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: 600; width: 100%;">
                                        Editar Reseña
                                    </button>
                                @endif

                                <!-- Formulario (oculto si ya existe reseña) -->
                                <form id="reviewForm-{{ $tutoring->id }}"
                                    style="display: {{ $review ? 'none' : 'flex' }}; flex-direction: column; gap: 1rem; margin-top: {{ $review ? '1rem' : '0' }};">
                                    @csrf
                                    <div class="rating-input" style="display: flex; gap: 0.5rem;">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <button type="button" class="star-btn"
                                                data-rating="{{ $i }}"
                                                data-session-id="{{ $tutoring->id }}"
                                                style="background: none; border: none; font-size: 2rem; cursor: pointer; transition: transform 0.2s;">
                                                <span
                                                    style="color: {{ $review && $review->rating >= $i ? '#FFD700' : '#ddd' }}; transition: color 0.2s;">★</span>
                                            </button>
                                        @endfor
                                    </div>

                                    <input type="hidden" name="tutoring_session_id" value="{{ $tutoring->id }}">
                                    <input type="hidden" name="rating" id="rating-{{ $tutoring->id }}"
                                        value="{{ $review?->rating ?? 0 }}">

                                    <textarea name="comment" id="comment-{{ $tutoring->id }}" placeholder="Comparte tu experiencia con el mentor..."
                                        style="padding: 0.8rem; border: 2px solid #e0e0e0; border-radius: 8px; min-height: 100px; resize: vertical; transition: all 0.3s; font-family: inherit;"
                                        onfocus="this.style.borderColor='#FF8C00'; this.style.boxShadow='0 0 0 3px rgba(255,140,0,0.1)'"
                                        onblur="this.style.borderColor='#e0e0e0'; this.style.boxShadow='none'">{{ $review?->comment }}</textarea>

                                    <div style="display: flex; gap: 1rem;">
                                        <button type="button" class="submit-review-btn"
                                            onclick="submitReview({{ $tutoring->id }})"
                                            style="flex: 1; padding: 0.8rem; background: linear-gradient(135deg, #FF8C00, #FFA500); color: white; border: none; border-radius: 8px; font-weight: 700; cursor: pointer; transition: transform 0.2s;"
                                            onmouseover="this.style.transform='scale(1.02)'"
                                            onmouseout="this.style.transform='scale(1)'">
                                            Enviar Reseña
                                        </button>
                                        @if ($review)
                                            <button type="button" onclick="toggleReviewForm({{ $tutoring->id }})"
                                                style="flex: 1; padding: 0.8rem; background: #999; color: white; border: none; border-radius: 8px; font-weight: 700; cursor: pointer;">
                                                Cancelar
                                            </button>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <div class="empty-state-icon">📚</div>
                    <p>No has recibido tutorías aún</p>
                </div>
            @endif
        </div>



        <!-- MIS RESEÑAS Tab -->
        <div id="reviews" class="section">
            <h2 class="section-title">⭐ Mis Reseñas</h2>
            <p style="color: #666; margin-bottom: 1.5rem;">Calificaciones y comentarios de tus estudiantes</p>

            @if (count($mentorReviews) > 0)
                <!-- Stats General -->
                <div
                    style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-bottom: 2rem;">
                    @php
                        $promedioRating = $mentorReviews->avg('rating');
                    @endphp

                    <div
                        style="background: linear-gradient(135deg, #FF8C00, #FFA500); color: white; padding: 1.5rem; border-radius: 12px; text-align: center;">
                        <div style="font-size: 2.5rem; font-weight: 700;">{{ number_format($promedioRating, 1) }}
                        </div>
                        <div style="font-size: 0.9rem; opacity: 0.9;">Calificación Promedio</div>
                    </div>

                    <div
                        style="background: linear-gradient(135deg, #4CAF50, #66BB6A); color: white; padding: 1.5rem; border-radius: 12px; text-align: center;">
                        <div style="font-size: 2.5rem; font-weight: 700;">{{ $mentorReviews->count() }}</div>
                        <div style="font-size: 0.9rem; opacity: 0.9;">Total de Reseñas</div>
                    </div>

                    <div
                        style="background: linear-gradient(135deg, #2196F3, #42A5F5); color: white; padding: 1.5rem; border-radius: 12px; text-align: center;">
                        <div style="font-size: 2.5rem; font-weight: 700;">
                            @php
                                $filledStars = round($promedioRating);
                            @endphp
                            @for ($i = 1; $i <= 5; $i++)
                                <span style="font-size: 1.5rem;">{{ $i <= $filledStars ? '★' : '☆' }}</span>
                            @endfor
                        </div>
                        <div style="font-size: 0.9rem; opacity: 0.9;">Estrellas Promedio</div>
                    </div>
                </div>

                <!-- Reseñas -->
                <div style="display: grid; gap: 1rem;">
                    @foreach ($mentorReviews as $review)
                        <div
                            style="background: white; padding: 1.5rem; border-radius: 12px; border-left: 4px solid #FF8C00; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                            <div
                                style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 1rem;">
                                <div>
                                    <div style="display: flex; gap: 0.2rem; margin-bottom: 0.5rem;">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <span
                                                style="font-size: 1.3rem; color: {{ $i <= $review->rating ? '#FFD700' : '#ddd' }};">★</span>
                                        @endfor
                                    </div>
                                    <span style="color: #999; font-size: 0.85rem;">
                                        {{ $review->created_at->format('d/m/Y H:i') }}
                                    </span>
                                </div>

                                <span
                                    style="background: #E3F2FD; color: #1976D2; padding: 0.4rem 0.8rem; border-radius: 20px; font-size: 0.8rem; font-weight: 600;">
                                    👤 Anónimo
                                </span>
                            </div>

                            <p style="margin: 0; color: #333; line-height: 1.6; font-size: 0.95rem;">
                                "{{ $review->comment }}"
                            </p>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state" style="text-align: center; padding: 3rem 1rem;">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">⭐</div>
                    <p style="font-size: 1.1rem; color: #999;">Aún no tienes reseñas</p>
                    <p style="color: #bbb; font-size: 0.9rem;">Cuando tus estudiantes completen tutorías y dejen
                        reseñas, aparecerán aquí</p>
                </div>
            @endif
        </div>


        <!-- PROFILE Tab -->
        <div id="profile" class="section">
            <h2 class="section-title">👤 Mi Perfil</h2>
            <div
                style="background: white; padding: 2rem; border-radius: 12px; max-width: 500px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
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
        // Event listeners para las estrellas
        document.querySelectorAll('.star-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const rating = this.dataset.rating;
                const sessionId = this.dataset.sessionId;
                document.getElementById(`rating-${sessionId}`).value = rating;

                // Actualizar color de estrellas
                document.querySelectorAll(`.star-btn[data-session-id="${sessionId}"]`).forEach((star,
                    index) => {
                        if (index < rating) {
                            star.querySelector('span').style.color = '#FFD700';
                        } else {
                            star.querySelector('span').style.color = '#ddd';
                        }
                    });
            });
        });

        function toggleReviewForm(sessionId) {
            const form = document.getElementById(`reviewForm-${sessionId}`);
            if (form.style.display === 'none') {
                form.style.display = 'flex';
            } else {
                form.style.display = 'none';
            }
        }

        function submitReview(sessionId) {
            const rating = document.getElementById(`rating-${sessionId}`).value;
            const comment = document.getElementById(`comment-${sessionId}`).value;

            if (!rating || rating == 0) {
                alert('Por favor selecciona una calificación');
                return;
            }

            if (!comment.trim()) {
                alert('Por favor escribe un comentario');
                return;
            }

            const formData = new FormData();
            formData.append('tutoring_session_id', sessionId);
            formData.append('rating', rating);
            formData.append('comment', comment);
            formData.append('_token', document.querySelector('meta[name="csrf-token"]').content);

            fetch('{{ route('review.store') }}', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('✅ Reseña enviada exitosamente');
                        location.reload();
                    } else {
                        alert('❌ Error: ' + (data.error || 'Error al enviar reseña'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error al enviar reseña');
                });
        }

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
                    } else {
                        alert('Error al confirmar');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error: ' + error);
                });
        }

        function rejectTutoring(tutoringId) {
            if (confirm('¿Estás seguro de que quieres rechazar esta tutoría?')) {
                fetch(`/session/${tutoringId}`, {
                        method: 'PUT',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            status: 'rejected'
                        })
                    })
                    .then(response => {
                        if (response.ok) {
                            location.reload();
                        } else {
                            alert('Error al rechazar');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Error: ' + error);
                    });
            }
        }



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

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard</title>
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
            font-size: 1.3rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        }

        .logo-title {
            font-size: 1.6rem;
            font-weight: 800;
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
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, #9B30FF, #FF8C00);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: white;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
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
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .logout-btn:hover {
            background: rgba(255, 255, 255, 0.35);
            border-color: white;
            transform: translateY(-2px);
        }

               /* ========== TABS MEJORADOS SIN SCROLL ========== */
        .nav-tabs {
            background: white;
            border-bottom: 3px solid;
            border-image: linear-gradient(90deg, #FF8C00, #9B30FF) 1;
            display: flex;
            flex-wrap: wrap;
            gap: 0;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            overflow: visible;
            width: 100%;
        }

        .nav-tab {
            flex: 1;
            min-width: 100px;
            padding: 0.9rem 0.7rem;
            border: none;
            background: none;
            cursor: pointer;
            font-size: 0.85rem;
            font-weight: 600;
            color: #666;
            border-bottom: 3px solid transparent;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            white-space: nowrap;
            text-align: center;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .nav-tab.active {
            color: #FF8C00;
            border-bottom-color: #FF8C00;
        }

        .nav-tab:hover {
            color: #FF8C00;
            background: rgba(255, 140, 0, 0.05);
        }

        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .section {
            display: none;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .section.active {
            display: block;
        }

                /* ========== RESPONSIVE ========== */
        @media (max-width: 1024px) {
            .nav-tab {
                min-width: 90px;
                padding: 0.8rem 0.5rem;
                font-size: 0.8rem;
            }
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

            .modal-buttons {
                grid-template-columns: 1fr;
            }

            .nav-tabs {
                padding: 0 0.5rem;
            }

            .nav-tab {
                min-width: 80px;
                padding: 0.7rem 0.4rem;
                font-size: 0.75rem;
            }
        }



        /* ========== WELCOME SECTION ========== */
        .welcome-section {
            background: white;
            padding: 2.5rem;
            border-radius: 15px;
            margin-bottom: 2rem;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
            border-top: 5px solid;
            border-image: linear-gradient(90deg, #FF8C00, #9B30FF);
            border-image-slice: 1;
        }

        .welcome-title {
            font-size: 2.2rem;
            margin-bottom: 0.8rem;
            background: linear-gradient(135deg, #FF8C00, #9B30FF);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 800;
        }

        .welcome-subtitle {
            color: #666;
            margin-bottom: 1.8rem;
            font-weight: 500;
        }

        .welcome-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn {
            padding: 0.9rem 1.8rem;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
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

        /* ========== STATS GRID ========== */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.8rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);
            text-align: center;
            border: 2px solid transparent;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
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

        .stat-card:hover {
            border-color: #9B30FF;
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(155, 48, 255, 0.2);
        }

        .stat-card:hover::before {
            transform: scaleX(1);
        }

        .stat-number {
            font-size: 2.8rem;
            font-weight: 800;
            background: linear-gradient(135deg, #FF8C00, #9B30FF);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.8rem;
        }

        .stat-label {
            color: #666;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .section-title {
            font-size: 1.8rem;
            margin-bottom: 1.8rem;
            font-weight: 800;
            background: linear-gradient(135deg, #FF8C00, #9B30FF);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            border-bottom: 2px solid;
            border-image: linear-gradient(90deg, #FF8C00, #9B30FF);
            border-image-slice: 1;
            padding-bottom: 0.8rem;
        }

        /* ========== MENTORS GRID ========== */
        .mentors-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
        }

        .mentor-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            border: 2px solid #e0e0e0;
            transition: all 0.3s;
            cursor: pointer;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);
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
            margin: 0 auto 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2.5rem;
            box-shadow: 0 6px 20px rgba(155, 48, 255, 0.3);
            transition: transform 0.3s;
        }

        .mentor-card:hover .mentor-avatar {
            transform: scale(1.1);
        }

        .mentor-name {
            font-size: 1.3rem;
            font-weight: 800;
            margin-bottom: 0.4rem;
            color: #333;
        }

        .mentor-specialty {
            color: #FF8C00;
            font-weight: 700;
            margin-bottom: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .mentor-subjects {
            display: flex;
            flex-wrap: wrap;
            gap: 0.6rem;
            justify-content: center;
            margin-bottom: 1rem;
        }

        .subject-tag {
            background: linear-gradient(135deg, #fff3cd, #ffeaa7);
            color: #856404;
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 700;
        }

        .mentor-rating {
            color: #ffc107;
            margin-bottom: 0.8rem;
            font-weight: 700;
            font-size: 1.1rem;
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
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 3px 10px rgba(255, 140, 0, 0.25);
        }

        .book-btn:hover {
            background: linear-gradient(135deg, #FFA500, #FF8C00);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 140, 0, 0.35);
        }

        .empty-state {
            text-align: center;
            padding: 3rem 2rem;
            color: #999;
            background: white;
            border-radius: 15px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);
        }

        .empty-state-icon {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            opacity: 0.7;
        }

        /* ========== MODAL MEJORADO ========== */
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
            backdrop-filter: blur(5px);
        }

        #bookingModal.active {
            display: flex;
            animation: fadeIn 0.3s ease;
        }

        .modal-content {
            background-color: white;
            padding: 2.8rem;
            border-radius: 20px;
            width: 95%;
            max-width: 600px;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.35);
            max-height: 90vh;
            overflow-y: auto;
            animation: slideUp 0.3s ease;
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

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            border-bottom: 2px solid;
            border-image: linear-gradient(90deg, #FF8C00, #9B30FF);
            border-image-slice: 1;
            padding-bottom: 1.2rem;
        }

        .modal-title {
            font-size: 1.9rem;
            font-weight: 800;
            background: linear-gradient(135deg, #FF8C00, #9B30FF);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 1.8rem;
            cursor: pointer;
            color: #999;
            transition: color 0.3s;
        }

        .modal-close:hover {
            color: #FF8C00;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.6rem;
            font-weight: 700;
            color: #333;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 0.95rem 1rem;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            font-family: inherit;
            font-size: 1rem;
            transition: all 0.3s;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #FF8C00;
            box-shadow: 0 0 0 4px rgba(255, 140, 0, 0.1);
            transform: translateY(-2px);
        }

        .mentor-info {
            background: linear-gradient(135deg, #fff3cd, #ffeaa7);
            padding: 1.5rem;
            border-radius: 12px;
            margin-bottom: 1.8rem;
            border-left: 5px solid #FF8C00;
        }

        .mentor-info-label {
            font-size: 0.9rem;
            color: #856404;
            font-weight: 600;
        }

        .mentor-info-name {
            font-size: 1.4rem;
            font-weight: 800;
            color: #FF8C00;
            margin-top: 0.5rem;
        }

        .modal-buttons {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-top: 2rem;
        }

        .modal-btn {
            padding: 1rem;
            border: none;
            border-radius: 10px;
            font-weight: 700;
            cursor: pointer;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s;
        }

        .modal-btn-cancel {
            background: #f3f4f6;
            color: #333;
            border: 2px solid #e0e0e0;
        }

        .modal-btn-cancel:hover {
            background: #e0e0e0;
            border-color: #FF8C00;
            color: #FF8C00;
        }

        .modal-btn-submit {
            background: linear-gradient(135deg, #FF8C00, #FFA500);
            color: white;
            box-shadow: 0 4px 15px rgba(255, 140, 0, 0.3);
        }

        .modal-btn-submit:hover {
            background: linear-gradient(135deg, #FFA500, #FF8C00);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 140, 0, 0.4);
        }

        /* ========== RESPONSIVE ========== */
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

            .modal-buttons {
                grid-template-columns: 1fr;
            }

            .nav-tabs {
                padding: 0 1rem;
                overflow-x: auto;
            }

            .nav-tab {
                padding: 1rem 1rem;
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
        <button class="nav-tab" onclick="switchTab('mentors', event)">👨‍🏫 Mentores</button>
        <button class="nav-tab" onclick="switchTab('sessions', event)">📅 Mis Tutorías</button>
        <button class="nav-tab" onclick="switchTab('pendientes', event)">⏳ Pendientes</button>
        <button class="nav-tab" onclick="switchTab('rechazadas', event)">❌ Rechazadas</button>
        <button class="nav-tab" onclick="switchTab('history', event)">📜 Historial</button>
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

                            <!-- CALIFICACIÓN CON ESTRELLAS Y RESEÑAS -->
                            <div
                                style="margin: 1rem 0; padding: 0.8rem; background: #f9f9fa; border-radius: 8px; text-align: center;">
                                @php
                                    $avgRating = $mentor->average_rating_calculated;
                                    $reviewCount = $mentor->review_count;
                                @endphp

                                <!-- Estrellas -->
                                <div
                                    style="display: flex; justify-content: center; gap: 0.2rem; margin-bottom: 0.5rem;">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span
                                            style="font-size: 1.2rem; color: {{ $i <= round($avgRating) ? '#FFD700' : '#ddd' }};">★</span>
                                    @endfor
                                </div>

                                <!-- Calificación numérica y cantidad de reseñas -->
                                <div
                                    style="display: flex; justify-content: center; gap: 0.5rem; align-items: center; font-size: 0.9rem;">
                                    <strong style="color: #FF8C00;">{{ number_format($avgRating, 1) }}</strong>
                                    <span style="color: #999;">| {{ $reviewCount }}
                                        {{ $reviewCount === 1 ? 'reseña' : 'reseñas' }}</span>
                                </div>
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

        <!-- TUTORÍAS PENDIENTES Tab -->
        <div id="pendientes" class="section">
            <h2 class="section-title">⏳ Tutorías Pendientes</h2>
            <p style="color: #666; margin-bottom: 1.5rem;">Esperando confirmación del mentor</p>

            @if (count($upcomingSessions->where('status', 'pending')) > 0)
                <div class="tutoring-list">
                    @foreach ($upcomingSessions->where('status', 'pending') as $tutoring)
                        <div class="tutoring-card" style="background: #fff8e1; border-left: 5px solid #ffc107;">
                            <div class="tutoring-header">
                                <div>
                                    <div class="tutoring-title">{{ $tutoring->mentor->user->name }} -
                                        {{ $tutoring->subject->name }}</div>
                                </div>
                                <span class="tutoring-status" style="background: #ffc107; color: #333;">
                                    Pendiente
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
                            </div>

                            <div
                                style="margin-top: 1rem; padding: 0.6rem; background: #fff3cd; border-left: 4px solid #ffc107; border-radius: 6px;">
                                <strong style="color: #856404;">⏳ Esperando que el mentor confirme esta
                                    tutoría</strong>
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


        <!-- TUTORÍAS RECHAZADAS Tab -->
        <div id="rechazadas" class="section">
            <h2 class="section-title">❌ Tutorías Rechazadas</h2>

            @if (count($rejectedSessions) > 0)
                <div class="tutoring-list">
                    @foreach ($rejectedSessions as $tutoring)
                        <div class="tutoring-card"
                            style="background: #fff3cd; opacity: 0.9; border-left: 5px solid #dc3545;">
                            <div class="tutoring-header">
                                <div>
                                    <div class="tutoring-title" style="color: #dc3545;">
                                        {{ $tutoring->mentor->user->name }} - {{ $tutoring->subject->name }}
                                    </div>
                                </div>
                                <span class="tutoring-status" style="background: #dc3545; color: white;">
                                    Rechazada
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
                            </div>

                            <div
                                style="margin-top: 1rem; padding: 0.6rem; background: #f8d7da; border-left: 4px solid #dc3545; border-radius: 6px;">
                                <strong style="color: #721c24;">⚠️ Esta tutoría fue rechazada por el mentor</strong>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <div class="empty-state-icon">✨</div>
                    <p>No tienes tutorías rechazadas</p>
                </div>
            @endif
        </div>


        <!-- HISTORY Tab (Tutorías Expiradas) -->
        <div id="history" class="section">
            <h2 class="section-title">Historial de Tutorías</h2>
            <p style="color: #666; margin-bottom: 1.5rem;">Tutorías que ya pasaron su fecha programada</p>

            @if (count($expiredSessions) > 0)
                <div style="display: grid; gap: 1rem;">
                    @foreach ($expiredSessions as $session)
                        <div
                            style="background: #f8f9fa; padding: 1.5rem; border-radius: 10px; border-left: 4px solid #6c757d; opacity: 0.95; margin-bottom: 1.5rem;">
                            <div style="display: flex; justify-content: space-between; margin-bottom: 1rem;">
                                <div style="font-weight: 600; color: #495057;">
                                    {{ $session->mentor->user->name }} - {{ $session->subject->name }}
                                </div>
                                <span
                                    style="background: #e9ecef; color: #495057; padding: 0.3rem 0.8rem; border-radius: 20px; font-size: 0.8rem; font-weight: 600;">
                                    {{ ucfirst($session->status) }}
                                </span>
                            </div>

                            <div
                                style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 1rem; font-size: 0.9rem; color: #666;">
                                <div><strong>Fecha:</strong> {{ $session->scheduled_at->format('d/m/Y H:i') }}</div>
                                <div><strong>Duración:</strong> {{ $session->duration }} min</div>
                                <div><strong>Tipo:</strong> {{ ucfirst($session->type) }}</div>
                                @if ($session->location)
                                    <div><strong>Ubicación:</strong> {{ $session->location }}</div>
                                @endif
                            </div>

                            <!-- Badge de expirada -->
                            <div
                                style="margin-top: 1rem; padding: 0.6rem; background: #fff3cd; border-left: 4px solid #ffc107; border-radius: 6px;">
                                <strong style="color: #856404;">⏰ Esta tutoría ya pasó</strong>
                            </div>

                            <!-- FORMULARIO DE RESEÑA -->
                            @if ($session->status === 'completed')
                                @php
                                    $review = $session
                                        ->reviews()
                                        ->where('student_id', auth()->id())
                                        ->first();
                                @endphp

                                <div class="review-section"
                                    style="margin-top: 1.5rem; border-top: 2px solid #e0e0e0; padding-top: 1.5rem; background: linear-gradient(135deg, #fff9f0 0%, #ffffff 100%); border-radius: 12px;">
                                    <h4 style="color: #FF8C00; font-weight: 700; margin-bottom: 1rem;">⭐ Dejar una
                                        Reseña</h4>

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
                                        <button type="button" onclick="toggleReviewForm({{ $session->id }})"
                                            style="padding: 0.6rem 1rem; background: #2196F3; color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: 600; width: 100%;">
                                            Editar Reseña
                                        </button>
                                    @endif

                                    <!-- Formulario (oculto si ya existe reseña) -->
                                    <form id="reviewForm-{{ $session->id }}"
                                        style="display: {{ $review ? 'none' : 'flex' }}; flex-direction: column; gap: 1rem; margin-top: {{ $review ? '1rem' : '0' }};">
                                        @csrf
                                        <div class="rating-input" style="display: flex; gap: 0.5rem;">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <button type="button" class="star-btn"
                                                    data-rating="{{ $i }}"
                                                    data-session-id="{{ $session->id }}"
                                                    style="background: none; border: none; font-size: 2rem; cursor: pointer; transition: transform 0.2s;">
                                                    <span
                                                        style="color: {{ $review && $review->rating >= $i ? '#FFD700' : '#ddd' }}; transition: color 0.2s;">★</span>
                                                </button>
                                            @endfor
                                        </div>

                                        <input type="hidden" name="tutoring_session_id"
                                            value="{{ $session->id }}">
                                        <input type="hidden" name="rating" id="rating-{{ $session->id }}"
                                            value="{{ $review?->rating ?? 0 }}">

                                        <textarea name="comment" id="comment-{{ $session->id }}" placeholder="Comparte tu experiencia con el mentor..."
                                            style="padding: 0.8rem; border: 2px solid #e0e0e0; border-radius: 8px; min-height: 100px; resize: vertical; transition: all 0.3s; font-family: inherit;"
                                            onfocus="this.style.borderColor='#FF8C00'; this.style.boxShadow='0 0 0 3px rgba(255,140,0,0.1)'"
                                            onblur="this.style.borderColor='#e0e0e0'; this.style.boxShadow='none'">{{ $review?->comment }}</textarea>

                                        <div style="display: flex; gap: 1rem;">
                                            <button type="button" class="submit-review-btn"
                                                onclick="submitReview({{ $session->id }})"
                                                style="flex: 1; padding: 0.8rem; background: linear-gradient(135deg, #FF8C00, #FFA500); color: white; border: none; border-radius: 8px; font-weight: 700; cursor: pointer; transition: transform 0.2s;"
                                                onmouseover="this.style.transform='scale(1.02)'"
                                                onmouseout="this.style.transform='scale(1)'">
                                                Enviar Reseña
                                            </button>
                                            @if ($review)
                                                <button type="button"
                                                    onclick="toggleReviewForm({{ $session->id }})"
                                                    style="flex: 1; padding: 0.8rem; background: #999; color: white; border: none; border-radius: 8px; font-weight: 700; cursor: pointer;">
                                                    Cancelar
                                                </button>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                            @endif
                            
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state" style="text-align: center; padding: 2rem; color: #999;">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">📚</div>
                    <p style="font-size: 1.1rem;">No tienes tutorías expiradas</p>
                </div>
            @endif
        </div>

        <script>
            // ============================================
            // 1. CREAR ESTILOS DE ANIMACIÓN
            // ============================================
            const style = document.createElement('style');
            style.textContent = `
        @keyframes slideIn {
            from {
                transform: translateX(400px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        @keyframes slideOut {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(400px);
                opacity: 0;
            }
        }
    `;
            document.head.appendChild(style);

            // ============================================
            // 2. FUNCIÓN PARA MOSTRAR NOTIFICACIONES
            // ============================================
            function showNotification(message, type = 'success') {
                const notification = document.createElement('div');
                notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: ${type === 'success' ? '#4caf50' : '#f44336'};
            color: white;
            padding: 1rem 1.5rem;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.3);
            font-weight: 600;
            font-size: 1rem;
            z-index: 9999;
            animation: slideIn 0.3s ease-out;
            max-width: 400px;
        `;
                notification.textContent = message;
                document.body.appendChild(notification);

                setTimeout(() => {
                    notification.style.animation = 'slideOut 0.3s ease-out';
                    setTimeout(() => notification.remove(), 300);
                }, 3000);
            }

            // ============================================
            // 3. FUNCIÓN PARA TOGGLE DEL FORMULARIO
            // ============================================
            function toggleReviewForm(sessionId) {
                const form = document.getElementById(`reviewForm-${sessionId}`);
                if (form.style.display === 'none') {
                    form.style.display = 'flex';
                } else {
                    form.style.display = 'none';
                }
            }

            // ============================================
            // 4. INICIALIZAR ESTRELLAS AL CARGAR
            // ============================================
            document.addEventListener('DOMContentLoaded', function() {
                const sessionIds = new Set();
                document.querySelectorAll('[data-session-id]').forEach(btn => {
                    sessionIds.add(btn.dataset.sessionId);
                });

                sessionIds.forEach(sessionId => {
                    setupStarRating(sessionId);
                });
            });

            // ============================================
            // 5. CONFIGURAR RATING DE ESTRELLAS
            // ============================================
            function setupStarRating(sessionId) {
                const starButtons = document.querySelectorAll(`[data-session-id="${sessionId}"]`);

                starButtons.forEach(btn => {
                    btn.addEventListener('click', function() {
                        const rating = this.dataset.rating;
                        document.getElementById(`rating-${sessionId}`).value = rating;
                        updateStarColors(sessionId, rating, false);
                    });

                    btn.addEventListener('mouseover', function() {
                        const rating = this.dataset.rating;
                        updateStarColors(sessionId, rating, true);
                    });

                    btn.addEventListener('mouseout', function() {
                        const currentRating = document.getElementById(`rating-${sessionId}`).value || 0;
                        updateStarColors(sessionId, currentRating, false);
                    });
                });
            }

            function updateStarColors(sessionId, rating, isHover) {
                document.querySelectorAll(`[data-session-id="${sessionId}"] span`).forEach((star, index) => {
                    const starIndex = index + 1;
                    if (starIndex <= rating) {
                        star.style.color = isHover ? '#FFA500' : '#FFD700';
                    } else {
                        star.style.color = '#ddd';
                    }
                });
            }

            // ============================================
            // 6. FUNCIÓN PARA ENVIAR RESEÑA
            // ============================================
            function submitReview(sessionId) {
                const rating = document.getElementById(`rating-${sessionId}`).value;
                const comment = document.getElementById(`comment-${sessionId}`).value;

                // Validación
                if (!rating || rating == 0) {
                    showNotification('Por favor selecciona una calificación', 'error');
                    return;
                }

                if (comment.trim().length === 0) {
                    showNotification('Por favor escribe un comentario', 'error');
                    return;
                }

                if (comment.trim().length < 10) {
                    showNotification('El comentario debe tener al menos 10 caracteres', 'error');
                    return;
                }

                const submitBtn = event.target;
                const originalText = submitBtn.textContent;
                submitBtn.textContent = 'Enviando...';
                submitBtn.disabled = true;

                // Obtener el token CSRF de forma segura
                const csrfToken = document.querySelector('meta[name="csrf-token"]');
                const token = csrfToken ? csrfToken.getAttribute('content') : '';

                if (!token) {
                    console.error('Token CSRF no encontrado');
                    showNotification('Error de seguridad. Recarga la página.', 'error');
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                    return;
                }

                fetch('/review/store', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': token
                        },
                        body: JSON.stringify({
                            tutoring_session_id: sessionId,
                            rating: rating,
                            comment: comment
                        })
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log('Response:', data);
                        if (data.success || data.message) {
                            showNotification('✓ ¡Chaval! La reseña se ha enviado', 'success');
                            setTimeout(() => {
                                location.reload();
                            }, 2000);
                        } else if (data.error) {
                            showNotification('Error: ' + data.error, 'error');
                            submitBtn.textContent = originalText;
                            submitBtn.disabled = false;
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showNotification('Error al enviar la reseña. Intenta nuevamente.', 'error');
                        submitBtn.textContent = originalText;
                        submitBtn.disabled = false;
                    });
            }
        </script>





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
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
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

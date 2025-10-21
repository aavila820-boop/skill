<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillLink - Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        /* Header */
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: contain;
            background: white;
            padding: 5px;
        }

        .logo-text {
            font-size: 24px;
            font-weight: bold;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .header-nav {
            display: flex;
            gap: 25px;
        }

        .nav-link {
            text-decoration: none;
            color: #4b5563;
            font-weight: 600;
            transition: all 0.3s;
            padding: 8px 16px;
            border-radius: 8px;
        }

        .nav-link:hover {
            color: #667eea;
            background: #f3f4f6;
        }

        .nav-link.active {
            color: #667eea;
            background: #ede9fe;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .notification-btn {
            position: relative;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #f3f4f6;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            transition: all 0.3s;
        }

        .notification-btn:hover {
            background: #e5e7eb;
            transform: scale(1.05);
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #ef4444;
            color: white;
            font-size: 11px;
            font-weight: bold;
            padding: 3px 6px;
            border-radius: 10px;
        }

        .user-avatar-header {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 2px solid #667eea;
            cursor: pointer;
            transition: all 0.3s;
        }

        .user-avatar-header:hover {
            transform: scale(1.05);
            box-shadow: 0 0 10px rgba(102, 126, 234, 0.5);
        }

        /* Container Principal */
        .container {
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Sección de Bienvenida */
        .welcome-section {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
        }

        .welcome-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .welcome-text h1 {
            font-size: 32px;
            color: #1f2937;
            margin-bottom: 8px;
        }

        .welcome-text p {
            color: #6b7280;
            font-size: 16px;
        }

        .date-badge {
            background: white;
            padding: 12px 20px;
            border-radius: 12px;
            font-weight: 600;
            color: #667eea;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        /* Tarjetas de Estadísticas */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--card-color-1), var(--card-color-2));
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.2);
        }

        .stat-card:nth-child(1) {
            --card-color-1: #667eea;
            --card-color-2: #764ba2;
        }

        .stat-card:nth-child(2) {
            --card-color-1: #10b981;
            --card-color-2: #059669;
        }

        .stat-card:nth-child(3) {
            --card-color-1: #f59e0b;
            --card-color-2: #d97706;
        }

        .stat-card:nth-child(4) {
            --card-color-1: #ef4444;
            --card-color-2: #dc2626;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 15px;
            background: linear-gradient(135deg, var(--card-color-1), var(--card-color-2));
            color: white;
        }

        .stat-value {
            font-size: 32px;
            font-weight: bold;
            color: #1f2937;
            margin-bottom: 5px;
        }

        .stat-label {
            color: #6b7280;
            font-size: 14px;
            font-weight: 600;
        }

        /* Grid Principal */
        .main-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 25px;
            margin-bottom: 30px;
        }

        /* Gráfico de Progreso */
        .progress-section {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .section-title {
            font-size: 20px;
            font-weight: bold;
            color: #1f2937;
        }

        .time-filter {
            display: flex;
            gap: 10px;
        }

        .time-btn {
            padding: 8px 16px;
            background: #f3f4f6;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            color: #6b7280;
            cursor: pointer;
            transition: all 0.3s;
        }

        .time-btn.active {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }

        .time-btn:hover {
            background: #e5e7eb;
        }

        .time-btn.active:hover {
            background: linear-gradient(135deg, #667eea, #764ba2);
        }

        .chart-container {
            display: flex;
            align-items: flex-end;
            justify-content: space-around;
            height: 250px;
            gap: 15px;
            padding: 20px 0;
            border-bottom: 2px solid #e5e7eb;
        }

        .chart-bar {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        .bar {
            width: 100%;
            background: linear-gradient(180deg, #667eea, #764ba2);
            border-radius: 8px 8px 0 0;
            position: relative;
            transition: all 0.3s;
            cursor: pointer;
        }

        .bar:hover {
            opacity: 0.8;
            transform: scaleY(1.05);
        }

        .bar-value {
            position: absolute;
            top: -25px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 12px;
            font-weight: bold;
            color: #667eea;
        }

        .bar-label {
            font-size: 14px;
            font-weight: 600;
            color: #6b7280;
            margin-top: 8px;
        }

        /* Próximas Sesiones */
        .sessions-section {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        .session-card {
            display: flex;
            gap: 15px;
            padding: 15px;
            border-radius: 12px;
            background: #f9fafb;
            margin-bottom: 15px;
            transition: all 0.3s;
            cursor: pointer;
            border: 2px solid transparent;
        }

        .session-card:hover {
            background: #f3f4f6;
            border-color: #667eea;
            transform: translateX(5px);
        }

        .session-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 2px solid #667eea;
        }

        .session-info {
            flex: 1;
        }

        .session-mentor {
            font-weight: bold;
            color: #1f2937;
            font-size: 15px;
            margin-bottom: 3px;
        }

        .session-topic {
            color: #6b7280;
            font-size: 13px;
            margin-bottom: 5px;
        }

        .session-time {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 12px;
            color: #667eea;
            font-weight: 600;
        }

        .session-actions {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .btn-join {
            padding: 8px 16px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            white-space: nowrap;
        }

        .btn-join:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
        }

        .btn-details {
            padding: 8px 16px;
            background: #f3f4f6;
            color: #4b5563;
            border: none;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-details:hover {
            background: #e5e7eb;
        }

        /* Retos Completados */
        .challenges-section {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        .challenges-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .challenge-card {
            background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
            border-radius: 15px;
            padding: 20px;
            transition: all 0.3s;
            cursor: pointer;
            border: 2px solid transparent;
        }

        .challenge-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.2);
            border-color: #667eea;
        }

        .challenge-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 15px;
        }

        .challenge-name {
            font-weight: bold;
            color: #1f2937;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .challenge-progress {
            margin-bottom: 12px;
        }

        .progress-bar-container {
            width: 100%;
            height: 8px;
            background: #e5e7eb;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 8px;
        }

        .progress-bar-fill {
            height: 100%;
            background: linear-gradient(90deg, #667eea, #764ba2);
            border-radius: 10px;
            transition: width 1s ease;
        }

        .progress-text {
            font-size: 12px;
            color: #6b7280;
            font-weight: 600;
        }

        .challenge-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 12px;
            padding-top: 12px;
            border-top: 1px solid #e5e7eb;
        }

        .challenge-points {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 14px;
            color: #f59e0b;
            font-weight: bold;
        }

        .challenge-date {
            font-size: 12px;
            color: #9ca3af;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .main-grid {
                grid-template-columns: 1fr;
            }

            .header {
                flex-direction: column;
                gap: 15px;
            }

            .header-nav {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
            }

            .welcome-header {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
        }

        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .challenges-grid {
                grid-template-columns: 1fr;
            }

            .time-filter {
                flex-wrap: wrap;
            }

            .session-card {
                flex-direction: column;
            }

            .session-actions {
                flex-direction: row;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="logo-container">
            <img src="./images/uwu2.jpeg" alt="SkillLink Logo" class="logo">
            <div class="logo-text">SkillLink</div>
        </div>
        <nav class="header-nav">
            <a href="#" class="nav-link active">Dashboard</a>
            <a href="#" class="nav-link">Buscar Mentores</a>
            <a href="#" class="nav-link">Mis Mentorías</a>
            <a href="#" class="nav-link">Mi Perfil</a>
        </nav>
        <div class="header-actions">
            <button class="notification-btn">
                🔔
                <span class="notification-badge">3</span>
            </button>
            <img src="https://ui-avatars.com/api/?name=Maria+Silva&size=40&background=667eea&color=fff&bold=true" alt="Usuario" class="user-avatar-header">
        </div>
    </div>

    <div class="container">
        <!-- Sección de Bienvenida -->
        <div class="welcome-section">
            <div class="welcome-header">
                <div class="welcome-text">
                    <h1>👋 ¡Bienvenida de nuevo, María!</h1>
                    <p>Sigue aprendiendo y creciendo profesionalmente</p>
                </div>
                <div class="date-badge" id="currentDate">
                    📅 Martes, 21 de Octubre 2025
                </div>
            </div>
        </div>

        <!-- Tarjetas de Estadísticas -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">📚</div>
                <div class="stat-value">5</div>
                <div class="stat-label">Mentorías Activas</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">✅</div>
                <div class="stat-value">24</div>
                <div class="stat-label">Sesiones Completadas</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">🏆</div>
                <div class="stat-value">12</div>
                <div class="stat-label">Retos Completados</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">⏰</div>
                <div class="stat-value">48h</div>
                <div class="stat-label">Horas de Aprendizaje</div>
            </div>
        </div>

        <!-- Grid Principal -->
        <div class="main-grid">
            <!-- Gráfico de Progreso -->
            <div class="progress-section">
                <div class="section-header">
                    <h2 class="section-title">📈 Tu Progreso Semanal</h2>
                    <div class="time-filter">
                        <button class="time-btn active">Semana</button>
                        <button class="time-btn">Mes</button>
                        <button class="time-btn">Año</button>
                    </div>
                </div>
                <div class="chart-container" id="chartContainer">
                    <div class="chart-bar">
                        <div class="bar" style="height: 60%;">
                            <span class="bar-value">3h</span>
                        </div>
                        <span class="bar-label">L</span>
                    </div>
                    <div class="chart-bar">
                        <div class="bar" style="height: 80%;">
                            <span class="bar-value">4h</span>
                        </div>
                        <span class="bar-label">M</span>
                    </div>
                    <div class="chart-bar">
                        <div class="bar" style="height: 50%;">
                            <span class="bar-value">2.5h</span>
                        </div>
                        <span class="bar-label">M</span>
                    </div>
                    <div class="chart-bar">
                        <div class="bar" style="height: 90%;">
                            <span class="bar-value">4.5h</span>
                        </div>
                        <span class="bar-label">J</span>
                    </div>
                    <div class="chart-bar">
                        <div class="bar" style="height: 70%;">
                            <span class="bar-value">3.5h</span>
                        </div>
                        <span class="bar-label">V</span>
                    </div>
                    <div class="chart-bar">
                        <div class="bar" style="height: 40%;">
                            <span class="bar-value">2h</span>
                        </div>
                        <span class="bar-label">S</span>
                    </div>
                    <div class="chart-bar">
                        <div class="bar" style="height: 30%;">
                            <span class="bar-value">1.5h</span>
                        </div>
                        <span class="bar-label">D</span>
                    </div>
                </div>
            </div>

            <!-- Próximas Sesiones -->
            <div class="sessions-section">
                <div class="section-header">
                    <h2 class="section-title">📅 Próximas Sesiones</h2>
                </div>
                <div class="session-card">
                    <img src="https://ui-avatars.com/api/?name=Carlos+Mendez&size=50&background=667eea&color=fff&bold=true" alt="Carlos Méndez" class="session-avatar">
                    <div class="session-info">
                        <div class="session-mentor">Carlos Méndez</div>
                        <div class="session-topic">Estrategias de Marketing Digital</div>
                        <div class="session-time">🕐 Hoy • 3:00 PM</div>
                    </div>
                    <div class="session-actions">
                        <button class="btn-join">🎥 Unirse</button>
                        <button class="btn-details">Ver detalles</button>
                    </div>
                </div>

                <div class="session-card">
                    <img src="https://ui-avatars.com/api/?name=Ana+Lopez&size=50&background=764ba2&color=fff&bold=true" alt="Ana López" class="session-avatar">
                    <div class="session-info">
                        <div class="session-mentor">Ana López</div>
                        <div class="session-topic">Diseño UX/UI Avanzado</div>
                        <div class="session-time">🕐 Mañana • 10:00 AM</div>
                    </div>
                    <div class="session-actions">
                        <button class="btn-details">Ver detalles</button>
                    </div>
                </div>

                <div class="session-card">
                    <img src="https://ui-avatars.com/api/?name=Luis+Torres&size=50&background=10b981&color=fff&bold=true" alt="Luis Torres" class="session-avatar">
                    <div class="session-info">
                        <div class="session-mentor">Luis Torres</div>
                        <div class="session-topic">Desarrollo de Apps con React</div>
                        <div class="session-time">🕐 Jueves • 4:30 PM</div>
                    </div>
                    <div class="session-actions">
                        <button class="btn-details">Ver detalles</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Retos Completados -->
        <div class="challenges-section">
            <div class="section-header">
                <h2 class="section-title">🏆 Retos Completados</h2>
            </div>
            <div class="challenges-grid">
                <div class="challenge-card">
                    <div class="challenge-icon">🎯</div>
                    <div class="challenge-name">Primer Sprint Completado</div>
                    <div class="challenge-progress">
                        <div class="progress-bar-container">
                            <div class="progress-bar-fill" style="width: 100%;"></div>
                        </div>
                        <div class="progress-text">100% Completado</div>
                    </div>
                    <div class="challenge-footer">
                        <div class="challenge-points">⭐ +50 puntos</div>
                        <div class="challenge-date">15 Oct 2025</div>
                    </div>
                </div>

                <div class="challenge-card">
                    <div class="challenge-icon">💡</div>
                    <div class="challenge-name">Proyecto de Marketing</div>
                    <div class="challenge-progress">
                        <div class="progress-bar-container">
                            <div class="progress-bar-fill" style="width: 100%;"></div>
                        </div>
                        <div class="progress-text">100% Completado</div>
                    </div>
                    <div class="challenge-footer">
                        <div class="challenge-points">⭐ +75 puntos</div>
                        <div class="challenge-date">12 Oct 2025</div>
                    </div>
                </div>

                <div class="challenge-card">
                    <div class="challenge-icon">🚀</div>
                    <div class="challenge-name">Lanzamiento de MVP</div>
                    <div class="challenge-progress">
                        <div class="progress-bar-container">
                            <div class="progress-bar-fill" style="width: 100%;"></div>
                        </div>
                        <div class="progress-text">100% Completado</div>
                    </div>
                    <div class="challenge-footer">
                        <div class="challenge-points">⭐ +100 puntos</div>
                        <div class="challenge-date">8 Oct 2025</div>
                    </div>
                </div>

                <div class="challenge-card">
                    <div class="challenge-icon">📊</div>
                    <div class="challenge-name">Análisis de Datos</div>
                    <div class="challenge-progress">
                        <div class="progress-bar-container">
                            <div class="progress-bar-fill" style="width: 100%;"></div>
                        </div>
                        <div class="progress-text">100% Completado</div>
                    </div>
                    <div class="challenge-footer">
                        <div class="challenge-points">⭐ +60 puntos</div>
                        <div class="challenge-date">5 Oct 2025</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Actualizar fecha actual
        function updateCurrentDate() {
            const dateElement = document.getElementById('currentDate');
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            const currentDate = new Date().toLocaleDateString('es-ES', options);
            const capitalizedDate = currentDate.charAt(0).toUpperCase() + currentDate.slice(1);
            dateElement.textContent = `📅 ${capitalizedDate}`;
        }

        updateCurrentDate();

        // Animación de barras de progreso
        window.addEventListener('load', function() {
            const progressBars = document.querySelectorAll('.progress-bar-fill');
            progressBars.forEach(bar => {
                const width = bar.style.width;
                bar.style.width = '0%';
                setTimeout(() => {
                    bar.style.width = width;
                }, 100);
            });
        });

        // Navegación
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Filtro de tiempo
        document.querySelectorAll('.time-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.time-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                // Aquí se actualizaría el gráfico según el periodo seleccionado
            });
        });

        // Botón de notificaciones
        document.querySelector('.notification-btn').addEventListener('click', function() {
            alert('🔔 Tienes 3 notificaciones:\n\n1. Nueva sesión programada con Carlos Méndez\n2. Reto completado: +50 puntos\n3. Recordatorio: Sesión en 30 minutos');
        });

        // Botón unirse a sesión
        document.querySelectorAll('.btn-join').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                alert('🎥 Iniciando videollamada...\n\n¡Conectando con tu mentor!');
            });
        });

        // Botón ver detalles
        document.querySelectorAll('.btn-details').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                const sessionCard = this.closest('.session-card');
                const mentor = sessionCard.querySelector('.session-mentor').textContent;
                const topic = sessionCard.querySelector('.session-topic').textContent;
                alert(`📋 Detalles de la sesión:\n\nMentor: ${mentor}\nTema: ${topic}\n\n✓ Duración: 1 hora\n✓ Modalidad: Virtual\n✓ Materiales: Incluidos`);
            });
        });

        // Click en tarjeta de sesión
        document.querySelectorAll('.session-card').forEach(card => {
            card.addEventListener('click', function() {
                const mentor = this.querySelector('.session-mentor').textContent;
                alert(`📅 Abriendo detalles de sesión con ${mentor}`);
            });
        });

        // Click en tarjetas de estadísticas
        document.querySelectorAll('.stat-card').forEach(card => {
            card.addEventListener('click', function() {
                const label = this.querySelector('.stat-label').textContent;
                alert(`📊 Ver detalles de: ${label}`);
            });
        });

        // Click en tarjetas de retos
        document.querySelectorAll('.challenge-card').forEach(card => {
            card.addEventListener('click', function() {
                const name = this.querySelector('.challenge-name').textContent;
                const points = this.querySelector('.challenge-points').textContent;
                alert(`🏆 ${name}\n\n${points}\n\n¡Felicitaciones por completar este reto!`);
            });
        });

        // Hover en barras del gráfico
        document.querySelectorAll('.bar').forEach(bar => {
            bar.addEventListener('click', function() {
                const value = this.querySelector('.bar-value').textContent;
                const label = this.closest('.chart-bar').querySelector('.bar-label').textContent;
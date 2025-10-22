<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillLink UNAB - Mi Perfil Plan Padrino</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0051a5 0%, #003d7a 100%);
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

        .logo-text-container {
            display: flex;
            flex-direction: column;
        }

        .logo-text {
            font-size: 24px;
            font-weight: bold;
            background: linear-gradient(135deg, #0051a5, #003d7a);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .unab-badge {
            font-size: 11px;
            color: #666;
            font-weight: 600;
            margin-top: -3px;
        }

        .header-actions {
            display: flex;
            gap: 15px;
        }

        .btn-header {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-notifications {
            background: #f3f4f6;
            color: #374151;
        }

        .btn-notifications:hover {
            background: #e5e7eb;
        }

        .btn-logout {
            background: linear-gradient(135deg, #0051a5, #003d7a);
            color: white;
        }

        .btn-logout:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 81, 165, 0.4);
        }

        /* Plan Padrino Banner */
        .plan-padrino-banner {
            background: linear-gradient(135deg, #0051a5, #0066cc);
            color: white;
            padding: 20px 30px;
            border-radius: 20px;
            margin-bottom: 25px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
        }

        .banner-left {
            flex: 1;
        }

        .banner-title {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .banner-subtitle {
            font-size: 14px;
            opacity: 0.9;
        }

        .banner-badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.2);
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
        }

        /* Container Principal */
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Card Principal del Perfil */
        .profile-card {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .profile-header {
            display: flex;
            gap: 40px;
            align-items: flex-start;
            margin-bottom: 40px;
            flex-wrap: wrap;
        }

        .profile-photo-section {
            position: relative;
        }

        .profile-photo {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #0051a5;
            box-shadow: 0 8px 25px rgba(0, 81, 165, 0.3);
        }

        .change-photo-btn {
            position: absolute;
            bottom: 10px;
            right: 10px;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #0051a5, #003d7a);
            border: 3px solid white;
            color: white;
            font-size: 18px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }

        .change-photo-btn:hover {
            transform: scale(1.1);
        }

        .profile-info {
            flex: 1;
        }

        .profile-name {
            font-size: 32px;
            font-weight: bold;
            color: #1f2937;
            margin-bottom: 10px;
        }

        .profile-role {
            display: inline-block;
            padding: 8px 20px;
            background: #fef3c7;
            color: #92400e;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .profile-role.mentor {
            background: #dbeafe;
            color: #1e40af;
        }

        .profile-career {
            color: #0051a5;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .profile-stats {
            display: flex;
            gap: 30px;
            margin: 20px 0;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 24px;
            font-weight: bold;
            color: #0051a5;
        }

        .stat-label {
            font-size: 14px;
            color: #6b7280;
            margin-top: 5px;
        }

        .btn-edit-profile {
            padding: 12px 30px;
            background: linear-gradient(135deg, #0051a5, #003d7a);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 15px;
        }

        .btn-edit-profile:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 81, 165, 0.4);
        }

        /* Sección de Biografía */
        .section {
            margin-bottom: 35px;
        }

        .section-title {
            font-size: 20px;
            font-weight: bold;
            color: #1f2937;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title::before {
            content: '';
            width: 4px;
            height: 24px;
            background: linear-gradient(135deg, #0051a5, #003d7a);
            border-radius: 2px;
        }

        .biography {
            color: #4b5563;
            line-height: 1.8;
            font-size: 16px;
        }

        /* Habilidades/Materias */
        .skills-container {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .skill-tag {
            padding: 10px 20px;
            background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
            border: 2px solid #0051a5;
            border-radius: 25px;
            color: #374151;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s;
            cursor: default;
        }

        .skill-tag:hover {
            background: linear-gradient(135deg, #0051a5, #003d7a);
            color: white;
            transform: translateY(-2px);
        }

        /* Tutorías Programadas */
        .tutorias-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .tutoria-card {
            background: linear-gradient(135deg, #f9fafb, #ffffff);
            border: 2px solid #e5e7eb;
            border-radius: 15px;
            padding: 20px;
            transition: all 0.3s;
            cursor: pointer;
        }

        .tutoria-card:hover {
            border-color: #0051a5;
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 81, 165, 0.2);
        }

        .tutoria-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .tutoria-date {
            background: #0051a5;
            color: white;
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
        }

        .tutoria-status {
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-proximo {
            background: #fef3c7;
            color: #92400e;
        }

        .status-completado {
            background: #d1fae5;
            color: #065f46;
        }

        .tutoria-title {
            font-size: 18px;
            font-weight: bold;
            color: #1f2937;
            margin-bottom: 10px;
        }

        .tutoria-mentor {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .mentor-avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: linear-gradient(135deg, #0051a5, #003d7a);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 12px;
        }

        .tutoria-time {
            color: #9ca3af;
            font-size: 14px;
        }

        .tutoria-modality {
            display: inline-block;
            padding: 4px 10px;
            background: #e3f2fd;
            color: #1e40af;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 600;
            margin-top: 8px;
        }

        /* Sección de Logros Plan Padrino */
        .achievements-section {
            background: linear-gradient(135deg, #f9fafb, #ffffff);
            border-radius: 15px;
            padding: 25px;
            border: 2px solid #e5e7eb;
        }

        .achievements-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .achievement-item {
            text-align: center;
            padding: 20px;
            background: white;
            border-radius: 12px;
            border: 2px solid #0051a5;
            transition: all 0.3s;
        }

        .achievement-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 81, 165, 0.2);
        }

        .achievement-icon {
            font-size: 40px;
            margin-bottom: 10px;
        }

        .achievement-title {
            font-size: 16px;
            font-weight: bold;
            color: #1f2937;
            margin-bottom: 5px;
        }

        .achievement-description {
            font-size: 13px;
            color: #6b7280;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .profile-header {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .profile-stats {
                justify-content: center;
            }

            .header {
                flex-direction: column;
                gap: 15px;
            }

            .header-actions {
                width: 100%;
                justify-content: center;
            }

            .tutorias-grid {
                grid-template-columns: 1fr;
            }

            .plan-padrino-banner {
                flex-direction: column;
                text-align: center;
            }

            .achievements-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="logo-container">
            <img src="./images/uwu2.jpeg" alt="SkillLink UNAB Logo" class="logo">
            <div class="logo-text-container">
                <div class="logo-text">SkillLink UNAB</div>
                <div class="unab-badge">Plan Padrino Digital</div>
            </div>
        </div>
        <div class="header-actions">
            <button class="btn-header btn-notifications">🔔 Notificaciones</button>
            <button class="btn-header btn-logout">Cerrar Sesión</button>
        </div>
    </div>

    <!-- Plan Padrino Banner -->
    <div class="container">
        <div class="plan-padrino-banner">
            <div class="banner-left">
                <div class="banner-title">🤝 Miembro del Plan Padrino UNAB</div>
                <div class="banner-subtitle">Acompañamiento académico solidario</div>
            </div>
            <div class="banner-badge">
                ✨ Tutoría 100% Gratuita
            </div>
        </div>

        <!-- Card Principal del Perfil -->
        <div class="profile-card">
            <div class="profile-header">
                <div class="profile-photo-section">
                    <img src="https://ui-avatars.com/api/?name=Maria+Rodriguez&size=180&background=0051a5&color=fff&bold=true" alt="Foto de perfil" class="profile-photo">
                    <button class="change-photo-btn" title="Cambiar foto">📷</button>
                </div>
                <div class="profile-info">
                    <h1 class="profile-name">María Rodríguez Silva</h1>
                    <span class="profile-role">🎓 Estudiante UNAB - 3er Semestre</span>
                    <div class="profile-career">💼 Administración de Empresas</div>
                    <div class="profile-stats">
                        <div class="stat-item">
                            <div class="stat-number">8</div>
                            <div class="stat-label">Tutorías Recibidas</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">5</div>
                            <div class="stat-label">Mentores</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">4.2</div>
                            <div class="stat-label">Promedio</div>
                        </div>
                    </div>
                    <button class="btn-edit-profile">✏️ Editar Perfil</button>
                </div>
            </div>

            <!-- Biografía -->
            <div class="section">
                <h2 class="section-title">Sobre mí</h2>
                <p class="biography">
                    Estudiante de tercer semestre de Administración de Empresas en la UNAB. Me apasionan los negocios y el emprendimiento. Gracias al Plan Padrino Digital he podido mejorar significativamente en materias de contabilidad y finanzas. Busco seguir aprendiendo y algún día convertirme en mentora para ayudar a otros estudiantes como yo.
                </p>
            </div>

            <!-- Materias de Interés -->
            <div class="section">
                <h2 class="section-title">Materias donde busco apoyo</h2>
                <div class="skills-container">
                    <span class="skill-tag">📊 Contabilidad II</span>
                    <span class="skill-tag">💰 Finanzas Corporativas</span>
                    <span class="skill-tag">📈 Estadística Empresarial</span>
                    <span class="skill-tag">💼 Costos y Presupuestos</span>
                    <span class="skill-tag">🧮 Matemáticas Financieras</span>
                    <span class="skill-tag">📉 Microeconomía</span>
                </div>
            </div>

            <!-- Logros Plan Padrino -->
            <div class="section">
                <h2 class="section-title">Mis Logros en el Plan Padrino</h2>
                <div class="achievements-section">
                    <div class="achievements-grid">
                        <div class="achievement-item">
                            <div class="achievement-icon">🏆</div>
                            <div class="achievement-title">Primera Tutoría</div>
                            <div class="achievement-description">Completaste tu primera sesión</div>
                        </div>
                        <div class="achievement-item">
                            <div class="achievement-icon">📚</div>
                            <div class="achievement-title">Estudiante Activo</div>
                            <div class="achievement-description">8 tutorías completadas</div>
                        </div>
                        <div class="achievement-item">
                            <div class="achievement-icon">⭐</div>
                            <div class="achievement-title">Evaluaciones 5★</div>
                            <div class="achievement-description">100% satisfacción</div>
                        </div>
                        <div class="achievement-item">
                            <div class="achievement-icon">📈</div>
                            <div class="achievement-title">Progreso Notable</div>
                            <div class="achievement-description">Promedio mejoró 0.5</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tutorías Programadas -->
        <div class="profile-card">
            <div class="section">
                <h2 class="section-title">Mis Tutorías del Plan Padrino</h2>
                <div class="tutorias-grid">
                    <div class="tutoria-card">
                        <div class="tutoria-header">
                            <span class="tutoria-date">📅 25 Oct, 2025</span>
                            <span class="tutoria-status status-proximo">Próxima</span>
                        </div>
                        <h3 class="tutoria-title">Contabilidad II - Estados Financieros</h3>
                        <div class="tutoria-mentor">
                            <div class="mentor-avatar">LG</div>
                            <span>con Laura García - Mentora (9° Semestre)</span>
                        </div>
                        <div class="tutoria-time">⏰ 3:00 PM - 4:30 PM</div>
                        <span class="tutoria-modality">💻 Virtual - Google Meet</span>
                    </div>

                    <div class="tutoria-card">
                        <div class="tutoria-header">
                            <span class="tutoria-date">📅 28 Oct, 2025</span>
                            <span class="tutoria-status status-proximo">Próxima</span>
                        </div>
                        <h3 class="tutoria-title">Estadística - Distribuciones de Probabilidad</h3>
                        <div class="tutoria-mentor">
                            <div class="mentor-avatar">JS</div>
                            <span>con Prof. Juan Sánchez - Profesor UNAB</span>
                        </div>
                        <div class="tutoria-time">⏰ 10:00 AM - 11:00 AM</div>
                        <span class="tutoria-modality">🏛️ Presencial - Aula C-204</span>
                    </div>

                    <div class="tutoria-card">
                        <div class="tutoria-header">
                            <span class="tutoria-date">📅 18 Oct, 2025</span>
                            <span class="tutoria-status status-completado">Completada</span>
                        </div>
                        <h3 class="tutoria-title">Finanzas - Valor Presente Neto</h3>
                        <div class="tutoria-mentor">
                            <div class="mentor-avatar">CM</div>
                            <span>con Carlos Méndez - Mentor (8° Semestre)</span>
                        </div>
                        <div class="tutoria-time">⏰ 2:00 PM - 3:00 PM</div>
                        <span class="tutoria-modality">💻 Virtual - Google Meet</span>
                    </div>

                    <div class="tutoria-card">
                        <div class="tutoria-header">
                            <span class="tutoria-date">📅 12 Oct, 2025</span>
                            <span class="tutoria-status status-completado">Completada</span>
                        </div>
                        <h3 class="tutoria-title">Costos - Costeo por Órdenes</h3>
                        <div class="tutoria-mentor">
                            <div class="mentor-avatar">AM</div>
                            <span>con Ana Martínez - Mentora (7° Semestre)</span>
                        </div>
                        <div class="tutoria-time">⏰ 4:00 PM - 5:00 PM</div>
                        <span class="tutoria-modality">🏛️ Presencial - Biblioteca</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Función para editar perfil
        document.querySelector('.btn-edit-profile').addEventListener('click', function() {
            alert('Función de editar perfil - Aquí se abriría un modal o redirigiría a la página de edición');
        });

        // Función para cambiar foto
        document.querySelector('.change-photo-btn').addEventListener('click', function() {
            alert('Función de cambiar foto - Aquí se abriría un selector de archivos');
        });

        // Función para las tarjetas de tutoría
        document.querySelectorAll('.tutoria-card').forEach(card => {
            card.addEventListener('click', function() {
                const status = this.querySelector('.tutoria-status').textContent;
                if (status === 'Próxima') {
                    alert('Ver detalles de la tutoría programada - Aquí se mostraría información adicional, link de Meet, etc.');
                } else {
                    alert('Ver resumen de tutoría completada - Calificación, notas, materiales compartidos, etc.');
                }
            });
        });

        // Botón de notificaciones
        document.querySelector('.btn-notifications').addEventListener('click', function() {
            alert('Panel de notificaciones del Plan Padrino - Recordatorios de tutorías, nuevas solicitudes, etc.');
        });

        // Botón de cerrar sesión
        document.querySelector('.btn-logout').addEventListener('click', function() {
            if(confirm('¿Estás seguro que deseas cerrar sesión?')) {
                alert('Cerrando sesión del Plan Padrino UNAB...');
                // Aquí iría la lógica real de logout
            }
        });
    </script>
</body>
</html>
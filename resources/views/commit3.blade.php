<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillLink - Mi Perfil</title>
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
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }

        .btn-logout:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
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
            border: 5px solid #667eea;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        }

        .change-photo-btn {
            position: absolute;
            bottom: 10px;
            right: 10px;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea, #764ba2);
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
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 15px;
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
            color: #667eea;
        }

        .stat-label {
            font-size: 14px;
            color: #6b7280;
            margin-top: 5px;
        }

        .btn-edit-profile {
            padding: 12px 30px;
            background: linear-gradient(135deg, #667eea, #764ba2);
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
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
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
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 2px;
        }

        .biography {
            color: #4b5563;
            line-height: 1.8;
            font-size: 16px;
        }

        /* Habilidades */
        .skills-container {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .skill-tag {
            padding: 10px 20px;
            background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
            border: 2px solid #667eea;
            border-radius: 25px;
            color: #374151;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s;
            cursor: default;
        }

        .skill-tag:hover {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            transform: translateY(-2px);
        }

        /* Mentorías Programadas */
        .mentorias-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .mentoria-card {
            background: linear-gradient(135deg, #f9fafb, #ffffff);
            border: 2px solid #e5e7eb;
            border-radius: 15px;
            padding: 20px;
            transition: all 0.3s;
            cursor: pointer;
        }

        .mentoria-card:hover {
            border-color: #667eea;
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.2);
        }

        .mentoria-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .mentoria-date {
            background: #667eea;
            color: white;
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
        }

        .mentoria-status {
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

        .mentoria-title {
            font-size: 18px;
            font-weight: bold;
            color: #1f2937;
            margin-bottom: 10px;
        }

        .mentoria-mentor {
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
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 12px;
        }

        .mentoria-time {
            color: #9ca3af;
            font-size: 14px;
        }

        /* Sección de Experiencia */
        .experience-item {
            padding: 20px;
            background: #f9fafb;
            border-radius: 12px;
            margin-bottom: 15px;
            border-left: 4px solid #667eea;
        }

        .experience-title {
            font-size: 18px;
            font-weight: bold;
            color: #1f2937;
            margin-bottom: 5px;
        }

        .experience-company {
            color: #667eea;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .experience-period {
            color: #9ca3af;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .experience-description {
            color: #4b5563;
            line-height: 1.6;
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

            .mentorias-grid {
                grid-template-columns: 1fr;
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
        <div class="header-actions">
            <button class="btn-header btn-notifications">🔔 Notificaciones</button>
            <button class="btn-header btn-logout">Cerrar Sesión</button>
        </div>
    </div>

    <div class="container">
        <!-- Card Principal del Perfil -->
        <div class="profile-card">
            <div class="profile-header">
                <div class="profile-photo-section">
                    <img src="https://ui-avatars.com/api/?name=Maria+Rodriguez&size=180&background=667eea&color=fff&bold=true" alt="Foto de perfil" class="profile-photo">
                    <button class="change-photo-btn" title="Cambiar foto">📷</button>
                </div>
                <div class="profile-info">
                    <h1 class="profile-name">María Rodríguez</h1>
                    <span class="profile-role">🚀 Emprendedora Digital</span>
                    <div class="profile-stats">
                        <div class="stat-item">
                            <div class="stat-number">12</div>
                            <div class="stat-label">Mentorías</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">8</div>
                            <div class="stat-label">Completadas</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">4.9</div>
                            <div class="stat-label">Rating</div>
                        </div>
                    </div>
                    <button class="btn-edit-profile">✏️ Editar Perfil</button>
                </div>
            </div>

            <!-- Biografía -->
            <div class="section">
                <h2 class="section-title">Sobre mí</h2>
                <p class="biography">
                    Emprendedora digital apasionada por la tecnología y la innovación. Con más de 5 años de experiencia en el desarrollo de startups tecnológicas, he fundado y co-fundado 3 empresas exitosas en el sector fintech. Mi objetivo es ayudar a otros emprendedores a materializar sus ideas y convertirlas en negocios sostenibles. Especializada en estrategias de crecimiento, desarrollo de productos digitales y captación de inversión.
                </p>
            </div>

            <!-- Habilidades -->
            <div class="section">
                <h2 class="section-title">Habilidades</h2>
                <div class="skills-container">
                    <span class="skill-tag">💼 Emprendimiento</span>
                    <span class="skill-tag">📊 Estrategia de Negocios</span>
                    <span class="skill-tag">💰 Finanzas Corporativas</span>
                    <span class="skill-tag">🚀 Growth Hacking</span>
                    <span class="skill-tag">📱 Marketing Digital</span>
                    <span class="skill-tag">🎯 Product Management</span>
                    <span class="skill-tag">💡 Innovación</span>
                    <span class="skill-tag">🤝 Pitch a Inversionistas</span>
                </div>
            </div>

            <!-- Experiencia -->
            <div class="section">
                <h2 class="section-title">Experiencia</h2>
                <div class="experience-item">
                    <div class="experience-title">CEO & Fundadora</div>
                    <div class="experience-company">TechVentures Inc.</div>
                    <div class="experience-period">2021 - Presente</div>
                    <div class="experience-description">
                        Liderazgo de startup fintech especializada en soluciones de pago digital. Logré escalar el negocio a más de 50,000 usuarios activos y conseguir ronda de inversión Serie A de $2M.
                    </div>
                </div>
                <div class="experience-item">
                    <div class="experience-title">Co-fundadora & COO</div>
                    <div class="experience-company">StartHub Aceleradora</div>
                    <div class="experience-period">2019 - 2021</div>
                    <div class="experience-description">
                        Gestión operativa de aceleradora de startups. Mentoría a más de 50 emprendimientos tecnológicos y coordinación de programas de inversión.
                    </div>
                </div>
            </div>
        </div>

        <!-- Mentorías Programadas -->
        <div class="profile-card">
            <div class="section">
                <h2 class="section-title">Mis Mentorías Programadas</h2>
                <div class="mentorias-grid">
                    <div class="mentoria-card">
                        <div class="mentoria-header">
                            <span class="mentoria-date">📅 25 Oct, 2025</span>
                            <span class="mentoria-status status-proximo">Próximo</span>
                        </div>
                        <h3 class="mentoria-title">Estrategias de Financiamiento</h3>
                        <div class="mentoria-mentor">
                            <div class="mentor-avatar">JG</div>
                            <span>con Juan García - Mentor</span>
                        </div>
                        <div class="mentoria-time">⏰ 10:00 AM - 11:00 AM</div>
                    </div>

                    <div class="mentoria-card">
                        <div class="mentoria-header">
                            <span class="mentoria-date">📅 28 Oct, 2025</span>
                            <span class="mentoria-status status-proximo">Próximo</span>
                        </div>
                        <h3 class="mentoria-title">Growth Hacking Avanzado</h3>
                        <div class="mentoria-mentor">
                            <div class="mentor-avatar">AM</div>
                            <span>con Ana Martínez - Mentora</span>
                        </div>
                        <div class="mentoria-time">⏰ 3:00 PM - 4:30 PM</div>
                    </div>

                    <div class="mentoria-card">
                        <div class="mentoria-header">
                            <span class="mentoria-date">📅 15 Oct, 2025</span>
                            <span class="mentoria-status status-completado">Completado</span>
                        </div>
                        <h3 class="mentoria-title">Pitch Deck Efectivo</h3>
                        <div class="mentoria-mentor">
                            <div class="mentor-avatar">CM</div>
                            <span>con Carlos Mendoza - Mentor</span>
                        </div>
                        <div class="mentoria-time">⏰ 2:00 PM - 3:00 PM</div>
                    </div>

                    <div class="mentoria-card">
                        <div class="mentoria-header">
                            <span class="mentoria-date">📅 10 Oct, 2025</span>
                            <span class="mentoria-status status-completado">Completado</span>
                        </div>
                        <h3 class="mentoria-title">Validación de Mercado</h3>
                        <div class="mentoria-mentor">
                            <div class="mentor-avatar">LS</div>
                            <span>con Laura Sánchez - Mentora</span>
                        </div>
                        <div class="mentoria-time">⏰ 11:00 AM - 12:00 PM</div>
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

        // Función para las tarjetas de mentoría
        document.querySelectorAll('.mentoria-card').forEach(card => {
            card.addEventListener('click', function() {
                alert('Ver detalles de la mentoría - Aquí se mostraría más información');
            });
        });

        // Botón de notificaciones
        document.querySelector('.btn-notifications').addEventListener('click', function() {
            alert('Panel de notificaciones - Aquí se mostrarían las notificaciones recientes');
        });

        // Botón de cerrar sesión
        document.querySelector('.btn-logout').addEventListener('click', function() {
            if(confirm('¿Estás seguro que deseas cerrar sesión?')) {
                alert('Cerrando sesión...');
                // Aquí iría la lógica real de logout
            }
        });
    </script>
</body>
</html>
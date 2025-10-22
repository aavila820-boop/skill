<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillLink UNAB - Buscar Mentores Plan Padrino</title>
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
            display: block;
            margin-top: -5px;
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
            color: #0051a5;
            background: #f3f4f6;
        }

        .nav-link.active {
            color: #0051a5;
            background: #e3f2fd;
        }

        /* Container Principal */
        .container {
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Banner Plan Padrino */
        .plan-padrino-banner {
            background: linear-gradient(135deg, #0051a5, #0066cc);
            color: white;
            padding: 25px;
            border-radius: 20px;
            margin-bottom: 25px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        }

        .banner-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .banner-text h2 {
            font-size: 26px;
            margin-bottom: 8px;
        }

        .banner-text p {
            font-size: 15px;
            opacity: 0.95;
        }

        .banner-stats {
            display: flex;
            gap: 30px;
        }

        .stat-box {
            text-align: center;
            background: rgba(255, 255, 255, 0.15);
            padding: 15px 20px;
            border-radius: 12px;
        }

        .stat-number {
            font-size: 28px;
            font-weight: bold;
        }

        .stat-text {
            font-size: 12px;
            opacity: 0.9;
        }

        /* Sección de Búsqueda y Filtros */
        .search-section {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .search-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .search-title {
            font-size: 28px;
            font-weight: bold;
            color: #1f2937;
        }

        .results-count {
            color: #6b7280;
            font-size: 16px;
        }

        /* Barra de Búsqueda */
        .search-bar-container {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
        }

        .search-input-wrapper {
            flex: 1;
            position: relative;
        }

        .search-input {
            width: 100%;
            padding: 15px 50px 15px 20px;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s;
        }

        .search-input:focus {
            outline: none;
            border-color: #0051a5;
            box-shadow: 0 0 0 4px rgba(0, 81, 165, 0.1);
        }

        .search-icon {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
            color: #9ca3af;
        }

        .btn-search {
            padding: 15px 35px;
            background: linear-gradient(135deg, #0051a5, #003d7a);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            white-space: nowrap;
        }

        .btn-search:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 81, 165, 0.4);
        }

        /* Filtros */
        .filters-container {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .filter-group {
            flex: 1;
            min-width: 200px;
        }

        .filter-label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
        }

        .filter-select {
            width: 100%;
            padding: 12px;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s;
            background: white;
        }

        .filter-select:focus {
            outline: none;
            border-color: #0051a5;
        }

        .filter-tags {
            display: flex;
            gap: 10px;
            margin-top: 15px;
            flex-wrap: wrap;
        }

        .filter-tag {
            padding: 8px 16px;
            background: #e3f2fd;
            color: #0051a5;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .filter-tag:hover {
            background: #0051a5;
            color: white;
        }

        .filter-tag .remove {
            font-size: 16px;
        }

        .btn-clear-filters {
            padding: 8px 16px;
            background: transparent;
            color: #ef4444;
            border: 2px solid #ef4444;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-clear-filters:hover {
            background: #ef4444;
            color: white;
        }

        /* Grid de Mentores */
        .mentors-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 25px;
        }

        .mentor-card {
            background: white;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s;
            cursor: pointer;
            border: 2px solid transparent;
        }

        .mentor-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(0, 81, 165, 0.3);
            border-color: #0051a5;
        }

        .mentor-header {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .mentor-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #0051a5;
        }

        .mentor-info {
            flex: 1;
        }

        .mentor-name {
            font-size: 20px;
            font-weight: bold;
            color: #1f2937;
            margin-bottom: 5px;
        }

        .mentor-title {
            color: #0051a5;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .mentor-type-badge {
            display: inline-block;
            padding: 4px 10px;
            background: #fef3c7;
            color: #92400e;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .mentor-type-badge.profesor {
            background: #dbeafe;
            color: #1e40af;
        }

        .mentor-rating {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
        }

        .stars {
            color: #fbbf24;
        }

        .rating-number {
            font-weight: bold;
            color: #374151;
        }

        .reviews-count {
            color: #9ca3af;
        }

        .mentor-bio {
            color: #4b5563;
            line-height: 1.6;
            margin-bottom: 15px;
            font-size: 14px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .mentor-subjects {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 15px;
        }

        .subject-badge {
            padding: 6px 12px;
            background: #f3f4f6;
            border-radius: 15px;
            font-size: 12px;
            color: #374151;
            font-weight: 600;
        }

        .mentor-stats {
            display: flex;
            justify-content: space-around;
            padding: 15px 0;
            border-top: 1px solid #e5e7eb;
            border-bottom: 1px solid #e5e7eb;
            margin-bottom: 15px;
        }

        .stat-item {
            text-align: center;
        }

        .stat-value {
            font-size: 18px;
            font-weight: bold;
            color: #0051a5;
        }

        .stat-label {
            font-size: 12px;
            color: #9ca3af;
            margin-top: 3px;
        }

        .mentor-availability {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
            padding: 12px;
            background: #f9fafb;
            border-radius: 10px;
        }

        .availability-label {
            color: #6b7280;
            font-size: 13px;
            font-weight: 600;
        }

        .free-badge {
            padding: 6px 14px;
            background: #d1fae5;
            color: #065f46;
            border-radius: 15px;
            font-size: 12px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .mentor-actions {
            display: flex;
            gap: 10px;
        }

        .btn-schedule {
            flex: 1;
            padding: 12px;
            background: linear-gradient(135deg, #0051a5, #003d7a);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-schedule:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0, 81, 165, 0.4);
        }

        .btn-profile {
            padding: 12px 20px;
            background: #f3f4f6;
            color: #374151;
            border: none;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-profile:hover {
            background: #e5e7eb;
        }

        .availability-status {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 4px 10px;
            background: #d1fae5;
            color: #065f46;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
        }

        .availability-dot {
            width: 6px;
            height: 6px;
            background: #10b981;
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.5;
            }
        }

        /* Sin resultados */
        .no-results {
            text-align: center;
            padding: 60px 20px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        .no-results-icon {
            font-size: 80px;
            margin-bottom: 20px;
        }

        .no-results-title {
            font-size: 24px;
            font-weight: bold;
            color: #1f2937;
            margin-bottom: 10px;
        }

        .no-results-text {
            color: #6b7280;
            font-size: 16px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                gap: 15px;
            }

            .header-nav {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
            }

            .banner-content {
                flex-direction: column;
                text-align: center;
            }

            .banner-stats {
                justify-content: center;
            }

            .search-bar-container {
                flex-direction: column;
            }

            .filters-container {
                flex-direction: column;
            }

            .filter-group {
                min-width: 100%;
            }

            .mentors-grid {
                grid-template-columns: 1fr;
            }

            .mentor-actions {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="logo-container">
            <img src="./images/uwu2.jpeg" alt="SkillLink UNAB Logo" class="logo">
            <div>
                <div class="logo-text">SkillLink UNAB</div>
                <span class="unab-badge">Plan Padrino Digital</span>
            </div>
        </div>
        <nav class="header-nav">
            <a href="#" class="nav-link">Inicio</a>
            <a href="#" class="nav-link active">Buscar Mentores</a>
            <a href="#" class="nav-link">Mis Tutorías</a>
            <a href="#" class="nav-link">Mi Perfil</a>
        </nav>
    </div>

    <div class="container">
        <!-- Banner Plan Padrino -->
        <div class="plan-padrino-banner">
            <div class="banner-content">
                <div class="banner-text">
                    <h2>🤝 Plan Padrino UNAB</h2>
                    <p>Acompañamiento académico solidario entre estudiantes y profesores</p>
                </div>
                <div class="banner-stats">
                    <div class="stat-box">
                        <div class="stat-number">52</div>
                        <div class="stat-text">Mentores activos</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-number">340+</div>
                        <div class="stat-text">Tutorías realizadas</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-number">100%</div>
                        <div class="stat-text">Gratuito</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sección de Búsqueda y Filtros -->
        <div class="search-section">
            <div class="search-header">
                <h1 class="search-title">🔍 Encuentra tu Mentor UNAB</h1>
                <span class="results-count">52 mentores disponibles</span>
            </div>

            <!-- Barra de Búsqueda -->
            <div class="search-bar-container">
                <div class="search-input-wrapper">
                    <input type="text" class="search-input" placeholder="Busca por nombre, materia o facultad..." id="searchInput">
                    <span class="search-icon">🔍</span>
                </div>
                <button class="btn-search">Buscar</button>
            </div>

            <!-- Filtros -->
            <div class="filters-container">
                <div class="filter-group">
                    <label class="filter-label">Facultad</label>
                    <select class="filter-select" id="facultyFilter">
                        <option value="">Todas las facultades</option>
                        <option value="ingenieria">Ingeniería</option>
                        <option value="administracion">Administración</option>
                        <option value="derecho">Derecho</option>
                        <option value="ciencias-salud">Ciencias de la Salud</option>
                        <option value="comunicacion">Comunicación</option>
                        <option value="educacion">Educación</option>
                    </select>
                </div>

                <div class="filter-group">
                    <label class="filter-label">Tipo de Mentor</label>
                    <select class="filter-select" id="mentorTypeFilter">
                        <option value="">Todos</option>
                        <option value="estudiante">Estudiante Avanzado</option>
                        <option value="profesor">Profesor</option>
                    </select>
                </div>

                <div class="filter-group">
                    <label class="filter-label">Materia</label>
                    <select class="filter-select" id="subjectFilter">
                        <option value="">Todas las materias</option>
                        <option value="calculo">Cálculo</option>
                        <option value="fisica">Física</option>
                        <option value="programacion">Programación</option>
                        <option value="quimica">Química</option>
                        <option value="estadistica">Estadística</option>
                        <option value="ingles">Inglés</option>
                        <option value="contabilidad">Contabilidad</option>
                    </select>
                </div>

                <div class="filter-group">
                    <label class="filter-label">Modalidad</label>
                    <select class="filter-select" id="modalityFilter">
                        <option value="">Todas</option>
                        <option value="presencial">Presencial (Campus)</option>
                        <option value="virtual">Virtual</option>
                        <option value="hibrido">Híbrido</option>
                    </select>
                </div>
            </div>

            <!-- Filtros Activos -->
            <div class="filter-tags" id="activeTags">
                <!-- Los tags se agregarán dinámicamente aquí -->
            </div>
        </div>

        <!-- Grid de Mentores -->
        <div class="mentors-grid" id="mentorsGrid">
            <!-- Mentor 1 - Estudiante -->
            <div class="mentor-card">
                <div class="mentor-header">
                    <img src="https://ui-avatars.com/api/?name=Carlos+Mendoza&size=80&background=0051a5&color=fff&bold=true" alt="Carlos Mendoza" class="mentor-avatar">
                    <div class="mentor-info">
                        <span class="mentor-type-badge">Estudiante - 8° Semestre</span>
                        <h3 class="mentor-name">Carlos Mendoza</h3>
                        <p class="mentor-title">📚 Ingeniería de Sistemas</p>
                        <div class="mentor-rating">
                            <span class="stars">⭐⭐⭐⭐⭐</span>
                            <span class="rating-number">5.0</span>
                            <span class="reviews-count">(24 tutorías)</span>
                        </div>
                    </div>
                </div>
                <p class="mentor-bio">
                    Estudiante destacado de Ingeniería de Sistemas con promedio de 4.5. Me apasiona compartir conocimiento y ayudar a mis compañeros de primeros semestres a superar las materias difíciles.
                </p>
                <div class="mentor-subjects">
                    <span class="subject-badge">Programación I-II</span>
                    <span class="subject-badge">Estructuras de Datos</span>
                    <span class="subject-badge">Algoritmos</span>
                </div>
                <div class="mentor-stats">
                    <div class="stat-item">
                        <div class="stat-value">24</div>
                        <div class="stat-label">Tutorías</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">8°</div>
                        <div class="stat-label">Semestre</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">4.5</div>
                        <div class="stat-label">Promedio</div>
                    </div>
                </div>
                <div class="mentor-availability">
                    <span class="availability-label">📍 Modalidad:</span>
                    <span>Presencial y Virtual</span>
                </div>
                <div class="mentor-availability">
                    <span class="availability-label">⏰ Disponibilidad:</span>
                    <span class="availability-status">
                        <span class="availability-dot"></span>
                        Disponible esta semana
                    </span>
                </div>
                <div class="mentor-availability">
                    <span class="availability-label">💰 Costo:</span>
                    <span class="free-badge">✨ GRATIS</span>
                </div>
                <div class="mentor-actions">
                    <button class="btn-schedule">📅 Solicitar Tutoría</button>
                    <button class="btn-profile">Ver Perfil</button>
                </div>
            </div>

            <!-- Mentor 2 - Profesora -->
            <div class="mentor-card">
                <div class="mentor-header">
                    <img src="https://ui-avatars.com/api/?name=Maria+Rodriguez&size=80&background=003d7a&color=fff&bold=true" alt="María Rodríguez" class="mentor-avatar">
                    <div class="mentor-info">
                        <span class="mentor-type-badge profesor">Profesora</span>
                        <h3 class="mentor-name">Dra. María Rodríguez</h3>
                        <p class="mentor-title">🧮 Facultad de Ingeniería</p>
                        <div class="mentor-rating">
                            <span class="stars">⭐⭐⭐⭐⭐</span>
                            <span class="rating-number">4.9</span>
                            <span class="reviews-count">(41 tutorías)</span>
                        </div>
                    </div>
                </div>
                <p class="mentor-bio">
                    Profesora de la UNAB con 12 años de experiencia. Disfruto apoyar a los estudiantes en su proceso de aprendizaje y superar las dificultades en matemáticas y cálculo.
                </p>
                <div class="mentor-subjects">
                    <span class="subject-badge">Cálculo I-II-III</span>
                    <span class="subject-badge">Álgebra Lineal</span>
                    <span class="subject-badge">Ecuaciones Diferenciales</span>
                </div>
                <div class="mentor-stats">
                    <div class="stat-item">
                        <div class="stat-value">41</div>
                        <div class="stat-label">Tutorías</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">12</div>
                        <div class="stat-label">Años UNAB</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">100%</div>
                        <div class="stat-label">Satisfacción</div>
                    </div>
                </div>
                <div class="mentor-availability">
                    <span class="availability-label">📍 Modalidad:</span>
                    <span>Presencial (Oficina B-302)</span>
                </div>
                <div class="mentor-availability">
                    <span class="availability-label">⏰ Disponibilidad:</span>
                    <span class="availability-status">
                        <span class="availability-dot"></span>
                        Lunes y Miércoles 2-4pm
                    </span>
                </div>
                <div class="mentor-availability">
                    <span class="availability-label">💰 Costo:</span>
                    <span class="free-badge">✨ GRATIS</span>
                </div>
                <div class="mentor-actions">
                    <button class="btn-schedule">📅 Solicitar Tutoría</button>
                    <button class="btn-profile">Ver Perfil</button>
                </div>
            </div>

            <!-- Mentor 3 - Estudiante -->
            <div class="mentor-card">
                <div class="mentor-header">
                    <img src="https://ui-avatars.com/api/?name=Laura+Garcia&size=80&background=10b981&color=fff&bold=true" alt="Laura García" class="mentor-avatar">
                    <div class="mentor-info">
                        <span class="mentor-type-badge">Estudiante - 9° Semestre</span>
                        <h3 class="mentor-name">Laura García</h3>
                        <p class="mentor-title">💼 Administración de Empresas</p>
                        <div class="mentor-rating">
                            <span class="stars">⭐⭐⭐⭐⭐</span>
                            <span class="rating-number">4.8</span>
                            <span class="reviews-count">(18 tutorías)</span>
                        </div>
                    </div>
                </div>
                <p class="mentor-bio">
                    Estudiante de Administración apasionada por los números y la gestión financiera. He ayudado a muchos compañeros a entender contabilidad y finanzas de forma práctica.
                </p>
                <div class="mentor-subjects">
                    <span class="subject-badge">Contabilidad I-II</span>
                    <span class="subject-badge">Costos</span>
                    <span class="subject-badge">Finanzas</span>
                </div>
                <div class="mentor-stats">
                    <div class="stat-item">
                        <div class="stat-value">18</div>
                        <div class="stat-label">Tutorías</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">9°</div>
                        <div class="stat-label">Semestre</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">4.6</div>
                        <div class="stat-label">Promedio</div>
                    </div>
                </div>
                <div class="mentor-availability">
                    <span class="availability-label">📍 Modalidad:</span>
                    <span>Virtual (Google Meet)</span>
                </div>
                <div class="mentor-availability">
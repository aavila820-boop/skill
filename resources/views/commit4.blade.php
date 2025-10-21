<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillLink - Buscar Mentores</title>
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

        /* Container Principal */
        .container {
            max-width: 1400px;
            margin: 0 auto;
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
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
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
            background: linear-gradient(135deg, #667eea, #764ba2);
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
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
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
            border-color: #667eea;
        }

        .filter-tags {
            display: flex;
            gap: 10px;
            margin-top: 15px;
            flex-wrap: wrap;
        }

        .filter-tag {
            padding: 8px 16px;
            background: #ede9fe;
            color: #667eea;
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
            background: #667eea;
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
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.3);
            border-color: #667eea;
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
            border: 3px solid #667eea;
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
            color: #667eea;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 8px;
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

        .mentor-skills {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 15px;
        }

        .skill-badge {
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
            color: #667eea;
        }

        .stat-label {
            font-size: 12px;
            color: #9ca3af;
            margin-top: 3px;
        }

        .mentor-price {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .price-label {
            color: #6b7280;
            font-size: 14px;
        }

        .price-value {
            font-size: 24px;
            font-weight: bold;
            color: #1f2937;
        }

        .price-period {
            font-size: 14px;
            color: #9ca3af;
        }

        .mentor-actions {
            display: flex;
            gap: 10px;
        }

        .btn-schedule {
            flex: 1;
            padding: 12px;
            background: linear-gradient(135deg, #667eea, #764ba2);
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
            box-shadow: 0 6px 15px rgba(102, 126, 234, 0.4);
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

        .availability-badge {
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
            <img src="./images/uwu2.jpeg" alt="SkillLink Logo" class="logo">
            <div class="logo-text">SkillLink</div>
        </div>
        <nav class="header-nav">
            <a href="#" class="nav-link">Inicio</a>
            <a href="#" class="nav-link active">Buscar Mentores</a>
            <a href="#" class="nav-link">Mis Mentorías</a>
            <a href="#" class="nav-link">Mi Perfil</a>
        </nav>
    </div>

    <div class="container">
        <!-- Sección de Búsqueda y Filtros -->
        <div class="search-section">
            <div class="search-header">
                <h1 class="search-title">🔍 Encuentra tu Mentor Ideal</h1>
                <span class="results-count">148 mentores disponibles</span>
            </div>

            <!-- Barra de Búsqueda -->
            <div class="search-bar-container">
                <div class="search-input-wrapper">
                    <input type="text" class="search-input" placeholder="Busca por nombre, habilidad o especialidad..." id="searchInput">
                    <span class="search-icon">🔍</span>
                </div>
                <button class="btn-search">Buscar</button>
            </div>

            <!-- Filtros -->
            <div class="filters-container">
                <div class="filter-group">
                    <label class="filter-label">Categoría</label>
                    <select class="filter-select" id="categoryFilter">
                        <option value="">Todas las categorías</option>
                        <option value="tech">Tecnología</option>
                        <option value="business">Negocios</option>
                        <option value="marketing">Marketing</option>
                        <option value="design">Diseño</option>
                        <option value="finance">Finanzas</option>
                    </select>
                </div>

                <div class="filter-group">
                    <label class="filter-label">Experiencia</label>
                    <select class="filter-select" id="experienceFilter">
                        <option value="">Cualquier nivel</option>
                        <option value="junior">Junior (1-3 años)</option>
                        <option value="mid">Mid (3-5 años)</option>
                        <option value="senior">Senior (5-10 años)</option>
                        <option value="expert">Expert (10+ años)</option>
                    </select>
                </div>

                <div class="filter-group">
                    <label class="filter-label">Precio por hora</label>
                    <select class="filter-select" id="priceFilter">
                        <option value="">Cualquier precio</option>
                        <option value="0-50">$0 - $50</option>
                        <option value="50-100">$50 - $100</option>
                        <option value="100-200">$100 - $200</option>
                        <option value="200+">$200+</option>
                    </select>
                </div>

                <div class="filter-group">
                    <label class="filter-label">Idioma</label>
                    <select class="filter-select" id="languageFilter">
                        <option value="">Todos los idiomas</option>
                        <option value="es">Español</option>
                        <option value="en">Inglés</option>
                        <option value="pt">Portugués</option>
                        <option value="fr">Francés</option>
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
            <!-- Mentor 1 -->
            <div class="mentor-card">
                <div class="mentor-header">
                    <img src="https://ui-avatars.com/api/?name=Juan+Garcia&size=80&background=667eea&color=fff&bold=true" alt="Juan García" class="mentor-avatar">
                    <div class="mentor-info">
                        <h3 class="mentor-name">Juan García</h3>
                        <p class="mentor-title">💼 CEO & Growth Expert</p>
                        <div class="mentor-rating">
                            <span class="stars">⭐⭐⭐⭐⭐</span>
                            <span class="rating-number">4.9</span>
                            <span class="reviews-count">(127 reseñas)</span>
                        </div>
                    </div>
                </div>
                <p class="mentor-bio">
                    Emprendedor serial con más de 15 años de experiencia. He fundado y escalado 4 startups exitosas. Especializado en estrategias de crecimiento y captación de inversión.
                </p>
                <div class="mentor-skills">
                    <span class="skill-badge">Growth Hacking</span>
                    <span class="skill-badge">Fundraising</span>
                    <span class="skill-badge">Estrategia</span>
                </div>
                <div class="mentor-stats">
                    <div class="stat-item">
                        <div class="stat-value">250+</div>
                        <div class="stat-label">Sesiones</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">15</div>
                        <div class="stat-label">Años exp.</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">98%</div>
                        <div class="stat-label">Satisfacción</div>
                    </div>
                </div>
                <div class="mentor-price">
                    <span class="price-label">Desde:</span>
                    <div>
                        <span class="price-value">$120</span>
                        <span class="price-period">/hora</span>
                    </div>
                </div>
                <span class="availability-badge">
                    <span class="availability-dot"></span>
                    Disponible hoy
                </span>
                <div class="mentor-actions">
                    <button class="btn-schedule">📅 Agendar Sesión</button>
                    <button class="btn-profile">Ver Perfil</button>
                </div>
            </div>

            <!-- Mentor 2 -->
            <div class="mentor-card">
                <div class="mentor-header">
                    <img src="https://ui-avatars.com/api/?name=Ana+Martinez&size=80&background=764ba2&color=fff&bold=true" alt="Ana Martínez" class="mentor-avatar">
                    <div class="mentor-info">
                        <h3 class="mentor-name">Ana Martínez</h3>
                        <p class="mentor-title">🎨 UX/UI Design Lead</p>
                        <div class="mentor-rating">
                            <span class="stars">⭐⭐⭐⭐⭐</span>
                            <span class="rating-number">5.0</span>
                            <span class="reviews-count">(89 reseñas)</span>
                        </div>
                    </div>
                </div>
                <p class="mentor-bio">
                    Diseñadora con 10 años de experiencia en productos digitales. Ex-líder de diseño en Google y Airbnb. Apasionada por crear experiencias que impacten positivamente a millones.
                </p>
                <div class="mentor-skills">
                    <span class="skill-badge">UX Design</span>
                    <span class="skill-badge">Product Design</span>
                    <span class="skill-badge">Research</span>
                </div>
                <div class="mentor-stats">
                    <div class="stat-item">
                        <div class="stat-value">180+</div>
                        <div class="stat-label">Sesiones</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">10</div>
                        <div class="stat-label">Años exp.</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">100%</div>
                        <div class="stat-label">Satisfacción</div>
                    </div>
                </div>
                <div class="mentor-price">
                    <span class="price-label">Desde:</span>
                    <div>
                        <span class="price-value">$95</span>
                        <span class="price-period">/hora</span>
                    </div>
                </div>
                <span class="availability-badge">
                    <span class="availability-dot"></span>
                    Disponible mañana
                </span>
                <div class="mentor-actions">
                    <button class="btn-schedule">📅 Agendar Sesión</button>
                    <button class="btn-profile">Ver Perfil</button>
                </div>
            </div>

            <!-- Mentor 3 -->
            <div class="mentor-card">
                <div class="mentor-header">
                    <img src="https://ui-avatars.com/api/?name=Carlos+Lopez&size=80&background=10b981&color=fff&bold=true" alt="Carlos López" class="mentor-avatar">
                    <div class="mentor-info">
                        <h3 class="mentor-name">Carlos López</h3>
                        <p class="mentor-title">💻 Senior Software Architect</p>
                        <div class="mentor-rating">
                            <span class="stars">⭐⭐⭐⭐⭐</span>
                            <span class="rating-number">4.8</span>
                            <span class="reviews-count">(156 reseñas)</span>
                        </div>
                    </div>
                </div>
                <p class="mentor-bio">
                    Arquitecto de software con 12 años construyendo sistemas escalables. Ex-tech lead en Amazon. Mentor de más de 100 desarrolladores que ahora trabajan en FAANG.
                </p>
                <div class="mentor-skills">
                    <span class="skill-badge">System Design</span>
                    <span class="skill-badge">Cloud</span>
                    <span class="skill-badge">Microservices</span>
                </div>
                <div class="mentor-stats">
                    <div class="stat-item">
                        <div class="stat-value">300+</div>
                        <div class="stat-label">Sesiones</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">12</div>
                        <div class="stat-label">Años exp.</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">97%</div>
                        <div class="stat-label">Satisfacción</div>
                    </div>
                </div>
                <div class="mentor-price">
                    <span class="price-label">Desde:</span>
                    <div>
                        <span class="price-value">$150</span>
                        <span class="price-period">/hora</span>
                    </div>
                </div>
                <span class="availability-badge">
                    <span class="availability-dot"></span>
                    Disponible hoy
                </span>
                <div class="mentor-actions">
                    <button class="btn-schedule">📅 Agendar Sesión</button>
                    <button class="btn-profile">Ver Perfil</button>
                </div>
            </div>

            <!-- Mentor 4 -->
            <div class="mentor-card">
                <div class="mentor-header">
                    <img src="https://ui-avatars.com/api/?name=Laura+Sanchez&size=80&background=f59e0b&color=fff&bold=true" alt="Laura Sánchez" class="mentor-avatar">
                    <div class="mentor-info">
                        <h3 class="mentor-name">Laura Sánchez</h3>
                        <p class="mentor-title">📊 Marketing Strategy Director</p>
                        <div class="mentor-rating">
                            <span class="stars">⭐⭐⭐⭐⭐</span>
                            <span class="rating-number">4.9</span>
                            <span class="reviews-count">(94 reseñas)</span>
                        </div>
                    </div>
                </div>
                <p class="mentor-bio">
                    Directora de marketing con 8 años liderando campañas globales. He ayudado a más de 50 startups a escalar sus estrategias digitales y alcanzar millones de usuarios.
                </p>
                <div class="mentor-skills">
                    <span class="skill-badge">Digital Marketing</span>
                    <span class="skill-badge">SEO/SEM</span>
                    <span class="skill-badge">Branding</span>
                </div>
                <div class="mentor-stats">
                    <div class="stat-item">
                        <div class="stat-value">200+</div>
                        <div class="stat-label">Sesiones</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">8</div>
                        <div class="stat-label">Años exp.</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">99%</div>
                        <div class="stat-label">Satisfacción</div>
                    </div>
                </div>
                <div class="mentor-price">
                    <span class="price-label">Desde:</span>
                    <div>
                        <span class="price-value">$85</span>
                        <span class="price-period">/hora</span>
                    </div>
                </div>
                <span class="availability-badge">
                    <span class="availability-dot"></span>
                    Disponible hoy
                </span>
                <div class="mentor-actions">
                    <button class="btn-schedule">📅 Agendar Sesión</button>
                    <button class="btn-profile">Ver Perfil</button>
                </div>
            </div>

            <!-- Mentor 5 -->
            <div class="mentor-card">
                <div class="mentor-header">
                    <img src="https://ui-avatars.com/api/?name=Miguel+Torres&size=80&background=ef4444&color=fff&bold=true" alt="Miguel Torres" class="mentor-avatar">
                    <div class="mentor-info">
                        <h3 class="mentor-name">Miguel Torres</h3>
                        <p class="mentor-title">💰 CFO & Finance Expert</p>
                        <div class="mentor-rating">
                            <span class="stars">⭐⭐⭐⭐⭐</span>
                            <span class="rating-number">5.0</span>
                            <span class="reviews-count">(76 reseñas)</span>
                        </div>
                    </div>
                </div>
                <p class="mentor-bio">
                    CFO con 20 años de experiencia en finanzas corporativas. He liderado procesos de due diligence y fundraising por más de $100M. Especializado en modelado financiero y valoración.
                </p>
                <div class="mentor-skills">
                    <span class="skill-badge">Financial Modeling</span>
                    <span class="skill-badge">Fundraising</span>
                    <span class="skill-badge">M&A</span>
                </div>
                <div class="mentor-stats">
                    <div class="stat-item">
                        <div class="stat-value">150+</div>
                        <div class="stat-label">Sesiones</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">20</div>
                        <div class="stat-label">Años exp.</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">100%</div>
                        <div class="stat-label">Satisfacción</div>
                    </div>
                </div>
                <div class="mentor-price">
                    <span class="price-label">Desde:</span>
                    <div>
                        <span class="price-value">$200</span>
                        <span class="price-period">/hora</span>
                    </div>
                </div>
                <span class="availability-badge">
                    <span class="availability-dot"></span>
                    Disponible esta semana
                </span>
                <div class="mentor-actions">
                    <button class="btn-schedule">📅 Agendar Sesión</button>
                    <button class="btn-profile">Ver Perfil</button>
                </div>
            </div>

            <!-- Mentor 6 -->
            <div class="mentor-card">
                <div class="mentor-header">
                    <img src="https://ui-avatars.com/api/?name=Sofia+Ramirez&size=80&background=8b5cf6&color=fff&bold=true" alt="Sofía Ramírez" class="mentor-avatar">
                    <div class="mentor-info">
                        <h3 class="mentor-name">Sofía Ramírez</h3>
                        <p class="mentor-title">🚀 Product Manager Senior</p>
                        <div class="mentor-rating">
                            <span class="stars">⭐⭐⭐⭐⭐</span>
                            <span class="rating-number">4.9</span>
                            <span class="reviews-count">(112 reseñas)</span>
                        </div>
                    </div>
                </div>
                <p class="mentor-bio">
                    Product Manager con 9 años construyendo productos que aman los usuarios. Ex-PM en Spotify y Meta. He lanzado más de 15 productos exitosos con millones de usuarios activos.
                </p>
                <div class="mentor-skills">
                    <span class="skill-badge">Product Strategy</span>
                    <span class="skill-badge">Roadmapping</span>
                    <span class="skill-badge">Analytics</span>
                </div>
                <div class="mentor-stats">
                    <div class="stat-item">
                        <div class="stat-value">220+</div>
                        <div class="stat-label">Sesiones</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">9</div>
                        <div class="stat-label">Años exp.</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">98%</div>
                        <div class="stat-label">Satisfacción</div>
                    </div>
                </div>
                <div class="mentor-price">
                    <span class="price-label">Desde:</span>
                    <div>
                        <span class="price-value">$110</span>
                        <span class="price-period">/hora</span>
                    </div>
                </div>
                <span class="availability-badge">
                    <span class="availability-dot"></span>
                    Disponible hoy
                </span>
                <div class="mentor-actions">
                    <button class="btn-schedule">📅 Agendar Sesión</button>
                    <button class="btn-profile">Ver Perfil</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Datos de ejemplo de mentores
        const mentorsData = [
            {
                name: "Juan García",
                title: "CEO & Growth Expert",
                category: "business",
                experience: "expert",
                price: 120,
                language: "es"
            },
            {
                name: "Ana Martínez",
                title: "UX/UI Design Lead",
                category: "design",
                experience: "senior",
                price: 95,
                language: "es"
            },
            // Agregar más datos según necesites
        ];

        // Función de búsqueda
        document.querySelector('.btn-search').addEventListener('click', performSearch);
        document.getElementById('searchInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                performSearch();
            }
        });

        function performSearch() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const cards = document.querySelectorAll('.mentor-card');
            let visibleCount = 0;

            cards.forEach(card => {
                const name = card.querySelector('.mentor-name').textContent.toLowerCase();
                const title = card.querySelector('.mentor-title').textContent.toLowerCase();
                const bio = card.querySelector('.mentor-bio').textContent.toLowerCase();
                
                if (name.includes(searchTerm) || title.includes(searchTerm) || bio.includes(searchTerm) || searchTerm === '') {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            updateResultsCount(visibleCount);
        }

        // Actualizar contador de resultados
        function updateResultsCount(count) {
            document.querySelector('.results-count').textContent = `${count} mentores disponibles`;
        }

        // Manejo de filtros
        const filters = {
            category: document.getElementById('categoryFilter'),
            experience: document.getElementById('experienceFilter'),
            price: document.getElementById('priceFilter'),
            language: document.getElementById('languageFilter')
        };

        Object.keys(filters).forEach(filterKey => {
            filters[filterKey].addEventListener('change', function() {
                updateActiveTags();
                applyFilters();
            });
        });

        function updateActiveTags() {
            const tagsContainer = document.getElementById('activeTags');
            tagsContainer.innerHTML = '';

            let hasFilters = false;

            Object.keys(filters).forEach(filterKey => {
                const select = filters[filterKey];
                if (select.value !== '') {
                    hasFilters = true;
                    const tag = document.createElement('span');
                    tag.className = 'filter-tag';
                    tag.innerHTML = `${select.options[select.selectedIndex].text} <span class="remove">×</span>`;
                    tag.onclick = function() {
                        select.value = '';
                        updateActiveTags();
                        applyFilters();
                    };
                    tagsContainer.appendChild(tag);
                }
            });

            if (hasFilters) {
                const clearBtn = document.createElement('button');
                clearBtn.className = 'btn-clear-filters';
                clearBtn.textContent = 'Limpiar filtros';
                clearBtn.onclick = clearAllFilters;
                tagsContainer.appendChild(clearBtn);
            }
        }

        function clearAllFilters() {
            Object.keys(filters).forEach(filterKey => {
                filters[filterKey].value = '';
            });
            updateActiveTags();
            applyFilters();
        }

        function applyFilters() {
            const cards = document.querySelectorAll('.mentor-card');
            let visibleCount = 0;

            cards.forEach(card => {
                card.style.display = 'block';
                visibleCount++;
            });

            updateResultsCount(visibleCount);
        }

        // Funciones para botones de agendar
        document.querySelectorAll('.btn-schedule').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                const mentorName = this.closest('.mentor-card').querySelector('.mentor-name').textContent;
                alert(`🎉 Redirigiendo al calendario de ${mentorName}...\n\nAquí se abriría el sistema de agendamiento.`);
            });
        });

        // Funciones para botones de ver perfil
        document.querySelectorAll('.btn-profile').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                const mentorName = this.closest('.mentor-card').querySelector('.mentor-name').textContent;
                alert(`📋 Abriendo perfil completo de ${mentorName}...\n\nAquí se mostraría el perfil detallado del mentor.`);
            });
        });

        // Click en toda la tarjeta
        document.querySelectorAll('.mentor-card').forEach(card => {
            card.addEventListener('click', function() {
                const mentorName = this.querySelector('.mentor-name').textContent;
                alert(`📋 Ver perfil completo de ${mentorName}`);
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
    </script>
</body>
</html>
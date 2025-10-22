<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillLink UNAB - Plan Padrino Digital</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        /* Header y Navegación */
        header {
            background: linear-gradient(135deg, #0051a5 0%, #003d7a 100%);
            color: white;
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        nav {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logo {
            width: 50px;
            height: 50px;
            background: white;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .logo-text-container {
            display: flex;
            flex-direction: column;
        }

        .logo-text {
            font-size: 1.8rem;
            font-weight: bold;
        }

        .logo-subtitle {
            font-size: 0.75rem;
            opacity: 0.9;
            margin-top: -5px;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: opacity 0.3s;
        }

        .nav-links a:hover {
            opacity: 0.8;
        }

        /* Sección Hero */
        .hero {
            background: linear-gradient(135deg, #0051a5 0%, #003d7a 100%);
            color: white;
            padding: 6rem 2rem;
            text-align: center;
        }

        .hero-content {
            max-width: 900px;
            margin: 0 auto;
        }

        .unab-badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.2);
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
            font-weight: 600;
            animation: fadeInUp 0.8s ease;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1.5rem;
            animation: fadeInUp 0.8s ease 0.1s backwards;
        }

        .motivational-text {
            font-size: 1.3rem;
            margin-bottom: 2.5rem;
            opacity: 0.95;
            animation: fadeInUp 0.8s ease 0.2s backwards;
        }

        .cta-buttons {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            flex-wrap: wrap;
            animation: fadeInUp 0.8s ease 0.3s backwards;
        }

        .cta-button {
            display: inline-block;
            background: white;
            color: #0051a5;
            padding: 1rem 3rem;
            font-size: 1.2rem;
            font-weight: bold;
            text-decoration: none;
            border-radius: 50px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        .cta-button.secondary {
            background: transparent;
            color: white;
            border: 2px solid white;
        }

        .cta-button.secondary:hover {
            background: white;
            color: #0051a5;
        }

        .hero-stats {
            display: flex;
            justify-content: center;
            gap: 3rem;
            margin-top: 3rem;
            animation: fadeInUp 0.8s ease 0.4s backwards;
        }

        .stat-box {
            text-align: center;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            display: block;
        }

        .stat-label {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        /* Sección de Propósito */
        .purpose {
            padding: 5rem 2rem;
            background: #f8f9fa;
            text-align: center;
        }

        .purpose h2 {
            font-size: 2.5rem;
            color: #0051a5;
            margin-bottom: 1.5rem;
        }

        .purpose-content {
            max-width: 800px;
            margin: 0 auto;
        }

        .purpose p {
            font-size: 1.2rem;
            color: #555;
            line-height: 1.8;
            margin-bottom: 2rem;
        }

        .purpose-highlights {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .highlight-item {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .highlight-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .highlight-title {
            font-size: 1.3rem;
            font-weight: bold;
            color: #0051a5;
            margin-bottom: 0.5rem;
        }

        .highlight-text {
            color: #666;
            font-size: 0.95rem;
        }

        /* Sección de Beneficios */
        .benefits {
            padding: 5rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .benefits h2 {
            text-align: center;
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 1rem;
        }

        .benefits-subtitle {
            text-align: center;
            color: #666;
            font-size: 1.1rem;
            margin-bottom: 3rem;
        }

        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .benefit-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .benefit-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0, 81, 165, 0.3);
        }

        .benefit-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .benefit-icon {
            font-size: 2.5rem;
        }

        .benefit-title {
            font-size: 1.4rem;
            font-weight: bold;
            color: #333;
        }

        .benefit-description {
            color: #666;
            line-height: 1.6;
        }

        /* Sección de Mentores */
        .mentors-section {
            padding: 5rem 2rem;
            background: #f8f9fa;
        }

        .mentors-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .mentors-section h2 {
            text-align: center;
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 1rem;
        }

        .mentors-subtitle {
            text-align: center;
            color: #666;
            font-size: 1.1rem;
            margin-bottom: 3rem;
        }

        .mentors-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
        }

        .mentor-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            text-align: center;
        }

        .mentor-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0, 81, 165, 0.3);
        }

        .mentor-type-badge {
            display: inline-block;
            background: #e3f2fd;
            color: #0051a5;
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .mentor-type-badge.profesor {
            background: #fef3c7;
            color: #92400e;
        }

        .mentor-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: linear-gradient(135deg, #0051a5 0%, #003d7a 100%);
            margin: 0 auto 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: white;
        }

        .mentor-name {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 0.5rem;
        }

        .mentor-specialty {
            color: #0051a5;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .mentor-career {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .mentor-subjects {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            justify-content: center;
            margin-bottom: 1.5rem;
        }

        .subject-tag {
            background: #f3f4f6;
            color: #374151;
            padding: 0.3rem 0.8rem;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .mentor-button {
            display: inline-block;
            background: #0051a5;
            color: white;
            padding: 0.7rem 2rem;
            border-radius: 25px;
            text-decoration: none;
            transition: background 0.3s;
        }

        .mentor-button:hover {
            background: #003d7a;
        }

        /* Sección Cómo Funciona */
        .how-it-works {
            padding: 5rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .how-it-works h2 {
            text-align: center;
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 3rem;
        }

        .steps-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
        }

        .step {
            text-align: center;
            position: relative;
        }

        .step-number {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #0051a5, #003d7a);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            font-weight: bold;
            margin: 0 auto 1.5rem;
        }

        .step-title {
            font-size: 1.3rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 0.5rem;
        }

        .step-description {
            color: #666;
            line-height: 1.6;
        }

        /* CTA Final */
        .final-cta {
            background: linear-gradient(135deg, #0051a5 0%, #003d7a 100%);
            color: white;
            padding: 5rem 2rem;
            text-align: center;
        }

        .final-cta h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .final-cta p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.95;
        }

        .final-cta .cta-button {
            background: white;
            color: #0051a5;
        }

        /* Footer */
        footer {
            background: #2c3e50;
            color: white;
            padding: 3rem 2rem;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .footer-section h3 {
            margin-bottom: 1rem;
            color: #0051a5;
        }

        .footer-section p {
            color: #aaa;
            margin-bottom: 0.5rem;
        }

        .footer-section a {
            color: #aaa;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-section a:hover {
            color: white;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            background: #0051a5;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: white;
            transition: background 0.3s, transform 0.3s;
        }

        .social-icon:hover {
            background: #003d7a;
            transform: scale(1.1);
        }

        .footer-bottom {
            text-align: center;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid #444;
            color: #aaa;
        }

        /* Animaciones */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-links {
                gap: 1rem;
                font-size: 0.9rem;
            }

            .hero h1 {
                font-size: 2rem;
            }

            .motivational-text {
                font-size: 1.1rem;
            }

            .hero-stats {
                flex-direction: column;
                gap: 1.5rem;
            }

            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }

            .mentors-grid {
                grid-template-columns: 1fr;
            }

            .logo-text {
                font-size: 1.4rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header y Navegación -->
    <header>
        <nav>
            <div class="logo-container">
                <div class="logo">
                    <img src="./images/uwu2.jpeg" alt="SkillLink UNAB Logo">
                </div>
                <div class="logo-text-container">
                    <span class="logo-text">SkillLink UNAB</span>
                    <span class="logo-subtitle">Plan Padrino Digital</span>
                </div>
            </div>
            <ul class="nav-links">
                <li><a href="#inicio">Inicio</a></li>
                <li><a href="#mentores">Mentores</a></li>
                <li><a href="#como-funciona">Cómo Funciona</a></li>
                <li><a href="#contacto">Contacto</a></li>
            </ul>
        </nav>
    </header>

    <!-- Sección Hero -->
    <section class="hero" id="inicio">
        <div class="hero-content">
            <div class="unab-badge">🎓 Universidad Autónoma de Bucaramanga</div>
            <h1>Acompañamiento Académico Gratuito</h1>
            <p class="motivational-text">
                Conecta con estudiantes de semestres avanzados y profesores UNAB que te apoyan en tu camino universitario. Tutorías personalizadas sin costo, porque juntos crecemos.
            </p>
            <div class="cta-buttons">
                <a href="#mentores" class="cta-button">Buscar Mentor</a>
                <a href="#como-funciona" class="cta-button secondary">Quiero Ser Mentor</a>
            </div>
            <div class="hero-stats">
                <div class="stat-box">
                    <span class="stat-number">52+</span>
                    <span class="stat-label">Mentores Activos</span>
                </div>
                <div class="stat-box">
                    <span class="stat-number">340+</span>
                    <span class="stat-label">Tutorías Realizadas</span>
                </div>
                <div class="stat-box">
                    <span class="stat-number">100%</span>
                    <span class="stat-label">Gratuito</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de Propósito -->
    <section class="purpose">
        <h2>¿Qué es el Plan Padrino Digital?</h2>
        <div class="purpose-content">
            <p>
                El Plan Padrino Digital es una iniciativa de Bienestar Universitario UNAB que digitaliza y potencia el acompañamiento académico entre la comunidad estudiantil. Conectamos estudiantes de primeros semestres con mentores voluntarios (estudiantes avanzados y profesores) para brindar apoyo académico personalizado y completamente gratuito.
            </p>
        </div>
        <div class="purpose-highlights">
            <div class="highlight-item">
                <div class="highlight-icon">🤝</div>
                <div class="highlight-title">Solidaridad</div>
                <div class="highlight-text">Cultura de apoyo entre pares</div>
            </div>
            <div class="highlight-item">
                <div class="highlight-icon">📚</div>
                <div class="highlight-title">Académico</div>
                <div class="highlight-text">Todas las materias UNAB</div>
            </div>
            <div class="highlight-item">
                <div class="highlight-icon">✨</div>
                <div class="highlight-title">Gratuito</div>
                <div class="highlight-text">Sin ánimo de lucro</div>
            </div>
            <div class="highlight-item">
                <div class="highlight-icon">🎯</div>
                <div class="highlight-title">Personalizado</div>
                <div class="highlight-text">A tu ritmo y necesidades</div>
            </div>
        </div>
    </section>

    <!-- Sección de Beneficios -->
    <section class="benefits">
        <h2>Beneficios del Programa</h2>
        <p class="benefits-subtitle">Para estudiantes y mentores</p>
        <div class="benefits-grid">
            <div class="benefit-card">
                <div class="benefit-header">
                    <span class="benefit-icon">🎓</span>
                    <h3 class="benefit-title">Para Estudiantes</h3>
                </div>
                <p class="benefit-description">
                    Recibe apoyo académico personalizado en las materias que necesites, mejora tu rendimiento, accede a estrategias de estudio efectivas y adapta más fácil a la vida universitaria.
                </p>
            </div>

            <div class="benefit-card">
                <div class="benefit-header">
                    <span class="benefit-icon">🌟</span>
                    <h3 class="benefit-title">Para Mentores</h3>
                </div>
                <p class="benefit-description">
                    Desarrolla habilidades de liderazgo y enseñanza, obtén certificación de voluntariado acreditable, fortalece tu CV, genera networking académico y contribuye a tu comunidad universitaria.
                </p>
            </div>

            <div class="benefit-card">
                <div class="benefit-header">
                    <span class="benefit-icon">🏛️</span>
                    <h3 class="benefit-title">Para la UNAB</h3>
                </div>
                <p class="benefit-description">
                    Fortalece el sentido de comunidad, mejora la retención estudiantil, obtén datos para decisiones académicas y promueve la cultura de excelencia y solidaridad.
                </p>
            </div>
        </div>
    </section>

    <!-- Sección de Mentores Destacados -->
    <section class="mentors-section" id="mentores">
        <div class="mentors-container">
            <h2>Mentores Destacados</h2>
            <p class="mentors-subtitle">Conoce a algunos de nuestros mentores del Plan Padrino</p>
            <div class="mentors-grid">
                <div class="mentor-card">
                    <span class="mentor-type-badge">Estudiante - 8° Semestre</span>
                    <div class="mentor-avatar">👨‍💻</div>
                    <h3 class="mentor-name">Carlos Mendoza</h3>
                    <p class="mentor-specialty">Ingeniería de Sistemas</p>
                    <p class="mentor-career">Promedio: 4.5 | 24 tutorías realizadas</p>
                    <div class="mentor-subjects">
                        <span class="subject-tag">Programación</span>
                        <span class="subject-tag">Algoritmos</span>
                        <span class="subject-tag">Estructuras</span>
                    </div>
                    <a href="#" class="mentor-button">Solicitar Tutoría</a>
                </div>

                <div class="mentor-card">
                    <span class="mentor-type-badge profesor">Profesora UNAB</span>
                    <div class="mentor-avatar">👩‍🏫</div>
                    <h3 class="mentor-name">Dra. María Rodríguez</h3>
                    <p class="mentor-specialty">Facultad de Ingeniería</p>
                    <p class="mentor-career">12 años UNAB | 41 tutorías realizadas</p>
                    <div class="mentor-subjects">
                        <span class="subject-tag">Cálculo I-III</span>
                        <span class="subject-tag">Álgebra</span>
                        <span class="subject-tag">Ecuaciones</span>
                    </div>
                    <a href="#" class="mentor-button">Solicitar Tutoría</a>
                </div>

                <div class="mentor-card">
                    <span class="mentor-type-badge">Estudiante - 9° Semestre</span>
                    <div class="mentor-avatar">👩‍💼</div>
                    <h3 class="mentor-name">Laura García</h3>
                    <p class="mentor-specialty">Administración de Empresas</p>
                    <p class="mentor-career">Promedio: 4.6 | 18 tutorías realizadas</p>
                    <div class="mentor-subjects">
                        <span class="subject-tag">Contabilidad</span>
                        <span class="subject-tag">Finanzas</span>
                        <span class="subject-tag">Costos</span>
                    </div>
                    <a href="#" class="mentor-button">Solicitar Tutoría</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección Cómo Funciona -->
    <section class="how-it-works" id="como-funciona">
        <h2>¿Cómo Funciona?</h2>
        <div class="steps-container">
            <div class="step">
                <div class="step-number">1</div>
                <h3 class="step-title">Regístrate</h3>
                <p class="step-description">
                    Ingresa con tu correo institucional UNAB y completa tu perfil indicando las materias en las que necesitas apoyo.
                </p>
            </div>

            <div class="step">
                <div class="step-number">2</div>
                <h3 class="step-title">Busca tu Mentor</h3>
                <p class="step-description">
                    Explora mentores por materia, facultad o disponibilidad. Revisa sus perfiles y elige el que mejor se adapte a ti.
                </p>
            </div>

            <div class="step">
                <div class="step-number">3</div>
                <h3 class="step-title">Agenda la Tutoría</h3>
                <p class="step-description">
                    Solicita una sesión según los horarios disponibles del mentor. Recibe confirmación por correo institucional.
                </p>
            </div>

            <div class="step">
                <div class="step-number">4</div>
                <h3 class="step-title">Aprende y Crece</h3>
                <p class="step-description">
                    Asiste a tu tutoría presencial o virtual. Después, valora la experiencia y sigue progresando académicamente.
                </p>
            </div>
        </div>
    </section>

    <!-- CTA Final -->
    <section class="final-cta">
        <h2>¿Listo para empezar?</h2>
        <p>Únete al Plan Padrino Digital y forma parte de una comunidad que crece junta</p>
        <a href="#mentores" class="cta-button">Buscar Mentor Ahora</a>
    </section>

    <!-- Footer -->
    <footer id="contacto">
        <div class="footer-content">
            <div class="footer-section">
                <h3>SkillLink UNAB</h3>
                <p>Plan Padrino Digital</p>
                <p>Bienestar Universitario</p>
                <p>Universidad Autónoma de Bucaramanga</p>
            </div>
            
            <div class="footer-section">
                <h3>Enlaces Rápidos</h3>
                <p><a href="#inicio">Inicio</a></p>
                <p><a href="#mentores">Buscar Mentores</a></p>
                <p><a href="#como-funciona">Cómo Funciona</a></p>
                <p><a href="#">Quiero Ser Mentor</a></p>
            </div>

            <div class="footer-section">
                <h3>Contacto</h3>
                <p>📧 bienestar@unab.edu.co</p>
                <p>📞 (607) 643 6111</p>
                <p>📍 Campus UNAB, Bucaramanga</p>
            </div>
            
            <div class="footer-section">
                <h3>Síguenos</h3>
                <div class="social-links">
                    <a href="#" class="social-icon" title="Facebook">f</a>
                    <a href="#" class="social-icon" title="Twitter">t</a>
                    <a href="#" class="social-icon" title="Instagram">ig</a>
                    <a href="#" class="social-icon" title="LinkedIn">in</a>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; 2025 SkillLink UNAB - Plan Padrino Digital. Universidad Autónoma de Bucaramanga. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>
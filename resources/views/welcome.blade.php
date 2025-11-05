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
            background: #f5f7fa;
            color: #333;
        }

        /* Header */
        header {
            background: linear-gradient(135deg, #0051a5 0%, #003d7a 100%);
            color: white;
            padding: 1rem 0;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-container {
            max-width: 1400px;
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
            text-decoration: none;
            color: white;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: white;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: #0051a5;
            font-size: 1.2rem;
        }

        .logo-title {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .auth-buttons {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .btn {
            padding: 0.7rem 1.5rem;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-login {
            background: rgba(255,255,255,0.2);
            color: white;
            border: 2px solid white;
        }

        .btn-login:hover {
            background: white;
            color: #0051a5;
        }

        .btn-register {
            background: white;
            color: #0051a5;
            border: 2px solid white;
        }

        .btn-register:hover {
            background: #f0f0f0;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #0051a5 0%, #003d7a 100%);
            color: white;
            padding: 4rem 2rem;
            text-align: center;
        }

        .hero-content {
            max-width: 900px;
            margin: 0 auto;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 1rem;
            text-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }

        .hero-subtitle {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            opacity: 0.95;
        }

        .hero-buttons {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-hero {
            padding: 1rem 2.5rem;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-hero-primary {
            background: white;
            color: #0051a5;
        }

        .btn-hero-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }

        .btn-hero-secondary {
            background: rgba(255,255,255,0.2);
            color: white;
            border: 2px solid white;
        }

        .btn-hero-secondary:hover {
            background: white;
            color: #0051a5;
        }

        /* Main Container */
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        /* Features Section */
        .features-section {
            padding: 4rem 0;
            background: white;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 1rem;
            color: #333;
        }

        .section-subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 3rem;
            font-size: 1.1rem;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 4rem;
        }

        .feature-card {
            background: #f9f9f9;
            padding: 2rem;
            border-radius: 12px;
            text-align: center;
            border: 2px solid #e0e0e0;
            transition: all 0.3s;
        }

        .feature-card:hover {
            border-color: #0051a5;
            box-shadow: 0 8px 20px rgba(0, 81, 165, 0.15);
            transform: translateY(-5px);
        }

        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .feature-title {
            font-size: 1.4rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
            color: #0051a5;
        }

        .feature-description {
            color: #666;
            line-height: 1.6;
        }

        /* Mentors Section */
        .mentors-section {
            padding: 4rem 0;
            background: #f5f7fa;
        }

        .mentors-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
        }

        .mentor-card {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            transition: all 0.3s;
            border: 2px solid transparent;
        }

        .mentor-card:hover {
            border-color: #0051a5;
            box-shadow: 0 8px 20px rgba(0, 81, 165, 0.2);
            transform: translateY(-5px);
        }

        .mentor-avatar {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #0051a5 0%, #003d7a 100%);
            border-radius: 50%;
            margin: 0 auto 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: white;
        }

        .mentor-name {
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
            color: #333;
        }

        .mentor-specialty {
            color: #0051a5;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .mentor-info {
            color: #666;
            font-size: 0.95rem;
        }

        /* How It Works Section */
        .how-works-section {
            padding: 4rem 0;
            background: white;
        }

        .steps-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .step-card {
            text-align: center;
            padding: 2rem;
        }

        .step-number {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #0051a5 0%, #003d7a 100%);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            font-weight: bold;
            margin: 0 auto 1rem;
        }

        .step-title {
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
            color: #333;
        }

        .step-description {
            color: #666;
            line-height: 1.6;
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, #0051a5 0%, #003d7a 100%);
            color: white;
            padding: 3rem 2rem;
            text-align: center;
            border-radius: 12px;
            margin: 4rem 0;
        }

        .cta-title {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .cta-description {
            font-size: 1.1rem;
            margin-bottom: 2rem;
            opacity: 0.95;
        }

        .cta-button {
            background: white;
            color: #0051a5;
            padding: 1rem 3rem;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }

        /* Footer */
        footer {
            background: #1a1a1a;
            color: white;
            text-align: center;
            padding: 2rem;
            margin-top: 4rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }

            .hero-subtitle {
                font-size: 1rem;
            }

            .section-title {
                font-size: 1.8rem;
            }

            .hero-buttons,
            .auth-buttons {
                flex-direction: column;
                width: 100%;
            }

            .btn-hero,
            .btn {
                width: 100%;
            }

            .header-container {
                flex-direction: column;
                gap: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="header-container">
            <a href="{{ route('home') }}" class="logo-section">
                <div class="logo-icon">SK</div>
                <div class="logo-title">SkillLink UNAB</div>
            </a>
            <div class="auth-buttons">
                <a href="{{ route('login') }}" class="btn btn-login">🔑 Iniciar Sesión</a>
                <a href="{{ route('login') }}" class="btn btn-register">✍️ Registrarse</a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1 class="hero-title">🎓 Bienvenido a SkillLink UNAB</h1>
            <p class="hero-subtitle">Conecta con mentores y profesores que te apoyan en tu camino universitario. Tutorías personalizadas sin costo, porque juntos crecemos.</p>
            
            <div class="hero-buttons">
                <a href="{{ route('login') }}" class="btn-hero btn-hero-primary">🚀 Comienza Ahora</a>
                <a href="#features" class="btn-hero btn-hero-secondary">📖 Conoce Más</a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section" id="features">
        <div class="container">
            <h2 class="section-title">¿Qué es el Plan Padrino Digital?</h2>
            <p class="section-subtitle">Una iniciativa de Bienestar Universitario UNAB que conecta estudiantes de primeros semestres con mentores voluntarios</p>
            
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">👨‍🎓</div>
                    <div class="feature-title">Para Estudiantes</div>
                    <div class="feature-description">
                        Recibe apoyo académico personalizado, mejora tu rendimiento, accede a estrategias de estudio efectivas y adapta tu entrada a la vida universitaria.
                    </div>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">👨‍🏫</div>
                    <div class="feature-title">Para Mentores</div>
                    <div class="feature-description">
                        Desarrolla habilidades de liderazgo, obtén certificación de voluntariado, fortalece tu CV y contribuye a tu comunidad universitaria.
                    </div>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">🏫</div>
                    <div class="feature-title">Para la UNAB</div>
                    <div class="feature-description">
                        Fortalece el sentido de comunidad, mejora la retención estudiantil y promueve la cultura de excelencia y solidaridad.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mentors Preview Section -->
    <section class="mentors-section">
        <div class="container">
            <h2 class="section-title">👨‍🏫 Conoce a Algunos de Nuestros Mentores</h2>
            <p class="section-subtitle">Estos son algunos de los mentores disponibles en SkillLink</p>
            
            <div class="mentors-grid">
                <div class="mentor-card">
                    <div class="mentor-avatar">👨‍💻</div>
                    <div class="mentor-name">Carlos Mendoza</div>
                    <div class="mentor-specialty">Ingeniería de Sistemas</div>
                    <div class="mentor-info">
                        ⭐ 4.5/5 | 24 tutorías realizadas
                    </div>
                </div>

                <div class="mentor-card">
                    <div class="mentor-avatar">👩‍🏫</div>
                    <div class="mentor-name">Dra. María Rodríguez</div>
                    <div class="mentor-specialty">Facultad de Ingeniería</div>
                    <div class="mentor-info">
                        ⭐ 4.8/5 | 41 tutorías realizadas
                    </div>
                </div>

                <div class="mentor-card">
                    <div class="mentor-avatar">👩‍💼</div>
                    <div class="mentor-name">Laura García</div>
                    <div class="mentor-specialty">Administración de Empresas</div>
                    <div class="mentor-info">
                        ⭐ 4.6/5 | 18 tutorías realizadas
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="how-works-section">
        <div class="container">
            <h2 class="section-title">¿Cómo Funciona?</h2>
            <p class="section-subtitle">4 pasos sencillos para comenzar tu camino de aprendizaje</p>
            
            <div class="steps-grid">
                <div class="step-card">
                    <div class="step-number">1️⃣</div>
                    <div class="step-title">Regístrate</div>
                    <div class="step-description">
                        Ingresa con tu correo institucional UNAB y completa tu perfil indicando las materias en las que necesitas apoyo.
                    </div>
                </div>

                <div class="step-card">
                    <div class="step-number">2️⃣</div>
                    <div class="step-title">Explora Mentores</div>
                    <div class="step-description">
                        Busca mentores por materia, facultad o disponibilidad. Revisa sus perfiles y elige el que mejor se adapte a ti.
                    </div>
                </div>

                <div class="step-card">
                    <div class="step-number">3️⃣</div>
                    <div class="step-title">Solicita Sesión</div>
                    <div class="step-description">
                        Agendar una sesión según los horarios disponibles del mentor. Recibe confirmación por correo.
                    </div>
                </div>

                <div class="step-card">
                    <div class="step-number">4️⃣</div>
                    <div class="step-title">Asiste y Evalúa</div>
                    <div class="step-description">
                        Asiste a tu tutoría presencial o virtual. Después, valora la experiencia y sigue progresando académicamente.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="container">
        <div class="cta-section">
            <h2 class="cta-title">¡Únete al Plan Padrino Digital!</h2>
            <p class="cta-description">Forma parte de una comunidad que crece junta. Comienza tu experiencia de aprendizaje hoy mismo.</p>
            <a href="{{ route('login') }}" class="cta-button">🚀 Comienza Ahora</a>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 SkillLink UNAB - Plan Padrino Digital. Todos los derechos reservados.</p>
    </footer>

</body>
</html>

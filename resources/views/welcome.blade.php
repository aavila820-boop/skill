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

        /* ========== HEADER CON COLORES UNAB ========== */
        header {
            background: linear-gradient(135deg, #FF8C00 0%, #FFA500 100%);
            color: white;
            padding: 1rem 0;
            box-shadow: 0 4px 12px rgba(255, 140, 0, 0.3);
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

        .auth-buttons {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .btn {
            padding: 0.75rem 1.6rem;
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

        .btn-login {
            background: rgba(255, 255, 255, 0.25);
            color: white;
            border: 2px solid white;
        }

        .btn-login:hover {
            background: white;
            color: #FF8C00;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .btn-register {
            background: white;
            color: #FF8C00;
            border: 2px solid white;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.15);
        }

        .btn-register:hover {
            background: #f0f0f0;
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);
        }

        /* ========== HERO SECTION ========== */
        .hero {
            background: linear-gradient(135deg, #FF8C00 0%, #FFA500 50%, #9B30FF 100%);
            color: white;
            padding: 5rem 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.08'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            opacity: 0.3;
        }

        .hero-content {
            max-width: 900px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.25);
            letter-spacing: -1px;
        }

        .hero-subtitle {
            font-size: 1.4rem;
            margin-bottom: 2.5rem;
            opacity: 0.98;
            font-weight: 500;
        }

        .hero-buttons {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-hero {
            padding: 1.1rem 2.8rem;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
            text-transform: uppercase;
            letter-spacing: 0.6px;
        }

        .btn-hero-primary {
            background: white;
            color: #FF8C00;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.25);
        }

        .btn-hero-primary:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .btn-hero-secondary {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 2px solid white;
            backdrop-filter: blur(10px);
        }

        .btn-hero-secondary:hover {
            background: white;
            color: #FF8C00;
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);
        }

        /* Container General */
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        /* ========== FEATURES SECTION ========== */
        .features-section {
            padding: 5rem 0;
            background: white;
        }

        .section-title {
            font-size: 2.8rem;
            font-weight: 800;
            text-align: center;
            margin-bottom: 1.2rem;
            background: linear-gradient(135deg, #FF8C00, #9B30FF);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .section-subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 3.5rem;
            font-size: 1.15rem;
            font-weight: 500;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2.5rem;
            margin-bottom: 4rem;
        }

        .feature-card {
            background: linear-gradient(135deg, #fff9f0 0%, #ffffff 100%);
            padding: 2.5rem;
            border-radius: 15px;
            text-align: center;
            border: 2px solid #e0e0e0;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #FF8C00, #9B30FF);
            transform: scaleX(0);
            transition: transform 0.3s;
        }

        .feature-card:hover {
            border-color: #FF8C00;
            box-shadow: 0 10px 30px rgba(255, 140, 0, 0.2);
            transform: translateY(-8px);
        }

        .feature-card:hover::before {
            transform: scaleX(1);
        }

        .feature-icon {
            font-size: 3.5rem;
            margin-bottom: 1rem;
        }

        .feature-title {
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: 0.8rem;
            background: linear-gradient(135deg, #FF8C00, #9B30FF);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .feature-description {
            color: #666;
            line-height: 1.7;
            font-weight: 500;
        }

        /* ========== MENTORS SECTION ========== */
        .mentors-section {
            padding: 5rem 0;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }

        .mentors-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2.5rem;
        }

        .mentor-card {
            background: white;
            border-radius: 15px;
            padding: 2.5rem;
            text-align: center;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);
            transition: all 0.3s;
            border: 2px solid transparent;
        }

        .mentor-card:hover {
            border-color: #9B30FF;
            box-shadow: 0 12px 35px rgba(155, 48, 255, 0.25);
            transform: translateY(-10px);
        }

        .mentor-avatar {
            width: 110px;
            height: 110px;
            background: linear-gradient(135deg, #FF8C00, #9B30FF);
            border-radius: 50%;
            margin: 0 auto 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.8rem;
            color: white;
            box-shadow: 0 6px 20px rgba(155, 48, 255, 0.3);
            transition: transform 0.3s;
        }

        .mentor-card:hover .mentor-avatar {
            transform: scale(1.1);
        }

        .mentor-name {
            font-size: 1.4rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            color: #333;
        }

        .mentor-specialty {
            color: #FF8C00;
            font-weight: 700;
            margin-bottom: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .mentor-info {
            color: #666;
            font-size: 0.98rem;
            font-weight: 500;
            line-height: 1.6;
        }

        /* ========== HOW IT WORKS SECTION ========== */
        .how-works-section {
            padding: 5rem 0;
            background: white;
        }

        .steps-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2.5rem;
        }

        .step-card {
            text-align: center;
            padding: 2.5rem;
        }

        .step-number {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #FF8C00, #9B30FF);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            font-weight: 800;
            margin: 0 auto 1.5rem;
            box-shadow: 0 6px 20px rgba(155, 48, 255, 0.3);
            transition: transform 0.3s;
        }

        .step-card:hover .step-number {
            transform: scale(1.15);
        }

        .step-title {
            font-size: 1.4rem;
            font-weight: 800;
            margin-bottom: 0.8rem;
            color: #333;
        }

        .step-description {
            color: #666;
            line-height: 1.7;
            font-weight: 500;
        }

        /* ========== CTA SECTION ========== */
        .cta-section {
            background: linear-gradient(135deg, #FF8C00 0%, #FFA500 50%, #9B30FF 100%);
            color: white;
            padding: 4rem 2rem;
            text-align: center;
            border-radius: 20px;
            margin: 5rem 0;
            box-shadow: 0 10px 40px rgba(255, 140, 0, 0.3);
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            opacity: 0.3;
        }

        .cta-title {
            font-size: 2.4rem;
            font-weight: 800;
            margin-bottom: 1rem;
            position: relative;
            z-index: 1;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.15);
        }

        .cta-description {
            font-size: 1.2rem;
            margin-bottom: 2.5rem;
            opacity: 0.98;
            position: relative;
            z-index: 1;
            font-weight: 500;
        }

        .cta-button {
            background: white;
            color: #FF8C00;
            padding: 1.2rem 3.5rem;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 800;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
            position: relative;
            z-index: 1;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .cta-button:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        }

        /* ========== FOOTER ========== */
        footer {
            background: #1a1a1a;
            color: white;
            text-align: center;
            padding: 2.5rem;
            margin-top: 4rem;
            font-weight: 600;
        }

        footer a {
            color: #FF8C00;
            text-decoration: none;
            transition: color 0.3s;
        }

        footer a:hover {
            color: #FFA500;
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.2rem;
            }

            .hero-subtitle {
                font-size: 1.1rem;
            }

            .section-title {
                font-size: 2rem;
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

            .hero {
                padding: 3rem 1rem;
            }

            .cta-title {
                font-size: 1.8rem;
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
            <p class="hero-subtitle">Conecta con mentores y profesores que te apoyan en tu camino universitario.
                Tutorías personalizadas sin costo, porque juntos crecemos.</p>

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
            <p class="section-subtitle">Una iniciativa de Bienestar Universitario UNAB que conecta estudiantes de
                primeros semestres con mentores voluntarios</p>

            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">👨‍🎓</div>
                    <div class="feature-title">Para Estudiantes</div>
                    <div class="feature-description">
                        Recibe apoyo académico personalizado, mejora tu rendimiento, accede a estrategias de estudio
                        efectivas y adapta tu entrada a la vida universitaria.
                    </div>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">👨‍🏫</div>
                    <div class="feature-title">Para Mentores</div>
                    <div class="feature-description">
                        Desarrolla habilidades de liderazgo, obtén certificación de voluntariado, fortalece tu CV y
                        contribuye a tu comunidad universitaria.
                    </div>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">🏫</div>
                    <div class="feature-title">Para la UNAB</div>
                    <div class="feature-description">
                        Fortalece el sentido de comunidad, mejora la retención estudiantil y promueve la cultura de
                        excelencia y solidaridad.
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
                        Ingresa con tu correo institucional UNAB y completa tu perfil indicando las materias en las que
                        necesitas apoyo.
                    </div>
                </div>

                <div class="step-card">
                    <div class="step-number">2️⃣</div>
                    <div class="step-title">Explora Mentores</div>
                    <div class="step-description">
                        Busca mentores por materia, facultad o disponibilidad. Revisa sus perfiles y elige el que mejor
                        se adapte a ti.
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
                        Asiste a tu tutoría presencial o virtual. Después, valora la experiencia y sigue progresando
                        académicamente.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="container">
        <div class="cta-section">
            <h2 class="cta-title">¡Únete al Plan Padrino Digital!</h2>
            <p class="cta-description">Forma parte de una comunidad que crece junta. Comienza tu experiencia de
                aprendizaje hoy mismo.</p>
            <a href="{{ route('login') }}" class="cta-button">🚀 Comienza Ahora</a>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 SkillLink UNAB - Plan Padrino Digital. Todos los derechos reservados.</p>
    </footer>

</body>

</html>

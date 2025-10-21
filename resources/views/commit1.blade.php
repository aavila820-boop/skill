<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillLink - Conecta con los mejores mentores</title>
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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

        /* ESPACIO PARA TU LOGO */
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

        .logo-text {
            font-size: 1.8rem;
            font-weight: bold;
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 6rem 2rem;
            text-align: center;
        }

        .hero-content {
            max-width: 800px;
            margin: 0 auto;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1.5rem;
            animation: fadeInUp 0.8s ease;
        }

        .motivational-text {
            font-size: 1.3rem;
            margin-bottom: 2.5rem;
            opacity: 0.95;
            animation: fadeInUp 0.8s ease 0.2s backwards;
        }

        .cta-button {
            display: inline-block;
            background: white;
            color: #667eea;
            padding: 1rem 3rem;
            font-size: 1.2rem;
            font-weight: bold;
            text-decoration: none;
            border-radius: 50px;
            transition: transform 0.3s, box-shadow 0.3s;
            animation: fadeInUp 0.8s ease 0.4s backwards;
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        /* Sección de Propósito */
        .purpose {
            padding: 5rem 2rem;
            background: #f8f9fa;
            text-align: center;
        }

        .purpose h2 {
            font-size: 2.5rem;
            color: #667eea;
            margin-bottom: 1.5rem;
        }

        .purpose p {
            max-width: 700px;
            margin: 0 auto;
            font-size: 1.2rem;
            color: #555;
            line-height: 1.8;
        }

        /* Sección de Mentores */
        .mentors-section {
            padding: 5rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .mentors-section h2 {
            text-align: center;
            font-size: 2.5rem;
            color: #333;
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
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
        }

        .mentor-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
            color: #667eea;
            font-weight: 500;
            margin-bottom: 1rem;
        }

        .mentor-description {
            color: #666;
            font-size: 0.95rem;
            margin-bottom: 1.5rem;
        }

        .mentor-button {
            display: inline-block;
            background: #667eea;
            color: white;
            padding: 0.7rem 2rem;
            border-radius: 25px;
            text-decoration: none;
            transition: background 0.3s;
        }

        .mentor-button:hover {
            background: #764ba2;
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
            color: #667eea;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            background: #667eea;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: white;
            transition: background 0.3s, transform 0.3s;
        }

        .social-icon:hover {
            background: #764ba2;
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
            }

            .hero h1 {
                font-size: 2rem;
            }

            .motivational-text {
                font-size: 1.1rem;
            }

            .mentors-grid {
                grid-template-columns: 1fr;
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
                    <img src="./images/uwu2.jpeg" alt="SkillLink Logo">
                </div>
                <span class="logo-text">SkillLink</span>
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
            <h1>Conecta con los mejores mentores</h1>
            <p class="motivational-text">
                Transforma tu carrera con la guía de expertos. Aprende, crece y alcanza tus metas profesionales con mentores que realmente entienden tu camino.
            </p>
            <a href="#mentores" class="cta-button">Comienza ahora</a>
        </div>
    </section>

    <!-- Sección de Propósito -->
    <section class="purpose">
        <h2>Nuestro Propósito</h2>
        <p>
            SkillLink conecta a profesionales ambiciosos con mentores experimentados en diversas industrias. 
            Creemos en el poder del aprendizaje personalizado y el networking estratégico para acelerar tu desarrollo profesional.
        </p>
    </section>

    <!-- Sección de Mentores Destacados -->
    <section class="mentors-section" id="mentores">
        <h2>Mentores Destacados</h2>
        <div class="mentors-grid">
            <div class="mentor-card">
                <div class="mentor-avatar">👨‍💻</div>
                <h3 class="mentor-name">Carlos Rodríguez</h3>
                <p class="mentor-specialty">Desarrollo Web Full Stack</p>
                <p class="mentor-description">
                    15 años de experiencia en desarrollo. Ex-líder técnico en empresas Fortune 500.
                </p>
                <a href="#" class="mentor-button">Ver Perfil</a>
            </div>

            <div class="mentor-card">
                <div class="mentor-avatar">👩‍💼</div>
                <h3 class="mentor-name">María González</h3>
                <p class="mentor-specialty">Marketing Digital</p>
                <p class="mentor-description">
                    Especialista en estrategias digitales. Ha trabajado con más de 50 startups.
                </p>
                <a href="#" class="mentor-button">Ver Perfil</a>
            </div>

            <div class="mentor-card">
                <div class="mentor-avatar">👨‍🎨</div>
                <h3 class="mentor-name">Juan Martínez</h3>
                <p class="mentor-specialty">Diseño UX/UI</p>
                <p class="mentor-description">
                    Diseñador senior con proyectos para marcas internacionales reconocidas.
                </p>
                <a href="#" class="mentor-button">Ver Perfil</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contacto">
        <div class="footer-content">
            <div class="footer-section">
                <h3>SkillLink</h3>
                <p>Conectando talento con experiencia desde 2025.</p>
            </div>
            
            <div class="footer-section">
                <h3>Enlaces Rápidos</h3>
                <p><a href="#inicio" style="color: #aaa; text-decoration: none;">Inicio</a></p>
                <p><a href="#mentores" style="color: #aaa; text-decoration: none;">Mentores</a></p>
                <p><a href="#" style="color: #aaa; text-decoration: none;">Sobre Nosotros</a></p>
            </div>
            
            <div class="footer-section">
                <h3>Síguenos</h3>
                <div class="social-links">
                    <a href="#" class="social-icon">f</a>
                    <a href="#" class="social-icon">t</a>
                    <a href="#" class="social-icon">in</a>
                    <a href="#" class="social-icon">ig</a>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; 2025 SkillLink. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Mentores - SkillLink UNAB</title>
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
            font-size: 1.2rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .nav-links {
            display: flex;
            gap: 1.5rem;
            list-style: none;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            padding: 0.5rem 1rem;
            border-radius: 8px;
        }

        .nav-links a:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
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
        }

        .logout-btn:hover {
            background: rgba(255, 255, 255, 0.35);
            border-color: white;
            transform: translateY(-2px);
        }

        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        /* Breadcrumb mejorado */
        .breadcrumb {
            background: white;
            padding: 1rem 1.5rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            border-left: 4px solid;
            border-image: linear-gradient(180deg, #FF8C00, #9B30FF);
            border-image-slice: 1;
        }

        .page-title {
            font-size: 2.2rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, #FF8C00, #9B30FF);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .page-subtitle {
            color: #666;
            margin-bottom: 2rem;
            font-size: 1.05rem;
        }

        /* Grid de mentores mejorado */
        .mentors-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 2rem;
        }

        .mentor-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);
            text-align: center;
            transition: all 0.3s;
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
        }

        .mentor-card::before {
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

        .mentor-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 12px 30px rgba(155, 48, 255, 0.2);
            border-color: #9B30FF;
        }

        .mentor-card:hover::before {
            transform: scaleX(1);
        }

        /* Badge de tipo de mentor */
        .mentor-type-badge {
            display: inline-block;
            background: linear-gradient(135deg, #fff3cd, #ffeaa7);
            color: #856404;
            padding: 0.5rem 1.2rem;
            border-radius: 25px;
            font-size: 0.8rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Avatar mejorado */
        .mentor-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: linear-gradient(135deg, #FF8C00, #9B30FF);
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
            transform: scale(1.1) rotate(5deg);
        }

        .mentor-name {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 0.4rem;
            color: #333;
        }

        .mentor-specialty {
            color: #9B30FF;
            font-weight: 700;
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }

        .mentor-career {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 1rem;
            font-weight: 500;
        }

        /* Tags de materias mejorados */
        .mentor-subjects {
            display: flex;
            flex-wrap: wrap;
            gap: 0.6rem;
            justify-content: center;
            margin-bottom: 1.5rem;
        }

        .subject-tag {
            background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
            color: #374151;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 700;
            transition: all 0.3s;
            border: 1px solid #e0e0e0;
        }

        .subject-tag:hover {
            background: linear-gradient(135deg, #FF8C00, #FFA500);
            color: white;
            border-color: #FF8C00;
            transform: translateY(-2px);
        }

        /* Botón de mentor */
        .mentor-button {
            width: 100%;
            padding: 0.9rem;
            background: linear-gradient(135deg, #FF8C00, #FFA500);
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 1rem;
            box-shadow: 0 4px 15px rgba(255, 140, 0, 0.3);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .mentor-button:hover {
            background: linear-gradient(135deg, #FFA500, #FF8C00);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 140, 0, 0.4);
        }

        /* ========== MODAL MEJORADO ========== */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(5px);
        }

        .modal.active {
            display: flex;
            align-items: center;
            justify-content: center;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .modal-content {
            background-color: white;
            padding: 2.5rem;
            border-radius: 20px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
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
            font-size: 1.6rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, #FF8C00, #9B30FF);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #333;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 0.9rem 1rem;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
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

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        .modal-buttons {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn {
            padding: 0.9rem;
            border: none;
            border-radius: 10px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 1rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, #FF8C00, #FFA500);
            color: white;
            box-shadow: 0 4px 15px rgba(255, 140, 0, 0.3);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #FFA500, #FF8C00);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 140, 0, 0.4);
        }

        .btn-secondary {
            background: #f0f0f0;
            color: #333;
        }

        .btn-secondary:hover {
            background: #e0e0e0;
            transform: translateY(-2px);
        }

        .empty-state {
            text-align: center;
            padding: 3rem 2rem;
            color: #999;
            background: white;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .empty-state-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 768px) {
            .mentors-grid {
                grid-template-columns: 1fr;
            }

            .nav-links {
                display: none;
            }

            .page-title {
                font-size: 1.8rem;
            }

            .modal-buttons {
                grid-template-columns: 1fr;
            }
        }
    </style>

</head>

<body>
    <!-- Header -->
    <header>
        <div class="header-container">
            <a href="{{ route('dashboard') }}" class="logo-section">
                <div class="logo-icon">SK</div>
                <div style="font-size: 1.5rem; font-weight: bold;">SkillLink UNAB</div>
            </a>
            <div class="nav-right">
                <ul class="nav-links">
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('mentors') }}">Mentores</a></li>
                    <li><a href="{{ route('profile') }}">Perfil</a></li>
                </ul>
                <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                    @csrf
                    <button type="submit" class="logout-btn">Cerrar Sesión</button>
                </form>
            </div>
        </div>
    </header>

    <!-- Main content -->
    <div class="main-container">

        <div class="breadcrumb">
            <a href="{{ route('dashboard') }}"
                style="color: #0051a5; text-decoration: none; font-weight: 500;">Dashboard</a> / <span>Buscar
                Mentores</span>
        </div>

        <h1 class="page-title">👨‍🏫 Buscar Mentores</h1>
        <p class="page-subtitle">Encuentra el mentor perfecto para tus necesidades académicas</p>

        @if (count($mentors) > 0)
            <div class="mentors-grid">
                @foreach ($mentors as $mentor)
                    <div class="mentor-card">
                        <span class="mentor-type-badge">
                            @if (str_contains($mentor->user->email, '@unab.edu.co') && $mentor->program === 'Facultad de Ingeniería')
                                Profesora UNAB
                            @else
                                Estudiante - {{ rand(8, 9) }}° Semestre
                            @endif
                        </span>

                        <div class="mentor-avatar">👨‍🏫</div>

                        <div class="mentor-name">{{ $mentor->user->name }}</div>
                        <div class="mentor-specialty">{{ $mentor->program }}</div>
                        <div class="mentor-career">
                            ⭐ {{ number_format($mentor->average_rating, 1) }} | {{ $mentor->total_sessions }} tutorías
                        </div>

                        @if ($mentor->subjects->count() > 0)
                            <div class="mentor-subjects">
                                @foreach ($mentor->subjects as $subject)
                                    <span class="subject-tag">{{ $subject->name }}</span>
                                @endforeach
                            </div>
                        @endif

                        <button class="mentor-button"
                            onclick="openBookingModal({{ $mentor->id }}, '{{ $mentor->user->name }}')">
                            📅 Solicitar Tutoría
                        </button>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <div style="font-size: 3rem; margin-bottom: 1rem;">🔍</div>
                <p>No hay mentores disponibles en este momento</p>
            </div>
        @endif
    </div>

    <!-- Modal para agendar -->
    <div id="bookingModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">📅 Agendar Tutoría</div>

            <form id="bookingForm" onsubmit="submitBooking(event)">
                @csrf

                <input type="hidden" id="mentor_id" name="mentor_id">

                <div class="form-group">
                    <label>Mentor</label>
                    <input type="text" id="mentor_name" readonly style="background: #f0f0f0;">
                </div>

                <div class="form-group">
                    <label for="subject_id">Materia *</label>
                    <select id="subject_id" name="subject_id" required>
                        <option value="">Selecciona una materia</option>
                        @foreach ($mentors as $mentor)
                            @foreach ($mentor->subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="scheduled_at">Fecha y Hora *</label>
                    <input type="datetime-local" id="scheduled_at" name="scheduled_at" required>
                </div>

                <div class="form-group">
                    <label for="duration">Duración (minutos) *</label>
                    <select id="duration" name="duration" required>
                        <option value="">Selecciona duración</option>
                        <option value="30">30 minutos</option>
                        <option value="60">1 hora</option>
                        <option value="90">1.5 horas</option>
                        <option value="120">2 horas</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="type">Tipo de Sesión *</label>
                    <select id="type" name="type" required>
                        <option value="">Selecciona tipo</option>
                        <option value="virtual">Virtual</option>
                        <option value="presencial">Presencial</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="notes">Notas (opcional)</label>
                    <textarea id="notes" name="notes" placeholder="Cuéntale al mentor qué necesitas..."></textarea>
                </div>

                <div class="modal-buttons">
                    <button type="button" class="btn btn-secondary" onclick="closeBookingModal()">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Agendar</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openBookingModal(mentorId, mentorName) {
            document.getElementById('mentor_id').value = mentorId;
            document.getElementById('mentor_name').value = mentorName;
            document.getElementById('bookingModal').classList.add('active');
        }

        function closeBookingModal() {
            document.getElementById('bookingModal').classList.remove('active');
        }

        async function submitBooking(event) {
            event.preventDefault();

            const formData = new FormData(document.getElementById('bookingForm'));

            try {
                const response = await fetch('{{ route('session.store') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content || document
                            .querySelector('input[name="_token"]').value,
                        'Accept': 'application/json'
                    },
                    body: formData
                });

                const data = await response.json();

                if (response.ok) {
                    alert('✅ ¡Tutoría agendada exitosamente!');
                    closeBookingModal();
                    setTimeout(() => {
                        window.location.href = '{{ route('sessions') }}';
                    }, 1000);
                } else {
                    alert('❌ Error: ' + (data.message || 'No se pudo agendar la tutoría'));
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Error al conectar con el servidor');
            }
        }

        // Cerrar modal al hacer clic fuera
        window.onclick = function(event) {
            const modal = document.getElementById('bookingModal');
            if (event.target == modal) {
                closeBookingModal();
            }
        }
    </script>

</body>

</html>

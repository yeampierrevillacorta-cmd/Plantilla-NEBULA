<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEBULA - Portal Espacial Profundo</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #000000 0%, #0a0a0a 25%, #1a1a1a 50%, #0f0f0f 75%, #000000 100%);
            color: #ffffff;
            overflow-x: hidden;
            min-height: 100vh;
            position: relative;
            cursor: none;
        }

        /* Cursor black and white con toques morados */
        .web3-cursor {
            position: fixed;
            width: 24px;
            height: 24px;
            background: linear-gradient(45deg, #ffffff, #8b00ff);
            border: 2px solid #000000;
            border-radius: 50%;
            pointer-events: none;
            z-index: 9999;
            transition: all 0.2s ease;
            box-shadow: 0 0 20px rgba(139, 0, 255, 0.5);
        }

        .web3-cursor::before {
            content: '';
            position: absolute;
            top: -8px;
            left: -8px;
            right: -8px;
            bottom: -8px;
            border: 1px solid rgba(139, 0, 255, 0.3);
            border-radius: 50%;
            animation: web3-cursor-pulse 2s ease-in-out infinite;
        }

        @keyframes web3-cursor-pulse {
            0%, 100% { transform: scale(1); opacity: 0.3; }
            50% { transform: scale(1.2); opacity: 0.6; }
        }

        /* Fondo black and white punteado espacial */
        .web3-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -4;
            background: 
                radial-gradient(circle at 25% 25%, #ffffff 1px, transparent 1px),
                radial-gradient(circle at 75% 75%, #ffffff 1px, transparent 1px),
                radial-gradient(circle at 50% 50%, #ffffff 1px, transparent 1px),
                linear-gradient(135deg, #000000 0%, #1a1a1a 25%, #000000 50%, #1a1a1a 75%, #000000 100%);
            background-size: 50px 50px, 75px 75px, 100px 100px, 100% 100%;
            background-position: 0 0, 25px 25px, 50px 50px, 0 0;
        }

        .blackhole-image {
            position: fixed;
            top: 50%;
            left: 50%;
            width: 500px;
            height: 500px;
            background-image: url('https://telescopioschile.cl/wp-content/uploads/2021/02/todo-sobre-agujeros-negros.jpg');
            background-size: cover;
            background-position: center;
            border-radius: 50%;
            transform: translate(-50%, -50%);
            z-index: -3;
            opacity: 0.4;
            filter: blur(2px) brightness(0.7);
            animation: blackhole-float 10s ease-in-out infinite;
            box-shadow: 
                0 0 100px rgba(0, 0, 0, 0.8),
                inset 0 0 50px rgba(0, 0, 0, 0.9);
        }

        @keyframes blackhole-float {
            0%, 100% { transform: translate(-50%, -50%) scale(1); }
            50% { transform: translate(-50%, -50%) scale(1.05); }
        }

        /* Estrellas black and white con toques morados */
        .web3-stars {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -2;
            background: 
                radial-gradient(1px 1px at 20px 30px, #ffffff, transparent),
                radial-gradient(1px 1px at 40px 70px, rgba(255, 255, 255, 0.8), transparent),
                radial-gradient(1px 1px at 90px 40px, #8b00ff, transparent),
                radial-gradient(1px 1px at 130px 80px, rgba(139, 0, 255, 0.6), transparent),
                radial-gradient(1px 1px at 160px 30px, #ffffff, transparent),
                radial-gradient(1px 1px at 200px 60px, rgba(255, 255, 255, 0.4), transparent),
                radial-gradient(1px 1px at 240px 20px, #8b00ff, transparent),
                radial-gradient(1px 1px at 280px 90px, rgba(139, 0, 255, 0.7), transparent),
                radial-gradient(1px 1px at 320px 50px, #ffffff, transparent),
                radial-gradient(1px 1px at 360px 10px, rgba(255, 255, 255, 0.5), transparent);
            background-repeat: repeat;
            background-size: 400px 400px;
            animation: web3-twinkle 6s ease-in-out infinite alternate;
        }

        @keyframes web3-twinkle {
            0% { opacity: 0.6; }
            100% { opacity: 1; }
        }

        /* Efectos black and white con toques morados */
        .web3-effects {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background: 
                radial-gradient(ellipse at 20% 20%, rgba(255, 255, 255, 0.05) 0%, transparent 60%),
                radial-gradient(ellipse at 80% 80%, rgba(139, 0, 255, 0.08) 0%, transparent 60%),
                radial-gradient(ellipse at 40% 60%, rgba(255, 255, 255, 0.03) 0%, transparent 60%),
                radial-gradient(ellipse at 60% 20%, rgba(139, 0, 255, 0.06) 0%, transparent 60%);
            animation: web3-drift 30s ease-in-out infinite;
        }

        @keyframes web3-drift {
            0%, 100% { transform: translate(0, 0) scale(1); }
            25% { transform: translate(-20px, -10px) scale(1.05); }
            50% { transform: translate(10px, -20px) scale(0.95); }
            75% { transform: translate(-10px, 10px) scale(1.02); }
        }


        /* Partículas black and white con toques morados */
        .web3-particle {
            position: absolute;
            width: 3px;
            height: 3px;
            background: #ffffff;
            border-radius: 50%;
            animation: web3-float 15s infinite linear;
            box-shadow: 0 0 8px rgba(139, 0, 255, 0.6);
        }

        .web3-particle::before {
            content: '';
            position: absolute;
            top: -3px;
            left: -3px;
            right: -3px;
            bottom: -3px;
            background: radial-gradient(circle, rgba(139, 0, 255, 0.4) 0%, transparent 70%);
            border-radius: 50%;
            animation: web3-glow 4s ease-in-out infinite alternate;
        }

        @keyframes web3-float {
            0% { transform: translateY(100vh) translateX(0); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: translateY(-100vh) translateX(50px); opacity: 0; }
        }

        @keyframes web3-glow {
            0% { transform: scale(1); opacity: 0.4; }
            100% { transform: scale(1.5); opacity: 0.1; }
        }


        /* Contenedor principal */
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
            position: relative;
            z-index: 1;
        }

        /* Header */
        .header {
            text-align: center;
            padding: 60px 0;
            position: relative;
        }

        .header::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(0, 255, 136, 0.1) 0%, transparent 70%);
            border-radius: 50%;
            animation: pulse 3s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: translate(-50%, -50%) scale(1); opacity: 0.5; }
            50% { transform: translate(-50%, -50%) scale(1.2); opacity: 0.8; }
        }

        .web3-title {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 4.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, #ffffff 0%, #8b00ff 50%, #000000 100%);
            background-size: 200% 200%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: web3-gradient-shift 3s ease-in-out infinite;
            margin-bottom: 20px;
            position: relative;
            letter-spacing: -1px;
            line-height: 1.1;
        }

        @keyframes web3-gradient-shift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        .web3-title::before {
            content: '';
            position: absolute;
            top: -20px;
            left: -20px;
            right: -20px;
            bottom: -20px;
            background: radial-gradient(circle, rgba(139, 0, 255, 0.1) 0%, transparent 70%);
            border-radius: 20px;
            animation: web3-pulse 4s ease-in-out infinite;
        }

        @keyframes web3-pulse {
            0%, 100% { transform: scale(1); opacity: 0.2; }
            50% { transform: scale(1.1); opacity: 0.4; }
        }

        .web3-title::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 150px;
            height: 3px;
            background: linear-gradient(90deg, transparent, #ffffff, #8b00ff, transparent);
            animation: web3-scan 3s linear infinite;
            border-radius: 2px;
            box-shadow: 0 0 15px rgba(139, 0, 255, 0.6);
        }

        @keyframes web3-scan {
            0% { transform: translateX(-50%) translateX(-150px); }
            100% { transform: translateX(-50%) translateX(150px); }
        }

        .subtitle {
            font-size: 1.5rem;
            color: #ffffff;
            font-weight: 500;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-family: 'Inter', sans-serif;
            opacity: 0.9;
        }

        .profession {
            font-size: 1.2rem;
            color: #8b00ff;
            font-weight: 400;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-family: 'Inter', sans-serif;
            opacity: 0.8;
        }

        /* Secciones black and white con toques morados */
        .section {
            margin: 60px 0;
            padding: 40px;
            background: 
                linear-gradient(135deg, rgba(0, 0, 0, 0.8) 0%, rgba(255, 255, 255, 0.05) 50%, rgba(0, 0, 0, 0.9) 100%);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            backdrop-filter: blur(20px);
            position: relative;
            overflow: hidden;
            box-shadow: 
                0 8px 32px rgba(0, 0, 0, 0.6),
                inset 0 1px 0 rgba(139, 0, 255, 0.1);
            transition: all 0.3s ease;
        }

        .section:hover {
            transform: translateY(-5px);
            box-shadow: 
                0 16px 48px rgba(0, 0, 0, 0.8),
                inset 0 1px 0 rgba(139, 0, 255, 0.3);
            border-color: rgba(255, 255, 255, 0.4);
        }

        .section::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(139, 0, 255, 0.2), transparent);
            animation: web3-shine 4s ease-in-out infinite;
        }

        @keyframes web3-shine {
            0% { left: -100%; }
            50% { left: 100%; }
            100% { left: 100%; }
        }

        .section::after {
            content: '';
            position: absolute;
            top: -1px;
            left: -1px;
            right: -1px;
            bottom: -1px;
            background: linear-gradient(45deg, #ffffff, #8b00ff, #ffffff);
            border-radius: 17px;
            z-index: -1;
            animation: web3-border-glow 3s linear infinite;
        }

        @keyframes web3-border-glow {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .section-title {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 2.5rem;
            color: #ffffff;
            margin-bottom: 30px;
            text-align: center;
            position: relative;
            font-weight: 600;
            letter-spacing: -0.5px;
        }

        .section-title::before,
        .section-title::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 60px;
            height: 2px;
            background: linear-gradient(90deg, transparent, #ffffff, #8b00ff, transparent);
            border-radius: 1px;
        }

        .section-title::before {
            left: -100px;
        }

        .section-title::after {
            right: -100px;
        }

        .section-content {
            font-size: 1.3rem;
            line-height: 1.8;
            color: #cccccc;
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
        }

        /* Proyectos grid */
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .project-card {
            background: 
                linear-gradient(135deg, rgba(0, 0, 0, 0.7) 0%, rgba(255, 255, 255, 0.05) 50%, rgba(0, 0, 0, 0.8) 100%);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 12px;
            padding: 30px;
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 
                0 4px 20px rgba(0, 0, 0, 0.5),
                inset 0 1px 0 rgba(139, 0, 255, 0.1);
        }

        .project-card:hover {
            transform: translateY(-8px);
            border-color: rgba(139, 0, 255, 0.8);
            box-shadow: 
                0 12px 40px rgba(0, 0, 0, 0.7),
                inset 0 1px 0 rgba(139, 0, 255, 0.3);
        }

        .project-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #ffffff, #8b00ff, #ffffff);
            transform: scaleX(0);
            transition: transform 0.3s ease;
            border-radius: 12px 12px 0 0;
        }

        .project-card:hover::before {
            transform: scaleX(1);
        }

        .project-title {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1.5rem;
            color: #ffffff;
            margin-bottom: 15px;
            font-weight: 600;
            letter-spacing: -0.3px;
        }

        .project-description {
            color: #cccccc;
            font-size: 1.1rem;
            line-height: 1.6;
        }

        /* Botones góticos */
        .btn-gothic {
            display: inline-block;
            padding: 18px 35px;
            background: linear-gradient(45deg, #8b0000, #ff6b6b, #4a0000);
            background-size: 300% 300%;
            color: #ffffff;
            text-decoration: none;
            border-radius: 0;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 3px;
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            margin: 20px 10px;
            animation: gothic-button 4s ease-in-out infinite;
            clip-path: polygon(0 0, calc(100% - 10px) 0, 100% 10px, 100% 100%, 10px 100%, 0 calc(100% - 10px));
            border: 2px solid #ff6b6b;
        }

        @keyframes gothic-button {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        .btn-gothic::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.8s ease;
        }

        .btn-gothic:hover::before {
            left: 100%;
        }

        .btn-gothic:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 
                0 10px 30px rgba(139, 0, 255, 0.3),
                0 0 20px rgba(255, 255, 255, 0.4);
        }

        /* Contacto */
        .contact-info {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 40px;
            margin-top: 40px;
            flex-wrap: wrap;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 25px;
            background: rgba(10, 10, 15, 0.6);
            border: 2px solid rgba(139, 0, 0, 0.4);
            border-radius: 0;
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 0 20px rgba(139, 0, 0, 0.2);
            clip-path: polygon(0 0, calc(100% - 10px) 0, 100% 10px, 100% 100%, 10px 100%, 0 calc(100% - 10px));
        }

        .contact-item:hover {
            border-color: #8b00ff;
            transform: scale(1.05);
            box-shadow: 0 0 20px rgba(139, 0, 255, 0.3);
        }

        .contact-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(45deg, #ffffff, #8b00ff);
            border-radius: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #000000;
            font-weight: bold;
            box-shadow: 0 0 20px rgba(139, 0, 255, 0.6);
            clip-path: polygon(0 0, calc(100% - 5px) 0, 100% 5px, 100% 100%, 5px 100%, 0 calc(100% - 5px));
        }

        /* Elementos 3D flotantes */
        .floating-3d-element {
            position: fixed;
            width: 20px;
            height: 20px;
            background: linear-gradient(45deg, #8b0000, #ff6b6b);
            border-radius: 50%;
            z-index: 5;
            transform-style: preserve-3d;
            animation: float-3d 10s ease-in-out infinite;
            box-shadow: 0 0 20px rgba(139, 0, 0, 0.6);
        }




        /* Responsive */
        @media (max-width: 768px) {
            .nocturne-title {
                font-size: 3rem;
            }
            
            .section {
                padding: 20px;
                margin: 40px 0;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .section-title::before,
            .section-title::after {
                display: none;
            }
            
            .contact-info {
                flex-direction: column;
                gap: 20px;
            }
        }

        /* Efectos de carga */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 1s ease forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in:nth-child(1) { animation-delay: 0.1s; }
        .fade-in:nth-child(2) { animation-delay: 0.2s; }
        .fade-in:nth-child(3) { animation-delay: 0.3s; }
        .fade-in:nth-child(4) { animation-delay: 0.4s; }
    </style>
</head>
<body>
    <!-- Cursor Web3 personalizado -->
    <div class="web3-cursor" id="web3-cursor"></div>

    <!-- Fondo Web3 -->
    <div class="web3-background"></div>
    <div class="blackhole-image"></div>
    <div class="web3-stars"></div>
    <div class="web3-effects"></div>
    <div class="web3-particles-container" id="web3-particles"></div>


    <div class="container">
        <!-- Header -->
        <header class="header fade-in">
            <h1 class="web3-title">NEBULA</h1>
            <p class="subtitle">Web3 Black Hole Portal</p>
            <p class="profession">{{ $profesion }}</p>
        </header>

        <!-- Sobre Mí -->
        <section class="section fade-in">
            <h2 class="section-title">WEB3 IDENTITY</h2>
            <div class="section-content">
            <p>{{ $sobre_mi }}</p>
                <p style="margin-top: 20px; color: #00d4ff;">
                    Especializado en tecnologías Web3, blockchain y soluciones innovadoras para la exploración del metaverso.
                </p>
            </div>
        </section>

        <!-- Proyectos -->
        <section class="section fade-in">
            <h2 class="section-title">WEB3 PROJECTS</h2>
            <div class="projects-grid">
                <div class="project-card">
                    <h3 class="project-title">🔗 Blockchain Core</h3>
                    <p class="project-description">
                        Núcleo blockchain para la investigación de tecnologías descentralizadas y smart contracts.
                    </p>
                </div>
                <div class="project-card">
                    <h3 class="project-title">🌐 Metaverse Portal</h3>
                    <p class="project-description">
                        Plataforma de exploración del metaverso con tecnologías de realidad virtual y NFT.
                    </p>
                </div>
                <div class="project-card">
                    <h3 class="project-title">🛡️ DeFi Shield</h3>
                    <p class="project-description">
                        Sistema de defensa DeFi para proteger contra vulnerabilidades y ataques criptográficos.
                    </p>
                </div>
                <div class="project-card">
                    <h3 class="project-title">⭐ Web3 Network</h3>
                    <p class="project-description">
                        Red Web3 que conecta protocolos y aplicaciones descentralizadas a través de la blockchain.
                    </p>
                </div>
            </div>
            </section>

        <!-- Contacto -->
        <section class="section fade-in">
            <h2 class="section-title">WEB3 CONNECT</h2>
            <div class="section-content">
                <p>Iniciando protocolo de comunicación Web3...</p>
                <div class="contact-info">
                    <div class="contact-item">
                        <div class="contact-icon">🔗</div>
                        <span>nebula@web3.com</span>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">🌐</div>
                        <span>+1 234 567 8900</span>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">⭐</div>
                        <span>LinkedIn: nebula-web3</span>
                    </div>
                </div>
                <div style="margin-top: 30px;">
                    <a href="#" class="btn-gothic">Connect Wallet</a>
                    <a href="#" class="btn-gothic">Download Web3 Profile</a>
                </div>
            </div>
        </section>
    </div>

    <!-- Efectos Futuristas Avanzados -->
    <script src="{{ asset('js/futuristic-effects.js') }}"></script>
    
    <script>
        // Cursor Web3 personalizado
        const web3Cursor = document.getElementById('web3-cursor');
        document.addEventListener('mousemove', (e) => {
            web3Cursor.style.left = e.clientX + 'px';
            web3Cursor.style.top = e.clientY + 'px';
        });

        // Generar partículas Web3 flotantes
        function createWeb3Particles() {
            const particlesContainer = document.getElementById('web3-particles');
            const particleCount = 60;

            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.className = 'web3-particle';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.animationDelay = Math.random() * 15 + 's';
                particle.style.animationDuration = (Math.random() * 8 + 12) + 's';
                particle.style.width = (Math.random() * 3 + 2) + 'px';
                particle.style.height = particle.style.width;
                particlesContainer.appendChild(particle);
            }
        }


        // Efectos de teclado góticos
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                document.body.style.filter = 'hue-rotate(180deg) saturate(2) brightness(0.8)';
                setTimeout(() => {
                    document.body.style.filter = 'hue-rotate(0deg) saturate(1) brightness(1)';
                }, 500);
            }
        });

        // Inicializar efectos Web3
        document.addEventListener('DOMContentLoaded', function() {
            createWeb3Particles();
            
            // Efecto de escritura Web3 para el título
            const title = document.querySelector('.web3-title');
            const text = title.textContent;
            title.textContent = '';
            
            let i = 0;
            const typeWriter = setInterval(() => {
                title.textContent += text.charAt(i);
                i++;
                if (i > text.length) {
                    clearInterval(typeWriter);
                }
            }, 100);
        });

        // Efectos de hover Web3 para las tarjetas
        document.querySelectorAll('.project-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px)';
                this.style.boxShadow = '0 12px 40px rgba(0, 0, 0, 0.3), inset 0 1px 0 rgba(255, 255, 255, 0.2)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
                this.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.2), inset 0 1px 0 rgba(255, 255, 255, 0.1)';
            });
        });

        // Efecto de scroll suave
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Efecto de parallax gótico en el scroll
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const gothicNebula = document.querySelector('.gothic-nebula');
            const gothicArchitecture = document.querySelector('.gothic-architecture');
            const gothicArches = document.querySelector('.gothic-arches');
            const speed1 = scrolled * 0.2;
            const speed2 = scrolled * 0.4;
            const speed3 = scrolled * 0.6;
            
            if (gothicNebula) {
                gothicNebula.style.transform = `translateY(${speed1}px) rotate(${scrolled * 0.01}deg)`;
            }
            if (gothicArchitecture) {
                gothicArchitecture.style.transform = `translateY(${speed2}px) scale(${1 + scrolled * 0.0001})`;
            }
            if (gothicArches) {
                gothicArches.style.transform = `translateY(${speed3}px) rotate(${-scrolled * 0.005}deg)`;
            }
        });

        // Efecto de sombras góticas ocasionales
        function createGothicShadow() {
            const shadow = document.createElement('div');
            shadow.style.cssText = `
                position: fixed;
                width: 3px;
                height: 3px;
                background: radial-gradient(circle, #8b0000, #4a0000);
                border-radius: 50%;
                top: -10px;
                left: ${Math.random() * 100}%;
                z-index: 1000;
                animation: gothic-shadow-fall 3s linear forwards;
                box-shadow: 0 0 15px #8b0000;
            `;
            
            document.body.appendChild(shadow);
            
            setTimeout(() => shadow.remove(), 3000);
        }

        // Agregar CSS para sombras góticas
        const gothicShadowStyle = document.createElement('style');
        gothicShadowStyle.textContent = `
            @keyframes gothic-shadow-fall {
                0% { transform: translateY(-10px) translateX(0) rotate(0deg); opacity: 1; }
                100% { transform: translateY(100vh) translateX(150px) rotate(360deg); opacity: 0; }
            }
        `;
        document.head.appendChild(gothicShadowStyle);

        // Crear sombras góticas cada 3-8 segundos
        setInterval(createGothicShadow, Math.random() * 5000 + 3000);

        // Efecto de respiración gótica 3D en las secciones
        document.querySelectorAll('.section').forEach((section, index) => {
            setInterval(() => {
                const scale = 1 + Math.sin(Date.now() * 0.001 + index) * 0.01;
                section.style.transform = `scale(${scale})`;
            }, 50);
        });

        // Efecto del cursor Web3
        document.addEventListener('mousemove', (e) => {
            const cursor = document.getElementById('web3-cursor');
            cursor.style.transform = `translate(-50%, -50%)`;
        });

        // Efecto de parallax Web3 en el scroll
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const container = document.querySelector('.container');
            
            // Movimiento suave del contenedor basado en el scroll
            const translateY = scrolled * 0.1;
            
            container.style.transform = `translateY(${translateY}px)`;
        });
    </script>
</body>
</html>
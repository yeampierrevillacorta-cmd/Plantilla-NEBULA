<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEBULA - Black Hole Intro</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Cinzel:wght@400;500;600;700&family=Uncial+Antiqua&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: url('https://telescopioschile.cl/wp-content/uploads/2021/02/todo-sobre-agujeros-negros.jpg') center center fixed;
            background-size: cover;
            color: #ffffff;
            overflow: hidden;
            height: 100vh;
            position: relative;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0.85) 50%, rgba(0, 0, 0, 0.75) 100%);
            z-index: 0;
        }

        /* Fondo Web3 ultra oscuro */
        .web3-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                linear-gradient(135deg, #000000 0%, #0a0a0a 20%, #1a1a1a 40%, #0f0f0f 60%, #000000 80%, #000000 100%);
            z-index: 1;
        }

        /* Estrellas Web3 */
        .web3-stars {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(1px 1px at 20px 30px, #ffffff, transparent),
                radial-gradient(1px 1px at 40px 70px, rgba(255, 255, 255, 0.8), transparent),
                radial-gradient(1px 1px at 90px 40px, #e5e5e5, transparent),
                radial-gradient(1px 1px at 130px 80px, rgba(229, 229, 229, 0.6), transparent),
                radial-gradient(1px 1px at 160px 30px, #ffffff, transparent),
                radial-gradient(1px 1px at 200px 60px, rgba(255, 255, 255, 0.4), transparent),
                radial-gradient(1px 1px at 240px 20px, #e5e5e5, transparent),
                radial-gradient(1px 1px at 280px 90px, rgba(229, 229, 229, 0.7), transparent),
                radial-gradient(1px 1px at 320px 50px, #ffffff, transparent),
                radial-gradient(1px 1px at 360px 10px, rgba(255, 255, 255, 0.5), transparent);
            background-repeat: repeat;
            background-size: 400px 400px;
            animation: web3-twinkle 6s ease-in-out infinite alternate, star-drift 60s linear infinite;
            z-index: 2;
        }
        /* Capas adicionales de estrellas para parallax */
        .web3-stars.layer-slow {
            background-size: 600px 600px;
            opacity: 0.6;
            animation: web3-twinkle 8s ease-in-out infinite alternate, star-drift 120s linear infinite;
            z-index: 1;
        }

        .web3-stars.layer-fast {
            background-size: 250px 250px;
            opacity: 0.8;
            animation: web3-twinkle 5s ease-in-out infinite alternate, star-drift 40s linear infinite;
            z-index: 3;
        }

        @keyframes star-drift {
            0% { background-position: 0 0; }
            100% { background-position: -800px -800px; }
        }

        @keyframes web3-twinkle {
            0% { opacity: 0.6; }
            100% { opacity: 1; }
        }

        /* Efectos Web3 */
        .web3-effects {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(ellipse at 20% 20%, rgba(255, 255, 255, 0.08) 0%, transparent 60%),
                radial-gradient(ellipse at 80% 80%, rgba(229, 229, 229, 0.12) 0%, transparent 60%),
                radial-gradient(ellipse at 40% 60%, rgba(255, 255, 255, 0.06) 0%, transparent 60%),
                radial-gradient(ellipse at 60% 20%, rgba(229, 229, 229, 0.1) 0%, transparent 60%);
            animation: web3-drift 20s ease-in-out infinite;
            z-index: 3;
        }

        @keyframes web3-drift {
            0%, 100% { transform: translate(0, 0) scale(1); }
            25% { transform: translate(-20px, -10px) scale(1.05); }
            50% { transform: translate(10px, -20px) scale(0.95); }
            75% { transform: translate(-10px, 10px) scale(1.02); }
        }

        /* Agujero negro central con imagen real */
        .central-blackhole {
            position: fixed;
            top: 50%;
            left: 50%;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background-image: url('https://telescopioschile.cl/wp-content/uploads/2021/02/todo-sobre-agujeros-negros.jpg');
            background-size: cover;
            background-position: center;
            transform: translate(-50%, -50%);
            z-index: 4;
            animation: blackhole-pulse 8s ease-in-out infinite;
            box-shadow: 
                0 0 300px rgba(0, 0, 0, 0.9),
                inset 0 0 150px rgba(0, 0, 0, 0.95);
            filter: brightness(0.6) contrast(1.2);
        }

        .central-blackhole::before {
            content: '';
            position: absolute;
            top: -40px;
            left: -40px;
            right: -40px;
            bottom: -40px;
            border-radius: 50%;
            background: conic-gradient(from 0deg, transparent, rgba(255, 255, 255, 0.25), rgba(200, 200, 200, 0.2), transparent);
            animation: blackhole-rotation 4s linear infinite;
        }

        .central-blackhole::after {
            content: '';
            position: absolute;
            top: -80px;
            left: -80px;
            right: -80px;
            bottom: -80px;
            border-radius: 50%;
            background: radial-gradient(circle, transparent 60%, rgba(255, 255, 255, 0.15) 80%, transparent 100%);
            animation: blackhole-glow 5s ease-in-out infinite;
        }

        @keyframes blackhole-pulse {
            0%, 100% { transform: translate(-50%, -50%) scale(1); }
            50% { transform: translate(-50%, -50%) scale(1.15); }
        }

        @keyframes blackhole-rotation {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes blackhole-glow {
            0%, 100% { opacity: 0.2; }
            50% { opacity: 0.5; }
        }

        /* Contenedor principal */
        .intro-container {
            position: relative;
            z-index: 10;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        /* Título principal Web3 */
        .main-title {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 5.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, #000000 0%, #808080 50%, #ffffff 100%);
            background-size: 200% 200%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: web3-title-shift 3s ease-in-out infinite;
            margin-bottom: 30px;
            letter-spacing: -1px;
            opacity: 0;
            transform: scale(0.5);
            animation: title-entrance 2s ease-out 1s forwards, web3-title-shift 3s ease-in-out 3s infinite;
        }

        @keyframes title-entrance {
            0% { opacity: 0; transform: scale(0.5); }
            100% { opacity: 1; transform: scale(1); }
        }

        @keyframes web3-title-shift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        /* Subtítulo */
        .subtitle {
            font-family: 'Inter', sans-serif;
            font-size: 1.8rem;
            color: #e5e5e5;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 20px;
            opacity: 0;
            transform: translateY(50px);
            animation: subtitle-entrance 1.5s ease-out 2.5s forwards;
        }

        @keyframes subtitle-entrance {
            0% { opacity: 0; transform: translateY(50px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        /* Barra de progreso */
        .progress-bar {
            width: 300px;
            height: 4px;
            background: rgba(0, 0, 0, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 2px;
            margin-top: 40px;
            overflow: hidden;
            opacity: 0;
            animation: progress-entrance 1s ease-out 4s forwards;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #000000, #808080, #ffffff);
            width: 0%;
            animation: progress-fill 3s ease-in-out 4.5s forwards;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.5);
        }

        @keyframes progress-entrance {
            0% { opacity: 0; transform: scaleX(0); }
            100% { opacity: 1; transform: scaleX(1); }
        }

        @keyframes progress-fill {
            0% { width: 0%; }
            100% { width: 100%; }
        }

        /* Partículas de explosión Web3 */
        .explosion-particle {
            position: absolute;
            width: 3px;
            height: 3px;
            background: #ffffff;
            border-radius: 50%;
            pointer-events: none;
            z-index: 5;
            box-shadow: 0 0 8px rgba(255, 255, 255, 0.8);
        }

        /* Efecto de explosión Web3 */
        .explosion {
            position: fixed;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.6) 0%, transparent 70%);
            transform: translate(-50%, -50%);
            z-index: 8;
            animation: explosion-effect 1s ease-out 6s forwards;
        }

        @keyframes explosion-effect {
            0% { width: 0; height: 0; opacity: 1; }
            100% { width: 2000px; height: 2000px; opacity: 0; }
        }

        /* Efecto de transición */
        .transition-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #000000;
            z-index: 20;
            opacity: 0;
            animation: transition-fade 1s ease-in 7s forwards;
        }

        @keyframes transition-fade {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        /* Efectos de movimiento espacial */
        .space-object {
            position: absolute;
            width: 2px;
            height: 2px;
            background: #e5e5e5;
            border-radius: 50%;
            animation: space-movement 8s linear infinite;
            box-shadow: 0 0 4px rgba(255, 255, 255, 0.6);
        }
        /* Cometas */
        .comet {
            position: absolute;
            width: 2px;
            height: 2px;
            background: #ffffff;
            box-shadow: 0 0 8px rgba(255, 255, 255, 0.8);
            border-radius: 50%;
            opacity: 0.9;
        }

        .comet::after {
            content: '';
            position: absolute;
            top: 50%;
            left: -120px;
            width: 120px;
            height: 2px;
            transform: translateY(-50%);
            background: linear-gradient(90deg, rgba(255,255,255,0), rgba(255,255,255,0.7));
            filter: blur(1px);
        }

        @keyframes comet-flight {
            0% { transform: translate(120vw, -10vh) rotate(0deg); opacity: 0; }
            5% { opacity: 1; }
            100% { transform: translate(-20vw, 110vh) rotate(0deg); opacity: 0; }
        }

        /* Órbitas alrededor del agujero negro */
        .orbit {
            position: fixed;
            top: 50%;
            left: 50%;
            border: 1px dashed rgba(255, 255, 255, 0.15);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            pointer-events: none;
        }

        .orbit .satellite {
            position: absolute;
            width: 4px;
            height: 4px;
            background: #ffffff;
            border-radius: 50%;
            box-shadow: 0 0 6px rgba(255, 255, 255, 0.7);
        }

        @keyframes orbit-rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        @keyframes space-movement {
            0% { transform: translateX(-100px) translateY(100vh) rotate(0deg); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: translateX(100vw) translateY(-100px) rotate(360deg); opacity: 0; }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .main-title {
                font-size: 4rem;
            }
            .subtitle {
                font-size: 1.5rem;
            }
            .progress-bar {
                width: 250px;
            }
        }
    </style>
</head>
<body>
    <script>
        // Marcar inmediatamente que venimos de la intro para evitar rebotes desde /tech
        try { sessionStorage.setItem('cameFromIntro', 'true'); } catch (e) {}
    </script>
    <!-- Fondos black hole -->
    <div class="web3-bg"></div>
    <div class="web3-stars layer-slow"></div>
    <div class="web3-stars"></div>
    <div class="web3-stars layer-fast"></div>

    <!-- Estela de cursor -->
    <script>
        (function() {
            const trail = [];
            const maxDots = 14;
            for (let i = 0; i < maxDots; i++) {
                const dot = document.createElement('div');
                dot.style.cssText = `position:fixed;width:5px;height:5px;border-radius:50%;pointer-events:none;background:#fff;opacity:${0.9 - i*0.05};box-shadow:-8px 0 14px rgba(255,255,255,0.22);filter:blur(0.2px);`;
                document.body.appendChild(dot);
                trail.push({ el: dot, x: 0, y: 0 });
            }
            let mouseX = innerWidth/2, mouseY = innerHeight/2;
            addEventListener('mousemove', (e) => { mouseX = e.clientX; mouseY = e.clientY; });
            function animate() {
                trail[0].x += (mouseX - trail[0].x) * 0.3;
                trail[0].y += (mouseY - trail[0].y) * 0.3;
                trail[0].el.style.transform = `translate(${trail[0].x - 2.5}px, ${trail[0].y - 2.5}px)`;
                for (let i = 1; i < trail.length; i++) {
                    trail[i].x += (trail[i-1].x - trail[i].x) * 0.25;
                    trail[i].y += (trail[i-1].y - trail[i].y) * 0.25;
                    trail[i].el.style.transform = `translate(${trail[i].x - 2.5}px, ${trail[i].y - 2.5}px)`;
                }
                requestAnimationFrame(animate);
            }
            requestAnimationFrame(animate);
        })();
    </script>
    <div class="web3-effects"></div>
    
    <!-- Agujero negro central con imagen real -->
    <div class="central-blackhole"></div>

    <!-- Objetos espaciales -->
    <div id="space-objects"></div>

    <!-- Órbitas -->
    <div class="orbit" style="width: 500px; height: 500px; animation: orbit-rotate 22s linear infinite;">
        <div class="satellite" style="top: -2px; left: 50%; transform: translateX(-50%);"></div>
    </div>
    <div class="orbit" style="width: 700px; height: 700px; animation: orbit-rotate 36s linear infinite; animation-direction: reverse;">
        <div class="satellite" style="left: -2px; top: 50%; transform: translateY(-50%);"></div>
    </div>

    <!-- Contenedor principal -->
    <div class="intro-container">
            <h1 class="main-title">NEBULA</h1>
            <p class="subtitle">Web3 Black Hole Portal</p>
        <div class="progress-bar">
            <div class="progress-fill"></div>
        </div>
    </div>

    <!-- Efecto de explosión -->
    <div class="explosion"></div>

    <!-- Partículas de explosión -->
    <div id="explosion-particles"></div>

    <!-- Overlay de transición -->
    <div class="transition-overlay"></div>

    <!-- Efectos avanzados -->
    <script src="{{ asset('js/intro-effects.js') }}"></script>

    <script>
        // Crear objetos espaciales Web3
        function createSpaceObjects() {
            const container = document.getElementById('space-objects');
            const objectCount = 90;

            for (let i = 0; i < objectCount; i++) {
                const obj = document.createElement('div');
                obj.className = 'space-object';
                obj.style.left = Math.random() * 100 + '%';
                obj.style.animationDelay = Math.random() * 8 + 's';
                obj.style.animationDuration = (Math.random() * 4 + 6) + 's';
                obj.style.width = (Math.random() * 3 + 1) + 'px';
                obj.style.height = obj.style.width;
                obj.style.background = '#00d4ff';
                obj.style.boxShadow = '0 0 10px rgba(0, 212, 255, 0.6)';
                container.appendChild(obj);
            }
        }

        // Crear cometas
        function createComets() {
            const container = document.body;
            for (let i = 0; i < 6; i++) {
                const comet = document.createElement('div');
                comet.className = 'comet';
                comet.style.top = Math.random() * 80 + 'vh';
                comet.style.left = Math.random() * 100 + 'vw';
                comet.style.animation = `comet-flight ${8 + Math.random() * 6}s linear ${Math.random() * 6}s infinite`;
                container.appendChild(comet);
            }
        }

        // Crear partículas de explosión
        function createExplosionParticles() {
            const container = document.getElementById('explosion-particles');
            const particleCount = 100;

            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.className = 'explosion-particle';
                particle.style.left = '50%';
                particle.style.top = '50%';
                particle.style.animationDelay = Math.random() * 0.5 + 's';
                particle.style.animation = `explosion-particle-${i} 2s ease-out 6s forwards`;
                container.appendChild(particle);

                // Crear animación CSS dinámica para cada partícula
                const style = document.createElement('style');
                const angle = (360 / particleCount) * i;
                const distance = Math.random() * 300 + 100;
                const endX = Math.cos(angle * Math.PI / 180) * distance;
                const endY = Math.sin(angle * Math.PI / 180) * distance;

                style.textContent = `
                    @keyframes explosion-particle-${i} {
                        0% { 
                            transform: translate(-50%, -50%) scale(0); 
                            opacity: 1; 
                        }
                        100% { 
                            transform: translate(-50%, -50%) translate(${endX}px, ${endY}px) scale(1); 
                            opacity: 0; 
                        }
                    }
                `;
                document.head.appendChild(style);
            }
        }

        // Efecto de sonido visual (ondas)
        function createSoundWaves() {
            const container = document.getElementById('space-objects');
            const waveCount = 5;

            for (let i = 0; i < waveCount; i++) {
                const wave = document.createElement('div');
                wave.style.cssText = `
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    width: 0;
                    height: 0;
                    border: 2px solid rgba(139, 0, 255, 0.3);
                    border-radius: 50%;
                    transform: translate(-50%, -50%);
                    animation: sound-wave 2s ease-out ${5 + i * 0.2}s forwards;
                `;
                container.appendChild(wave);
            }

            // Agregar CSS para ondas de sonido
            const waveStyle = document.createElement('style');
            waveStyle.textContent = `
                @keyframes sound-wave {
                    0% { width: 0; height: 0; opacity: 1; }
                    100% { width: 800px; height: 800px; opacity: 0; }
                }
            `;
            document.head.appendChild(waveStyle);
        }

        // Inicializar efectos
        document.addEventListener('DOMContentLoaded', function() {
            createSpaceObjects();
            createExplosionParticles();
            createSoundWaves();
            createComets();

            // Bandera para permitir /tech sin rebotar a intro en la primera carga
            try { sessionStorage.setItem('cameFromIntro', 'true'); } catch (e) {}

            // Redirigir a la página de presentación después de la animación
            setTimeout(() => {
                window.location.href = '/tech';
            }, 8000); // 8 segundos total
        });

        // Efecto de teclado para saltar la intro
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                try { sessionStorage.setItem('cameFromIntro', 'true'); } catch (err) {}
                window.location.href = '/tech';
            }
        });
    </script>
</body>
</html>

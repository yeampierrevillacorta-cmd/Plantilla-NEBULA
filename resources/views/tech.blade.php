<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEBULA - Tech Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'dark-gray': '#1a1a1a',
                        'darker-gray': '#0a0a0a',
                        'darkest-gray': '#050505',
                        'light-gray': '#e5e5e5',
                        'medium-gray': '#808080',
                    },
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
                        'space': ['Space Grotesk', 'sans-serif'],
                    },
                    animation: {
                        'glow': 'glow 2s ease-in-out infinite alternate',
                        'float': 'float 6s ease-in-out infinite',
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'bounce-slow': 'bounce 3s infinite',
                    },
                    keyframes: {
                        glow: {
                            '0%': { 'box-shadow': '0 0 20px #000000, 0 0 30px #000000, 0 0 40px #000000' },
                            '100%': { 'box-shadow': '0 0 30px #ffffff, 0 0 40px #ffffff, 0 0 50px #ffffff' }
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-20px)' }
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: url('https://telescopioschile.cl/wp-content/uploads/2021/02/todo-sobre-agujeros-negros.jpg') center center fixed;
            background-size: cover;
            min-height: 100vh;
        }
        
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0.8) 50%, rgba(0, 0, 0, 0.7) 100%);
            z-index: -1;
        }
        
        .circuit-pattern {
            background-image: 
                linear-gradient(90deg, rgba(255, 255, 255, 0.1) 1px, transparent 1px),
                linear-gradient(180deg, rgba(255, 255, 255, 0.1) 1px, transparent 1px);
            background-size: 50px 50px;
        }
        
        .neon-glow {
            box-shadow: 
                0 0 5px currentColor,
                0 0 10px currentColor,
                0 0 15px currentColor,
                0 0 20px currentColor;
        }
        
        .neon-text {
            text-shadow: 
                0 0 5px currentColor,
                0 0 10px currentColor,
                0 0 15px currentColor,
                0 0 20px currentColor;
        }
        /* Estela de texto (black & white) */
        .trail-text {
            position: relative;
            animation: text-trail 2.2s ease-in-out infinite;
            text-shadow:
                0 0 0 rgba(255,255,255,0.0),
                -4px 0 8px rgba(255,255,255,0.08),
                -8px 0 14px rgba(255,255,255,0.06);
        }
        @keyframes text-trail {
            0%,100% { text-shadow: -2px 0 6px rgba(255,255,255,0.06), -6px 0 12px rgba(255,255,255,0.05); }
            50% { text-shadow: -8px 0 16px rgba(255,255,255,0.10), -14px 0 24px rgba(255,255,255,0.07); }
        }
        
        .tech-border {
            position: relative;
        }
        
        .tech-border::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border: 2px solid transparent;
            background: linear-gradient(45deg, #000000, #808080, #ffffff, #000000) border-box;
            border-radius: inherit;
            mask: linear-gradient(#fff 0 0) padding-box, linear-gradient(#fff 0 0);
            mask-composite: exclude;
            animation: glow 3s ease-in-out infinite alternate;
        }
        /* Estela en cards al hover */
        .card-trail { position: relative; overflow: hidden; }
        .card-trail::after {
            content: '';
            position: absolute;
            top: 0; bottom: 0; left: -120%; width: 40%;
            background: linear-gradient(90deg, rgba(255,255,255,0), rgba(255,255,255,0.12), rgba(255,255,255,0));
            filter: blur(6px);
            transform: skewX(-20deg);
        }
        .card-trail:hover::after { animation: sweep 1.2s ease-out forwards; }
        @keyframes sweep { to { left: 140%; } }
        
        /* Starfield animado */
        #starfield { position: fixed; inset: 0; overflow: hidden; }
        .star { position: absolute; width: 2px; height: 2px; background: #ffffff; border-radius: 50%; opacity: 0.9; }
        .star.s { width: 1px; height: 1px; opacity: 0.6; }
        .star.l { width: 3px; height: 3px; opacity: 1; box-shadow: 0 0 6px rgba(255,255,255,0.8); }
        .star::after {
            content: '';
            position: absolute; right: 100%; top: 50%; height: 2px; width: 24px;
            transform: translateY(-50%);
            background: linear-gradient(90deg, rgba(255,255,255,0.25), rgba(255,255,255,0));
            filter: blur(1px);
            opacity: 0.7;
        }
        .star.s::after { height: 1px; width: 14px; opacity: 0.4; }
        .star.l::after { height: 3px; width: 36px; opacity: 0.9; filter: blur(1.5px); }

        /* Estela del cursor */
        .cursor-trail {
            position: fixed; width: 6px; height: 6px; border-radius: 50%;
            pointer-events: none; background: #ffffff; opacity: 0.9;
            box-shadow: -10px 0 16px rgba(255,255,255,0.22), -22px 0 24px rgba(255,255,255,0.15);
            filter: blur(0.2px);
            transition: transform 0.1s linear;
        }
    </style>
</head>
<body class="text-white overflow-x-hidden">
    <script>
        (function() {
            try {
                const cameFromIntro = sessionStorage.getItem('cameFromIntro') === 'true';
                const allowDirectTech = sessionStorage.getItem('allowDirectTech') === 'true';
                const ref = document.referrer ? new URL(document.referrer) : null;
                const fromIntroRef = ref && ref.pathname === '/intro';

                if (cameFromIntro || allowDirectTech || fromIntroRef) {
                    if (cameFromIntro) {
                        sessionStorage.removeItem('cameFromIntro');
                        sessionStorage.setItem('allowDirectTech', 'true');
                    }
                    return;
                }

                if (!sessionStorage.getItem('hasVisitedTech')) {
                    sessionStorage.setItem('hasVisitedTech', 'true');
                    window.location.replace('/intro');
                    return;
                }
            } catch (e) {
                // Si Storage falla, no redirigir para evitar bucles
            }
        })();

        // Starfield animado (inicializa cuando el DOM está disponible)
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('starfield');
            if (!container) return;
            const numStars = 200;
            const stars = [];
            for (let i = 0; i < numStars; i++) {
                const star = document.createElement('div');
                star.className = 'star';
                if (Math.random() < 0.6) star.classList.add('s');
                if (Math.random() > 0.9) star.classList.add('l');
                star.style.left = Math.random() * 100 + 'vw';
                star.style.top = Math.random() * 100 + 'vh';
                const speed = 0.1 + Math.random() * 0.7;
                const dirX = -0.3 - Math.random() * 0.7;
                const dirY = 0.1 - Math.random() * 0.2;
                stars.push({ el: star, x: parseFloat(star.style.left), y: parseFloat(star.style.top), speed, dirX, dirY });
                container.appendChild(star);
            }

            function tick() {
                stars.forEach(s => {
                    s.x += s.dirX * s.speed;
                    s.y += s.dirY * s.speed;
                    if (s.x < -2) { s.x = 102; s.y = Math.random() * 100; }
                    if (s.y < -2) s.y = 102; if (s.y > 102) s.y = -2;
                    s.el.style.transform = `translate(${s.x}vw, ${s.y}vh)`;
                });
                requestAnimationFrame(tick);
            }
            requestAnimationFrame(tick);
        });

        // Estela del cursor
        (function() {
            const trail = [];
            const maxDots = 16;
            for (let i = 0; i < maxDots; i++) {
                const dot = document.createElement('div');
                dot.className = 'cursor-trail';
                dot.style.opacity = String(0.9 - i * (0.9 / maxDots));
                document.body.appendChild(dot);
                trail.push({ el: dot, x: 0, y: 0 });
            }
            let mouseX = window.innerWidth / 2, mouseY = window.innerHeight / 2;
            window.addEventListener('mousemove', (e) => { mouseX = e.clientX; mouseY = e.clientY; });
            function animate() {
                trail[0].x += (mouseX - trail[0].x) * 0.3;
                trail[0].y += (mouseY - trail[0].y) * 0.3;
                trail[0].el.style.transform = `translate(${trail[0].x - 3}px, ${trail[0].y - 3}px)`;
                for (let i = 1; i < trail.length; i++) {
                    trail[i].x += (trail[i-1].x - trail[i].x) * 0.25;
                    trail[i].y += (trail[i-1].y - trail[i].y) * 0.25;
                    trail[i].el.style.transform = `translate(${trail[i].x - 3}px, ${trail[i].y - 3}px)`;
                }
                requestAnimationFrame(animate);
            }
            requestAnimationFrame(animate);
        })();
    </script>
    
    <!-- Partículas de fondo -->
    <div class="fixed inset-0 pointer-events-none z-0" id="starfield"></div>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center circuit-pattern">
        <div class="absolute inset-0 bg-gradient-to-br from-transparent via-black/20 to-black/30"></div>
        
        <div class="relative z-10 max-w-6xl mx-auto px-6 text-center">
            <!-- Título principal -->
            <h1 class="text-6xl md:text-8xl font-space font-bold mb-6 trail-text">
                <span class="bg-gradient-to-r from-black via-gray-600 to-white bg-clip-text text-transparent neon-text">
                    NEBULA
                </span>
            </h1>
            
            <!-- Subtítulo -->
            <p class="text-xl md:text-2xl text-gray-300 mb-8 max-w-3xl mx-auto leading-relaxed">
                Desarrollador Full-Stack especializado en tecnologías de vanguardia, 
                creando soluciones digitales que conectan el presente con el futuro.
            </p>
            
            <!-- Botón CTA -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <button class="group relative px-8 py-4 bg-gradient-to-r from-black to-gray-600 rounded-lg font-semibold text-lg transition-all duration-300 hover:scale-105 neon-glow">
                    <span class="relative z-10">Explorar Proyectos</span>
                    <div class="absolute inset-0 bg-gradient-to-r from-gray-600 to-white rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </button>
                
                <button class="group px-8 py-4 border-2 border-white rounded-lg font-semibold text-lg transition-all duration-300 hover:bg-white/10 hover:border-gray-400">
                    <span class="text-white group-hover:text-gray-300 transition-colors duration-300">Ver Portafolio</span>
                </button>
            </div>
            
            <!-- Indicador de scroll -->
            <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce-slow">
                <div class="w-6 h-10 border-2 border-white rounded-full flex justify-center">
                    <div class="w-1 h-3 bg-white rounded-full mt-2 animate-pulse"></div>
                </div>
            </div>
        </div>
        
        <!-- Elementos decorativos -->
        <div class="absolute top-20 left-10 w-20 h-20 border border-white/30 rounded-full animate-pulse-slow"></div>
        <div class="absolute top-40 right-20 w-16 h-16 border border-gray-400/30 rounded-full animate-pulse-slow" style="animation-delay: 1s;"></div>
        <div class="absolute bottom-40 left-20 w-12 h-12 border border-gray-600/30 rounded-full animate-pulse-slow" style="animation-delay: 2s;"></div>
    </section>

    <!-- Sección de Servicios/Habilidades -->
    <section class="py-20 relative">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-space font-bold mb-6">
                    <span class="bg-gradient-to-r from-black to-white bg-clip-text text-transparent">
                        Servicios & Habilidades
                    </span>
                </h2>
                <p class="text-xl text-gray-400 max-w-3xl mx-auto">
                    Tecnologías y servicios que impulso para crear experiencias digitales excepcionales
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="group relative bg-dark-gray/50 backdrop-blur-sm border border-white/20 rounded-xl p-8 hover:border-white/50 transition-all duration-300 hover:scale-105 card-trail">
                    <div class="absolute inset-0 bg-gradient-to-br from-white/5 to-transparent rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-gradient-to-br from-black to-gray-600 rounded-lg flex items-center justify-center mb-6 group-hover:animate-glow">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-semibold mb-4 text-white group-hover:text-gray-300 transition-colors duration-300">
                            Desarrollo Web
                        </h3>
                        <p class="text-gray-400 leading-relaxed">
                            Aplicaciones web modernas con React, Vue.js, Laravel y Node.js. 
                            Diseño responsive y optimización de rendimiento.
                        </p>
                    </div>
                </div>
                
                <!-- Card 2 -->
                <div class="group relative bg-dark-gray/50 backdrop-blur-sm border border-gray-400/20 rounded-xl p-8 hover:border-gray-400/50 transition-all duration-300 hover:scale-105 card-trail">
                    <div class="absolute inset-0 bg-gradient-to-br from-gray-400/5 to-transparent rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-gradient-to-br from-gray-600 to-gray-400 rounded-lg flex items-center justify-center mb-6 group-hover:animate-glow">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-semibold mb-4 text-gray-300 group-hover:text-gray-100 transition-colors duration-300">
                            Apps Móviles
                        </h3>
                        <p class="text-gray-400 leading-relaxed">
                            Desarrollo de aplicaciones móviles nativas e híbridas con React Native, 
                            Flutter y tecnologías cross-platform.
                        </p>
                    </div>
                </div>
                
                <!-- Card 3 -->
                <div class="group relative bg-dark-gray/50 backdrop-blur-sm border border-gray-600/20 rounded-xl p-8 hover:border-gray-600/50 transition-all duration-300 hover:scale-105 card-trail">
                    <div class="absolute inset-0 bg-gradient-to-br from-gray-600/5 to-transparent rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-gradient-to-br from-gray-800 to-gray-600 rounded-lg flex items-center justify-center mb-6 group-hover:animate-glow">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-semibold mb-4 text-gray-400 group-hover:text-gray-200 transition-colors duration-300">
                            IA & Machine Learning
                        </h3>
                        <p class="text-gray-400 leading-relaxed">
                            Implementación de soluciones de inteligencia artificial, 
                            machine learning y automatización de procesos.
                        </p>
                    </div>
                </div>
                
                <!-- Card 4 -->
                <div class="group relative bg-dark-gray/50 backdrop-blur-sm border border-white/20 rounded-xl p-8 hover:border-white/50 transition-all duration-300 hover:scale-105 card-trail">
                    <div class="absolute inset-0 bg-gradient-to-br from-white/5 to-transparent rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-gradient-to-br from-black to-white rounded-lg flex items-center justify-center mb-6 group-hover:animate-glow">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-semibold mb-4 text-white group-hover:text-gray-300 transition-colors duration-300">
                            Cloud & DevOps
                        </h3>
                        <p class="text-gray-400 leading-relaxed">
                            Infraestructura en la nube, CI/CD, Docker, Kubernetes y 
                            automatización de despliegues.
                        </p>
                    </div>
                </div>
                
                <!-- Card 5 -->
                <div class="group relative bg-dark-gray/50 backdrop-blur-sm border border-gray-500/20 rounded-xl p-8 hover:border-gray-500/50 transition-all duration-300 hover:scale-105 card-trail">
                    <div class="absolute inset-0 bg-gradient-to-br from-gray-500/5 to-transparent rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-gradient-to-br from-gray-700 to-gray-500 rounded-lg flex items-center justify-center mb-6 group-hover:animate-glow">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-semibold mb-4 text-gray-300 group-hover:text-gray-100 transition-colors duration-300">
                            Seguridad Digital
                        </h3>
                        <p class="text-gray-400 leading-relaxed">
                            Auditorías de seguridad, implementación de mejores prácticas 
                            y protección de datos sensibles.
                        </p>
                    </div>
                </div>
                
                <!-- Card 6 -->
                <div class="group relative bg-dark-gray/50 backdrop-blur-sm border border-gray-300/20 rounded-xl p-8 hover:border-gray-300/50 transition-all duration-300 hover:scale-105 card-trail">
                    <div class="absolute inset-0 bg-gradient-to-br from-gray-300/5 to-transparent rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-gradient-to-br from-gray-400 to-gray-200 rounded-lg flex items-center justify-center mb-6 group-hover:animate-glow">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-semibold mb-4 text-gray-200 group-hover:text-white transition-colors duration-300">
                            Consultoría Tech
                        </h3>
                        <p class="text-gray-400 leading-relaxed">
                            Asesoramiento estratégico en transformación digital, 
                            arquitectura de software y optimización de procesos.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de Estadísticas -->
    <section class="py-20 relative">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-space font-bold mb-6">
                    <span class="bg-gradient-to-r from-gray-600 to-white bg-clip-text text-transparent">
                        Logros & Estadísticas
                    </span>
                </h2>
                <p class="text-xl text-gray-400 max-w-3xl mx-auto">
                    Números que reflejan mi experiencia y compromiso con la excelencia tecnológica
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Estadística 1 -->
                <div class="group text-center">
                    <div class="relative mb-6">
                        <div class="w-24 h-24 mx-auto bg-gradient-to-br from-black to-gray-600 rounded-full flex items-center justify-center group-hover:animate-glow">
                            <span class="text-3xl font-bold text-white">5+</span>
                        </div>
                        <div class="absolute inset-0 w-24 h-24 mx-auto border-2 border-white/30 rounded-full animate-pulse-slow"></div>
                    </div>
                    <h3 class="text-2xl font-semibold text-white mb-2">Años de Experiencia</h3>
                    <p class="text-gray-400">Desarrollando soluciones innovadoras</p>
                </div>
                
                <!-- Estadística 2 -->
                <div class="group text-center">
                    <div class="relative mb-6">
                        <div class="w-24 h-24 mx-auto bg-gradient-to-br from-gray-600 to-gray-400 rounded-full flex items-center justify-center group-hover:animate-glow">
                            <span class="text-3xl font-bold text-white">50+</span>
                        </div>
                        <div class="absolute inset-0 w-24 h-24 mx-auto border-2 border-gray-400/30 rounded-full animate-pulse-slow" style="animation-delay: 0.5s;"></div>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-300 mb-2">Proyectos Completados</h3>
                    <p class="text-gray-400">Desde startups hasta empresas</p>
                </div>
                
                <!-- Estadística 3 -->
                <div class="group text-center">
                    <div class="relative mb-6">
                        <div class="w-24 h-24 mx-auto bg-gradient-to-br from-gray-800 to-gray-600 rounded-full flex items-center justify-center group-hover:animate-glow">
                            <span class="text-3xl font-bold text-white">15+</span>
                        </div>
                        <div class="absolute inset-0 w-24 h-24 mx-auto border-2 border-gray-600/30 rounded-full animate-pulse-slow" style="animation-delay: 1s;"></div>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-400 mb-2">Tecnologías Dominadas</h3>
                    <p class="text-gray-400">Stack tecnológico diverso</p>
                </div>
                
                <!-- Estadística 4 -->
                <div class="group text-center">
                    <div class="relative mb-6">
                        <div class="w-24 h-24 mx-auto bg-gradient-to-br from-gray-400 to-white rounded-full flex items-center justify-center group-hover:animate-glow">
                            <span class="text-3xl font-bold text-black">100%</span>
                        </div>
                        <div class="absolute inset-0 w-24 h-24 mx-auto border-2 border-gray-300/30 rounded-full animate-pulse-slow" style="animation-delay: 1.5s;"></div>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-200 mb-2">Satisfacción del Cliente</h3>
                    <p class="text-gray-400">Proyectos entregados a tiempo</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-12 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <div class="mb-8">
                <h3 class="text-2xl font-space font-bold mb-4">
                    <span class="bg-gradient-to-r from-black to-white bg-clip-text text-transparent">
                        ¿Listo para el siguiente proyecto?
                    </span>
                </h3>
                <p class="text-gray-400 mb-6">Conectemos y creemos algo extraordinario juntos</p>
                <button class="px-8 py-4 bg-gradient-to-r from-black to-gray-600 rounded-lg font-semibold text-lg transition-all duration-300 hover:scale-105 neon-glow">
                    Iniciar Conversación
                </button>
            </div>
            
            <div class="border-t border-gray-800 pt-8">
                <p class="text-gray-500">&copy; 2024 NEBULA. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>
</body>
</html>

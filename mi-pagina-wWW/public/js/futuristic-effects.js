// NEXUS - Efectos Futuristas Avanzados
class FuturisticEffects {
    constructor() {
        this.init();
    }

    init() {
        this.createMatrixRain();
        this.addGlitchEffect();
        this.createHolographicElements();
        this.addSoundEffects();
        this.createInteractiveElements();
    }

    // Efecto Matrix Rain
    createMatrixRain() {
        const canvas = document.createElement('canvas');
        canvas.style.position = 'fixed';
        canvas.style.top = '0';
        canvas.style.left = '0';
        canvas.style.width = '100%';
        canvas.style.height = '100%';
        canvas.style.pointerEvents = 'none';
        canvas.style.zIndex = '-2';
        canvas.style.opacity = '0.1';
        document.body.appendChild(canvas);

        const ctx = canvas.getContext('2d');
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        const matrix = "ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789@#$%^&*()*&^%+-/~{[|`]}";
        const matrixArray = matrix.split("");

        const fontSize = 10;
        const columns = canvas.width / fontSize;

        const drops = [];
        for (let x = 0; x < columns; x++) {
            drops[x] = 1;
        }

        const draw = () => {
            ctx.fillStyle = 'rgba(0, 0, 0, 0.04)';
            ctx.fillRect(0, 0, canvas.width, canvas.height);

            ctx.fillStyle = '#00ff88';
            ctx.font = fontSize + 'px monospace';

            for (let i = 0; i < drops.length; i++) {
                const text = matrixArray[Math.floor(Math.random() * matrixArray.length)];
                ctx.fillText(text, i * fontSize, drops[i] * fontSize);

                if (drops[i] * fontSize > canvas.height && Math.random() > 0.975) {
                    drops[i] = 0;
                }
                drops[i]++;
            }
        };

        setInterval(draw, 35);
    }

    // Efecto Glitch
    addGlitchEffect() {
        const glitchElements = document.querySelectorAll('.nexus-title, .section-title');
        
        glitchElements.forEach(element => {
            element.addEventListener('mouseenter', () => {
                this.triggerGlitch(element);
            });
        });
    }

    triggerGlitch(element) {
        const originalText = element.textContent;
        const glitchChars = '!@#$%^&*()_+-=[]{}|;:,.<>?';
        
        let iterations = 0;
        const glitchInterval = setInterval(() => {
            element.textContent = element.textContent
                .split('')
                .map((char, index) => {
                    if (index < iterations) {
                        return originalText[index];
                    }
                    return glitchChars[Math.floor(Math.random() * glitchChars.length)];
                })
                .join('');

            if (iterations >= originalText.length) {
                clearInterval(glitchInterval);
                element.textContent = originalText;
            }
            iterations += 1 / 3;
        }, 50);
    }

    // Elementos Holográficos
    createHolographicElements() {
        const sections = document.querySelectorAll('.section');
        
        sections.forEach(section => {
            const hologram = document.createElement('div');
            hologram.className = 'hologram-effect';
            hologram.style.cssText = `
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: linear-gradient(45deg, 
                    transparent 30%, 
                    rgba(0, 255, 136, 0.1) 50%, 
                    transparent 70%);
                opacity: 0;
                transition: opacity 0.3s ease;
                pointer-events: none;
                z-index: 1;
            `;
            
            section.style.position = 'relative';
            section.appendChild(hologram);

            section.addEventListener('mouseenter', () => {
                hologram.style.opacity = '1';
            });

            section.addEventListener('mouseleave', () => {
                hologram.style.opacity = '0';
            });
        });
    }

    // Efectos de Sonido (simulados con vibración)
    addSoundEffects() {
        const buttons = document.querySelectorAll('.btn-futuristic');
        
        buttons.forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                
                // Efecto visual de click
                const ripple = document.createElement('div');
                ripple.style.cssText = `
                    position: absolute;
                    border-radius: 50%;
                    background: rgba(0, 255, 136, 0.6);
                    transform: scale(0);
                    animation: ripple 0.6s linear;
                    pointer-events: none;
                `;
                
                const rect = button.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = (e.clientX - rect.left - size / 2) + 'px';
                ripple.style.top = (e.clientY - rect.top - size / 2) + 'px';
                
                button.style.position = 'relative';
                button.appendChild(ripple);
                
                setTimeout(() => ripple.remove(), 600);
                
                // Vibración si está disponible
                if (navigator.vibrate) {
                    navigator.vibrate([50, 30, 50]);
                }
            });
        });

        // Agregar CSS para la animación ripple
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    }

    // Elementos Interactivos
    createInteractiveElements() {
        // Efecto de seguimiento del mouse
        const cursor = document.createElement('div');
        cursor.className = 'futuristic-cursor';
        cursor.style.cssText = `
            position: fixed;
            width: 20px;
            height: 20px;
            background: radial-gradient(circle, #00ff88, transparent);
            border-radius: 50%;
            pointer-events: none;
            z-index: 9999;
            transition: transform 0.1s ease;
            opacity: 0.7;
        `;
        document.body.appendChild(cursor);

        document.addEventListener('mousemove', (e) => {
            cursor.style.left = e.clientX - 10 + 'px';
            cursor.style.top = e.clientY - 10 + 'px';
        });

        // Efecto de partículas al hacer click
        document.addEventListener('click', (e) => {
            this.createClickParticles(e.clientX, e.clientY);
        });

        // Efecto de teclado
        document.addEventListener('keydown', (e) => {
            this.createKeyboardEffect(e.key);
        });
    }

    createClickParticles(x, y) {
        for (let i = 0; i < 8; i++) {
            const particle = document.createElement('div');
            particle.style.cssText = `
                position: fixed;
                width: 4px;
                height: 4px;
                background: #00ff88;
                border-radius: 50%;
                pointer-events: none;
                z-index: 9998;
                left: ${x}px;
                top: ${y}px;
            `;
            
            document.body.appendChild(particle);
            
            const angle = (Math.PI * 2 * i) / 8;
            const velocity = 50 + Math.random() * 50;
            const vx = Math.cos(angle) * velocity;
            const vy = Math.sin(angle) * velocity;
            
            let posX = x;
            let posY = y;
            let opacity = 1;
            
            const animate = () => {
                posX += vx * 0.016;
                posY += vy * 0.016;
                opacity -= 0.02;
                
                particle.style.left = posX + 'px';
                particle.style.top = posY + 'px';
                particle.style.opacity = opacity;
                
                if (opacity > 0) {
                    requestAnimationFrame(animate);
                } else {
                    particle.remove();
                }
            };
            
            requestAnimationFrame(animate);
        }
    }

    createKeyboardEffect(key) {
        const keyElement = document.createElement('div');
        keyElement.textContent = key.toUpperCase();
        keyElement.style.cssText = `
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-family: 'Orbitron', monospace;
            font-size: 3rem;
            color: #00ff88;
            text-shadow: 0 0 20px #00ff88;
            pointer-events: none;
            z-index: 9999;
            animation: keyboardEffect 1s ease-out forwards;
        `;
        
        document.body.appendChild(keyElement);
        
        setTimeout(() => keyElement.remove(), 1000);
        
        // Agregar CSS para la animación
        if (!document.querySelector('#keyboard-effect-style')) {
            const style = document.createElement('style');
            style.id = 'keyboard-effect-style';
            style.textContent = `
                @keyframes keyboardEffect {
                    0% {
                        transform: translate(-50%, -50%) scale(0) rotate(0deg);
                        opacity: 1;
                    }
                    50% {
                        transform: translate(-50%, -50%) scale(1.2) rotate(180deg);
                        opacity: 0.8;
                    }
                    100% {
                        transform: translate(-50%, -50%) scale(0) rotate(360deg);
                        opacity: 0;
                    }
                }
            `;
            document.head.appendChild(style);
        }
    }
}

// Inicializar efectos cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', () => {
    new FuturisticEffects();
});

// Efecto de carga de la página
window.addEventListener('load', () => {
    document.body.style.opacity = '0';
    document.body.style.transition = 'opacity 1s ease';
    
    setTimeout(() => {
        document.body.style.opacity = '1';
    }, 100);
});

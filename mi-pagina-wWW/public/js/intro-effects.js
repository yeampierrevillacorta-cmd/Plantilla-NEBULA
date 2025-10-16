// Efectos avanzados para la introducción cinematográfica

document.addEventListener('DOMContentLoaded', function() {
    // Crear matriz de partículas
    createMatrixParticles();
    
    // Efecto de ondas de choque
    createShockWaves();
    
    // Efecto de cámara temblorosa
    createCameraShake();
    
    // Efecto de distorsión espacial
    createSpaceDistortion();
});

// Crear partículas tipo Matrix
function createMatrixParticles() {
    const container = document.getElementById('space-objects');
    const particleCount = 200;

    for (let i = 0; i < particleCount; i++) {
        const particle = document.createElement('div');
        particle.style.cssText = `
            position: absolute;
            width: 1px;
            height: 1px;
            background: #8b0000;
            left: ${Math.random() * 100}%;
            top: ${Math.random() * 100}%;
            animation: matrix-fall ${Math.random() * 3 + 2}s linear infinite;
            animation-delay: ${Math.random() * 2}s;
            opacity: ${Math.random() * 0.8 + 0.2};
        `;
        container.appendChild(particle);
    }

    // Agregar CSS para caída de partículas
    const matrixStyle = document.createElement('style');
    matrixStyle.textContent = `
        @keyframes matrix-fall {
            0% { transform: translateY(-100vh); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: translateY(100vh); opacity: 0; }
        }
    `;
    document.head.appendChild(matrixStyle);
}

// Crear ondas de choque
function createShockWaves() {
    const container = document.getElementById('space-objects');
    const waveCount = 3;

    for (let i = 0; i < waveCount; i++) {
        const wave = document.createElement('div');
        wave.style.cssText = `
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border: 3px solid rgba(255, 107, 107, 0.4);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            animation: shock-wave 3s ease-out ${4 + i * 0.5}s forwards;
        `;
        container.appendChild(wave);
    }

    // Agregar CSS para ondas de choque
    const shockStyle = document.createElement('style');
    shockStyle.textContent = `
        @keyframes shock-wave {
            0% { 
                width: 0; 
                height: 0; 
                opacity: 1; 
                border-width: 3px;
            }
            100% { 
                width: 1200px; 
                height: 1200px; 
                opacity: 0; 
                border-width: 1px;
            }
        }
    `;
    document.head.appendChild(shockStyle);
}

// Efecto de cámara temblorosa
function createCameraShake() {
    const body = document.body;
    let shakeIntensity = 0;

    // Función de temblor
    function shake() {
        if (shakeIntensity > 0) {
            const x = (Math.random() - 0.5) * shakeIntensity;
            const y = (Math.random() - 0.5) * shakeIntensity;
            body.style.transform = `translate(${x}px, ${y}px)`;
            shakeIntensity *= 0.9;
            
            if (shakeIntensity > 0.1) {
                requestAnimationFrame(shake);
            } else {
                body.style.transform = 'translate(0, 0)';
            }
        }
    }

    // Activar temblor en momentos específicos
    setTimeout(() => {
        shakeIntensity = 10;
        shake();
    }, 6000); // Durante la explosión
}

// Efecto de distorsión espacial
function createSpaceDistortion() {
    const container = document.getElementById('space-objects');
    const distortionCount = 20;

    for (let i = 0; i < distortionCount; i++) {
        const distortion = document.createElement('div');
        distortion.style.cssText = `
            position: absolute;
            width: ${Math.random() * 100 + 50}px;
            height: ${Math.random() * 100 + 50}px;
            background: radial-gradient(circle, rgba(139, 0, 0, 0.1) 0%, transparent 70%);
            left: ${Math.random() * 100}%;
            top: ${Math.random() * 100}%;
            border-radius: 50%;
            animation: space-distortion ${Math.random() * 4 + 3}s ease-in-out infinite;
            animation-delay: ${Math.random() * 2}s;
        `;
        container.appendChild(distortion);
    }

    // Agregar CSS para distorsión espacial
    const distortionStyle = document.createElement('style');
    distortionStyle.textContent = `
        @keyframes space-distortion {
            0%, 100% { 
                transform: scale(1) rotate(0deg); 
                opacity: 0.1; 
            }
            50% { 
                transform: scale(1.5) rotate(180deg); 
                opacity: 0.3; 
            }
        }
    `;
    document.head.appendChild(distortionStyle);
}

// Efecto de pulsación cósmica
function createCosmicPulse() {
    const body = document.body;
    let pulsePhase = 0;

    function pulse() {
        pulsePhase += 0.02;
        const intensity = Math.sin(pulsePhase) * 0.1 + 1;
        body.style.filter = `brightness(${intensity}) saturate(${intensity})`;
        requestAnimationFrame(pulse);
    }

    pulse();
}

// Efecto de partículas de energía
function createEnergyParticles() {
    const container = document.getElementById('space-objects');
    const energyCount = 30;

    for (let i = 0; i < energyCount; i++) {
        const energy = document.createElement('div');
        energy.style.cssText = `
            position: absolute;
            width: 3px;
            height: 3px;
            background: radial-gradient(circle, #ff6b6b 0%, #8b0000 100%);
            left: ${Math.random() * 100}%;
            top: ${Math.random() * 100}%;
            border-radius: 50%;
            animation: energy-pulse ${Math.random() * 2 + 1}s ease-in-out infinite;
            animation-delay: ${Math.random() * 1}s;
            box-shadow: 0 0 10px #ff6b6b;
        `;
        container.appendChild(energy);
    }

    // Agregar CSS para partículas de energía
    const energyStyle = document.createElement('style');
    energyStyle.textContent = `
        @keyframes energy-pulse {
            0%, 100% { 
                transform: scale(1); 
                opacity: 0.6; 
                box-shadow: 0 0 10px #ff6b6b;
            }
            50% { 
                transform: scale(2); 
                opacity: 1; 
                box-shadow: 0 0 20px #ff6b6b;
            }
        }
    `;
    document.head.appendChild(energyStyle);
}

// Inicializar efectos adicionales
setTimeout(() => {
    createCosmicPulse();
    createEnergyParticles();
}, 1000);

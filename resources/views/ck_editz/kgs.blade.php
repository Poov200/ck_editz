<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- SEO Meta Tags -->
    <title>KGS Technologies | Engineering Safer. Smarter. Better.</title>
    <meta name="description" content="Premium technology, safety, security, and medical equipment solutions designed for modern businesses.">
    <link rel="canonical" href="https://kgstechnologies.co.in/" />

    <!-- Fonts (Space Grotesk for display, Inter for body) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&family=Space+Grotesk:wght@300;500;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- GSAP & ScrollTrigger -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>

    <!-- Three.js Import Map -->
    <script type="importmap">
      {
        "imports": {
          "three": "https://unpkg.com/three@0.160.0/build/three.module.js"
        }
      }
    </script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'ink': '#050608',      // Near black
                        'surface': '#0A0D14',  // Dark surface
                        'electric': '#1677FF',
                        'glow': '#21C7FF',
                        'text-dim': '#8A93A6'
                    },
                    fontFamily: {
                        'display': ['Space Grotesk', 'sans-serif'],
                        'body': ['Inter', 'sans-serif']
                    }
                }
            }
        }
    </script>

    <style>
        body {
            background-color: #050608;
            color: #ffffff;
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
            cursor: none; /* Hide default cursor for custom one */
        }
        h1, h2, h3, h4, h5 { font-family: 'Space Grotesk', sans-serif; }

        /* Custom Cursor */
        .cursor-dot {
            position: fixed;
            top: 0;
            left: 0;
            width: 8px;
            height: 8px;
            background: #21C7FF;
            border-radius: 50%;
            pointer-events: none;
            z-index: 9999;
            transform: translate(-50%, -50%);
            transition: width 0.3s, height 0.3s, background 0.3s;
        }
        .cursor-outline {
            position: fixed;
            top: 0;
            left: 0;
            width: 40px;
            height: 40px;
            border: 1px solid rgba(255,255,255,0.3);
            border-radius: 50%;
            pointer-events: none;
            z-index: 9998;
            transform: translate(-50%, -50%);
            transition: width 0.3s, height 0.3s, border-color 0.3s, background 0.3s;
        }
        .cursor-hover .cursor-dot {
            width: 0; height: 0;
        }
        .cursor-hover .cursor-outline {
            width: 80px; height: 80px;
            background: rgba(22, 119, 255, 0.1);
            border-color: #1677FF;
        }

        /* Floating Image Reveal (Lempens Style) */
        .hover-reveal {
            position: fixed;
            top: 0; left: 0;
            width: 320px;
            height: 400px;
            background-size: cover;
            background-position: center;
            pointer-events: none;
            opacity: 0;
            z-index: 50;
            border-radius: 4px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0,0,0,0.5);
            transition: opacity 0.4s ease;
            transform: translate(-50%, -50%) scale(0.8);
        }
        .hover-reveal.active {
            opacity: 1;
            transform: translate(-50%, -50%) scale(1);
        }
        .hover-reveal::after {
            content: '';
            position: absolute; inset: 0;
            background: linear-gradient(to bottom, transparent 50%, rgba(5,6,8,0.8));
        }

        /* Text Outline Utility */
        .text-outline {
            -webkit-text-stroke: 1px rgba(255,255,255,0.4);
            color: transparent;
        }

        /* Three.js Canvas */
        #bg-canvas {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            z-index: 0;
            opacity: 0.3;
            pointer-events: none;
        }

        /* GSAP Reveal Helpers */
        .reveal-mask {
            overflow: hidden;
            display: block;
        }
        .reveal-text {
            display: block;
            transform: translateY(100%);
        }

        /* Mobile: Disable custom cursor */
        @media (max-width: 768px) {
            body { cursor: auto; }
            .cursor-dot, .cursor-outline { display: none; }
            .hover-reveal { display: none; }
        }
    </style>
</head>
<body class="antialiased relative">

    <!-- Custom Cursor Elements -->
    <div class="cursor-dot"></div>
    <div class="cursor-outline"></div>

    <!-- Floating Image Reveal Element -->
    <div class="hover-reveal" id="hoverImage"></div>

    <!-- Three.js Background -->
    <canvas id="bg-canvas"></canvas>

    <!-- Overlay Gradient to ensure text readability -->
    <div class="fixed inset-0 bg-gradient-to-b from-ink/80 via-ink/50 to-ink pointer-events-none z-[1]"></div>

    <!-- HEADER -->
    <header class="fixed w-full z-40 p-6 md:p-8 mix-blend-difference">
        <nav class="flex justify-between items-center">
            <a href="#" class="font-display font-bold text-xl tracking-tight text-white">
                KGS<span class="text-glow">.</span>
            </a>
            <div class="hidden md:flex items-center space-x-8 text-sm font-medium text-white/80">
                <a href="#solutions" class="hover-link" data-img="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80">Solutions</a>
                <a href="#about" class="hover-link" data-img="https://images.unsplash.com/photo-1573164713988-8665fc963095?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80">About</a>
                <a href="#industries" class="hover-link" data-img="https://images.unsplash.com/photo-1565008576549-57569a49371d?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80">Industries</a>
                <a href="#contact" class="hover-link" data-img="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80">Contact</a>
            </div>
            <a href="#contact" class="text-xs uppercase tracking-widest border border-white/20 px-4 py-2 rounded-full hover:bg-white hover:text-ink transition-colors">
                Get in Touch
            </a>
        </nav>
    </header>

    <!-- HERO SECTION (Pinned Scale) -->
    <section id="hero" class="relative h-screen flex flex-col justify-center z-10 px-6 md:px-12">
        <div class="max-w-[1600px] mx-auto w-full">
            <div class="overflow-hidden mb-4">
                <h1 class="hero-line font-display font-light text-[14vw] md:text-[12vw] leading-[0.85] tracking-tighter">
                    Engineering
                </h1>
            </div>
            <div class="overflow-hidden mb-4 flex items-baseline justify-between flex-wrap gap-4">
                <h1 class="hero-line font-display font-bold text-[14vw] md:text-[12vw] leading-[0.85] tracking-tighter text-outline">
                    Safer.
                </h1>
                <span class="hero-sub text-text-dim text-sm md:text-base max-w-xs font-light">
                    KGS Technologies delivers dependable safety, security, and medical equipment solutions.
                </span>
            </div>
            <div class="overflow-hidden flex items-baseline justify-between flex-wrap gap-4">
                <h1 class="hero-line font-display font-bold text-[14vw] md:text-[12vw] leading-[0.85] tracking-tighter text-electric">
                    Smarter.
                </h1>
                <a href="#solutions" class="hero-cta group flex items-center gap-3 mt-4 md:mt-0">
                    <span class="w-12 h-12 rounded-full border border-white/30 flex items-center justify-center group-hover:bg-electric group-hover:border-electric transition-colors">
                        <svg class="w-4 h-4 group-hover:text-ink transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                    </span>
                    <span class="text-sm uppercase tracking-widest">Scroll to Explore</span>
                </a>
            </div>
        </div>
    </section>

    <!-- SOLUTIONS SECTION (Hover Reveal List) -->
    <section id="solutions" class="relative z-10 py-32 px-6 md:px-12 bg-ink/80 backdrop-blur-sm">
        <div class="max-w-[1600px] mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 mb-20">
                <div class="md:col-span-4">
                    <span class="text-electric text-sm uppercase tracking-widest font-medium">[ 01 ] Capabilities</span>
                </div>
                <div class="md:col-span-8">
                    <h2 class="font-display text-4xl md:text-6xl font-light leading-tight reveal-mask">
                        <span class="reveal-text block">Integrated solutions for a <span class="font-bold text-glow">complex world.</span></span>
                    </h2>
                </div>
            </div>

            <!-- The List -->
            <div class="border-t border-white/10">
                <!-- Item 1 -->
                <a href="#safety" class="solution-link group flex justify-between items-center py-8 border-b border-white/10 hover:px-8 transition-all duration-500" data-img="https://images.unsplash.com/photo-1581092583537-4898a6f3c0f8?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80">
                    <div>
                        <span class="text-text-dim text-sm font-mono mr-6">01</span>
                        <span class="font-display text-3xl md:text-6xl font-light group-hover:text-electric transition-colors">Safety Solutions</span>
                    </div>
                    <span class="hidden md:block text-text-dim opacity-0 group-hover:opacity-100 transition-opacity text-sm uppercase tracking-widest">Real-World Protection →</span>
                </a>
                <!-- Item 2 -->
                <a href="#security" class="solution-link group flex justify-between items-center py-8 border-b border-white/10 hover:px-8 transition-all duration-500" data-img="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80">
                    <div>
                        <span class="text-text-dim text-sm font-mono mr-6">02</span>
                        <span class="font-display text-3xl md:text-6xl font-light group-hover:text-electric transition-colors">Security Systems</span>
                    </div>
                    <span class="hidden md:block text-text-dim opacity-0 group-hover:opacity-100 transition-opacity text-sm uppercase tracking-widest">Without Compromise →</span>
                </a>
                <!-- Item 3 -->
                <a href="#medical" class="solution-link group flex justify-between items-center py-8 border-b border-white/10 hover:px-8 transition-all duration-500" data-img="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80">
                    <div>
                        <span class="text-text-dim text-sm font-mono mr-6">03</span>
                        <span class="font-display text-3xl md:text-6xl font-light group-hover:text-electric transition-colors">Medical Equipment</span>
                    </div>
                    <span class="hidden md:block text-text-dim opacity-0 group-hover:opacity-100 transition-opacity text-sm uppercase tracking-widest">Better Healthcare →</span>
                </a>
                <!-- Item 4 -->
                <a href="#tech" class="solution-link group flex justify-between items-center py-8 border-b border-white/10 hover:px-8 transition-all duration-500" data-img="https://images.unsplash.com/photo-1518770660439-4636190af475?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80">
                    <div>
                        <span class="text-text-dim text-sm font-mono mr-6">04</span>
                        <span class="font-display text-3xl md:text-6xl font-light group-hover:text-electric transition-colors">Technology Infrastructure</span>
                    </div>
                    <span class="hidden md:block text-text-dim opacity-0 group-hover:opacity-100 transition-opacity text-sm uppercase tracking-widest">Operational Efficiency →</span>
                </a>
            </div>
        </div>
    </section>

    <!-- ABOUT / PHILOSOPHY SECTION -->
    <section id="about" class="relative z-10 py-32 px-6 md:px-12">
        <div class="max-w-[1400px] mx-auto grid md:grid-cols-2 gap-16 items-start">
            <div class="md:sticky md:top-32">
                <span class="text-electric text-sm uppercase tracking-widest font-medium">[ 02 ] Philosophy</span>
                <h2 class="font-display text-5xl md:text-7xl font-bold mt-4 leading-none">
                    Built Around <br><span class="text-outline">Your Needs.</span>
                </h2>
            </div>
            <div class="space-y-8 text-text-dim text-lg font-light leading-relaxed">
                <p>
                    Headquartered in Chennai, Tamil Nadu, KGS Technologies is a premier provider of technology, safety, security, and medical equipment solutions. We partner with modern businesses and institutions to deliver dependable infrastructure.
                </p>
                <p>
                    Our approach combines technical expertise with a deep understanding of industry-specific challenges, ensuring solutions that are not only advanced but practical and reliable.
                </p>
                <div class="grid grid-cols-2 gap-8 pt-8 border-t border-white/10">
                    <div>
                        <h3 class="text-white text-4xl font-display font-bold">100%</h3>
                        <p class="text-sm mt-2">Quality Focused Engineering</p>
                    </div>
                    <div>
                        <h3 class="text-white text-4xl font-display font-bold">24/7</h3>
                        <p class="text-sm mt-2">Reliable Support & Maintenance</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA SECTION (Massive Type) -->
    <section id="contact" class="relative z-10 py-40 px-6 md:px-12 overflow-hidden">
        <div class="max-w-[1600px] mx-auto text-center">
            <span class="text-text-dim text-sm uppercase tracking-widest">[ 03 ] Let's Connect</span>
            <h2 class="font-display font-bold text-[16vw] md:text-[12vw] leading-[0.8] tracking-tighter mt-4">
                <span class="block reveal-mask"><span class="reveal-text block">Let's Build a</span></span>
                <span class="block reveal-mask"><span class="reveal-text block text-outline">Safer Future.</span></span>
            </h2>
            <a href="mailto:[COMPANY EMAIL]" class="inline-block mt-12 text-2xl md:text-4xl font-light text-electric hover:text-glow transition-colors border-b-2 border-electric pb-2">
                [COMPANY EMAIL]
            </a>
            <p class="text-text-dim mt-8 text-base">
                Chennai, Tamil Nadu, India · [COMPANY PHONE]
            </p>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="relative z-10 border-t border-white/10 py-8 px-6 md:px-12">
        <div class="max-w-[1600px] mx-auto flex flex-col md:flex-row justify-between items-center text-sm text-text-dim">
            <p>© 2026 KGS Technologies. All Rights Reserved.</p>
            <div class="flex space-x-6 mt-4 md:mt-0">
                <a href="#" class="hover:text-white transition-colors">LinkedIn</a>
                <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
            </div>
        </div>
    </footer>

    <!-- THREE.JS BACKGROUND SCRIPT -->
    <script type="module">
        import * as THREE from 'three';

        const canvas = document.getElementById('bg-canvas');
        const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        if (canvas && !prefersReducedMotion) {
            const scene = new THREE.Scene();
            const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
            camera.position.z = 5;

            const renderer = new THREE.WebGLRenderer({ canvas, antialias: true, alpha: true });
            renderer.setSize(window.innerWidth, window.innerHeight);
            renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));

            // Create a digital topography grid
            const geometry = new THREE.PlaneGeometry(20, 20, 40, 40);
            const material = new THREE.MeshBasicMaterial({ 
                color: 0x1677FF, 
                wireframe: true,
                transparent: true,
                opacity: 0.5
            });
            const plane = new THREE.Mesh(geometry, material);
            plane.rotation.x = -Math.PI / 2.5;
            plane.position.y = -2;
            scene.add(plane);

            // Store original positions
            const vertices = plane.geometry.attributes.position.array;
            const originalPositions = [...vertices];

            let time = 0;
            function animate() {
                requestAnimationFrame(animate);
                time += 0.02;

                // Animate the grid vertices
                for (let i = 0; i < vertices.length; i += 3) {
                    vertices[i + 2] = Math.sin(time + originalPositions[i] * 0.5) * 0.5 + Math.cos(time + originalPositions[i+1] * 0.5) * 0.5;
                }
                plane.geometry.attributes.position.needsUpdate = true;

                renderer.render(scene, camera);
            }
            animate();

            window.addEventListener('resize', () => {
                camera.aspect = window.innerWidth / window.innerHeight;
                camera.updateProjectionMatrix();
                renderer.setSize(window.innerWidth, window.innerHeight);
            });
        }
    </script>

    <!-- GSAP & INTERACTION SCRIPTS -->
    <script>
        gsap.registerPlugin(ScrollTrigger);

        // 1. Hero Scale and Fade on Scroll
        gsap.to("#hero", {
            scale: 0.8,
            opacity: 0,
            scrollTrigger: {
                trigger: "#hero",
                start: "top top",
                end: "bottom top",
                scrub: 1,
            }
        });

        // 2. Hero Entrance Animation
        gsap.from(".hero-line", {
            yPercent: 100,
            opacity: 0,
            stagger: 0.2,
            duration: 1.2,
            ease: "power4.out",
            delay: 0.3
        });
        gsap.from(".hero-sub, .hero-cta", {
            opacity: 0,
            y: 20,
            duration: 1,
            ease: "power2.out",
            delay: 1
        });

        // 3. Reveal Text on Scroll
        document.querySelectorAll('.reveal-text').forEach((elem) => {
            gsap.to(elem, {
                yPercent: -100, // Move from 100% to 0% (since it starts at 100% in CSS)
                duration: 1,
                ease: "power3.out",
                scrollTrigger: {
                    trigger: elem,
                    start: "top 85%",
                }
            });
        });

        // 4. Custom Cursor Logic
        const cursorDot = document.querySelector('.cursor-dot');
        const cursorOutline = document.querySelector('.cursor-outline');
        let mouseX = 0, mouseY = 0;
        let outlineX = 0, outlineY = 0;

        window.addEventListener('mousemove', (e) => {
            mouseX = e.clientX;
            mouseY = e.clientY;
            
            cursorDot.style.left = mouseX + 'px';
            cursorDot.style.top = mouseY + 'px';
        });

        // Smooth trailing outline
        function animateCursor() {
            outlineX += (mouseX - outlineX) * 0.15;
            outlineY += (mouseY - outlineY) * 0.15;
            cursorOutline.style.left = outlineX + 'px';
            cursorOutline.style.top = outlineY + 'px';
            requestAnimationFrame(animateCursor);
        }
        animateCursor();

        // Cursor hover states
        document.querySelectorAll('a, button').forEach(el => {
            el.addEventListener('mouseenter', () => document.body.classList.add('cursor-hover'));
            el.addEventListener('mouseleave', () => document.body.classList.remove('cursor-hover'));
        });

        // 5. Lempens-style Hover Image Reveal
        const hoverImage = document.getElementById('hoverImage');
        const linksWithImages = document.querySelectorAll('.hover-link, .solution-link');

        linksWithImages.forEach(link => {
            const imgUrl = link.getAttribute('data-img');
            
            link.addEventListener('mouseenter', () => {
                hoverImage.style.backgroundImage = `url(${imgUrl})`;
                hoverImage.classList.add('active');
                document.body.classList.add('cursor-hover');
            });

            link.addEventListener('mouseleave', () => {
                hoverImage.classList.remove('active');
                document.body.classList.remove('cursor-hover');
            });
        });

        // Move hover image with cursor
        window.addEventListener('mousemove', (e) => {
            // Offset the image slightly from the cursor
            hoverImage.style.left = (e.clientX + 50) + 'px';
            hoverImage.style.top = e.clientY + 'px';
        });
    </script>
</body>
</html>
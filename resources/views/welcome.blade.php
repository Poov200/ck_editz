<!DOCTYPE html>
<html lang="en" ng-app="ckEditzApp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CK Editz | 360° Digital Marketing & Web Solutions</title>
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- AngularJS -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    <!-- AOS (Animate On Scroll) -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'display': ['Outfit', 'sans-serif'],
                        'body': ['Space Grotesk', 'sans-serif'],
                    },
                    colors: {
                        'ck-bg': '#F0F3FF',
                        'ck-purple': '#8B5CF6',
                        'ck-pink': '#EC4899',
                        'ck-cyan': '#06B6D4',
                        'ck-dark': '#090014',
                    }
                }
            }
        }
    </script>
    <style>
        html { scroll-behavior: smooth; }
        body { font-family: 'Space Grotesk', sans-serif; background-color: #F0F3FF; color: #090014; overflow-x: hidden; cursor: none; }
        h1, h2, h3, h4, h5 { font-family: 'Outfit', sans-serif; }

        /* Custom Cursor */
        .cursor-dot, .cursor-outline {
            position: fixed; top: 0; left: 0; border-radius: 50%;
            transform: translate(-50%, -50%); z-index: 9999; pointer-events: none;
            transition: width 0.3s, height 0.3s, background 0.3s, border-color 0.3s;
        }
        .cursor-dot { width: 8px; height: 8px; background: #EC4899; }
        .cursor-outline { width: 40px; height: 40px; border: 2px solid #8B5CF6; }
        @media (max-width: 768px) { body { cursor: auto; } .cursor-dot, .cursor-outline { display: none; } }

        /* Animated Gradient Text */
        .animated-text {
            background: linear-gradient(to right, #8B5CF6, #EC4899, #06B6D4, #8B5CF6);
            background-size: 300% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: textGradient 4s linear infinite;
        }
        @keyframes textGradient { 0% { background-position: 0% 50%; } 100% { background-position: 300% 50%; } }

        /* Morphing Background Blobs */
        @keyframes morph {
            0%, 100% { border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%; }
            50% { border-radius: 60% 40% 30% 70% / 60% 40% 60% 40%; }
        }
        .blob { animation: morph 8s ease-in-out infinite; }

        /* Floating Animation */
        @keyframes float { 0% { transform: translateY(0px); } 50% { transform: translateY(-20px); } 100% { transform: translateY(0px); } }
        .animate-float { animation: float 5s ease-in-out infinite; }

        /* 3D Card Hover */
        .card-3d { transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275), box-shadow 0.3s ease; }
        .card-3d:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 20px 20px 60px rgba(139, 92, 246, 0.2), -10px -10px 40px rgba(236, 72, 153, 0.1);
        }
        .card-3d:hover .icon-box { transform: rotate(-10deg) scale(1.1); }
        .icon-box { transition: transform 0.4s ease; }

        /* Gradient Border Wrapper */
        .gradient-border {
            background: linear-gradient(white, white) padding-box,
                        linear-gradient(135deg, #8B5CF6, #EC4899, #06B6D4) border-box;
            border: 2px solid transparent;
        }

        /* Button Magic */
        .btn-magic {
            background: linear-gradient(135deg, #8B5CF6, #EC4899);
            background-size: 200% auto;
            transition: all 0.4s ease;
            box-shadow: 0 4px 15px rgba(139, 92, 246, 0.4);
        }
        .btn-magic:hover {
            background-position: right center;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(236, 72, 153, 0.5);
        }

        /* Navbar Shrink */
        .nav-scrolled {
            padding-top: 0.5rem !important; padding-bottom: 0.5rem !important;
            background: rgba(240, 243, 255, 0.8) !important; backdrop-filter: blur(16px);
            box-shadow: 0 4px 30px rgba(0,0,0,0.05);
        }

        /* Mobile Menu */
        .mobile-menu { transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1); }

        /* Preloader */
        .preloader { position: fixed; inset: 0; background: #F0F3FF; z-index: 9999; display: flex; align-items: center; justify-content: center; transition: opacity 0.8s ease; }
        .preloader.hidden { opacity: 0; visibility: hidden; }
        .loader-blob { width: 80px; height: 80px; background: linear-gradient(135deg, #8B5CF6, #EC4899); animation: morph 1.5s ease-in-out infinite; }

        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #F0F3FF; }
        ::-webkit-scrollbar-thumb { background: linear-gradient(to bottom, #8B5CF6, #EC4899); border-radius: 4px; }

        /* Marquee */
        @keyframes marquee { 0% { transform: translateX(0); } 100% { transform: translateX(-50%); } }
        .animate-marquee { animation: marquee 20s linear infinite; }
    </style>
</head>
<body ng-controller="MainController" ng-class="{'overflow-hidden': !pageLoaded}">

    <!-- Custom Cursor Elements -->
    <div class="cursor-dot" ng-style="{ top: mouseY + 'px', left: mouseX + 'px' }"></div>
    <div class="cursor-outline" ng-style="{ top: mouseY + 'px', left: mouseX + 'px' }"></div>

    <!-- Preloader -->
    <div class="preloader" ng-class="{'hidden': pageLoaded}">
        <div class="text-center">
            <div class="loader-blob mx-auto mb-6"></div>
            <p class="animated-text font-bold text-lg tracking-wider">CK EDITZ</p>
        </div>
    </div>

    <!-- Header / Navbar -->
    <header class="fixed top-0 w-full z-50 transition-all duration-300 py-6" ng-class="{'nav-scrolled': scrolled}">
        <nav class="container mx-auto px-6 flex justify-between items-center">
            <a href="#home" class="flex items-center gap-3 group">
                <img src="{{ asset('img/logo.png') }}" alt="CK Editz Logo" class="w-12 h-12 rounded-full object-cover shadow-lg group-hover:rotate-12 transition duration-300">
                <div class="hidden sm:block">
                    <h1 class="text-xl font-display font-extrabold text-ck-dark leading-none">CK Editz</h1>
                    <p class="text-[10px] tracking-[0.2em] text-ck-purple font-semibold uppercase mt-1">Digital Solutions</p>
                </div>
            </a>
            
            <ul class="hidden lg:flex space-x-10 font-medium text-ck-dark/70 text-sm uppercase tracking-wider">
                <li><a href="#home" class="hover:text-ck-purple transition relative group">Home <span class="absolute -bottom-2 left-0 w-0 h-1 bg-ck-pink rounded-full group-hover:w-full transition-all duration-300"></span></a></li>
                <li><a href="#about" class="hover:text-ck-purple transition relative group">About <span class="absolute -bottom-2 left-0 w-0 h-1 bg-ck-pink rounded-full group-hover:w-full transition-all duration-300"></span></a></li>
                <li><a href="#services" class="hover:text-ck-purple transition relative group">Services <span class="absolute -bottom-2 left-0 w-0 h-1 bg-ck-pink rounded-full group-hover:w-full transition-all duration-300"></span></a></li>
                <li><a href="#process" class="hover:text-ck-purple transition relative group">Process <span class="absolute -bottom-2 left-0 w-0 h-1 bg-ck-pink rounded-full group-hover:w-full transition-all duration-300"></span></a></li>
                <li><a href="#portfolio" class="hover:text-ck-purple transition relative group">Work <span class="absolute -bottom-2 left-0 w-0 h-1 bg-ck-pink rounded-full group-hover:w-full transition-all duration-300"></span></a></li>
                <li><a href="#contact" class="hover:text-ck-purple transition relative group">Contact <span class="absolute -bottom-2 left-0 w-0 h-1 bg-ck-pink rounded-full group-hover:w-full transition-all duration-300"></span></a></li>
            </ul>
            
            <a href="#contact" class="hidden lg:inline-flex items-center gap-2 btn-magic text-white px-6 py-3 rounded-full font-semibold text-sm">
                Get Started <i class="fas fa-arrow-right text-xs"></i>
            </a>

            <button class="lg:hidden text-2xl text-ck-dark p-2" ng-click="toggleMenu()">
                <i class="fas" ng-class="menuOpen ? 'fa-times' : 'fa-bars'"></i>
            </button>
        </nav>
    </header>

    <!-- Mobile Menu Overlay -->
    <div class="mobile-menu fixed inset-0 z-40 bg-ck-bg/95 backdrop-blur-lg lg:hidden flex flex-col items-center justify-center space-y-8 text-2xl font-display text-ck-dark" style="transform: @{{menuOpen ? 'translateY(0)' : 'translateY(-100%)'}};">
        <button class="absolute top-8 right-6 text-3xl text-ck-pink" ng-click="toggleMenu()"><i class="fas fa-times"></i></button>
        <a href="#home" ng-click="toggleMenu()" class="hover:text-ck-purple transition">Home</a>
        <a href="#about" ng-click="toggleMenu()" class="hover:text-ck-purple transition">About</a>
        <a href="#services" ng-click="toggleMenu()" class="hover:text-ck-purple transition">Services</a>
        <a href="#process" ng-click="toggleMenu()" class="hover:text-ck-purple transition">Process</a>
        <a href="#portfolio" ng-click="toggleMenu()" class="hover:text-ck-purple transition">Work</a>
        <a href="#contact" ng-click="toggleMenu()" class="hover:text-ck-purple transition">Contact</a>
    </div>

    <!-- Hero Section -->
    <section id="home" class="relative min-h-screen flex items-center pt-32 pb-20 overflow-hidden">
        <div class="absolute inset-0 z-0 pointer-events-none">
            <div class="absolute top-20 right-10 w-96 h-96 bg-ck-purple blob filter blur-[120px] opacity-30 animate-float"></div>
            <div class="absolute bottom-20 left-10 w-96 h-96 bg-ck-pink blob filter blur-[120px] opacity-30 animate-float" style="animation-delay: 3s;"></div>
            <div class="absolute top-1/3 left-1/2 w-72 h-72 bg-ck-cyan blob filter blur-[120px] opacity-20 animate-float" style="animation-delay: 1.5s;"></div>
        </div>

        <div class="container mx-auto px-6 grid lg:grid-cols-2 gap-12 items-center relative z-10">
            <div data-aos="fade-up" data-aos-duration="1000">
                <span class="inline-block px-4 py-2 mb-6 text-xs font-bold rounded-full bg-white text-ck-purple shadow-lg shadow-purple-500/10 border border-purple-100 uppercase tracking-widest">
                    ✦ 360° Digital Solutions
                </span>
                <h1 class="text-5xl md:text-7xl font-display font-extrabold text-ck-dark leading-tight mb-6">
                    Your Complete <br><span class="animated-text">Digital Partner</span>
                </h1>
                <p class="text-lg text-ck-dark/70 mb-10 max-w-xl font-medium">
                    From high-converting Meta Ads and stunning Website Design to Video Editing and GEM Registration. CK Editz provides everything you need to launch, grow, and dominate your digital presence.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="#services" class="inline-flex items-center gap-2 btn-magic text-white px-8 py-4 rounded-full font-bold text-sm uppercase tracking-wider">
                        Explore Services <i class="fas fa-rocket"></i>
                    </a>
                    <a href="#contact" class="inline-flex items-center gap-2 bg-white border-2 border-ck-dark/10 text-ck-dark px-8 py-4 rounded-full font-bold text-sm uppercase tracking-wider hover:bg-ck-dark hover:text-white transition">
                        Get Free Quote
                    </a>
                </div>
            </div>
            
            <div class="relative hidden md:block" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="300">
                <div class="absolute -inset-4 bg-gradient-to-tr from-ck-purple via-ck-pink to-ck-cyan blob opacity-80 blur-lg"></div>
                <div class="relative animate-float">
                    <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?q=80&w=2070&auto=format&fit=crop" alt="Digital Agency" class="relative w-full h-[550px] object-cover rounded-[3rem] border-4 border-white shadow-2xl">
                </div>
                <div class="absolute -bottom-10 -left-10 bg-white p-6 rounded-2xl shadow-2xl flex items-center gap-4 w-72 animate-float border border-purple-100" style="animation-delay: 1s;">
                    <div class="w-12 h-12 bg-gradient-to-br from-ck-purple to-ck-pink rounded-full flex items-center justify-center text-white text-xl shadow-lg">
                        <i class="fas fa-layer-group"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-display font-extrabold text-ck-dark">All-in-One</h3>
                        <p class="text-xs text-ck-dark/60 font-bold uppercase tracking-wider">Business Solutions</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Marquee / Trusted By -->
    <section class="py-8 bg-ck-dark overflow-hidden">
        <div class="flex w-max animate-marquee">
            <div class="flex items-center space-x-16 px-8 text-white/40 text-2xl font-display font-bold uppercase tracking-wider" ng-repeat="x in [1,2]">
                <span ng-repeat="client in clients" class="hover:text-white transition flex items-center gap-3 cursor-default">
                    <i class="fas @{{client.icon}} text-ck-pink"></i> @{{client.name}}
                </span>
            </div>
        </div>
    </section>

    <!-- About Us -->
    <section id="about" class="py-32 relative">
        <div class="container mx-auto px-6 grid lg:grid-cols-2 gap-20 items-center">
            <div class="relative" data-aos="fade-right">
                <div class="absolute -inset-2 bg-gradient-to-br from-ck-purple to-ck-cyan rounded-3xl blur-lg opacity-20"></div>
                <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?q=80&w=2073&auto=format&fit=crop" alt="About Us" class="relative rounded-3xl shadow-xl w-full h-[600px] object-cover border-4 border-white">
                <div class="absolute -bottom-10 -right-10 bg-gradient-to-br from-ck-purple to-ck-pink p-8 rounded-3xl shadow-xl hidden md:block" data-aos="zoom-in" data-aos-delay="400">
                    <h4 class="text-4xl font-display font-extrabold text-white">8+</h4>
                    <p class="text-white/80 text-sm uppercase font-bold tracking-wider mt-1">Years Experience</p>
                </div>
            </div>
            <div data-aos="fade-left">
                <span class="text-ck-pink font-bold uppercase tracking-[0.3em] text-xs">About CK Editz</span>
                <h2 class="text-4xl md:text-5xl font-display mt-4 mb-8 text-ck-dark font-extrabold">More Than Marketing. <br><span class="animated-text">We Build Digital Empires.</span></h2>
                <p class="text-ck-dark/70 mb-6 text-lg font-medium leading-relaxed">
                    CK Editz is a full-service digital agency. We don't just run your ads; we build your entire digital infrastructure. From registering your domain and designing your website to editing your videos and running high-ROI ad campaigns, we handle it all.
                </p>
                <div class="grid grid-cols-2 gap-6 mb-8">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center text-ck-purple text-xl flex-shrink-0">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <div>
                            <h4 class="text-lg font-display font-bold text-ck-dark">Startup Ready</h4>
                            <p class="text-ck-dark/60 text-sm font-medium">GEM, Domain, & Web setup.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-pink-100 rounded-xl flex items-center justify-center text-ck-pink text-xl flex-shrink-0">
                            <i class="fas fa-video"></i>
                        </div>
                        <div>
                            <h4 class="text-lg font-display font-bold text-ck-dark">Creative Studio</h4>
                            <p class="text-ck-dark/60 text-sm font-medium">Video & Poster Designing.</p>
                        </div>
                    </div>
                </div>
                <a href="#contact" class="inline-flex items-center gap-2 mt-4 text-ck-purple font-bold border-b-2 border-ck-purple pb-1 hover:gap-4 transition-all">
                    Start Your Project <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-32 bg-white relative overflow-hidden">
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-20" data-aos="fade-up">
                <span class="text-ck-pink font-bold uppercase tracking-[0.3em] text-xs">Our Expertise</span>
                <h2 class="text-4xl md:text-5xl font-display mt-4 text-ck-dark font-extrabold">Services <span class="animated-text">We Provide</span></h2>
                <p class="text-ck-dark/60 mt-4 max-w-3xl mx-auto font-medium">Everything you need to launch and scale your business, all under one roof. We make digital growth easy and accessible.</p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                <div class="card-3d bg-ck-bg p-8 rounded-3xl border border-purple-100" data-aos="fade-up" data-aos-duration="500" ng-repeat="service in services">
                    <div class="icon-box w-16 h-16 bg-white rounded-2xl flex items-center justify-center text-3xl mb-6 shadow-lg" ng-class="service.colorClass">
                        <i class="@{{service.icon}}"></i>
                    </div>
                    <h3 class="text-xl font-display font-bold text-ck-dark mb-3">@{{service.title}}</h3>
                    <p class="text-ck-dark/70 mb-6 font-medium text-sm">@{{service.description}}</p>
                    <a href="#contact" class="text-ck-purple font-bold flex items-center gap-2 text-sm uppercase tracking-wider hover:gap-4 transition-all">
                        Learn More <i class="fas fa-arrow-right text-xs"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="py-32 bg-ck-bg relative overflow-hidden">
        <div class="absolute top-0 left-0 w-96 h-96 bg-ck-purple blob filter blur-[120px] opacity-10"></div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-20" data-aos="fade-up">
                <span class="text-ck-purple font-bold uppercase tracking-[0.3em] text-xs">Why CK Editz?</span>
                <h2 class="text-4xl md:text-5xl font-display mt-4 text-ck-dark font-extrabold">Simplified Success <span class="animated-text">For Your Business</span></h2>
                <p class="text-ck-dark/60 mt-4 max-w-2xl mx-auto font-medium">We act as your external digital department. You focus on your product, we focus on getting you customers.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-10 rounded-3xl shadow-sm border border-purple-100 text-center" data-aos="zoom-in-up">
                    <div class="w-20 h-20 bg-gradient-to-br from-ck-purple to-ck-pink rounded-2xl flex items-center justify-center text-3xl text-white mx-auto mb-6 shadow-lg shadow-purple-500/30">
                        <i class="fas fa-hand-holding-usd"></i>
                    </div>
                    <h3 class="text-xl font-display font-bold text-ck-dark mb-3">Cost-Effective</h3>
                    <p class="text-ck-dark/60 font-medium">Get a full marketing and web team for less than the cost of a single in-house employee.</p>
                </div>
                <div class="bg-white p-10 rounded-3xl shadow-sm border border-purple-100 text-center" data-aos="zoom-in-up" data-aos-delay="150">
                    <div class="w-20 h-20 bg-gradient-to-br from-ck-cyan to-ck-purple rounded-2xl flex items-center justify-center text-3xl text-white mx-auto mb-6 shadow-lg shadow-cyan-500/30">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3 class="text-xl font-display font-bold text-ck-dark mb-3">Dedicated Support</h3>
                    <p class="text-ck-dark/60 font-medium">We are always available. 24/7 hosting support and dedicated account managers for your campaigns.</p>
                </div>
                <div class="bg-white p-10 rounded-3xl shadow-sm border border-purple-100 text-center" data-aos="zoom-in-up" data-aos-delay="300">
                    <div class="w-20 h-20 bg-gradient-to-br from-ck-pink to-ck-cyan rounded-2xl flex items-center justify-center text-3xl text-white mx-auto mb-6 shadow-lg shadow-pink-500/30">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <h3 class="text-xl font-display font-bold text-ck-dark mb-3">Transparent Reporting</h3>
                    <p class="text-ck-dark/60 font-medium">No hidden fees. We provide clear, easy-to-understand reports on your ads and website performance.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Process Section -->
    <section id="process" class="py-32 bg-white relative overflow-hidden">
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-20" data-aos="fade-up">
                <span class="text-ck-pink font-bold uppercase tracking-[0.3em] text-xs">How We Work</span>
                <h2 class="text-4xl md:text-5xl font-display mt-4 text-ck-dark font-extrabold">Simple <span class="animated-text">4-Step Process</span></h2>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center p-6 bg-ck-bg rounded-3xl border border-purple-100" data-aos="fade-up" data-aos-delay="0">
                    <div class="w-16 h-16 mx-auto bg-gradient-to-br from-ck-purple to-ck-pink rounded-full flex items-center justify-center text-2xl mb-4 font-display font-bold text-white shadow-lg">1</div>
                    <h4 class="text-xl font-display font-bold mb-2 text-ck-dark">Discovery</h4>
                    <p class="text-ck-dark/60 text-sm font-medium">We understand your business, goals, and target audience.</p>
                </div>
                <div class="text-center p-6 bg-ck-bg rounded-3xl border border-purple-100" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-16 h-16 mx-auto bg-gradient-to-br from-ck-purple to-ck-pink rounded-full flex items-center justify-center text-2xl mb-4 font-display font-bold text-white shadow-lg">2</div>
                    <h4 class="text-xl font-display font-bold mb-2 text-ck-dark">Strategy</h4>
                    <p class="text-ck-dark/60 text-sm font-medium">Crafting a customized digital roadmap (Web, Ads, Social).</p>
                </div>
                <div class="text-center p-6 bg-ck-bg rounded-3xl border border-purple-100" data-aos="fade-up" data-aos-delay="400">
                    <div class="w-16 h-16 mx-auto bg-gradient-to-br from-ck-purple to-ck-pink rounded-full flex items-center justify-center text-2xl mb-4 font-display font-bold text-white shadow-lg">3</div>
                    <h4 class="text-xl font-display font-bold mb-2 text-ck-dark">Execution</h4>
                    <p class="text-ck-dark/60 text-sm font-medium">Launching high-converting campaigns, websites, and creatives.</p>
                </div>
                <div class="text-center p-6 bg-ck-bg rounded-3xl border border-purple-100" data-aos="fade-up" data-aos-delay="600">
                    <div class="w-16 h-16 mx-auto bg-gradient-to-br from-ck-purple to-ck-pink rounded-full flex items-center justify-center text-2xl mb-4 font-display font-bold text-white shadow-lg">4</div>
                    <h4 class="text-xl font-display font-bold mb-2 text-ck-dark">Optimize</h4>
                    <p class="text-ck-dark/60 text-sm font-medium">Tracking data and optimizing for maximum ROI.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio / Work -->
    <section id="portfolio" class="py-32 bg-ck-bg relative overflow-hidden">
        <div class="container mx-auto px-6">
            <div class="text-center mb-20" data-aos="fade-up">
                <span class="text-ck-purple font-bold uppercase tracking-[0.3em] text-xs">Portfolio</span>
                <h2 class="text-4xl md:text-5xl font-display mt-4 text-ck-dark font-extrabold">Our Recent <span class="animated-text">Projects</span></h2>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="relative group overflow-hidden rounded-3xl cursor-pointer shadow-lg" data-aos="zoom-in-up" ng-repeat="project in portfolio">
                    <img ng-src="@{{project.image}}" alt="Project" class="w-full h-96 object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-ck-dark/90 via-ck-dark/40 to-transparent flex flex-col justify-end p-8 opacity-90 group-hover:opacity-100 transition">
                        <span class="text-white text-xs uppercase font-bold tracking-widest mb-2 bg-gradient-to-r from-ck-purple to-ck-pink w-max px-3 py-1 rounded-full shadow-lg">@{{project.category}}</span>
                        <h3 class="text-3xl font-display font-bold text-white">@{{project.title}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-32 bg-white relative">
        <div class="container mx-auto px-6">
            <div class="text-center mb-20" data-aos="fade-up">
                <span class="text-ck-pink font-bold uppercase tracking-[0.3em] text-xs">Testimonials</span>
                <h2 class="text-4xl md:text-5xl font-display mt-4 text-ck-dark font-extrabold">What Clients <span class="animated-text">Say</span></h2>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-ck-bg p-10 rounded-3xl relative border border-purple-100 shadow-sm" data-aos="fade-up" data-aos-delay="@{{ $index * 150 }}" ng-repeat="t in testimonials">
                    <i class="fas fa-quote-left text-5xl text-purple-200 absolute top-6 right-6"></i>
                    <div class="flex items-center mb-6 relative z-10">
                        <img ng-src="@{{t.image}}" alt="Client" class="w-16 h-16 rounded-full object-cover mr-4 border-4 border-white shadow-md">
                        <div>
                            <h4 class="font-display font-bold text-lg text-ck-dark">@{{t.name}}</h4>
                            <p class="text-sm text-ck-dark/50 font-medium">@{{t.role}}</p>
                        </div>
                    </div>
                    <p class="text-ck-dark/70 mb-6 italic font-medium">"@{{t.message}}"</p>
                    <div class="flex text-ck-pink">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section id="faq" class="py-32 bg-ck-bg">
        <div class="container mx-auto px-6 max-w-4xl">
            <div class="text-center mb-20" data-aos="fade-up">
                <span class="text-ck-purple font-bold uppercase tracking-[0.3em] text-xs">FAQ</span>
                <h2 class="text-4xl md:text-5xl font-display mt-4 text-ck-dark font-extrabold">Frequently Asked <span class="animated-text">Questions</span></h2>
            </div>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-purple-100" data-aos="fade-up" ng-repeat="faq in faqs">
                    <button class="w-full flex justify-between items-center p-6 text-left hover:bg-purple-50 transition" ng-click="toggleFaq(faq)">
                        <span class="font-display font-bold text-ck-dark text-xl">@{{faq.question}}</span>
                        <i class="fas fa-chevron-down text-ck-purple transition-transform duration-300" ng-class="{'rotate-180': faq.open}"></i>
                    </button>
                    <div class="overflow-hidden transition-all duration-300 ease-in-out" style="max-height: @{{faq.open ? '300px' : '0px'}};">
                        <p class="p-6 pt-0 text-ck-dark/70 font-medium">@{{faq.answer}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form -->
    <section id="contact" class="py-32 bg-white relative overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-ck-purple blob filter blur-[120px] opacity-10"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-ck-pink blob filter blur-[120px] opacity-10"></div>
        
        <div class="container mx-auto px-6 grid lg:grid-cols-2 gap-16 items-center relative z-10">
            <div data-aos="fade-right">
                <span class="text-ck-pink font-bold uppercase tracking-[0.3em] text-xs">Get In Touch</span>
                <h2 class="text-4xl md:text-5xl font-display mt-4 mb-8 text-ck-dark font-extrabold">Let's Build Your <br>Business <span class="animated-text">Together</span></h2>
                <p class="text-ck-dark/70 mb-10 text-lg font-medium">Whether you need a new website, want to run Google Ads, or need help with GEM registration, we are ready. Fill out the form, and our team will get back to you within 24 hours.</p>
                
                <div class="space-y-6">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-ck-purple to-ck-pink rounded-2xl flex items-center justify-center text-white text-xl shadow-lg shadow-purple-500/30">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h4 class="font-display font-bold text-ck-dark text-lg">Location</h4>
                            <p class="text-ck-dark/60 font-medium">No 6/10 Second Floor, 2nd main road, vijayanagar, velachery, Chennai</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-ck-cyan to-ck-purple rounded-2xl flex items-center justify-center text-white text-xl shadow-lg shadow-cyan-500/30">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h4 class="font-display font-bold text-ck-dark text-lg">Email Us</h4>
                            <p class="text-ck-dark/60 font-medium">ckeditz09@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="gradient-border p-10 rounded-3xl shadow-2xl" data-aos="fade-left">
                <div ng-if="formSuccess" class="mb-6 bg-green-100 border border-green-200 text-green-700 p-4 rounded-xl text-center font-bold flex items-center justify-center gap-2">
                    <i class="fas fa-check-circle"></i> Thank you! Your message has been sent.
                </div>
                <form ng-submit="submitContactForm()">
                    <div class="grid md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-ck-dark/70 text-sm mb-2 font-bold uppercase tracking-wider">Full Name</label>
                            <input type="text" required ng-model="formData.name" class="w-full bg-ck-bg border border-purple-100 rounded-xl px-4 py-3 text-ck-dark focus:outline-none focus:border-ck-purple focus:bg-white transition font-medium" placeholder="John Doe">
                        </div>
                        <div>
                            <label class="block text-ck-dark/70 text-sm mb-2 font-bold uppercase tracking-wider">Email Address</label>
                            <input type="email" required ng-model="formData.email" class="w-full bg-ck-bg border border-purple-100 rounded-xl px-4 py-3 text-ck-dark focus:outline-none focus:border-ck-purple focus:bg-white transition font-medium" placeholder="john@brand.com">
                        </div>
                    </div>
                    <div class="mb-6">
                        <label class="block text-ck-dark/70 text-sm mb-2 font-bold uppercase tracking-wider">Subject</label>
                        <input type="text" required ng-model="formData.subject" class="w-full bg-ck-bg border border-purple-100 rounded-xl px-4 py-3 text-ck-dark focus:outline-none focus:border-ck-purple focus:bg-white transition font-medium" placeholder="I need help with...">
                    </div>
                    <div class="mb-6">
                        <label class="block text-ck-dark/70 text-sm mb-2 font-bold uppercase tracking-wider">Message</label>
                        <textarea required ng-model="formData.message" rows="4" class="w-full bg-ck-bg border border-purple-100 rounded-xl px-4 py-3 text-ck-dark focus:outline-none focus:border-ck-purple focus:bg-white transition font-medium" placeholder="Tell us about your project..."></textarea>
                    </div>
                    <button type="submit" class="w-full btn-magic text-white py-4 rounded-xl font-display font-bold text-lg uppercase tracking-wider flex items-center justify-center gap-2">
                        Send Message <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->

<!-- Footer -->
<footer class="bg-ck-dark pt-20 pb-10 relative overflow-hidden">

    <!-- Background Glow -->
    <div class="absolute top-0 left-1/2 w-96 h-96 bg-ck-purple blob filter blur-[150px] opacity-20"></div>

    <div class="container mx-auto px-6 relative z-10">

        <!-- Footer Grid -->
        <div class="grid md:grid-cols-4 gap-12 mb-12">

            <!-- Company Info -->
            <div>
                <div class="flex items-center gap-3 mb-6">

                    <img src="{{ asset('img/logo.png') }}"
                         alt="CK Editz Logo"
                         class="w-12 h-12 rounded-full shadow-lg">

                    <div>
                        <h1 class="text-xl font-display font-extrabold text-white leading-none">
                            CK Editz
                        </h1>

                        <p class="text-[10px] tracking-[0.2em] text-ck-pink font-semibold uppercase mt-1">
                            Digital Solutions
                        </p>
                    </div>

                </div>

                <p class="text-white/60 font-medium mb-5">
                    Your all-in-one digital partner. From marketing to web hosting,
                    we grow your business online.
                </p>

                <!-- Contact Information -->
                <div class="space-y-4 text-sm">

                    <!-- Address -->
                    <div class="flex items-start gap-3 text-white/70">
                        <i class="fas fa-map-marker-alt text-ck-pink mt-1"></i>

                        <span class="leading-relaxed">
                            No 6/10, Second Floor,<br>
                            2nd Main Road, Vijayanagar,<br>
                            Velachery, Chennai
                        </span>
                    </div>

                    <!-- Phone -->
                    <div class="flex items-center gap-3">
                        <i class="fas fa-phone-alt text-ck-pink"></i>

                        <a href="tel:9884380579"
                           class="text-white/70 hover:text-ck-pink transition">
                            +91 98843 80579
                        </a>
                    </div>

                    <!-- Email -->
                    <div class="flex items-center gap-3">
                        <i class="fas fa-envelope text-ck-pink"></i>

                        <a href="mailto:ckeditz09@gmail.com"
                           class="text-white/70 hover:text-ck-pink transition break-all">
                            ckeditz09@gmail.com
                        </a>
                    </div>

                </div>
            </div>


            <!-- Quick Links -->
            <div>
                <h4 class="text-lg font-display text-white mb-4 font-bold">
                    Quick Links
                </h4>

                <ul class="space-y-3 text-white/60">
                    <li>
                        <a href="#home"
                           class="hover:text-ck-pink transition font-medium">
                            Home
                        </a>
                    </li>

                    <li>
                        <a href="#about"
                           class="hover:text-ck-pink transition font-medium">
                            About Us
                        </a>
                    </li>

                    <li>
                        <a href="#services"
                           class="hover:text-ck-pink transition font-medium">
                            Services
                        </a>
                    </li>

                    <li>
                        <a href="#contact"
                           class="hover:text-ck-pink transition font-medium">
                            Contact
                        </a>
                    </li>
                </ul>
            </div>


            <!-- Our Services -->
            <div>
                <h4 class="text-lg font-display text-white mb-4 font-bold">
                    Our Services
                </h4>

                <ul class="space-y-3 text-white/60">
                    <li class="font-medium">
                        Digital Marketing & Ads
                    </li>

                    <li class="font-medium">
                        Website & Landing Page Design
                    </li>

                    <li class="font-medium">
                        Video & Poster Editing
                    </li>

                    <li class="font-medium">
                        Domain, Hosting & GEM Reg.
                    </li>
                </ul>
            </div>


            <!-- Follow Us -->
            <div>
                <h4 class="text-lg font-display text-white mb-4 font-bold">
                    Follow Us
                </h4>

                <div class="flex space-x-4">

                    <!-- Facebook -->
                    <a href="https://www.facebook.com/ckeditzdigitalmarketing"
                       target="_blank"
                       rel="noopener noreferrer"
                       aria-label="Facebook"
                       class="w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center text-white hover:bg-gradient-to-br hover:from-ck-purple hover:to-ck-pink transition shadow-lg">

                        <i class="fab fa-facebook-f"></i>

                    </a>

                    <!-- Instagram -->
                    <a href="https://www.instagram.com/ckeditz_2025/"
                       target="_blank"
                       rel="noopener noreferrer"
                       aria-label="Instagram"
                       class="w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center text-white hover:bg-gradient-to-br hover:from-ck-purple hover:to-ck-pink transition shadow-lg">

                        <i class="fab fa-instagram"></i>

                    </a>

                </div>
            </div>

        </div>


        <!-- Copyright -->
        <div class="border-t border-white/10 pt-8 text-center text-white/40 font-medium">

            <p>
                &copy; @{{currentYear}} CK Editz. All Rights Reserved.
                Designed with
                <i class="fas fa-heart text-ck-pink"></i>
            </p>

        </div>

    </div>
</footer>
```


    <!-- Back to Top Button -->
    <button ng-if="scrolled" ng-click="scrollToTop()" class="fixed bottom-8 right-8 w-14 h-14 btn-magic text-white rounded-full shadow-lg flex items-center justify-center z-50 animate-bounce">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- AngularJS Script -->
    <script>
        var app = angular.module('ckEditzApp', []);
        
        app.controller('MainController', function($scope, $timeout, $window) {
            // Preloader & Init
            $timeout(function() {
                $scope.pageLoaded = true;
                AOS.init({ duration: 1000, once: true, offset: 100, easing: 'ease-out-cubic' });
            }, 1000);

            // Custom Cursor Tracking
            $scope.mouseX = 0;
            $scope.mouseY = 0;
            angular.element($window).bind('mousemove', function(e) {
                $scope.mouseX = e.clientX;
                $scope.mouseY = e.clientY;
                $scope.$applyAsync();
            });

            // Scroll State
            $scope.scrolled = false;
            $scope.menuOpen = false;
            $scope.currentYear = new Date().getFullYear();
            
            angular.element($window).bind('scroll', function() {
                $scope.scrolled = this.pageYOffset > 50;
                $scope.$applyAsync();
            });

            $scope.toggleMenu = function() { $scope.menuOpen = !$scope.menuOpen; };
            $scope.scrollToTop = function() { $window.scrollTo({ top: 0, behavior: 'smooth' }); };

            $scope.clients = [
                { name: 'TechNova', icon: 'fa-microchip' },
                { name: 'Bella Foods', icon: 'fa-utensils' },
                { name: 'FitZone', icon: 'fa-dumbbell' },
                { name: 'ShopEasy', icon: 'fa-shopping-bag' },
                { name: 'GlobalEx', icon: 'fa-plane' }
            ];

            // Expanded Services Array
            $scope.services = [
                { title: 'Meta Ads (FB & IG)', icon: 'fas fa-bullhorn', description: 'Highly targeted Facebook and Instagram ad campaigns to drive quality leads and skyrocket sales.', colorClass: 'text-ck-purple bg-purple-50' },
                { title: 'Google Ads (PPC)', icon: 'fab fa-google', description: 'Capture high-intent customers actively searching for your services with optimized Google Ads.', colorClass: 'text-ck-cyan bg-cyan-50' },
                { title: 'GMB Optimization', icon: 'fas fa-map-marked-alt', description: 'Dominate local search results. We optimize your Google My Business profile for local calls and visits.', colorClass: 'text-ck-pink bg-pink-50' },
                { title: 'Social Media Handling', icon: 'fas fa-hashtag', description: 'Complete management of your social media presence. From content creation to community engagement.', colorClass: 'text-ck-purple bg-purple-50' },
                { title: 'Video Editing', icon: 'fas fa-video', description: 'Professional video editing for reels, YouTube, and ads to keep your audience engaged and entertained.', colorClass: 'text-ck-cyan bg-cyan-50' },
                { title: 'Poster Designing', icon: 'fas fa-paint-brush', description: 'Eye-catching, professional graphic designs for your social media pages that stop the scroll.', colorClass: 'text-ck-pink bg-pink-50' },
                { title: 'Website Design', icon: 'fas fa-laptop-code', description: 'Custom, responsive, and beautiful websites built to convert your visitors into paying customers.', colorClass: 'text-ck-purple bg-purple-50' },
                { title: 'Landing Page Design', icon: 'fas fa-rocket', description: 'High-converting landing pages specifically designed for your ad campaigns to maximize ROI.', colorClass: 'text-ck-cyan bg-cyan-50' },
                { title: 'Domain Registration', icon: 'fas fa-globe', description: 'Secure your brand identity online. We help you find and register the perfect domain name.', colorClass: 'text-ck-pink bg-pink-50' },
                { title: 'Hosting Support', icon: 'fas fa-server', description: 'Reliable and secure web hosting support to keep your website running smoothly 24/7.', colorClass: 'text-ck-purple bg-purple-50' },
                { title: 'GEM Registration', icon: 'fas fa-file-signature', description: 'Simplify your government business. Hassle-free GEM (Government e-Marketplace) registration assistance.', colorClass: 'text-ck-cyan bg-cyan-50' },
                { title: 'Analytics & Tracking', icon: 'fas fa-chart-pie', description: 'Data-driven decisions. We set up advanced tracking to measure every dollar spent and optimize for max ROI.', colorClass: 'text-ck-pink bg-pink-50' }
            ];

            $scope.portfolio = [
                { title: 'E-commerce Campaign', category: 'Meta Ads', image: 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?q=80&w=2070&auto=format&fit=crop' },
                { title: 'Local SEO Boost', category: 'GMB', image: 'https://images.unsplash.com/photo-1521791136064-7986c2920216?q=80&w=2069&auto=format&fit=crop' },
                { title: 'Brand Awareness', category: 'Social Media', image: 'https://images.unsplash.com/photo-1557804506-669a67965ba0?q=80&w=1974&auto=format&fit=crop' },
                { title: 'Lead Generation', category: 'Google Ads', image: 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=2015&auto=format&fit=crop' },
                { title: 'Creative Design', category: 'Video/Poster', image: 'https://images.unsplash.com/photo-1620641788421-7a1c342ea42e?q=80&w=2070&auto=format&fit=crop' },
                { title: 'Product Launch', category: 'Web & Landing', image: 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?q=80&w=2072&auto=format&fit=crop' }
            ];

            $scope.testimonials = [
                { name: 'Sarah Johnson', role: 'CEO, Bella Foods', image: 'https://randomuser.me/api/portraits/women/44.jpg', message: 'CK Editz transformed our online presence. Our online orders doubled within a month of running their Meta Ads!' },
                { name: 'Michael Chen', role: 'Founder, TechNova', image: 'https://randomuser.me/api/portraits/men/32.jpg', message: 'Professional, responsive, and results-driven. They designed our landing page and brought us high-quality B2B leads.' },
                { name: 'Emily Davis', role: 'Marketing Head, FitZone', image: 'https://randomuser.me/api/portraits/women/68.jpg', message: 'The social media handling and video editing is top-notch. Our engagement is up 300% and the reels look amazing!' }
            ];

            $scope.faqs = [
                { question: 'Do you provide complete website solutions?', answer: 'Yes! We handle everything from start to finish. This includes domain registration, web hosting, website/landing page design, and ongoing maintenance.', open: true },
                { question: 'What is GEM Registration and do I need it?', answer: 'GEM (Government e-Marketplace) registration allows you to sell your products or services directly to the government. If you want to expand into government contracts, we handle the entire registration process for you.', open: false },
                { question: 'Can you edit videos for my social media?', answer: 'Absolutely. Video editing is a core part of our creative services. We edit reels, YouTube videos, and ad creatives to ensure they are highly engaging and professional.', open: false },
                { question: 'How long does it take to see results from ads?', answer: 'While some campaigns can generate leads immediately, we typically recommend a 3-month window to optimize the campaigns properly and see consistent, scalable results.', open: false }
            ];

            $scope.toggleFaq = function(faq) { faq.open = !faq.open; };

            $scope.formData = {};
            $scope.formSuccess = false;
            
            $scope.submitContactForm = function() {
                $scope.formSuccess = true;
                $scope.formData = {};
                $timeout(function() { $scope.formSuccess = false; }, 5000);
            };
        });
    </script>
</body>
</html>
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
        html {
            width: 100%;
            max-width: 100%;
            overflow-x: hidden;
            scroll-behavior: smooth;
        }
        body {
            width: 100%;
            max-width: 100%;
            margin: 0;
            padding: 0;
            font-family: 'Space Grotesk', sans-serif;
            background-color: #F0F3FF;
            color: #090014;
            overflow-x: hidden;
            cursor: none;
        }
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }
        img,
        video,
        iframe {
            max-width: 100%;
        }
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

    @include('ck_editz.navbar')

    <!-- Hero Section -->
    <section id="home" class="relative min-h-screen flex items-center pt-32 pb-20 overflow-hidden">
        <div class="absolute inset-0 z-0 pointer-events-none">
            <div class="absolute top-20 right-10 w-96 h-96 bg-ck-purple blob filter blur-[120px] opacity-30 animate-float"></div>
            <div class="absolute bottom-20 left-10 w-96 h-96 bg-ck-pink blob filter blur-[120px] opacity-30 animate-float" style="animation-delay: 3s;"></div>
            <div class="absolute top-1/3 left-1/2 w-72 h-72 bg-ck-cyan blob filter blur-[120px] opacity-20 animate-float" style="animation-delay: 1.5s;"></div>
        </div>

        <div class="container mx-auto px-6 grid lg:grid-cols-2 gap-12 items-center relative z-10">
            <!-- Removed data-aos from hero text to prevent layout shift -->
            <div>
                <span class="inline-block px-4 py-2 mb-6 text-xl font-bold rounded-full bg-white text-ck-purple shadow-lg shadow-purple-500/10 border border-purple-100 uppercase tracking-widest">
                    ✦ 360° Digital Solutions
                </span>
                <h1 class="text-3xl md:text-3xl font-display font-extrabold text-ck-dark leading-tight mb-6">
    Stop Chasing Customers <br><span class="animated-text">Start Attracting Them</span>
</h1>

<p class="text-lg text-ck-dark/70 mb-10 max-w-xl font-medium">
    We turn ideas into powerful digital experiences — from high-converting Meta & Google Ads and modern websites to creative content, video solutions. CK Editz helps businesses build credibility, reach the right audience, generate quality leads, and grow with confidence.
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
            
            <!-- Removed data-aos from hero image to prevent layout shift -->
            <div class="relative hidden md:block">
                <div class="absolute -inset-4 bg-gradient-to-tr from-ck-purple via-ck-pink to-ck-cyan blob opacity-80 blur-lg"></div>
                <div class="relative animate-float">
                    <img src="{{ asset('img/headerimg.png') }}" alt="Digital Agency" class="relative w-full h-[400px] object-cover rounded-[3rem] border-4 border-white shadow-2xl">
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
                <img src="{{ asset('img/about.png') }}" alt="About Us" class="relative rounded-3xl shadow-xl w-full h-[600px] object-cover border-4 border-white">
                <div class="absolute -bottom-10 -right-10 bg-gradient-to-br from-ck-purple to-ck-pink p-8 rounded-3xl shadow-xl hidden md:block" data-aos="zoom-in" data-aos-delay="400">
                    <h4 class="text-4xl font-display font-extrabold text-white">5+</h4>
                    <p class="text-white/80 text-sm uppercase font-bold tracking-wider mt-1">Years Experience</p>
                </div>
            </div>
            <div data-aos="fade-left">
    <span class="text-ck-pink font-bold uppercase tracking-[0.3em] text-xl">
        About CK Editz
    </span>

    <h2 class="text-3xl md:text-3xl font-display mt-4 mb-8 text-ck-dark font-extrabold">
        We Don't Just Build Brands. <br>
        <span class="animated-text">We Build Businesses for the Digital World.</span>
    </h2>

    <p class="text-ck-dark/70 mb-6 text-lg font-medium leading-relaxed">
        In today's competitive market, being online is no longer enough.
        Your business needs to be <strong>Visible, Credible, Memorable and easy to choose.</strong>
    </p>

    <p class="text-ck-dark/70 mb-6 text-lg font-medium leading-relaxed">
        At <strong>CK Editz Digital Solutions</strong>, we help businesses build a powerful digital presence by bringing together
        <strong>Strategy, Technology, Creativity and Performance Marketing</strong> under one roof.
    </p>

    <p class="text-ck-dark/70 mb-6 text-lg font-medium leading-relaxed">
        From your first website to your next lead-generation campaign, we create digital solutions designed around your
        <strong>Business Objectives and Growth.</strong>
    </p>

                <div class="grid grid-cols-2 gap-6 mb-8">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center text-ck-purple text-xl flex-shrink-0">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <div>
                            <h4 class="text-lg font-display font-bold text-ck-dark">Startup Ready</h4>
                            <p class="text-ck-dark/60 text-sm font-medium">Domain, & Web setup.</p>
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

        <!-- Section Heading -->
        <div class="text-center mb-20" data-aos="fade-up">

            <span class="text-ck-pink font-bold uppercase tracking-[0.3em] text-lg md:text-xl">
                Our Expertise
            </span>

            <h2 class="text-4xl md:text-5xl font-display mt-4 text-ck-dark font-extrabold">
                Services
                <span class="animated-text">We Provide</span>
            </h2>

            <p class="text-ck-dark/60 mt-4 max-w-3xl mx-auto font-medium">
                Complete Digital Solutions to Build Your Brand, Reach More Customers,
                and Grow Your Business.
            </p>

        </div>


        <!-- Services Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">

            <div
                class="card-3d bg-ck-bg p-8 rounded-3xl border border-purple-100
                       flex flex-col h-full"
                data-aos="fade-up"
                data-aos-duration="500"
                ng-repeat="service in services"
            >

                <!-- Icon -->
                <div
                    class="icon-box w-16 h-16 bg-white rounded-2xl
                           flex items-center justify-center text-3xl mb-6
                           shadow-lg flex-shrink-0"
                    ng-class="service.colorClass"
                >
                    <img
    ng-src="@{{service.icon}}"
    alt="@{{service.title}}"
    class="w-10 h-10 object-contain"
>
                </div>


                <!-- Service Title -->
                <h3 class="text-xl font-display font-bold text-ck-dark mb-3">
                    @{{service.title}}
                </h3>


                <!-- Main Headline -->
                <h4 class="text-base font-bold text-ck-purple mb-4 leading-relaxed">
                    @{{service.headline}}
                </h4>


                <!-- Description -->
                <div class="text-ck-dark/70 font-medium text-sm leading-relaxed">

                    <!-- Short Content -->
                    <p ng-if="!service.showMore">
                        @{{service.shortDescription}}
                    </p>

                    <!-- Full Content -->
                    <p ng-if="service.showMore">
                        @{{service.description}}
                    </p>

                </div>


                <!-- Read More / Read Less -->
                <button
                    type="button"
                    ng-click="service.showMore = !service.showMore"
                    class="mt-4 text-ck-purple font-bold text-sm
                           inline-flex items-center gap-2
                           hover:text-ck-pink transition-all duration-300"
                >
                    <span ng-if="!service.showMore">
                        Read More
                    </span>

                    <span ng-if="service.showMore">
                        Read Less
                    </span>

                    <i
                        class="fas"
                        ng-class="service.showMore ? 'fa-chevron-up' : 'fa-chevron-down'"
                    ></i>
                </button>


                <!-- Learn More -->
                <div class="mt-auto pt-6">

                    <a
                        ng-href="{{ url('/') }}#contact"
                        class="w-full inline-flex items-center justify-center
                               gap-2 px-5 py-3 rounded-xl
                               bg-gradient-to-r from-ck-purple to-ck-pink
                               text-white font-bold text-sm
                               uppercase tracking-wider
                               shadow-lg shadow-purple-500/20
                               hover:shadow-xl hover:scale-[1.02]
                               transition-all duration-300"
                    >
                        Learn More
                        <i class="fas fa-arrow-right text-xs"></i>
                    </a>

                </div>

            </div>

        </div>

    </div>
</section>




    <!-- Portfolio / Work -->
 <section id="portfolio" class="py-32 bg-ck-bg relative overflow-hidden">
    <div class="container mx-auto px-6">
        <div class="text-center mb-20" data-aos="fade-up">
            <span class="text-ck-purple font-bold uppercase tracking-[0.3em] text-xl">Portfolio</span>
            <h2 class="text-3xl md:text-3xl font-display mt-4 text-ck-dark font-extrabold">Our Recent <span class="animated-text">Successes</span></h2>
            <p class="text-gray-500 mt-4 max-w-2xl mx-auto">Driving Real Results through Optimized Google My Business profiles, Engaging Social Media Pages, High-Converting Meta Ads, and Stunning Websites.</p>
        </div>

        <!-- Bento Grid Layout -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 auto-rows-[300px]">
            
            <!-- 1. Google My Business (Large Feature) -->
            <div class="relative group overflow-hidden rounded-3xl cursor-pointer shadow-lg md:col-span-2 lg:col-span-2 lg:row-span-2" data-aos="zoom-in-up">
                <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?auto=format&fit=crop&w=1200&q=80" alt="GMB Optimization" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-ck-dark/95 via-ck-dark/40 to-transparent flex flex-col justify-end p-8">
                    <div class="flex gap-2 mb-3">
                        <span class="text-white text-xs uppercase font-bold tracking-widest bg-blue-500 w-max px-3 py-1 rounded-full shadow-lg">Google My Business</span>
                        <span class="text-ck-dark text-xs uppercase font-bold tracking-widest bg-yellow-400 w-max px-3 py-1 rounded-full shadow-lg flex items-center gap-1">⭐ 4.9 Rating</span>
                    </div>
                    <h3 class="text-3xl md:text-4xl font-display font-bold text-white">Local SEO & GMB Optimization</h3>
                    <p class="text-gray-300 mt-2 max-w-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 max-h-0 group-hover:max-h-20 overflow-hidden">Increased local search visibility and foot traffic by 140% for our clients through fully optimized Google My Business profiles and review generation strategies.</p>
                </div>
            </div>

            <!-- 2. Facebook Pages -->
            <div class="relative group overflow-hidden rounded-3xl cursor-pointer shadow-lg" data-aos="zoom-in-up" data-aos-delay="100">
                <img src="https://images.unsplash.com/photo-1611162617474-5b21e879e113?auto=format&fit=crop&w=600&q=80" alt="Facebook Page Management" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-ck-dark/95 via-ck-dark/40 to-transparent flex flex-col justify-end p-6">
                    <span class="text-white text-xs uppercase font-bold tracking-widest mb-2 bg-blue-600 w-max px-3 py-1 rounded-full shadow-lg">Facebook Pages</span>
                    <h3 class="text-2xl font-display font-bold text-white">Social Community Management</h3>
                </div>
            </div>

            <!-- 3. Meta Ads -->
            <div class="relative group overflow-hidden rounded-3xl cursor-pointer shadow-lg" data-aos="zoom-in-up" data-aos-delay="200">
                <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=600&q=80" alt="Meta Ads Campaign" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-ck-dark/95 via-ck-dark/40 to-transparent flex flex-col justify-end p-6">
                    <div class="flex gap-2 mb-2">
                        <span class="text-white text-xs uppercase font-bold tracking-widest bg-gradient-to-r from-ck-purple to-ck-pink w-max px-3 py-1 rounded-full shadow-lg">Meta Ads</span>
                    </div>
                    <h3 class="text-2xl font-display font-bold text-white">High-ROAS Ad Campaigns</h3>
                    <span class="text-green-400 font-bold text-sm mt-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300">Avg 4.2x Return on Ad Spend</span>
                </div>
            </div>

            <!-- 4. Landing Page (Wide) -->
            <div class="relative group overflow-hidden rounded-3xl cursor-pointer shadow-lg md:col-span-2" data-aos="zoom-in-up" data-aos-delay="300">
                <img src="https://images.unsplash.com/photo-1467232004584-a241de8bcf5d?auto=format&fit=crop&w=1200&q=80" alt="Landing Page Design" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-ck-dark/95 via-ck-dark/40 to-transparent flex flex-col justify-end p-8">
                    <span class="text-white text-xs uppercase font-bold tracking-widest mb-2 bg-gradient-to-r from-ck-purple to-ck-pink w-max px-3 py-1 rounded-full shadow-lg">Landing Pages</span>
                    <h3 class="text-3xl font-display font-bold text-white">High-Converting Landing Pages</h3>
                    <p class="text-gray-300 mt-2 max-w-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300">Custom built landing pages designed specifically to turn traffic into leads and sales.</p>
                </div>
            </div>

            <!-- 5. Website Design -->
            <div class="relative group overflow-hidden rounded-3xl cursor-pointer shadow-lg" data-aos="zoom-in-up" data-aos-delay="400">
                <img src="https://images.unsplash.com/photo-1547658719-da2b51169166?auto=format&fit=crop&w=600&q=80" alt="Website Development" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-ck-dark/95 via-ck-dark/40 to-transparent flex flex-col justify-end p-6">
                    <span class="text-white text-xs uppercase font-bold tracking-widest mb-2 bg-gray-800 w-max px-3 py-1 rounded-full shadow-lg">Websites</span>
                    <h3 class="text-2xl font-display font-bold text-white">Full Website Development</h3>
                </div>
            </div>

        </div>
    </div>
</section>

    <!-- Testimonials -->
    <section class="py-32 bg-white relative">
        <div class="container mx-auto px-6">
            <div class="text-center mb-20" data-aos="fade-up">
                <span class="text-ck-pink font-bold uppercase tracking-[0.3em] text-xl">Testimonials</span>
                <h2 class="text-3xl md:text-3xl font-display mt-4 text-ck-dark font-extrabold">What Clients <span class="animated-text">Say</span></h2>
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
    <!-- Section Label -->
    <span class="text-ck-pink font-bold uppercase tracking-[0.3em] text-sm md:text-base">
        Get In Touch
    </span>

    <!-- Heading -->
    <h2 class="text-xl md:text-xl font-display mt-4 mb-6 text-ck-dark font-extrabold leading-tight">
        Let’s Grow Your <br>
        Business <span class="animated-text">Together</span>
    </h2>

    <!-- Description -->
    <p class="text-ck-dark/70 mb-6 text-lg font-medium leading-relaxed">
        Whether you need a Professional Website, More Leads through Meta & Google Ads,
        a Stronger Social Media Presence, Engaging Content and Videos, Impactful Branding,
        or GeM Registration Support, CK Editz Digital Solutions provides the right Digital
        Solutions to help your Business Build, Reach, and Grow.
    </p>

    <!-- Enquiry Information -->
    <div class="mb-8">
        <h3 class="text-xl font-display font-bold text-ck-dark mb-2">
            Tell Us What You Need
        </h3>

        <p class="text-ck-dark/70 text-base font-medium leading-relaxed">
            Fill out the enquiry form with your requirements.
            Our team will review your request and contact you within 24 hours.
        </p>
    </div>

    <!-- Contact Details -->
    <div class="space-y-6">

        <!-- Location -->
        <div class="flex items-start gap-4">
            <div class="w-14 h-14 min-w-[56px] bg-gradient-to-br from-ck-purple to-ck-pink
                        rounded-2xl flex items-center justify-center text-white text-xl
                        shadow-lg shadow-purple-500/30">
                <i class="fas fa-map-marker-alt"></i>
            </div>

            <div>
                <h4 class="font-display font-bold text-ck-dark text-lg mb-1">
                    Our Location
                </h4>

                <p class="text-ck-dark/60 font-medium leading-relaxed">
                    No. 10/6, First Floor,<br>
                    2nd Main Road, Vijaya Nagar,<br>
                    Velachery, Chennai – 600042,<br>
                    Tamil Nadu, India.
                </p>

                <!-- Google Maps -->
                <a
                    href="https://www.google.com/maps/search/?api=1&query=K+G+S+Technologies,+No+10,+2nd+Main+Rd,+Vijaya+Nagar,+Velachery,+Chennai,+Tamil+Nadu+600042"
            target="_blank"
                    rel="noopener noreferrer"
                    class="inline-flex items-center gap-2 mt-3 text-ck-purple font-bold hover:text-ck-pink transition"
                >
                    <i class="fas fa-location-arrow"></i>
                    Get Directions
                </a>
            </div>
        </div>

        <!-- Email -->
        <div class="flex items-start gap-4">
            <div class="w-14 h-14 min-w-[56px] bg-gradient-to-br from-ck-cyan to-ck-purple
                        rounded-2xl flex items-center justify-center text-white text-xl
                        shadow-lg shadow-cyan-500/30">
                <i class="fas fa-envelope"></i>
            </div>

            <div>
                <h4 class="font-display font-bold text-ck-dark text-lg mb-1">
                    Email Us
                </h4>

                <a
                    href="mailto:ckeditz09@gmail.com"
                    class="text-ck-dark/60 font-medium hover:text-ck-purple transition"
                >
                    ckeditz09@gmail.com
                </a>
            </div>
        </div>

    </div>
</div>

            <div class="gradient-border p-10 rounded-3xl shadow-2xl" data-aos="fade-left">
                <div ng-if="formSuccess"
     class="mb-6 bg-green-100 border border-green-200 text-green-700 p-4 rounded-xl text-center font-bold flex items-center justify-center gap-2">
    <i class="fas fa-check-circle"></i>
    Thank you! Your message has been sent successfully.
</div>

<div ng-if="formError"
     class="mb-6 bg-red-100 border border-red-200 text-red-700 p-4 rounded-xl text-center font-bold flex items-center justify-center gap-2">
    <i class="fas fa-exclamation-circle"></i>
    Sorry, something went wrong. Please try again.
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
                        <div>
        <label class="block text-ck-dark/70 text-sm mb-2 font-bold uppercase tracking-wider">
            Phone Number
        </label>

        <input
            type="tel"
            required
            ng-model="formData.phone"
            pattern="[0-9]{10}"
            maxlength="10"
            class="w-full bg-ck-bg border border-purple-100 rounded-xl px-4 py-3 text-ck-dark focus:outline-none focus:border-ck-purple focus:bg-white transition font-medium"
            placeholder="9876543210">
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
                    <button type="submit"
        ng-disabled="sending"
        class="w-full btn-magic text-white py-4 rounded-xl font-display font-bold text-lg uppercase tracking-wider flex items-center justify-center gap-2 disabled:opacity-60">

    <span ng-if="!sending">
        Send Message <i class="fas fa-paper-plane"></i>
    </span>

    <span ng-if="sending">
        Sending... <i class="fas fa-spinner fa-spin"></i>
    </span>

</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->

<!-- Footer -->
@include('ck_editz.footer')


    <!-- Back to Top Button -->
    <button ng-if="scrolled" ng-click="scrollToTop()" class="fixed bottom-8 right-8 w-14 h-14 btn-magic text-white rounded-full shadow-lg flex items-center justify-center z-50 animate-bounce">
        <i class="fas fa-arrow-up"></i>
    </button>
    @include('ck_editz.whatsapp-button')

    <!-- AngularJS Script -->
    <script>
        var app = angular.module('ckEditzApp', []);
        
        app.controller('MainController', function($scope, $timeout, $window, $http) {
            // Preloader & Init
            $timeout(function() {
                $scope.pageLoaded = true;
            }, 1000);

            // Init AOS after the complete page is loaded to prevent layout shifts
            $timeout(function () {
                if (typeof AOS !== 'undefined') {
                    AOS.init({
                        duration: 1000,
                        once: true,
                        offset: 100,
                        easing: 'ease-out-cubic',
                        disable: false
                    });

                    // Force AOS to calculate positions again
                    AOS.refreshHard();
                }
            }, 300);

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

    {
        title: 'Meta Ads',
        headline: 'Target the Right Audience. Generate Better Leads.',
        icon:"{{ asset('img/icons/digital-marketing.png') }}",

        shortDescription: 'Strategic Facebook & Instagram advertising campaigns designed to reach your ideal customers...',

        description: 'Strategic Facebook & Instagram advertising campaigns designed to reach your ideal customers, increase enquiries, and drive business growth.',

        colorClass: 'text-ck-purple bg-purple-50',
        url: "{{ route('meta') }}"
    },

    {
        title: 'Google Ads (PPC)',
        headline: 'Reach Customers When They’re Ready to Buy.',
        icon:"{{ asset('img/icons/google-ads.png') }}",

        shortDescription: 'Target high-intent customers actively searching for your products or services...',

        description: 'Target high-intent customers actively searching for your products or services with strategically optimized Google Ads campaigns designed to increase qualified traffic, enquiries, and conversions.',

        colorClass: 'text-ck-cyan bg-cyan-50',
        url: "{{ route('googleads') }}"
    },

    {
        title: 'Google Business Profile',
        headline: 'Get Found by Customers Near You.',
        icon: "{{ asset('img/icons/gmb.png') }}",

        shortDescription: 'Optimize your Google Business Profile to improve local visibility and attract more customers...',

        description: 'Optimize your Google Business Profile to improve local visibility, attract more calls, website visits, directions, and enquiries from customers searching for your business.',

        colorClass: 'text-ck-pink bg-pink-50',
        url: "{{ route('gmb') }}"
    },

    {
        title: 'Social Media Management',
        headline: 'Stay Visible. Stay Connected. Stay Top of Mind.',
        icon: "{{ asset('img/icons/social-media.png') }}",

        shortDescription: 'We manage your social media from content creation to posting and audience engagement...',

        description: 'We manage your social media from content creation to posting and audience engagement, helping your brand build a strong presence, connect with the right audience, and grow consistently.',

        colorClass: 'text-ck-purple bg-purple-50',
        url: "{{ route('socialmediahandling') }}"
    },

    {
        title: 'Video Editing',
        headline: 'Turn Every Frame Into Impact.',
        icon: "{{ asset('img/icons/video-editing.png') }}",

        shortDescription: 'Professional video editing for Reels, YouTube, Ads, and business content...',

        description: 'Professional video editing for Reels, YouTube, Ads, and business content—designed to capture attention, tell your story, and keep your audience engaged.',

        colorClass: 'text-ck-cyan bg-cyan-50',
        url: "{{ route('videoediting') }}"
    },

    {
        title: 'Poster Designing',
        headline: 'Designs That Get Noticed.',
        icon: "{{ asset('img/icons/poster-design.png') }}",

        shortDescription: 'Creative, professional and scroll-stopping designs for social media, promotions and business campaigns...',

        description: 'Creative, professional and scroll-stopping designs for social media, promotions, offers and business campaigns—built to capture attention and strengthen your brand.',

        colorClass: 'text-ck-pink bg-pink-50',
        url: "{{ route('posterdesign') }}"
    },

    {
        title: 'Website Design',
        headline: 'Your Website. Your First Impression. Your Growth.',
        icon: "{{ asset('img/icons/code.png') }}",

        shortDescription: 'We create modern, responsive and high-converting websites that build credibility...',

        description: 'We create modern, responsive and high-converting websites that build credibility, showcase your value, and turn visitors into customers and enquiries.',

        colorClass: 'text-ck-purple bg-purple-50',
        url: "{{ route('websitedesign') }}"
    },

    {
        title: 'Landing Page Design',
        headline: 'Turn Clicks Into Quality Leads.',
        icon: "{{ asset('img/icons/landing-page.png') }}",

        shortDescription: 'High-converting landing pages built specifically for your Meta & Google Ads campaigns...',

        description: 'High-converting landing pages built specifically for your Meta & Google Ads campaigns, designed to capture attention, generate enquiries, and maximize your marketing ROI.',

        colorClass: 'text-ck-cyan bg-cyan-50',
        url: "{{ route('landingpage') }}"
    },

    {
        title: 'Domain Registration',
        headline: 'Secure Your Digital Identity.',
        icon: "{{ asset('img/icons/domain-name.png') }}",

        shortDescription: 'Find and register the perfect domain name for your business...',

        description: 'Find and register the perfect domain name for your business—simple, professional and aligned with your brand.',

        colorClass: 'text-ck-pink bg-pink-50',
        url: "{{ route('domainregistration') }}"
    },

    {
        title: 'Hosting Support',
        headline: 'Keep Your Website Fast, Secure & Online.',
        icon: "{{ asset('img/icons/cloud-server.png') }}",

        shortDescription: 'Reliable hosting support to ensure your website stays secure, stable and accessible...',

        description: 'Reliable hosting support to ensure your website stays secure, stable and accessible, with ongoing assistance when you need it.',

        colorClass: 'text-ck-purple bg-purple-50',
        url: "{{ route('hostingsupport') }}"
    },

    {
        title: 'GEM Registration',
        headline: 'Take Your Business to the Government Marketplace.',
        icon: 'fas fa-file-signature',

        shortDescription: 'Get hassle-free assistance with GEM registration and prepare your business for government procurement opportunities...',

        description: 'Get hassle-free assistance with GEM (Government e-Marketplace) registration, helping your business complete the process correctly and get ready to explore government procurement opportunities.',

        colorClass: 'text-ck-cyan bg-cyan-50',
        url: "{{ route('gem') }}"
    }

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

            $scope.formData = {
                name: '',
                email: '',
                phone: '',
                subject: '',
                message: ''
            };

            $scope.formSuccess = false;
            $scope.formError = false;
            $scope.sending = false;

            $scope.submitContactForm = function () {

                $scope.formSuccess = false;
                $scope.formError = false;
                $scope.sending = true;

                $http.post('/contact/send', $scope.formData)
                    .then(function (response) {

                        if (response.data.success) {

                            $scope.formSuccess = true;

                            // Clear form
                            $scope.formData = {
                                name: '',
                                email: '',
                                phone: '',
                                subject: '',
                                message: ''
                            };

                        } else {
                            $scope.formError = true;
                        }

                    })
                    .catch(function (error) {

                        console.error('Contact form error:', error);

                        $scope.formError = true;

                    })
                    .finally(function () {

                        $scope.sending = false;

                    });
            };
        });
    </script>
</body>
</html>
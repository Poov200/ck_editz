<!DOCTYPE html>
<html lang="en" ng-app="ckEditzApp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GMB Optimization | CK Editz</title>
    
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
                        // Google Brand Colors
                        'g-blue': '#4285F4',
                        'g-red': '#EA4335',
                        'g-green': '#34A853',
                        'g-yellow': '#FBBC05',
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
        .cursor-dot { width: 8px; height: 8px; background: #EA4335; }
        .cursor-outline { width: 40px; height: 40px; border: 2px solid #4285F4; }
        @media (max-width: 768px) { body { cursor: auto; } .cursor-dot, .cursor-outline { display: none; } }

        /* Animated Google Gradient Text */
        .animated-text {
            background: linear-gradient(to right, #4285F4, #EA4335, #FBBC05, #34A853, #4285F4);
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
            box-shadow: 20px 20px 60px rgba(66, 133, 244, 0.2), -10px -10px 40px rgba(234, 67, 53, 0.1);
        }
        .card-3d:hover .icon-box { transform: rotate(-10deg) scale(1.1); }
        .icon-box { transition: transform 0.4s ease; }

        /* Gradient Border Wrapper */
        .gradient-border {
            background: linear-gradient(white, white) padding-box,
                        linear-gradient(135deg, #4285F4, #EA4335, #FBBC05, #34A853) border-box;
            border: 2px solid transparent;
        }

        /* Button Magic (Google Colors) */
        .btn-magic {
            background: linear-gradient(135deg, #4285F4, #34A853);
            background-size: 200% auto;
            transition: all 0.4s ease;
            box-shadow: 0 4px 15px rgba(66, 133, 244, 0.4);
        }
        .btn-magic:hover {
            background-position: right center;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(52, 168, 83, 0.5);
        }

        /* Navbar Shrink */
        .nav-scrolled {
            padding-top: 0.5rem !important; padding-bottom: 0.5rem !important;
            background: rgba(240, 243, 255, 0.8) !important; backdrop-filter: blur(16px);
            box-shadow: 0 4px 30px rgba(0,0,0,0.05);
        }

        /* Mobile Menu */
        .mobile-menu { transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1); }

        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #F0F3FF; }
        ::-webkit-scrollbar-thumb { background: linear-gradient(to bottom, #4285F4, #34A853); border-radius: 4px; }
    </style>
</head>
<body ng-controller="MainController">

    <!-- Custom Cursor Elements -->
    <div class="cursor-dot" ng-style="{ top: mouseY + 'px', left: mouseX + 'px' }"></div>
    <div class="cursor-outline" ng-style="{ top: mouseY + 'px', left: mouseX + 'px' }"></div>

    @include('ck_editz.navbar')

    <!-- ========================================== -->
    <!-- GMB OPTIMIZATION DEDICATED PAGE CONTENT    -->
    <!-- ========================================== -->

    <!-- Hero Section -->
    <section class="relative pt-40 pb-20 md:pt-48 md:pb-32 bg-ck-dark overflow-hidden">
        <div class="absolute inset-0 z-0 pointer-events-none">
            <div class="absolute top-20 right-10 w-96 h-96 bg-g-blue blob filter blur-[120px] opacity-40 animate-float"></div>
            <div class="absolute bottom-20 left-10 w-96 h-96 bg-g-red blob filter blur-[120px] opacity-40 animate-float" style="animation-delay: 3s;"></div>
        </div>
        <div class="container mx-auto px-6 grid lg:grid-cols-2 gap-12 items-center relative z-10">
            <div data-aos="fade-up">
                <a href="/" class="inline-flex items-center gap-2 text-g-blue font-bold mb-8 hover:gap-4 transition-all">
                    <i class="fas fa-arrow-left"></i> Back to Services
                </a>
                <span class="inline-block px-4 py-2 mb-6 text-xs font-bold rounded-full bg-white/10 text-g-green shadow-lg uppercase tracking-widest border border-green-500/20">
                    ✦ Local SEO & Maps
                </span>
                <h1 class="text-5xl md:text-6xl font-display font-extrabold text-white leading-tight mb-6">
                    Dominate Local Search with <span class="animated-text">Google My Business</span>
                </h1>
                <p class="text-lg text-white/70 mb-10 max-w-xl font-medium">
                    Capture customers right when they are searching for local businesses. We optimize your Google My Business profile to rank #1 on Google Maps and Local Search results.
                </p>
                <a href="#cta" class="inline-flex items-center gap-2 btn-magic text-white px-8 py-4 rounded-full font-bold text-sm uppercase tracking-wider">
                    Optimize My Profile <i class="fas fa-map-marked-alt"></i>
                </a>
            </div>
            <div class="relative hidden md:block" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="300">
                <div class="absolute -inset-4 bg-gradient-to-tr from-g-blue via-g-yellow to-g-green blob opacity-80 blur-lg"></div>
                <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?q=80&w=2069&auto=format&fit=crop" alt="Local SEO" class="relative w-full h-[450px] object-cover rounded-[3rem] border-4 border-white/10">
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="py-24 bg-ck-bg">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="text-g-red font-bold uppercase tracking-[0.3em] text-xs">Why Choose GMB?</span>
                <h2 class="text-4xl md:text-5xl font-display mt-4 text-ck-dark font-extrabold">Benefits of <span class="animated-text">Google My Business</span></h2>
                <p class="text-ck-dark/60 mt-4 max-w-2xl mx-auto font-medium">A fully optimized GMB profile is the most powerful tool for driving local foot traffic and calls.</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-blue-100 card-3d" data-aos="fade-up">
                    <div class="icon-box w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center text-3xl mb-6 text-g-blue">
                        <i class="fas fa-store"></i>
                    </div>
                    <h3 class="text-xl font-display font-bold text-ck-dark mb-3">Map Visibility</h3>
                    <p class="text-ck-dark/60 font-medium">Appear at the top of Google Maps, making it incredibly easy for local customers to find and navigate to your store.</p>
                </div>
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-red-100 card-3d" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon-box w-16 h-16 bg-red-50 rounded-2xl flex items-center justify-center text-3xl mb-6 text-g-red">
                        <i class="fas fa-star"></i>
                    </div>
                    <h3 class="text-xl font-display font-bold text-ck-dark mb-3">Build Trust</h3>
                    <p class="text-ck-dark/60 font-medium">Collect and showcase authentic customer reviews, building immediate trust and credibility for your brand.</p>
                </div>
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-yellow-100 card-3d" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon-box w-16 h-16 bg-yellow-50 rounded-2xl flex items-center justify-center text-3xl mb-6 text-g-yellow">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3 class="text-xl font-display font-bold text-ck-dark mb-3">Mobile Dominance</h3>
                    <p class="text-ck-dark/60 font-medium">Capture the massive mobile search market. "Near me" searches lead directly to direct calls and directions.</p>
                </div>
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-green-100 card-3d" data-aos="fade-up" data-aos-delay="300">
                    <div class="icon-box w-16 h-16 bg-green-50 rounded-2xl flex items-center justify-center text-3xl mb-6 text-g-green">
                        <i class="fas fa-gift"></i>
                    </div>
                    <h3 class="text-xl font-display font-bold text-ck-dark mb-3">It's Free Traffic</h3>
                    <p class="text-ck-dark/60 font-medium">Organic local search traffic costs you nothing per click. It's the highest ROI channel for physical businesses.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Optimization Features Section -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="text-g-green font-bold uppercase tracking-[0.3em] text-xs">Our Services</span>
                <h2 class="text-4xl md:text-5xl font-display mt-4 text-ck-dark font-extrabold">What We <span class="animated-text">Optimize</span></h2>
                <p class="text-ck-dark/60 mt-4 max-w-2xl mx-auto font-medium">We handle every aspect of your Google My Business profile to ensure maximum local reach.</p>
            </div>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="flex items-start gap-6 bg-ck-bg p-8 rounded-3xl border border-blue-100" data-aos="fade-right">
                    <div class="w-16 h-16 bg-gradient-to-br from-g-blue to-g-green rounded-2xl flex items-center justify-center text-2xl text-white flex-shrink-0 shadow-lg"><i class="fas fa-id-card"></i></div>
                    <div>
                        <h3 class="text-xl font-display font-bold text-ck-dark mb-2">Profile Setup & Verification</h3>
                        <p class="text-ck-dark/60 font-medium">Complete creation, verification, and optimization of your business category, hours, and contact info.</p>
                    </div>
                </div>
                <div class="flex items-start gap-6 bg-ck-bg p-8 rounded-3xl border border-red-100" data-aos="fade-left">
                    <div class="w-16 h-16 bg-gradient-to-br from-g-red to-g-yellow rounded-2xl flex items-center justify-center text-2xl text-white flex-shrink-0 shadow-lg"><i class="fas fa-camera"></i></div>
                    <div>
                        <h3 class="text-xl font-display font-bold text-ck-dark mb-2">Photo & Video Updates</h3>
                        <p class="text-ck-dark/60 font-medium">Regular posting of high-quality images and videos of your products, team, and storefront to engage users.</p>
                    </div>
                </div>
                <div class="flex items-start gap-6 bg-ck-bg p-8 rounded-3xl border border-yellow-100" data-aos="fade-right">
                    <div class="w-16 h-16 bg-gradient-to-br from-g-yellow to-g-blue rounded-2xl flex items-center justify-center text-2xl text-white flex-shrink-0 shadow-lg"><i class="fas fa-comments"></i></div>
                    <div>
                        <h3 class="text-xl font-display font-bold text-ck-dark mb-2">Review Management</h3>
                        <p class="text-ck-dark/60 font-medium">We help you generate more 5-star reviews and professionally respond to customer feedback.</p>
                    </div>
                </div>
                <div class="flex items-start gap-6 bg-ck-bg p-8 rounded-3xl border border-green-100" data-aos="fade-left">
                    <div class="w-16 h-16 bg-gradient-to-br from-g-green to-g-red rounded-2xl flex items-center justify-center text-2xl text-white flex-shrink-0 shadow-lg"><i class="fas fa-bullhorn"></i></div>
                    <div>
                        <h3 class="text-xl font-display font-bold text-ck-dark mb-2">Local Posts & Offers</h3>
                        <p class="text-ck-dark/60 font-medium">Publishing weekly updates, special offers, and events directly on your Google profile to drive action.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Process for GMB -->
    <section class="py-24 bg-ck-bg">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="text-g-blue font-bold uppercase tracking-[0.3em] text-xs">Our Strategy</span>
                <h2 class="text-4xl md:text-5xl font-display mt-4 text-ck-dark font-extrabold">How We <span class="animated-text">Optimize GMB</span></h2>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center p-6 bg-white rounded-3xl border border-blue-100 shadow-sm" data-aos="fade-up">
                    <div class="w-16 h-16 mx-auto bg-gradient-to-br from-g-blue to-g-green rounded-full flex items-center justify-center text-2xl mb-4 font-display font-bold text-white shadow-lg">1</div>
                    <h4 class="text-lg font-display font-bold mb-2 text-ck-dark">Profile Audit</h4>
                    <p class="text-ck-dark/60 text-sm font-medium">We audit your current GMB profile to find missing info and optimization opportunities.</p>
                </div>
                <div class="text-center p-6 bg-white rounded-3xl border border-red-100 shadow-sm" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-16 h-16 mx-auto bg-gradient-to-br from-g-red to-g-yellow rounded-full flex items-center justify-center text-2xl mb-4 font-display font-bold text-white shadow-lg">2</div>
                    <h4 class="text-lg font-display font-bold mb-2 text-ck-dark">Keyword Mapping</h4>
                    <p class="text-ck-dark/60 text-sm font-medium">We find the local search terms your customers use and implement them into your profile.</p>
                </div>
                <div class="text-center p-6 bg-white rounded-3xl border border-yellow-100 shadow-sm" data-aos="fade-up" data-aos-delay="400">
                    <div class="w-16 h-16 mx-auto bg-gradient-to-br from-g-yellow to-g-blue rounded-full flex items-center justify-center text-2xl mb-4 font-display font-bold text-white shadow-lg">3</div>
                    <h4 class="text-lg font-display font-bold mb-2 text-ck-dark">Full Optimization</h4>
                    <p class="text-ck-dark/60 text-sm font-medium">We update descriptions, attributes, services, and upload high-quality media to your profile.</p>
                </div>
                <div class="text-center p-6 bg-white rounded-3xl border border-green-100 shadow-sm" data-aos="fade-up" data-aos-delay="600">
                    <div class="w-16 h-16 mx-auto bg-gradient-to-br from-g-green to-g-red rounded-full flex items-center justify-center text-2xl mb-4 font-display font-bold text-white shadow-lg">4</div>
                    <h4 class="text-lg font-display font-bold mb-2 text-ck-dark">Ongoing Growth</h4>
                    <p class="text-ck-dark/60 text-sm font-medium">We post weekly updates and manage reviews to keep your ranking at the top of Maps.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="cta" class="py-20 bg-ck-dark relative overflow-hidden">
        <div class="absolute top-0 left-1/2 w-96 h-96 bg-g-blue blob filter blur-[150px] opacity-30"></div>
        <div class="container mx-auto px-6 text-center relative z-10" data-aos="zoom-in">
            <h2 class="text-3xl md:text-5xl font-display font-extrabold text-white mb-6">Ready to Rank on <span class="animated-text">Google Maps?</span></h2>
            <p class="text-white/70 max-w-2xl mx-auto mb-8 text-lg font-medium">Let our local SEO experts optimize your Google My Business profile. Get a free audit and strategy session today.</p>
            <!-- Change href to your main index.html contact section -->
            <a href="index.html#contact" class="inline-flex items-center gap-2 btn-magic text-white px-8 py-4 rounded-full font-bold text-sm uppercase tracking-wider">
                Get Free Consultation <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </section>

    <!-- ========================================== -->
    <!-- END GMB OPTIMIZATION PAGE CONTENT          -->
    <!-- ========================================== -->

    @include('ck_editz.footer')

    <!-- Back to Top Button -->
    <button ng-if="scrolled" ng-click="scrollToTop()" class="fixed bottom-8 right-8 w-14 h-14 btn-magic text-white rounded-full shadow-lg flex items-center justify-center z-50 animate-bounce">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- AngularJS Script -->
    <script>
        var app = angular.module('ckEditzApp', []);
        
        app.controller('MainController', function($scope, $timeout, $window) {
            // Init AOS
            AOS.init({ duration: 1000, once: true, offset: 100, easing: 'ease-out-cubic' });

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
        });
    </script>
</body>
</html>
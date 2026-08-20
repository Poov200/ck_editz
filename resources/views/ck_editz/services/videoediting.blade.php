<!DOCTYPE html>
<html lang="en" ng-app="ckEditzApp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Editing | CK Editz</title>
    
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
        .cursor-dot { width: 8px; height: 8px; background: #06B6D4; }
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
            box-shadow: 20px 20px 60px rgba(139, 92, 246, 0.2), -10px -10px 40px rgba(6, 182, 212, 0.1);
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

        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #F0F3FF; }
        ::-webkit-scrollbar-thumb { background: linear-gradient(to bottom, #8B5CF6, #EC4899); border-radius: 4px; }
    </style>
</head>
<body ng-controller="MainController">

    <!-- Custom Cursor Elements -->
    <div class="cursor-dot" ng-style="{ top: mouseY + 'px', left: mouseX + 'px' }"></div>
    <div class="cursor-outline" ng-style="{ top: mouseY + 'px', left: mouseX + 'px' }"></div>

    @include('ck_editz.navbar')

    <!-- ========================================== -->
    <!-- VIDEO EDITING DEDICATED PAGE CONTENT       -->
    <!-- ========================================== -->

    <!-- Hero Section -->
    <section class="relative pt-40 pb-20 md:pt-48 md:pb-32 bg-ck-dark overflow-hidden">
        <div class="absolute inset-0 z-0 pointer-events-none">
            <div class="absolute top-20 right-10 w-96 h-96 bg-ck-cyan blob filter blur-[120px] opacity-40 animate-float"></div>
            <div class="absolute bottom-20 left-10 w-96 h-96 bg-ck-purple blob filter blur-[120px] opacity-40 animate-float" style="animation-delay: 3s;"></div>
        </div>
        <div class="container mx-auto px-6 grid lg:grid-cols-2 gap-12 items-center relative z-10">
            <div data-aos="fade-up">
                <a href="/" class="inline-flex items-center gap-2 text-ck-cyan font-bold mb-8 hover:gap-4 transition-all">
                    <i class="fas fa-arrow-left"></i> Back to Services
                </a>
                <span class="inline-block px-4 py-2 mb-6 text-xs font-bold rounded-full bg-white/10 text-ck-cyan shadow-lg uppercase tracking-widest border border-cyan-500/20">
                    ✦ Creative Video Production
                </span>
                <h1 class="text-5xl md:text-6xl font-display font-extrabold text-white leading-tight mb-6">
                    Bring Your Story to Life with <span class="animated-text">Professional Video Editing</span>
                </h1>
                <p class="text-lg text-white/70 mb-10 max-w-xl font-medium">
                    From viral social media reels to high-converting ad creatives and YouTube vlogs. We craft visually stunning, emotionally engaging videos that captivate your audience from the very first second.
                </p>
                <a href="#cta" class="inline-flex items-center gap-2 btn-magic text-white px-8 py-4 rounded-full font-bold text-sm uppercase tracking-wider">
                    Start Editing <i class="fas fa-video"></i>
                </a>
            </div>
            <div class="relative hidden md:block" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="300">
                <div class="absolute -inset-4 bg-gradient-to-tr from-ck-cyan via-ck-purple to-ck-pink blob opacity-80 blur-lg"></div>
                <img src="https://images.unsplash.com/photo-1574717024653-61fd2cf4d44d?q=80&w=1973&auto=format&fit=crop" alt="Video Editing Studio" class="relative w-full h-[450px] object-cover rounded-[3rem] border-4 border-white/10">
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="py-24 bg-ck-bg">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="text-ck-purple font-bold uppercase tracking-[0.3em] text-xs">Why Use Video?</span>
                <h2 class="text-4xl md:text-5xl font-display mt-4 text-ck-dark font-extrabold">The Power of <span class="animated-text">Video Content</span></h2>
                <p class="text-ck-dark/60 mt-4 max-w-2xl mx-auto font-medium">Video is the most consumed and shared content format on the internet. Don't get left behind.</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-cyan-100 card-3d" data-aos="fade-up">
                    <div class="icon-box w-16 h-16 bg-cyan-50 rounded-2xl flex items-center justify-center text-3xl mb-6 text-ck-cyan">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h3 class="text-xl font-display font-bold text-ck-dark mb-3">Max Engagement</h3>
                    <p class="text-ck-dark/60 font-medium">Videos capture attention instantly and keep viewers on your page or profile much longer than static images.</p>
                </div>
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-purple-100 card-3d" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon-box w-16 h-16 bg-purple-50 rounded-2xl flex items-center justify-center text-3xl mb-6 text-ck-purple">
                        <i class="fas fa-bullhorn"></i>
                    </div>
                    <h3 class="text-xl font-display font-bold text-ck-dark mb-3">Higher Conversions</h3>
                    <p class="text-ck-dark/60 font-medium">Including a video on your landing page or ad can increase conversion rates by over 80%.</p>
                </div>
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-pink-100 card-3d" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon-box w-16 h-16 bg-pink-50 rounded-2xl flex items-center justify-center text-3xl mb-6 text-ck-pink">
                        <i class="fas fa-share-alt"></i>
                    </div>
                    <h3 class="text-xl font-display font-bold text-ck-dark mb-3">Viral Potential</h3>
                    <p class="text-ck-dark/60 font-medium">Creative, emotionally driven videos are shared 1200% more times than text and image posts combined.</p>
                </div>
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-cyan-100 card-3d" data-aos="fade-up" data-aos-delay="300">
                    <div class="icon-box w-16 h-16 bg-cyan-50 rounded-2xl flex items-center justify-center text-3xl mb-6 text-ck-cyan">
                        <i class="fas fa-brain"></i>
                    </div>
                    <h3 class="text-xl font-display font-bold text-ck-dark mb-3">Brand Recall</h3>
                    <p class="text-ck-dark/60 font-medium">Viewers retain 95% of a message when they watch it in a video, compared to 10% when reading text.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Types of Videos We Edit Section -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="text-ck-pink font-bold uppercase tracking-[0.3em] text-xs">Our Expertise</span>
                <h2 class="text-4xl md:text-5xl font-display mt-4 text-ck-dark font-extrabold">Types of Videos <span class="animated-text">We Edit</span></h2>
                <p class="text-ck-dark/60 mt-4 max-w-2xl mx-auto font-medium">We handle everything from short-form social media content to long-form professional videos.</p>
            </div>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="flex items-start gap-6 bg-ck-bg p-8 rounded-3xl border border-cyan-100" data-aos="fade-right">
                    <div class="w-16 h-16 bg-gradient-to-br from-ck-cyan to-ck-purple rounded-2xl flex items-center justify-center text-2xl text-white flex-shrink-0 shadow-lg"><i class="fas fa-mobile-alt"></i></div>
                    <div>
                        <h3 class="text-xl font-display font-bold text-ck-dark mb-2">Reels & TikToks</h3>
                        <p class="text-ck-dark/60 font-medium">Fast-paced, trendy, and engaging vertical videos with captions, transitions, and trending audio.</p>
                    </div>
                </div>
                <div class="flex items-start gap-6 bg-ck-bg p-8 rounded-3xl border border-purple-100" data-aos="fade-left">
                    <div class="w-16 h-16 bg-gradient-to-br from-ck-purple to-ck-pink rounded-2xl flex items-center justify-center text-2xl text-white flex-shrink-0 shadow-lg"><i class="fab fa-youtube"></i></div>
                    <div>
                        <h3 class="text-xl font-display font-bold text-ck-dark mb-2">YouTube Videos & Vlogs</h3>
                        <p class="text-ck-dark/60 font-medium">Complete long-form editing including color grading, sound mixing, jump cuts, and effects.</p>
                    </div>
                </div>
                <div class="flex items-start gap-6 bg-ck-bg p-8 rounded-3xl border border-pink-100" data-aos="fade-right">
                    <div class="w-16 h-16 bg-gradient-to-br from-ck-pink to-ck-cyan rounded-2xl flex items-center justify-center text-2xl text-white flex-shrink-0 shadow-lg"><i class="fas fa-film"></i></div>
                    <div>
                        <h3 class="text-xl font-display font-bold text-ck-dark mb-2">Promotional Ads</h3>
                        <p class="text-ck-dark/60 font-medium">High-converting ad creatives for Facebook and Google Ads designed to stop the scroll.</p>
                    </div>
                </div>
                <div class="flex items-start gap-6 bg-ck-bg p-8 rounded-3xl border border-cyan-100" data-aos="fade-left">
                    <div class="w-16 h-16 bg-gradient-to-br from-ck-cyan to-ck-purple rounded-2xl flex items-center justify-center text-2xl text-white flex-shrink-0 shadow-lg"><i class="fas fa-shapes"></i></div>
                    <div>
                        <h3 class="text-xl font-display font-bold text-ck-dark mb-2">Motion Graphics</h3>
                        <p class="text-ck-dark/60 font-medium">Custom intros, animated logos, text animations, and visual effects to elevate your brand.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Process for Video Editing -->
    <section class="py-24 bg-ck-bg">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="text-ck-cyan font-bold uppercase tracking-[0.3em] text-xs">Our Strategy</span>
                <h2 class="text-4xl md:text-5xl font-display mt-4 text-ck-dark font-extrabold">How We <span class="animated-text">Edit Videos</span></h2>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center p-6 bg-white rounded-3xl border border-cyan-100 shadow-sm" data-aos="fade-up">
                    <div class="w-16 h-16 mx-auto bg-gradient-to-br from-ck-cyan to-ck-purple rounded-full flex items-center justify-center text-2xl mb-4 font-display font-bold text-white shadow-lg">1</div>
                    <h4 class="text-lg font-display font-bold mb-2 text-ck-dark">Footage Review</h4>
                    <p class="text-ck-dark/60 text-sm font-medium">We collect your raw footage, analyze it, and plan the perfect narrative flow.</p>
                </div>
                <div class="text-center p-6 bg-white rounded-3xl border border-purple-100 shadow-sm" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-16 h-16 mx-auto bg-gradient-to-br from-ck-purple to-ck-pink rounded-full flex items-center justify-center text-2xl mb-4 font-display font-bold text-white shadow-lg">2</div>
                    <h4 class="text-lg font-display font-bold mb-2 text-ck-dark">Cutting & Audio</h4>
                    <p class="text-ck-dark/60 text-sm font-medium">We cut out the fluff, sync audio, add background music, and perform noise reduction.</p>
                </div>
                <div class="text-center p-6 bg-white rounded-3xl border border-pink-100 shadow-sm" data-aos="fade-up" data-aos-delay="400">
                    <div class="w-16 h-16 mx-auto bg-gradient-to-br from-ck-pink to-ck-cyan rounded-full flex items-center justify-center text-2xl mb-4 font-display font-bold text-white shadow-lg">3</div>
                    <h4 class="text-lg font-display font-bold mb-2 text-ck-dark">Color & Effects</h4>
                    <p class="text-ck-dark/60 text-sm font-medium">Cinematic color grading, transitions, text overlays, and motion graphics are added.</p>
                </div>
                <div class="text-center p-6 bg-white rounded-3xl border border-cyan-100 shadow-sm" data-aos="fade-up" data-aos-delay="600">
                    <div class="w-16 h-16 mx-auto bg-gradient-to-br from-ck-cyan to-ck-purple rounded-full flex items-center justify-center text-2xl mb-4 font-display font-bold text-white shadow-lg">4</div>
                    <h4 class="text-lg font-display font-bold mb-2 text-ck-dark">Revisions & Delivery</h4>
                    <p class="text-ck-dark/60 text-sm font-medium">We send the draft for review, make necessary tweaks, and deliver the final 4K video.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="cta" class="py-20 bg-ck-dark relative overflow-hidden">
        <div class="absolute top-0 left-1/2 w-96 h-96 bg-ck-cyan blob filter blur-[150px] opacity-30"></div>
        <div class="container mx-auto px-6 text-center relative z-10" data-aos="zoom-in">
            <h2 class="text-3xl md:text-5xl font-display font-extrabold text-white mb-6">Ready to Create <span class="animated-text">Viral Videos?</span></h2>
            <p class="text-white/70 max-w-2xl mx-auto mb-8 text-lg font-medium">Let our creative editing team bring your raw footage to life. Get a free consultation and quote today.</p>
            <!-- Change href to your main index.html contact section -->
            <a href="index.html#contact" class="inline-flex items-center gap-2 btn-magic text-white px-8 py-4 rounded-full font-bold text-sm uppercase tracking-wider">
                Get Free Consultation <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </section>

    <!-- ========================================== -->
    <!-- END VIDEO EDITING PAGE CONTENT             -->
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
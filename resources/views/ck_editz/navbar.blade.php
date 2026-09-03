<!-- ========================================= -->
<!-- HEADER / NAVBAR -->
<!-- ========================================= -->

<header
    class="fixed top-0 left-0 w-full z-[9999] transition-all duration-300 py-6"
    ng-class="{'nav-scrolled': scrolled}">

    <nav
        class="container mx-auto px-6 flex justify-between items-center relative">

        <!-- ========================================= -->
        <!-- LOGO -->
        <!-- ========================================= -->

        <a href="{{ url('/') }}#home"
           class="flex items-center gap-3 group">

            <img
                src="{{ asset('img/logo.png') }}"
                alt="CK Editz Logo"
                class="w-12 h-12 rounded-full object-cover shadow-lg
                       group-hover:rotate-12 transition duration-300">

            <div class="hidden sm:block">

                <h1 class="text-xl font-display font-extrabold
                           text-ck-dark leading-none">
                    CK Editz
                </h1>

                <p class="text-[10px] tracking-[0.2em]
                          text-ck-purple font-semibold uppercase mt-1">
                    Digital Solutions
                </p>

            </div>

        </a>


        <!-- ========================================= -->
        <!-- DESKTOP NAVIGATION -->
        <!-- ========================================= -->

        <ul
            class="hidden lg:flex items-center space-x-10
                   font-medium text-ck-dark/70
                   text-sm uppercase tracking-wider">


            <!-- HOME -->

            <li>

                <a href="{{ url('/') }}#home"
                   class="hover:text-ck-purple transition
                          relative group">

                    Home

                    <span
                        class="absolute -bottom-2 left-0 w-0 h-1
                               bg-ck-pink rounded-full
                               group-hover:w-full
                               transition-all duration-300">
                    </span>

                </a>

            </li>


            <!-- ABOUT -->

            <li>

                <a href="{{ url('/') }}#about"
                   class="hover:text-ck-purple transition
                          relative group">

                    About

                    <span
                        class="absolute -bottom-2 left-0 w-0 h-1
                               bg-ck-pink rounded-full
                               group-hover:w-full
                               transition-all duration-300">
                    </span>

                </a>

            </li>


            <!-- ========================================= -->
            <!-- SERVICES -->
            <!-- ========================================= -->

            <li
                class="relative"
                ng-mouseenter="servicesHover = true"
                ng-mouseleave="servicesHover = false">


                <!-- SERVICES BUTTON -->

                <a
                    href="{{ url('/') }}#services"
                    class="hover:text-ck-purple transition
                           relative flex items-center gap-2 py-3">

                    Services

                    <i
                        class="fas fa-chevron-down text-[9px]"
                        ng-class="{'rotate-180': servicesHover}"
                        style="transition: transform 0.25s;">
                    </i>


                    <span
                        class="absolute -bottom-2 left-0 h-1
                               bg-ck-pink rounded-full"
                        ng-class="servicesHover ? 'w-full' : 'w-0'"
                        style="transition: width 0.25s;">
                    </span>

                </a>


                <!-- ========================================= -->
                <!-- DROPDOWN -->
                <!-- ========================================= -->

                <div
                    ng-show="servicesHover"

                    ng-mouseenter="servicesHover = true"
                    ng-mouseleave="servicesHover = false"

                    class="services-dropdown">

                    <div class="services-dropdown-inner">


                        <!-- META ADS -->

                        <a
                            href="{{ url('/') }}#contact"
                            class="service-menu-item">

                            <span class="service-icon">
                                <i class="fab fa-facebook"></i>
                            </span>

                            <span>Meta Ads</span>

                        </a>


                        <!-- GOOGLE ADS -->

                        <a
                            href="{{ url('/') }}#contact"
                            class="service-menu-item">

                            <span class="service-icon">
                                <i class="fab fa-google"></i>
                            </span>

                            <span>Google Ads</span>

                        </a>


                        <!-- GMB -->

                        <a
                            href="{{ url('/') }}#contact"
                            class="service-menu-item">

                            <span class="service-icon">
                                <i class="fas fa-location-dot"></i>
                            </span>

                            <span>Google My Business</span>

                        </a>


                        <!-- SOCIAL MEDIA -->

                        <a
                            href="{{ url('/') }}#contact"
                            class="service-menu-item">

                            <span class="service-icon">
                                <i class="fas fa-share-nodes"></i>
                            </span>

                            <span>Social Media</span>

                        </a>


                        <!-- VIDEO EDITING -->

                        <a
                            href="{{ url('/') }}#contact"
                            class="service-menu-item">

                            <span class="service-icon">
                                <i class="fas fa-video"></i>
                            </span>

                            <span>Video Editing</span>

                        </a>


                        <!-- POSTER DESIGN -->

                        <a
                            href="{{ url('/') }}#contact"
                            class="service-menu-item">

                            <span class="service-icon">
                                <i class="fas fa-image"></i>
                            </span>

                            <span>Poster Design</span>

                        </a>


                        <!-- WEBSITE DESIGN -->

                        <a
                            href="{{ url('/') }}#contact"
                            class="service-menu-item">

                            <span class="service-icon">
                                <i class="fas fa-globe"></i>
                            </span>

                            <span>Website Design</span>

                        </a>


                        <!-- LANDING PAGE -->

                        <a
                            href="{{ url('/') }}#contact"
                            class="service-menu-item">

                            <span class="service-icon">
                                <i class="fas fa-window-maximize"></i>
                            </span>

                            <span>Landing Page</span>

                        </a>


                        <!-- DOMAIN -->

                        <a
                            href="{{ url('/') }}#contact"
                            class="service-menu-item">

                            <span class="service-icon">
                                <i class="fas fa-globe"></i>
                            </span>

                            <span>Domain Registration</span>

                        </a>


                        <!-- HOSTING -->

                        <a
                            href="{{ url('/') }}#contact"
                            class="service-menu-item">

                            <span class="service-icon">
                                <i class="fas fa-server"></i>
                            </span>

                            <span>Hosting Support</span>

                        </a>


                        <!-- GEM -->

                        <a
                            href="{{ url('/') }}#contact"
                            class="service-menu-item">

                            <span class="service-icon">
                                <i class="fas fa-chart-line"></i>
                            </span>

                            <span>GEM</span>

                        </a>

                        <a
                            href="{{ url('/') }}#contact"
                            class="service-menu-item">

                            <span class="service-icon">
                                <i class="fas fa-chart-line"></i>
                            </span>

                            <span>Youtube</span>

                        </a>

                    </div>

                </div>

            </li>


            <!-- WORK -->

            <li>

                <a href="{{ url('/') }}#portfolio"
                   class="hover:text-ck-purple transition
                          relative group">

                    Work

                    <span
                        class="absolute -bottom-2 left-0 w-0 h-1
                               bg-ck-pink rounded-full
                               group-hover:w-full
                               transition-all duration-300">
                    </span>

                </a>

            </li>


            <!-- CONTACT -->

            <li>

                <a href="{{ url('/') }}#contact"
                   class="hover:text-ck-purple transition
                          relative group">

                    Contact

                    <span
                        class="absolute -bottom-2 left-0 w-0 h-1
                               bg-ck-pink rounded-full
                               group-hover:w-full
                               transition-all duration-300">
                    </span>

                </a>

            </li>

        </ul>


        <!-- ========================================= -->
        <!-- GET STARTED -->
        <!-- ========================================= -->

        <a
            href="{{ url('/') }}#contact"
            class="hidden lg:inline-flex items-center gap-2
                   btn-magic text-white px-6 py-3 rounded-full
                   font-semibold text-sm">

            Get Started

            <i class="fas fa-arrow-right text-xs"></i>

        </a>


        <!-- ========================================= -->
        <!-- MOBILE BUTTON -->
        <!-- ========================================= -->

        <button
            class="lg:hidden text-2xl text-ck-dark p-2"
            ng-click="toggleMenu()">

            <i
                class="fas"
                ng-class="menuOpen ? 'fa-times' : 'fa-bars'">
            </i>

        </button>

    </nav>

</header>



<!-- ========================================= -->
<!-- MOBILE MENU -->
<!-- ========================================= -->

<div
    class="mobile-menu fixed inset-0 z-[9998]
           bg-ck-bg/95 backdrop-blur-lg
           lg:hidden flex flex-col
           items-center justify-center
           space-y-7 text-2xl
           font-display text-ck-dark
           overflow-y-auto py-20"

    style="
        transform:
        @{{menuOpen ? 'translateY(0)' : 'translateY(-100%)'}};
    ">


    <!-- CLOSE -->

    <button
        class="absolute top-8 right-6
               text-3xl text-ck-pink"
        ng-click="toggleMenu()">

        <i class="fas fa-times"></i>

    </button>


    <!-- HOME -->

    <a
        href="{{ url('/') }}#home"
        ng-click="toggleMenu()"
        class="hover:text-ck-purple transition">

        Home

    </a>


    <!-- ABOUT -->

    <a
        href="{{ url('/') }}#about"
        ng-click="toggleMenu()"
        class="hover:text-ck-purple transition">

        About

    </a>


    <!-- MOBILE SERVICES -->

    <div class="flex flex-col items-center w-full">

        <button
            type="button"
            ng-click="servicesOpen = !servicesOpen"
            class="hover:text-ck-purple transition
                   flex items-center gap-3">

            Services

            <i
                class="fas"
                ng-class="
                    servicesOpen
                    ? 'fa-chevron-up'
                    : 'fa-chevron-down'
                ">
            </i>

        </button>


        <div
            ng-show="servicesOpen"
            class="mt-5 flex flex-col
                   items-center space-y-4 text-lg">


            <a
                href="{{ route('meta') }}"
                ng-click="toggleMenu()"
                class="hover:text-ck-purple transition">
                Meta Ads
            </a>


            <a
                href="{{ route('googleads') }}"
                ng-click="toggleMenu()"
                class="hover:text-ck-purple transition">
                Google Ads
            </a>


            <a
                href="{{ route('gmb') }}"
                ng-click="toggleMenu()"
                class="hover:text-ck-purple transition">
                Google My Business
            </a>


            <a
                href="{{ route('socialmediahandling') }}"
                ng-click="toggleMenu()"
                class="hover:text-ck-purple transition">
                Social Media Handling
            </a>


            <a
                href="{{ route('videoediting') }}"
                ng-click="toggleMenu()"
                class="hover:text-ck-purple transition">
                Video Editing
            </a>


            <a
                href="{{ route('posterdesign') }}"
                ng-click="toggleMenu()"
                class="hover:text-ck-purple transition">
                Poster Design
            </a>


            <a
                href="{{ route('websitedesign') }}"
                ng-click="toggleMenu()"
                class="hover:text-ck-purple transition">
                Website Design
            </a>


            <a
                href="{{ route('landingpage') }}"
                ng-click="toggleMenu()"
                class="hover:text-ck-purple transition">
                Landing Page
            </a>


            <a
                href="{{ route('domainregistration') }}"
                ng-click="toggleMenu()"
                class="hover:text-ck-purple transition">
                Domain Registration
            </a>


            <a
                href="{{ route('hostingsupport') }}"
                ng-click="toggleMenu()"
                class="hover:text-ck-purple transition">
                Hosting Support
            </a>


            <a
                href="{{ route('gem') }}"
                ng-click="toggleMenu()"
                class="hover:text-ck-purple transition">
                GEM
            </a>

        </div>

    </div>


    <!-- WORK -->

    <a
        href="{{ url('/') }}#portfolio"
        ng-click="toggleMenu()"
        class="hover:text-ck-purple transition">

        Work

    </a>


    <!-- CONTACT -->

    <a
        href="{{ url('/') }}#contact"
        ng-click="toggleMenu()"
        class="hover:text-ck-purple transition">

        Contact

    </a>

</div>



<!-- ========================================= -->
<!-- SERVICES DROPDOWN CSS -->
<!-- ========================================= -->

<style>

    /*
    |--------------------------------------------------------------------------
    | IMPORTANT
    |--------------------------------------------------------------------------
    */

    header,
    header nav,
    header ul {
        overflow: visible !important;
    }


    /*
    |--------------------------------------------------------------------------
    | Desktop Dropdown
    |--------------------------------------------------------------------------
    */

    .services-dropdown {

        position: absolute;

        top: 100%;

        left: 50%;

        transform: translateX(-50%);

        width: 100vw;

        margin-top: 0;

        background: rgba(255, 255, 255, 0.98);

        backdrop-filter: blur(18px);

        -webkit-backdrop-filter: blur(18px);

        border-top: 1px solid #f3e8ff;

        border-bottom: 1px solid #f3e8ff;

        box-shadow:
            0 15px 40px rgba(0, 0, 0, 0.12);

        z-index: 99999;

    }


    /*
    |--------------------------------------------------------------------------
    | Dropdown Inner
    |--------------------------------------------------------------------------
    */

    .services-dropdown-inner {

        width: 100%;

        max-width: 1280px;

        margin: 0 auto;

        padding: 18px 24px;

        display: flex;

        align-items: center;

        justify-content: center;

        gap: 6px;

        flex-wrap: wrap;

    }


    /*
    |--------------------------------------------------------------------------
    | Service Item
    |--------------------------------------------------------------------------
    */

    .service-menu-item {

        display: flex;

        align-items: center;

        gap: 8px;

        padding: 10px 12px;

        border-radius: 12px;

        color: rgba(31, 41, 55, 0.75);

        font-size: 12px;

        font-weight: 600;

        white-space: nowrap;

        text-decoration: none;

        transition: all 0.25s ease;

    }


    /*
    |--------------------------------------------------------------------------
    | Icon
    |--------------------------------------------------------------------------
    */

    .service-icon {

        width: 34px;

        height: 34px;

        min-width: 34px;

        border-radius: 9px;

        background: #f3e8ff;

        color: #7c3aed;

        display: flex;

        align-items: center;

        justify-content: center;

        transition: all 0.25s ease;

    }


    .service-icon i {

        font-size: 14px;

    }


    /*
    |--------------------------------------------------------------------------
    | Hover
    |--------------------------------------------------------------------------
    */

    .service-menu-item:hover {

        background: #f5f3ff;

        color: #7c3aed;

        transform: translateY(-2px);

    }


    .service-menu-item:hover .service-icon {

        background: #7c3aed;

        color: #ffffff;

        transform: scale(1.08);

    }


    /*
    |--------------------------------------------------------------------------
    | Mobile
    |--------------------------------------------------------------------------
    */

    @media (max-width: 1023px) {

        .services-dropdown {

            display: none !important;

        }

    }

</style>
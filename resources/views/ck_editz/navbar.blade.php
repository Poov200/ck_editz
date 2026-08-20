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
        <a href="#portfolio" ng-click="toggleMenu()" class="hover:text-ck-purple transition">Work</a>
        <a href="#contact" ng-click="toggleMenu()" class="hover:text-ck-purple transition">Contact</a>
    </div>
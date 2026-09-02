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

                <!-- Contact Information -->
                <div class="space-y-4 text-sm">

                    <!-- Address -->
                    <div class="flex items-start gap-3 text-white/70">
                        <i class="fas fa-map-marker-alt text-ck-pink mt-1"></i>

                        <span class="leading-relaxed">
                            No 10/6, First Floor,<br>
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
            </p>

        </div>

    </div>
</footer>
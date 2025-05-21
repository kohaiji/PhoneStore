<header class="fixed top-0 left-0 w-full bg-white shadow-md z-50">
    <div class="container mx-auto flex items-center justify-between px-6 py-4 max-w-7xl">
        <a class="flex items-center space-x-2" href="#">
            <img alt="Company logo, stylized phone icon in blue and white" class="w-10 h-10" height="40" src="https://storage.googleapis.com/a1aa/image/3b8cf454-20ca-4227-3813-fb32e614492d.jpg" width="40"/>
            <span class="text-2xl font-bold text-blue-600">
      PhoneStore
     </span>
        </a>
        <nav class="hidden md:flex space-x-8 font-semibold text-gray-700 text-sm uppercase tracking-wide">
            <a class="hover:text-blue-600 transition" href="#">
                Home
            </a>
            <a class="hover:text-blue-600 transition" href="#products">
                Products
            </a>
            <a class="hover:text-blue-600 transition" href="#about">
                About
            </a>
            <a class="hover:text-blue-600 transition" href="#services">
                Services
            </a>
            <a class="hover:text-blue-600 transition" href="#news">
                News
            </a>
            <a class="hover:text-blue-600 transition" href="#contact">
                Contact
            </a>
        </nav>
<!-- Status : Loginned as customers -->
        <a href="showcart" class="relative text-[#d7ccc3] hover:text-[#0a4a9f] transition flex items-center space-x-1" aria-label="Cart details page" ">
        <i class="fas fa-shopping-cart text-lg"></i>
        <span class="absolute -top-2 -right-2 bg-red-600 text-white text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center select-none">
      0
     </span>
        </a>
        <div class="relative cursor-pointer select-none font-semibold" id="userMenuWrapper" style="padding: 8px 12px;">
            <div class="whitespace-nowrap" id="userMenuButton">
                John Doe
            </div>
            <div class="absolute right-0 mt-2 w-40 bg-[#181a1c] border border-gray-700 rounded-md shadow-lg opacity-0 invisible transition-opacity z-20" id="userDropdown">
                <ul class="py-2 text-sm text-[#d7ccc3]">
                    <li>
                        <a class="block px-4 py-2.5 hover:bg-[#0a4a9f] hover:text-black" href="/profile">
                            Profile
                        </a>
                    </li>
                    <li>
                        <a class="block px-4 py-2.5 hover:bg-[#0a4a9f] hover:text-black" href="/settings">
                            Settings
                        </a>
                    </li>
                    <li>
                        <a class="block px-4 py-2.5 hover:bg-[#f41406] hover:text-black" href="/logout">
                            Logout
                        </a>
                    </li>
                </ul>
            </div>

<!-- Status : Loginned as admin -->
{{--        <a href="showcart" class="relative text-[#d7ccc3] hover:text-[#0a4a9f] transition flex items-center space-x-1" aria-label="Cart details page" ">--}}
{{--            <i class="fas fa-shopping-cart text-lg"></i>--}}
{{--            <span class="absolute -top-2 -right-2 bg-red-600 text-white text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center select-none">--}}
{{--      0--}}
{{--     </span>--}}
{{--        </a>--}}
{{--            <div class="relative cursor-pointer select-none font-semibold" id="userMenuWrapper" style="padding: 8px 12px;">--}}
{{--                <div class="whitespace-nowrap" id="userMenuButton">--}}
{{--                    John Doe--}}
{{--                </div>--}}
{{--                <div class="absolute right-0 mt-2 w-36 bg-[#181a1c] border border-gray-700 rounded-md shadow-lg opacity-0 invisible transition-opacity z-20" id="userDropdown">--}}
{{--                    <ul class="py-1 text-sm text-[#d7ccc3]">--}}
{{--                        <li>--}}
{{--                            <a class="block px-4 py-2 hover:bg-[#0a4a9f] hover:text-black" href="/profile">--}}
{{--                                Profile--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a class="block px-4 py-2 hover:bg-[#0a4a9f] hover:text-black" href="/settings">--}}
{{--                                Settings--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a class="block px-4 py-2 hover:bg-[#0a4a9f] hover:text-black" href="/admin">--}}
{{--                                Admin--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a class="block px-4 py-2 hover:bg-[#0a4a9f] hover:text-black" href="/logout">--}}
{{--                                Logout--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}

<!-- Status : Not Loggined -->
{{--        <div class="hidden md:flex items-center space-x-6">--}}
{{--            <a class="flex items-center space-x-2 text-gray-700 hover:text-blue-600 transition" href="tel:+18001234567">--}}
{{--                <i class="fas fa-phone-alt">--}}
{{--                </i>--}}
{{--                <span>--}}
{{--       +1 234 567 890--}}
{{--      </span>--}}
{{--            </a>--}}
{{--            <a class="bg-blue-600 text-white px-5 py-2 rounded-md font-semibold hover:bg-blue-700 transition" href="login">--}}
{{--                Sign in--}}
{{--            </a>--}}
{{--            <a class="bg-green-600 text-white px-5 py-2 rounded-md font-semibold hover:bg-blue-700 transition" href="register">--}}
{{--                Sign up--}}
{{--            </a>--}}
{{--        </div>--}}
{{--        <button aria-label="Open menu" class="md:hidden text-gray-700 focus:outline-none" id="mobile-menu-button">--}}
{{--            <i class="fas fa-bars fa-lg">--}}
{{--            </i>--}}
{{--        </button>--}}


    </div>

        <script>
            // Dropdown menu logic
            const userMenuWrapper = document.getElementById('userMenuWrapper');
            const userDropdown = document.getElementById('userDropdown');

            // Show dropdown on mouse enter of wrapper (includes dropdown)
            userMenuWrapper.addEventListener('mouseenter', () => {
                userDropdown.classList.remove('opacity-0', 'invisible');
                userDropdown.classList.add('opacity-100', 'visible');
            });

            // Hide dropdown on mouse leave of wrapper (includes dropdown)
            userMenuWrapper.addEventListener('mouseleave', () => {
                userDropdown.classList.remove('opacity-100', 'visible');
                userDropdown.classList.add('opacity-0', 'invisible');
            });

        </script>
    </div>

</header>

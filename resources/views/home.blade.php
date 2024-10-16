<html class="h-full">

<head>
    @vite('resources/css/app.css')
</head>

<body class="h-full">
    <div class="">
        <header>
            <nav class="">
                <div class="flex justify-between items-center px-4 py-2">
                    <div>
                        <a href="{{route("home")}}">
                            <img class="h-full w-40" src="{{asset("images/tastypins.png")}}" alt="">
                        </a>
                    </div>
                    <div class="flex gap-2">
                        <x-button type="button" class="bg-primary-500">
                            Login
                        </x-button>
                        <x-button type="button" class="border-primary-500 border-[1px] !text-primary-500">
                            Create Account
                        </x-button>
                    </div>
                </div>
            </nav>
        </header>
        <!-- HERO SECTION -->
        <section class="">
            <div class="overflow-hidden h-auto p-8 max-w-screen-lg mx-auto relative">
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex flex-col justify-center">
                        <h1 class="mb-5 text-600 font-semibold leading-tight max-w-prose">Welcome Home</h1>
                        <p class="mb-8 text-base max-w-prose leading-loose tracking-wide">At <span
                                class="font-bold">TastyPins</span>, we believe that
                            every meal tells a story. Join our community of passionate cooks who share their recipes,
                            tips,
                            and
                            the heartwarming moments that make cooking special.</p>
                        <x-button type="link" href="/" class="self-start bg-primary-500 text-200">
                            Get Started
                        </x-button>
                    </div>
                    <div>
                        <img class="-z-10 rounded-xl" src="{{asset("images/demo.jpg")}}" alt="">
                    </div>
                </div>
            </div>
        </section>
        <div class="border-[1px] w-full"></div>
        <!-- COMMUNITY -->
        <section class="p-8">
            <div class="text-center">
                <h2 class="text-300 font-semibold mb-6">Discover, Share, Savor</h2>
                <div class="grid grid-cols-3 gap-6 max-w-screen-lg mx-auto">
                    <div class="">
                        <div>
                            <img src="{{asset("images/demo.jpg")}}" class="aspect-square rounded-lg">
                        </div>
                        <h3 class="mt-4 text-base font-semibold">Explore Homestyle Recipes</h3>
                        <p class="mt-2 text-gray-600">Find comfort classics and unique dishes from passionate cooks.</p>
                    </div>
                    <div class="">
                        <div>
                            <img src="{{asset("images/demo.jpg")}}" class="aspect-square rounded-lg">
                        </div>
                        <h3 class="mt-4 text-base font-semibold">Explore Homestyle Recipes</h3>
                        <p class="mt-2 text-gray-600">Find comfort classics and unique dishes from passionate cooks.</p>
                    </div>
                    <div class="">
                        <div>
                            <img src="{{asset("images/demo.jpg")}}" class="aspect-square rounded-lg">
                        </div>
                        <h3 class="mt-4 text-base font-semibold">Explore Homestyle Recipes</h3>
                        <p class="mt-2 text-gray-600">Find comfort classics and unique dishes from passionate cooks.</p>
                    </div>
                </div>
            </div>
        </section>
        <!--  -->
        <section class="p-8">
            <div class="container mx-auto text-center">
                <h2 class="text-3xl font-bold mb-10">Why You'll Love It Here</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <img src="path_to_icon1.png" class="w-16 mx-auto mb-4">
                        <h3 class="text-xl font-semibold">Warm and Welcoming</h3>
                        <p class="text-gray-600 mt-2">Feel at home with our kind and cozy community.</p>
                    </div>
                    <div class="text-center">
                        <img src="path_to_icon2.png" class="w-16 mx-auto mb-4">
                        <h3 class="text-xl font-semibold">Personalized for You</h3>
                        <p class="text-gray-600 mt-2">Discover recipes tailored to your tastes and cooking habits.</p>
                    </div>
                    <div class="text-center">
                        <img src="path_to_icon3.png" class="w-16 mx-auto mb-4">
                        <h3 class="text-xl font-semibold">Favorite and Save Recipes</h3>
                        <p class="text-gray-600 mt-2">Build your personal cookbook and revisit your favorite dishes.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-16 bg-gray-100 text-center">
            <div class="container mx-auto">
                <h2 class="text-4xl font-bold mb-6">Cozy, One Dish at a Time</h2>
                <p class="text-xl text-gray-700 max-w-2xl mx-auto mb-8">We believe food is about more than just
                    taste—it's
                    about the moments shared around the table. Join us and turn everyday meals into memories.</p>
                <a href="#" class="bg-yellow-500 text-white py-3 px-8 rounded-full text-lg hover:bg-yellow-600">Join Our
                    Family</a>
            </div>
        </section>
        <footer class="bg-gray-800 text-gray-300 py-6">
            <div class="container mx-auto text-center">
                <p>© 2024 YourRecipePlatform. All rights reserved.</p>
                <div class="mt-4 space-x-4">
                    <a href="#" class="text-gray-400 hover:text-gray-100">Privacy Policy</a>
                    <a href="#" class="text-gray-400 hover:text-gray-100">Terms of Service</a>
                    <a href="#" class="text-gray-400 hover:text-gray-100">Contact Us</a>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>
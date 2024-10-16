<html class="h-full">

<head>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://31a8-41-250-196-233.ngrok-free.app/resources/css/app.css">
</head>

<body class="h-full">
    <div class="container">
        <header class="flex items-center justify-between px-16 py-6 bg-white shadow-md">
            <div class="h-12 w-12">
                <a href="{{route("home")}}" class="">
                    <img class="overflow-visible h-full object-cover" src="{{asset('images/logo.png')}}"
                        alt="Your Company">
                </a>
            </div>
            <!-- search bar -->
            <div>
                <form method="GET" action="{{route("feed")}}">
                    <div class="relative flex items-center border-[1px] border-slate-500 rounded-md">
                        <input type="text"
                            class="w-80 rounded-md outline-0 ring-0 focus:ring-2 border-0 placeholder-slate-400 pr-9"
                            placeholder="Search..." name="q" value="{{request("q")}}" autocomplete>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2">
                            <button type="submit">

                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="#666">
                                    <path
                                        d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="relative">
                <!-- photo -->
                <div id="profile-avatar"
                    class="w-10 h-10 rounded-full overflow-hidden cursor-pointer border-slate-100 border-2 box-content">
                    <img src="{{asset('images/avatar.png')}}" alt="">
                </div>
                <!-- menu -->
                <div id="profile-menu"
                    class="text-center font-semibold hidden absolute top-full right-0 bg-slate-100 rounded-sm shadow-md">
                    <ul>
                        <li class="py-2 px-8 border-b-2 border-slate-200"><a href="{{route("profile")}}">Profile</a>
                        </li>
                        <li class="py-2 px-8 border-b-2 border-slate-200"><a href="{{route("settings")}}">Settings</a>
                        </li>
                        <li class="py-2 px-8"><a href="{{route("logout")}}">Logout</a></li>
                    </ul>
                </div>
                <script>
                    const avatarElement = document.getElementById("profile-avatar");
                    const avatarMenuElement = document.getElementById("profile-menu");
                    let isOpen = false;
                    avatarElement.onclick = (e) => {
                        avatarMenuElement.classList.toggle("hidden");
                        isOpen = !isOpen;
                    };
                    document.onclick = (e) => {
                        const x = avatarMenuElement.children.item(0).children;
                        let a = false;
                        Array.from(x).forEach(el => {
                            if (e.target == el) {
                                a = true;
                            }
                        });
                        if (!a && isOpen && e.target != avatarElement.children.item(0)) {
                            isOpen = !isOpen;
                            avatarMenuElement.classList.toggle("hidden");
                        }
                    };
                </script>
            </div>
        </header>
        <main>
            <div class="container">
                <div class="mx-auto max-w-5xl grid grid-cols-1 md:grid-cols-2">
                    <div class="p-4">
                        <img class="w-full rounded-md overflow-hidden" src="{{asset($dish->image)}}" alt="">
                    </div>
                    <div class="px-4 py-8 flex flex-col gap-4 relative">
                        <h2 class="text-4xl font-bold">{{$dish->name}}</h2>
                        <p class="max-w-prose">{{$dish->description}}</p>
                        <div class="absolute bottom-8 right-8">
                            <button
                                class="rounded-full bg-orange-500 text-white font-bold text-2xl w-24 h-24">Like</button>
                            <button
                                class="rounded-full bg-orange-500 text-white font-bold text-2xl w-24 h-24">Fav</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
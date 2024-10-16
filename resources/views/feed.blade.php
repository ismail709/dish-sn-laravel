<html class="h-full">

<head>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://31a8-41-250-196-233.ngrok-free.app/resources/css/app.css">
</head>

<body class="h-full w-full">
    <div class="min-h-screen container mx-auto flex flex-col">
        <header class="flex items-center justify-between px-16 py-6 bg-white shadow-md">
            <div class="h-12 w-12">
                <a href="{{route("home")}}" class="">
                    <img class="overflow-visible h-full object-cover" src="images/logo.png" alt="Your Company">
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
            <div class="flex items-center gap-2">
                <button class="bg-orange-500 w-10 h-10 rounded-full text-3xl font-bold flex justify-center items-center"
                    id="close-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#FFFFFF">
                        <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z" />
                    </svg>
                </button>

                <x-modal open-btn="#close-btn">
                    <form enctype="multipart/form-data" class="flex flex-col gap-4 p-4" method="POST"
                        action="{{route("dishes.create")}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <h2 class="text-3xl font-semibold">Add new dish</h2>
                        <div class="flex flex-col gap-2">
                            <label class="text-gray-600" for="name">Name</label>
                            <input class="rounded-md" id="name" type="text" name="name">
                            <label class="text-gray-600" for="description">Description</label>
                            <textarea class="rounded-md" name="description" id="description"></textarea>
                            <label class="text-gray-600" for="image">Image</label>
                            <div id="prevcontainer" class="relative hidden">
                                <img id="preview" class="w-full aspect-square object-cover" src="" alt="">
                                <div id="removepreview"
                                    class="flex justify-center items-center absolute top-2 right-2 cursor-pointer shadow-md rounded-full w-6 h-6 bg-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="12px" viewBox="0 -960 960 960"
                                        width="12px" fill="#666">
                                        <path
                                            d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
                                    </svg>
                                </div>
                            </div>
                            <input id="fileinput" name="image" type="file" class="hidden text-gray-600">
                            <button onclick="openfilechooser()" type="button"
                                class="rounded-md outline-0 border-0 bg-orange-100 text-orange-500 font-semibold py-1 w-auto">Choisir
                                un fichier</button>
                        </div>
                        <button type="submit"
                            class="bg-orange-500 text-white font-semibold py-1 rounded-md">Create</button>
                    </form>
                    <script>
                        const fileInput = document.querySelector("#fileinput");
                        const removePreviewBtn = document.querySelector("#removepreview");

                        function openfilechooser() {
                            fileInput.click();
                        }

                        removePreviewBtn.onclick = () => {
                            document.querySelector("#prevcontainer").classList.toggle("hidden");
                        }

                        fileInput.onchange = (e) => {
                            if (e.target.files.length > 0) {
                                const file = e.target.files[0];
                                const csrf_token = "{{csrf_token()}}";

                                const formData = new FormData();

                                formData.append("image", file);

                                fetch("{{route("temp")}}", {
                                    method: "POST",
                                    headers: {
                                        'X-CSRF-TOKEN': csrf_token
                                    },
                                    body: formData
                                }).then(r => r.json()).then(data => {
                                    document.querySelector("#prevcontainer").classList.remove("hidden");
                                    document.querySelector("#preview").src = data.file;
                                });
                            }
                        }
                    </script>
                </x-modal>
                <div class="relative">
                    <!-- photo -->
                    <div id="profile-avatar"
                        class="w-10 h-10 rounded-full overflow-hidden cursor-pointer border-slate-100 border-2 box-content">
                        <img src="/images/avatar.png" alt="">
                    </div>
                    <!-- menu -->
                    <div id="profile-menu"
                        class="text-center font-semibold hidden absolute top-full right-0 bg-slate-100 rounded-sm shadow-md">
                        <ul>
                            <li class="py-2 px-8 border-b-2 border-slate-200"><a href="{{route("profile")}}">Profile</a>
                            </li>
                            <li class="py-2 px-8 border-b-2 border-slate-200"><a
                                    href="{{route("settings")}}">Settings</a>
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
            </div>
        </header>
        <main class="grow flex">
            <div class="grow container flex flex-row w-full">
                <!-- side bar -->
                <aside class="grow flex justify-center items-start min-w-60">
                    <div class="sticky top-20 rounded-md shadow-md bg-orange-100 mt-8">
                        <ul class="text-xl font-semibold flex flex-col">
                            <li
                                class="group py-3 px-6 hover:text-orange-500 text-orange-700 border-b-[1px] border-orange-300">
                                <a href="{{route("feed")}}" class="flex gap-2 items-center"><svg
                                        xmlns="http://www.w3.org/2000/svg" height="32px" viewBox="0 -960 960 960"
                                        width="32px" class="fill-orange-700 group-hover:fill-orange-500">
                                        <path d="M160-120v-480l320-240 320 240v480H560v-280H400v280H160Z" />
                                    </svg>All recipes</a>
                            </li>
                            <li
                                class="group py-3 px-6 hover:text-orange-500 text-orange-700 border-b-[1px] border-orange-300">
                                <a href="{{route("favorites")}}" class="flex gap-2 items-center"><svg
                                        xmlns="http://www.w3.org/2000/svg" height="32px" viewBox="0 -960 960 960"
                                        width="32px" class="fill-orange-700 group-hover:fill-orange-500">
                                        <path
                                            d="M200-120v-656.67q0-27 19.83-46.83 19.84-19.83 46.84-19.83h426.66q27 0 46.84 19.83Q760-803.67 760-776.67V-120L480-240 200-120Z" />
                                    </svg>My favorites</a>
                            </li>
                            <li class="group py-3 px-6 hover:text-orange-500 text-orange-700"><a href="#"
                                    class="flex gap-2 items-center"><svg xmlns="http://www.w3.org/2000/svg"
                                        height="32px" viewBox="0 -960 960 960" width="32px"
                                        class="fill-orange-700 group-hover:fill-orange-500">
                                        <path
                                            d="M353.33-160h460q27.5 0 47.09-19.58Q880-199.17 880-226.67v-102.66H353.33V-160ZM80-630.67h206.67V-800h-140q-27.5 0-47.09 19.58Q80-760.83 80-733.33v102.66Zm0 235.34h206.67V-564H80v168.67ZM146.67-160h140v-169.33H80v102.66q0 27.5 19.58 47.09Q119.17-160 146.67-160Zm206.66-235.33H880V-564H353.33v168.67Zm0-235.34H880v-102.66q0-27.5-19.58-47.09Q840.83-800 813.33-800h-460v169.33Z" />
                                    </svg>Categories</a></li>
                        </ul>
                    </div>
                </aside>
                <!-- main content -->
                @if(count($dishes) == 0)
                    <div class="grid place-items-center w-full">
                        <p class="text-center text-xl text-slate-400 font-bold grow">We could not find any results :(</p>
                    </div>
                @else
                                <div class="p-4">
                                    <div class="mb-2 flex items-center justify-between">
                                        @if(request()->has("q") && request("q") != "")
                                            <p class="text-xl text-slate-400">We found <span class="font-bold">{{count($dishes)}}</span>
                                                results for
                                                "{{request("q")}}":
                                            </p>
                                        @else
                                            <div></div>
                                        @endif
                                        <div>
                                            <form method="get" class="m-0">
                                                @php
                                                    $query = request()->query();
                                                @endphp
                                                @foreach ($query as $key => $value)
                                                    @if($key != "orderBy")
                                                        <input type="hidden" name="{{$key}}" value="{{$value}}">
                                                    @endif
                                                @endforeach
                                                <select class="rounded-md outline-0 ring-0 focus:ring-2" name="orderBy"
                                                    onchange="this.form.submit()">
                                                    <option value="1" {{request()->query("orderBy") == "1" ? "selected" : ""}}>Newest
                                                    </option>
                                                    <option value="2" {{request()->query("orderBy") == "2" ? "selected" : ""}}>Oldest
                                                    </option>
                                                    <option value="3" {{request()->query("orderBy") == "3" ? "selected" : ""}}>Most viewed
                                                    </option>
                                                    <option value="4" {{request()->query("orderBy") == "4" ? "selected" : ""}}>Most liked
                                                    </option>
                                                    <option value="5" {{request()->query("orderBy") == "5" ? "selected" : ""}}>
                                                        Alphabetical
                                                    </option>
                                                </select>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="grow grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 place-items-stretch gap-6">
                                        @foreach ($dishes as $dish)
                                            <a class="flex" href="{{route("dishes", ["id" => $dish->id])}}">
                                                <div
                                                    class="flex flex-col rounded-lg border-[1px] border-slate-300 shadow-md bg-white overflow-hidden">
                                                    <img class="w-full aspect-square object-cover" src="{{asset($dish->image)}}" alt="">
                                                    <div class="p-6">
                                                        <h1 class="text-xl font-bold mb-2">{{$dish->name}}</h1>
                                                        <p class="overflow-hidden line-clamp-3">{{$dish->description}}</p>
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                @endif
            </div>
        </main>
</body>

</html>
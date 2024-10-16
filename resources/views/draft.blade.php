<div class="h-full grid grid-cols-2">
    <div class="h-screen bg-black">
        <img src="home-bg.jpg" class="w-full h-full object-cover object-center">
    </div>
    <div class="flex h-screen overflow-y-auto flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <!-- logo -->
            <div class="h-20 w-auto">
                <img class="overflow-visible mx-auto h-full w-1/2 object-cover" src="images/logo.png"
                    alt="Your Company">
            </div>
            <!-- title -->
            <h2 class="mt-10 text-center text-300 text-gray-900">
                Login to your
                account</h2>
        </div>

        <div class="mt-6 sm:mx-auto sm:w-full sm:max-w-sm">
            @if($errors->any())
                <div class="text-red-500">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="space-y-6" action="/user" method="POST">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                        address</label>
                    <div class="mt-2">
                        <input value="{{ old("email") }}" id="email" name="email" type="email" autocomplete="email"
                            required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        <div class="text-sm">
                            <a href="#" class="hidden font-semibold text-indigo-600 hover:text-indigo-500">Forgot
                                password?</a>
                        </div>
                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="border-0 block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-orange-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign
                        in</button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                Not a member?
                <a href="{{route("register")}}"
                    class="font-semibold leading-6 text-orange-600 hover:text-orange-500">Create
                    Account</a>
            </p>
        </div>
    </div>
</div>
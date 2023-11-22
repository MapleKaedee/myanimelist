<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('icon/lifebuoy.png') }}" type="image/png">


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite('resources/css/app.css')
    {{-- For Toggle --}}
    <style>
        .display-none{
            @apply hidden;
        }
        /* scrollbar */
        ::-webkit-scrollbar {
        width: 5px;
        height: 5px;
        }

        ::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        -webkit-border-radius: 10px;
        border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
        -webkit-border-radius: 10px;
        border-radius: 10px;
        background: rgba(255, 255, 255, 0.3);
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
        }

        ::-webkit-scrollbar-thumb:window-inactive {
        background: rgba(255, 255, 255, 0.3);
        }

    </style>
</head>

<body class="dark:bg-slate-800">

    {{-- NAVBAR START --}}
    <div class="shadow-md">
        <div class="">
            <div class="navbar">
                <div class="mx-12 navbar dark:text-slate-300">
                    <div class="navbar-start">
                        <div class="dropdown">
                            <label tabindex="0" class="btn btn-ghost lg:hidden">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h8m-8 6h16" />
                                </svg>
                            </label>
                            <ul tabindex="0"
                                class="menu menu-sm dropdown-content mt-3 z-[1] bg-base-100 dark:bg-slate-700 p-2 gap-2 shadow rounded-md w-52">
                                <li class=""><a href="/" class="font-semibold ">Home</a></li>
                                {{-- <li>
                        <a>Parent</a>
                        <ul class="p-2">
                          <li><a>Submenu 1</a></li>
                          <li><a>Submenu 2</a></li>
                        </ul>
                      </li> --}}
                                <li><a href="/mylist" class="font-semibold">My List</a></li>
                                <li><a href="/mydashboard/{id}" class="font-semibold">Dashboard</a></li>
                            </ul>
                        </div>
                        <a href="/" class="btn btn-ghost text-xl font-bold">My<span
                                class="-mx-1.5 text-blue-500">Anime</span>List</a>
                    </div>
                    <div class="navbar-center hidden lg:flex">
                        <ul class="menu menu-horizontal px-1 gap-2">
                            <li><a href="/" class="font-semibold dark:hover:bg-slate-400">Home</a></li>
                            {{-- <li tabindex="0">
                      <details>
                        <summary>Parent</summary>
                        <ul class="p-2">
                          <li><a>Submenu 1</a></li>
                          <li><a>Submenu 2</a></li>
                        </ul>
                      </details>
                    </li> --}}
                            <li><a href="/mylist/{id}" class="font-semibold dark:hover:bg-slate-400">My List</a></li>
                            <li><a href="/mydashboard/{id}" class="font-semibold dark:hover:bg-slate-400">Dashboard</a></li>
                        </ul>
                    </div>
                    <div class="navbar-end gap-4">
                        <div class="border border-black px-1 rounded-md flex py-1 dark:border-white">
                            <label class="swap swap-rotate">

                                <!-- this hidden checkbox controls the state -->
                                <input type="checkbox" class="theme-controller hidden" value="synthwave" />

                                <!-- sun icon -->
                                <svg class="sun swap-on fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z"/></svg>

                                <!-- moon icon -->
                                <svg class="moon swap-off fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z"/></svg>

                            </label>
                        </div>
                        <details class="dropdown dropdown-end">
                            @auth
                                <summary class="m-1 btn dark:bg-slate-700 dark:text-white dark:border-slate-500">{{ auth()->user()->name }} <span><img class="rounded-full"
                                            width="36"
                                            src="https://i.pinimg.com/564x/b6/4e/4e/b64e4e6cf83da7959b22038ef7097105.jpg"
                                            alt=""></span></summary>
                                            <ul class="mt-4 p-2 shadow menu dropdown-content z-[1] bg-base-100 dark:bg-slate-700 rounded-md w-52 gap-2">
                                                <li class="w-full">
                                                    <a href="" class="btn btn-outline btn-error btn-sm w-full">
                                                        <form action="/logout" method="post">
                                                            @csrf
                                                            <button>LogOut</button>
                                                        </form>
                                                    </a>
                                                </li>
                                                <li class="w-full">
                                                    <a href="{{ route('profile.edit') }}" class="btn btn-outline btn-info btn-sm w-full">Profile</a>
                                                </li>
                                            </ul>


                            @else
                                <summary class="m-1 btn btn-outline-info">
                                    <a href="{{ route('login') }}"
                                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white ">SignIn</a>
                                </summary>
                            @endauth
                        </details>
                        {{-- <a class="btn">Login</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- NAVBAR END --}}


    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>

    {{-- Script --}}
    <script>
        // Icons
        const sunIcon = document.querySelector(".sun");
        const moonIcon = document.querySelector(".moon");
        // Theme Vars
        const userTheme = localStorage.getItem("theme");
        const systemTheme = window.matchMedia("(prefers-color-scheme: dark)").matches;
        // Icon Toggling
        const iconToggle = () => {
            moonIcon.classList.toggle("display=none");
            sunIcon.classList.toggle("display=none");
        }
        // Initial Theme Check
        const themeCheck = () => {
            if (userTheme === "dark" || (!userTheme & systemTheme)) {
                document.documentElement.classList.add("dark");
                moonIcon.classList.add("display-none");
                return;
            }
            sunIcon.classList.add("display-none");
        }
        // Manual Theme Switch
        const themeSwitch = () => {
            if (document.documentElement.classList.contains("dark")) {
                document.documentElement.classList.remove("dark");
                localStorage.setItem("theme", "light");
                iconToggle();
                return;
            }
            document.documentElement.classList.add("dark");
            localStorage.setItem("theme", "dark");
            iconToggle();
        }
        // Call theme switch on clicking buttons
        sunIcon.addEventListener("click", () => {
            themeSwitch();
        })
        moonIcon.addEventListener("click", () => {
            themeSwitch();
        })
        // Invoke theme check on initial load
        themeCheck();
    </script>
</body>

</html>

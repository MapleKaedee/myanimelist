@vite('resources/css/app.css')

<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home | MyAnimeList</title>
</head>
<body>
    {{-- NAVBAR START --}}
    <div class="shadow-md">
        <div class="mx-12">
            <div class="navbar bg-base-100">
                <div class="navbar-start">
                  <div class="dropdown">
                    <label tabindex="0" class="btn btn-ghost lg:hidden">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
                    </label>
                    <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                      <li><a class="font-semibold">Home</a></li>
                      {{-- <li>
                        <a>Parent</a>
                        <ul class="p-2">
                          <li><a>Submenu 1</a></li>
                          <li><a>Submenu 2</a></li>
                        </ul>
                      </li> --}}
                      <li><a class="font-semibold">My List</a></li>
                    </ul>
                  </div>
                  <a class="btn btn-ghost text-xl font-bold">My<span class="-mx-1.5 text-blue-500">Anime</span>List</a>
                </div>
                <div class="navbar-center hidden lg:flex">
                  <ul class="menu menu-horizontal px-1 gap-2">
                    <li><a class="font-semibold">Home</a></li>
                    {{-- <li tabindex="0">
                      <details>
                        <summary>Parent</summary>
                        <ul class="p-2">
                          <li><a>Submenu 1</a></li>
                          <li><a>Submenu 2</a></li>
                        </ul>
                      </details>
                    </li> --}}
                    <li><a class="font-semibold">My List</a></li>
                  </ul>
                </div>
                <div class="navbar-end">
                    <details class="dropdown dropdown-end">
                        <summary class="m-1 btn">Username <span><img class="rounded-full" width="36" src="https://i.pinimg.com/564x/b6/4e/4e/b64e4e6cf83da7959b22038ef7097105.jpg" alt=""></span></summary>
                        <ul class="mt-4 p-2 shadow menu dropdown-content z-[1] bg-base-100 rounded-md w-52 gap-2">
                          <li ><a class="btn btn-outline btn-error btn-sm">Logout</a></li>
                          <li><a class="btn btn-outline btn-info btn-sm" >Profile</a></li>
                        </ul>
                      </details>
                  {{-- <a class="btn">Login</a> --}}
                </div>
              </div>
        </div>
    </div>
    {{-- NAVBAR END --}}
    <div class="m-12">
            halo
    </div>
</body>
</html>

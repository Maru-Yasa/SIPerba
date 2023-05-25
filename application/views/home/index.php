<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.6/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>SIPerba | Dasbor</title>
</head>

<body>


    <div class="drawer">
        <input id="my-drawer" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content">
            <!-- Page content here -->
            <div class="navbar bg-primary text-white">
                <div class="flex-none">
                  <label for="my-drawer" class="btn btn-square btn-ghost drawer-button">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-5 h-5 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                  </label>
                </div>
                <div class="flex-1">
                  <a class="btn btn-ghost normal-case text-xl">SIPerba</a>
                </div>
                <div class="flex-none">
                    <div class="dropdown dropdown-left">
                        <label tabindex="0" class="btn btn-square btn-ghost">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-5 h-5 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path></svg>
                        </label>
                        <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52 text-black">
                          <li><a href="/home/profile" class="hover:bg-primary hover:text-white group"><i class="bi bi-person-fill text-primary group-hover:text-white"></i> Profile</a></li>
                          <li><a class="hover:bg-primary hover:text-white group"><i class="bi bi-box-arrow-in-left text-primary group-hover:text-white"></i> Logout</a></li>
                        </ul>
                    </div>
                  <button class="btn btn-square btn-ghost">
                  </button>
                </div>
            </div>

            <div class="w-full px-5 mt-4">

                <h1 class="text-3xl mb-3 font-bold">Selamat datang, <span class="text-primary">Admin!</span></h1>

                <div class="w-full grid grid-cols-2 gap-3">
                    <div class="shadow bg-primary text-white rounded-lg h-32 p-3 relative group overflow-hidden">
                        <h1 class="text-3xl z-10 font-bold">Users</h1>
                        <p class="static z-10 text-4xl font-semi-bold break-words mt-2">76</p>
                        <i style="font-size: 100px;" class="bi bi-people-fill absolute z-20 opacity-40 top-0 right-3 scale-150 group-hover:blur-sm ease-in duration-300"></i>
                    </div>
                    <div class="shadow bg-accent text-white rounded-lg h-32 p-3 relative group overflow-hidden">
                        <h1 class="text-3xl z-10 font-bold">Perhitungan</h1>
                        <p class="static z-10 text-4xl font-semi-bold break-words mt-2">66</p>
                        <i style="font-size: 100px;" class="bi bi-database-fill-gear absolute z-20 opacity-40 top-0 right-3 scale-150 group-hover:blur-sm ease-in duration-300"></i>
                    </div>
                </div>

                <div class="mt-5 w-full h-64 shadow rounded-lg p-3 flex flex-col items-center justify-center bg-primary relative overflow-hidden group">
                    <h1 class="text-3xl font-bold text-white z-10">Wellcome to <span class="">SIPerba</span></h1>
                    <div class="flex flex-col md:flex-row gap-2 mt-3 z-10">
                        <a href="/home/perhitungan" class="btn btn-ghost bg-white text-black border-0 hover:bg-slate-200 gap-2"><i class="bi bi-calculator-fill"></i> Mulai Menghitung</a>
                        <a href="/home/history" class="btn btn-accent gap-2"><i class="bi bi-clock-history"></i> Lihat Histori</a>
                    </div>
                    <div class="absolute left-1 -buttom-5 opacity-40 group-hover:blur-sm ease-in duration-300 z-0">
                        <img src="/assets/images/undraw_mathematics_-4-otb.svg" width="200" alt="">
                    </div>
                </div>

            </div>

        </div>
        <div class="drawer-side">
            <label for="my-drawer" class="drawer-overlay"></label>
            <ul class="menu p-4 w-80 bg-base-100 text-base-content">
                <!-- Sidebar content here -->
                <li><a href="/" class="hover:bg-primary hover:text-white group"><i class="bi bi-speedometer2 text-primary group-hover:text-white"></i> Dasbor</a></li>
                <li><a href="/home/perhitungan" class="hover:bg-primary hover:text-white group"><i class="bi bi-calculator text-primary group-hover:text-white"></i> Perhitungan</a></li>
                <li><a href="/home/history" class="hover:bg-primary hover:text-white group"><i class="bi bi-clock-history text-primary group-hover:text-white"></i> History</a></li>
                <li><a href="/home/users" class="hover:bg-primary hover:text-white group"><i class="bi bi-people-fill text-primary group-hover:text-white"></i> Users</a></li>
                <li><a href="/home/setting" class="hover:bg-primary hover:text-white group"><i class="bi bi-gear-fill text-primary group-hover:text-white"></i> Setting</a></li>

            </ul>
        </div>
    </div>
</body>

</html>

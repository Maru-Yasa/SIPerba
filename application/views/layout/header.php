<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/assets/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="/assets/dist/tailwind.css"></script>
    <link rel="stylesheet" href="/assets/dist/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title><?= $title; ?></title>
</head>

<body>


    <div class="drawer">
        <input id="my-drawer" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content">
            <!-- Page content here -->
            <div class="navbar bg-primary text-white">
                <div class="flex-none">
                    <label for="my-drawer" class="btn btn-square btn-ghost drawer-button">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-5 h-5 stroke-current">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </label>
                </div>
                <div class="flex-1">
                    <a class="btn btn-ghost normal-case text-xl">SIPerba</a>
                </div>
                <div class="flex-none">
                    <div class="dropdown dropdown-left">
                        <label tabindex="0" class="btn btn-square btn-ghost">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-5 h-5 stroke-current">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                            </svg>
                        </label>
                        <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52 text-black">
                            <li><a href="/home/profile" class="hover:bg-primary hover:text-white group"><i class="bi bi-person-fill text-primary group-hover:text-white"></i> Profile</a></li>
                            <li><a href="/auth/logout" class="hover:bg-primary hover:text-white group"><i class="bi bi-box-arrow-in-left text-primary group-hover:text-white"></i> Logout</a></li>
                        </ul>
                    </div>
                    <button class="btn btn-square btn-ghost">
                    </button>
                </div>
            </div>
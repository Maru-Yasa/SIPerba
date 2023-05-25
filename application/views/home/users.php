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
	<title>SIPerba | Users</title>
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
                <div class="mt-3 rounded-lg bg-primary p-10 h-32 relative overflow-hidden flex items-center group">
                    <h1 class="text-3xl font-bold text-white z-10"><i class="bi bi-people-fill"></i> Users</h1>
                    <div class="absolute -top-2 z-0 right-1 opacity-40 group-hover:blur-sm ease-in duration-300">
                        <img src="/assets/images/undraw_people_re_8spw.svg" width="200" alt="">
                    </div>
                </div>
            </div>

            <div class="w-full px-5 mt-5">
				<div class="bg-base-100 rounded-lg shadow-lg p-3 h-96 overflow-x-auto overflow-y-auto">
					<a href="/home/tambahuser" class="btn btn-primary">Tambah User</a>
					<table class="table w-full table-zebra mt-4">
						<thead>
							<tr>
								<th class="normal-case">No</th>
								<th class="normal-case">Nama</th>
								<th class="normal-case">Username</th>
								<th class="normal-case">Role</th>
								<th class="normal-case text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>Muh Ma'ruf Ilyasa'</td>
								<td>maru_yasa</td>
								<td>Admin</td>
								<td class="flex gap-2 justify-center">
									<a class="btn btn-accent" href=""><i class="bi bi-pencil-fill"></i></a>
									<a class="btn btn-error" href=""><i class="bi bi-trash-fill"></i></a>
								</td>
							</tr>
						</tbody>
					</table>
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
	<script>
        MathJax = {
            tex: {
                inlineMath: [
                    ['$', '$'],
                    ['\\(', '\\)']
                ]
            }
        };
    </script>
    <script id="MathJax-script" async src="/assets/dist/tex-chtml.js">
    </script>
</body>

</html>

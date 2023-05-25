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
	<title>SIPerba | Setting</title>
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
                    <h1 class="text-3xl font-bold text-white z-10"><i class="bi bi-gear-fill"></i> Setting</h1>
                    <div class="absolute -top-10 z-0 right-1 opacity-40 group-hover:blur-sm ease-in duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" width="200" viewBox="0 0 783.92771 868.73369" xmlns:xlink="http://www.w3.org/1999/xlink"><title>enter</title><path d="M741.2766,553.82947c427.43868,285.99636,288.51919,392.56531-266.62023,295.50409C329.60644,823.97285,208.03614,717.03187,208.03614,553.82947s119.37-295.50409,266.62023-295.50409S605.63611,463.0733,741.2766,553.82947Z" transform="translate(-208.03614 -15.63315)" fill="#3f3d56"/><ellipse cx="571.45602" cy="801.70598" rx="168.85948" ry="15.10848" opacity="0.1"/><ellipse cx="238.42771" cy="303.70598" rx="89.5" ry="15.10848" opacity="0.1"/><path d="M441.77321,356.53218A203.53841,203.53841,0,0,0,258.143,472.19205,203.02876,203.02876,0,0,1,408.89,405.41256c112.39817,0,203.52011,91.12188,203.52011,203.52011a202.64833,202.64833,0,0,1-19.88988,87.86024,202.7816,202.7816,0,0,0,52.773-136.74062C645.29332,447.65406,554.17138,356.53218,441.77321,356.53218Z" transform="translate(-208.03614 -15.63315)" opacity="0.1"/><path d="M612.41016,608.044a202.6483,202.6483,0,0,1-19.88988,87.86024,203.02876,203.02876,0,0,1-150.74707,66.77949c-112.39818,0-203.52011-91.12193-203.52011-203.5201A202.64811,202.64811,0,0,1,258.143,471.30334,203.02877,203.02877,0,0,1,408.89,404.52384C521.28822,404.52384,612.41016,495.64572,612.41016,608.044Z" transform="translate(-208.03614 -15.63315)" fill="#6c63ff" opacity="0.3"/><path d="M441.77343,763.68346c-112.773,0-204.52051-91.74707-204.52051-204.51953a202.601,202.601,0,0,1,19.98828-88.293A204.539,204.539,0,0,1,441.77343,354.64342c112.77295,0,204.52,91.74756,204.52,204.52051a204.50619,204.50619,0,0,1-204.52,204.51953Zm0-407.04c-77.48926,0-149.21485,45.17627-182.72852,115.09277a200.60547,200.60547,0,0,0-19.792,87.42774c0,111.66992,90.8501,202.51953,202.52051,202.51953a202.50552,202.50552,0,0,0,202.52-202.51953C644.29345,447.49352,553.44335,356.64342,441.77343,356.64342Z" transform="translate(-208.03614 -15.63315)" fill="#fff"/><path d="M907.39185,766.26778c-14.78157,19.33172-13.09129,45.458-13.09129,45.458s25.65595-5.21661,40.43753-24.54834,13.09128-45.458,13.09128-45.458S922.17342,746.93605,907.39185,766.26778Z" transform="translate(-208.03614 -15.63315)" fill="#d0cde1"/><path d="M917.07859,770.60943c-2.86846,24.16572-22.286,41.72709-22.286,41.72709s-14.76681-21.619-11.89835-45.78475,22.286-41.7271,22.286-41.7271S919.94705,746.4437,917.07859,770.60943Z" transform="translate(-208.03614 -15.63315)" fill="#6c63ff"/><circle cx="172.82786" cy="104.91057" r="83.97916" fill="#ff6584"/><path d="M562.93745,206.166c.04074,83.8842-49.81343,113.19375-111.32351,113.22362q-2.14317.001-4.26566-.04579-4.27613-.09017-8.46322-.38554c-55.51682-3.90373-98.66675-34.672-98.70463-112.68411C340.14122,125.5413,443.274,23.60786,451.00859,16.07085c.00676,0,.00676,0,.0136-.00685.29385-.28725.44423-.43085.44423-.43085S562.89671,122.28859,562.93745,206.166Z" transform="translate(-208.03614 -15.63315)" fill="#6c63ff"/><path d="M447.55394,306.56045l40.7079-56.9361-40.80742,63.18424-.10614,6.53524q-4.27613-.09017-8.46322-.38554l4.348-83.92055-.03444-.64937.075-.12312.41322-7.92991-40.97141-63.30175L443.807,220.39481l.10338,1.68162,3.28464-63.40527L412.11519,93.25422l35.505,54.27411,3.38836-131.45748.01339-.43748.00021.43063-.52377,103.66783L485.36237,78.617,450.3523,128.65968l-.89526,56.7732,32.56057-54.4985-32.68636,62.8453-.49737,31.56877,47.25439-75.86125-47.43363,86.87409Z" transform="translate(-208.03614 -15.63315)" fill="#3f3d56"/><path d="M780.99194,254.22683c-10.67463-18.03682-31.79353-18.87742-31.79353-18.87742s-20.57917-2.63164-33.78057,24.83865c-12.30476,25.60458-29.2869,50.32632-2.734,56.32016l4.79623-14.928,2.97028,16.03938a103.89546,103.89546,0,0,0,11.361.19416c28.436-.91808,55.517.26861,54.64508-9.93543C785.29731,294.3135,791.26307,271.58185,780.99194,254.22683Z" transform="translate(-208.03614 -15.63315)" fill="#2f2e41"/><polygon points="525.862 407.843 528.608 435.301 592.22 428.437 593.593 407.843 525.862 407.843" fill="#a0616a"/><path d="M727.03377,438.57806l-1.83056,16.01748s-21.05155,29.2891-19.221,79.62975S677.15077,808.353,699.1176,810.18356s61.32406,4.57642,63.15463-2.28821,5.4917-267.26307,5.4917-267.26307,9.61049,267.588,26.08561,268.50324,71.84983,2.74586,71.84983-4.11878S817.1893,491.66456,817.1893,491.66456l-7.77992-25.628-7.77992-31.57731s-48.51008,8.23756-61.7817,5.03406S727.03377,438.57806,727.03377,438.57806Z" transform="translate(-208.03614 -15.63315)" fill="#2f2e41"/><circle cx="540.96446" cy="266.8889" r="29.2891" fill="#a0616a"/><path d="M800.25653,331.03213l-5.56031,8.09112-3.56047,5.17593-5.98141,8.69978-29.74675,2.28821s-7.22619-2.334-15.56441-5.7434c-3.07993-1.2631-6.31549-2.67264-9.39083-4.16912-11.93071-5.79376-21.50461-12.86434-10.74085-17.546a35.73415,35.73415,0,0,0,5.48712-2.94722,27.877,27.877,0,0,0,4.39794-3.56044,23.9886,23.9886,0,0,0,6.59006-21.40852l28.83146-4.11878c-.83752,7.31312,6.43448,15.28982,14.58511,21.80208,2.67714,2.14635,5.45506,4.12792,8.06818,5.87612C794.52226,328.05746,800.25653,331.03213,800.25653,331.03213Z" transform="translate(-208.03614 -15.63315)" fill="#a0616a"/><path d="M760.8993,339.72734s-28.145-4.80525-34.552-14.87338c0,0-27.68735,3.43232-25.39914,18.07687s25.17032,94.73195,25.17032,94.73195,57.20528-10.98342,78.25682-2.74586l12.814-102.05422s-4.57643-10.06813-13.27163-7.32227-12.12752.22882-12.12752.22882S781.95084,339.72734,760.8993,339.72734Z" transform="translate(-208.03614 -15.63315)" fill="#d0cde1"/><path d="M786.52727,500.35976s19.67861,21.96683,8.6952,25.628-24.255-14.64455-24.255-14.64455Z" transform="translate(-208.03614 -15.63315)" fill="#a0616a"/><path d="M792.93426,502.19033s-16.01748,10.98342-10.06813,18.30569,26.54325-6.407,26.54325-9.15284S792.93426,502.19033,792.93426,502.19033Z" transform="translate(-208.03614 -15.63315)" fill="#a0616a"/><path d="M753.577,442.69684l-13.27162,2.28821-8.6952-64.52755a231.696,231.696,0,0,0-1.15785-35.08285c-.9702-7.77991-2.59022-15.2578-5.25373-20.49323a27.877,27.877,0,0,0,4.39794-3.56044c3.18523,5.04778,8.99726,15.73829,10.24662,28.22279a45.47952,45.47952,0,0,1,.00458,9.40454c-2.28821,21.50919-1.83057,25.628-1.83057,25.628Z" transform="translate(-208.03614 -15.63315)" fill="#2f2e41"/><path d="M722.915,328.74392s-21.50918-5.94935-23.33975,6.86464.45764,45.76422,5.49171,58.12056S727.49142,446.358,727.49142,446.358s31.57731,40.27252,32.95024,49.883,8.23756,19.67862,8.23756,19.67862L790.646,501.73269l-43.01837-72.76512-18.76334-50.34064S736.64426,332.8627,722.915,328.74392Z" transform="translate(-208.03614 -15.63315)" fill="#d0cde1"/><path d="M807.12117,330.57449l10.06813,2.28821s9.15284,39.35724,5.4917,60.40878-4.11878,28.37382-4.11878,28.37382l-3.20349,59.95113s.91528,38.44195-5.49171,32.4926-19.221-8.6952-19.221-8.6952,1.37292-16.93277,6.407-21.05155c0,0,5.94935-31.57731,2.28821-45.30658S807.12117,330.57449,807.12117,330.57449Z" transform="translate(-208.03614 -15.63315)" fill="#d0cde1"/><path d="M810.7823,374.96579,799.11243,442.468l-7.09346-2.97468,12.35634-64.52755-13.23956-30.66661-11.53256-26.70342c2.67714,2.14635,5.45506,4.12792,8.06818,5.87612l7.02485,15.65137Z" transform="translate(-208.03614 -15.63315)" fill="#2f2e41"/><polygon points="568.236 236.855 547.372 225.926 518.559 230.397 512.598 256.726 527.437 256.155 531.583 246.482 531.583 255.996 538.43 255.732 542.404 240.332 544.888 256.726 569.23 256.229 568.236 236.855" fill="#2f2e41"/><ellipse cx="527.01932" cy="796.37357" rx="14.21975" ry="5.3324" fill="#2f2e41"/><ellipse cx="623.0026" cy="796.37357" rx="14.21975" ry="5.3324" fill="#2f2e41"/><path d="M471.5819,664.42784a99.80371,99.80371,0,0,1-98.79146,5.75454l2.20106-4.48976A95.5,95.5,0,1,0,321.647,582.98325l-4.99791.15331A100.50454,100.50454,0,1,1,471.5819,664.42784Z" transform="translate(-208.03614 -15.63315)" fill="#fff"/><path d="M426.354,574.00832c-14.78539,3.27254-34.46288,5.267-48.8008,3.18441l17.999,13.70676L345.16364,623.3983l2.71005,4.20186,50.38869-32.49887,5.06542,22.05426C407.34427,603.235,417.27721,586.13185,426.354,574.00832Z" transform="translate(-208.03614 -15.63315)" fill="#fff"/></svg>
                    </div>
                </div>
                <div class="mt-3 rounded-lg shadow p-3">
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Nama Instansi</span>
                          </label>
                        <input type="text" placeholder="Nama instansi" class="input input-bordered w-full" />
                    </div>
                    <div class="form-control w-full mt-3">
                        <label class="label">
                            <span class="label-text">Alamat Instansi</span>
                          </label>
                          <textarea name="" placeholder="Alamat instansi" class="input input-bordered w-full" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-control mt-4 w-32">
                        <button class="btn btn-primary">Simpan</button>
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

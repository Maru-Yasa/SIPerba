<!DOCTYPE html>
<html lang="en" class="bg-base-200">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url() ?>/assets/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="<?= base_url() ?>/assets/dist/tailwind.css"></script>
    <link rel="stylesheet" href="<?= base_url() ?>/assets/dist/index.css">
    <title>APLIKASI PERHITUNGAN BALOK BANGUNAN BETON MENGGUNAKAN METODE LRFD</title>
</head>

<body class="">
    <div class="navbar bg-primary text-white shadow-md mb-5">
        <div class="navbar-start">
            <div class="dropdown">
                <label tabindex="0" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </label>
                <ul tabindex="0" class="text-primary menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a href="/">Kalkulator</a></li>
                    <li><a href="/history.html">Histori</a></li>
                </ul>
            </div>
            <a class="btn btn-ghost normal-case text-xl">Kalkulator LRFD</a>
        </div>
        <div class="navbar-end hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
                <li><a href="<?= base_url('') ?>">Kalkulator</a></li>
                <li><a href="<?= base_url('home/history') ?>">Histori</a></li>
            </ul>
        </div>
    </div>

    <div class="w-full flex flex-col justify-items-center items-center p-5 md:p-5 lg:p-0">
        <div class="mb-3">
            <h1 class="text-3xl font-semibold">Histori Perhitungan</h1>
        </div>
        <div class="bg-base-100 rounded-lg shadow-lg p-3 h-96 w-full md:w-full lg:w-fit overflow-x-auto overflow-y-auto">
            <div class="">
                <table class="table table-zebra ">
                    <thead>
                        <tr>
                            <th></th>
                            <th class="normal-case">$b (inch)$</th>
                            <th class="normal-case">$d (inch)$</th>
                            <th class="normal-case">$As (inch^2)$</th>
                            <th class="normal-case">$Fy (psi)$</th>
                            <th class="normal-case">$f'c (psi)$</th>
                            <th class="normal-case">$M_n$</th>
                            <th class="normal-case">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($riwayat as $history) :
                        ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $history->b ?></td>
                                <td><?= $history->d ?></td>
                                <td><?= $history->as2 ?></td>
                                <td><?= $history->fy ?></td>
                                <td><?= $history->fc ?></td>
                                <td><?= $history->hasil ?></td>
                                <td><?= $history->date ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <!-- jangan di hapus -->
                    <!-- <tfoot>
                    <tr>
                      <th></th> 
                      <th class="normal-case">$b (inch)$</th> 
                      <th class="normal-case">$d (inch)$</th> 
                      <th class="normal-case">$As (inch^2)$</th> 
                      <th class="normal-case">$Fy (psi)$</th> 
                      <th class="normal-case">$f'c (psi)$</th> 
                      <th class="normal-case">$M_n$</th> 
                      <th class="normal-case">Tanggal</th>
                    </tr>
                  </tfoot> -->
                </table>
            </div>
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
    <script id="MathJax-script" async src="<?= base_url() ?>/assets/dist/tex-chtml.js">
    </script>
</body>

</html>
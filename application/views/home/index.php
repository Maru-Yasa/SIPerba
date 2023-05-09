<!DOCTYPE html>
<html lang="en" class="bg-base-200">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url() ?>assets/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="<?= base_url() ?>assets/dist/tailwind.css"></script>
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/index.css">
    <title>APLIKASI PERHITUNGAN BALOK BANGUNAN BETON MENGGUNAKAN METODE LRFD</title>
</head>

<body class="">
    <div class="navbar bg-primary text-white shadow-md">
        <div class="navbar-start">
            <div class="dropdown">
                <label tabindex="0" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </label>
                <ul tabindex="0" class="text-primary menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a href="<?= base_url('') ?>">Kalkulator</a></li>
                    <li><a href="<?= base_url('home/history') ?>">Histori</a></li>
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
    <div class="mb-5 gap-3 flex flex-col md:flex-row lg:flex-row sm:items-center md:items-start lg:items-start sm:mt-3 md:mt-10 lg:mt-10 justify-center p-2">
        <form action="<?= base_url('home/hitung') ?>" method="post">
            <div class="shadow-lg bg-base-100 rounded-lg p-7 md:mx-0 mt-0 sm:mx-auto grid lg:grid-cols-2 lg:grid-rows-3 sm:grid-cols-1 gap-3 overflow-x-auto">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Lebar Balok $(b)$</span>
                    </label>
                    <input type="number" placeholder="" name="balok" class="input w-full input-bordered" />
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Tinggi Efektif Balok $(d)$</span>
                    </label>
                    <input type="number" placeholder="" name="tinggi" class="input input-bordered" />
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Luas Tulangan Tarik $(As)$</span>
                    </label>
                    <input type="number" placeholder="" name="luas" class="input input-bordered" />
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Kekuatan Mutu Beton $(f'c)$</span>
                    </label>
                    <input type="number" placeholder="" name="kekuatan" class="input input-bordered" />
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Mutu Baja $(Fy)$</span>
                    </label>
                    <input type="number" placeholder="" name="mutu" class="input input-bordered" />

                </div>
                <div class="form-control flex flex-row gap-3 items-end md:justify-center">
                    <button type="submit" class="btn btn-primary">Hitung</button>
                    <button class="btn btn-error">Reset</button>
                </div>
            </div>
        </form>
        <div class="bg-base-100 p-4 rounded-lg w-64 shadow-lg sm:mx-auto md:mx-0 md:mt-0 sm:mt-5">
            <h2 class="text-2xl font-semibold">Hasil:</h2>
            <span class="text-error">
                <?= $this->session->flashdata('hasil'); ?>
        </div>
        </span>
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
    <script id="MathJax-script" async src="<?= base_url() ?>assets/dist/tex-chtml.js">
    </script>

</body>

</html>
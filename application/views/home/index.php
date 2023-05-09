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
            <div class="shadow-lg bg-base-100 rounded-lg p-7 md:mx-0 mt-0 sm:mx-auto grid lg:grid-cols-2 lg:grid-rows-3 sm:grid-cols-1 gap-3 overflow-x-auto">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Lebar Balok $(b)$</span>
                    </label>
                    <input required id="b" type="number" placeholder="" name="balok" class="input w-full input-bordered" />
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Tinggi Efektif Balok $(d)$</span>
                    </label>
                    <input id="d" type="number" placeholder="" name="tinggi" class="input input-bordered" />
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Luas Tulangan Tarik $(As)$</span>
                    </label>
                    <input id="as" type="number" placeholder="" name="luas" class="input input-bordered" />
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Kekuatan Mutu Beton $(f'c)$</span>
                    </label>
                    <input id="fc" type="number" placeholder="" name="kekuatan" class="input input-bordered" />
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Mutu Baja $(Fy)$</span>
                    </label>
                    <input id="fy" type="number" placeholder="" name="mutu" class="input input-bordered" />

                </div>
                <div class="form-control flex flex-row gap-3 items-end md:justify-center">
                    <button id="submit" class="btn btn-primary">Hitung</button>
                    <button class="btn btn-error">Reset</button>
                </div>
            </div>
        <div class="bg-base-100 p-4 rounded-lg w-64 shadow-lg sm:mx-auto md:mx-0 md:mt-0 sm:mt-5 overflow-x-auto">
            <h2 class="text-2xl font-semibold">Hasil:</h2>
            <span class="text-error" id="hasil">
                <?= $this->session->flashdata('hasil'); ?>
			</span>
        </div>
    </div>

    <script>
		MathJax = {
			loader: {load: ['input/asciimath', 'output/chtml', 'ui/menu']},
			asciimath: {
				delimiters: [['$','$'], ['`','`']]
			}
		};

		function extractData(id){
			return document.getElementById(id).value
		}

		function loading() {
			document.getElementById('submit').classList.add('loading')
		}

		function endLoading() {
			document.getElementById('submit').classList.remove('loading')
		}

		let submitButton = document.getElementById('submit');
		let hasilSpan = document.getElementById('hasil')
		submitButton.addEventListener('click', () => {
			let input = {
				"b": extractData('b'),
				"d": extractData('d'),
				"as": extractData('as'),
				"fy": extractData('fy'),
				"fc": extractData('fc')  
			}
			loading()
			fetch(`/api/hitung?b=${input['b']}&d=${input['d']}&as=${input['as']}&fy=${input['fy']}&fc=${input['fc']}`)
				.then(res => res.json())
					.then(data => {
						console.log(data);
						if (data.status){
							hasilSpan.classList.remove('text-error')
							hasilSpan.classList.add('text-black')
							hasilSpan.innerHTML = `$M_n=${input['as']} xx ${input['fy']} (${input['d']} - ${data.input['a']} / 2)$ $M_n=$${data.data} lb/inci`
							MathJax.typeset()
						} else {
							hasilSpan.classList.add('text-error')
							hasilSpan.classList.remove('text-black')
							hasilSpan.innerHTML = data.data
						}
						endLoading()
					})
		})

    </script>
	<script type="text/javascript" id="MathJax-script" async
		src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/startup.js">
	</script>

</body>

</html>

<!DOCTYPE html>
<html lang="en" class="bg-base-200">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="/assets/dist/full.css" rel="stylesheet" type="text/css" />
	<script src="/assets/dist/tailwind.css"></script>
	<link rel="stylesheet" href="/assets/dist/index.css">
	<title>APLIKASI PERHITUNGAN BALOK BANGUNAN BETON MENGGUNAKAN METODE LRFD</title>
</head>

<body class="">
	<div class="navbar bg-primary text-white shadow-md">
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
					class="text-primary menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
					<li><a href="<?= base_url('') ?>">Kalkulator</a></li>
					<li><a href="<?= base_url('home/history') ?>">Histori</a></li>
				</ul>
			</div>
			<a class="btn btn-ghost normal-case text-xl">Perhitungan Bangunan Balok</a>
		</div>
		<div class="navbar-end hidden lg:flex">
			<ul class="menu menu-horizontal px-1">
				<li><a href="<?= base_url('') ?>">Kalkulator</a></li>
				<li><a href="<?= base_url('home/history') ?>">Histori</a></li>
			</ul>
		</div>
	</div>
	<div
		class="mb-5 gap-3 grid sm:grid-cols-1 md:grid-cols-5 lg:grid-cols-5 sm:items-center md:items-start lg:items-start sm:mt-3 justify-center p-2">
		<div
			class="md:col-span-2 shadow-lg bg-base-100 rounded-lg p-7 md:mx-0 mt-0 sm:mx-auto grid lg:grid-cols-1 lg:grid-rows-1 sm:grid-cols-1 gap-3 overflow-x-auto">
			<div class="form-control">
				<label class="label">
					<span class="label-text">$(b)$ Lebar Balok (inci)</span>
				</label>
				<input required id="b" type="number" placeholder="" name="balok" class="input w-full input-bordered" />
			</div>
			<div class="form-control">
				<label class="label">
					<span class="label-text">$(d)$ Tinggi Efektif Balok (inci)</span>
				</label>
				<input id="d" type="number" placeholder="" name="tinggi" class="input input-bordered" />
			</div>
			<div class="form-control">
				<label class="label">
					<span class="label-text">$(As)$ Luas Tulangan Tarik (inci$,^2$)</span>
				</label>
				<input id="as" type="number" placeholder="" name="luas" class="input input-bordered" />
			</div>
			<div class="form-control">
				<label class="label">
					<span class="label-text">$(f'c)$ Kekuatan Mutu Beton (psi)</span>
				</label>
				<input id="fc" type="number" placeholder="" name="kekuatan" class="input input-bordered" />
			</div>
			<div class="form-control">
				<label class="label">
					<span class="label-text">$(F_y)$ Mutu Baja (psi)</span>
				</label>
				<input id="fy" type="number" placeholder="" name="mutu" class="input input-bordered" />

			</div>
			<div class="form-control flex flex-row gap-3 items-end ">
				<button id="submit" class="btn btn-primary">Hitung</button>
				<button class="btn btn-error" id="reset">Reset</button>
			</div>
		</div>
		<div
			class="md:col-span-3 w-full bg-base-100 p-4 rounded-lg w-64 shadow-lg sm:mx-auto md:mx-0 md:mt-0 sm:mt-5 overflow-x-auto">
			<h2 class="text-2xl font-semibold">Hasil:</h2>
			<span class="text-error" id="hasil">
				<?= $this->session->flashdata('hasil'); ?>
			</span>
		</div>
	</div>

	<script>
		MathJax = {
			loader: {
				load: ['input/asciimath', 'output/chtml', 'ui/menu']
			},
			asciimath: {
				delimiters: [
					['$', '$'],
					['`', '`']
				]
			}
		};

		function _resetInput(input) {
			input.forEach(e => {
				document.getElementById(e).value = '';
			});
		}

		function extractData(id) {
			return document.getElementById(id).value
		}

		function loading() {
			document.getElementById('submit').classList.add('loading')
		}

		function endLoading() {
			document.getElementById('submit').classList.remove('loading')
		}

		function visualMn(as, fy, d, a) {
			return `$M_n = A_s xx f_y (d - a / 2) = ${as} xx ${fy} (${d} - ${a} / 2)$`
		}

		function visualA(as, fy, fc, b, a) {
			return `$a = (A_s xx f_y) / (0.85 xx f'c xx b) = (${as} xx ${fy}) / (0.85 xx ${fc} xx ${b}) = ${a}$`
		}

		function visualEt(d, c, et) {
			return `$ε_t = 0,003((d_t-c) / c)$ <br> $ε_t = 0,003((${d}-${c}) / ${c}) = ${et} > 0.005$`
		}

		function visualCdt(c, d, cdt) {
			return `$c/d_t = ${c} / ${d} = ${cdt} > 0.375 < 0.60$`
		}

		function visualC(a, beta, c) {
			return `$c = a/β_1 = ${a}/${beta} = ${c}$`
		}

		function visualBeta(beta) {
			return `$β = ${beta}$`
		}

		function visualRo(p, as, b, d) {
			return `$ρ = A_s / (b xx d) = ${as} / (${b} xx ${d}) = ${p}$`
		}

		function visualRoMin(pMin, fc, fy) {
			return `$ρ_min = root(3)(f'c)/(fy) = root(3)(${fc})/${fy}$ = ${pMin}`
		}

		let submitButton = document.getElementById('submit');
		let hasilSpan = document.getElementById('hasil')
		let resetButton = document.getElementById('reset')

		resetButton.addEventListener('click', () => {
			_resetInput(['b', 'd', 'as', 'fy', 'fc'])
			hasilSpan.innerHTML = ''
		})

		submitButton.addEventListener('click', () => {
			let input = {
				"b": extractData('b'),
				"d": extractData('d'),
				"as": extractData('as'),
				"fy": extractData('fy'),
				"fc": extractData('fc')  
			}

			// let input = {
			// 	"b": 10,
			// 	"d": 18,
			// 	"as": 4,
			// 	"fy": 60000,
			// 	"fc": 9000
			// }
			loading()
			fetch(`/api/hitung?b=${input['b']}&d=${input['d']}&as=${input['as']}&fy=${input['fy']}&fc=${input['fc']}`)
				.then(res => res.json())
				.then(data => {
					console.log(data);
					if (data.status) {
						hasilSpan.classList.remove('text-error')
						hasilSpan.classList.add('text-inherit')
						hasilSpan.innerHTML =
							`	$f'c = ${input['fc']}$ psi <br>
								${visualRoMin(data.input['pMin1'], input['fc'], input['fy'])} <br>
								${visualRo(data.input['p'], input['as'], input['b'], input['d'])} <br>
								${data.input['perbandinganRo']} <br>
								${visualBeta(data.input['beta'])} <br> 
								${visualC(data.input['a'], data.input['beta'], data.input['c'])} <br> 
								${visualCdt(data.input['c'], input['d'], data.input['cdt'])} <br> 
								${data.input['perbandinganCdt']} <br>
								${visualEt(input['d'], data.input['c'], data.input['et'])} <br>
								${data.input['perbandinganEt']} <br>
								${visualA(input['as'], input['fy'], input['fc'], input['b'], data.input['a'])} <br> 
								${visualMn(input['as'], input['fy'], input['d'], data.input['a'])} <br> 
								$M_n=$${data.data} lb-inci (446 kN-m)`
						MathJax.typeset()
					} else {
						hasilSpan.classList.add('text-inherit')
						if (data.input.stepError == 1) {

							hasilSpan.innerHTML = `
								$f'c = ${input['fc']}$ psi <br>
								${visualRoMin(data.input['pMin1'], input['fc'], input['fy'])} <br>
								${visualRo(data.input['p'], input['as'], input['b'], input['d'])} <br>
								<span class="text-error">${data.data}</span>
							`
						}

						if (data.input.stepError == 2) {

							hasilSpan.innerHTML = `
								$f'c = ${input['fc']}$ psi <br>
								${visualRoMin(data.input['pMin1'], input['fc'], input['fy'])} <br>
								${visualRo(data.input['p'], input['as'], input['b'], input['d'])} <br>
								${data.input['perbandinganRo']} <br>
								${visualBeta(data.input['beta'])} <br> 
								${visualC(data.input['a'], data.input['beta'], data.input['c'])} <br> 
								${visualCdt(data.input['c'], input['d'], data.input['cdt'])} <br> 
								<span class="text-error">${data.data}</span>
							`
						}

						if (data.input.stepError == 3) {

						hasilSpan.innerHTML = `
							$f'c = ${input['fc']}$ psi <br>
							${visualRoMin(data.input['pMin1'], input['fc'], input['fy'])} <br>
							${visualRo(data.input['p'], input['as'], input['b'], input['d'])} <br>
							${data.input['perbandinganRo']} <br>
							${visualBeta(data.input['beta'])} <br> 
							${visualC(data.input['a'], data.input['beta'], data.input['c'])} <br> 
							${visualCdt(data.input['c'], input['d'], data.input['cdt'])} <br> 
							${data.input['perbandinganCdt']} <br>
							${visualEt(input['d'], data.input['c'], data.input['et'])} <br>
							<span class="text-error">${data.data}</span>
						`
						}

						MathJax.typeset()
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

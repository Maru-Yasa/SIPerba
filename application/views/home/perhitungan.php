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
	<title>SIPerba | Perhitungan</title>
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
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z">
								</path>
							</svg>
						</label>
						<ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52 text-black">
							<li><a href="/home/profile" class="hover:bg-primary hover:text-white group"><i class="bi bi-person-fill text-primary group-hover:text-white"></i> Profile</a></li>
							</li>
							<li><a href="/auth/logout" class="hover:bg-primary hover:text-white group"><i class="bi bi-box-arrow-in-left text-primary group-hover:text-white"></i>
									Logout</a></li>
						</ul>
					</div>
					<button class="btn btn-square btn-ghost">
					</button>
				</div>
			</div>

			<div class="w-full px-5 mt-4">
				<div class="mt-3 rounded-lg bg-primary p-10 h-32 relative overflow-hidden flex items-center group">
					<h1 class="text-3xl font-bold text-white z-10"><i class="bi bi-gear-fill"></i> Perhitungan</h1>
					<div class="absolute -top-2 z-0 right-1 opacity-40 group-hover:blur-sm ease-in duration-300">
						<img src="/assets/images/undraw_mathematics_-4-otb.svg" width="200" alt="">
					</div>
				</div>
			</div>

			<div class="mb-5 gap-3 grid sm:grid-cols-1 md:grid-cols-5 lg:grid-cols-5 sm:items-center md:items-start lg:items-start sm:mt-3 justify-center p-2">
				<!-- Input awal start -->
				<div class="md:col-span-2 shadow-lg bg-base-100 rounded-lg p-7 md:mx-0 mt-0 sm:mx-auto grid lg:grid-cols-1 lg:grid-rows-1 sm:grid-cols-1 gap-3 overflow-x-auto">
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
							<span class="label-text">$(fc')$ Kekuatan Mutu Beton (psi)</span>
						</label>
						<input id="fc" type="number" placeholder="" name="kekuatan" class="input input-bordered" />
					</div>
					<div class="form-control">
						<label class="label">
							<span class="label-text">$(F_y)$ Mutu Baja (psi)</span>
						</label>
						<input id="fy" type="number" placeholder="" name="mutu" value="60000" class="input input-bordered" />

					</div>
					<!-- Input awal end -->
					<!-- Submit button start -->
					<div class="form-control flex flex-row gap-3 items-end ">
						<button id="submit" class="btn btn-primary">Hitung</button>
						<button class="btn btn-error" id="reset">Reset</button>
					</div>
					<!-- Submit button end -->
				</div>
				<!-- Box hasil start -->
				<div class="md:col-span-3 w-full bg-base-100 p-4 rounded-lg w-64 shadow-lg sm:mx-auto md:mx-0 md:mt-0 sm:mt-5 overflow-x-auto">
					<h2 class="text-2xl font-semibold">Hasil:</h2>
					<span class="text-error" id="hasil">
						<?= $this->session->flashdata('hasil'); ?>
					</span>
				</div>
				<!-- Box hasil end -->
			</div>


		</div>
		<div class="drawer-side">
			<label for="my-drawer" class="drawer-overlay"></label>
			<ul class="menu p-4 w-80 bg-base-100 text-base-content">
				<!-- Sidebar content here -->
				<?php
				$role = $this->session->userdata('role');
				if ($role == 'engineer' || $role == 'manager') {
				?>
					<li><a href="/" class="hover:bg-primary hover:text-white group"><i class="bi bi-speedometer2 text-primary group-hover:text-white"></i> Dasbor</a></li>
				<?php } ?>
				<li><a href="/home/perhitungan" class="hover:bg-primary hover:text-white group"><i class="bi bi-calculator text-primary group-hover:text-white"></i> Perhitungan</a></li>
				<li><a href="/home/history" class="hover:bg-primary hover:text-white group"><i class="bi bi-clock-history text-primary group-hover:text-white"></i> History</a></li>
				<?php if ($role == 'engineer' || $role == 'manager') { ?>
					<li><a href="/home/users" class="hover:bg-primary hover:text-white group"><i class="bi bi-people-fill text-primary group-hover:text-white"></i> Users</a></li>
					<li><a href="/home/setting" class="hover:bg-primary hover:text-white group"><i class="bi bi-gear-fill text-primary group-hover:text-white"></i> Setting</a></li>
				<?php } ?>

			</ul>
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

		function _b(x) {
			return Math.round(x * 1000) / 1000;
		}

		function _pembulatan(x) {
			return +(Math.round(x + "e+2") + "e-2");

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
			return `$M_n = A_s xx f_y (d - a / 2) = ${(as)} xx ${fy} (${d} - ${a} / 2)$`
		}

		function visualA(as, fy, fc, b, a) {
			return `$a = (A_s xx f_y) / (0.85 xx fc' xx b) = (${as} xx ${fy}) / (0.85 xx ${fc} xx ${b}) = ${_b(a)}$ inci`
		}

		function visualEt(d, c, et) {
			return `$ε_t = 0,003((d_t-c) / c)$ <br> $ε_t = 0,003((${d}-${c}) / ${c}) = ${_b(et)} > 0.005$`
		}

		function visualCdt(c, d, cdt, terkontrolTekan = false) {
			return `$c/d_t = ${c} / ${d} = ${_b(cdt)}$ ${terkontrolTekan == true ? '(Terkontrol Tekan)' : ''}`
		}

		function visualC(a, beta, c) {
			return `$c = a/β_1 = ${a}/${beta} = ${_b(c)}$ inci`
		}

		function visualBeta(beta, fc) {
			if (4000 < fc && fc <= 8000) {
				return `$β_1 = 0.85 - 0.05 ((fc' - 4000) / 1000) = 0.85 - 0.05 ((${fc} - 4000) / 1000) = ${beta} $`
			}
			return `$β_1 = ${beta}$`
		}

		function visualRo(p, as, b, d) {
			return `$ρ = A_s / (b xx d) = ${as} / (${b} xx ${d}) = ${_b(p)}$`
		}

		function visualRoMin(pMin, fc, fy) {
			return `$ρ_min = root(3)(fc')/(fy) = root(3)(${fc})/${fy}$ = ${_b(pMin)}`
		}

		function visualCBesar(fc, b, a, C) {
			return `$C = 0.85 xx fc' xx b xx a = 0.85 xx ${fc} xx ${b} xx ${a} = ${C}a $ $lb$`
		}

		function visualT(T, as, fy) {
			return `$T = A_s xx f_y = ${as} xx ${fy} = ${T} lb$`;
		}

		function visualDt(d) {
			return `$d_t = d = ${d}$ inci`;
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
			// 	"fc": 3000
			// }
			loading()
			fetch(`/api/hitung?b=${input['b']}&d=${input['d']}&as=${input['as']}&fy=${input['fy']}&fc=${input['fc']}`)
				.then(res => res.json())
				.then(data => {
					console.log(data);

					if (data.status) {
						// ketika berhasil
						hasilSpan.classList.remove('text-error')
						hasilSpan.classList.add('text-inherit')
						hasilSpan.innerHTML =
							`	$fc' = ${input['fc']}$ psi <br>
								${visualRoMin(data.input['pMin1'], input['fc'], input['fy'])} <br>
								${visualRo(data.input['p'], input['as'], input['b'], input['d'])} <br>
								<span class="text-success">${data.input['perbandinganRo']}</span><br>
								${visualBeta(data.input['beta'], input['fc'])} <br> 
								${data.input['syaratBeta']} <br> 
								${visualDt(input['d'])} <br>
								${visualCBesar(input['fc'], input['b'], 'a', data.input['C'])} <br>
								${visualT(data.input['T'], input['as'], input['fy'])} <br>
								${visualA(input['as'], input['fy'], input['fc'], input['b'], data.input['a'])} <br> 
								${visualC(data.input['a'], data.input['beta'], data.input['c'])} <br> 
								${visualCdt(data.input['c'], input['d'], data.input['cdt'])} <br> 
								<span class="text-success">${data.input['perbandinganCdt']}</span><br>
								${visualEt(input['d'], data.input['c'], data.input['et'])} <br>
								<span class="text-success">${data.input['perbandinganEt']}</span> <br>
								${visualMn(input['as'], input['fy'], input['d'], data.input['a'])} <br> 
								$M_n=$${_b(data.data)} lb-inci (446 kN-m)`
						MathJax.typeset()
					} else {
						hasilSpan.classList.add('text-inherit')
						if (data.input.stepError == 1) {

							hasilSpan.innerHTML = `
								$fc' = ${input['fc']}$ psi <br>
								${visualRoMin(data.input['pMin1'], input['fc'], input['fy'])} <br>
								${visualRo(data.input['p'], input['as'], input['b'], input['d'])} <br>
								<span class="text-error">${data.data}</span>
							`
						}

						if (data.input.stepError == 2) {
							// c/dt yang error
							hasilSpan.innerHTML = `
								$fc' = ${input['fc']}$ psi <br>
								${visualRoMin(data.input['pMin1'], input['fc'], input['fy'])} <br>
								${visualRo(data.input['p'], input['as'], input['b'], input['d'])} <br>
								<span class="text-success">${data.input['perbandinganRo']} </span> <br>
								${visualBeta(data.input['beta'], input['fc'])} <br> 
								${data.input['syaratBeta']} <br> 
								${visualDt(input['d'])} <br>
								${visualCBesar(input['fc'], input['b'], 'a', data.input['C'])} <br>
								${visualT(data.input['T'], input['as'], input['fy'])} <br>
								${visualA(input['as'], input['fy'], input['fc'], input['b'], data.input['a'])} <br> 
								${visualC(data.input['a'], data.input['beta'], data.input['c'])} <br> 
								${visualCdt(data.input['c'], input['d'], data.input['cdt'], data.input['terkontrolTekan'])} <br> 
								<span class="text-error">${data.data}</span>
							`
						}

						if (data.input.stepError == 3) {
							// et yang error
							hasilSpan.innerHTML = `
							$fc' = ${input['fc']}$ psi <br>
							${visualRoMin(data.input['pMin1'], input['fc'], input['fy'])} <br>
							${visualRo(data.input['p'], input['as'], input['b'], input['d'])} <br>
							${data.input['perbandinganRo']} <br>
							${visualBeta(data.input['beta'], input['fc'])} <br> 
							${data.input['syaratBeta']} <br> 
							${visualDt(input['d'])} <br>
							${visualCBesar(input['fc'], input['b'], 'a', data.input['C'])} <br>
							${visualT(data.input['T'], input['as'], input['fy'])} <br>
							${visualA(input['as'], input['fy'], input['fc'], input['b'], data.input['a'])} <br> 
							${visualC(data.input['a'], data.input['beta'], data.input['c'])} <br> 
							${visualCdt(data.input['c'], input['d'], data.input['cdt'])} <br> 
							${data.input['perbandinganCdt']} <br>
							${visualEt(input['d'], data.input['c'], data.input['et'])} <br>
							<span class="text-error">${data.data}</span>
						`
						}
						if (data.input.stepError == 0) {
							if (typeof data.data == "object") {
								let spans = [];
								data.data.forEach(e => {
									spans.push(`
										<span class="text-error">${e}</span>
									`)
								});
								hasilSpan.innerHTML = spans.join("<br>")
							} else {
								hasilSpan.innerHTML = `
								<span class="text-error">${data.data}</span>
								`
							}
						}



						MathJax.typeset()
					}
					endLoading()
				})
		})
	</script>
	<script type="text/javascript" id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/startup.js">
	</script>


</body>

</html>
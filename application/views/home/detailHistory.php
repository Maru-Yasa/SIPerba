<style>
	@media print {
		body,html { 
			margin-top:0%;
			display:block;
			height:100%;
		}
	}
</style>
<div class="w-full px-5 mt-4">
    <div class="mt-3 rounded-lg bg-primary p-10 h-32 relative overflow-hidden flex items-center group">
        <h1 class="text-3xl font-bold text-white z-10"><i class="bi bi-gear-fill"></i> Detail Histori</h1>
        <div class="absolute -top-2 z-0 right-1 opacity-40 group-hover:blur-sm ease-in duration-300">
            <img src="/assets/images/undraw_file_manager_re_ms29.svg" width="200" alt="">
        </div>
    </div>
</div>


<div id="printable" class="w-full px-12 mt-10">
	<div class="mb-5">
		<h1 class="text-2xl font-bold">Input Perhitungan</h1>
		<table class="table w-full rounded-lg bg-primary">
			<thead>
				<td class="normal-case">$(b)$ Lebar Balok (inci)</td>
				<td class="normal-case">$(d)$ Tinggi Efektif Balok (inci)</td>
				<td class="normal-case">$(As)$ Luas Tulangan Tarik (inci$,^2$)</td>
				<td class="normal-case">$(f'c)$ Kekuatan Mutu Beton (psi)</td>
				<td class="normal-case">$(F_y)$ Mutu Baja (psi)</td>
			</thead>
			<tbody class="">
				<td class=""><?= $history['b'] ?></td>
				<td class=""><?= $history['d'] ?></td>
				<td class=""><?= $history['as2'] ?></td>
				<td class=""><?= $history['fc'] ?></td>
				<td class=""><?= $history['fy'] ?></td>
			</tbody>
		</table>
	</div>
	<div class="mb-5">
		<h1 class="text-2xl font-bold">Data Rumus</h1>
		<table class="table w-full rounded-lg bg-primary">
			<thead>
				<td class="normal-case">$(a)$</td>
				<td class="normal-case">$(beta)$</td>
				<td class="normal-case">$(c)$</td>
				<td class="normal-case">$(C)$</td>
				<td class="normal-case">$(T)$</td>
				<td class="normal-case">$(cdt)$</td>
				<td class="normal-case">$(et)$</td>
				<td class="normal-case">$(Pmin)$</td>
				<td class="normal-case">$(P)$</td>
			</thead>
			<tbody class="">
				<td class=""><?= $rumus['input']['a'] ?></td>
				<td class=""><?= $rumus['input']['beta'] ?></td>
				<td class=""><?= $rumus['input']['c'] ?></td>
				<td class=""><?= $rumus['input']['C'] ?></td>
				<td class=""><?= $rumus['input']['T'] ?></td>
				<td class=""><?= isset($rumus['input']['cdt']) ? $rumus['input']['cdt'] : '-'?></td>
				<td class=""><?= isset($rumus['input']['et']) ? $rumus['input']['et'] : '-'?></td>
				<td class=""><?= $rumus['input']['pMin1'] ?></td>
				<td class=""><?= $rumus['input']['p'] ?></td>
			</tbody>
		</table>
	</div>
	<div class="mb-5">
		<h1 class="text-2xl font-bold">Perhitungan</h1>
		<p id="rumus">

		</p>
	</div>
	<div class="mb-5">
		<h1 class="text-2xl font-bold mb-3">Data Hasil</h1>
		<p>
			<?php if ($rumus['status'] == false) { ?>
				<span class="text-error">
					<?= $rumus['data'] ?>
				</span>
			<?php } else { ?>
				<span class="">
					$M_n = $ <?= $rumus['data'] ?>
				</span>
			<?php } ?>
		</p>
	</div>
</div>

<script type="text/javascript" id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/startup.js">
</script>
<script>
	window.jsPDF = window.jspdf.jsPDF;
	window.html2canvas = html2canvas;

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

	function printDoc() {
		var doc = new window.jsPDF('l', 'pt', 'letter')
		var printable = document.getElementById('printable')
		doc.html(printable, {
			callback: function(doc){
				doc.save('document.pdf')
			},
			margin: [10, 10, 10, 10],
			autoPaging: 'text',
			x: 0,
			y: 0,
			width: 190, //target width in the PDF document
			windowWidth: 675 //window width in CSS pixels
		})
	}

	function visualMn(as, fy, d, a) {
			return `$M_n = A_s xx f_y (d - a / 2) = ${(as)} xx ${fy} (${d} - ${a} / 2)$`
		}

		function visualA(as, fy, fc, b, a) {
			return `$a = (A_s xx f_y) / (0.85 xx f'c xx b) = (${as} xx ${fy}) / (0.85 xx ${fc} xx ${b}) = ${a}$ inci`
		}

		function visualEt(d, c, et) {
			return `$ε_t = 0,003((d_t-c) / c)$ <br> $ε_t = 0,003((${d}-${c}) / ${c}) = ${et} > 0.005$`
		}

		function visualCdt(c, d, cdt, terkontrolTekan = false) {
			return `$c/d_t = ${c} / ${d} = ${cdt}$ ${terkontrolTekan == true ? '(Terkontrol Tekan)' : ''}`
		}

		function visualC(a, beta, c) {
			return `$c = a/β_1 = ${a}/${beta} = ${c}$ inci`
		}

		function visualBeta(beta) {
			return `$β_1 = ${beta}$`
		}

		function visualRo(p, as, b, d) {
			return `$ρ = A_s / (b xx d) = ${as} / (${b} xx ${d}) = ${p}$`
		}

		function visualRoMin(pMin, fc, fy) {
			return `$ρ_min = root(3)(f'c)/(fy) = root(3)(${fc})/${fy}$ = ${(pMin)}`
		}

		function visualCBesar(fc, b, a, C) {
			return `$C = 0.85 xx f'c xx b xx a = 0.85 xx ${fc} xx ${b} xx ${a} = ${C}a $ $lb$`
		}

		function visualT(T, as, fy) {
			return `$T = A_s xx f_y = ${as} xx ${fy} = ${T} lb$`;
		}

		function visualDt(d) {
			return `$d_t = d = ${d}$ inci`;
		}


		console.log(`<?= var_dump($rumus, $history) ?>`);
		console.log(`<?= json_encode($rumus) ?>`);
	var data = JSON.parse(`<?= json_encode($rumus) ?>`)
	var rumus = JSON.parse(`<?= json_encode($history) ?>`)
	var hasilSpan = document.getElementById('rumus');
	var input = {
		"b": `<?= $history['b'] ?>`,
		"d": `<?= $history['d'] ?>`,
		"as": `<?= $history['as2'] ?>`,
		"fy": `<?= $history['fy'] ?>`,
		"fc": `<?= $history['fc'] ?>`
	}


	if (data.status) {
		// ketika berhasil
		hasilSpan.classList.remove('text-error')
		hasilSpan.classList.add('text-inherit')
		hasilSpan.innerHTML =
			`	$f'c = ${input['fc']}$ psi <br>
				${visualRoMin(data.input['pMin1'], input['fc'], input['fy'])} <br>
				${visualRo(data.input['p'], input['as'], input['b'], input['d'])} <br>
				${data.input['perbandinganRo']} <br>
				${visualBeta(data.input['beta'])} <br> 
				${data.input['syaratBeta']} <br> 
				${visualDt(input['d'])} <br>
				${visualCBesar(input['fc'], input['b'], 'a', data.input['C'])} <br>
				${visualT(data.input['T'], input['as'], input['fy'])} <br>
				${visualA(input['as'], input['fy'], input['fc'], input['b'], data.input['a'])} <br> 
				${visualC(data.input['a'], data.input['beta'], data.input['c'])} <br> 
				${visualCdt(data.input['c'], input['d'], data.input['cdt'])} <br> 
				${data.input['perbandinganCdt']} <br>
				${visualEt(input['d'], data.input['c'], data.input['et'])} <br>
				${data.input['perbandinganEt']} <br>
				${visualMn(input['as'], input['fy'], input['d'], data.input['a'])} <br> 
				$M_n=$${data.data} lb-inci (446 kN-m)`
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
			// c/dt yang error
			hasilSpan.innerHTML = `
				$f'c = ${input['fc']}$ psi <br>
				${visualRoMin(data.input['pMin1'], input['fc'], input['fy'])} <br>
				${visualRo(data.input['p'], input['as'], input['b'], input['d'])} <br>
				${data.input['perbandinganRo']} <br>
				${visualBeta(data.input['beta'])} <br> 
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
			$f'c = ${input['fc']}$ psi <br>
			${visualRoMin(data.input['pMin1'], input['fc'], input['fy'])} <br>
			${visualRo(data.input['p'], input['as'], input['b'], input['d'])} <br>
			${data.input['perbandinganRo']} <br>
			${visualBeta(data.input['beta'])} <br> 
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
	}


</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/print-js/1.6.0/print.js" integrity="sha512-/fgTphwXa3lqAhN+I8gG8AvuaTErm1YxpUjbdCvwfTMyv8UZnFyId7ft5736xQ6CyQN4Nzr21lBuWWA9RTCXCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

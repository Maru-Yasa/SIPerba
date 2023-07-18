<style>
	@media print {

		body,
		html {
			margin-top: 0%;
			display: block;
			height: 100%;
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
	<?php if ($history['is_verified_by_engineer'] === '1') { ?>
		<button class="btn btn-primary gap-2 mt-3" onclick="windowPrint()"><i class="bi bi-printer-fill"></i> Print</button>
	<?php } else { ?>
		<button class="btn btn-primary gap-2 mt-3" disabled><i class="bi bi-printer-fill"></i> Print</button>
	<?php } ?>
	<a href="/home/history" class="btn btn-warning gap-2 mt-3">Back</a>
</div>


<div id="printable" class="w-full px-12 mt-10 border p-2 mx-2">

	<div class="mb-5 text-center flex justify-around">
		<img src="/assets/images/logo.png" class="w-32" alt="">
		<div class="align-baseline">
			<h1 class="text-xl font-bold">
				PT. MALENDES CONSTRUCTION
				<br style="line-height: normal;margin: 0;">
				Contractor & Building Solution
			</h1>
			<h3 class="text-md font-bold">
				Jl. Dukuh Kupang XXV No.54, Dukuh Kupang, Kec.Dukuhpakis, Surabaya, Jawa Timur 60225
				<br style="line-height: normal;margin: 0;">
				Email : info@uwks.ac.id; Telp : (031) 5677577; Whatsapp : 082131006331
			</h3>
		</div>
	</div>
	<hr class="h-1 my-8 bg-black">

	<div class="mb-5">
		<h1 class="text-2xl font-bold">Input Perhitungan</h1>
		<table class="table w-full rounded-lg bg-primary">
			<thead>
				<td class="normal-case border">$(b)$ Lebar Balok (inci)</td>
				<td class="normal-case border">$(d)$ Tinggi Efektif Balok (inci)</td>
				<td class="normal-case border">$(As)$ Luas Tulangan Tarik (inci$,^2$)</td>
				<td class="normal-case border">$(f'c)$ Kekuatan Mutu Beton (psi)</td>
				<td class="normal-case border">$(F_y)$ Mutu Baja (psi)</td>
			</thead>
			<tbody class="">
				<td class="border"><?= $history['b'] ?></td>
				<td class="border"><?= $history['d'] ?></td>
				<td class="border"><?= $history['as2'] ?></td>
				<td class="border"><?= $history['fc'] ?></td>
				<td class="border"><?= $history['fy'] ?></td>
			</tbody>
		</table>
	</div>
	<div class="mb-5">
		<h1 class="text-2xl font-bold">Data Rumus</h1>
		<table class="table w-full rounded-lg bg-primary">
			<thead>
				<td class="normal-case border">$(a)$</td>
				<td class="normal-case border">$(beta)$</td>
				<td class="normal-case border">$(c)$</td>
				<td class="normal-case border">$(C)$</td>
				<td class="normal-case border">$(T)$</td>
				<td class="normal-case border">$(cdt)$</td>
				<td class="normal-case border">$(et)$</td>
				<td class="normal-case border">$(Pmin)$</td>
				<td class="normal-case border">$(P)$</td>
			</thead>
			<tbody class="">
				<td class="border"><?= $rumus['input']['a'] ?></td>
				<td class="border"><?= $rumus['input']['beta'] ?></td>
				<td class="border"><?= $rumus['input']['c'] ?></td>
				<td class="border"><?= $rumus['input']['C'] ?></td>
				<td class="border"><?= $rumus['input']['T'] ?></td>
				<td class="border"><?= isset($rumus['input']['cdt']) ? $rumus['input']['cdt'] : '-' ?></td>
				<td class="border"><?= isset($rumus['input']['et']) ? $rumus['input']['et'] : '-' ?></td>
				<td class="border"><?= $rumus['input']['pMin1'] ?></td>
				<td class="border"><?= $rumus['input']['p'] ?></td>
			</tbody>
		</table>
	</div>
	<div class="mb-5">
		<h1 class="text-2xl font-bold">Perhitungan</h1>
		<ul id="rumus" class="list-disc">

		</ul>
	</div>
	<!-- <h1>Engineer</h1>
	<h1>Manager</h1> -->
	<!-- <div class="w-full mt-20 flex gap-10 justify-end">
		<div class="w-fit text-center">
			<h3 class="text-3xl">Engineer</h3>
			<hr class="text-black mt-20">
		</div>
		<div class="w-fit text-center">
			<h3 class="text-3xl">Manager</h3>
			<hr class="text-black mt-20">
		</div>
	</div> -->
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

	// efektif
	function windowPrint() {
		var printable = document.getElementById('printable')
		var originalContent = document.body.innerHTML

		document.body.innerHTML = printable.innerHTML
		window.print()
		document.body.innerHTML = originalContent
	}

	function printDoc() {
		var doc = new window.jsPDF('l', 'pt', 'letter')
		var printable = document.getElementById('printable')
		doc.html(printable, {
			callback: function(doc) {
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

	function doPdf() {
		var pdf = new jsPDF('l', 'pt', 'letter');
		var printable = document.getElementById('printable')
		pdf.html(printable, {
			callback: function(pdf) {
				var iframe = document.createElement('iframe');
				iframe.setAttribute('style', 'position:absolute;right:0; top:0; bottom:0; height:100%; width:500px');
				document.body.appendChild(iframe);
				iframe.src = pdf.output('datauristring');
			}
		});
	}

	function visualMn(as, fy, d, a) {
		return `<li> $M_n = A_s xx f_y (d - a / 2) = ${(as)} xx ${fy} (${d} - ${a} / 2)$ </li>`
	}

	function visualA(as, fy, fc, b, a) {
		return `<li>$a = (A_s xx f_y) / (0.85 xx f'c xx b) = (${as} xx ${fy}) / (0.85 xx ${fc} xx ${b}) = ${a}$ inci</li>`
	}

	function visualEt(d, c, et) {
		return `<li>$ε_t = 0,003((d_t-c) / c)$ <br> $ε_t = 0,003((${d}-${c}) / ${c}) = ${et} > 0.005$</li>`
	}

	function visualCdt(c, d, cdt, terkontrolTekan = false) {
		return `<li>$c/d_t = ${c} / ${d} = ${cdt}$ ${terkontrolTekan == true ? '(Terkontrol Tekan)' : ''}</li>`
	}

	function visualC(a, beta, c) {
		return `<li>$c = a/β_1 = ${a}/${beta} = ${c}$ inci</li>`
	}

	function visualBeta(beta) {
		return `<li>$β_1 = ${beta}$</li>`
	}

	function visualRo(p, as, b, d) {
		return `<li>$ρ = A_s / (b xx d) = ${as} / (${b} xx ${d}) = ${p}$</li>`
	}

	function visualRoMin(pMin, fc, fy) {
		return `<li>$ρ_min = root(3)(f'c)/(fy) = root(3)(${fc})/${fy}$ = ${(pMin)}</li>`
	}

	function visualCBesar(fc, b, a, C) {
		return `<li>$C = 0.85 xx f'c xx b xx a = 0.85 xx ${fc} xx ${b} xx ${a} = ${C}a $ $lb$</li>`
	}

	function visualT(T, as, fy) {
		return `$T = A_s xx f_y = ${as} xx ${fy} = ${T} lb$</li>`;
	}

	function visualDt(d) {
		return `$d_t = d = ${d}$ inci</li>`;
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
			`	<li> $f'c = ${input['fc']}$ psi </li> <br>
				${visualRoMin(data.input['pMin1'], input['fc'], input['fy'])} <br>
				${visualRo(data.input['p'], input['as'], input['b'], input['d'])} <br>
				<span class="text-success">${data.input['perbandinganRo']}</span> <br>
				${visualBeta(data.input['beta'])} <br> 
				${data.input['syaratBeta']} <br> 
				${visualDt(input['d'])} <br>
				${visualCBesar(input['fc'], input['b'], 'a', data.input['C'])} <br>
				${visualT(data.input['T'], input['as'], input['fy'])} <br>
				${visualA(input['as'], input['fy'], input['fc'], input['b'], data.input['a'])} <br> 
				${visualC(data.input['a'], data.input['beta'], data.input['c'])} <br> 
				${visualCdt(data.input['c'], input['d'], data.input['cdt'])} <br> 
				<span class="text-success">${data.input['perbandinganCdt']}}</span> <br>
				${visualEt(input['d'], data.input['c'], data.input['et'])} <br>
				<span class="text-success">${data.input['perbandinganEt']}</span> <br>
				${visualMn(input['as'], input['fy'], input['d'], data.input['a'])} <br> 
				$M_n=$${data.data} lb-inci (446 kN-m)`
	} else {
		hasilSpan.classList.add('text-inherit')
		if (data.input.stepError == 1) {

			hasilSpan.innerHTML = `
				<li> $f'c = ${input['fc']}$ psi </li> <br>
				${visualRoMin(data.input['pMin1'], input['fc'], input['fy'])} <br>
				${visualRo(data.input['p'], input['as'], input['b'], input['d'])} <br>
				<span class="text-error">${data.data}</span>
			`
		}

		if (data.input.stepError == 2) {
			// c/dt yang error
			hasilSpan.innerHTML = `
				<li> $f'c = ${input['fc']}$ psi </li> <br>
				${visualRoMin(data.input['pMin1'], input['fc'], input['fy'])} <br>
				${visualRo(data.input['p'], input['as'], input['b'], input['d'])} <br>
				<span class="text-success">${data.input['perbandinganRo']} </span> <br>
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
			<li> $f'c = ${input['fc']}$ psi </li><br>
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
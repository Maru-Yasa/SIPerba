<?php
// function untuk mengsederhanakan angka
function _b($x){
	return round($x * 1000) / 1000;
}
class M_process extends CI_Model
{

	private function between($x, $y, $val)
	{
		return $val >= $x && $val <= $y;
	}

	private function inputLimitValidation($input)
	{
		$limitError = [];
		// b min 10 inci max 80 inci
		if (!$this->between(10, 80, $input['b'])) {
			$limitError[] = "Masukan b antara 10-80 inci";
		}

		// d min 20 max 160
		if (!$this->between(20, 160, $input["d"])) {
			$limitError[] = "Masukan d antara 20-160 inci";
		}

		// As min 0,5 max 320
		if (!$this->between(0.5, 320, $input["as"])) {
			$limitError[] = "Masukan As antara 0.5-320 inci";
		}

		// fc' min 2500 max 8000
		if (!$this->between(2500, 8000, $input["f'c"])) {
			$limitError[] = "Masukan fc' antara 2500-8000 psi";
		}

		// fy = 60000
		if ($input["fy"] != 60000) {
			$limitError[] = "Masukan fy 60000 psi";
		}

		return $limitError;
	}

	public function hitungApi($input)
	{

		$hasil = [];
		$syaratBeta = "";

		// limit validation
		if (count($this->inputLimitValidation($input)) > 0) {
			$hasil = [
				'status' => false,
				'input' => [
					'stepError' => 0
				],
				'data' => $this->inputLimitValidation($input)
			];
			return $hasil;
		}

		// // ketika Fc' < 2500
		// if ($input["f'c"] <= 2500) {
		// 	$hasil = [
		// 		'status' => false,
		// 		'input' => [
		// 			'stepError' => 0
		// 		],
		// 		'data' => "Untuk fc’ (Mutu Beton) tidak dektail, maka perbesar fc'"
		// 	];
		// 	return $hasil;
		// }

		try {
			// 3 * f'c^1/2 / fy
			$pMin1 = _b(3 * pow($input["f'c"], 1 / 2) / $input["fy"]);

			// 200/fy
			$pMin2 = 200 / $input["fy"];

			// As / b*d
			$p = _b($input["as"] / ($input["b"] * $input["d"]));
			$Mn = 0;

			if ($p > $pMin1) {
				// berhasil p > pmin
				$konstantaB = 0;

				// penentuan konstanta beta
				if ($input["f'c"] <= 4000 && $input["f'c"] >= 2500) {
					// jika f'c <= 4000 dan fc' >= 2500
					// $syaratBeta = "Dimana fc' $".$input["f'c"]." ≤ 4000 $ psi maka $ β_1 = 0,85$";
					$syaratBeta = "Dimana fc' 2500 psi < " . $input["f'c"] . " psi ≤ 4000 psi";
					$konstantaB = 0.85;
				}
				if ($input["f'c"] > 4000 && $input["f'c"] <= 8000) {
					// jika f'c > 4000 < 8000 = 0,85 - 0,05 (f'c - 4000 / 1000)
					$konstantaB = round(0.05 * (($input["f'c"] - 4000) / 1000), 2);
					$konstantaB = round(0.85 - $konstantaB, 2);
					$syaratBeta = "Dimana fc' $ 4000 < " . $input["f'c"] . " ≤ 8000 $ psi maka $ β_1 = " . $konstantaB . "$";
				}
				if ($input["f'c"] > 8000) {
					// jika f'c > 8000
					$syaratBeta = "Dimana fc' $" . $input["f'c"] . " > 8000 $ psi maka $ β_1 = 0,65$";
					$konstantaB = 0.65;
				}

				// C = beta * f'c * ba
				// var_dump([$konstantaB, $input["f'c"], $input["b"]]);
				$C = 0.85 * $input["f'c"] * $input["b"];

				// T = As * fy
				$T = $input["as"] * $input["fy"];

				// a = T / C
				// var_dump([$T, $C]);
				$a = round($T / $C, 2);

				// c = a / beta
				$c = round($a / $konstantaB, 2);

				// c/dt = c / d
				$cdt = _b($c / $input['d']);

				if ($cdt <= 0.375) {
					// ketika memenuhi syarat c/dt <= 0.375
					$et = _b(0.003 * (($input['d'] - $c) / $c));
					if ($et > 0.005) {
						// ketika memenuhi syarat et > 0.005
						// menghitung Mn
						$Mn = round($input['as'] * $input['fy'] * ($input["d"] - $a / 2));
						$hasil = [
							'status' => true,
							'data' => $Mn,
							'input' => [
								'a' => $a,
								'beta' => $konstantaB,
								'c' => $c,
								'C' => $C,
								'T' => $T,
								'cdt' => $cdt,
								'et' => $et,
								'beta' => $konstantaB,
								'pMin1' => $pMin1,
								'p' => $p,
								'perbandinganRo' => 'Syarat atau ketentuan $ρ > ρ_min$ = $' . _b($p) . ' > ' . $pMin1 . '$ Diterima',
								'perbandinganEt' => 'Syarat atau ketentuan $ε_t > 0.005$ = $' . _b($et) . ' > 0.005$ Diterima',
								'perbandinganCdt' => 'Syarat atau ketentuan $c/(d_t) <= 0.375$ = $' . _b($cdt) . ' <= 0.375$ Diterima',
								'syaratBeta' => $syaratBeta

							]
						];
					} else {
						// ketika TIDAK memenuhi syarat et > 0.005
						$hasil = [
							'status' => false,
							'data' => 'Syarat atau ketentuan $e_t > 0.005$ sedangkan disini $' . $et . ' < 0.005$',
							'input' => [
								'stepError' => 3,
								'a' => $a,
								'beta' => $konstantaB,
								'c' => $c,
								'C' => $C,
								'T' => $T,
								'cdt' => $cdt,
								'et' => $et,
								'beta' => $konstantaB,
								'pMin1' => $pMin1,
								'p' => $p,
								'perbandinganRo' => 'Syarat atau ketentuan $ρ > ρ_min$ = $' . $p . ' > ' . $pMin1 . '$ Diterima',
								'perbandinganCdt' => 'Syarat atau ketentuan $c/(d_t) <= 0.375$ = $' . $cdt . ' <= 0.375$ Diterima',
								'syaratBeta' => $syaratBeta,
								'terkontrolTekan' => false
							]
						];
					}
				} else {
					// ketika TIDAK memenuhi syarat c/dt <= 0.375
					$data = 'Penampang tidak memenuhi $c/(d_t) ≤ 0,375$ perkecil tulangan tarik As';
					$terkontrolTekan = false;
					$hasil = [
						'status' => false,
						'data' => $data,
						'input' => [
							'stepError' => 2,
							'a' => $a,
							'beta' => $konstantaB,
							'c' => $c,
							'C' => $C,
							'T' => $T,
							'cdt' => $cdt,
							'beta' => $konstantaB,
							'pMin1' => $pMin1,
							'p' => $p,
							'perbandinganRo' => 'Syarat atau ketentuan $ρ > ρ_min$ = $' . $p . ' > ' . $pMin1 . '$ Diterima',
							'syaratBeta' => $syaratBeta,
							'terkontrolTekan' => $terkontrolTekan
						]
					];
				}
			} else {
				// gagal p < pmin1
				$hasil = [
					'status' => false,
					'data' => 'Perbesar Nilai As',
					'input' => [
						'stepError' => 1,
						'pMin1' => $pMin1,
						'p' => $p,
					]
				];
				// return $hasil;
			}
			if ($Mn == 0) {
				$Mn = "-";
			}
			date_default_timezone_set('Asia/Jakarta');
			$userid = $this->session->userdata('user_id');
			$data = [
				'b' => $input["b"],
				'd' => $input["d"],
				'as2' => $input['as'],
				'fy' => $input['fy'],
				'fc' => $input["f'c"],
				'hasil' => $Mn,
				'id_user' => $userid,
				'date' => date("Y-m-d H:i:s")
			];
			if ($input['save'] == true) {
				$this->db->insert('history', $data);
			} elseif ($input['update'] == true) {
				$id2 = $input['id'];
				$data = [
					'b' => $input["b"],
					'd' => $input["d"],
					'as2' => $input['as'],
					'fy' => $input['fy'],
					'fc' => $input["f'c"],
					'hasil' => $Mn,
					'is_verified_by_manager' => null,
					'is_verified_by_engineer' => null,
					'diedit' => 1,
					'id_user' => $userid,
					'date' => date("Y-m-d H:i:s")
				];
				$this->db->where('id', $id2);
				$this->db->update('history', $data);
			}
		} catch (\Throwable $th) {
			$hasil = [
				'status' => false,
				'input' => [
					'stepError' => 0
				],
				'data' => "Data salah atau kurang lengkap, mohon untuk dicek kembali"
			];
		}

		return $hasil;
	}

	public function detailHistory($input)
	{
		$_data = $this->hitungApi($input);
		return $_data;
	}

	public function getHistory()
	{
		$this->db->select('t1.*, t2.username');
		$this->db->from('history as t1');
		$this->db->join('users as t2', 't1.id_user = t2.id_user', 'inner');
		$this->db->order_by('t1.id', 'ASC'); // Menambahkan ORDER BY pada id_history
		$query = $this->db->get()->result();
		return $query;
	}

	public function countUser()
	{
		$this->db->from('users');
		$count = $this->db->count_all_results();
		return $count;
	}
	public function countHistory()
	{
		$this->db->from('history');
		$count = $this->db->count_all_results();
		return $count;
	}
	public function getUsers()
	{
		if ($this->session->userdata('role') == 'engineer') {
			$result = $this->db->get('users')->result();
		} elseif ($this->session->userdata('role') == 'manager') {
			$userid = $this->session->userdata('user_id');
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('role =', 'user');
			$this->db->where('id_user !=', $userid);
			$result = $this->db->get()->result();
		} else {
			$result = redirect('/home/perhitungan');
		}
		return $result;
	}
	public function getSetting()
	{
		$query = $this->db->get('setting')->row_array();
		if ($query) {
			$result = $query;
		} else {
			$data = [
				'nama_intansi' => '',
				'alamat_intansi' => ''
			];
			$this->db->insert('setting', $data);
			$result = $query;
		}
		return $result;
	}
	public function redirect()
	{
		if ($this->session->userdata('role') == 'user') {
			$redirect = redirect('/home/perhitungan');
			return $redirect;
		}
	}
}

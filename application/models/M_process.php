<?php
class M_process extends CI_Model
{
    public function hitung($b, $d, $as, $fc, $fy)
    {
        $input = [
            "b" => $b,
            "d" => $d,
            "as" => $as,
            "f'c" => $fc,
            "fy" => $fy
        ];

        // f'c^1/3 / fy
        $pMin1 = pow($input["f'c"], 1 / 3);

        // 200/fy
        $pMin2 = 200 / $input["fy"];

        // As / b*d
        $p = $input["as"] / ($input["b"] * $input["d"]);

        // var_dump([$p, $pMin2]);
        if ($p > $pMin2) {
            // print_r($p." > ".$pMin2."\n");
            // print_r("Benar");
            $konstantaB = 0;

            // penentuan konstanta beta
            if ($input["f'c"] <= 4000) {
                // jika f'c <= 4000
                $konstantaB = 0.85;
            }
            if ($input["f'c"] > 4000 && $input["f'c"] <= 8000) {
                // jika f'c > 4000 < 8000
                $konstantaB = 0.80;
            } else {
                // jika f'c > 8000
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
            // var_dump([round($a, 2), $konstantaB]);
            $c = $a / $konstantaB;

            // c/dt = c / d
            // var_dump([$c, round($c, 2), $input['d']]);
            // implementasi contoh c
            if ($input["f'c"] > 8000) {
                $et = 0.003 * round(($input['d'] - $c) / $c, 2);
                if ($et > 0.005) {
                    $Mn = round($input['as'] * $input['fy'] * ($input["d"] - $a / 2));
                    $hasil = $Mn . " lb-inci";
                    // return $hasil;
                } else {
                    $hasil = "balok tersebut tidaklah daktail dan tidak memenuhi Peraturan ACI 318";
                    // return $hasil;
                }
                // implementasi contoh a & b
            } else {
                $cdt = $c / $input['d'];

                // $cdt > 0.375 < 0.60
                if ($cdt < 0.60 && $cdt > 0.375) {
                    $Mn = round($input['as'] * $input['fy'] * ($input["d"] - $a / 2));
                    $hasil = $Mn . " lb-inci";
                    // return $hasil;
                } else {
                    $hasil = "$cdt > 0.375 < 0.60 \n <br> balok tersebut tidaklah daktail dan tidak memenuhi Peraturan ACI 318";
                    // return $hasil;
                }
            }
        } else {
            $hasil = $p . " < " . $pMin2 . "<br>salah";
            // return $hasil;
        }
        if ($Mn == null) {
            $Mn = "-";
        }
        $data = [
            'b' => $b,
            'd' => $d,
            'as2' => $as,
            'fy' => $fy,
            'fc' => $fc,
            'hasil' => $Mn,
            'date' => date("Y-m-d")
        ];
        $this->db->insert('history', $data);
        return $hasil;
    }

    public function hitungApi($input)
    {

		$hasil = [];
		try {
			// 3 * f'c^1/2 / fy
			$pMin1 = 3 * pow($input["f'c"], 1/2) / $input["fy"];
	
			// 200/fy
			$pMin2 = 200 / $input["fy"];
	
			// As / b*d
			$p = $input["as"] / ($input["b"] * $input["d"]);
			$Mn = 0;
	
			// var_dump([$p, $pMin2]);
			if ($p > $pMin1) {
				// print_r($p." > ".$pMin2."\n");
				// print_r("Benar");
				$konstantaB = 0;
	
				// penentuan konstanta beta
				if ($input["f'c"] <= 4000) {
					// jika f'c <= 4000
					$konstantaB = 0.85;
				}
				if ($input["f'c"] > 4000 && $input["f'c"] <= 8000) {
					// jika f'c > 4000 < 8000 = 0,85 - 0,05 (f'c - 4000 / 1000)
					$konstantaB = round(0.05 * (($input["f'c"] - 4000) / 1000), 2);
					$konstantaB = round(0.85 - $konstantaB, 2);
				} else {
					// jika f'c > 8000
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
				// var_dump([round($a, 2), $konstantaB]);
				$c = round($a / $konstantaB, 2);
	
				// c/dt = c / d
				$cdt = $c / $input['d'];

				if ($cdt <= 0.375) {
					// ketika memenuhi syarat c/dt <= 0.375
					$et = 0.003 * (($input['d'] - $c) / $c);
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
								'cdt' => $cdt,
								'et' => $et,
								'beta' => $konstantaB,
								'pMin1' => $pMin1,
								'p' => $p,
								'perbandinganRo' => 'Syarat atau ketentuan $ρ > ρ_min$ = $'.$p.' > '.$pMin1.'$ Diterima',
								'perbandinganEt' => 'Syarat atau ketentuan $ε_t > 0.005$ = $'.$et.' > 0.005$ Diterima',
								'perbandinganCdt' => 'Syarat atau ketentuan $c/(d_t) <= 0.375$ = $'.$cdt.' <= 0.375$ Diterima'
							] 
						]; 
					} else {
						// ketika TIDAK memenuhi syarat et > 0.005
						$hasil = [
							'status' => false,
							'data' => 'Syarat atau ketentuan $e_t > 0.005$ sedangkan disini $'.$et.' < 0.005$',
							'input' => [
								'a' => $a,
								'stepError' => 3,
								'beta' => $konstantaB,	
								'c' => $c,
								'cdt' => $cdt,
								'et' => $et,
								'beta' => $konstantaB,
								'pMin1' => $pMin1,
								'p' => $p,
								'perbandinganRo' => 'Syarat atau ketentuan $ρ > ρ_min$ = $'.$p.' > '.$pMin1.'$ Diterima',
								'perbandinganCdt' => 'Syarat atau ketentuan $c/(d_t) <= 0.375$ = $'.$cdt.' <= 0.375$ Diterima'
							] 
						]; 
					}
				} else {
					// ketika TIDAK memenuhi syarat c/dt <= 0.375
					$hasil = [
						'status' => false,
						'data' => 'Syarat atau ketentuan $c/(d_t) ≤ 0,375$ sedangkan disini $'.$cdt.' > 0,375$',
						'input' => [
							'stepError' => 2,
							'a' => $a,
							'beta' => $konstantaB,	
							'c' => $c,
							'cdt' => $cdt,
							'beta' => $konstantaB,
							'pMin1' => $pMin1,
							'p' => $p,
							'perbandinganRo' => 'Syarat atau ketentuan $ρ > ρ_min$ = $'.$p.' > '.$pMin1.'$ Diterima',
						]
					]; 
				}
				
			} else {
				$hasil = [
					'status' => false,
					'data' => 'Balok tersebut tidaklah daktail dan tidak memenuhi Peraturan ACI 318',
					'input' => [
						'stepError' => 1,
						'a' => $a,
						'beta' => $konstantaB,	
						'c' => $c,
						'beta' => $konstantaB,
						'pMin1' => $pMin1,
						'p' => $p,
					]
				]; 
				// return $hasil;
			}
			if ($Mn == 0) {
				$Mn = "-";
			}
			$data = [
				'b' => $input["b"],
				'd' => $input["d"],
				'as2' => $input['as'],
				'fy' => $input['fy'],
				'fc' => $input["f'c"],
				'hasil' => $Mn,
				'date' => date("Y-m-d")
			];
			$this->db->insert('history', $data);
			
		} catch (\Throwable $th) {
			$hasil = [
				'status' => false,
				'data' => "Data salah atau kurang lengkap, mohon untuk dicek kembali"
			];
		}

        return $hasil;
    }

    public function getHistory()
    {
        $query = $this->db->get('history')->result();
        return $query;
    }
}

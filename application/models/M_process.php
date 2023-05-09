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
        return $hasil;
    }
}

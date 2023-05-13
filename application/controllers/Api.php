<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Api extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
    }

	public function hitung_get()
	{
		try {
			$data = [
				'b' => $this->get('b'),
				'd' => $this->get('d'),
				'as' => $this->get('as'),
				'fy' => $this->get('fy'),
				"f'c" => $this->get("fc")
			];
	
			$result = $this->M_process->hitungApi($data);
			return $this->response([
				'status' => $result['status'],
				'data' => $result['data'],
				'input' => isset($result['input']) ? $result['input'] : '',
				'message' => 'Sukses menghitung'
			], 200);
		} catch (\Throwable $th) {
			return $this->response([
				'status' => false,
				'data' => [],
				'input' => [],
				'message' => $th->getMessage()
			]);
		}
	}

}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Api extends RestController
{

	function __construct()
	{
		// Construct the parent class
		parent::__construct();
	}

	public function hitung_get()
	{
		try {
			$id = $this->get('id');
			if ($id === null) {
				$data = [
					'b' => $this->get('b'),
					'd' => $this->get('d'),
					'as' => $this->get('as'),
					'fy' => $this->get('fy'),
					"f'c" => $this->get("fc"),
					"save" => true
				];
			} else {
				if ($this->get('update') === null) {
					$update = false;
				} else {
					$update = true;
				}
				$data = [
					'b' => $this->get('b'),
					'd' => $this->get('d'),
					'as' => $this->get('as'),
					'fy' => $this->get('fy'),
					"f'c" => $this->get("fc"),
					"id" => $id,
					"save" => false,
					"update" => $update
				];
			}
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

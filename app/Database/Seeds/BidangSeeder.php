<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BidangSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'nama' => 'KPI',
				'created_at'    => date('Y-m-d H:i:s')
			],
			[
				'nama' => 'O&P',
				'created_at'    => date('Y-m-d H:i:s')
			],
			[
				'nama' => 'PJSA',
				'created_at'    => date('Y-m-d H:i:s')
			],
			[
				'nama' => 'PJPA',
				'created_at'    => date('Y-m-d H:i:s')
			],
			[
				'nama' => 'TU',
				'created_at'    => date('Y-m-d H:i:s')
			],
		];

		$this->db->table('bidangs')->insertBatch($data);
	}
}

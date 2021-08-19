<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableBidangs extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 25,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'nama'       => [
				'type' => 'varchar',
				'constraint' => 255
			],
			'created_at'       => [
				'type' => 'datetime',
				'null' => true
			],
			'updated_at'       => [
				'type' => 'datetime',
				'null' => true
			],
			'deleted_at'       => [
				'type' => 'datetime',
				'null' => true
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('bidangs');
		$this->forge->addUniqueKey('nama');
	}

	public function down()
	{
		$this->forge->dropTable('bidangs', true);
	}
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Meeting extends Migration
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
			'pengundang'       => [
				'type' => 'varchar',
				'constraint' => 255
			],
			'tanggal'       => [
				'type' => 'date',
			],
			'tempat'       => [
				'type' => 'varchar',
				'constraint' => 255
			],
			'bidang_id'       => [
				'type' => 'varchar',
				'constraint' => 255
			],
			'jam'       => [
				'type' => 'varchar',
				'constraint' => 255
			],
			'meet_id' => [
				'type' => 'varchar',
				'constraint' => 255,
				'null' => true,
			],
			'meet_pass' => [
				'type' => 'varchar',
				'constraint' => 255,
				'null' => true,
			],
			'link'       => [
				'type' => 'varchar',
				'constraint' => 255,
				'null' => true,
			],
			'undangan'       => [
				'type' => 'varchar',
				'constraint' => 255
			],
			'status'       => [
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
		$this->forge->createTable('meeting');
	}

	public function down()
	{
		$this->forge->dropTable('meeting', true);
	}
}

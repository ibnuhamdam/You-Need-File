<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Files extends Migration
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
			'type'       => [
				'type' => 'varchar',
				'constraint' => 255
			],
			'link'       => [
				'type' => 'varchar',
				'constraint' => 255,
				'null' => true
			],
			'meeting_id'       => [
				'type' => 'INT',
				'constraint' => 255,
				'unsigned'       => true,
			],
			'users_id'       => [
				'type' => 'INT',
				'constraint' => 255,
				'unsigned'       => true,
			],
			'deskripsi' 	=> [
				'type' 		=> 'varchar',
				'constraint' => 1200
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
		$this->forge->addForeignKey('users_id', 'users', 'id', '', 'CASCADE');
		$this->forge->addForeignKey('meeting_id', 'meeting', 'id', '', 'CASCADE');
		$this->forge->createTable('files');
	}

	public function down()
	{
		$this->forge->dropTable('files', true);
	}
}

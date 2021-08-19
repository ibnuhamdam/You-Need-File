<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UsersRapat extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'users_id'          => [
				'type'           => 'INT',
				'constraint'     => 25,
				'unsigned'       => true,
				'default' => 0
			],
			'meeting_id'       => [
				'type'           => 'INT',
				'constraint'     => 25,
				'unsigned'       => true,
				'default' => 0
			]
		]);
		$this->forge->addKey(['users_id', 'meeting_id']);
		$this->forge->addForeignKey('users_id', 'users', 'id', '', 'CASCADE');
		$this->forge->addForeignKey('meeting_id', 'meeting', 'id', '', 'CASCADE');
		$this->forge->createTable('users_meeting');
	}

	public function down()
	{
		$this->forge->dropTable('users_meeting', true);
	}
}
